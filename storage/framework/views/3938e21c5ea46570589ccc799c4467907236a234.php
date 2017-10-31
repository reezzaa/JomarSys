<?php echo Form::open(['url'=>'contractadd', 'id'=>'form-contract', 'class'=>'form-bordered']); ?>

          <br>
            <fieldset class="col-sm-12 ">
            <div class="col-sm-4">
                  <label for="quotation"><em>Filter by: </em> <strong>Client</strong></label>
                  <select id="client" name="client" class="select-chosen" onchange="findByClient(this.value)" data-placeholder="">
                  <option value=""></option>
                    <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($service->strCompClientID); ?>"><?php echo e($service->strCompClientName); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-sm-8">
                  <div>
                        <label for="quotation">Select Quotation <span class="text-danger">*</span></label> 
                        <div >
                        <select name="quotation" id="quotation" class='form-control' data-placeholder='Choose'>
                      <option value=""></option>
                      <?php $__currentLoopData = $qoute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qqoute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($qqoute->strQuoteID); ?>"><?php echo e($qqoute->strQuoteName); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select> 
                     </div>
                  </div><br> 
                </div>
            </fieldset>
            <br><hr>
            <fieldset class="form-group "> 
                   <div class="col-sm-12 ">
                   <?php $__currentLoopData = $downpayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="down" value="<?php echo e($d->intDownID); ?>" >
                    <input type="hidden" name="downvalue" value="<?php echo e($d->intDownValue); ?>" >

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="tax" value="<?php echo e($t->intTaxID); ?>" >
                    <input type="hidden" name="taxvalue" value="<?php echo e($t->intTaxValue); ?>" >

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   <?php $__currentLoopData = $retention; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ret): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <input type="hidden" name="ret" value="<?php echo e($ret->intRetID); ?>" >
                     <input type="hidden" name="retvalue" value="<?php echo e($ret->intRetValue); ?>" >

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                   <?php $__currentLoopData = $recoupment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <input type="hidden" name="rec" value="<?php echo e($rec->intRecID); ?>" >
                     <input type="hidden" name="recvalue" value="<?php echo e($rec->intRecValue); ?>" >

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <label for="strFormPayment" class="col-sm-4 text-center">Progress Billing Mode</label>            
                      <div class="col-sm-6 form-inline">
                       <select id="progress" name="progress[]" class="select-chosen" data-placeholder="Choose.." style="width: 250px;" multiple>
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="30">30%</option>
                        <option value="40">40%</option>
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                        <option value="70">70%</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>       
                        </select>
                      </div>
                      </div>
                   
            </fieldset>

            <fieldset class="form-group">
              <div class="col-md-offset-9">
                 <?php echo Form::submit('Save Contract',['id'=>'submit','class'=>'btn btn-alt btn-success']); ?>

                 <!-- <?php echo Form::button('Reset',['type'=>'reset','class'=>'btn btn-alt btn-warning']); ?> -->
              </div>
            </fieldset>
          <?php echo Form::close(); ?>