<div class="row">
  <div class="col-md-3 col-md-offset-1">
    <div class="form-group">
      <div>
        <?php echo Form::label('strIndClientFName','First Name '); ?>  <span class="text-danger">*</span>
        <?php echo Form::text('strIndClientFName',null, array('class'=>'form-control','placeholder'=>'First Name')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        <?php echo Form::label('strIndClientMName','Middle Name'); ?>

        <?php echo Form::text('strIndClientMName',null, array('class'=>'form-control','placeholder'=>'Middle Name')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        <?php echo Form::label('strIndClientLName','Last Name '); ?> <span class="text-danger">*</span>
        <?php echo Form::text('strIndClientLName',null, array('class'=>'form-control','placeholder'=>'Last Name')); ?>

      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 col-md-offset-1">
    <div class="form-group">
      <div>
        <?php echo Form::label('strIndClientContactNo','Contact No. '); ?> <span class="text-danger">*</span>
        <?php echo Form::text('strIndClientContactNo',null, array('class'=>'form-control','placeholder'=>'Contact #')); ?>

      </div>
    </div>
  </div>
    <div class="col-md-3">
    <div class="form-group">
      <div>
        <?php echo Form::label('strIndClientTIN','Client TIN'); ?>

        <?php echo Form::text('strIndClientTIN',null, array('class'=>'form-control','placeholder'=>'Client TIN')); ?>

      </div>
      <script>
        $('#strIndClientTIN').mask('999-999-999-999');
      </script>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-1">
    <div class="form-group">
      <div>
        <?php echo Form::label('strIndClientAddress','Address'); ?>

        <?php echo Form::text('strIndClientAddress',null, array('class'=>'form-control','placeholder'=>'Address')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        <?php echo Form::label('strIndClientCity','City'); ?>

        <?php echo Form::text('strIndClientCity',null, array('class'=>'form-control','placeholder'=>'City')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        <?php echo Form::label('strIndClientProv','Province'); ?>

        <?php echo Form::text('strIndClientProv',null, array('class'=>'form-control','placeholder'=>'Province')); ?>

      </div>
    </div>
  </div>
</div>