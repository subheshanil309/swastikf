<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Bookings extends BaseController
{


   
    public function __construct()
    {
        parent::__construct();
         $this->load->model('admin/company_model');
        $this->load->model('admin/booking_model');
        $this->load->model('admin/booking_log_model');
        $this->load->model('admin/booking_status_model');
        $this->load->model('admin/booking_payments_model');
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

            
            
 
            $conditions = array(); 
            $where_search = array();

            $data['edit_data'] = array();
            $data['customer_call_dtl'] = array();

            $form_type  = $this->input->get('form_type');
            
                
        

                $where_search =  array();
                $search_customer_id  = @$this->input->get('customer_id');
                $search_name         = @$this->input->get('customer_name');
                $search_mobile       = @$this->input->get('customer_mobile');
                $search_alt_mobile   = @$this->input->get('customer_alter_mobile');
                $state2              = @$this->input->get('state2');
                $other_state         = @$this->input->get('other_state');
                $district2           = @$this->input->get('district2');
                $other_district      = @$this->input->get('other_district');
                $city2               = @$this->input->get('city2');
                $other_city          = @$this->input->get('other_city');
                $call_direction2     = @$this->input->get('call_direction2');
                $call_type2          = @$this->input->get('call_type2'); 
                $booking_no          = @$this->input->get('booking_no'); 
                $booking_date        = @$this->input->get('booking_date'); 
                $booking_status      = @$this->input->get('booking_status'); 
                $crop_status         = @$this->input->get('crop_status'); 
                $agent_id            = @$this->input->get('agent_id'); 
                $product_id          = @$this->input->get('product_id'); 
                $address             = @$this->input->get('address'); 
                $pincode             = @$this->input->get('pincode'); 
                $quantity            = @$this->input->get('quantity'); 
                $unit_price          = @$this->input->get('unit_price'); 
                $discount            = @$this->input->get('discount'); 
                $req_delivery_date   = @$this->input->get('req_delivery_date'); 
                $delivery_date       = @$this->input->get('delivery_date'); 
                $vehicle_no          = @$this->input->get('vehicle_no'); 
                $contract            = @$this->input->get('contract'); 
                $start_date            = @$this->input->get('start_date'); 
                $end_date            = @$this->input->get('end_date'); 
                if(!empty($start_date))
                {
                     $where_search['start_date'] =  $start_date;
                 } if(!empty($end_date))
                {
                     $where_search['end_date'] =  $end_date;
                 } if(!empty($contract))
                {
                     $where_search['contract'] =  $contract;
                 }
                 if(!empty($vehicle_no))
                {
                     $where_search['vehicle_no'] =  $vehicle_no;
                 }
                 if(!empty($delivery_date))
                {
                     $where_search['delivery_date'] =  $delivery_date;
                 }
                 if(!empty($quantity))
                {
                     $where_search['quantity'] =  $quantity;
                 }
                 if(!empty($discount))
                {
                     $where_search['discount'] =  $discount;
                 }if(!empty($unit_price))
                {
                     $where_search['price'] =  $unit_price;
                 }
                 if(!empty($pincode))
                {
                     $where_search['pincode'] =  $pincode;
                 }
                 if(!empty($other_state))
                {
                     $where_search['other_state'] =  $other_state;
                 }
                 if(!empty($other_district))
                {
                     $where_search['other_district'] =  $other_district;
                 }
                   if(!empty($other_city))
                {
                     $where_search['other_city'] =  $other_city;
                 }

                 if(!empty($address))
                {
                     $where_search['billing_address'] =  $address;
                 }
                 if(!empty($product_id))
                {
                     $where_search['product_id'] =  $product_id;
                 }
                
                if(!empty($agent_id))
                {
                     $where_search['agent_id'] =  $agent_id;
                      
                }
                if(!empty($crop_status))
                {
                      $where_search['crop_status'] =  $crop_status;
                }
                if(!empty($booking_status) && $booking_status !=='all')
                {
                     $where_search['booking_status'] =  $booking_status;
                }
                if(!empty($booking_date))
                {
                     $where_search['booking_date'] =  $booking_date;
                }
                if(!empty($booking_no))
                {
                    $where_search['id'] =  $booking_no;
                }
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
                }  
               /* if(!empty($call_direction2))
                {
                    $where_search['last_call_direction'] =  $call_direction2;
                } 
                if(!empty($call_type2))
                {
                    $where_search['last_call_type'] =  $call_type2;
                }*/

            

            $conditions['returnType'] = 'count'; 
            $conditions['userid'] = $userid; 
            $conditions['form_type'] = $form_type; 
            $conditions['where'] = $where_search; 
            $totalRec = $this->booking_model->getRows($conditions);

             




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
                'userid' =>  $userid, 
                'form_type' => $form_type, 
                'limit' => $this->perPage 
                ); 

                
                    /*$conditions['userid'] = $userid;
                $conditions['form_type'] = $form_type;  echo "<pre>";
                    print_r( $conditions);
                    echo "</pre>"; */

                 $data['bookings']   = $this->booking_model->getRows($conditions); 
                $data['pagination'] = $this->pagination->create_links(); 
 
                $data['pagination_total_count'] =  $totalRec;
 
                   

