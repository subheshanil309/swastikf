 
 <link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/admin/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 <style type="text/css">
  .table>:not(caption)>*>* {
  padding: 3px 3px;
  font-size: 10px;
  color: #000;
  }
   .mytablestyle {
    max-height: 455px;

}
</style>
<div class="page-content">
  
   <div class="container-fluid">
    <div class="row">
               <div class="col-12">
                  <?php $this->load->helper('form'); ?>
                  <div class="row">
                     <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show " role="alert" >', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'); ?>
                     </div>
                  </div>
                  <?php
                     $this->load->helper('form');
                     $error = $this->session->flashdata('error');
                     if($error)
                     {
                         ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     <?php echo $error; ?> 
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php }
                     $success = $this->session->flashdata('success');
                     if($success)
                     {
                         ?>
                  <div class="alert alert-success  alert-dismissible fade show" role="alert">
                     <?php echo $success; ?> 
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <?php }
                     ?>
               </div>
            </div>
      <div class="row">
          <div class="col-xl-12">
            
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                   

                      <h5 class="card-header bg-success text-white border-bottom ">
                         <div class="row ">
                           <div class="col-sm-9">
                            Farmers List
                           </div>
                           
                           <div class="col-sm-3 ">
  

                          
                         <a class="btn btn-primary  float-end btn-sm" href="<?php echo base_url(); ?>admin/farmers/addnew"><i class="fa fa-plus"></i> Add New</a>

                            </div>
                         </div>
                       </h5>
                      

                       <div class="card-body">
                        
                        <div class="table-responsive mytablestyle">
                             <table class="table table-striped align-middle table-nowrap mb-0" cellspacing="0" width="100%" id="example">
                                  <thead>
                                 <tr class=" bg-success">
                                    <th  style="width: 60px;">FarmerID</th>
                                    <th>Name</th>                                            
                                    <th>Mobile</th>                                            
                                    <th>Father</th>                                            
                                    <th>ALT Mobile</th>                                            
                                    <th>WhatsApp</th>                                            
                                    <th>Village</th>                                            
                                    <th>Address</th>                                            
                                    <th>State</th>                                            
                                    <th>District</th>                                            
                                    <th>City</th>
                                    <th>Pincode</th>
                                    <th>Source</th>
                                    <th>Date</th>
                                    <th style="width: 60px;">Status</th>                                            
                                    <th class="text-center"  style="width: 60px;">Actions</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                    if(!empty($farmers))
                                    {
                                      
                                      foreach ($farmers as $key => $value) {


                                        ?>
                                        <tr>
                                          <td><?php echo $value['id'];?></td'];>
                                          <td><?php echo $value['name'];?></td>
                                          <td><?php echo $value['mobile'];?></td>
                                          <td><?php echo $value['father_name'];?></td>
                                          <td><?php echo $value['alt_mobile'];?></td>
                                          <td><?php echo $value['whatsapp'];?></td>
                                          <td><?php echo $value['village'];?></td>
                                          <td><?php echo $value['address'];?></td>
                                          <td><?php echo $value['state'];?></td>
                                          <td><?php echo $value['district'];?></td>
                                          <td><?php echo $value['city'];?></td>
                                          <td><?php echo $value['pincode'];?></td>
                                          <td><?php echo $value['source'];?></td>
                                          <td><?php echo date('d M Y',strtotime($value['date_at']));?></td>
                                          <td><?php echo (isset($value['status']) && $value['status']==1)?('<span class="badge bg-success">Active</span>'):'<span class="badge bg-danger">In-active</span>';?></td>
                                          
                                          <td>Action </td>
                                        </tr>
                                      <?php
                                      }

                                    }else{

                                      ?>
                                        <tr>
                                          <td><span class="text-damger">Not Record Found !</span></td>
                                        </tr>
                                      <?php
                                    }
                                  ?>
                                  </tbody>
                                </table>
                           
                        </div>
                        
                      </div>
                        <!-- end table-responsive -->
                     </div>
                     
                  </div>
                  <div class="row">
                          <div class="col-sm-3">
                              <ul class="pagination  justify-content-left mt-4"  >
                                 <li class="">
                                    <p><?php echo @$pagination_total_count; ?> Farmers. </p>
                                 </li>
                              </ul>
                          </div>
                          <div class="col-sm-9">
                            <?php echo $this->pagination->create_links(); ?>  
                          </div>
                        </div>
                          
               </div>
            </div>
         </div>
      </div>
    </div>
</div>

 
<script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>

<!-- Delete Script-->
  <script type="text/javascript">
    jQuery(document).ready(function(){
        //$('#example').DataTable();

         jQuery(document).on("click", ".deletebtn", function(){

          var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>admin/farmers/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete this city ?");
          
          if(confirmation)
          {
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId } 
            }).done(function(data){           
              currentRow.parents('tr').remove();
              if(data.status = true) { alert("successfully deleted"); }
              else if(data.status = false) { alert("deletion failed"); }
              else { alert("Access denied..!"); }
            });
          }
    });
    });
   
</script>
<!-- Get Databse List -->
<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
 
    //datatables
 /*   table = $('#example').DataTable({ 
         "pageLength": 25,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/farmers/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });*/
 
});
</script>

<!-- Status Change -->
  <script type="text/javascript">
    jQuery(document).ready(function(){
         $("#query-pagination li.page-item a").addClass('page-link');


         jQuery(document).on("change", ".statusBtn", function(){

          var userId = $(this).attr("data-id");
          var value  = $(this).val();

            hitURL = "<?php echo base_url() ?>admin/farmers/statusChange",
            currentRow = $(this);
          
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId, status : value } 
            }).done(function(data){           
              //currentRow.parents('tr').remove();
              if(data.status = true) { alert("successfully status changed"); }
              else if(data.status = false) { alert("status failed failed"); }
              else { alert("Access denied..!"); }
            });
          
    });
    });
   
</script>