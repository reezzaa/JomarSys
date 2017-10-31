<?php $__env->startSection('head'); ?>
<script>
 
function exact()
{
  var dueamt = $('#amtt').val();
  $('#paymentcost').val(dueamt);
  $("#change").html("<br>₱ 0");
    $('#changed').val(0);
  


}
function compute()
{
  var dueamt = $('#amtt').val();
  var payment = $('#paymentcost').val();
    var total = (payment - dueamt);
  if(total<0)
  {
    $('span#duplicatew').show();
    $('#submit').attr('disabled',true);
    $("#change").html("");

  }
  else if (total>= 0)
  {
    $("#change").html("<br>₱ "+total);
    $('#changed').val(total);
    $('span#duplicatew').hide();
    $('#submit').attr('disabled',false);

  }
}   

  
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
  <!-- Main Sidebar -->
  <div id="sidebar">
      <!-- Wrapper for scrolling functionality -->
      <div class="sidebar-scroll">
          <!-- Sidebar Content -->
          <div class="sidebar-content">
              <!-- Icon for user -->
              <?php echo $__env->make('layouts.headers.usericon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <!-- Sidebar Navigation -->
              <?php echo $__env->make('layouts.dashboard.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <!-- <?php echo $__env->make('layouts.transact.billing.company.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
              <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
      </div>
      <!-- END Wrapper for scrolling functionality -->
  </div>
  <!-- END Main Sidebar -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="content-header">
    <div class="header-section">
      <h4>
          <i class="fa fa-wrench"> </i> Billing and Collection Transaction<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Transaction</a></li>
        <li><a href="javascript:void(0)">Billing and Collection</a></li>
    </ol>
     <div class="block-title themed-background">
            <h3 class="themed-background" style="color:white"><strong>Collection</strong></h3>
            </div>
       <div class="">
         <div class="block block-full">
           <fieldset>          
                
                <table class="table table-striped  table-hover">
                      <thead>
                          <tr>
                            <th class="text-center">Invoice No</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Amount Tendered</th>
                            <th class="text-center">Change</th>
                            <th class="text-center">Due Date</th>
                            <th class="text-center">Date of Payment</th> 
                            <th class="text-center">OR No.</th> 

                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                      <?php $__currentLoopData = $getdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                         <td class="text-center">
                           <h5><?php echo e($getdata->strServInvHID); ?></h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ <?php echo e($getdata->dblServInvDCost); ?></h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ <?php echo e($getdata->dblPaymentCost); ?></h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ <?php echo e($getdata->dblPaymentChange); ?></h5>
                         </td>
                         <td class="text-center">
                           <h5> <?php echo e(\Carbon\Carbon::parse($getdata->datDueDate)->toFormattedDateString()); ?></h5>
                         </td>
                         <td class="text-center">
                           <h5><?php echo e(\Carbon\Carbon::parse($getdata->datPaymentDateIssued)->toFormattedDateString()); ?></h5>
                         </td>
                         <td class="text-center">
                           <h5><?php echo e($getdata->strORNumber); ?></h5>
                         </td>                           
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                    <br>
           </fieldset>
           <hr>
          
          <br>
      </div>
       </div>
       
      <div class=" block block-full ">
      
         <fieldset id="here">
          <?php echo Form::open(['url'=>'billing/$myId/storeThis','method'=>'post','target'=>'_blank', 'id'=>'form-insert']); ?>  
           <input type="hidden" id="getId" name="getId" value=<?php echo e($myId); ?>>

            <label for="" class="col-md-offset-0"><h3>Current Billed Account</h3></label>
            <br>
            <fieldset>
            <div class="row">
                    <label for="" class="text-center col-md-4"><h5><strong>Invoice No: </h5></strong></label> 
                    <label for="" id="inv"></label>
                    <input type="hidden" id="invno" name="invno">
                  </div>
                  <div class="row col-md-12" id="order">
                    <label for="" class="col-md-4 text-center"><h5><strong>Contract Order: </strong></h5></label>
                   <div class="input-group col-md-8">  
                              <span class="input-group-addon"><strong>CO#</strong></span>
                              <input type="text" id="conumber" name="conumber" class="form-control" placeholder="e.g. 90900" required maxlength="45">
                              <script>
                                $('#conumber').numeric({
                                allowMinus:   false
                            });
                              </script>
                    </div>
                  </div>

                  <div>
                    <br><br>
                      <hr>
                    </div>
              <div class="row">
              <label for="" class="text-center col-md-4"><h5><strong>Amount Due: </h5></strong></label> 
              <label for="" id="amtdue"></label>
              <input type="hidden" id="amtt">

            </div>
             <div class="row col-md-12">
                <label for="" class="col-md-4 text-center"><h5><strong>Amount Terdered: </strong></h5></label>
                   <div class="input-group col-md-8">  
                          <span class="input-group-addon"><strong>₱</strong></span>
                          <input type="text" id="paymentcost" name="paymentcost" class="form-control" onkeyup="compute()" placeholder="e.g. 0000.00" required maxlength="16">
                          <span class="input-group-btn">
                          <button type="button" class="btn btn-primary" onclick="exact()">Exact Amount</button>
                           </span>
                           <script>
                             $('#paymentcost').numeric({
                          decimalSeparator: ".",
                          maxDecimalPlaces : 2,
                          allowMinus:   false
                      });
                           </script>
                        </div>

                           <span id="duplicatew" class="help-block animation-slideDown col-md-offset-4 ">
                                  Insufficient Payment!
                              </span>
            </div>
                      <br><br>  
            <div class="row">
              <label for="" class="text-center col-md-4"><h5><strong>Change: </h5></strong></label> 
              <label for="" id="change" class="col-md-8"></label>
              <input type="hidden" id="changed" name="changed">
              <input type="hidden" id="mode" name="mode">
              <input type="hidden" id="getId2" name="getId2">


            </div>
            <hr>
            <label class="control-label" for="example-textarea-input">Remarks </label>
                      <textarea id="remarks" name="remarks" rows="2" class="form-control" placeholder="Content.."></textarea>
            <div>
              <hr>
            </div>
             <fieldset class="form-group">
                  <div class="pull-right">
                     <?php echo Form::submit('Collect Payment',['id'=>'submit','class'=>'btn btn-alt btn-success']); ?>

                     <?php echo Form::button('Reset',['type'=>'reset','class'=>'btn btn-alt btn-warning']); ?>

                  </div>
                </fieldset>
            </fieldset>
          <?php echo Form::close(); ?>

           </fieldset>
        </div> 
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script >
    // $(function(){ FormsValidation.init(); });
     $('span#duplicatew').hide();
      //not working (try to hide error if user focus on the select)
      $('#paymentcost').focus(function(){
        $('span#duplicatew').hide();
       });
      var getId = $('#getId').val();

    $.get( getId +'/showThis', function (data) {
       
     $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      }); 
         if(data.dstatus)
         {
           $('#inv').html("<h5>"+data.strServInvHID+"</h5>");
            $('#invno').val(data.strServInvHID);
            $('#amtdue').html('<h5> ₱ '+data.dblServInvDCost+'</h5>');
            $('#amtt').val(data.dblServInvDCost);
            $('#mode').val('Downpayment');
            $('#getId2').val(data.id);
            $('#submit').attr('disabled',false);
         }
         else if(data.pbstatus)
         {
           $('#inv').html("<h5>"+data.strServInvHID+"</h5>");
            $('#invno').val(data.strServInvHID);
            $('#amtdue').html('<h5> ₱ '+data.dblServInvDCost+'</h5>');
            $('#amtt').val(data.dblServInvDCost);
            $('#mode').val('Progress Billing');
            $('#getId2').val(data.intPBID);
            $('#submit').attr('disabled',false);
            $('#order').remove();
         }
         else
         {
            $('#form-insert').remove();
            $('#here').html('<h3 class="text-center"><strong>No Current Billed Account</strong></h3>');

         }
    });
 })

  </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>