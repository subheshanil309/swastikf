
<style type="text/css">
  .mtable {
    width: 100%;
    margin-bottom: 0;
    color: #212529;
    background-color: transparent;
}
</style>
<div class="page-content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          
              


<div>
        <div class="card-header ">
             <div class="row ">
                    <div class="col-sm-6"><p >Booking Receipt</p></div>
                    <div class="col-sm-6">
                      <div class="d-flex flex-wrap gap-2 float-end">
                                                    

                          <div class="btn-group" role="group" aria-label="Basic example">
                              <a href="javascript:void(0);" class="btn btn-outline-primary active" aria-current="page">Left</a>
                               <a href="javascript:void(0);" class="btn btn-outline-primary">Right</a>
                          </div>
                      </div>
                    </div>
                    
                </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="booking_receipt" class="section-to-print invoice mt-3" style="/* max-width: 920px; */">
                <div>
                    <div class="row">
                        <div class="col-md-12 text-center mt-5">
                            <h1 class="text-danger fw-bold"><?php echo strtoupper(@$company_details['title']);?></h1>
                            <p>
                                 <?php echo  @$company_details['address'];?>
                                <br>Phone: <?php echo  @$company_details['phone'];?>, Email: <?php echo  @$company_details['email'];?>, Website:
                                <?php echo  @$company_details['website'];?>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <table class="w-100">
                                <tbody><tr class="border-dark border-top border-bottom">
                                    <td style="width: 163px;"></td>
                                    <td style="width: 55px;">GSTIN :</td>
                                    <td style="width: 141px;"><?php echo  @$company_details['gst_no'];?></td>
                                    <td style="width: 127px;"></td>
                                    <td style="width: 36px;">PAN:</td>
                                    <td style="width: 200px;"><?php echo  @$company_details['pan_no'];?></td>
                                </tr>
                            </tbody></table>
                        </div>
                        <div class="col-md-12">
                            <div style="margin-top: 25px;margin-bottom:25px;" class="text-center">
                                <h2>RECEIPT</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div style="max-width: 90%; margin-left:auto;margin-right:auto;">
                                <div class="row">
                                    <div class="col">
                                        <p>Booking No: 2962</p>
                                    </div>
                                    <div class="col">
                                        <p class="text-right">Booking Date: 07 June 2022</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col" style="border-right: 1px solid #ccc;">
                                        
                                        <p class="text-center"><strong>Billing Address</strong></p>
                                        <div class="row">
                                            <div class="col-2">Name</div>
                                            <div class="col-10"><?php echo  @$receipt_dtl['customer_name'];?></div>
                                            <div class="col-2">Address</div>
                                            <div class="col-10">
                                              <?php
                                                $bill_address = '';
                                                if(isset( $receipt_dtl['village']))
                                                {
                                                  $bill_address.= "Village - ".$receipt_dtl['village'];  
                                                }
                                                if(isset( $receipt_dtl['city']))
                                                {
                                                     
                                                      $bill_address.=", Tehsil - ".($receipt_dtl['city']=='Other')?$receipt_dtl['other_city']:$receipt_dtl['city'];  
                                                    
                                                  
                                                }
                                                if(isset( $receipt_dtl['district']))
                                                {
                                                   
                                                      $bill_address.=", District - ".($receipt_dtl['district']=='Other')?$receipt_dtl['other_district']:$receipt_dtl['district']; 
                                                } 
                                                if(isset( $receipt_dtl['state']))
                                                {
                                                   
                                                      $bill_address.=", State - ".($receipt_dtl['state']=='Other')?$receipt_dtl['other_state']:$receipt_dtl['state']; 
                                                }
                                                if(isset( $receipt_dtl['pincode']))
                                                {
                                                   
                                                      $bill_address.=", Pincode - ".($receipt_dtl['pincode']); 
                                                }
                                                
                                                echo  $bill_address;
                                              ?>
                                             

                                                                                                 
                                            </div>
                                            <div class="col-2">Mobile</div>
                                            <div class="col-10"><?php echo $receipt_dtl['customer_mobile'];?></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="text-center"><strong>Delivery Address</strong></p>
                                        <div style="padding-left:50px;">
                                            <div class="row">
                                                <div class="col-2">Name</div>
                                                <div class="col-10"><?php echo  @$receipt_dtl['customer_name'];?></div>
                                                <div class="col-2">Address</div>
                                                <div class="col-10">
                                                    <?php   echo  $bill_address;?>
                                                    
                                                </div>
                                                <div class="col-2">Mobile</div>
                                                <div class="col-10"><?php echo $receipt_dtl['customer_mobile'];?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <p class="text-center"><strong>Booking Details:</strong></p>
                                        <table class="w-100 mtable">
                                            <tbody><tr>
                                                <th>S.No.</th>
                                                <th>Description of Goods </th>
                                                <th>Qty</th>
                                                <th class="text-center">Rate</th>
                                                <th>Total</th>
                                            </tr>
                                            <tr>
                                                <td class="text-center" style="width: 50px; padding-bottom:80px;">1</td>
                                                <td class="pl-2" style="padding-bottom:80px;">
                                                    <?php echo $receipt_dtl['productname'];?></td>
                                                <td class="pr-2 text-right" style="padding-bottom:80px;">
                                                      <?php echo $receipt_dtl['quantity'];?>
                                                </td>
                                                <td style="padding-bottom:80px;" class="pr-2 text-right">
                                                     <?php echo number_format($receipt_dtl['price'],2);?>
                                                </td>
                                                <td style="padding-bottom:80px;" class="pr-2 text-right">
                                                   <?php echo number_format($receipt_dtl['total'],2);?> </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="pr-2 text-right">Total</td>
                                                <td class="pr-2 text-right">
                                                    <?php echo number_format($receipt_dtl['total'],2);?> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="pr-2 text-right">Discount</td>
                                                <td class="pr-2 text-right">
                                                    <span class="text-danger">-<?php echo number_format($receipt_dtl['discount'],2);?> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="pr-2 text-right">Total</td>
                                                <td class="pr-2 text-right">
                                                   <?php echo number_format($receipt_dtl['total'],2);?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="pr-2 text-right">Amount Received </td>
                                                <td class="pr-2 text-right"><?php echo number_format($receipt_dtl['advance'],2);?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="pr-2 text-right">Outstanding Amount </td>
                                                <td class="pr-2 text-right">0.00</td>
                                            </tr>
                                        </tbody></table>
                                    </div>
                                </div>
                                <div class="row no-gutters">
                                    <div class="col-8">
                                        <ul class="mt-3">
                                            <li>Delivery Date: 01 September 2022
                                                                                                    to 30 September 2022
                                                                                            </li>
                                            <li>Mode of payment: Online transfer </li>
                                            <li>Outstanding amount must be cleared before 15 Days of Delivery</li>
                                            <li><strong>Bank Details:</strong><br> <strong>Bank:</strong> <?php echo  @$company_details['bank_name'];?><br>
                                                <strong>Account Number :</strong> <?php echo  @$company_details['bank_account_number'];?><br>
                                                <strong>Account Holder's name :</strong> <?php echo  @$company_details['bank_holder_name'];?><br>
                                                <strong>Ifsc Code :</strong> <?php echo  @$company_details['bank_ifsc_code'];?><br>
                                                <strong>Branch :</strong> <?php echo  @$company_details['bank_branch_address'];?>
                                            </li>
                                        </ul>
                                        <p class="mb-0"><strong>Cancellation &amp; Refund:</strong></p>
                                        <ol class="receipt-note">
                                            <li>5% of total amount will be deducted if booking cancelled before 15 days of
                                                delivery date</li>
                                            <li>No amount will be refunded if booking cancelled in last 15 days of delivery
                                                or
                                                Unable to take delivery or Not responded during delivery.</li>
                                        </ol>
                                    </div>
                                    <div class="col-4">
                                        <div class="seal-section" style="margin-top: 20px;">
                                            <div class="text-center float-right" style="width: 224px;">
                                                <div>For <?php echo strtoupper(@$company_details['title']);?></div>
                                                <div style="min-height: 130px">
                                                    <img class="seal-img d-print-block d-block" style="max-width: 206px;" src="<?php echo base_url()?>assets/admin/images/seal-logo.png" alt="seal-logo">
                                                </div>
                                                <p style="margin-top: 20px;">Authorised Signatory</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer clearfix pl-1 pb-1 mt-3">
            <button type="button" id="print_receipt" class="btn btn-primary btn-sm mr-2"><i class="fas fa-print"></i>
                Print</button>
            
            <a class="btn btn-default btn-sm" href="<?php echo base_url()?>admin/bookings">Cancel</a>
        </div>
                        </div>


        </div>
      </div>
    </div>
  </div>
<script src="<?php echo base_url(); ?>assets/admin/libs/jquery/jquery.min.js"></script>
  <script>
            $('#print_without_seal').on('click', function() {
                $('.seal-img').addClass('hidden-print d-none');
                $('.seal-img').removeClass('d-print-block d-block');
            });
            $('#print_with_seal').on('click', function() {
                $('.seal-img').removeClass('hidden-print d-none');
                $('.seal-img').addClass('d-print-block d-block');
            });
            $('#print_receipt').on('click', function() {


                 window.print();
            });

             
        </script>