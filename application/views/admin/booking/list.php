<style type="text/css">
  .table>:not(caption)>*>* {
       border: 1px solid #3a863e;
       padding: 1px 1px;
      font-size: 12px;
      color: #000;
}
.mytablestyle{
  min-height: 500px;
}
</style>
<div class="page-content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <h5 class="card-header  bg-primary text-white border-bottom p-0">
                 <div class="row ">
                 <div class="col-sm-12">
                  <div class="d-flex flex-wrap gap-2 table-responsive">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a  class="btn btn-primary p-1" href="<?php echo base_url()?>admin/bookings/create">Add Booking</a>
                        <a  class="btn btn-primary p-1" href="<?php echo base_url()?>admin/bookings/import" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg2">Import Booking</a>
                        <a  class="btn btn-primary p-1" href="<?php echo base_url()?>admin/bookings/export">Export Booking</a>
                        <a  class="btn btn-primary p-1" href="<?php echo base_url()?>admin/bookings/advance" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"><i class="fa fa-filter" aria-hidden="true"></i>Advance Search</a> 
                    </div>
                  </div>
                 </div>
               </div>
            </h5>
          </div>
        </div>
      </div>
    </div>
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
                            Booking Status
                           </div>
                           
                           <div class="col-sm-3">
                            <a href="<?php echo base_url()?>admin/bookings" class="btn btn-info btn-sm">Clear</a> 
 

                          <button id="daterange" class="btn btn-info btn-sm">
                          <i class="fa fa-calendar"></i>
                          <span>July 12, 2020 - July 12, 2020</span> <i class="fas fa-caret-down"></i>
                          </button>


                            <input name="form_type" type="hidden" value="inquiry">
                           </div>
                         </div>
                       </h5>
                       <div class="card">
                          <div class="card-body">
                            <div class="row">
                            <div class="col-sm-12 ">
                              <div class="d-flex flex-wrap gap-2 table-responsive">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                   
                                   <?php
                                      
                                   
                                               if(!empty($filter_bookings_status))
                                               {
                                                 
                                                       foreach ($filter_bookings_status as $filter_booking_status) 
                                                       {
                                                         $active = "";
                                                         
                                                        if(isset($_GET['booking_status']) && $_GET['booking_status'] ==$filter_booking_status['slug'])
                                                        {
                                                          $active = "active";


                                                        }



                                                           ?>
                                                       <a class="btn btn-outline-primary <?php echo $active ;?>" href="<?php echo base_url()?>admin/bookings?booking_status=<?php echo $filter_booking_status['slug']?>"><span class="badge bg-warning text-white"><?php echo $filter_booking_status['count_booking']?></span><?php echo $filter_booking_status['title']?>
                                              </a>
                                                <?php
                                                   }
                                               }
                                               ?>

                                </div>
                              </div>
                            </div>
                              
                            </div>
                          </div>
                       </div>

                       <div class="card-body">
                        
                        <div class="table-responsive mytablestyle">
                           
                          <form method="GET" action="<?php echo base_url()?>admin/bookings" id="booking_filter">
                            <input type="text" name="start_date"  id="start_date" hidden >
                            <input type="text" name="end_date"  id="end_date"  hidden  >
                           <table class="table table-striped align-middle table-nowrap mb-0" id="example">
                              <thead class="table-light">
                                 <tr>
                                    <th class="align-middle bg-success text-white">Action</th>
                                    <th class="align-middle bg-success text-white">Stage</th>
                                    <th class="align-middle bg-success text-white">Booking No.</th>
                                    <th class="align-middle bg-success text-white">Booking Date.</th>
                                    <th class="align-middle bg-success text-white">Order Status</th>
                                    <th class="align-middle bg-success text-white">Crop Status</th>
                                    <th class="align-middle bg-success text-white">Customer ID</th>
                                    <th class="align-middle bg-success text-white">Customer Name</th>
                                    <th class="align-middle bg-success text-white">Executive</th>
                                    <th class="align-middle bg-success text-white">Choose Product</th>
                                    <th class="align-middle bg-success text-white">Primary Number</th>
                                    <th class="align-middle bg-success text-white">Number</th>
                                    <th class="align-middle bg-success text-white">Billing Address</th>
                                    <th class="align-middle bg-success text-white">Choose State</th>
                                    <th class="align-middle bg-success text-white">Choose District</th>
                                    <th class="align-middle bg-success text-white">Choose Tehsil</th>
                                    <th class="align-middle bg-success text-white">Pin Code</th>
                                    <th class="align-middle bg-success text-white">Payment Mode</th>
                                    <th class="align-middle bg-success text-white">Bank Trxn ID</th>
                                    <th class="align-middle bg-success text-white">Crates</th>
                                    <th class="align-middle bg-success text-white">Plant Booked</th>
                                    <th class="align-middle bg-success text-white">Plant Rate</th>
                                    <th class="align-middle bg-success text-white">Total Billed Amount</th>
                                    <th class="align-middle bg-success text-white">Discrount Amount</th>
                                    <th class="align-middle bg-success text-white">Recieved Amount</th>
                                    <th class="align-middle bg-success text-white">Out standing Amount</th>
                                    <th class="align-middle bg-success text-white">Expected Delivery Date </th>
                                    <th class="align-middle bg-success text-white">Actual Delivery Date</th>
                                    <th class="align-middle bg-success text-white">Vehicle No.</th>
                                    <th class="align-middle bg-success text-white">Contract Status</th>
                                    <th class="align-middle bg-success text-white">Productive Plants</th>
                                    <th class="align-middle bg-success text-white">Document</th>
                                    <th class="align-middle bg-success text-white">Assigned To</th>
                                    <th class="align-middle bg-success text-white">Entry made by</th>
                                    <th class="align-middle bg-success text-white">Entry Date</th>
                                  </tr>
                                  <tr>
                                    <th class="align-middle bg-success text-white"></th>
                                    <th class="align-middle bg-success text-white"></th>
                                    <th class="align-middle bg-success text-white">
                                        <input class="form-control-sm" type="text" name="booking_no" id="booking_no" placeholder="Booking Number"  style="width: 70px;">
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                        <input class="form-control-sm" type="date" name="booking_date" id="booking_date" placeholder="Booking Date"  style="width: 70px;" >
                                    </th>
                                    <th class="align-middle bg-success text-white">

                                       <select class=" form-control form-control-sm " id="booking_status" name="booking_status" aria-label="Floating label select example" style="width: 150px;" >
                                        <option value="" selected>Booking Status</option>
                                          <?php
                                             if(!empty($bookings_status))
                                             {
                                                     foreach ($bookings_status as $booking_status) {
                                                         ?>
                                              <option value="<?php echo $booking_status->slug;?>"><?php echo $booking_status->title;?></option>
                                              <?php
                                                 }
                                             }
                                             ?>
                                      </select>
                                    
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <select class=" form-control form-control-sm " id="crop_status" name="crop_status" aria-label="Floating label select example" style="width: 150px;" >
                                        <option value="" selected>Crop Status</option>
                                          <?php
                                             if(!empty($crops_status))
                                             {
                                                     foreach ($crops_status as $crop_status) {
                                                         ?>
                                              <option value="<?php echo $crop_status->slug;?>"><?php echo $crop_status->title;?></option>
                                              <?php
                                                 }
                                             }
                                             ?>
                                      </select>

                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="customer_id" id="customer_id" placeholder="Customer ID">
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="customer_name" id="customer_name" placeholder="Customer Name">
                                    </th>
                                      <th class="align-middle bg-success text-white">
                                      <select class="form-control form-control-sm "  name="agent_id" id="agent_id" aria-label="Floating label select example" style="width: 150px;"  >
                                        <option value="" selected >Choose Executive</option>
                                          <?php
                                             if(!empty($all_agents))
                                             {
                                                     foreach ($all_agents as $executive) {
                                                         ?>
                                              <option value="<?php echo $executive->id;?>"><?php echo $executive->title;?></option>
                                              <?php
                                                 }
                                             }
                                             ?>
                                      </select>

                                       
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <select class="form-control form-control-sm select2 " name="product_id" id="product_id" aria-label="Floating label select example" style="width: 150px;"  >
                                        <option value="" selected >Choose Product</option>
                                          <?php
                                             if(!empty($states))
                                             {
                                                     foreach ($states as $state) {
                                                         ?>
                                              <option value="<?php echo $state->id;?>"><?php echo $state->name;?></option>
                                              <?php
                                                 }
                                             }
                                             ?>
                                      </select>

                                       
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="customer_mobile" id="customer_mobile" placeholder="Primary Phone">
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="customer_alter_mobile" id="customer_alter_mobile" placeholder="Number">
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="address" id="address" placeholder="Address" style="width:400px;">
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <select class=" form-control select2 " id="state2" name="state2" aria-label="Floating label select example" style="width: 150px;" onchange="stateChange2()">
                                        <option value="" selected>Choose State</option>
                                          <?php
                                             if(!empty($states))
                                             {
                                                     foreach ($states as $state) {
                                                         ?>
                                              <option value="<?php echo $state->id;?>"><?php echo $state->name;?></option>
                                              <?php
                                                 }
                                             }
                                             ?>
                                      </select>

                                      <input type="text" name="other_state2" id="other_state2"  style="display: none;" class="form-control form-control-sm mb-2" placeholder="Please Enter State Name" />
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <select class=" form-control select2 " id="district2" name="district2" aria-label="Floating label select example"   style="width: 150px;" onchange="districtChange2()">
                                      <option value="" selected>Choose District</option>

                                      </select>
                                      <input type="text" name="other_district2" id="other_district2"  style="display: none;" class="form-control form-control-sm mb-2" placeholder="Please Enter District Name" />
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <select class=" form-control  select2 " id="city2" name="city2" aria-label="Floating label select example" style="width: 150px;"   onchange="cityChange2()">
                                        <option value="" selected>Choose Tehsil</option>
                                      </select>
                                      <input type="text" name="other_city2" id="other_city2"  style="display: none;" class="form-control form-control-sm mb-2" placeholder="Please Enter Tehsil Name" />
                                    </th>
                                     <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="pincode" id="pincode" placeholder="Pincode">
                                    </th>
                                    <th class="align-middle bg-success text-white"></th>
                                    <th class="align-middle bg-success text-white"></th>
                                    <th class="align-middle bg-success text-white"></th>
                                     <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="quantity" id="quantity" placeholder="Plant Booked">
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="unit_price" id="unit_price" placeholder="Plant Rate">
                                    </th>
                                    <th class="align-middle bg-success text-white"></th>
                                    <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="discount" id="discount" placeholder="Discount">
                                    </th>
                                   
                                    <th class="align-middle bg-success text-white"></th>
                                     <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="outstanding_amount" id="outstanding_amount" placeholder="Outstanding Amount">
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                       <input class="form-control-sm" type="text" name="req_delivery_date" id="req_delivery_date" hidden  >
                                      <input class="form-control-sm" type="text" name="req_delivery_date_label" id="req_delivery_date_label"  >
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="date" name="delivery_date" id="delivery_date"  >
                                    </th> 
                                    <th class="align-middle bg-success text-white">
                                      <input class="form-control-sm" type="text" name="vehicle_no" id="vehicle_no"  >
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                      <select class=" form-control  form-control-sm" id="contract" name="contract" aria-label="Floating label select example"  style="width: 115px;"  >
                                     <option value="">Contract Status</option>
                                    <?php
                                       if(!empty($contracts_status))
                                       {
                                           foreach ($contracts_status as $contract_status ) {
                                               ?>
                                     <option value="<?php echo $contract_status->slug;?>"><?php echo $contract_status->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                               </th>
                                     
                               <th class="align-middle bg-success text-white" ></th>
                               <th class="align-middle bg-success text-white" ></th>
                               <th class="align-middle bg-success text-white" ></th>
                               <th class="align-middle bg-success text-white" ></th>
                               <th class="align-middle bg-success text-white" ></th>
                                
                               </tr>
                              </thead>
                              <tbody>
                                <?php
                               /*   echo "<pre>";

                                  print_r($_SESSION);
                                  echo "</pre>";*/


                                 if(!empty($bookings)){
                                   foreach($bookings as $bookings){ ?>
                                      <tr>
                                        <td>
                                          <div class="btn-group">
                                            <span class="badge bg-primary dropdown-toggle text-white dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                                            Action<i class="mdi mdi-chevron-down"></i>
                                            </span>
                                            <div class="dropdown-menu" style="">
                                            <a class="dropdown-item btn side_modal" data-userid="<?php echo $bookings['id']; ?>"><i class="fa fa-wrench" aria-hidden="true"></i> Change Status</a>
                                            <a class="dropdown-item btn side_modal" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen" data-userid="<?php echo $bookings['id']; ?>"><i class="fa fa-history" aria-hidden="true"></i> View History</a>
                                            <a class="dropdown-item btn" href="<?php echo base_url()?>admin/bookings/receipt/<?php echo $bookings['id']; ?>" data-userid="<?php echo $bookings['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i> Generate Receipt</a>
                                            <a class="dropdown-item btn" href="<?php echo base_url()?>admin/bookings/view/<?php echo $bookings['id']; ?>" data-userid="<?php echo $bookings['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i> View Order Details</a>
                                            <a class="dropdown-item btn" href="<?php echo base_url()?>admin/bookings/agreement/<?php echo $bookings['id']; ?>" data-userid="<?php echo $bookings['id']; ?>"><i class="fa fa-file-excel" aria-hidden="true"></i> Generate Agreement</a>
                                            <a class="dropdown-item btn text-danger" href="<?php echo base_url()?>admin/bookings/<?php echo $bookings['id']; ?>/return" data-userid="<?php echo $bookings['id']; ?>"><i class="fa fa-undo" aria-hidden="true"></i> Return Booking</a>
                                            <a class="dropdown-item btn" href="<?php echo base_url()?>admin/bookings/<?php echo $bookings['id']; ?>/edit" data-userid="<?php echo $bookings['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Order</a>
                                            <?php

                                              $userid = $this->session->userdata('role');
                                              if($userid==1)
                                              {
                                                ?>
                                                <a class="dropdown-item text-danger deletebtn" href="#" data-userid="<?php echo $bookings['id']; ?>">Delete</a>
                                                  
                                                <?php    
                                              }
                                            ?>
                                            
                                          </div>
                                          </div>
                                        </td>
                                         <td>
                                            
                                          <span class="badge bg-<?php echo (isset($bookings['stage']) && $bookings['stage']=='Created')?'primary':'warning';?> text-white"><?php echo $bookings['stage'];?></span></td>
                                        <td><?php echo $bookings['id'];?></td>
                                        <td><?php echo ($bookings['booking_date']!=='0000-00-00')? date('d M Y',strtotime($bookings['booking_date'])) :'-/-/-';?></td>
                                        <td><span class="text-dark badge bg-<?php echo $bookings['booked_badges'];?> "><?php echo $bookings['booked_status'];?></span></td>
                                        <td><?php echo $bookings['cropstatusname'];?></td>
                                        <td><?php echo $bookings['customer_id'];?></td>
                                        <td><?php echo $bookings['customer_name'];?></td>
                                         <td><?php echo $bookings['executive'];?></td>
                                         <td><?php echo $bookings['productname'];?></td>
                                        <td><?php echo $bookings['customer_mobile'];?></td>
                                        <td><?php echo $bookings['customer_alter_mobile'];?></td>
                                        <td><?php echo $bookings['billing_address'];?></td>
                                       
                                        <td><?php echo (isset($bookings['other_state']) && !empty($bookings['other_state']))?($bookings['other_state']):($bookings['state']);?></td>
                                        <td><?php echo (isset($bookings['other_district']) && !empty($bookings['other_district']))?($bookings['other_district']):($bookings['district']);?></td>
                                        <td><?php echo (isset($bookings['other_city']) && !empty($bookings['other_city']))?($bookings['other_city']):($bookings['city']);?></td>
                                        <td><?php echo $bookings['pincode'];?></td>
                                        <td><?php echo $bookings['paymentmodename'];?></td>
                                        <td><?php echo $bookings['bank_trans_id'];?></td>
                                        <td><?php echo $bookings['crates'];?></td>
                                        <td><?php echo $bookings['quantity'];?></td>
                                        <td><?php echo $bookings['price'];?></td>
                                        <td><?php echo $bookings['total'];?></td>
                                        <td><?php echo $bookings['discount'];?></td>
                                        <td><?php echo $bookings['advance'];?></td>
                                        <td> </td>
                                        <td>
                                          <?php 
                                          echo ($bookings['delivery_expect_start_date']!=='0000-00-00')? date('d M Y',strtotime($bookings['delivery_expect_start_date'])) :'-/-/-';?> To <?php 
                                          echo ($bookings['delivery_expect_end_date']!=='0000-00-00')? date('d M Y',strtotime($bookings['delivery_expect_end_date'])) :'-/-/-';?>
                                        </td>
                                        <td><?php echo ($bookings['delivery_date']!=='0000-00-00')? date('d M Y',strtotime($bookings['delivery_date'])) :'-/-/-';?> </td>
                                        
                                        <td><?php echo $bookings['vehicle_no'];?></td>
                                        <td><?php echo $bookings['contractstatusname'];?></td>
                                        <td><?php echo $bookings['productive_plants'];?></td>
                                        <td><a target="_BLANK"  class="text-dark" href="<?php echo base_url()?>uploads/admin/document/<?php echo $bookings['document'];?>"><?php echo $bookings['document'];?><a></td>
                                        <td><?php echo $bookings['assignedto'];?></td>
                                        <td><?php echo $bookings['createdby'];?></td>
                                        <td><?php echo ($bookings['date_at']!=='0000-00-00')? date('d M Y',strtotime($bookings['date_at'])) :'-/-/-';?> </td>
                                        
                                      </tr>
                              <?php } }else{ ?>
                                   <tr>
                                  <td colspan="100">customers (s) not found...<td>
                                </tr>
                                   
                              <?php } ?>
                             
                              </tbody>
                           </table>
                           </form>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <?php echo @$pagination; ?>  
                          </div>
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

<!--  Large modal example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Cras mattis consectetur purus sit amet fermentum.
                        Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac
                        consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.</p>
                    <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                        Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec
                        ullamcorper nulla non metus auctor
                        fringilla.</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--  Large modal example -->
    <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Large modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Cras mattis consectetur purus sit amet fermentum.
                        Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Morbi leo risus, porta ac
                        consectetur ac, vestibulum at eros.</p>
                    <p>Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Vivamus sagittis lacus vel
                        augue laoreet rutrum faucibus dolor auctor.</p>
                    <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                        Praesent commodo cursus magna, vel scelerisque
                        nisl consectetur et. Donec sed odio dui. Donec
                        ullamcorper nulla non metus auctor
                        fringilla.</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<!-- sample modal content -->
                                            <div id="exampleModalFullscreen" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-fullscreen">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-success">
                                                            <h5 class="modal-title  text-white " id="exampleModalFullscreenLabel">Fullscreen Modal</h5>
                                                            <button type="button" class="btn-close  text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                             <p>
                                                              table goes here
                                                             </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
 

<script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/daterange/daterangepicker.js"></script>

   <script type="text/javascript">


    var start = moment('01/01/1970');
        var end = moment();
                
        //Date range as a button
        $('#daterange').daterangepicker({
            ranges: {
                'All time': [moment('1970-01-01'), moment()],
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            },
            // startDate: moment().subtract(29, 'days'),
            // endDate  : moment()
            startDate: start,
            endDate: end,
            autoUpdateInput: false,
        });
        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            var start = picker.startDate;
            var end = picker.endDate;
            if (start.format('DD/MM/YYYY') == '01/01/1970') {
                $('#daterange span').html('All time');
            } else {
                $('#daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#start_date').val(start.format('Y-MM-DD'));
            $('#end_date').val(end.format('Y-MM-DD'));
            if ('' != start.format('Y-MM-DD')) {
                $('#booking_filter').submit();
            }
        });
        cb(start, end);

        function cb(start, end) {
            if (start.format('DD/MM/YYYY') == '01/01/1970') {
                $('#daterange span').html('All time');
            } else {
                $('#daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            // $('#start_date').val(start.format('Y-MM-DD') );
            // $('#end_date').val(end.format('Y-MM-DD') );
        }
        var deliveryStart = moment();
        var deliveryEnd = moment();
        var dateOptions = {
            autoUpdateInput: false,
            startDate: deliveryStart,
            endDate: deliveryEnd,
        };
         var dateFormat = 'MM/DD/YYYY';
        $('#req_delivery_date_label').daterangepicker(dateOptions);
        $('#req_delivery_date_label').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format(dateFormat) + ' - ' + picker.endDate.format(dateFormat));
            $('#req_delivery_date').val(picker.startDate.format('YYYY-MM-DD') + ':' + picker.endDate.format(
                'YYYY-MM-DD'));
        });
        $('#req_delivery_date_label').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });




    jQuery(document).ready(function(){

      
        



























        //$('#example').DataTable();
            $(".select2").select2();


         jQuery(document).on("click", ".deletebtn", function(){

          var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>admin/booking/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete this?");
          
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

    function stateChange2(state_code = '',selected_district = '') {
      
    var stateCode = state_code ? state_code : $('#state2').val();
    var selectedDistrict = selected_district ? selected_district : $('#district2').val();
    hitURL = "<?php echo base_url() ?>admin/customer/state_change/"+ stateCode+"/"+ selectedDistrict;
    $.ajax({
        type: 'GET',
        url: hitURL,
        data: {},
        success: function (response) {
             var check_state = $('#state2 option:selected').text();
             if(check_state =='Other')
          {
              $('#other_state2').val('');
             $('#other_state2').css('display', 'block');
 
          }else
          {
             
             $('#other_state2').val('');
             $('#other_state2').css('display', 'none');
           }
            $("#district2").empty().append(response);
            $(".select2").select2();
        },
        error: function (request, status, error) {
             
             
            
            $("#district2").empty();
        }
    });
} 

function districtChange2(district_code = '',selected_city = '') {
      
    var districtCode = district_code ? district_code : $('#district2').val();
    var selectedCity = selected_city ? selected_city : $('#city2').val();
    hitURL = "<?php echo base_url() ?>admin/customer/district_change/"+ districtCode+"/"+ selectedCity;
    $.ajax({
        type: 'GET',
        url: hitURL,
        data: {},
        success: function (response) {
             

               var check_district = $('#district2 option:selected').text();
            if(check_district =='Other')
            {
              $('#other_district2').val('');
              $('#other_district2').css('display', 'block');
 
            }else
            {
               
               $('#other_district2').val('');
               $('#other_district2').css('display', 'none');
             }


            // console.log(response);
            // $(".district_wrap").html(response.success);
            $("#city2").empty().append(response);
            $(".select2").select2();
        },
        error: function (request, status, error) {
             
             
            
            $("#city2").empty();
        }
    });
}

function cityChange2(district_code = '',selected_city = '') {
      
     var check_city = $('#city2 option:selected').text();
            if(check_city =='Other')
            {
              $('#other_city2').val('');
              $('#other_city2').css('display', 'block');
 
            }else
            {
               
               $('#other_city2').val('');
               $('#other_city2').css('display', 'none');
             }
}



   
</script>
<!-- Get Databse List -->
<script type="text/javascript">
 
var table;
 
$(document).ready(function() {

 $("#query-pagination li.page-item a").addClass('page-link');
    //datatables
   /* table = $('#example').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('admin/booking/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 */
});
</script>

<!-- Status Change -->
  <script type="text/javascript">
    jQuery(document).ready(function(){
       $('#booking_date, #booking_status, #crop_status, #delivery_status, #contract, #agent_id, #product_id, #req_delivery_date, #delivery_date').on(
            'change',
            function() {
                $('#booking_filter').submit();
            });


         jQuery(document).on("change", ".statusBtn", function(){

          var userId = $(this).attr("data-id");
          var value  = $(this).val();

            hitURL = "<?php echo base_url() ?>admin/booking/statusChange",
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
   

    window.addEventListener("keydown", checkKeyPressed, false);

    function checkKeyPressed(e)
    {
      if (e.keyCode == "13")
      {

        $('#booking_filter').submit();
      }
    }
</script>








