<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.css"> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <a href="<?php echo base_url();?>admin/country"> <i class="fa fa-globe" aria-hidden="true"></i> Country</a>
        <small>Add New Country</small>
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
                        <h3 class="box-title">Add New Country</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="member_form" action="<?php echo base_url() ?>admin/country/insertnow" method="post" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Country Name-->                             
                                    <div class="form-group">
                                        <label for="name">Country Name</label>
                                        <input type="text" id="name" name ="name" class="form-control" required="required" placeholder="Enter Country Name" >
                                    </div> 
									<!--Country Flag-->                             
                                    <div class="form-group">
                                        <label for="img">Country Flag</label>
                                        <input type="file" id="img" name ="img" class="form-control"  placeholder="Choose Country Flag" >
                                    </div>
                                    <!--Country Code-->                             
                                    <div class="form-group">
                                        <label for="code">Country Code</label>
                                        <input type="text" id="code" name ="code" class="form-control" required="required" placeholder="Enter Country Code" >
                                    </div> 
                                    <!--Phone Code-->                             
                                    <div class="form-group">
                                        <label for="phone_code">Phone Code</label>
                                        <input type="text" id="phone_code" name ="phone_code" class="form-control"  placeholder="Enter Phone Code" >
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

