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
        $where['orderby'] = 'title';
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
        $data['calldirections'] = $this->call_direction_model->findDynamic($where);


        $data['count_call_summary'] = $this->customer_call_model->getCallsummary($data['calltypes'],$userid); 

         
        $this->global['pageTitle'] = 'Booking';
        $this->loadViews("admin/booking/list", $this->global, $data , NULL);
        
    }

    // Add New 

    public function addnew()
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
        $where['orderby'] = 'title';
        $data['calltypes'] = $this->call_type_model->findDynamic($where);

         $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['bookings_status'] = $this->booking_status_model->findDynamic($where);

        $where = array();
        $where['status'] = '1';
        $where['orderby'] = 'title';
        $data['calldirections'] = $this->call_direction_model->findDynamic($where);


        $data['count_call_summary'] = $this->customer_call_model->getCallsummary($data['calltypes'],$userid); 


        $this->global['pageTitle'] = 'Add New customer';
        $this->loadViews("admin/customer/addnew", $this->global, $data , NULL);
        
    } 

    // Insert Member *************************************************************
    public function insertnow()
    {
        $this->isLoggedIn();
		$this->load->library('form_validation');            
        $this->form_validation->set_rules('customer_name','customer_name','trim|required');
        $this->form_validation->set_rules('customer_mobile','customer_mobile','trim|required');
        /*$this->form_validation->set_rules('state','state','trim|required');
        $this->form_validation->set_rules('city','city','trim|required');*/

        
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

            $redirect_url = $form_data['redirect_url'];

            $where = array();
            if($form_data['state'])
            {
                $state_id = $form_data['state'];
                $state_detail = $this->state_model->find($state_id);
                
                if($state_detail->name =='Other')
                {
                    $other_state = $form_data['other_state'];
                    
                }
            }
            

            $where = array();
            $where['customer_mobile']= $form_data['customer_mobile'];





                if(!empty($form_data['id']))
                {
                    $where['id!=']      = $form_data['id'];
                    $last_customer_id   = $form_data['customer_id'];
                    $insertData['id']   = $form_data['id'];
                }else
                {
                    $where_leatest = array(); 
                    $where_leatest['orderby']   = '-id';

                    $where_leatest['field']     = 'sku_id';
                    $where_leatest['limit']     = 1;
                    $last_customerid    = $this->customer_model->findDynamic($where_leatest);

                    $last_customer_id =  str_pad((@$last_customerid[0]->sku_id)+1, 8, '0', STR_PAD_LEFT);
                }
                $exist_mobile    = $this->customer_model->findDynamic($where);
                if(empty($exist_mobile))
                {
                    //pre($form_data);exit;
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





                    $this->session->set_flashdata('success', 'Customer successfully Added');
                }
                else
                { 
                    $this->session->set_flashdata('error', 'Customer Addition failed');
                }
                }else
                {
                         $this->session->set_flashdata('error', 'Customer Already Added');
                }



               
              
            redirect($redirect_url);
            //redirect('admin/customer/addnew'.$redirec_url);
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