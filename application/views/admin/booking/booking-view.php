
<style type="text/css">

    .invoice
    {
            background: #fff;
            border: 1px solid rgba(0,0,0,.125);
            position: relative;
    }

     

    @media print {
 
    

      body * {
        visibility: hidden;
    }

    .cart-table th,
    .table th,
    .cart-table td,
    .table td {
        /* border-color: #000; */
        color: #000;
    }

  
    .section-to-print,
    .section-to-print * {
        visibility: visible;

    }

    .section-to-print p
    {
        margin: 0;
    }
    .section-to-print {
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
    }

    

    .row>* {
    position: unset;
}
 } 
  .mtable {
    width: 100%;
    margin-bottom: 0;
    color: #212529;
    background-color: transparent;
}

.mtable td,
.mtable th {
    padding: 0;
    border: 1px solid #212529;
}

.mtable .noborder td,
.mtable .noborder th {
    border: 0;
    padding: 0;
}


 
 @page  {
            size: auto;
            /* auto is the initial value */
            margin: 0;
            border: 1px solid #666;
        }

        @media  print {

            html,
            body,
            div,
            span,
            applet,
            object,
            iframe,
            p,
            blockquote,
            pre,
            a,
            abbr,
            acronym,
            address,
            big,
            cite,
            code,
            del,
            dfn,
            em,
            font,
            ins,
            kbd,
            q,
            s,
            samp,
            small,
            strike,
            strong,
            sub,
            sup,
            tt,
            var,
            dl,
            dt,
            dd,
            ol,
            ul,
            li,
            fieldset,
            form,
            label,
            legend,
            table,
            caption,
            tbody,
            tfoot,
            thead,
            tr,
            th,
            td {
                font-size: 14px !important;
            }

        }

</style>
<div class="page-content">
  <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          
              


