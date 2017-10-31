<div class="row">
  <div class="col-md-2">
    <div class="center">
      <img id="img-upload" style="width:100px;display:block;margin:auto;" />
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientImage','Client Logo'); ?>

        <?php echo Form::file('strCompClientImage', array('class'=>'form-control')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientName','Client Company Name'); ?>

        <?php echo Form::text('strCompClientName',null, array('class'=>'form-control','placeholder'=>'Company Name')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientTIN','Client TIN'); ?>

        <?php echo Form::text('strCompClientTIN',null, array('class'=>'form-control','placeholder'=>'Client TIN')); ?>

      </div>
      <script>
        $('#strCompClientTIN').mask('999-999-999-999');
      </script>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 col-md-offset-2">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientRepresentative','Representative Name'); ?>

        <?php echo Form::text('strCompClientRepresentative',null, array('class'=>'form-control','placeholder'=>'Representative Name')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientPosition','Representative Position'); ?>

        <?php echo Form::text('strCompClientPosition',null, array('class'=>'form-control','placeholder'=>'Representative Position')); ?>

      </div>
    </div>
  </div>
  
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-2">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientContactNo','Contact No'); ?>

        <?php echo Form::text('strCompClientContactNo',null, array('class'=>'form-control','placeholder'=>'Contact No')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientEmail','Email'); ?>

        <?php echo Form::email('strCompClientEmail',null, array('class'=>'form-control','placeholder'=>'Email')); ?>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-1">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientAddress','Address'); ?>

        <?php echo Form::text('strCompClientAddress',null, array('class'=>'form-control','placeholder'=>'Address')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientCity','City'); ?>

        <?php echo Form::text('strCompClientCity',null, array('class'=>'form-control','placeholder'=>'City')); ?>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        <?php echo Form::label('strCompClientProv','Province'); ?>

        <?php echo Form::text('strCompClientProv',null, array('class'=>'form-control','placeholder'=>'Province')); ?>

      </div>
    </div>
  </div>
</div>