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
                        <a  class="btn btn-primary p-1" href="<?php echo base_url()?>admin/bookings/import">Import Booking</a>
                        <a  class="btn btn-primary p-1" href="<?php echo base_url()?>admin/bookings/export">Export Booking</a>
                        <a  class="btn btn-primary p-1" href="<?php echo base_url()?>admin/bookings/advance">Advance Search</a> 
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
          <div class="col-xl-12">
            
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                    <form method="GET" action="<?php echo base_url()?>admin/bookings">

                      <h5 class="card-header bg-success text-white border-bottom ">
               <div class="row ">
                 <div class="col-sm-9">
                  Inquiries
                 </div>
                 
                 <div class="col-sm-3">
                  <a href="<?php echo base_url()?>admin/bookings" class="btn btn-info btn-sm">Clear</a> 
                  <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-search"></i> Submit Filter</button>
                  <input name="form_type" type="hidden" value="inquiry">
                 </div>
               </div>
             </h5>


 
                     
                       <div class="card-body">
                        
                        <div class="table-responsive mytablestyle">
                           <style type="text/css">
                              .table>:not(caption)>*>* {
                              padding: 1px 1px;
                              font-size: 10px;
                              color: #000;
                              }
                           </style>
                           <table class="table align-middle table-nowrap mb-0" id="example">
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
                                        <input class="form-control-sm" type="text" name="booking_number" id="search_booking_number" placeholder="Booking Number"  style="width: 70px;">
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                        <input class="form-control-sm" type="text" name="booking_date" id="booking_date" placeholder="Booking Date"  style="width: 70px;">
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
                                      <input class="form-control-sm" type="date" name="req_delivery_date" id="req_delivery_date"  >
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
                                 if(!empty($customers)){ foreach($customers as $customer){ ?>
                                      <tr>
                                        <td>
                                          <div class="btn-group">
                                            <span class="badge bg-primary dropdown-toggle text-white dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                                            Action<i class="mdi mdi-chevron-down"></i>
                                            </span>
                                            <div class="dropdown-menu" style="">
                                            <a class="dropdown-item btn side_modal" data-userid="<?php echo $customer['id']; ?>">View</a>
                                            <?php

                                              $userid = $this->session->userdata('role');
                                              if($userid==1)
                                              {
                                                ?>
                                                  <a class="dropdown-item btn editbtn" href="#" data-userid="<?php echo $customer['id']; ?>">Edit</a>
                                                  <a class="dropdown-item text-danger deletebtn" href="#" data-userid="<?php echo $customer['id']; ?>">Delete</a>
                                                  
                                                <?php    
                                              }
                                            ?>
                                            
                                          </div>
                                          </div></td>
                                        <td><?php echo $customer['date_at'];?></td>
                                        <td><?php echo $customer['sku_id'];?></td>
                                        <td><?php echo $customer['customer_title'];?></td>
                                        <td><?php echo $customer['customer_mobile'];?></td>
                                        <td><?php echo $customer['customer_alter_mobile'];?></td>
                                        <td><?php echo (isset($customer['other_state']) && !empty($customer['other_state']))?($customer['other_state']):($customer['state']);?></td>
                                        <td><?php echo (isset($customer['other_district']) && !empty($customer['other_district']))?($customer['other_district']):($customer['district']);?></td>
                                        <td><?php echo (isset($customer['other_city']) && !empty($customer['other_city']))?($customer['other_city']):($customer['city']);?></td>
                                        <td><?php echo $customer['calldir'];?></td>
                                        <td><?php echo $customer['calltype'];?></td>
                                        <td><?php echo date('d M Y',strtotime($customer['last_follow_date']));?></td>
                                        <td><?php echo $customer['assignedto'];?></td>
                                        <td><?php echo $customer['createdby'];?></td>
                                        <td><?php echo date('d M Y',strtotime($customer['date_at']));?></td>
                                        <td><?php echo $customer['lastfollower'];?></td>
                                        <td><?php echo $customer['lastcalltype'];?></td>
                                      </tr>
                              <?php } }else{ ?>
                                   <tr>
                                  <td colspan="100">customers (s) not found...<td>
                                </tr>
                                   
                              <?php } ?>
                             
                              </tbody>
                           </table>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <?php echo @$pagination; ?>  
                          </div>
                        </div>
                          
                      </div>
                        <!-- end table-responsive -->
                     </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>

  <script type="text/javascript">
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
   
</script>








