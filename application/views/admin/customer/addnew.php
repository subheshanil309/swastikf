
<style type="text/css">
  .mytablestyle {
    min-height: 455px;

}
 .row label {font-size: 11px;}

</style>
<div class="page-content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xl-6">
            <div class="card">
              <form   method="GET"  >
                  <h5 class="card-header bg-success text-white border-bottom ">Search Customer</h5>
                   <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="customer_id" class="col-sm-4 col-form-label text-right">Cust ID:</label>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control form-control-sm  " id="customer_id" name="customer_id" type="text" value="<?php if(isset($_GET['customer_id']) && $_GET['customer_id'] !==''){ echo $_GET['customer_id'];}?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label for="mobile" class="col-sm-4 col-form-label text-right">Mobile No.:</label>
                                <div class="col-sm-8">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control form-control-sm  " id="mobile" name="mobile" type="text" value="<?php if(isset($_GET['mobile']) && $_GET['mobile'] !==''){ echo $_GET['mobile'];}?>" >
                                        <div class="input-group-append input-group-btn">
                                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input name="form_type" type="hidden" value="search">
                   </div>
                    
              </form>
               
            </div>

            <?php
             /* print_r($edit_data);          
print_r($customer_call_dtl);  */  
       
        ?>
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
            <form action="<?php echo base_url() ?>admin/customer/insertnow" method="post" role="form" enctype="multipart/form-data" >
               <div class="row">
                <input type="hidden" name="redirect_url" id="redirect_url" value="<?php echo base_url()."admin/customer/addnew?".$_SERVER['QUERY_STRING'];?>">
                  <div class="col-sm-6">
                     <div class="card">
                        <h5 class="card-header bg-success text-white border-bottom ">Farmers Detail</h5>
                        <div class="card-body">
                           <div class="row">
                              <label for="customer_id2" class="col-sm-4 col-form-label">Farmer ID</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="customer_id2" name="customer_id" placeholder="Customer ID" readonly value="<?php if(isset($edit_data->sku_id) && $edit_data->sku_id !==''){echo $edit_data->sku_id;} ?>">
                              </div>
                           </div>
                           <div class="row">
                              <label for="customer_name" class="col-sm-4 col-form-label">Farmers Name*</label>
                              <div class="col-sm-8"> 
                                 <input type="text" class="form-control form-control-sm" id="customer_name" name="customer_name" placeholder="Farmers Name*" value="<?php if(isset($edit_data->customer_name) && $edit_data->customer_name !==''){echo $edit_data->customer_name;}?>" />
                              </div>
                           </div>
                           <div class="row">
                              <label for="customer_mobile" class="col-sm-4 col-form-label">Mobile*</label>
                              <div class="col-sm-8"> 
                                 <input type="text" maxlength="12" class="form-control form-control-sm" id="customer_mobile"  name="customer_mobile"  placeholder="Customer Mobile*"  value="<?php if(isset($edit_data->customer_mobile) && $edit_data->customer_mobile !==''){echo $edit_data->customer_mobile;}?>"   />
                              </div>
                           </div>
                           <div class="row">
                              <label for="customer_alter_mobile" class="col-sm-4 col-form-label">ALT Mobile</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="customer_alter_mobile" placeholder="ALT Mobile" name="customer_alter_mobile" value="<?php if(isset($edit_data->customer_alter_mobile) && $edit_data->customer_alter_mobile !==''){echo $edit_data->customer_alter_mobile;}?>" >
                              </div>
                           </div>
                           <div class="row">
                              <label for="state" class="col-sm-4 col-form-label">State</label>
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
                        </div>
                        <!-- end card body -->
                     </div>
                     <div class="card">
                        <h5 class="card-header bg-success text-white border-bottom ">Call Details</h5>
                        <div class="card-body">
                           <!--  <div class="row">
                              <label for="customer" class="col-sm-4 col-form-label">Choose Farmers</label>
                                <div class="col-sm-8">
                                  <select class=" form-control-sm" id="customer" name="customer" aria-label="Floating label select example">
                              
                                  <?php
                                 if(!empty($all_customers))
                                 {
                                 foreach ($all_customers as $customer) {
                                 ?>
                                  <option value="<?php echo $customer->id;?>" <?php if(isset($edit_data->id) && $customer->id ==$edit_data->id){ echo "selected";}?>><?php echo $customer->sku_id;?> <?php echo $customer->customer_title;?></option>
                                  <?php
                                 }
                                 }
                                 ?>
                                  </select>
                                </div>
                              </div> -->
                           <div class="row">
                              <label for="call_type" class="col-sm-4 col-form-label">Call Type*</label>
                              <div class="col-sm-8">
                                 <select class=" form-control  form-control-sm" id="call_type" name="call_type"  onchange="select_calltype()" aria-label="Floating label select example">
                                     
                                    <?php
                                       if(!empty($calltypes))
                                       {
                                           foreach ($calltypes as $calltype) {
                                               ?>
                                    <option value="<?php echo $calltype->id;?>"><?php echo $calltype->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="row">
                              <label for="assign_to" class="col-sm-4 col-form-label">Assign To*</label>
                              <div class="col-sm-8">
                                 <select class=" form-control select2 " id="assign_to" name="assign_to" aria-label="Floating label select example">
                                     
                                    <?php
                                       if(!empty($all_users))
                                       {
                                           foreach ($all_users as $user) {
                                               ?>
                                    <option value="<?php echo $user->id;?>" <?php if( $this->session->userdata('userId')==$user->id){echo "selected";}?> ><?php echo $user->id;?> <?php echo $user->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                           <div class="row">
                              <label for="call_back_date" class="col-sm-4 col-form-label">Call Back Date*</label>
                              <div class="col-sm-8">
                                 <input type="date" class="form-control form-control  form-control-sm" id="call_back_date" name="call_back_date"  placeholder="Call Back Date" value="<?php echo date("Y-m-d");?>">
                              </div>
                           </div>
                           <div class="row">
                              <label for="call_direction" class="col-sm-4 col-form-label">Call Direction*</label>
                              <div class="col-sm-8">
                                 <select class=" form-control  form-control-sm" id="call_direction" name="call_direction" aria-label="Floating label select example">
                                    
                                    <?php
                                       if(!empty($calldirections))
                                       {
                                           foreach ($calldirections as $calldirection) {
                                               ?>
                                    <option value="<?php echo $calldirection->id;?>"><?php echo $calldirection->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="card">
                        <h5 class="card-header bg-success text-white border-bottom ">Current Conversation</h5>
                        <div class="card-body">
                           <div class="row ">
                              <div class="col-sm-12">
                                 <textarea   class="form-control form-control-sm" id="current_conversation" name="current_conversation" placeholder="Current Conversation"  ></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- <div class="card">
                        <h5 class="card-header bg-success text-white border-bottom ">Send To Whatsapp</h5>
                        <div class="card-body" >
                           <div class="row " hidden>
                              <div class="col-sm-6">
                                 <?php 
                                    for ($i=0; $i < 13; $i++) { 
                                       ?>
                                 <div class="form-check mb-1">
                                    <input class="form-check-input" type="checkbox" id="horizontalLayout-Check">
                                    <label class="form-check-label" for="horizontalLayout-Check">
                                    Office address 
                                    </label>
                                 </div>
                                 <?php
                                    }
                                    ?>
                              </div>
                              <div class="col-sm-6">
                                 <?php 
                                    for ($i=0; $i < 13; $i++) { 
                                       ?>
                                 <div class="form-check mb-1">
                                    <input class="form-check-input" type="checkbox" id="horizontalLayout-Check">
                                    <label class="form-check-label" for="horizontalLayout-Check">
                                    Office address 2
                                    </label>
                                 </div>
                                 <?php
                                    }
                                    ?>
                              </div>
                           </div>
                           <div class="row">
                              <label for="whatsapp_number" class="col-sm-4 col-form-label">WhatsApp No-</label>
                              <div class="col-sm-8">
                                 <input type="text" class="form-control form-control-sm" id="whatsapp_number" name="whatsapp_number" placeholder="WhatsApp No-">
                              </div>
                           </div>
                        </div>
                     </div> -->
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-body ">
                           <button type="submit" class="btn btn-primary w-md float-end">Save</button>
                           <input type="hidden" name="id" value="<?php if(isset($edit_data->id)){echo $edit_data->id;} ?>"/>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="col-xl-6">
            <div class="card">
               <form action='' method="get">
                <input name="form_type" type="hidden" value="inquiry">
                 <h5 class="card-header bg-success text-white border-bottom ">
                   <div class="row ">
                     <div class="col-sm-7">
                      Inquiry Stat
                     </div>
                     <div class="col-sm-3">
                          <div class="input-group input-group-sm">
                               <select class="form-control form-control-sm " id="uid" name="uid" aria-label="Floating label select example">
                           <option value="" >Choose User</option>
                          <?php
                             if(!empty($all_users))
                             {
                                 foreach ($all_users as $user) {
                                     ?>
                          <option value="<?php echo $user->id;?>" <?php if( isset($_GET['uid']) && $_GET['uid']==$user->id){echo "selected";}?> ><?php echo $user->id;?> <?php echo $user->title;?></option>
                          <?php
                             }
                             }
                             ?>
                       </select>
                          <div class="input-group-append">
                              <button type="submit" class="btn btn-info btn-sm">Filter</button>                                    
                          </div>
                      </div>
                     </div>
                     <div class="col-sm-2">
                      <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-file-export"></i>Export</button>  
                     </div>
                   </div>
                 </h5>
               </form>
               
               <div class="card-body">
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="card card-body pt-0">
                           <h4 class="card-title bg-success text-white p-1 ">Call Summary:</h4>
                           <?php

                           if(!empty($count_call_summary))
                              {
                                $uuid = (isset($_GET['uid']))?("&uid=".$_GET['uid']):"";
                                 foreach ($count_call_summary as $key => $value) 
                                {
                                     ?>
                                     <div class="flex-grow-1">
                                        <a href="<?php echo base_url()?>admin/customer/addnew?form_type=inquiry&call_type2=<?php echo $value['id'].$uuid?>">
                                          <div class="float-end">
                                           <p class="text-primary mb-0"><?php echo $value['total_count_call'];?></p>
                                        </div>
                                        <p class="text-primary mb-0"><?php echo $value['title'];?></p>
                                        </a>
                                     </div>
                                     <?php
                                }
                              }

/*
                              if(!empty($calltypes))
                                {
                                    foreach ($calltypes as $calltype) {
                                        ?>
                           <div class="flex-grow-1">
                              <div class="float-end">
                                 <p class="text-primary mb-0">0</p>
                              </div>
                              <p class="text-primary mb-0"><?php echo $calltype->title;?></p>
                           </div>
                           <?php
                              }
                              }*/
                              ?>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="card card-body pt-0">
                           <h4 class="card-title bg-success text-white  p-1 ">Follow up Summary</h4>
                           <div class="flex-grow-1">
                              <div class="float-end">
                                 <p class="text-primary mb-0">0</p>
                              </div>
                              <p class="text-primary mb-0">Missed followup</p>
                           </div>
                           <div class="flex-grow-1">
                              <div class="float-end">
                                 <p class="text-primary mb-0">0</p>
                              </div>
                              <p class="text-primary mb-0">Due Today</p>
                           </div>
                           <div class="flex-grow-1">
                              <div class="float-end">
                                 <p class="text-primary mb-0">0</p>
                              </div>
                              <p class="text-primary mb-0">Super Hot Call</p>
                           </div>
                           <div class="flex-grow-1">
                              <div class="float-end">
                                 <p class="text-primary mb-0">0</p>
                              </div>
                              <p class="text-primary mb-0">Due Tomorrow</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="card card-body pt-0">
                           <h4 class="card-title    p-1  bg-success text-white">Booking Summary:</h4>

                            <div class="flex-grow-1">
                              <div class="float-end">
                                 <p class="text-primary mb-0">0</p>
                              </div>
                              <p class="text-primary mb-0">Today's Booking</p>
                           </div>
                           <div class="flex-grow-1">
                              <div class="float-end">
                                 <p class="text-primary mb-0">0</p>
                              </div>
                              <p class="text-primary mb-0">Last 7 Days</p>
                           </div>
                           <div class="flex-grow-1">
                              <div class="float-end">
                                 <p class="text-primary mb-0">0</p>
                              </div>
                              <p class="text-primary mb-0">This Month</p>
                           </div>
                           <div class="flex-grow-1">
                              <div class="float-end">
                                 <p class="text-primary mb-0">0</p>
                              </div>
                              <p class="text-primary mb-0">Previous Month</p>
                           </div>
                         </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="card">
                    <form method="GET" action="<?php echo base_url()?>admin/customer/addnew">

                      <h5 class="card-header bg-success text-white border-bottom ">
               <div class="row ">
                 <div class="col-sm-9">
                  Inquiries
                 </div>
                 
                 <div class="col-sm-3">
                  <a href="<?php echo base_url()?>admin/customer/addnew" class="btn btn-info btn-sm">Clear</a> 
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
                                    <th class="align-middle bg-success text-white">Date</th>
                                    <th class="align-middle bg-success text-white"><input class="form-control-sm" type="text" name="search_customer_id" id="search_customer_id" placeholder="Farmer ID"  style="width: 70px;"  ></th>
                                    <th class="align-middle bg-success text-white"><input class="form-control-sm" type="text" name="search_name" id="search_name" placeholder="Name"  style="width: 60px;" ></th>
                                    <th class="align-middle bg-success text-white"><input class="form-control-sm" type="text" name="search_mobile" id="search_mobile" placeholder="Mobile"  style="width: 60px;" ></th>
                                    <th class="align-middle bg-success text-white"><input class="form-control-sm" type="text" name="search_alt_mobile" id="search_alt_mobile" placeholder="ALT Mobile"  style="width: 60px;" ></th>
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
                                      <select class=" form-control  form-control-sm" id="call_direction2" name="call_direction2" aria-label="Floating label select example"  style="width: 75px;"  >
                                     <option value="">CallDirection</option>
                                    <?php
                                       if(!empty($calldirections))
                                       {
                                           foreach ($calldirections as $calldirection) {
                                               ?>
                                    <option value="<?php echo $calldirection->id;?>"><?php echo $calldirection->title;?></option>
                                    <?php
                                       }
                                       }
                                       ?>
                                 </select>
                               </th>
                                    <th class="align-middle bg-success text-white">
                                      <select class=" form-control  form-control-sm" id="call_type2" name="call_type2" aria-label="Floating label select example"  style="width: 75px;" >
                                         <option value="">CallType</option>
                                        <?php
                                           if(!empty($calltypes))
                                           {
                                               foreach ($calltypes as $calltype) {
                                                   ?>
                                        <option value="<?php echo $calltype->id;?>"><?php echo $calltype->title;?></option>
                                        <?php
                                           }
                                           }
                                           ?>
                                      </select>
                                    </th>
                                    
                               <th class="align-middle bg-success text-white" >Followup date</th>
                               <th class="align-middle bg-success text-white" >Assigned to</th>
                               <th class="align-middle bg-success text-white" >Entry made by</th>
                               <th class="align-middle bg-success text-white" >Entry Date</th>
                               <th class="align-middle bg-success text-white" >Last Follower</th>
                               <th class="align-middle bg-success text-white" >Last Call Type</th>
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
                                        <td><?php echo $customer['id'];?></td>
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
                            <?php echo $this->pagination->create_links(); ?>  
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

      <!-- end col -->
     
            <div class="row">
               <div class="col-sm-4">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title mb-5">Previous Conversation</h4>
                               <div  id="example23">
                                  
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-4"></div>
               <div class="col-sm-4"></div>
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
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
 
<script type="text/javascript">
  function select_calltype()
  {
     $('#call_back_date').attr('readonly', false);
    var call_type =  $('#call_type').val();
   
    if(call_type==2)
    {
      $('#call_back_date').val(''); 
      $('#call_back_date').attr('readonly', true);

    }

    
  }
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

          
            current_cutomer_call_detail();
            stateChange('<?php echo @$edit_data->state;?>','<?php echo @$edit_data->district;?>');
            districtChange('<?php echo @$edit_data->district;?>','<?php echo @$edit_data->city;?>');
        });
      </script>
      <?php
    }
?>

<script type="text/javascript">
   var table;

   $(document).ready(function() {
   $("#query-pagination li.page-item a").addClass('page-link');
    $(".select2").select2();
    
       //datatables
 /*      table = $('#example').DataTable({ 
    
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "order": [], //Initial no order.
    
           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo site_url('admin/customer/ajax_list')?>",
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