/* 
  echo "<pre>";
print_r($this->db->last_query());  
echo "</pre>";  */



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
        $where['admin_type'] = '2';
        $where['orderby'] = 'title';
        $data['all_agents'] = $this->admin_model->findDynamic($where);
        

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
            $bookingwhere['title']  = 'all';

            $count_booking =  $this->booking_model->get_booking_data($bookingwhere,$userid); 
            $filter_bookings_status = array();
            $filter_bookings_status['title'] = 'All' ;
            $filter_bookings_status['slug'] = 'all';
            $filter_bookings_status['count_booking'] = count($count_booking) ;
            $result_bookings_status[] = $filter_bookings_status;


            foreach ($data['bookings_status'] as $bookingstatus)
            {
                $bookingwhere  = array(); 
                $bookingwhere['title']  = $bookingstatus->slug;
                $count_booking =  $this->booking_model->get_booking_data($bookingwhere,$userid); 

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
            $userid = $this->session->userdata('userId');

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
        $where['admin_type'] = '2';
        $where['orderby'] = 'title';
        $data['all_agents'] = $this->admin_model->findDynamic($where);


        $data['count_call_summary'] = $this->customer_call_model->getCallsummary($data['calltypes'],$userid); 


        $this->global['pageTitle'] = 'Add New Booking';
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


                              if(isset($_FILES['document_file']['name']) && $_FILES['document_file']['name'] != '') {

                                    $f_name         =$_FILES['document_file']['name'];
                                    $f_tmp          =$_FILES['document_file']['tmp_name'];
                                    $f_size         =$_FILES['document_file']['size'];
                                    $f_extension    =explode('.',$f_name);
                                    $f_extension    =strtolower(end($f_extension));
                                    $f_newfile      =uniqid().'.'.$f_extension;
                                    $store          ="uploads/admin/document/".$f_newfile;
                                
                                    if(!move_uploaded_file($f_tmp,$store))
                                    {
                                        $this->session->set_flashdata('error', 'Image Upload Failed .');
                                    }
                                    else
                                    {
                                       $insertData['document'] = $f_newfile;
                                       
                                    }
                                 }


                                 $str = $form_data['req_delivery_date'];
                            $exploded_data = explode(":",$str);

                            $start_date = $exploded_data[0];
                            $end_date = $exploded_data[1];



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
                            $insertData['delivery_expect_start_date']   = $start_date;
                            $insertData['delivery_expect_end_date']     = $end_date;
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
                            $insertData['payment_mode']                 = $form_data['payment_mode'];
                            $insertData['cheque_no']                    = $form_data['cheque_no'];
                            $insertData['bank_name']                    = $form_data['bank_name'];
                            $insertData['bank_branch']                  = $form_data['bank_branch'];
                            $insertData['product_id']                   = $form_data['product_id'];
                            $insertData['uom']                          = $form_data['uom'];
                            $insertData['price']                        = $form_data['price'];
                            $insertData['tax_rate']                     = $form_data['gst'];
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
                             
                                $result_insert  = $this->booking_model->save($insertData);
                                $single_arr     = $this->booking_model->find($result_insert);
                                $logged         = $this->booking_log_model->booking_log($single_arr);



                         

 
                if(!empty($result_insert))
                {
                    if($form_data['advance']  >0)
                    {
                        $insertData = array();
                        $insertData['amount']                      = $form_data['advance'];
                        $insertData['date_at']                      = date("Y-m-d H:i:s");
                        $insertData['payment_date']                 =  $form_data['create_date'];
                        $insertData['created_by']                 =  $this->session->userdata('userId');
                        $insertData['booking_id']                   = $result_insert;
                        $insertData['customer_id']                  = $get_customerid;
                        $insertData['payment_mode']                 = $form_data['payment_mode'];
                        $insertData['cheque_no']                    = $form_data['cheque_no'];
                        $insertData['bank_name']                    = $form_data['bank_name'];
                        $insertData['bank_branch']                  = $form_data['bank_branch'];
                        $insertData['company_id']                  = 1;
                         $this->booking_payments_model->save($insertData);
                    }
                        


                        //booking_payments_model






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


            $data = array();






            $data['edit_data'] = array();

 
         



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
         $where['admin_type'] = '2';
        $where['orderby'] = 'title';
        $data['all_agents'] = $this->admin_model->findDynamic($where);


         $data['edit_data'] = $this->booking_model->find($id); 
          
            $data['payment_details']    = $this->booking_payments_model->getPaymentDetail($id); 


        $this->global['pageTitle'] = 'Edit New Booking';
         
        $this->loadViews("admin/booking/edit", $this->global, $data , NULL);
        
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


                              if(isset($_FILES['document_file']['name']) && $_FILES['document_file']['name'] != '') {

                                    $f_name         =$_FILES['document_file']['name'];
                                    $f_tmp          =$_FILES['document_file']['tmp_name'];
                                    $f_size         =$_FILES['document_file']['size'];
                                    $f_extension    =explode('.',$f_name);
                                    $f_extension    =strtolower(end($f_extension));
                                    $f_newfile      =uniqid().'.'.$f_extension;
                                    $store          ="uploads/admin/document/".$f_newfile;
                                
                                    if(!move_uploaded_file($f_tmp,$store))
                                    {
                                        $this->session->set_flashdata('error', 'Image Upload Failed .');
                                    }
                                    else
                                    {
                                       $insertData['document'] = $f_newfile;
                                       
                                    }
                                 }


                                 $str = $form_data['req_delivery_date'];
                            $exploded_data = explode(":",$str);

                            $start_date = $exploded_data[0];
                            $end_date = $exploded_data[1];



                            $insertData['id']                = $form_data['id'];
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
                            $insertData['delivery_expect_start_date']   = $start_date;
                            $insertData['delivery_expect_end_date']     = $end_date;
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
                            $insertData['tax_rate']                     = $form_data['gst'];
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
                             
                                $result_insert  = $this->booking_model->save($insertData);
                                $single_arr     = $this->booking_model->find($form_data['id']);
                                $logged         = $this->booking_log_model->booking_log($single_arr);



                         

 
                if(!empty($result_insert))
                {
                     $this->session->set_flashdata('success', 'Booking successfully Update');

                    
                }else
                {
                     $this->session->set_flashdata('error', 'Booking  Update failed!');
                }

                    
          }  

          redirect(base_url().'admin/bookings/'.$form_data['id'].'/edit'); 
        
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

    public function change_booking_status($id)
    {

        
        $this->isLoggedIn();
        $update_booking_status  = $this->input->post('update_booking_status');
        $insertData                 = array();
        $insertData['id']           = $id;
        $insertData['booking_status']= $update_booking_status;
        $result = $this->booking_model->save($insertData);
        $single_arr     = $this->booking_model->find($id);
        $logged         = $this->booking_log_model->booking_log($single_arr);

        $response_result = array(
                'status'=>0,
                'message'=>''
        );

        if($result)
        {
            $response_result = array(
                'status'=>1,
                'message'=>'Update Changes Successfully !'
            );
        }else
        {
            $response_result = array(
                'status'=>0,
                'message'=>'Failed Update Changes!'
            );
        }

        echo json_encode($response_result);


         
    }


    public function single($id='')
    {
         $this->isLoggedIn();
        $single_arr = $this->booking_model->find($id);
         
        echo  json_encode($single_arr);
    }
    public function booking_logs($id='')
    {
         $this->isLoggedIn();
         $userid = $this->session->userdata('userId');
         $where_search['booking_id'] = $id;
         $conditions = array( 
                    'where' => $where_search, 
                    'userid' =>  $userid, 
                 ); 
        $booking_logs = $this->booking_log_model->getRows($conditions);
         
        if(!empty($booking_logs))
        {
            $arra_empt = [];
            foreach ($booking_logs as $bookin_log)
            {
                 

                   $arra_empt2=[];
                    $arra_empt2['id']                    =$bookin_log['id'];
                    $arra_empt2['booking_id']            =$bookin_log['booking_id'];
                    $arra_empt2['stage']                 =$bookin_log['stage'];
                    $arra_empt2['customer_id']           =$bookin_log['customer_id'];
                    $arra_empt2['customer_name']         =$bookin_log['customer_name'];
                    $arra_empt2['customer_mobile']       =$bookin_log['customer_mobile'];
                    $arra_empt2['customer_alter_mobile'] =$bookin_log['customer_alter_mobile'];
                    $arra_empt2['father_name']           =$bookin_log['father_name'];
                    $arra_empt2['state']                 =$bookin_log['state'];
                    $arra_empt2['other_state']           =$bookin_log['other_state'];
                    $arra_empt2['district']              =$bookin_log['district'];
                    $arra_empt2['other_district']        =$bookin_log['other_district'];
                    $arra_empt2['city']                  =$bookin_log['city'];
                    $arra_empt2['other_city']            =$bookin_log['other_city'];
                    $arra_empt2['village']               =$bookin_log['village'];
                    $arra_empt2['pincode']               =$bookin_log['pincode'];
                    $arra_empt2['booking_date']          =date('d M Y',strtotime($bookin_log['booking_date']));
                    $arra_empt2['req_delivery_date']     =$bookin_log['req_delivery_date'];
                    $arra_empt2['delivery_date']         =($bookin_log['delivery_date']=='0000-00-00' || $bookin_log['delivery_date']==null)?'':date('d M Y',strtotime($bookin_log['delivery_date']));
                    $arra_empt2['supply_address']        =$bookin_log['supply_address'];
                    $arra_empt2['vehicle_no']            =$bookin_log['vehicle_no'];
                    $arra_empt2['agent_id']              =$bookin_log['agent_id'];
                    $arra_empt2['crates']                =$bookin_log['crates'];
                    $arra_empt2['bank_trans_id']         =$bookin_log['bank_trans_id'];
                    $arra_empt2['contract']              =$bookin_log['contract'];
                    $arra_empt2['productive_plants']     =$bookin_log['productive_plants'];
                    $arra_empt2['driver_name']           =$bookin_log['driver_name'];
                    $arra_empt2['booking_status']        =$bookin_log['booking_status'];
                    $arra_empt2['crop_status']           =$bookin_log['crop_status'];
                    $arra_empt2['billing_address']       =$bookin_log['billing_address'];
                    $arra_empt2['same_billing']          =$bookin_log['same_billing'];
                    $arra_empt2['delivery_address']      =$bookin_log['delivery_address'];
                    $arra_empt2['advance']               =number_format($bookin_log['advance'],2);
                    $arra_empt2['create_date']           =date('d M Y',strtotime($bookin_log['create_date']));
                    $arra_empt2['balance']               =$bookin_log['balance'];
                    $arra_empt2['payment_mode']          =$bookin_log['payment_mode'];
                    $arra_empt2['cheque_no']             =$bookin_log['cheque_no'];
                    $arra_empt2['bank_name']             =$bookin_log['bank_name'];
                    $arra_empt2['bank_branch']           =$bookin_log['bank_branch'];
                    $arra_empt2['product_id']            =$bookin_log['product_id'];
                    $arra_empt2['uom']                   =$bookin_log['uom'];
                    $arra_empt2['price']                 =number_format($bookin_log['price'],2);
                    $arra_empt2['quantity']              =$bookin_log['quantity'];
                    $arra_empt2['cgst_rate']             =$bookin_log['cgst_rate'];
                    $arra_empt2['sgst_rate']             =$bookin_log['sgst_rate'];
                    $arra_empt2['igst_rate']             =$bookin_log['igst_rate'];
                    $arra_empt2['cgst_amount']           =$bookin_log['cgst_amount'];
                    $arra_empt2['sgst_amount']           =$bookin_log['sgst_amount'];
                    $arra_empt2['igst_amount']           =$bookin_log['igst_amount'];
                    $arra_empt2['discount']              =number_format($bookin_log['discount'],2);
                    $arra_empt2['total']                 =number_format($bookin_log['total'],2);
                    $arra_empt2['pending_bill']          =$bookin_log['pending_bill'];
                    $arra_empt2['status']                =$bookin_log['status'];
                    $arra_empt2['created_by']            =$bookin_log['created_by'];
                    $arra_empt2['date_at']               =date('d M Y',strtotime($bookin_log['date_at']));
                    $arra_empt2['document']              =(isset($bookin_log['document'])?"<a href='".base_url()."uploads/admin/document/".$bookin_log['document']."'>":"");
                    $arra_empt2['assigned_to']           =$bookin_log['assigned_to'];
                    $arra_empt2['delivery_expect_start_date']=($bookin_log['delivery_expect_start_date']=='0000-00-00' || $bookin_log['delivery_expect_start_date']==null)?'':date('d M Y',strtotime($bookin_log['delivery_expect_start_date']));
                    $arra_empt2['delivery_expect_end_date']=($bookin_log['delivery_expect_end_date']=='0000-00-00' || $bookin_log['delivery_expect_end_date']==null)?'':date('d M Y',strtotime($bookin_log['delivery_expect_end_date']));
                    $arra_empt2['update_at']             =date('d M Y',strtotime($bookin_log['update_at']));
                    $arra_empt2['company_id']            =$bookin_log['company_id'];
                    $arra_empt2['createdby']             =$bookin_log['createdby'];
                    $arra_empt2['booked_status']         =$bookin_log['booked_status'];
                    $arra_empt2['booked_badges']         =$bookin_log['booked_badges'];
                    $arra_empt2['executive']             =$bookin_log['executive'];
                    $arra_empt2['productname']           =$bookin_log['productname'];
                    $arra_empt2['paymentmodename']       =$bookin_log['paymentmodename'];
                    $arra_empt2['contractstatusname']    =$bookin_log['contractstatusname'];
                    $arra_empt2['assignedto']            =$bookin_log['assignedto'];
                    $arra_empt2['cropstatusname']        =$bookin_log['cropstatusname'];

                    $arra_empt[]= $arra_empt2;
            }
        }
        echo  json_encode($arra_empt);
    }

    public function receipt($id)
    {

        $this->isLoggedIn();

        $data = array();
         $userid = $this->session->userdata('userId');
         $where_search['id'] = $id;
         $conditions = array( 
                    'where' => $where_search 
                 ); 
        $booked = $this->booking_model->getRows($conditions);
         $data['company_details'] = '';
         $data['receipt_dtl'] = '';
        if(!empty($booked))
        {
            $receipt_dtl = $booked[0];

            $where_search =  array();
            $where_search['id'] = $receipt_dtl['company_id'];
            $conditions = array( 
                'where' => $where_search 
            ); 

             $data['receipt_dtl'] = $receipt_dtl;
             $company_details = $this->company_model->findCompanyDetail($conditions);

            if(!empty($company_details))
            {
                $data['company_details'] =   $company_details[0];   
            }
           

            
        }
        
 
        $this->global['pageTitle'] = 'Booking Receipt';
        $this->loadViews("admin/booking/booking-reciept", $this->global, $data , NULL);

    }
    public function agreement($id)
    {

        $this->isLoggedIn();

        $data = array();
         $userid = $this->session->userdata('userId');
         $where_search['id'] = $id;
         $conditions = array( 
                    'where' => $where_search 
                 ); 
        $booked = $this->booking_model->getRows($conditions);
         $data['company_details'] = '';
         $data['receipt_dtl'] = '';
        if(!empty($booked))
        {
            $receipt_dtl = $booked[0];

            $where_search =  array();
            $where_search['id'] = $receipt_dtl['company_id'];
            $conditions = array( 
                'where' => $where_search 
            ); 

             $data['receipt_dtl'] = $receipt_dtl;
             $company_details = $this->company_model->findCompanyDetail($conditions);

            if(!empty($company_details))
            {
                $data['company_details'] =   $company_details[0];   
            }
           

            
        }
        
 
        $this->global['pageTitle'] = 'Booking Agreement';
        $this->loadViews("admin/booking/booking-agreement", $this->global, $data , NULL);

    }
    public function view($id)
    {

        $this->isLoggedIn();

        $data = array();
         $userid = $this->session->userdata('userId');
         $where_search['id'] = $id;
         $conditions = array( 
                    'where' => $where_search 
                 ); 
        $booked = $this->booking_model->getRows($conditions);
         $data['company_details'] = '';
         $data['receipt_dtl'] = '';
        if(!empty($booked))
        {
            $receipt_dtl = $booked[0];

            $where_search =  array();
            $where_search['id'] = $receipt_dtl['company_id'];
            $conditions = array( 
                'where' => $where_search 
            ); 

             $data['receipt_dtl'] = $receipt_dtl;
             $company_details = $this->company_model->findCompanyDetail($conditions);

            if(!empty($company_details))
            {
                $data['company_details'] =   $company_details[0];   
            }
           

            
        }
        
 
        $this->global['pageTitle'] = 'Booking View';
        $this->loadViews("admin/booking/booking-view", $this->global, $data , NULL);

    }



    
    
    
}

?>