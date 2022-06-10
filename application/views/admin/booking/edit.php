<style type="text/css">
   .mytablestyle {
   min-height: 455px;
   }
   .row label {font-size: 11px;}
   tbody, td, tfoot, th, thead, tr {
    border-color: #000;
    border-style: solid;
    border-width: 1px;
}
</style>
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-6">
            <div class="card">
               <form   method="GET"  onsubmit="return false">
                  <div class="card-body  ">
                     <div class="row">
                        <div class="col-md-5">
                           <div class="form-group row">
                              <label for="customer_id" class="col-sm-4 col-form-label text-right">Cust ID:</label>
                              <div class="col-sm-8">
                                 <div class="input-group input-group-sm">
                                    <input class="form-control form-control-sm  " id="customer_id" name="customer_id" type="text">
                                     
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-5">
                           <div class="form-group row">
                              <label for="mobile" class="col-sm-4 col-form-label text-right">Mobile No.:</label>
                              <div class="col-sm-8">
                                 <div class="input-group input-group-sm">
                                    <input class="form-control form-control-sm  " id="mobile" name="mobile" type="text"   >
                                     
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <div class="form-group row">
                               
                              <div class="col-sm-12">
                                <button type="button" class="btn btn-info btn-sm float-end" id="search"><i class="fa fa-search"></i></button>
                              </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <input name="form_type" type="hidden" value="search">
                  </div>
               </form>
            </div>
            <div class="row">
               <div class="col-12">

                  <span id="booking_error"></span>
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
         </div>
         <div class="col-xl-12">
            <div class="card">
               <h5 class="card-header bg-success text-white border-bottom p-1">Add New Booking</h5>
               <div class="card card-body">
                <form action="<?php echo base_url() ?>admin/bookings/update" method="post" role="form" enctype="multipart/form-data" id="booking_form" class="custom-validation">
               <div class="row">
                  <div class="col-sm-3">
                    
                            <input type="hidden" name="contactid" id="contactid" value="">
                           <div class="row">
                              <label for="customer_mobile" class="col-sm-4 col-form-label">Reg Mob No<span class="text-danger">*</span></label>
                              <div class="col-sm-8"> 
                                 <input type="text" maxlength="12" class="form-control form-control-sm" id="customer_mobile"  name="customer_mobile"  placeholder="Customer Mobile*"  value="<?php echo @$edit_data->customer_mobile?>" required  />
                              </div>
                           </div>

                            <div class="row">
                              <label for="customer_alter_mobile" class="col-sm-4 col-form-label">ALT Mobile</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control customer_alter_mobile-control-sm" id="customer_alter_mobile" placeholder="ALT Mobile" name="customer_alter_mobile" value="<?php echo @$edit_data->customer_alter_mobile?>" >
                              </div>
                           </div>
                           <div class="row">
                              <label for="customer_name" class="col-sm-4 col-form-label">Name<span class="text-danger">*</span></label>
                              <div class="col-sm-8"> 
                                 <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" placeholder="Farmers Name*" required value="<?php echo @$edit_data->customer_name?>"/>
                              </div>
                           </div>
                           <div class="row">
                              <label for="father_name" class="col-sm-4 col-form-label">Father Name</label>
                              <div class="col-sm-8"> 
                                 <input type="text" class="form-control form-control-sm" id="father_name" name="father_name" placeholder="Father Name" value="<?php echo @$edit_data->father_name?>" />
                              </div>
                           </div>
                           <div class="row">
                              <label for="booking_date" class="col-sm-4 col-form-label">Booking Date</label>
                              <div class="col-sm-8"> 
                                 <input type="date" class="form-control form-control-sm" id="booking_date" name="booking_date"  value="<?php echo @$edit_data->booking_date?>" />
                              </div>
                           </div>
                           <div class="row">
                              <label for="booking_status" class="col-sm-4 col-form-label">Booking Status</label>
                              <div class="col-sm-8"> 
                                   <select class=" form-control select2 " id="booking_status" name="booking_status" aria-label="Floating label select example" >
                                     
                                    <?php
                                       if(!empty($bookings_status))
                                       {
                                           foreach ($bookings_status as $booking_status) {
                                               ?>
                                    <option value="<?php echo $booking_status->slug;?>" <?php if(isset($edit_data->booking_status) && $edit_data->booking_status == $booking_status->slug){echo "selected";}?> ><?php echo $booking_status->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>

                           <div class="row">
                              <label for="document_file" class="col-sm-4 col-form-label">Document
                                     <?php
                                    if(isset($edit_data->document) && $edit_data->document !=='')
                                    {
                                       ?>
                                          <a target="_blank" class="badge bg-primary text-white" href="<?php echo base_url()?>uploads/admin/document/<?php echo $edit_data->document;?>">View</a>
                                       <?php      
                                    }
                                 ?>
                              </label> 
                                 
                              <div class="col-sm-8"> 
                                 <input type="file" class="form-control form-control-sm" id="document_file" name="document_file"    />
                                
                              </div>
                           </div>
                          
                     
                  </div>
                  <div class="col-sm-3">
                     
                            <div class="row">
                              <label for="state" class="col-sm-4 col-form-label"> State</label>
                              <div class="col-sm-8">
                                 <select class=" form-control select2 " id="state" name="state" aria-label="Floating label select example" onchange="stateChange()">
                                    <option value="" selected>Choose State</option>
                                    <?php
                                       if(!empty($states))
                                       {
                                           foreach ($states as $state) {
                                               ?>
                                    <option value="<?php echo $state->id;?>" <?php if(isset($edit_data->state) && $edit_data->state ==$state->id){ echo "selected";}?>><?php echo $state->name;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                                 <input type="text" name="other_state" id="other_state"  style="display: none;" class="form-control form-control-sm mb-2" placeholder="Please Enter State Name" />
                              </div>
                           </div>
                           <div class="row">
                              <label for="city" class="col-sm-4 col-form-label">District</label>
                              <div class="col-sm-8">
                                 <select class=" form-control select2 " id="district" name="district" aria-label="Floating label select example" onchange="districtChange()">
                                    <option value="" selected>Choose District</option>
                                    <?php
                                       /* if(!empty($districts))
                                        {
                                            foreach ($districts as $district) {
                                                ?>
                                    <option value="<?php echo $district->id;?>"  <?php if(isset($edit_data->district) && $edit_data->district ==$district->id){ echo "selected";}?>><?php echo $district->name;?></option>
                                    <?php
                                       }
                                       }*/
                                       ?>
                                 </select>
                                 <input type="text" name="other_district" id="other_district"  style="display: none;" class="form-control form-control-sm mb-2" placeholder="Please Enter District Name" />
                              </div>
                           </div>
                           <div class="row">
                              <label for="city" class="col-sm-4 col-form-label">Tehsil</label>
                              <div class="col-sm-8">
                                 <select class=" form-control  select2 " id="city" name="city" aria-label="Floating label select example"  onchange="cityChange()">
                                    <option value="" selected>Choose Tehsil</option>
                                    <?php
                                       /* if(!empty($cities))
                                        {
                                            foreach ($cities as $city) {
                                                ?>
                                    <option value="<?php echo $city->id;?>"  <?php if(isset($edit_data->city) && $edit_data->city ==$city->id){ echo "selected";}?>><?php echo $city->city;?></option>
                                    <?php
                                       }
                                       }*/
                                       ?>
                                 </select>
                                 <input type="text" name="other_city" id="other_city"  style="display: none;" class="form-control form-control-sm mb-2" placeholder="Please Enter Tehsil Name" />
                              </div>
                           </div>

                           <div class="row">
                              <label for="village" class="col-sm-4 col-form-label">Village</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="village" name="village" placeholder="Village"   value="<?php echo @$edit_data->village?>">
                              </div>
                           </div>
                           <div class="row">
                              <label for="pincode" class="col-sm-4 col-form-label">Pincode</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="pincode" name="pincode" placeholder="Pincode"   value="<?php echo @$edit_data->pincode?>">
                              </div>
                           </div>
                            <div class="row">
                              <label for="crop_status" class="col-sm-4 col-form-label">Crop Status</label>
                              <div class="col-sm-8"> 
                                   <select class=" form-control form-control-sm " id="crop_status" name="crop_status" aria-label="Floating label select example" >
                                     
                                    <?php
                                       if(!empty($crops_status))
                                       {
                                           foreach ($crops_status as $crop_status) {
                                               ?>
                                    <option value="<?php echo $crop_status->slug;?>"  <?php if(isset($edit_data->crop_status) && $edit_data->crop_status ==$crop_status->slug){ echo "selected";}?>><?php echo $crop_status->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="row">
                              <label for="req_delivery_date" class="col-sm-4 col-form-label">Requested Delivery Date</label>
                              <div class="col-sm-8"> 
                                 <input type="text" hidden id="req_delivery_date" name="req_delivery_date" value="<?php echo date('Y-m-d',strtotime($edit_data->delivery_expect_start_date)).":".date('Y-m-d',strtotime($edit_data->delivery_expect_end_date));?> "/>
                                 <input type="text" class="form-control form-control-sm" id="req_delivery_date_label" name="req_delivery_date_label"  placeholder="mm/dd/yy" value="<?php echo date('m/d/Y',strtotime($edit_data->delivery_expect_start_date))." - ".date('m/d/Y',strtotime($edit_data->delivery_expect_end_date));?>"/>
                              </div>
                           </div>
                            
                           
                        
                     
                  </div>
                  <div class="col-sm-3">
                          <div class="row">
                              <label for="delivery_date" class="col-sm-4 col-form-label">Delivery Date</label>
                              <div class="col-sm-8"> 
                                 <input type="date" class="form-control form-control-sm" id="delivery_date" name="delivery_date"  value="<?php echo date('Y-m-d',strtotime(@$edit_data->delivery_date))?>" />
                              </div>
                           </div>

                           <div class="row">
                              <label for="supply_address" class="col-sm-4 col-form-label">Place of Supply</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="supply_address" name="supply_address" value="<?php echo  @$edit_data->supply_address?>">
                              </div>
                           </div>
                           <div class="row">
                              <label for="vehicle_no" class="col-sm-4 col-form-label">Vehicle No.</label>
                              <div class="col-sm-8"> 
                                 <input type="text" class="form-control form-control-sm" id="vehicle_no" name="vehicle_no" placeholder="Farmers Name*"  value="<?php echo  @$edit_data->vehicle_no?>" />
                              </div>
                           </div>
                           <div class="row">
                              <label for="agent_id" class="col-sm-4 col-form-label">Agent Name</label>
                               <div class="col-sm-8"> 
                                   <select class=" form-control form-control-sm " id="agent_id" name="agent_id" aria-label="Floating label select example" >
                                     
                                    <?php
                                       if(!empty($all_agents))
                                       {
                                           foreach ($all_agents as $all_agent) {
                                               ?>
                                            <option value="<?php echo $all_agent->id;?>" <?php if(isset($edit_data->agent_id) && $edit_data->agent_id ==$all_agent->id){ echo "selected";}?>><?php echo $all_agent->title;?></option>
                                            <?php
                                       }
                                       }
                                       ?>
                                 </select>
                           </div>
                           </div>
                           <div class="row">
                              <label for="crates" class="col-sm-4 col-form-label">Crates</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="crates"  name="crates"   value="<?php echo  @$edit_data->crates?>"  >
                              </div>
                           </div>
                           <div class="row">
                              <label for="bank_trans_id" class="col-sm-4 col-form-label">Bank Trxn Id</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="bank_trans_id"  name="bank_trans_id"  value="<?php echo  @$edit_data->bank_trans_id?>">
                              </div>
                           </div>
                            <div class="row">
                              <label for="contract" class="col-sm-4 col-form-label">Contract</label>
                               <div class="col-sm-8"> 
                                   <select class="form-control form-control-sm " id="contract" name="contract" aria-label="Floating label select example" >
                                     
                                    <?php
                                       if(!empty($contracts_status))
                                       {
                                           foreach ($contracts_status as $contract_status) {
                                               ?>
                                    <option value="<?php echo $contract_status->slug;?>" <?php if(isset($edit_data->contract) && $edit_data->contract ==$contract_status->slug){ echo "selected";}?> ><?php echo $contract_status->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                           </div>
                           </div>
                           
                         
                     
                  </div>
                  <div class="col-sm-3">
                     <div class=" ">
                       
                        <div class=" ">
                            
                            <div class="row">
                              <label for="pending-bill" class="col-sm-4 col-form-label">Pending Bill</label>
                              <div class="col-sm-8">
                                <h6 class="bg-warning"> Rs<span class="pending-bill">0.00</span></h6>
                              </div>
                           </div> 
                           <div class="row">
                              <label for="productive_plants" class="col-sm-4 col-form-label">Productive Plants</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="productive_plants" name="productive_plants" value="<?php echo  @$edit_data->productive_plants?>">
                              </div>
                           </div>
                           <div class="row">
                              <label for="driver_name" class="col-sm-4 col-form-label">Driver Name</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="driver_name" name="driver_name" value="<?php echo  @$edit_data->driver_name?>">
                              </div>
                           </div>
                          
                         
                    
                  </div>
               </div>
               </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="card">
                        <h5 class="card-header bg-success text-white border-bottom p-1">Billing address </h5>
                        <div class="card-body p-1">
                            <textarea name="billing_address" class="form-control form-control-sm" id="billing_address" cols="50"><?php echo  @$edit_data->billing_address?></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="card">
                        <h5 class="card-header bg-success text-white border-bottom p-1">Delivery Address 
                          <input type="checkbox" name="same_billing" id="same_billing" value="yes" <?php 
                          if(isset($edit_data->same_billing) && $edit_data->same_billing=='yes'){
                              $deliver_address = @$edit_data->billing_address;
                              echo 'checked';

                        }else{
                              $deliver_address = @$edit_data->delivery_address;
                        }
                        ?>> <small>Same as billing</small></h5>
                        <div class="card-body p-1">
                            <textarea name="delivery_address" class="form-control form-control-sm" id="delivery_address" cols="50"><?php echo  @ $deliver_address;?></textarea>
                            
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                    <div class="table table-responsive">
                      <table class="table align-middle table-nowrap mb-0">
                      <thead class="table-light" >
                        <tr>
                          <th class="align-middle bg-success text-white" style="width: 350px;">Crop (Product)<span class="text-danger">*</span></th>
                          <th class="align-middle bg-success text-white" >UOM</th>
                          <th class="align-middle bg-success text-white" >Rate</th>
                          <th class="align-middle bg-success text-white" >Quantity</th>
                          <th class="align-middle bg-success text-white" >CGST</th>
                          <th class="align-middle bg-success text-white" >SGST</th>
                          <th class="align-middle bg-success text-white" >IGST</th>
                          <th class="align-middle bg-success text-white" >Discount</th>
                          <th class="align-middle bg-success text-white" >Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr style="height: 200px;vertical-align: top;">
                          <td>
                             <select class="form-control form-control-sm select2" id="product_id" name="product_id" aria-label="Floating label select example"  required >
                                     <option value="" selected>Choose Product</option>
                                    <?php
                                       if(!empty($all_products))
                                       {
                                           foreach ($all_products as $all_product) {
                                               ?>
                                    <option value="<?php echo $all_product->id;?>" <?php if(isset($edit_data->product_id) && $edit_data->product_id == $all_product->id){ echo "selected"; } ?> ><?php echo $all_product->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>

                          </td>
                          <td>
                            <input type="text" class="form-control form-control-sm" id="uom" name="uom" readonly value="<?php echo  @$edit_data->uom?>">
                          </td>
                          <td>
                            <input type="text" class="form-control form-control-sm" id="price" name="price" value="<?php echo  @$edit_data->price?>" >
                          </td>
                          <td>
                            <input type="text" class="form-control form-control-sm" id="quantity" name="quantity"  value="<?php echo  @$edit_data->quantity?>">
                          </td>
                          <td>

                            <span id="cgst"><?php echo  number_format(($edit_data->cgst_amount+0),2)?> (<?php echo  @($edit_data->cgst_rate+0)?>%)</span>
                            <br>
                            <input type="hidden" name="cgst_rate" id="cgst_rate" value="<?php echo  @($edit_data->cgst_rate+0)?>">
                            <br>
                            <input type="hidden" name="cgst_amount" id="cgst_amount" value="<?php echo  @($edit_data->cgst_amount+0)?>">

                          </td>
                          <td>
                             <span id="sgst"><?php echo  number_format(($edit_data->sgst_amount+0),2)?> (<?php echo  @($edit_data->sgst_rate+0)?>%)</span>
                             <br>
                              <input type="hidden" name="sgst_rate" id="sgst_rate" value="<?php echo  @($edit_data->sgst_rate+0)?>">
                              <br>
                            <input type="hidden" name="sgst_amount" id="sgst_amount" value="<?php echo  @($edit_data->sgst_amount+0)?>">
                          </td>
                          <td>
                             <span id="igst"><?php echo  number_format(($edit_data->igst_amount+0),2)?> (<?php echo  @($edit_data->igst_rate)?>%)</span>
                             <br>
                             <input type="hidden" name="igst_rate" id="igst_rate" value="<?php echo  @($edit_data->igst_rate+0)?>">
                             <br>
                            <input type="hidden" name="igst_amount" id="igst_amount" value="<?php echo  @($edit_data->igst_amount+0)?>">
                          </td>
                          <td>
                            <input type="text" class="form-control form-control-sm" id="discount" name="discount" value="<?php echo  @($edit_data->discount+0)?>">
                          </td>
                          <td>
                          <div class="totalCart"><?php echo  @($edit_data->total+0)?></div>  
                          </td>
                        </tr>
                         
                      </tbody>
                      <tfoot class="table-light">
                        <tr>
                          <td colspan="7"></td>
                          <td><div class="pull-right">Total</div></td>
                          <td><span class="totalCart"><?php echo  @($edit_data->total+0)?></span>

                            <input type="hidden" name="total" id="total" value="<?php echo  @($edit_data->total+0)?>"></td>
                        </tr>
                      </tfoot>
                    </table>
                    </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-3">
                     <div class="row">
                              <label for="advance" class="col-sm-4 col-form-label">Advance</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="advance" name="advance" value="<?php echo  @($edit_data->advance+0)?>">
                              </div>
                           </div>
                  </div>
                  <div class="col-sm-3">
                       <div class="row">
                              <label for="create_date" class="col-sm-4 col-form-label">Payment Date</label>
                              <div class="col-sm-8">
                                 <input type="date" class="form-control form-control-sm" id="create_date" name="create_date" value="<?php echo date('Y-m-d',strtotime(@$edit_data->create_date))?>" >
                              </div>
                           </div>
                  </div>
                  <div class="col-sm-3">
                       <div class="row">
                              <label for="balance" class="col-sm-4 col-form-label">Balance</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="balance" name="balance" readonly value="<?php echo  @$edit_data->balance?>" >
                              </div>
                           </div>
                  </div>
                  <div class="col-sm-3">
                       <div class="row">
                              <label for="payment_mode" class="col-sm-4 col-form-label">Payment Mode</label>
                              <div class="col-sm-8">
                                   <select class="form-control form-control-sm" id="payment_mode" name="payment_mode" aria-label="Floating label select example" >
                                     
                                    <?php
                                       if(!empty($payments_mode))
                                       {
                                           foreach ($payments_mode as $payment_mode) {
                                               ?>
                                    <option value="<?php echo $payment_mode->slug;?>" <?php if(isset($edit_data->payment_mode) && $edit_data->payment_mode ==$payment_mode->slug){ echo "selected";}?>   ><?php echo $payment_mode->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                  </div>
               </div>
               <div class="row cheque-field" <?php if($edit_data->payment_mode=='cheque'){ }else{ ?>style="display: none;"<?php } ?> >
                  <div class="col-sm-3">
                     <div class="row">
                              <label for="cheque_no" class="col-sm-4 col-form-label">Chq No</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="cheque_no" name="cheque_no" value="<?php echo  @$edit_data->cheque_no?>">
                              </div>
                           </div>
                  </div>
                  <div class="col-sm-3">
                       <div class="row">
                              <label for="bank_name" class="col-sm-4 col-form-label">Bank</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="bank_name" name="bank_name" value="<?php echo  @$edit_data->bank_name?>">
                              </div>
                           </div>
                  </div>
                  <div class="col-sm-3">
                       <div class="row">
                              <label for="bank_branch" class="col-sm-4 col-form-label">Branch</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="bank_branch" name="bank_branch"  value="<?php echo  @$edit_data->bank_branch?>" >
                              </div>
                           </div>
                  </div>
                  <div class="col-sm-3">
                       
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-body ">
                            <input id="pending_bill" name="pending_bill" type="hidden" value="0">
                            <input id="gst" name="gst" type="hidden"  value="<?php if(isset($edit_data->tax_rate)){echo $edit_data->tax_rate;} ?>" >
                           <button type="submit" class="btn btn-primary w-md float-end">Save Details</button>
                           <input type="hidden" name="id" value="<?php if(isset($edit_data->id)){echo $edit_data->id;} ?>"/>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
               </div>
            </div>
            
         </div>
          
      </div>
   </div>
</div>
<div class="modal fade show" id="exampleModalScrollable" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-modal="true" role="dialog" style="display: none;">
   <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Previous Conversation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div id="example233"></div>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/libs/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/libs/daterange/daterangepicker.js"></script>
 <script type="text/javascript">



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




  var centerState  = 33;


   function stateChange(state_code = '',selected_district = '') {
       
     var stateCode = state_code ? state_code : $('#state').val();
     var selectedDistrict = selected_district ? selected_district : $('#district').val();
     hitURL = "<?php echo base_url() ?>admin/customer/state_change/"+ stateCode+"/"+ selectedDistrict;
     $.ajax({
         type: 'GET',
         url: hitURL,
         data: {},
         success: function (response) {
           var check_state = $('#state option:selected').text();
           if(check_state =='Other')
           {
               $('#other_state').val('');
              $('#other_state').css('display', 'block');
              $('#other_state').prop('required',true);
   
           }else
           {
              
              $('#other_state').val('');
              $('#other_state').css('display', 'none');
              $('#other_state').prop('required',false);
           }
           
             $("#district").empty().append(response);
             $(".select2").select2();
         },
         error: function (request, status, error) {
              
              
             
             $("#district").empty();
         }
     });
   }
   function stateChange2(state_code = '',selected_district = '') {
       
     var stateCode = state_code ? state_code : $('#state2').val();
     var selectedDistrict = selected_district ? selected_district : $('#district2').val();
     hitURL = "<?php echo base_url() ?>admin/customer/state_change/"+ stateCode+"/"+ selectedDistrict;
     $.ajax({
         type: 'GET',
         url: hitURL,
         data: {},
         success: function (response) {
              
             // console.log(response);
             // $(".district_wrap").html(response.success);
             $("#district2").empty().append(response);
             $(".select2").select2();
         },
         error: function (request, status, error) {
              
              
             
             $("#district2").empty();
         }
     });
   }   
   function districtChange(district_code = '',selected_city = '') {
       
     var districtCode = district_code ? district_code : $('#district').val();
     var selectedCity = selected_city ? selected_city : $('#city').val();
     hitURL = "<?php echo base_url() ?>admin/customer/district_change/"+ districtCode+"/"+ selectedCity;
     $.ajax({
         type: 'GET',
         url: hitURL,
         data: {},
         success: function (response) {
              
             var check_district = $('#district option:selected').text();
             if(check_district =='Other')
             {
               $('#other_district').val('');
               $('#other_district').css('display', 'block');
               $('#other_district').prop('required',true);
   
             }else
             {
                
                $('#other_district').val('');
                $('#other_district').css('display', 'none');
                $('#other_district').prop('required',false);
             }
           
             $("#city").empty().append(response);
             $(".select2").select2();
         },
         error: function (request, status, error) {
              
              
             
             $("#city").empty();
         }
     });
   }
   function cityChange(district_code = '',selected_city = '') {
       
      var check_district = $('#city option:selected').text();
             if(check_district =='Other')
             {
               $('#other_city').val('');
               $('#other_city').css('display', 'block');
               $('#other_city').prop('required',true);
   
             }else
             {
                
                $('#other_city').val('');
                $('#other_city').css('display', 'none');
                $('#other_city').prop('required',false);
             }
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
   
    jQuery(document).ready(function(){
   
   
        //$('#example').DataTable();
    
         jQuery(document).on("click", ".side_modal", function(){
             var userId = $(this).data("userid");
             $("#exampleModalScrollable").modal('show');
             single_cutomer_call_detail(userId);
   
         });
         jQuery(document).on("click", ".editbtn", function(){
            var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>admin/customer/edit/"+userId
            window.location.replace(hitURL);
         });
         jQuery(document).on("click", ".deletebtn", function(){
    
          var userId = $(this).data("userid"),
            hitURL = "<?php echo base_url() ?>admin/customer/delete",
            currentRow = $(this);
          
          var confirmation = confirm("Are you sure to delete?");
          
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
<script type="text/javascript">
   function get_cutomer_call_detail(id,div_id)
   {
      
       var userId = id,
            hitURL = "<?php echo base_url() ?>admin/customer/customer_call_detail";
          
           
           
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { id : userId } 
            }).done(function(data){ 
                var html_content= '<ul class="verti-timeline list-unstyled">';
   
              
               
             for (var i = 0; i < data.length; i++) {
               
                 
                 
   
   
               html_content+='<li class="event-list">';
               html_content+='<div class="event-timeline-dot"><i class="bx bx-right-arrow-circle"></i></div>';
   
               html_content+='<div class="d-flex">';
               html_content+='<div class="flex-shrink-0 me-3"><i class="text-primary"></i></div>';
   
               html_content+='<div class="flex-grow-1"><div><div class="card border border-primary">';
               html_content+='<span class="bg-primary badge badge-primary border-radius-0">'+data[i].date_at+'</span>';
   
               html_content+='<div class="card-header bg-transparent border-bottom">';
               html_content+=data[i].calltype+' <strong>By</strong> '+data[i].username;
               
               html_content+='</div>';
               html_content+='<div class="card-body"><p class="p-0 m-0"><strong>Call Direction :</strong>'+data[i].calldirection+'<strong> Call Back Date :</strong>'+data[i].call_back_date+'</p><p><strong> Assigned To :</strong>'+data[i].username+'</p><hr class="p-0 m-0"><p>'+data[i].current_conversation+'</p>';
   
   
               html_content+='</div></div></div></div></div></li>';
   
             }
             html_content+='</ul>';
   
                 $('#'+div_id).html(html_content);
                 
            });
           
   }
   function current_cutomer_call_detail()
   {
     get_cutomer_call_detail('<?php echo @$edit_data->id;?>','example23');
   }
   function single_cutomer_call_detail(id)
   {
     get_cutomer_call_detail(id,'example233');
   }
   
   
    
    
</script>
<?php
   if(!empty($edit_data->id))
   {
     ?>
<script type="text/javascript">
   $(document).ready(function() {
   
    var state = parseInt(<?=$edit_data->state?>);
    var district = parseInt(<?=$edit_data->district?>);
    var city = parseInt(<?=$edit_data->city?>);
     
      current_cutomer_call_detail();
      stateChange(state, district);
      districtChange(district ,city);
   });
</script>
<?php
   }
   ?>
<script type="text/javascript">
   var table;
    $(document).ready(function() {

     /* $("#booking_form").submit(function (e){
             e.preventDefault();
             $("#booking_error").html('');
             var message = '';
             var validation = true;
             var customer_mobile = $("#customer_mobile").val();
             var customer_name = $("#customer_name").val();
             var product_id = $("#product_id").val();
             if(customer_mobile.length >0)
             {

             }else
             {
              validation =false;
                message+='<p class="text-danger">Reg Mob No Is Required</p>';
             }  
             if(customer_name.length >0)
             {

             }else
             {
              validation =false;
                message+='<p  class="text-danger">Name* Is Required</p>';
             }

             if(product_id.length >0)
             {

             }else
             {
              validation =false;
                message+='<p  class="text-danger">Select Product one</p>';
             }

             $("#booking_error").html(message);


             if(validation)
             {
              $("#booking_form").submit();
             }

              
      });*/




    $("#product_id").change(function(){
        var product_id = $(this).val();
        if(product_id)
        {
                    hitURL = "<?php echo base_url() ?>admin/product/single/"+product_id;

          show_loader();
           $.ajax({
         type: 'GET',
         url: hitURL,
         data: {},
         dataType:'json',
         success: function (response) {
              hide_loader();
                if(response)
                {
                    var data = response;
                    $('#uom').val(data.usage_unit);
                    $('#price').val(data.price);
                    $('#quantity').val(1);
                    $('#gst').val(data.tax_rate);
                    
                    $('#discount').val(data.discount);
                     renderCart(centerState);
                }
                
         },
         error: function (request, status, error) {
              
              
              hide_loader();
          }
     });
       
        }
        
    
        
    });
    $("#search").on('click',function(){
        var customer_id = $("#customer_id").val();
        var mobile = $("#mobile").val();
        $('#contactid').val('');
         if(customer_id || mobile)
        {
        
          hitURL = "<?php echo base_url() ?>admin/customer/single";

          show_loader();
           $.ajax({
         type: 'GET',
         url: hitURL,
         data: {
          customer_id:customer_id,
          mobile:mobile
        },
         dataType:'json',
         success: function (response) {
              hide_loader();
                if(response)
                {
                    var data = response;

                    $('#customer_mobile').val(data.customer_mobile);
                    $('#customer_alter_mobile').val(data.customer_alter_mobile);
                    $('#customer_name').val(data.customer_name);
                    $('#state').val(data.state);
                    $('#contactid').val(data.id);
                    var stateCode = data.state;
                    var districtCode = data.district;
                    var cityCode = data.city;
                  stateChange(stateCode,districtCode);
                  districtChange(districtCode,cityCode);
                    renderCart(centerState);
                     
                }else
                {
                   $('#contactid').val('');
                }
                
         },
         error: function (request, status, error) {
              
              
              hide_loader();
          }
     });
       
        }
        
    
        
    });

   $("#query-pagination li.page-item a").addClass('page-link');
    $(".select2").select2();
    
     $('#booking_form #same_billing').on('change', function () {

       
        if ($(this).prop("checked") == true) {
            $('#delivery_address').val($('#billing_address').val());
            $('#delivery_address').attr('readonly', 'readonly');
        } else {
            $('#delivery_address').val('');
            $('#delivery_address').removeAttr('readonly');
        }
    });




     $('#quantity').on('change', function() {
             
            renderCart(centerState);
        });
        $('#discount').on('change', function() {
            renderCart(centerState);
        });
        $('#price').on('change', function() {
            renderCart(centerState);
        });

        $('#advance').on('change', function() {
            renderCart(centerState);
        });
        $('#payment_mode').on('change', function() {
            renderChequeField();
        });
    
   });
    function salesCopyBillingToShipping(isSameBilling = false) {
    var billingAddress = $('#billing_address').val();
    if (isSameBilling) {
        $('#delivery_address').val(billingAddress);
        $('#delivery_address').attr('readonly', 'readonly');
    }
    $('#booking_form #same_billing').on('change', function () {
        if ($(this).prop("checked") == true) {
            $('#delivery_address').val($('#billing_address').val());
            $('#delivery_address').attr('readonly', 'readonly');
        } else {
            $('#delivery_address').val('');
            $('#delivery_address').removeAttr('readonly');
        }
    });
}

function renderChequeField() {
    var paymentMode = $('#payment_mode').val();
    if (paymentMode == 'cheque') {
        $('.cheque-field').show();
    } else {
        $('.cheque-field').hide();
        $('#cheque_no').val('');
        $('#bank_name').val('');
        $('#bank_branch').val('');

    }
    if (paymentMode == 'cash') {
        $('.cash-field').show();
    } else {
        $('.cash-field').hide();
    }
    if (paymentMode == 'online-transfer') {
        $('.online-field').show();
    } else {
        $('.online-field').hide();
    }
    if (paymentMode == 'other') {
        $('.other-field').show();
    } else {
        $('.other-field').hide();
    }
}


    function stateChange( state_code = 0, selected_district = 0) {
       
    var stateCode = state_code ? state_code : $('#state').val();
    var selectedDistrict = selected_district ? selected_district : $('#district').val();
    hitURL = "<?php echo base_url() ?>admin/customer/state_change/"+ stateCode+"/"+ selectedDistrict;
    $.ajax({
        type: 'GET',
        url: hitURL,
        data: {},
        success: function (response) {
           renderCart(centerState);
          var check_state = $('#state option:selected').text();
          if(check_state =='Other')
          {
            $('#other_state').val('');
            $('#other_state').css('display', 'block');
            $('#other_state').prop('required',true);

          }else
          {
             
             $('#other_state').val('');
             $('#other_state').css('display', 'none');
             $('#other_state').prop('required',false);
          }
          
            $("#district").empty().append(response);
            $(".select2").select2();
        },
        error: function (request, status, error) {
             
             
            
            $("#district").empty();
        }
    });
}

function districtChange(district_code = '',selected_city = '') {
      
    var districtCode = district_code ? district_code : $('#district').val();
    var selectedCity = selected_city ? selected_city : $('#city').val();
    hitURL = "<?php echo base_url() ?>admin/customer/district_change/"+ districtCode+"/"+ selectedCity;
    $.ajax({
        type: 'GET',
        url: hitURL,
        data: {},
        success: function (response) {
             
            var check_district = $('#district option:selected').text();
            if(check_district =='Other')
            {
              $('#other_district').val('');
              $('#other_district').css('display', 'block');
              $('#other_district').prop('required',true);

            }else
            {
               
               $('#other_district').val('');
               $('#other_district').css('display', 'none');
               $('#other_district').prop('required',false);
            }
          
            $("#city").empty().append(response);
            $(".select2").select2();
        },
        error: function (request, status, error) {
             
             
            
            $("#city").empty();
        }
    });
}


function getPercentOfNumberVal(number, percent, gst)
{
  return (number * percent) / (100 + gst);
}

function getPercentOfNumber (number, percent) {
        
        return (number * percent) / (percent + 100);
    }

function renderTax(centerState) {
    var quantity = Number($('#quantity').val());
    var gst = Number($('#gst').val());
    var state = Number($('#state').val());
    var price = Number($('#price').val());

    var cgst = 0;
    var sgst = 0;
    var igst = 0;
    var cgstVal = 0;
    var sgstVal = 0;
     /*alert(typeof(centerState));
    alert(typeof(state));*/ 
      
    console.log(centerState, state);
    if (centerState == state) {
        cgst = gst / 2;
        sgst = gst / 2;
        igst = 0;
        cgstVal =  getPercentOfNumberVal(price, cgst, gst);
        sgstVal =  getPercentOfNumberVal(price, sgst, gst);
    } else {
        cgst = 0;
        sgst = 0;
        igst = gst;
    }

    var igstVal = getPercentOfNumber(price, igst);
    var cgst_amount = (cgstVal * quantity).toFixed(2);
    var sgst_amount = (sgstVal * quantity).toFixed(2);
    var igst_amount = (igstVal * quantity).toFixed(2);
    $('#cgst').text(cgst_amount + ' (' + cgst + '%)');
    $('#sgst').text(sgst_amount + ' (' + sgst + '%)');
    $('#igst').text(igst_amount + ' (' + igst + '%)');
    $('#cgst_amount').val(cgst_amount);
    $('#sgst_amount').val(sgst_amount);
    $('#igst_amount').val(igst_amount);

}


function renderCart(centerState) {
     renderTax(centerState);
    var quantity = Number($('#quantity').val());
    var discount = Number($('#discount').val());
    var price = Number($('#price').val());

    // var totalCart = shoppingCart.itemTotal(price, cgst, sgst, igst, quantity, discount);
    var advance = Number($('#advance').val());
    var totalCart = (price * quantity) - discount;
    var pendingBill = Number($('#pending_bill').val());

    
    $('#total').val(totalCart.toFixed(2));
    $('.totalCart').text(totalCart.toFixed(2));

    var balance = (totalCart - advance) + pendingBill;
    $('#balance').val(Number(balance).toFixed(2));
    $('.pending-bill').text(Number(pendingBill).toFixed(2));
}
renderCart(centerState);




</script>