
<div class="row">
	<div class="form-group">
      <div class="col-md-11">
      <label class="control-label text-center">Project Period <span class="text-danger">*</span></label> 
        <div >
           <div class="input-group input-daterange" data-date-format="yyyy-mm-dd">
              <input type="text" id="datQStart" name="datQStart" class="form-control text-center input-datepicker-close" placeholder="From">
              <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
              <input type="text" id="datQEnd" name="datQEnd" class="form-control text-center input-datepicker-close" placeholder="Through">
          </div>
       </div>
      </div>
    </div>
  </div>
  <br><hr>
<div class="row">
	<div class="form-group col-md-6">
      <div>
      <label for="strFormPayment">Form of Payment <span class="text-danger">*</span></label>
        <select name="strFormPayment" id="strFormPayment" class='form-control' data-placeholder='Choose'>
          <option value=""> </option>
            <?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($f->intFormID); ?>"><?php echo e($f->strFormName); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
      </div>
    </div>
    <div class="form-group col-md-6">
      <div>
       <div class="col-sm-12 form-inline form-group">
        <label for="strTermPayment">Terms of Payment <span class="text-danger">*</span></label><br> 
         <input type="text"  name="strTermPayment" class="form-control " id="strTermPayment" maxlength="10" placeholder="0" style="text-align:right;" >
          <select name="termdate" id="termdate" class='form-control'>
           <option value="days">days</option>
           <option value="month">month</option>
           <option value="year">year</option>
         </select>
        <script>
          $('#strTermPayment').numeric(
            {
             allowMinus:   false,
             allowThouSep: false,
             allowDecSep: false
            });
        </script>
        <br></div>
      </div>
    </div>
  </div>

