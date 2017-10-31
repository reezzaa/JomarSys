<?php $__env->startSection('head'); ?>
<script>
 function readByAjax()
  {
    /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
      $.ajax({
        type : 'get',
        url  : "<?php echo e(url('readByAjax29')); ?>",
        dataType : 'html',
        success:function(data)
        {
            $('.table-responsive').html(data);
        }
      })
        /////////////////stop top loading//////////
              NProgress.done();
        ///////////////////////////////////////////
  };
     function readByAjax2()
  {
    /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
      $.ajax({
        type : 'get',
        url  : "<?php echo e(url('readByAjax30')); ?>",
        dataType : 'html',
        success:function(data)
        {
            $('.table-responsive').html(data);
        }
      })
        /////////////////stop top loading//////////
              NProgress.done();
        ///////////////////////////////////////////

  };
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
              <!-- <?php echo $__env->make('layouts.transact.billing.individual.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
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
        <li><a href="javascript:void(0)">Invoice</a></li>
    </ol>
       
      <!-- Simple Profile Widgets Row -->
      <div class="col-md-3">
      <br>
       <div class="block">
       <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"></h3>
        </div> 
          <ul class="nav nav-pills nav-stacked">
          <li>
            <a href="javascript:void(0)" type="button" onclick="readByAjax()"><span class="badge pull-right"><?php echo e($countbill); ?></span><strong>Billing</strong></a>
          </li>
          <li>
            <a href="javascript:void(0)" type="button" onclick="readByAjax2()"><span class="badge pull-right"><?php echo e($countcollect); ?></span><strong>Collection</strong></a>
          </li>
        </ul>
        <br>
       </div>
      </div>
     <div class="col-md-9">
      <div class="block block-full">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>Billing and Collection</strong></h3>
        </div> 
           <div class="table-responsive">
             
           </div>
          <br>
      </div>
      </div>
     
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script >
    // $(function(){ FormsValidation.init(); });

     $(document).ready(function(){

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  readByAjax();


        $(this).on('click','#show', function(){
          /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
          var classID = $(this).val();
          id = classID;
          var a;
          $.get('individualbilling/' + classID + '/edit', function (data) {
            for(a=0;a<data.length;a++)
            {
              if(data[a].serstatus==null)
              {
                $('#quote').text(data[a].strQuoteID);
                $('#quoteid').val(data[a].strQuoteID);
                $('#term').val(data[a].intTerm);
                $('#desc').val(data[a].strTermDate);
                $('#name').text("Project Name: "+data[a].strQuoteName);
                $('#client').text("Confirm on billing "+data[a].strIndClientFName+" "+data[a].strIndClientLName+"?");
                $('#amt').text("Project Amount: ₱"+data[a].dblProjCost);
                $('#amount').val(data[a].dblProjCost);
              }
              else if(data[a].serstatus==0)
              {
                $('#date').val(data[a].datDueDate);
                $('#thisd').append('<p id="demo"></p>');
                Timer();
                $('#btns').hide();
              }
              else
              {
                $('#quote').text(data[a].strQuoteID);
                $('#quoteid').val(data[a].strQuoteID);
                $('#term').val(data[a].intTerm);
                $('#desc').val(data[a].strTermDate);
                // $('#or').val(data[a].strORNumber);
                $('#name').text("Project Name: "+data[a].strQuoteName);
                $('#client').text("Client: "+data[a].strIndClientFName+" "+data[a].strIndClientLName);
                $('#amt').text("Project Amount: ₱"+data[a].dblProjCost);
                $('#amount').val(data[a].dblProjCost);
                $('#stat').html('<h3>Status: <strong style="color:green">Paid</strong></h3>');
                $('#btns').hide();

              }
              
            }  
                $('#indbill_modal').modal('show');
                /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
            })
      });
        $(document).on('hidden.bs.modal','#indbill_modal', function () 
         {
                $('#quote').text(" ");
                $('#quoteid').val(" ");
                $('#term').val(" ");
                $('#desc').val(" ");
                $('#name').text("");
                $('#client').text(" ");
                $('#amt').text(" ");
                $('#amount').val(" ");
                $('#term').val(" ");
                $('#desc').val("");
                $('#stat').html(' ');
                $('#demo').remove();
                $('#date').val(' ');
                $('#btns').show();
        });

        id = $('#quoteid').val();
        $('#frm-insert').on('submit' ,function(e){
        e.preventDefault();
        var formData = $('#frm-insert').serialize();
        console.log(formData);
        $.ajax({
          type : 'POST',
          url  : '/individualbilling',
          data : formData,
          dataType: 'json',
          success:function(data){
          window.location = '/individualbilling/collect'+id;
            
          },
          error:function(data){

          }
        })
      });



        $(this).on('click','#showcollect', function(){
          /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
          var classID = $(this).val();
          id = classID;
          var a;
          $.get('individualbilling/' + classID , function (data) {
            for(a=0;a<data.length;a++)
            {
             if(data[a].serstatus==0)
             {
            $('#here').hide()
               $('#quote').text(data[a].qid);
                $('#quoteid').val(data[a].qid);
              $('#inv').html("<h5>"+data[a].strServInvHID+"</h5>");
             $('#invno').val(data[a].strServInvHID);
            $('#amtdue').html('<h5> ₱ '+data[a].dblServInvDCost+'</h5>');
            $('#amtt').val(data[a].dblServInvDCost);
             }
             else if(data[a].serstatus==1)
             {
            $('#this').hide()
              $('#quote').text(data[a].qid);
                $('#quoteidd').val(data[a].qid);
              $('#invq').html("<h5>"+data[a].strServInvHID+"</h5>");
            $('#or').html('<h5>'+data[a].strORNumber+'</h5>');
            $('#po').html('<h5>'+data[a].strPONumber+'</h5>');
            $('#amt').html("<h5> ₱ "+data[a].dblServInvDCost+"</h5>");
            $('#ten').html("<h5> ₱ "+data[a].dblPaymentCost+"</h5>");
            $('#ch').html("<h5> ₱ "+data[a].dblPaymentChange+"</h5>");
             }
            }
                $('span#duplicatew').hide();
                //not working (try to hide error if user focus on the select)
                $('#paymentcost').focus(function(){
                  $('span#duplicatew').hide();
                 });  
                $('#indcollect_modal').modal('show');
                /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
            })
      }); 
        $(document).on('hidden.bs.modal','#indcollect_modal', function () 
         {
               $('#quote').text(" ");
                $('#quoteid').val(" ");
                $('#quoteidd').val(" ");
              $('#inv').html(" ");
             $('#invno').val(" ");
            $('#amtdue').html(' ');
            $('#amtt').val(" ");
              $('#invq').html(" ");
            $('#or').html(' ');
            $('#po').html(' ');
            $('#amt').html(" ");
            $('#ten').html(" ");
            $('#ch').html(" ");
            $('#paymentcost').val(" ");
            // $('#ornumber').val(" ");
            $('#ponumber').val(" ");
            $('#this').show();
            $('#here').show();

        });


    });
     function Timer()
  {
    var setdate = $('#date').val();
    // Set the date we're counting down to
var countDownDate = new Date(setdate+' 23:59:59').getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = "<h4><strong>Due Date: "+setdate+"</strong></h4><br><h4 class='text-center'>Day/s before due date: </h4><br><h4>"+ days + " days " + hours + " hours "
  + minutes + " minutes " + seconds + " seconds </h4>";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = " ";
  }
}, 1000);
  }
  </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>