<table id="indbill-datatable" class="table table-vcenter table-striped table-bordered table-hover">
				  <thead>
				      <tr>
				      	  <th></th>
				      	  <th class="text-center">Quote No.</th>
				      	  <th class="text-center">Invoice No.</th>
					      <th class="text-center">Client Name</th>
					      <th class="text-center">Quote Name</th>
					      <th class="text-center">Status</th>
				    </tr>
				  </thead>
				  <tbody id="client-list">
				   <!--  -->
				   <?php $__currentLoopData = $getcollect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getcollect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				   <tr>
				   		<td class="text-center">
				           <a href="javascript:void(0)"><button class="btn btn-alt btn-md btn-primary" id="showcollect" value="<?php echo e($getcollect->strQuoteID); ?>"><span  class="fa fa-circle-o"> </span> Open </button></a>
				        </td>
				        <td class="text-center">
				            <?php echo e($getcollect->strQuoteID); ?>

				        </td>
				        <td class="text-center">
				            <?php echo e($getcollect->strServInvHID); ?>

				        </td>
				        <td class="text-center">
				            <?php echo e($getcollect->strIndClientFName); ?> <?php echo e($getcollect->strIndClientMName); ?> <?php echo e($getcollect->strIndClientLName); ?>

				        </td>
				        <td class="text-center">
				            <?php echo e($getcollect->strQuoteName); ?>

				        </td>
				         <td class="text-center">
				        <?php if(($getcollect->serstatus)==0): ?>
				        	<label class="label label-warning"> for billing</label>
				        <?php elseif(($getcollect->serstatus)==1): ?>
				        	<label class="label label-primary"> Paid</label>
				        <?php endif; ?>
				        </td>
				      </tr>
				   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  </tbody>
				</table>
<script>$(function(){ TablesDatatables.init(); });</script>

  <div id="indcollect_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditMatModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong><p id="quote"></p></strong></h3>
          </div>
          <div>
           <?php echo Form::open(['url'=>'individualbilling/classID/storeThis', 'method'=>'POST', 'id'=>'frm-insert']); ?>

           <div id="here">
           	<input type="hidden" id="quoteidd" name="quoteidd">

            <div class="row">
                <label for="" class="text-center col-md-4"><h5><strong>Invoice No: </h5></strong></label> 
             	<label for="" id="invq"></label>
            </div>
            <div class="row">
                <label for="" class="text-center col-md-4"><h5><strong>Official Receipt No: </h5></strong></label> 
             	<label for="" id="or"></label>
            </div> 
            <div class="row">
                <label for="" class="text-center col-md-4"><h5><strong>Purchase Order: </h5></strong></label> 
             	<label for="" id="po"></label>
            </div>  
            <div class="row">
                <label for="" class="text-center col-md-4"><h5><strong>Amount: </h5></strong></label> 
             	<label for="" id="amt"></label>
            </div> 
            <hr>
            <div class="row">
                <label for="" class="text-center col-md-4"><h5><strong>Amount Tendered: </h5></strong></label> 
             	<label for="" id="ten"></label>
            </div>
            <div class="row">
                <label for="" class="text-center col-md-4"><h5><strong>Change: </h5></strong></label> 
             	<label for="" id="ch"></label>
            </div>              
           </div>
            <fieldset id="this">
            <div class="row">
                    <label for="" class="text-center col-md-4"><h5><strong>Invoice No: </h5></strong></label> 
                    <label for="" id="inv"></label>
                    <input type="hidden" id="invno" name="invno">
           			<input type="hidden" id="quoteid" name="quoteid">

                  <div class="row col-md-12" id="order">
                    <label for="" class="col-md-4 text-center"><h5><strong>Purchase Ordern: </strong></h5></label>
                   <div class="input-group col-md-8">  
                              <span class="input-group-addon"><strong>PO#</strong></span>
                              <input type="text" id="ponumber" name="ponumber" class="form-control" placeholder="e.g. 90900" required maxlength="45">
                              <script>
                                $('#ponumber').numeric({
                                allowMinus:   false
                            });
                              </script>
                    </div>
                  </div>

                  <div>
                    <br><br><br><br>
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
                          <input type="text" id="paymentcost" name="paymentcost" class="form-control" onkeyup ="compute()" placeholder="e.g. 0000.00" required maxlength="16">
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

          </div>
        </div>
      </div>
    </div>
  </div>
				