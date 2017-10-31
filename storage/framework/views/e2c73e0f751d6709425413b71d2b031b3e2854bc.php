<?php $__env->startSection('head'); ?>

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
              
              <!-- <?php echo $__env->make('layouts.transact.contract.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
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
          <i class="fa fa-wrench"> </i> Contract Transaction<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Transaction</a></li>
        <li><a href="/contractlist">Contract List</a></li>
        <li><a href="javascript:void(0)">View Contract</a></li>

    </ol>
    <?php $__currentLoopData = $var; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="block full">
          <div class="block-title themed-background">
          <!-- <?php $__currentLoopData = $var; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> -->
          <h3 class="themed-background" style="color:white;"><strong><?php echo e($v->strQuoteName); ?></strong></h3>
          </div>
           <div class="block-section">
              <!-- Company Info -->
              <div class="col-md-offset-5">
                    <a href="<?php echo e(url('images', $v->strCompClientImage)); ?>" data-toggle="lightbox-image">
                      <img src="<?php echo e(url('images', $v->strCompClientImage)); ?>" alt="company_logo" style="width:145px;">
                    </a>
                  </div><hr>
                  <div class="col-md-offset-8">
                     <h5><strong>Quotation ID: <a href=""><?php echo e($v->strQuoteID); ?></a></strong> </h5>
                  </div>
                  <div class="col-md-offset-1">
                    <h5 ><strong>Client Name: </strong> <a href="/newcompclient/<?php echo e($v->strCompClientID); ?>"><?php echo e($v->strCompClientName); ?></a></h5>

                  </div>
                  
            </div>
            <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="block">
            <div class="block-title">
              <h3><strong>Progress Billing & Collection</strong></h3>
            </div>
            <!-- <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
              <!-- Contract List -->
     <div class="row">
       <div class="col-md-4">
          <table class="table table-vcenter table-striped table-bordered table-hover">        
          <thead>
   
              <tr>
                <th class="text-center">Status</th>
                <th class="text-center">Progress</th>
                <th class="text-center">Price</th>
            </tr>
          </thead>
          <tbody >
          <tr>
                  <td class="text-center">
                           <?php if(($showDown->downstatus)==0): ?>
                           <h5 style="color: #D64F40;font-weight: bold;"> Unpaid</h5>
                            <?php elseif(($showDown->downstatus)==1): ?>
                            <h5 style="color: #18A15E;font-weight: bold;"> Paid</h5>
                            <?php elseif(($showDown->downstatus)==2): ?>
                            <h5 style="color: #E28E00;font-weight: bold;"> for billing</h5>
                          <?php endif; ?>
                         </td>
                  <td class="text-center">
                           <h5><?php echo e($showDown->intDownValue); ?>% Downpayment</h5>
                  </td>
                   <td class="text-center">
                           <h5>₱ <?php echo e($showDown->dcmDPAmount); ?></h5>
                         </td>        
          </tr>
           <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                 <td class="text-center">
                           <?php if(($t->status)==0): ?>
                           <h5 style="color: #D64F40;font-weight: bold;"> Unpaid</h5>
                            <?php elseif(($t->status)==1): ?>
                            <h5 style="color: #18A15E;font-weight: bold;"> Paid</h5>
                            <?php elseif(($t->status)==2): ?>
                            <h5 style="color: #E28E00;font-weight: bold;"> for billing</h5>
                          <?php endif; ?>
                         </td>
                <td class="text-center">
                    <h5><?php echo e($t->intPBValue); ?> % Progress Billing</h5>
                </td>
                <td class="text-center">
                           <h5 id="sub">₱ <?php echo e($t->dblPBAmount); ?> </h5>
                         </td>
              </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </tbody>
        </table>
          </div>
          <div class="col-md-8">
            <table class="table table-vcenter table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                            <th class="text-center">Invoice No</th>
                            <th class="text-center">Amount</th>
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
          </div>
       </div>
     </div>
      <div class="block">
            <div class="block-title">
              <h3><strong>Progress Monitoring</strong></h3>
            </div>
              <!-- Contract List -->
     <div class="row">
       <div class="col-md-12">
          <table  class="table table-vcenter table-striped table-bordered table-hover">
              <thead>
                 <tr>
                 <th class="text-center" style="width: 300px;"><b>Service</b></th>
                 <th class="text-center"><b>Activity</b></th>
                 <th class="text-center" ><b>Starting Date</b></th>
                 <th class="text-center" ><b>Due Date</b></th>
                 <th class="text-center" style="width: 50px;"></th>
                 <th class="text-center" style="width: 120px;"><b>Status</b></th>
                 <th class="text-center" style="width: 50px"><b></b></th>

               </tr>
              </thead>
              <tbody>
                 
              </tbody>
             
             </table> 
          </div>
         
       </div>
     </div>
           <div class="block">
            <div class="block-title">
              <h3><strong>Delivery</strong></h3>
            </div>
              <!-- Contract List -->
     <div class="row">
      <div class="col-md-12">
          <table id="5cols-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
     <tr>
      <th class="text-center"> Person-in-charge</th>
      <th class="text-center">Delivery Date</th>
      <th class="text-center">Location</th>
      <th class="text-center">Remarks</th>
      <th class="text-center">Status</th>
      <th class="text-center" style="width: 50px"><b></b></th>

    </tr>
  </thead>
  <tbody id="project-list">
       

    <?php $__currentLoopData = $delitable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td class="text-center"> <?php echo e($dt->strEmpFirstName); ?> <?php echo e($dt->strEmpMiddleName); ?> <?php echo e($dt->strEmpLastName); ?></td>
        <td class="text-center"> <?php echo e(\Carbon\Carbon::parse($dt->datDeliveryHDate)->toFormattedDateString()); ?></td>
        <td class="text-center"><?php echo e($dt->strDelAddress); ?> <?php echo e($dt->strDelCity); ?>, <?php echo e($dt->strDelProvince); ?> </td>
        <td class="text-center"><?php echo e($dt->strDeliveryHRemarks); ?></td>
        <td class="text-center">
           <?php if($dt->status==1): ?>
                   <span class="label label-info"> Finished</span>

                 <?php else: ?>
                   <span class="label label-warning"> Pending</span>
                  <?php endif; ?>
        </td>
        <td class="text-center">
           <button class="btn btn-alt btn-info" id="viewdel" value="<?php echo e($dt->strDeliveryHID); ?>" data-toggle="tooltip" data-placement="top" data-original-title="View"><span class="gi gi-eye_open"></span> </button>
        </td>



      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
      </div>
       
       </div>
     </div>
        </div>
        <div id="view_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block full container-fluid">
            <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>View Activity</strong></h3>
                  </div>   
                <div class="row">
                <div class="col-md-offset-1">
                      <h4><i class="gi gi-construction_cone"></i> Workers:</h4> 
                    <div class="col-md-5 col-md-offset-1" id="special">
                   
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-offset-1">
                  <h4><i class="fa fa-cube"></i> Materials: </h4>
                  <div class="col-md-5 col-md-offset-1" id="special1">
                   
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-offset-1">
                  <h4><i class="gi gi-blacksmith"></i> Equipments: </h4>
                  <div class="col-md-5 col-md-offset-1" id="special2">
                   
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-offset-1">
                  <h4><strong>Update History</strong></h4>
                  </div>
                  <div class="col-md-6 col-md-offset-1" id="his">
                    <br>
                  </div>
                </div>
              </div>     
        </div>
      </div>
    </div>
    <div id="viewdel_modal" class="modal fade view_modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="block">
        <div class="block-title themed-background">
          <div class="block-options pull-right">
              <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="themed-background" style="color:white;"><strong id="nameheader">View Delivery</strong></h3>
        </div>

        <div class="row">
          <div class="col-md-offset-1">
                <h4><i class="gi gi-cargo"></i> Materials:</h4> 
              <div class="col-md-5 col-md-offset-1" id="specialm">
             
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-offset-1">
            <h4><i class="fa fa-truck"></i> Delivery Trucks: </h4>
            <div class="col-md-5 col-md-offset-1" id="special1m">
             
            </div>
          </div>
        </div>
        
        <div id="clearfix"></div>
      </div>
    </div>
  </div>
</div> 


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<!-- <script>$(function(){ TablesDatatables.init(); });</script> -->

  <script >
    // $(function(){ FormsValidation.init(); });

     $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
            $(this).on('click','#view_this', function(){
          var classID = $(this).val();
          var a,b=0;

         /////////////////top loading//////////
          NProgress.start();
          /////////////////////////////////////
          $.ajax({
          type : 'get',
          url  : '/findWork/'+classID,
          dataType: 'json',
          success:function(data){
            for(a=0;a<data.length;a++)
            {
                document.getElementById("special").innerHTML += '<li>'+ data[a].strEmpFirstName +' '+data[a].strEmpMiddleName+' '+data[a].strEmpLastName+'</li><br>';

            }
          }
          });
           $.get('/findMat/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("special1").innerHTML += '<li>'+ data[a].intMUQty+' '+data[a].strMaterialName +'</li><br>';

            }
          });
            $.get('/findEqui/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("special2").innerHTML += '<li>'+ data[a].strEquipName+'</li><br>';

            }
          });
        $.get('/findHistory/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("his").innerHTML += '<li>'+ data[a].dblProgActualPercent+'% on '+data[a].datProgDActualDate +'</li><br>';

            }
              $('#view_modal').modal('show');
            /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
          });
          $('#special').empty();
          $('#special1').empty();
          $('#special2').empty();
          $('#his').empty();


      });
             $(this).on('click','#viewdel', function(){
          var classID = $(this).val();
          var DelID = '';
          var a,b=0;

         /////////////////top loading//////////
          NProgress.start();
          /////////////////////////////////////
          $.ajax({
          type : 'get',
          url  : '/findTruck/'+classID,
          dataType: 'json',
          success:function(data){
            for(a=0;a<data.length;a++)
            {
                document.getElementById("special1m").innerHTML += '<li>'+ data[a].strDeliTruckPlateNo +'</li><br>';



            }
          }
          });
        $.get('/findMatD/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("specialm").innerHTML += '<li>'+ data[a].intDeliDQty+' '+data[a].strMaterialName +'</li><br>';

            }
              $('#viewdel_modal').modal('show');
            /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
          });
         $('#special').empty();
          $('#special1').empty();
          $('#special2').empty();                  
      });







     

    });
  </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.transact.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>