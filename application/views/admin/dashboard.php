<style type="text/css">
   .card-body .rounded-circle
    {
        height: 120px;
    width: 120px;
    }
    .card-body .bx
    {
        line-height: 111px;
    }
 .card-body .display-2 {
    font-size: 3.5rem;
}
</style>

 <div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                     

                                </div>
                            </div>
                        </div>
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
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="card mini-stats-wid">
                                            <a href="javascript: void(0)" data-bs-toggle="modal" data-bs-target="#cssModal">
                                                <div class="card-body  p-1">
                                                    <div class="text-center">
                                                        <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                            <i class="bx bxs-tree text-white display-2"></i>
                                                        </div>
                                                        <h6>CSS</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card mini-stats-wid">
                                            
                                            <a href="javascript: void(0)" data-bs-toggle="modal" data-bs-target="#salesModal">
                                                <div class="card-body  p-1">
                                                    <div class="text-center">
                                                        <div class=" mini-stat-icon  rounded-circle bg-success mb-2">
                                                            <i class="bx bx-cart text-white display-2"></i>
                                                        </div>
                                                        <h6>SALES</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body  p-1">
                                                <div class="text-center">
                                                    <div class=" mini-stat-icon  rounded-circle bg-info mb-2">
                                                        <i class="bx bxs-shopping-bag text-white display-2"></i>
                                                    </div>
                                                    <h6>PURCHASE</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card mini-stats-wid">
                                            <a href="javascript: void(0)" data-bs-toggle="modal" data-bs-target="#productModal">
                                                <div class="card-body  p-1">
                                                    <div class="text-center">
                                                        <div class=" mini-stat-icon  rounded-circle bg-success mb-2">
                                                            <i class="bx bxl-product-hunt text-white display-2"></i>
                                                        </div>
                                                        <h6>PRODUCT</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body  p-1">
                                                <div class="text-center">
                                                    <div class=" mini-stat-icon  rounded-circle bg-warning mb-2">
                                                        <i class="bx bx-dock-top text-white display-2"></i>
                                                    </div>
                                                    <h6>PO</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     
                                     
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="card mini-stats-wid">
                                            <a href="javascript: void(0)" data-bs-toggle="modal" data-bs-target="#settingModal">
                                                <div class="card-body  p-1">
                                                    <div class="text-center">
                                                        <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                            <i class="bx bx-cog text-white display-2"></i>
                                                        </div>
                                                        <h6>Setting</h6>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <h4 class="card-header bg-success text-white border-bottom ">About Center</h4>
                                    <div class="card-body">
                                     <p class="text-muted mb-4">Hi I'm <?php echo $admin->title;?></p>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><strong><i class="fa fa-key"></i> Logged in</strong>
                                                            
                                                        </th>
                                                        <td><p><?php echo $admin->title;?></p></td>
                                                         
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">  <i class="fa fa-phone"></i>  Mobile :</th>
                                                        <td><?php echo $admin->phone;?> </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"> <i class="fa fa-envelope"></i> E-mail</th>
                                                        <td><?php echo $admin->email;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><strong><i class="fa fa-map-marker-alt"></i> Center</strong></th>
                                                        <td><p><?php echo $admin->address;?></p></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><strong><i class="fa fa-calendar-alt"></i> Date Of Join</strong></th>
                                                        <td><p><?php echo date('d M Y',strtotime($admin->date_join));?></p></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                         
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Transaction Modal -->
                <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                                <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="<?php echo base_url(); ?>assets/admin/images/product/img-7.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 255</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <div>
                                                        <img src="<?php echo base_url(); ?>assets/admin/images/product/img-4.png" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                                    </div>
                                                </td>
                                                <td>$ 145</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Shipping:</h6>
                                                </td>
                                                <td>
                                                    Free
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                    $ 400
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $role = $this->session->userdata('role');?>
                <!-- end modal -->
                <!-- start css modal -->
                <div class="modal hide" id="cssModal" tabindex="-1" data-bs-backdrop="static"  aria-labelledby="cssModalLabel" aria-modal="true" role="dialog" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bordered border-primary">
                                                        <div class="modal-header bg-primary mb-2">
                                                            <h5 class="modal-title text-white" id="cssModalLabel">CSS</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <!---->
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo base_url()?>admin/customer/addnew">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bx-phone-call text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Inquiry</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div> <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo base_url()?>admin/consultants"  >
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-success">
                                                                                                <i class="bx bxs-user-voice text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Consultation</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo ($role==1)?base_url().'admin/kdocuments':'#'?>">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-warning">
                                                                                                <i class="bx bxs-file-doc text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>K Document</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>     
                                                                    </div>     
                                                                </div>     
                                                            </div>     
                                                           <!---->     
                                                        </div>
                                                        <div class="modal-footer">
                                                             
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- start css modal -->
                                    <div class="modal hide" id="salesModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="salesModalLabel" aria-modal="true" role="dialog" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bordered border-primary">
                                                        <div class="modal-header bg-primary mb-2">
                                                            <h5 class="modal-title text-white" id="salesModalLabel">Sales</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <!---->
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo base_url()?>admin/sales">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bx-cart text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Sales</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo base_url()?>admin/bookings">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-success mb-2">
                                                                                                <i class="bx bx-book-bookmark text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Booking</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo ($role==1)?base_url().'admin/kdocuments':'#'?>" >
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-warning">
                                                                                                <i class="bx bxs-file-doc text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>K Document</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>  
                                                                    </div>     
                                                                </div>     
                                                            </div>     
                                                           <!---->     
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal hide" id="productModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="productModalLabel" aria-modal="true" role="dialog" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bordered border-primary">
                                                        <div class="modal-header bg-primary mb-2">
                                                            <h5 class="modal-title text-white" id="productModalLabel">Product</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <!---->
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                               <a href="<?php echo base_url()?>admin/product">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bxl-product-hunt text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Product</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo base_url()?>admin/sales">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bxs-cart text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Sales</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo base_url()?>admin/farmers">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bx-group text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Farmer</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                             
                                                                    </div>     
                                                                </div>     
                                                            </div>     
                                                           <!---->     
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal hide" id="settingModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="settingModalLabel" aria-modal="true" role="dialog" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bordered border-primary">
                                                        <div class="modal-header bg-primary mb-2">
                                                            <h5 class="modal-title text-white" id="settingModalLabel">Settings</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                           <!---->
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                               <a href="<?php echo ($role==1)?base_url().'admin/agents':'#'?>">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bxs-user-rectangle text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Agents</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo ($role==1)?base_url().'admin/country':'#'?>">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bx-flag text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Country</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo ($role==1)?base_url().'admin/state':'#'?>">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bx-grid-vertical text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>State</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo ($role==1)?base_url().'admin/district':'#'?>">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bx-grid-horizontal text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>District</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo ($role==1)?base_url().'admin/city':'#'?>">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bx-dialpad  text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Tehsil</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card mini-stats-wid">
                                                                                <a href="<?php echo ($role==1)?base_url().'admin/company':'#'?>">
                                                                                    <div class="card-body">
                                                                                        <div class="text-center">
                                                                                            <div class="mini-stat-icon  rounded-circle bg-primary mb-2">
                                                                                                <i class="bx bxs-bank text-white display-2"></i>
                                                                                            </div>
                                                                                            <h6>Company</h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                        </div> 
                                                                             
                                                                    </div>     
                                                                </div>     
                                                            </div>     
                                                           <!---->     
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                <!-- end css modal -->

<script type="text/javascript">
    function open_css()
    {
        alert('sss');
    }
</script>