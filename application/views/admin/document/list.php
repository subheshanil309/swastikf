 
 <link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
 
 <style type="text/css">
   table.dataTable td, table.dataTable th {
    padding: 1px 2px !important;
}
 </style>
<div class="page-content">
  <?php include APPPATH.'views/admin/menu-strive.php';?>
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
                            K Dodument list
                           </div>
                           
                           <div class="col-sm-3 ">
  

                          
                         <a class="btn btn-primary  float-end btn-sm" href="<?php echo base_url(); ?>admin/kdocuments/addnew"><i class="fa fa-plus"></i> Add New</a>
                         <input type="hidden" name="document_cat_id"  id="document_cat_id" value="<?php if(isset($_REQUEST['document_cat_id'])){echo $_REQUEST['document_cat_id'];}?>">

                            </div>
                         </div>
                       </h5>
                      

                       <div class="card-body">
                        
                        <div class="table-responsive mytablestyle">
                             <table class="display table table-striped align-middle table-nowrap mb-0" cellspacing="0" width="100%" id="example">
                                  <thead>
                                 <tr class=" bg-success">
                                    <th  style="width: 60px;">ID</th>
                                    <th>Crop</th>
                                    <th>Problem (Category)</th>
                                    <th>Sub-Problem</th>
                                    <th style="width: 60px;">Status</th>
                                    <th style="width: 60px;">Created At</th>
                                    <th class="text-center"  style="width: 60px;">Actions</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  
                                  </tbody>
                                </table>
                           
                        </div>
                        
                      </div>
                        <!-- end table-responsive -->
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
</div>

 
<script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/toastr/build/toastr.min.js"></script>

<script type="text/javascript">
   
   toastr.options = {
     "closeButton": true,
     "debug": false,
     "newestOnTop": false,
     "progressBar": false,
     "positionClass": "toast-top-right",
     "preventDuplicates": false,
     "onclick": null,
     "showDuration": "300",
     "hideDuration": "10000",
     "timeOut": "5000",
     "extendedTimeOut": "1000",
     "showEasing": "swing",
     "hideEasing": "linear",
     "showMethod": "fadeIn",
     "hideMethod": "fadeOut"
   }
</script>
<!-- Delete Script-->
  <script type="text/javascript">
    jQuery(document).ready(function(){
        //$('#example').DataTable();

         jQuery(document).on("click", ".deletebtn", function(){

          var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>admin/kdocuments/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete this State ?");
          
          if(confirmation)
          {
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId } 
            }).done(function(data){           
              if(data.status ==true) { 
                toastr.success(data.message);
                currentRow.parents('tr').remove();
              }
              else if(data.status ==false) {
                toastr.error(data.message);
                
             }
              else { 
                 toastr.error("Access denied..!");
                 
              }
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
    table = $('#example').DataTable({ 
        "pageLength": 25,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/kdocuments/ajax_list')?>",
            "type": "POST",
            data: {
            "document_cat_id": $("#document_cat_id").val()}
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
</script>

<!-- Status Change -->
  <script type="text/javascript">
    jQuery(document).ready(function(){
         jQuery(document).on("change", ".statusBtn", function(){

          var userId = $(this).attr("data-id");
          var value  = $(this).val();

            hitURL = "<?php echo base_url() ?>admin/kdocuments/statusChange",
            currentRow = $(this);
          
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId, status : value } 
            }).done(function(data){           
              if(data.status == true) { toastr.success(data.message);}
              else if(data.status == false) { toastr.error(data.message);  }
              else { toastr.error("Access denied..!");}
            });
          
    });
    });
   
</script>
