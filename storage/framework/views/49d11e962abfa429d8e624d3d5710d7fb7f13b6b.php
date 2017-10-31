<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="mattype">Type</label> <span class="text-danger">*</span>
        <select id="mattype" onchange="changeTypes(this.value)" name="mattype" style="width: 250px;" class="select-chosen" data-placeholder="Select Type">
          <option></option>
          <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mattype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($mattype->intMatTypeID); ?>"><?php echo e($mattype->strMatTypeName); ?>

          </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
       <span id="duplicates" class="help-block animation-slideDown">
          Duplicate Material Classification
        </span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matclass">Classification</label> <span class="text-danger">*</span>
        <select id="matclass" name="matclass" class="form-control" placeholder=" ">
          <option></option>
          <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $matclass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($matclass->intMatClassID); ?>"><?php echo e($matclass->strMatClassName); ?>

          </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </select>  
      </div>
       <span id="duplicates2" class="help-block animation-slideDown">
          Duplicate Material Category Name
      </span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matname" >Material Name</label> <span class="text-danger">*</span>
        <?php echo Form::text('matname',null ,['id'=>'matname','placeholder'=>'Material Name', 'class' => 'form-control', 'maxlength'=>'30']); ?>

      </div>
      <span id="duplicates3" class="help-block animation-slideDown">
          Duplicate Material Category Name
      </span>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matbrand" >Brand</label>
        <?php echo Form::text('matbrand',null ,['id'=>'matbrand','placeholder'=>'Brand', 'class' => 'form-control', 'maxlength'=>'30']); ?>

      </div>
      <script>
        $('#matbrand').alphanum({
          allow :    '-,.()/"', // Specify characters to allow
        });
      </script>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matsize" >Size</label>
        <?php echo Form::text('matsize',null ,['id'=>'matsize','placeholder'=>'Size', 'class' => 'form-control', 'maxlength'=>'15']); ?>

      </div>
      <script>
        $('#matsize').alphanum({
          allow :    '-,.()/"', // Specify characters to allow
        });
      </script>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
       <label for="matcolor">Color</label>
      <?php echo Form::text('matcolor',null ,['id'=>'matcolor','placeholder'=>'Color', 'class' => 'form-control', 'maxlength'=>'30']); ?>

      </div>
      <script>
      $('#matcolor').alphanum({
          allow :    '-,.()/"', // Specify characters to allow
        });
     </script>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-2">
    <div class="form-group">
      <div>
        <label for="matdimen" >Dimension</label>
        <?php echo Form::text('matdimen',null ,['id'=>'matdimen','placeholder'=>'Dimension', 'class' => 'form-control', 'maxlength'=>'40']); ?>

      </div>
      <script>
        $('#matdimen').alphanum({
          allow :    '-./"', // Specify characters to allow
        });
      </script>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matprice" >Unit Price</label> <span class="text-danger">*</span>
        <?php echo Form::text('matprice',null ,['id'=>'matprice','placeholder'=>'Unit Price', 'class' => 'form-control', 'maxlength'=>'15']); ?>

      </div>
      <span id="duplicates4" class="help-block animation-slideDown">
      Duplicate Material Classification
      </span>
      <script>
        $('#matprice').numeric({
            decimalSeparator: ".",
            maxDecimalPlaces : 2,
            allowMinus:   false
        });
      </script>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-1">
    <div class="form-group">
      <div>
        <label for="groupuom">Group UOM</label> <span class="text-danger">*</span>
        <select id="groupuom" onchange="changeUOM(this.value)" name="groupuom" style="width: 250px;" class="select-chosen" data-placeholder="Select Group UOM">
          <option></option>
          <?php $__currentLoopData = $guom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupuom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($groupuom->intGroupUOMID); ?>"><?php echo e($groupuom->strGroupUOMText); ?>

          </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </select>
      </div>
       <span id="duplicates5" class="help-block animation-slideDown">
      Duplicate Material Classification
      </span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="detailuom" >Detail UOM</label> <span class="text-danger">*</span>
        <select id="detailuom" onchange="changeSymbols(this.value)" name="detailuom" class="form-control" placeholder=" ">
          <option></option>
          <?php $__currentLoopData = $duom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detailuom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($detailuom->intDetailUOMID); ?>"><?php echo e($detailuom->strDetailUOMText); ?>

          </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        </select>  
          <span id="duplicates6" class="help-block animation-slideDown">
          Duplicate Material Classification
          </span> 
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <div>
        <label for="symbol" >UOM Symbol</label>
        <?php echo Form::text('symbol',null ,['id'=>'symbol', 'class' => 'form-control','readonly'=>'readonly']); ?>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3 col-md-offset-9">
    <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
    <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add </button>
  </div>
</div>