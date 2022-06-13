<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.

 * @since : 15 November 2016
 */
class Product extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
       parent::__construct();
       $this->load->model('admin/product_model');
       $this->load->model('admin/category_model');
    }


    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Product';
        $this->loadViews("admin/product/list", $this->global, NULL , NULL);
        
    }

    // Add New 
    public function addnew()
    {
		$this->isLoggedIn();
        $data = array();
        // category  
        $where['status'] = '1'; 
        $category_list = $this->category_model->findDynamic($where);
         $data['category_lists'] =  $category_list;

		 
        $this->global['pageTitle'] = 'Add New Product';
        $this->loadViews("admin/product/addnew", $this->global, $data , NULL);
        
    } 
	
	// Get Sub category
	public function get_sub_category()
    {
		//$this->isLoggedIn();
		$id = $this->input->post('id');
		
		
		// Sub category 
		$where['category_id'] = $id;
		$where['status'] = '1';
		$where['field'] = 'id,name';
		$sub_category_list = $this->sub_category_model->findDynamic($where);
		$option = '';
		foreach($sub_category_list as $k=>$v){
			$option .= '<option value="'.$v->id.'">'.$v->name.'</option>';
		}
		
		
		echo $option;//$select_box = '<select class ="form-control" name="sub_category_id" id="sub_category_id">'.$option.'</select>	';
	
		
       
        
    } 

    // Insert Member *************************************************************
    public function insertnow()
    {
        $this->isLoggedIn();
		$form_data  = $this->input->post();
		 
		$this->load->library('form_validation');            
        $this->form_validation->set_rules('name','Product Name','trim|required');
        $this->form_validation->set_rules('category_id','Category Name','trim|required');
        $this->form_validation->set_rules('hsn','HSN','trim|required');
        $this->form_validation->set_rules('price','Price','trim|required');
        $this->form_validation->set_rules('usage_unit','UOM','trim|required');
         
         //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
            $this->addnew();
        }
        else
        {
	       
                // check already exist
            $form_data['name'] = ucfirst($form_data['name']);
            $where = array();
            $where['name']          =  $form_data['name'];
            $where['country_id']    = $form_data['country_id'];
 

            $returnData = $this->state_model->findDynamic($where);


            


                    $insertData['name']             = $form_data['name'];
                    $insertData['category_id']      = $form_data['category_id'];
                    $insertData['hsn']              = $form_data['hsn'];
                    $insertData['price']            = $form_data['price'];
                    $insertData['usage_unit']       = $form_data['usage_unit'];
                    $insertData['tax_rate']       = $form_data['tax_rate'];
                    $insertData['discount']       = $form_data['discount'];
                    $insertData['status']           = $form_data['status1'];
                    $insertData['date_at']          = date("Y-m-d H:i:s");
             
            
			
            $result = $this->product_model->save($insertData);
            if($result > 0)
            {
                $this->session->set_flashdata('success', 'Product successfully Added');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Product Addition failed');
            }
            redirect('admin/product/addnew');
          }  
        
    }


    //  list
    public function ajax_list()
    {
	
		$list = $this->product_model->get_datatables();
		
		$data = array();
        $no =(isset($_POST['start']))?$_POST['start']:'';
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
            $row[] =  $currentObj->hsn;
            $row[] =  $currentObj->price;
            $row[] =  $currentObj->usage_unit;
            $row[] =  $currentObj->tax_rate;
            $row[] =  $currentObj->discount;
            $row[] =  $currentObj->source;
            $row[] =   $btn;;
            $row[] = $date_at;
            
            
            $row[] = '<a class="btn btn-sm btn-info" href="'.base_url().'admin/product/edit/'.$currentObj->id.'"><i class="fa fa-pen"></i></a> <a class="btn btn-sm btn-danger deletebtn" href="#" data-userid="'.$currentObj->id.'"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => (isset($_POST['draw']))?$_POST['draw']:'',
                        "recordsTotal" => $this->product_model->count_all(),
                        "recordsFiltered" => $this->product_model->count_filtered(),
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
            redirect('admin/product');
        }
		$data = array();
        // edit data 
        $data['edit_data'] = $this->product_model->find($id);
      
       
        $this->global['pageTitle'] = 'Ale-izba : Edit Product';
        $this->loadViews("admin/product/edit", $this->global, $data , NULL);
    } 

    // Update *************************************************************
    public function update()
    {
		$form_data  = $this->input->post();
		
        $this->isLoggedIn();
        $this->load->library('form_validation');            
        $this->form_validation->set_rules('id','Product Id Is Empty','required');
		$this->form_validation->set_rules('name','Product Name','trim|required');
        $this->form_validation->set_rules('price','Price','trim|required');
        $this->form_validation->set_rules('no_item','Number Or item','trim|required');
        
        //form data 
        $form_data  = $this->input->post();
        if($this->form_validation->run() == FALSE)
        {
			
                $this->edit($form_data['id']);
        }
        else
        {
            
            $insertData['id'] = $form_data['id'];
			$insertData['name'] = base64_encode( $form_data['name']);
            $insertData['price'] = $form_data['price'];
            $insertData['no_item'] = $form_data['no_item'];
            $insertData['renewal'] = base64_encode($form_data['renewal']);
            $insertData['status'] = $form_data['status'];
            
            $insertData['update_at'] = date("Y-m-d H:i:s");
            
			
            $i = 1; 
            while($i == 1)
            {
                if(isset($_FILES['image'.$i]['name']) && $_FILES['image'.$i]['name'] != '') {

                    $f_name         =$_FILES['image'.$i]['name'];
                    $f_tmp          =$_FILES['image'.$i]['tmp_name'];
                    $f_size         =$_FILES['image'.$i]['size'];
                    $f_extension    =explode('.',$f_name);
                    $f_extension    =strtolower(end($f_extension));
                    $f_newfile      =uniqid().'.'.$f_extension;
                    $store          ="uploads/product/".$f_newfile;
                
                    if(!move_uploaded_file($f_tmp,$store))
                    {
                        $this->session->set_flashdata('error', 'Image Upload Failed .');
                    }
                    else
                    {
                        $file = "uploads/product/".$form_data['old_image'.$i];
                        if(file_exists ( $file))
                        {
                            unlink($file);
                        }
                        $insertData['image'.$i] = $f_newfile;
                       
                    }
                 }
                 $i++;
            }
            	
            $result = $this->product_model->save($insertData);
			

            if($result > 0)
            {
                $this->session->set_flashdata('success', ' Product successfully Updated');
            }
            else
            { 
                $this->session->set_flashdata('error', 'Product Updation failed');
            }
            redirect('admin/product/edit/'.$insertData['id']);
          }  
        
    }
	
	
    // Delete  *****************************************************************
      function delete()
    {
		
        $this->isLoggedIn();
        $delId = $this->input->post('id');  
		/*$db_data = $this->product_model->find($delId);*/
		//print_r($db_data);
		/*if(!empty($db_data))
		{
			$i = 1;
			while($i <= 3)
			{
				$image = 'image'.$i;
				$file = "uploads/product/".$db_data->$image;
				
				if(file_exists ( $file))
				{
					unlink($file);
				}
				$i++;
			}
		}*/
	
        $result = $this->product_model->delete($delId); 
			
        if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
    }

    public function single($id='')
    {
        $this->isLoggedIn();
        $single_arr = $this->product_model->find($id);
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
        $result = $this->product_model->save($insertData);
         if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
        else { echo(json_encode(array('status'=>FALSE))); }
        exit;
        
    } 

    
    
}

?>