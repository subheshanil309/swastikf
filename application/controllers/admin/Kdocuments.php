<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.

 * @since : 15 November 2016
 */
class Kdocuments extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
       parent::__construct();
       $this->load->model('admin/document_model');
       $this->load->model('admin/document_category_model');
       $this->load->model('admin/crop_model');
    }


    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Product';
        $this->loadViews("admin/document/list", $this->global, NULL , NULL);
        
    }

    // Add New 
    public function addnew()
    {
		$this->isLoggedIn();
        $data = array();
        // category  
        $where = array(); 
        $where['status'] = '1'; 
        $category_list = $this->document_category_model->findDynamic($where);
        $data['category_lists'] =  $category_list;

        $where = array(); 
        $where['status'] = '1'; 
        $crop_list = $this->crop_model->findDynamic($where);
        $data['crop_lists'] =  $crop_list;

		 
        $this->global['pageTitle'] = 'Add New Kdocument';
        $this->loadViews("admin/document/addnew", $this->global, $data , NULL);
        
    } 
	
	 

    // Insert Member *************************************************************
    public function insertnow()
    {
        $this->isLoggedIn();
		$form_data  = $this->input->post();
		 
		$this->load->library('form_validation');            
        $this->form_validation->set_rules('crop_id','Crop','trim|required');
        $this->form_validation->set_rules('name','Problem Name','trim|required');
        $this->form_validation->set_rules('document_cat_id','Category Id','trim|required');
         
          
         //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }
        else
        {
	       
                // check already exist
                $form_data['name'] =  ($form_data['name']);
                $form_data['title'] =  ($form_data['name']);
                 
                $where = array();
                $where['name']              =  $form_data['name'];
                $where['document_cat_id']   = $form_data['document_cat_id'];
                $where['status']            = $form_data['status1'];
 

                $returnData = $this->document_model->findDynamic($where);

            if(!empty($returnData))
            {
                 $this->session->set_flashdata('error', $form_data['name'].' already exist.');
                 $this->addnew();
            }else
            {

                         


                     

                     $insertData = array();
                            $all_images  = array();
 
                            if(!empty($_FILES['files']))
                            {
                                 

                                  $total_images = count($_FILES['files']);
                                for ($i=0; $i < $total_images; $i++) {

                                   if(isset($_FILES['files']['name'][$i]) && $_FILES['files']['error'][$i] ==0)
                                  {
                                         $f_name        =$_FILES['files']['name'][$i];
                                        $f_tmp          =$_FILES['files']['tmp_name'][$i];
                                        $f_size         =$_FILES['files']['size'][$i];
                                        $f_extension    =explode('.',$f_name);
                                        $f_extension    =strtolower(end($f_extension));
                                        $f_newfile      =uniqid().'.'.$f_extension;
                                        $store          ="uploads/admin/document/problem/".$f_newfile;
                                         
                                        if(!move_uploaded_file($f_tmp,$store))
                                        {
                                            $this->session->set_flashdata('error', 'Images Upload Failed .');
                                        }
                                        else
                                        {
                                           $all_images[] = $f_newfile;
                                           
                                        }
                                     }
                                }

                                 
                                    
                            }
                    $insertData['images'] = json_encode($all_images);


                    $insertData['name']                 = $form_data['name'];
                    $insertData['title']                = $form_data['title'];
                    $insertData['crop_id']              = $form_data['crop_id'];
                    $insertData['root_cause']           = base64_encode($form_data['root_cause']);
                    $insertData['treatment']           = base64_encode($form_data['treatment']);
                    $insertData['document_cat_id']      = $form_data['document_cat_id'];
                    $insertData['status']               = $form_data['status1'];
                    $insertData['date_at']              = date("Y-m-d H:i:s");
                    $insertData['created_by']           = $this->session->userdata('userId');
             
            
            
                $result = $this->document_model->save($insertData);
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Problem successfully Added');
                }
                else
                { 
                    $this->session->set_flashdata('error', 'Problem Addition failed');
                }
            }
            


                    
            redirect(base_url().'admin/kdocuments');
          }  
        
    }


    //  list
    public function ajax_list()
    {
	
		$list = $this->document_model->get_datatables();
		
		$data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
        $role = $this->session->userdata('role');
        foreach ($list as $currentObj) {

            $temp_date = $currentObj->date_at;
            $date_at = date("d-m-Y", strtotime($temp_date));
            $no++;
            $row = array();
              // $temp_date = $currentObj->date_at;
            $selected = ($currentObj->status == 0)?" selected ":"";
            $btn = '<select class="statusBtn form-control form-control-sm " name="statusBtn" data-id="'.$currentObj->id.'">';
            $btn .= '<option value="1" '.(($currentObj->status ==1)?" selected ":"").' >Active</option>';
            $btn .= '<option value="0" '.(($currentObj->status ==0)?" selected ":"").'  >Inactive</option>';
            $btn .= '</select>';

            $row[] =  $currentObj->id;
            $row[] =  $currentObj->category;
            $row[] =  $currentObj->title;
            $row[] =   $btn;;
            $row[] = $date_at;
             
         $delete_btn = ' ';
        if($role==1)
        {
              
              $delete_btn = '<a class="btn btn-sm btn-danger deletebtn" href="#" data-userid="'.$currentObj->id.'"><i class="fa fa-trash"></i></a>';
        } 
            
            $row[] = '<a title="'.$currentObj->slug.'" class="btn btn-sm btn-info" href="'.base_url().'admin/kdocuments/edit/'.$currentObj->id.'"><i class="fa fa-pen"></i></a>'. $delete_btn;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->document_model->count_all(),
                        "recordsFiltered" => $this->document_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    // Edit
 
    public function edit($id = NULL)
    {
        $this->isLoggedIn();
		if($id == null)
        {
            redirect('admin/kdocuments');
        }
        $this->isLoggedIn();
        $data = array();
        // category  
        $where = array(); 
        $where['status'] = '1'; 
        $category_list = $this->document_category_model->findDynamic($where);
        $data['category_lists'] =  $category_list;

        $where = array(); 
        $where['status'] = '1'; 
        $crop_list = $this->crop_model->findDynamic($where);
        $data['crop_lists'] =  $crop_list;

 
        // edit data 
        $data['edit_data'] = $this->document_model->find($id);
        if(empty($data['edit_data']))
        {
             $this->session->set_flashdata('error', 'Data Not Found');
            redirect(base_url().'admin/kdocuments');
        }
       
        $this->global['pageTitle'] = 'Edit Kdocument';
        $this->loadViews("admin/document/edit", $this->global, $data , NULL);
    } 

    // Update *************************************************************
    public function update()
    {
		$form_data  = $this->input->post();
         
        $this->load->library('form_validation');            
        $this->form_validation->set_rules('crop_id','Crop','trim|required');
        $this->form_validation->set_rules('name','Problem Name','trim|required');
        $this->form_validation->set_rules('document_cat_id','Category Id','trim|required');
        
        
        if($this->form_validation->run() == FALSE)
        {
			
                $this->edit($form_data['id']);
        }
        else
        {


                $form_data['name'] =  ($form_data['name']);
                $form_data['title'] =  ($form_data['name']);
                
                $where['name']                  =  $form_data['name'];
                $where['document_cat_id']       = $form_data['document_cat_id'];
                $where['status']                = $form_data['status1'];
                $where['id !=']                 = $form_data['id'];
 

                $returnData = $this->document_model->findDynamic($where);

            if(!empty($returnData))
            {
                 $this->session->set_flashdata('error', $form_data['name'].' already exist.');
                 redirect(base_url().'admin/kdocuments/edit/'.$insertData['id']);
            }else
            {


                $insertData  = array();
                 $all_images =  array();

                    if(!empty($form_data['exist_file']))
                    {
                        $exist_image_file =  $form_data['exist_file'] ;
                        $exist_images = count($exist_image_file);
                        for ($jj=0; $jj < $exist_images; $jj++) { 
                           $all_images[] = $exist_image_file[$jj];
                        }
                    }


                     
                     if(!empty($_FILES['files']))
                    {
                         

                          $total_images = count($_FILES['files']);
                        for ($i=0; $i < $total_images; $i++) {

                           if(isset($_FILES['files']['name'][$i]) && $_FILES['files']['error'][$i] ==0)
                          {
                             
                                $f_name         =$_FILES['files']['name'][$i];
                                $f_tmp          =$_FILES['files']['tmp_name'][$i];
                                $f_size         =$_FILES['files']['size'][$i];
                                $f_extension    =explode('.',$f_name);
                                $f_extension    =strtolower(end($f_extension));
                                $f_newfile      =uniqid().'.'.$f_extension;
                                $store          ="uploads/admin/document/problem/".$f_newfile;
                           
                                if(!move_uploaded_file($f_tmp,$store))
                                {
                                    $this->session->set_flashdata('error', 'Images Upload Failed .');
                                }
                                else
                                {
                                   $all_images[] = $f_newfile;
                                   
                                }
                             }
                        }

                         
                         
                            
                    }


 

                    
                    $insertData['id'] = $form_data['id'];

                    $insertData['images'] = json_encode($all_images);


                    $insertData['name']                 = $form_data['name'];
                    $insertData['title']                = $form_data['title'];
                    $insertData['crop_id']              = $form_data['crop_id'];
                    $insertData['root_cause']           = base64_encode($form_data['root_cause']);
                    $insertData['treatment']           = base64_encode($form_data['treatment']);
                    $insertData['document_cat_id']      = $form_data['document_cat_id'];
                    $insertData['status']               = $form_data['status1'];
                    $insertData['updated_by']           = $this->session->userdata('userId');
                    $insertData['update_at'] = date("Y-m-d H:i:s");

                
            
                    
                $result = $this->document_model->save($insertData);
                

                if($result > 0)
                {
                    $this->session->set_flashdata('success', ' Problem successfully Updated');
                }
                else
                { 
                    $this->session->set_flashdata('error', 'Problem Updation failed');
                }
            }


            
            
            redirect(base_url().'admin/kdocuments');
          }  
        
    }
	
	
    // Delete  *****************************************************************
      function delete()
    {
		
        $this->isLoggedIn();
        $delId = $this->input->post('id');  
		 
	
        $result = $this->document_model->delete($delId); 
			
         if ($result > 0) { echo(json_encode(array('status'=>TRUE,'message'=>'Deleted Succesfully'))); }
            else { echo(json_encode(array('status'=>FALSE,'message'=>'Failed In Deletion Operation!'))); }
    }

    public function single($id='')
    {
        $this->isLoggedIn();
        $single_arr = $this->document_model->find($id);
        echo  json_encode($single_arr);
    }

    public function singleCategory($id='')
    {
        $this->isLoggedIn();
        $single_arr = $this->document_model->find($id);
        echo  json_encode($single_arr);
    }

          // Status Change
 
    public function statusChange($id = NULL)
    {
        $this->isLoggedIn();
        if($_POST['id'] == null)
        {
            redirect('admin/product');
        }

        $insertData['id'] = $_POST['id'];
        $insertData['status'] = $_POST['status'];
        $result = $this->document_model->save($insertData);
         if ($result > 0) { echo(json_encode(array('status'=>TRUE,'message'=>"successfully status changed"))); }
        else { echo(json_encode(array('status'=>FALSE,'message'=>"status failed failed"))); }
        exit;
        
    } 

    
    
}

?>