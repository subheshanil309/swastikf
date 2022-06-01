<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.css"> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <a href="<?php echo base_url();?>admin/country"> <i class="fa fa-globe" aria-hidden="true"></i> Country</a>
        <small>Edit</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
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
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                       
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                   <form role="form" id="member_form" action="<?php echo base_url() ?>admin/country/update" method="post" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Country Name-->                             
                                    <div class="form-group">
                                        <label for="name">Country Name</label>
                                        <input type="text" id="name" name ="name" class="form-control" required="required" placeholder="Enter Country Name" value="<?php echo $edit_data->name; ?>" >
                                    </div> 
                                    <!--Country Flag-->                             
                                    <div class="form-group">
                                        <label for="img">Country Flag</label>
                                        <input type="file" id="img" name ="img" class="form-control"  placeholder="Choose Country Flag" >
                                        <!-- image check-->
                                        <?php if(!empty($edit_data->img)){ ?>
                                            <span id="old_img_con" >Flag Is : <!-- <img src="<?php echo base_url();?>"/> --> <?php echo $edit_data->img; ?>&nbsp;&nbsp;&nbsp;<i class="text-danger fa fa-trash pinter delete_old_img"></i></span>
                                        <?php } ?>
                                        <input type="hidden" name="old_img" id="old_img" value="<?php echo $edit_data->img; ?>"/>
                                    </div>
                                    <!--Country Code-->                             
                                    <div class="form-group">
                                        <label for="code">Country Code</label>
                                        <input type="text" id="code" name ="code" class="form-control" required="required" placeholder="Enter Country Code" value="<?php echo $edit_data->code; ?>" >
                                    </div> 
                                    <!--Phone Code-->                             
                                    <div class="form-group">
                                        <label for="phone_code">Phone Code</label>
                                        <input type="text" id="phone_code" name ="phone_code" class="form-control"  placeholder="Enter Phone Code" value="<?php echo $edit_data->phone_code; ?>" >
                                    </div> 
                                    <!--Slug-->                             
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" id="slug" name ="slug" class="form-control"  placeholder="Slug" value="<?php echo $edit_data->slug; ?>" >
                                    </div> 
                                   
                                   <!--Status-->
                                    <div class="form-group">
                                         <label for="status">Status</label>
                                         <select class ="form-control" name="status" id="status">
											<option value="1" <?php echo ($edit_data->status == 1)?'selected':''; ?> >Active</option>
											<option value="0" <?php echo ($edit_data->status == 0)?'selected':''; ?> >Inactive</option>
										</select>	
                                    </div> 
                                 </div> 
                                    
                                
                             </div>
                             
                             
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $edit_data->id; ?>"/>
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            
        </div>    
    </section>
</div>
 
<script src="<?php echo base_url() ?>assets/js/jquery-ui.js"></script>  

<script>
	$(".delete_old_img").click(function(){
		$("#old_img_con").addClass('hidden');
		$("#old_img").val('');
	});
</script>
