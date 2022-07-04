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
                 
                    $role = $this->session->userdata('role');
                    $company_id = $this->session->userdata('company_id');
                    if($role ==1)
                    {
                        $where.= "( c.status = 1 )";
                    }else
                    {
                        $where.= "( c.status = 1 AND c.company_id=".$company_id." )";  
                    }
                    
                    
                    if(isset($params['userid']))
                    {
                        $userid = $params['userid'];
                        $where.= " AND ( c.assigned_to = '".$userid."')";
                    }
                
                     

               
                    

            if(array_key_exists("where", $params)){
                if(!empty($params['where']))
                {
                     
                    foreach($params['where'] as $key => $val){ 
                     if($key =='customer_title' || $key =='stat_type' ||   $key =='from_date' || $key =='to_date' )
                    {

                    
                    }else{
                        $where.= " AND ( c.".$key." = '".$val."' )";
                    }

                } 

                  if(isset($params['where']['customer_title']))
                {
                    if(!empty($where))
                    {
                        
                    }
                    $this->db->or_like('customer_title', $params['where']['customer_title']);
                 }
                 if(isset($params['where']['from_date']) && isset($params['where']['to_date']))
                {
                    $fromdate = $params['where']['from_date'];
                    $to_date = $params['where']['to_date'];

                    $where.= " AND (c.date_at > '".$current_date."' AND c.date_at < '".$to_date."' )";
                  }
                if(isset($params['where']['stat_type']))
                {
                    if($params['where']['stat_type'] =='followup' && $params['followup_type']=='yesterday')
                    {
                         

                         
                         $back_date = date('Y-m-d');
                        /*$where.= "  AND c.last_call_back_date < '".$back_date."'"; */
                         $where.= "  AND (c.last_call_back_date <'".$back_date."' AND  c.last_call_back_date != '0000-00-00')";  


                    }else if($params['where']['stat_type'] =='followup' && $params['followup_type']=='today')
                    {
                         

                        $back_date = date('Y-m-d');
                        $where.= "  AND c.last_call_back_date='".$back_date."'"; 


                    }else if($params['where']['stat_type'] =='followup' && $params['followup_type']=='tomorrow')
                    {
                         

                         $back_date = date('Y-m-d',strtotime("+1 days"));
                        $where.= "  AND c.last_call_back_date='".$back_date."'"; 


                    }else if($params['where']['stat_type'] =='call_type2')
                    {
                        $current_date = date('Y-m-d');
                        $where.= " AND (c.last_follow_date='".$current_date."')";
                    }else if($params['where']['stat_type'] =='all')
                    {
                        $current_date = date('Y-m-d');
                        $where.= " AND (c.last_follow_date='".$current_date."')";
                    }
                     
                    
                }

 
                     
                }
                
            }

            $this->db->where($where); 
           
         if(array_key_exists("returnType",$params) && $params['returnType'] == 'count')
         {
                $result = $this->db->count_all_results(); 
            }else{ 
                if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                    if(!empty($params['id'])){ 
                        $this->db->where('id', $params['id']); 
                    } 
                    $query = $this->db->get(); 
                    $result = $query->row_array(); 
                }else{ 
                    $this->db->order_by('c.update_at', 'desc'); 
                    if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 

                         $this->db->limit($params['limit'],$params['start']); 
                    }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                        $this->db->limit($params['limit']); 
                    } 
                     
                    $query = $this->db->get(); 
                    $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
                } 
            } 
             
             return $result; 
    } 



}











  