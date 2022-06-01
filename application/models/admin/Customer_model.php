<?php if(!defined('BASEPATH')) exit('No direct script access allowed');







class Customer_model extends Base_model
{

    public $table = "z_customer";

    //set column field database for datatable orderable
    var $column_order = array(null, 'c.date_at', 'c.sku_id', 'c.customer_title','c.customer_mobile','c.customer_alter_mobile',  'sta.name', 'dist.name', 'cit.city', 'ctype.name', 'calldirection.name'); 

    //set column field database for datatable searchable 
    var $column_search = array('c.date_at', 'c.sku_id', 'c.customer_title','c.customer_mobile','c.customer_alter_mobile',  'sta.name', 'dist.name', 'cit.city', 'ctype.name', 'calldirection.name'); 

    var $order = array('c.id' => 'desc'); // default order



        



        function __construct() {



            parent::__construct();



        }







     function delete($id) {



        $this->db->where('id', $id);



        $this->db->delete($this->table);        



        return $this->db->affected_rows();



    }







    public function find($id) {
            $query = $this->db->select('*')
                    ->from($this->table)
                    ->where('id', $id)
                    ->get();

            if ($query->num_rows() > 0) {
                $result = $query->result();
                return $result[0];
            } else {
                return array();
            }
        }

       // Get  List

        function get_datatables()
        {
            $this->db->select('c.*, cit.city as city, sta.name as state, dist.name as district, ctype.title as leatest_calltype,   calldirection.title as leatest_calldir');
            $this->_get_datatables_query();

            if(isset($_POST['length']) && $_POST['length'] != -1)

            $this->db->limit($_POST['length'], $_POST['start']);

            $query = $this->db->get();

            return $query->result();

        }

        // Get Database 

         public function _get_datatables_query()
        {     

            $this->db->from($this->table. ' as c'); 
            $this->db->join('z_states as sta', 'sta.id = c.state', 'left');
            $this->db->join('z_district as dist', 'dist.id = c.district', 'left');
            $this->db->join('z_cities as cit', 'cit.id = c.city', 'left');
            $this->db->join('z_call_type as ctype', 'ctype.id = c.last_call_type', 'left');
            $this->db->join('z_call_direction as calldirection', 'calldirection.id = c.last_call_direction', 'left');

            
            

            $i = 0;     

            foreach ($this->column_search as $item) // loop column 

            {

                if(isset($_POST['search']['value']) && $_POST['search']['value']) // if datatable send POST for search

                {

                    if($i===0) // first loop

                    {

                        $this->db->like($item, $_POST['search']['value']);

                    }

                    else

                    {

                        $this->db->or_like($item, $_POST['search']['value']);

                    }

                }

                $i++;

            }

             

            if(isset($_POST['order'])) // here order processing
            {

                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

            } 

            else if(isset($this->order))

            {

                $order = $this->order;

                $this->db->order_by(key($order), $order[key($order)]);

            }

        }



        // Count  Filtered

        function count_filtered()
        {

            $this->_get_datatables_query();

            $query = $this->db->get();

            return $query->num_rows();

        }

        // Count all

        public function count_all()
        {

            $this->db->from($this->table. ' as c');

            return $this->db->count_all_results();

        }

        function getRows($params = array())
        {
          /*  $this->db->select('*'); 
            $this->db->from($this->table); */

                $this->db->select('c.*, cit.city as city, sta.name as state, dist.name as district, ctype.title as calltype,   calldirection.title as calldir,   admin.title as createdby,   admin2.title as assignedto,   admin3.title as lastfollower,   admin3.title as lastfollower,   last_ctype.title as lastcalltype');
                $this->db->from($this->table. ' as c'); 
                $this->db->join('z_states as sta', 'sta.id = c.state', 'left');
                $this->db->join('z_district as dist', 'dist.id = c.district', 'left');
                $this->db->join('z_cities as cit', 'cit.id = c.city', 'left');
                $this->db->join('z_call_type as ctype', 'ctype.id = c.last_call_type', 'left');
                 
                $this->db->join('z_call_direction as calldirection', 'calldirection.id = c.last_call_direction', 'left');
                $this->db->join('z_admin as admin', 'admin.id = c.created_by', 'left');
                $this->db->join('z_admin as admin2', 'admin2.id = c.assigned_to', 'left');
                $this->db->join('z_admin as admin3', 'admin3.id = c.last_follower', 'left');
                $this->db->join('z_call_type as last_ctype', 'last_ctype.id = c.last_follow_call_type', 'left');

                $where  = '';
                $userid = $this->session->userdata('userId');
                 $role = $this->session->userdata('role');
                

                
                if($role==1)
                {
                    if(isset($params['form_type']) && $params['form_type']=='inquiry')
                    {
                        $where.= "( c.created_by = '".$params['userid']."' OR c.assigned_to='".$params['userid']."')";       
                    }else
                    {
                        $where.= "( c.status = 1 )";    
                    }
                    //$where.= "( c.status = '1' )";
                    
                }else
                {
                     $where.= "( c.created_by = '".$userid."' OR c.assigned_to='".$userid."')";

                }


                /*if(isset($params['other_state2']) &&  $params['other_state2'] !=='')
                {
                 $where.= "( c.other_state = '".$params['other_state2']."')";  
                }

                if(isset($params['other_district2']) &&  $params['other_district2'] !=='')
                {
                 $where.= "( c.other_district = '".$params['other_district2']."')";  
                }
                
                if(isset($params['other_city2']) &&  $params['other_city2'] !=='')
                {
                 $where.= "( c.other_city = '".$params['other_city2']."')";  
                }*/
                    

            if(array_key_exists("where", $params)){
                if(!empty($params['where']))
                {
                     
                    foreach($params['where'] as $key => $val){ 
                   // $this->db->where('c.'.$key, $val); 
                    if($key =='customer_title')
                    {

                    
                    }else{
                        $where.= " AND ( c.".$key." = '".$val."' )";
                    }

                } 

                  if(isset($params['where']['customer_title']))
                {
                    if(!empty($where))
                    {
                       // $where.=" AND ";
                    }
                    $this->db->or_like('customer_title', $params['where']['customer_title']);
                     //$where.= " (c.customer_title like '%".$params['where']['customer_title']."%')";
                }

 
                     
                }
                
            }

            $this->db->where($where); 
           




              
                


                
               
                


           
             

            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
                $result = $this->db->count_all_results(); 
            }else{ 
                if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                    if(!empty($params['id'])){ 
                        $this->db->where('id', $params['id']); 
                    } 
                    $query = $this->db->get(); 
                    $result = $query->row_array(); 
                }else{ 
                    $this->db->order_by('c.id', 'desc'); 
                    if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 

                        //$starts = (($params['start']-1) < 0)?0:($params['start']-1);
                        $this->db->limit($params['limit'],$params['start']); 
                    }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                        $this->db->limit($params['limit']); 
                    } 
                     
                    $query = $this->db->get(); 
                    $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
                } 
            } 
             
            // Return fetched data 
            return $result; 
    } 



}











  