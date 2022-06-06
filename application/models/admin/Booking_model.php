<?php if(!defined('BASEPATH')) exit('No direct script access allowed');







class Booking_model extends Base_model
{

    public $table = "z_booking";

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

                $this->db->select('c.*, cit.city as city, sta.name as state, dist.name as district,    admin.title as createdby, bookstatus.title as booked_status, bookstatus.badges as booked_badges, executive.title as executive, product.title as productname, paymentmode.title as paymentmodename, contractstatus.title as contractstatusname,admin2.title as assignedto, cropstatus.title as cropstatusname');
                $this->db->from($this->table. ' as c'); 
                $this->db->join('z_states as sta', 'sta.id = c.state', 'left');
                $this->db->join('z_district as dist', 'dist.id = c.district', 'left');
                $this->db->join('z_cities as cit', 'cit.id = c.city', 'left');
                $this->db->join('z_crop_status as cropstatus', 'cropstatus.slug = c.crop_status', 'left'); 
                $this->db->join('z_booking_status as bookstatus', 'bookstatus.slug = c.booking_status', 'left'); 
                $this->db->join('z_contract_status as contractstatus', 'contractstatus.slug = c.contract', 'left'); 
                $this->db->join('z_payment_mode as paymentmode', 'paymentmode.slug = c.payment_mode', 'left'); 
                $this->db->join('z_agent as executive', 'executive.id = c.agent_id', 'left'); 
                $this->db->join('z_product as product', 'product.id = c.product_id', 'left'); 
                 
                /*$this->db->join('z_call_direction as calldirection', 'calldirection.id = c.last_call_direction', 'left');*/
                $this->db->join('z_admin as admin', 'admin.id = c.created_by', 'left');
                $this->db->join('z_admin as admin2', 'admin2.id = c.assigned_to', 'left');
               /* $this->db->join('z_admin as admin3', 'admin3.id = c.last_follower', 'left');*/
                /*$this->db->join('z_call_type as last_ctype', 'last_ctype.id = c.last_follow_call_type', 'left');*/

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
                    

            if(array_key_exists("where", $params)){
                if(!empty($params['where']))
                {
                     
                    foreach($params['where'] as $key => $val){ 
                   // $this->db->where('c.'.$key, $val); 
                    if($key =='customer_name' || $key =='billing_address' || $key =='other_city' ||$key =='other_district' || $key =='other_state' || $key =='req_delivery_date' || $key =='start_date' || $key =='end_date' )
                    {

                    
                    }else{
                        $where.= " AND ( c.".$key." = '".$val."' )";
                    }

                } 

                  if(isset($params['where']['customer_name']))
                {
                     
                    $this->db->or_like('customer_name', $params['where']['customer_name']);
                     //$where.= " (c.customer_title like '%".$params['where']['customer_title']."%')";
                } 

                if(isset($params['where']['billing_address']))
                {
                     
                    $this->db->or_like('billing_address', $params['where']['billing_address']);
                     //$where.= " (c.customer_title like '%".$params['where']['customer_title']."%')";
                } 
                if(isset($params['where']['other_city']))
                {
                     
                    $this->db->or_like('other_city', $params['where']['other_city']);
                     //$where.= " (c.customer_title like '%".$params['where']['customer_title']."%')";
                }
                if(isset($params['where']['other_district']))
                {
                     
                    $this->db->or_like('other_city', $params['where']['other_district']);
                     //$where.= " (c.customer_title like '%".$params['where']['customer_title']."%')";
                }
                if(isset($params['where']['other_state']))
                {
                     
                    $this->db->or_like('other_city', $params['where']['other_state']);
                     //$where.= " (c.customer_title like '%".$params['where']['customer_title']."%')";
                } 
                if(isset($params['where']['req_delivery_date']))
                {
                    $str = $params['where']['req_delivery_date'];
                    $exploded_data = explode(":",$str);

                    $start_date = $exploded_data[0];
                    $end_date = $exploded_data[1];
                     
                       /* $this->db->where('order_date >=', $first_date);
                        $this->db->where('order_date <=', $second_date);*/

                        $where.= " AND ( c.delivery_expect_start_date  >='".$start_date."' AND c.delivery_expect_end_date  <='".$end_date."' )";
                }
                if(isset($params['where']['start_date']) && isset($params['where']['end_date']))
                {
                    

                    $start_date = $params['where']['start_date'];
                    $end_date = $params['where']['end_date'];
                     
                       /* $this->db->where('order_date >=', $first_date);
                        $this->db->where('order_date <=', $second_date);*/

                        $where.= " AND ( c.date_at  >='".$start_date."' AND c.date_at  <='".$end_date."' )";
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











  