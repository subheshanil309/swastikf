<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Bookings extends BaseController
{


   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/booking_model');
        $this->load->model('admin/booking_status_model');
        $this->load->model('admin/crop_status_model');
        $this->load->model('admin/contract_status_model');
        $this->load->model('admin/payment_mode_model');
        $this->load->model('admin/agent_model');
        $this->load->model('admin/product_model');
        $this->load->model('admin/customer_model');
        $this->load->model('admin/city_model');
        $this->load->model('admin/state_model');
        $this->load->model('admin/district_model');
        $this->load->model('admin/call_type_model');
        $this->load->model('admin/call_direction_model');
        $this->load->model('admin/customer_call_model');
        $this->load->model('admin/user_model');
        $this->load->model('admin/admin_model');

        $this->perPage =20; 
    }

    


    public function index()
    {
        $this->isLoggedIn();
          $data = array();

            $uid         = $this->input->get('uid');
            if(isset($uid) && $uid !=='')
            {
                 $userid   = $uid;
            }else
            {
                $userid = $this->session->userdata('userId');
            }

            
            
 

            $data['edit_data'] = array();
            $data['customer_call_dtl'] = array();

            $form_type  = $this->input->get('form_type');
            $conditions = array(); 
            $where_search = array();

            $conditions['returnType'] = 'count'; 
            $conditions['userid'] = $userid; 
            $conditions['form_type'] = $form_type; 
            $totalRec = $this->booking_model->getRows($conditions); 
                
        if($form_type=='inquiry')
        {

                $where_search =  array();
                $search_customer_id  = @$this->input->get('search_customer_id');
                $search_name         = @$this->input->get('search_name');
                $search_mobile       = @$this->input->get('search_mobile');
                $search_alt_mobile   = @$this->input->get('search_alt_mobile');
                $state2              = @$this->input->get('state2');
                $district2           = @$this->input->get('district2');
                $city2               = @$this->input->get('city2');
                $call_direction2     = @$this->input->get('call_direction2');
                $call_type2          = @$this->input->get('call_type2'); 
                if(!empty($search_customer_id))
                {
                    $where_search['customer_id'] =  $search_customer_id;
                }
                if(!empty($search_name))
                {
                    $where_search['customer_title'] =  $search_name;
                } 
                
                if(!empty($search_mobile))
                {
                    $where_search['customer_mobile'] =  $search_mobile;
                }
                if(!empty($search_alt_mobile))
                {
                    $where_search['customer_alter_mobile'] =  $search_alt_mobile;
                }
                if(!empty($state2))
                {
                    $where_search['state'] =  $state2;
                }
                
                if(!empty($district2))
                {
                    $where_search['district'] =  $district2;
                }
                if(!empty($city2))
                {
                    $where_search['city'] =  $city2;
                } if(!empty($city2))
                {
                    $where_search['city'] =  $city2;
                }
               /* if(!empty($call_direction2))
                {
                    $where_search['last_call_direction'] =  $call_direction2;
                } 
                if(!empty($call_type2))
                {
                    $where_search['last_call_type'] =  $call_type2;
                }*/

        } 





            $this->load->library('pagination'); 

                $conditions = array(); 
                
                $uriSegment = 4; 

                // Get record count 
                

                // Pagination configuration 
                $config['base_url']    = base_url().'admin/bookings/index'; 
                $config['uri_segment'] = $uriSegment; 
                $config['total_rows']  = $totalRec; 
                $config['per_page']    = $this->perPage; 
                $config['use_page_numbers'] = TRUE;
                $config['reuse_query_string'] = TRUE;
             

 
  


            $config['full_tag_open'] = ' <ul class="pagination  justify-content-center mt-4" id="query-pagination">';
            $config['full_tag_close'] = '</ul> ';
             
            $config['first_link'] = 'First&nbsp;Page';
            $config['first_tag_open'] = '<li class="page-item">  ';
            $config['first_tag_close'] = '</li>';
             
            $config['last_link'] = 'Last&nbsp;Page';
            $config['last_tag_open'] ='<li class="page-item">  ';
            $config['last_tag_close'] = '</li>';
             
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="page-item"> ';
            $config['next_tag_close'] = ' </li>';
 
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li class="page-item"> ';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link active">';
            $config['cur_tag_close'] = '</a></li>';
 
            $config['num_tag_open'] = '<li class="page-item"> ';
            $config['num_tag_close'] = ' </li>';

                // Initialize pagination library 
                $this->pagination->initialize($config); 
                
              

                // Define offset 
                $page = $this->uri->segment($uriSegment); 
                $offset = (!$page)?0:$page; 

                if($offset != 0){
                    $offset = ($offset-1) * $this->perPage;
                }

                // Get records 
                $conditions = array( 
                'start' => $offset, 
                'where' => $where_search, 
                'limit' => $this->perPage 
                ); 

                $conditions['userid'] = $userid;
                $conditions['form_type'] = $form_type; 
                    /* echo "<pre>";
                    print_r( $conditions);
                    echo "</pre>"; */
                $data['bookings'] = $this->booking_model->getRows($conditions); 
                $data['pagination'] = $this->pagination->create_links(); 
 
                   

 
/*   echo "<pre>";
print_r($this->db->last_query());  
echo "</pre>"; */
 



         $form_type  = $this->input->get('form_type');
         if($form_type =='search')
         {
            $customer_id    = $this->input->get('customer_id');
            $mobile         = $this->input->get('mobile');

            

            if($customer_id !=='' || $mobile !=='')
            {   
                $isserch = false;
                $where = array();
                if(!empty($customer_id))
                {   
                    $isserch = true;

                     $where['sku_id'] = $customer_id;
                }

                if(!empty($mobile))
                {
                    $isserch = true;
                     $where['customer_mobile'] = $mobile;
                }

                if($isserch)
                {

                    $customer = $this->customer_model->findDynamic($where);
                    if(!empty($customer))
                    {
                        $data['edit_data'] = $customer[0];


                        $where = array();
                        $where['customer'] = $data['edit_data']->id;
                        //$data['customer_call_dtl'] =$this->customer_call_detail($data['edit_data']->id);
                       // $data['customer_call_dtl'] = $this->customer_call_model->findDynamic($where);
                    }
                    


                     
                }



                
                 
                 
                
            }

         }
         



        $where = array();
        $where['status'] = '1';
        $where['field'] = 'id,customer_name,customer_title,sku_id';
        $data['all_customers'] = $this->customer_model->findDynamic($where);
        
        $where = array();
        $where['status'] = '1';
        $where['field'] = 'id,name,title';
        $data['all_users'] = $this->admin_model->findDynamic($where);


        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'name';
        $data['states'] = $this->state_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'name';
        $data['districts'] = $this->district_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'city';
        $data['cities'] = $this->city_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'id';
        $data['calltypes'] = $this->call_type_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['bookings_status'] = $this->booking_status_model->findDynamic($where); 

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['all_agents'] = $this->agent_model->findDynamic($where);
        

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['crops_status'] = $this->crop_status_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['contracts_status'] = $this->contract_status_model->findDynamic($where);


        $filter_bookings_status =  array();
        $result_bookings_status =  array();
        if(!empty($data['bookings_status']))
        {
            $bookingwhere  = array();
            $bookingwhere['status']  = 1;
            $bookingwhere['field']  = 'id';

            $count_booking =  $this->booking_model->findDynamic($bookingwhere); 
            $filter_bookings_status = array();
            $filter_bookings_status['title'] = 'All' ;
            $filter_bookings_status['slug'] = 'all';
            $filter_bookings_status['count_booking'] = count($count_booking) ;
            $result_bookings_status[] = $filter_bookings_status;


            foreach ($data['bookings_status'] as $bookingstatus)
            {
                $bookingwhere  = array();
                $bookingwhere['status']  = 1;
                $bookingwhere['field']  = 'id';
                $bookingwhere['booking_status']  = $bookingstatus->slug;
                
                   $count_booking =  $this->booking_model->findDynamic($bookingwhere); 

                    $filter_bookings_status = array();
                    $filter_bookings_status['title'] = $bookingstatus->title ;
                    $filter_bookings_status['slug'] = $bookingstatus->slug ;
                    $filter_bookings_status['count_booking'] = count($count_booking) ;
                    $result_bookings_status[] = $filter_bookings_status;
            }
        }

        $data['filter_bookings_status'] = $result_bookings_status;



         $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['calldirections'] = $this->call_direction_model->findDynamic($where); 

        

         



        $data['count_call_summary'] = $this->customer_call_model->getCallsummary($data['calltypes'],$userid); 

         
        $this->global['pageTitle'] = 'Booking';
        $this->loadViews("admin/booking/list", $this->global, $data , NULL);
        
    }

    // Add New 

    public function create()
    {
    
            $this->isLoggedIn();
            
            $data = array();

            $uid         = $this->input->get('uid');
            if(isset($uid) && $uid !=='')
            {
                 $userid   = $uid;
            }else
            {
                $userid = $this->session->userdata('userId');
            }

            
            
 

            $data['edit_data'] = array();
            $data['customer_call_dtl'] = array();

            $form_type  = $this->input->get('form_type');
            $conditions = array(); 
            $where_search = array();

            $conditions['returnType'] = 'count'; 
            $conditions['userid'] = $userid; 
            $conditions['form_type'] = $form_type; 
            $totalRec = $this->customer_model->getRows($conditions); 
                
        if($form_type=='inquiry')
        {
                $where_search =  array();
                $search_customer_id  = @$this->input->get('search_customer_id');
                $search_name         = @$this->input->get('search_name');
                $search_mobile       = @$this->input->get('search_mobile');
                $search_alt_mobile   = @$this->input->get('search_alt_mobile');
                $state2              = @$this->input->get('state2');
                $district2           = @$this->input->get('district2');
                $city2               = @$this->input->get('city2');
                $call_direction2     = @$this->input->get('call_direction2');
                $call_type2          = @$this->input->get('call_type2'); 
                if(!empty($search_customer_id))
                {
                    $where_search['sku_id'] =  $search_customer_id;
                }
                if(!empty($search_name))
                {
                    $where_search['customer_title'] =  $search_name;
                } 
                
                if(!empty($search_mobile))
                {
                    $where_search['customer_mobile'] =  $search_mobile;
                }
                if(!empty($search_alt_mobile))
                {
                    $where_search['customer_alter_mobile'] =  $search_alt_mobile;
                }
                if(!empty($state2))
                {
                    $where_search['state'] =  $state2;
                }
                
                if(!empty($district2))
                {
                    $where_search['district'] =  $district2;
                }
                if(!empty($city2))
                {
                    $where_search['city'] =  $city2;
                } if(!empty($city2))
                {
                    $where_search['city'] =  $city2;
                }
                if(!empty($call_direction2))
                {
                    $where_search['last_call_direction'] =  $call_direction2;
                } 
                if(!empty($call_type2))
                {
                    $where_search['last_call_type'] =  $call_type2;
                }

        } 





            $this->load->library('pagination'); 

                $conditions = array(); 
                
                $uriSegment = 4; 

                // Get record count 
                

                // Pagination configuration 
                $config['base_url']    = base_url().'admin/customer/addnew/'; 
                $config['uri_segment'] = $uriSegment; 
                $config['total_rows']  = $totalRec; 
                $config['per_page']    = $this->perPage; 
                $config['use_page_numbers'] = TRUE;
                $config['reuse_query_string'] = TRUE;
             

 
  


            $config['full_tag_open'] = ' <ul class="pagination  justify-content-center mt-4" id="query-pagination">';
            $config['full_tag_close'] = '</ul> ';
             
            $config['first_link'] = 'First&nbsp;Page';
            $config['first_tag_open'] = '<li class="page-item">  ';
            $config['first_tag_close'] = '</li>';
             
            $config['last_link'] = 'Last&nbsp;Page';
            $config['last_tag_open'] ='<li class="page-item">  ';
            $config['last_tag_close'] = '</li>';
             
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li class="page-item"> ';
            $config['next_tag_close'] = ' </li>';
 
            $config['prev_link'] = 'Previous';
            $config['prev_tag_open'] = '<li class="page-item"> ';
            $config['prev_tag_close'] = '</li>';
 
            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link active">';
            $config['cur_tag_close'] = '</a></li>';
 
            $config['num_tag_open'] = '<li class="page-item"> ';
            $config['num_tag_close'] = ' </li>';

                // Initialize pagination library 
                $this->pagination->initialize($config); 
                
              

                // Define offset 
                $page = $this->uri->segment($uriSegment); 
                $offset = (!$page)?0:$page; 

                if($offset != 0){
                    $offset = ($offset-1) * $this->perPage;
                }

                // Get records 
                $conditions = array( 
                'start' => $offset, 
                'where' => $where_search, 
                'limit' => $this->perPage 
                ); 

                $conditions['userid'] = $userid;
                $conditions['form_type'] = $form_type; 
                    /* echo "<pre>";
                    print_r( $conditions);
                    echo "</pre>"; */
                $data['customers'] = $this->customer_model->getRows($conditions); 
                $data['pagination'] = $this->pagination->create_links(); 
 
                   

 
/*  echo "<pre>";
print_r($this->db->last_query());  
echo "</pre>"; 
 */



         $form_type  = $this->input->get('form_type');
         if($form_type =='search')
         {
            $customer_id    = $this->input->get('customer_id');
            $mobile         = $this->input->get('mobile');

            

            if($customer_id !=='' || $mobile !=='')
            {   
                $isserch = false;
                $where = array();
                if(!empty($customer_id))
                {   
                    $isserch = true;

                     $where['sku_id'] = $customer_id;
                }

                if(!empty($mobile))
                {
                    $isserch = true;
                     $where['customer_mobile'] = $mobile;
                }

                if($isserch)
                {

                    $customer = $this->customer_model->findDynamic($where);
                    if(!empty($customer))
                    {
                        $data['edit_data'] = $customer[0];


                        $where = array();
                        $where['customer'] = $data['edit_data']->id;
                        //$data['customer_call_dtl'] =$this->customer_call_detail($data['edit_data']->id);
                       // $data['customer_call_dtl'] = $this->customer_call_model->findDynamic($where);
                    }
                    


                     
                }



                
                 
                 
                
            }

         }
         



        $where = array();
        $where['status'] = '1';
        $where['field'] = 'id,customer_name,customer_title,sku_id';
        $data['all_customers'] = $this->customer_model->findDynamic($where);
        
        $where = array();
        $where['status'] = '1';
        $where['field'] = 'id,name,title';
        $data['all_users'] = $this->admin_model->findDynamic($where);


        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'name';
        $data['states'] = $this->state_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'name';
        $data['districts'] = $this->district_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'city';
        $data['cities'] = $this->city_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'id';
        $data['calltypes'] = $this->call_type_model->findDynamic($where);

         $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['bookings_status'] = $this->booking_status_model->findDynamic($where);
        

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['crops_status'] = $this->crop_status_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['contracts_status'] = $this->contract_status_model->findDynamic($where); 

         $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['payments_mode'] = $this->payment_mode_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['calldirections'] = $this->call_direction_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['all_products'] = $this->product_model->findDynamic($where); 

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['all_agents'] = $this->agent_model->findDynamic($where);


        $data['count_call_summary'] = $this->customer_call_model->getCallsummary($data['calltypes'],$userid); 


        $this->global['pageTitle'] = 'Add New customer';
        $this->loadViews("admin/booking/addnew", $this->global, $data , NULL);
        
    } 

    // Insert Member *************************************************************
    public function insertnow()
    {
        $this->isLoggedIn();
		$this->load->library('form_validation');            
        $this->form_validation->set_rules('customer_name','customer_name','trim|required');
        $this->form_validation->set_rules('customer_mobile','customer_mobile','trim|required');
        $this->form_validation->set_rules('product_id','product_id','trim|required');
        
        
        
        //form data 
        
        if($this->form_validation->run() == FALSE)
        {
            $this->create();
        }
        else
        {
            $form_data  = $this->input->post();

                





                if(!empty($form_data['customerid']))
                {
                    /*$where['id!=']      = $form_data['id'];
                    $last_customer_id   = $form_data['customer_id'];
                    $insertData['id']   = $form_data['id'];*/

                    $get_customerid = $form_data['customerid'];
                }else
                {


                        $where = array();
                        $where['customer_mobile']= $form_data['customer_mobile'];
                        $result = $this->customer_model->findDynamic($where);
                        if(!empty($result))
                        {
                            $get_customerid = $result[0]->id;    
                        }else
                        {

                            $where_leatest = array(); 
                            $where_leatest['orderby']   = '-id';
                            $where_leatest['field']     = 'sku_id';
                            $where_leatest['limit']     = 1;
                            $last_customerid    = $this->customer_model->findDynamic($where_leatest);
                            $last_customer_id =  str_pad((@$last_customerid[0]->sku_id)+1, 8, '0', STR_PAD_LEFT);


                            $insertData['sku_id']                = $last_customer_id;
                            $insertData['customer_name']         = $form_data['customer_name'];
                            $insertData['customer_title']        = ucfirst($form_data['customer_name']);
                            $insertData['customer_mobile']       = $form_data['customer_mobile'];
                            $insertData['customer_alter_mobile'] = $form_data['customer_alter_mobile'];
                            $insertData['state']                 = $form_data['state'];
                            $insertData['other_state']           = $form_data['other_state'];
                            $insertData['district']              = $form_data['district'];
                            $insertData['other_district']        = $form_data['other_district'];
                            $insertData['city']                  = $form_data['city'];
                            $insertData['other_city']            = $form_data['other_city'];
                            $insertData['status']                = '1';
                            $insertData['date_at']               = date("Y-m-d H:i:s");
                            $insertData['created_by']            = $this->session->userdata('userId');
                            $insertData['assigned_to']           = $this->session->userdata('userId');
                            $insertData['last_call_direction']   = 0;
                            $insertData['last_call_type']        = 0;
                            $insertData['last_follow_date']      = date("Y-m-d H:i:s");
                            $insertData['last_follower']         = $this->session->userdata('userId');
                            $insertData['last_follow_call_type'] = 0;

                             $get_customerid = $this->customer_model->save($insertData);

                        }
                        


                    
                }






                //$get_customerid

                            $insertData = array();

                            $insertData['customer_id']                = $get_customerid;
                            $insertData['customer_name']              = $form_data['customer_name'];
                            $insertData['customer_mobile']            = $form_data['customer_mobile'];
                            $insertData['customer_alter_mobile']      = $form_data['customer_alter_mobile'];
                            $insertData['father_name']                = $form_data['father_name'];
                            $insertData['state']                      = $form_data['state'];
                            $insertData['other_state']                  = $form_data['other_state'];
                            $insertData['district']                     = $form_data['district'];
                            $insertData['other_district']               = $form_data['other_district'];
                            $insertData['city']                         = $form_data['city'];
                            $insertData['other_city']                   = $form_data['other_city'];
                            $insertData['village']                      = $form_data['village'];
                            $insertData['pincode']                      = $form_data['pincode'];
                            $insertData['booking_date']                 = (isset($form_data['booking_date']) && $form_data['booking_date'] !=='')?$form_data['booking_date']:date("Y-m-d H:i:s");
                            $insertData['req_delivery_date']            = $form_data['req_delivery_date'];
                            $insertData['delivery_date']                = $form_data['delivery_date'];
                            $insertData['req_delivery_date']            = $form_data['req_delivery_date'];
                            $insertData['delivery_date']                = $form_data['delivery_date'];
                            $insertData['supply_address']               = $form_data['supply_address'];
                            $insertData['vehicle_no']                   = $form_data['vehicle_no'];
                            $insertData['agent_id']                     = $form_data['agent_id'];
                            $insertData['bank_trans_id']                = $form_data['bank_trans_id'];
                            $insertData['crates']                       = $form_data['crates'];
                            $insertData['contract']                     = $form_data['contract'];
                            $insertData['productive_plants']            = $form_data['productive_plants'];
                            $insertData['driver_name']                  = $form_data['driver_name'];
                            $insertData['booking_status']               = $form_data['booking_status'];
                            $insertData['crop_status']                  = $form_data['crop_status'];
                            $insertData['billing_address']              = $form_data['billing_address'];
                            $insertData['same_billing']                 = (isset($form_data['same_billing'])?($form_data['same_billing']):'');
                            $insertData['delivery_address']             = $form_data['delivery_address'];
                            $insertData['advance']                      = $form_data['advance'];
                            $insertData['create_date']                  = date("Y-m-d H:i:s");
                            $insertData['balance']                      = $form_data['balance'];
                            $insertData['balance']                      = $form_data['balance'];
                            $insertData['payment_mode']                 = $form_data['payment_mode'];
                            $insertData['cheque_no']                    = $form_data['cheque_no'];
                            $insertData['bank_name']                    = $form_data['bank_name'];
                            $insertData['bank_branch']                  = $form_data['bank_branch'];
                            $insertData['product_id']                   = $form_data['product_id'];
                            $insertData['uom']                          = $form_data['uom'];
                            $insertData['price']                        = $form_data['price'];
                            $insertData['quantity']                     = $form_data['quantity'];
                            $insertData['cgst_rate']                    = $form_data['cgst_rate'];
                            $insertData['sgst_rate']                    = $form_data['sgst_rate'];
                            $insertData['igst_rate']                    = $form_data['igst_rate'];
                            $insertData['cgst_amount']                  = $form_data['cgst_amount'];
                            $insertData['sgst_amount']                  = $form_data['sgst_amount'];
                            $insertData['igst_amount']                  = $form_data['igst_amount'];
                            $insertData['discount']                     = $form_data['discount'];
                            $insertData['total']                        = $form_data['total'];
                            $insertData['pending_bill']                 = $form_data['pending_bill'];
                            $insertData['created_by']                   = $this->session->userdata('userId');
                            $insertData['assigned_to']                  = $this->session->userdata('userId');

                                        $product_set = array();
                                        $product_set['product_id']                   = $form_data['product_id'];
                                        $product_set['uom']                          = $form_data['uom'];
                                        $product_set['price']                        = $form_data['price'];
                                        $product_set['quantity']                     = $form_data['quantity'];
                                        $product_set['cgst_rate']                    = $form_data['cgst_rate'];
                                        $product_set['sgst_rate']                    = $form_data['sgst_rate'];
                                        $product_set['igst_rate']                    = $form_data['igst_rate'];
                                        $product_set['cgst_amount']                  = $form_data['cgst_amount'];
                                        $product_set['sgst_amount']                  = $form_data['sgst_amount'];
                                        $product_set['igst_amount']                  = $form_data['igst_amount'];
                                        $product_set['discount']                     = $form_data['discount'];

                            $insertData['product_set']                  = json_encode($product_set);
                             
                             $result_insert = $this->booking_model->save($insertData);
                        print_r($result_insert);


 
                if(empty($result_insert))
                {
                     $this->session->set_flashdata('success', 'Booking successfully Added');

                    
                }else
                {
                     $this->session->set_flashdata('error', 'Booking  Addition failed!');
                }

                    redirect(base_url().'admin/bookings');
          }  
        
    } 

    public function insert_call_now()
    {
        $this->isLoggedIn();
        
        
        
        $this->load->library('form_validation');            
        $this->form_validation->set_rules('customer','customer_name','trim|required');
        $this->form_validation->set_rules('call_type','call_type','trim|required');
        $this->form_validation->set_rules('assign_to','assign_to','trim|required');
        $this->form_validation->set_rules('call_back_date','call_back_date','trim|required');
        $this->form_validation->set_rules('call_direction','call_direction','trim|required');
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }
        else
        {
                
                //pre($form_data);exit;
                $insertData['customer']              = $form_data['customer'];
                $insertData['call_type']                = $form_data['call_type'];
                $insertData['assign_to']                = ($form_data['assign_to']);
                $insertData['user_id']                = ($form_data['assign_to']);
                $insertData['call_back_date']           = $form_data['call_back_date'];
                $insertData['call_direction']           = $form_data['call_direction'];
                $insertData['current_conversation']     = $form_data['current_conversation'];
                $insertData['status']                   = '1';
                $insertData['date_at']                  = date("Y-m-d H:i:s");

                 
                $result = $this->customer_call_model->save($insertData);
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Call Detail successfully Added');
                }
                else
                { 
                    $this->session->set_flashdata('error', 'Call Detail Addition failed');
                }
              
            redirect('admin/customer/addnew');
          }  
        
    }

    
    // Member list
    public function ajax_list()
    {
		$list = $this->customer_model->get_datatables();
		
		$data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        foreach ($list as $currentObj) {

            $temp_date = $currentObj->date_at;
            $selected = ($currentObj->status == 0)?" selected ":"";
            $btn = '<select class="statusBtn" name="statusBtn" data-id="'.$currentObj->id.'">';
            $btn .= '<option value="1"  >Active</option>';
            $btn .= '<option value="0" '.$selected.' >Inactive</option>';
            $btn .= '</select>';
            $dateAt = date("d-m-Y H:ia", strtotime($temp_date));

            $no++;
            $row = array();
            $row[] = '<div class="btn-group">
                        <span class="badge bg-primary dropdown-toggle text-white dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                        Action<i class="mdi mdi-chevron-down"></i>
                        </span>
                        <div class="dropdown-menu" style="">
                        <a class="dropdown-item btn side_modal" data-userid="'.$currentObj->id.'"   >View</a>
                        <a class="dropdown-item text-danger deletebtn" href="#" data-userid="'.$currentObj->id.'">Delete</a>
                         
                        
                        </div>
                        </div>';

                                            /*<a  class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"  href="'.base_url().'admin/customer/edit/'.$currentObj->id.'" >
                                                                View Details
                                                            </a><a  class="btn btn-primary btn-sm btn-rounded waves-effect waves-light deletebtn  href="#" data-userid="'.$currentObj->id.'" >
                                                                Delete
                                                            </a>*/
            $row[] = $dateAt;
            
            $row[] = $currentObj->sku_id;
            $row[] = $currentObj->customer_title;
            $row[] = $currentObj->customer_mobile;
            $row[] = $currentObj->customer_alter_mobile;
            $row[] = $currentObj->state;
            $row[] = $currentObj->district;
            $row[] = $currentObj->city;
            $row[] = $currentObj->leatest_calltype;
            $row[] = $currentObj->leatest_calldir;
            
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->customer_model->count_all(),
                        "recordsFiltered" => $this->customer_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    // Status Change
 
    public function statusChange($id = NULL)
    {
        $this->isLoggedIn();
        if($_POST['id'] == null)
        {
            redirect('admin/agency');
        }

        $insertData['id'] = $_POST['id'];
        $insertData['status'] = $_POST['status'];
        $result = $this->customer_model->save($insertData);
        exit;
    } 

    // Edit
 
    public function edit($id = NULL)
    {
        

        $this->isLoggedIn();

        if($id == null)
        {
            redirect('admin/customer');
        }

        $data = array();
        
        $where = array();
        $where['status'] = '1'; 
        $where['id'] = $id; 
        $where['field'] = 'id,customer_name,customer_title,sku_id';
        $data['all_customers'] = $this->customer_model->findDynamic($where);
        
        $where = array();
        $where['status'] = '1';
        $where['field'] = 'id,name,title';
        $data['all_users'] = $this->admin_model->findDynamic($where);


        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'name';
        $data['states'] = $this->state_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'city';
        $data['cities'] = $this->city_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['calltypes'] = $this->call_type_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['calldirections'] = $this->call_direction_model->findDynamic($where);
        

        $data['edit_data'] = $this->customer_model->find($id);
        $this->global['pageTitle'] = 'Agency ';
        $this->loadViews("admin/customer/edit", $this->global, $data , NULL);
        
    } 

    // Delete  *****************************************************************
      function delete()
    {
        
        $this->isLoggedIn();
        $delId = $this->input->post('id');  
        
        $result = $this->customer_model->delete($delId); 
            
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }

    // Update Agency*************************************************************
    public function update()
    {
		
        $this->isLoggedIn();
        
        
        
        $this->load->library('form_validation');            
        $this->form_validation->set_rules('customer_name','customer_name','trim|required');
        $this->form_validation->set_rules('customer_mobile','customer_mobile','trim|required');
        
        
        $this->form_validation->set_rules('call_type','call_type','trim|required');
        $this->form_validation->set_rules('assign_to','assign_to','trim|required');
        $this->form_validation->set_rules('call_back_date','call_back_date','trim|required');
        $this->form_validation->set_rules('call_direction','call_direction','trim|required');
        
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->edit($form_data['id']);
        }
        else
        {

                $insertData = array();
                $where = array();
                $where['customer_mobile'] = $form_data['customer_mobile'];

                $where['id!=']      = $form_data['id'];
 

                $exist_mobile    = $this->customer_model->findDynamic($where);
                if(empty($exist_mobile))
                {
                    //pre($form_data);exit;
                $insertData['id']                    = $form_data['id'];
                $insertData['customer_name']         = $form_data['customer_name'];
                $insertData['customer_title']        = ucfirst($form_data['customer_name']);
                $insertData['customer_mobile']       = $form_data['customer_mobile'];
                $insertData['customer_alter_mobile'] = $form_data['customer_alter_mobile'];
                $insertData['state']                 = $form_data['state'];
                $insertData['other_state']           = $form_data['other_state'];
                $insertData['district']              = $form_data['district'];
                $insertData['other_district']        = $form_data['other_district'];
                $insertData['city']                  = $form_data['city'];
                $insertData['other_city']                  = $form_data['other_city'];
                $insertData['status']                = '1';
                $insertData['date_at']               = date("Y-m-d H:i:s");
                $insertData['created_by']            = $this->session->userdata('userId');
                $insertData['assigned_to']           = $form_data['assign_to'];
                $insertData['last_call_direction']   = $form_data['call_direction'];
                $insertData['last_call_type']        = $form_data['call_type'];
                $insertData['last_follow_date']      = date("Y-m-d H:i:s");
                $insertData['last_follower']         = $this->session->userdata('userId');
                $insertData['last_follow_call_type'] = $form_data['call_type'];

               
                 
                $result = $this->customer_model->save($insertData);
                if($result > 0)
                {

                    $insertData = array();
                    /**insert data for call recording**/
                    $insertData['customer']                 = $result;
                    $insertData['call_type']                = $form_data['call_type'];
                    $insertData['assign_to']                = ($form_data['assign_to']);
                    $insertData['user_id']                  = ($form_data['assign_to']);
                    $insertData['call_back_date']           = $form_data['call_back_date'];
                    $insertData['call_direction']           = $form_data['call_direction'];
                    $insertData['current_conversation']     = $form_data['current_conversation'];
                    $insertData['status']                   = '1';
                    $insertData['date_at']                  = date("Y-m-d H:i:s");


                    $result = $this->customer_call_model->save($insertData);
                    


                    
                    /**insert data for call recording**/





                    $this->session->set_flashdata('success', 'Customer successfully Updated');
                }
                else
                { 
                    $this->session->set_flashdata('error', 'Customer Updation  failed');
                }
                }else
                {
                         $this->session->set_flashdata('error', 'Customer With Mobile Already Added');
                }



               
              
            
          } 

          redirect(base_url().'admin/customer/edit/'.$form_data['id']); 
        
    }

    public function customer_call_detail()
    {
         $form_data  = $this->input->post('id');
         $id = $form_data;
        if(empty($id))
        {
            $result = array();
        }else
        {
            /*start data*/
            $this->db->select('cc.*,user.title as username, call.title as calltype, direction.title as calldirection');
            $this->db->from('z_customer_call as cc');
            $this->db->where('cc.customer', $id);
            $this->db->join('z_admin as user', 'user.id = cc.assign_to', 'left');
            $this->db->join('z_call_type as call', 'call.id = cc.call_type', 'left');
            $this->db->join('z_call_direction as direction', 'direction.id = cc.call_direction', 'left');
            $this->db->order_by("cc.id", "desc");
            $query = $this->db->get(); 
            $result = $query->result_array();        

        /*end  data*/

        }
        $result = json_encode($result);
        echo  $result;
        


    }

    public function state_change($state_id='',$selectedDistrict='')
    {
          
        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'name';
        if(!empty($state_id))
        {
            $where['state_id'] = $state_id;
        }
        $districts = $this->district_model->findDynamic($where);
        $html_content = '<option value="">Choose District</option>';
        if(!empty($districts))
        {
            foreach ($districts as $district ) {
                $selected = '';
                if(isset($selectedDistrict) && $selectedDistrict ==$district->id)
                {
                    $selected = 'selected';
                }
                $html_content.= '<option value="'.$district->id .'" '.$selected.'>'.$district->name .'</option>';
            }    
        }
        echo $html_content;
        
    } 
    public function district_change($district_id='',$selected_city='')
    {
          
        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'city';
        if(!empty($district_id))
        {
            $where['district_id'] = $district_id;
        }
        $cities = $this->city_model->findDynamic($where);
        $html_content = '<option value="">Choose Tehsil</option>';
        if(!empty($cities))
        {
            foreach ($cities as $city ) {
                $selected = '';
                if(isset($selected_city) && $selected_city ==$city->id)
                {
                    $selected = 'selected';
                }
                $html_content.= '<option value="'.$city->id .'" '.$selected.'>'.$city->city .'</option>';
            }    
        }
        echo $html_content;
        
    }



    
    
    
}

?>