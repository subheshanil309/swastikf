<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.css"> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <a href="<?php echo base_url();?>admin/city"> <i class="fa fa-flag" aria-hidden="true"></i> City</a>
        <small>Add New City</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- Success & Error Alert-->
            <div class="col-md-12">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
            <!-- Success & Error Alert-->
            
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add New City</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="member_form" action="<?php echo base_url() ?>admin/city/insertnow" method="post" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--state-->                             
                                    <div class="form-group">
                                        <label for="state_id">state </label>
                                        <select class="form-control" name="state_id" id="state_id" required >
                                            <option value="0" >Select state</option>
                                            <?php foreach($stateList as $k=>$v){ ?>
                                            <option value="<?php echo $v->id;?>" ><?php echo $v->name;?></option>
                                             <?php } ?>
                                        </select>
                                    </div> 
                                    <!--City Name-->                             
                                    <div class="form-group">
                                        <label for="name">City Name</label>
                                        <input type="text" id="name" name ="name" class="form-control" required="required" placeholder="Enter City Name" >
                                    </div> 
									
                                    <!--City Code-->                             
                                    <div class="form-group">
                                        <label for="code">City Code</label>
                                        <input type="text" id="code" name ="code" class="form-control"  placeholder="Enter City Code (Optional)" >
                                    </div> 

                                    <!--Zip Code-->                             
                                    <div class="form-group">
                                        <label for="zip">Zip Code</label>
                                        <input type="text" id="zip" name ="zip" class="form-control" required="required" placeholder="Enter Zip Code" >
                                    </div> 
                                    
                                    <!--Slug-->                             
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" id="slug" name ="slug" class="form-control"  placeholder="Slug" >
                                    </div> 
                                   <!--Status-->
                                    <div class="form-group">
                                         <label for="status">Status</label>
                                         <select class ="form-control" name="status" id="status">
											<option value="1">Active</option>
											<option value="0">Inactive</option>
										</select>	
                                    </div> 
                                 </div> 
                             </div>
                             
                             
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </section>
    
</div>