<div>
     <pre>
        <?php 
            print_r($receipt_dtl);
        ?>
     </pre>
         
        <!-- /.card-header -->
        <div class="card-body " style='border: 1px solid #ccc; '>
             <div id="booking_receipt" class="section-to-print">
                <h3 class="mt-2 d d-print-block text-center"><?php echo (@$company_details['title']);?></h3>
                <p class="mt-2 d d-print-block text-center"><?php echo (@$company_details['office_address']);?></p>
                <h3 class="mt-2 d-print text-center">Booking Order Details</h3>

                <div class="card">
                    <div class="card-header p-2">
                        <h3 class="card-title">Order Details</h3>
                    </div>
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col">
                                <strong>Booking Order No.</strong>
                                <div class="text-muted">
                                    <?php echo (@$receipt_dtl['id']);?>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Booking Date</strong>
                                <div class="text-muted">
                                    <?php echo ($receipt_dtl['booking_date']=='0000-00-00' || $receipt_dtl['booking_date']==null)?'': date('d M Y',strtotime($receipt_dtl['booking_date'])); ?>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Booking Status</strong>
                                <div class="text-muted">
                                    <div><?php echo (@$receipt_dtl['booked_status']);?></div>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Req. Delivery Date</strong>
                                <div class="text-muted">
                                    <div><?php echo ($receipt_dtl['delivery_expect_start_date']=='0000-00-00' || $receipt_dtl['delivery_expect_start_date']==null)?'': date('d M Y',strtotime($receipt_dtl['delivery_expect_start_date'])); ?></div>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Transportation by</strong>
                                <div class="text-muted">
                                    <div></div>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Vehicle No.</strong>
                                <div class="text-muted">
                                    <div><?php echo (@$receipt_dtl['vehicle_no']);?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <strong>Delivery Date</strong>
                                <div class="text-muted">
                                    <div><?php echo ($receipt_dtl['delivery_date']=='0000-00-00' || $receipt_dtl['delivery_date']==null)?'': date('d M Y',strtotime($receipt_dtl['delivery_date'])); ?></div>
                                </div>
                                <div>
                                    <strong>Driver Name</strong>
                                    <div class="text-muted">
                                        <div><?php echo (@$receipt_dtl['driver_name']);?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Agent Name</strong>
                                <div class="text-muted">
                                    <div><?php echo (@$receipt_dtl['executive']);?></div>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Entered by</strong>
                                <div class="text-muted">
                                    <?php echo (@$receipt_dtl['createdby']);?>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Entry date and Time</strong>
                                <div class="text-muted"> <?php echo date('d/m/Y h:i a',strtotime($receipt_dtl['date_at']));?>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Approved by</strong>
                                <div class="text-muted">

                                </div>
                            </div>
                            <div class="col">
                                <strong>Approval Date and time</strong>
                                <div class="text-muted">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header p-2">
                        <h3 class="card-title">Customer Details</h3>
                    </div>
                    <div class="card-body p-2">
                        <div class="row">
                            <div class="col-1">
                                <strong>Customer Id</strong>
                                <div class="text-muted">
                                    <?php echo  @$receipt_dtl['customer_id'];?>
                                </div>
                            </div>
                            <div class="col-2">
                                <strong>Customer Name</strong>
                                <div class="text-muted">
                                    <?php echo  @$receipt_dtl['customer_name'];?>
                                </div>
                            </div>
                            <div class="col-1">
                                <strong>Contact Details</strong>
                                <div class="text-muted">
                                    <?php echo  @$receipt_dtl['customer_mobile'];?>
                                </div>
                            </div>
                            <div class="col">
                                <strong>Billing Address</strong>
                                <div class="text-muted">
                                    <?php
                                                $bill_address = '';
                                                if(isset( $receipt_dtl['village']) && $receipt_dtl['village'] !=='')
                                                {
                                                  $bill_address.= "Village - ".$receipt_dtl['village'];  
                                                }
                                                if(isset( $receipt_dtl['city']) && $receipt_dtl['city'] !=='')
                                                {
                                                     
                                                      $bill_address.=", Tehsil - ".($receipt_dtl['city']=='Other')?$receipt_dtl['other_city']:$receipt_dtl['city'];  
                                                    
                                                  
                                                }
                                                if(isset( $receipt_dtl['district']) && $receipt_dtl['district'] !=='')
                                                {
                                                   
                                                      $bill_address.=", District - ".($receipt_dtl['district']=='Other')?$receipt_dtl['other_district']:$receipt_dtl['district']; 
                                                } 
                                                if(isset( $receipt_dtl['state']) && $receipt_dtl['state'] !=='')
                                                {
                                                   
                                                      $bill_address.=", State - ".($receipt_dtl['state']=='Other')?$receipt_dtl['other_state']:$receipt_dtl['state']; 
                                                }
                                                if(isset( $receipt_dtl['pincode']) && $receipt_dtl['pincode'] !=='')
                                                {
                                                   
                                                      $bill_address.=", Pincode - ".($receipt_dtl['pincode']); 
                                                }
                                                
                                                
                                              ?>
                                    <?php echo  $bill_address;  

                                        if(@$receipt_dtl['same_billing']=='yes')
                                        {
                                            $shiping_addres = $bill_address;
                                        }else
                                        {
                                            $shiping_addres =  @$receipt_dtl['delivery_address'];
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="col">
                                <strong>Delivery Address</strong>
                                <div class="text-muted">
                                     <?php 
                                        echo $shiping_addres;
                                     ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header p-2">
                        <h3 class="card-title">Product Details</h3>
                    </div>
                    <div class="card-body p-2">
                                                <div class="overlay-wrapper item-data">
                            <div class="overlay">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            </div>
                            <table id="cart_table" class="cart-table w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center">Crop (Product)</th>
                                        <th class="text-center" style="width: 100px;">UOM</th>
                                        <th class="text-center" style="width: 100px;">Rate</th>
                                        <th class="text-center" style="width: 100px;">Quantity</th>
                                        <th class="text-center" style="width: 100px;">CGST</th>
                                        <th class="text-center" style="width: 100px;">SGST</th>
                                        <th class="text-center" style="width: 100px;">IGST</th>
                                        <th class="text-center" style="width: 100px;">Discount</th>
                                        <th class="text-center" style="width: 100px;">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="cart-body">
                                    <tr>
                                        <td>
                                            <div>Papaya–Red Lady Seedlings</div>
                                        </td>
                                        <td>
                                            <div>Ps</div>
                                        </td>
                                        <td class="text-right">
                                            <div>35.00</div>
                                        </td>
                                        <td>
                                            <div>1500</div>
                                        </td>
                                        <td class="text-right">
                                            <span id="cgst">0.00</span>
                                        </td>
                                        <td class="text-right">
                                            <span id="sgst">0.00</span>
                                        </td><td class="text-right">
                                            <span id="igst">0.00</span>
                                        </td>
                                        <td>
                                            <div></div>
                                        </td>
                                        <td class="text-right">
                                            <div class="totalCart">
                                                52,500.00
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-right" colspan="8">Total</td>
                                        <td class="text-right">
                                            <div class="totalCart">
                                                52,500.00
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-right" colspan="8">Total Paid</td>
                                        <td class="text-right">
                                            <div class="paidAmount">15,000.00</div>
                                        </td>
                                    </tr>
                                    <tr class="text-danger">
                                        <td class="text-right" colspan="8">Pending Balance</td>
                                        <td class="text-right">
                                            <div id="pending_amount">37,500.00</div>
                                        </td>
                                    </tr>
                                                                    </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="order-payments">
    <div class="card-header p-2">
        <h3 class="card-title" style="font-size: 1.3rem;">Payment Details</h3>
            </div>
    <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Mode</th>
                <th>Bank Trxn Id</th>
                            </tr>
        </thead>
        <tbody>
                                    <tr>
                <td>07 June 2022</td>
                <td><span class="badge badge-info">Payment</span></td>
                <td>15000.00</td>
                <td>
                    Online transfer
                                    </td>
                <td> </td>
                            </tr>
                    </tbody>
    </table>
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
                $('#print_without_seal').addClass('active');
                $('#print_with_seal').removeClass('active');
                $('.seal-img').addClass('hidden-print d-none');
                $('.seal-img').removeClass('d-print-block d-block');
            });
            $('#print_with_seal').on('click', function() {
                $('#print_with_seal').addClass('active');
                $('#print_without_seal').removeClass('active');
                $('.seal-img').removeClass('hidden-print d-none');
                $('.seal-img').addClass('d-print-block d-block');
            });
            $('#print_receipt').on('click', function() {


                 window.print();
            });

             
        </script>

