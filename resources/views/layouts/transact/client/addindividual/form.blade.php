<div class="row">
  <div class="col-md-3 col-md-offset-1">
    <div class="form-group">
      <div>
        {!! Form::label('strIndClientFName','First Name ') !!}  <span class="text-danger">*</span>
        {!! Form::text('strIndClientFName',null, array('class'=>'form-control','placeholder'=>'First Name')) !!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        {!! Form::label('strIndClientMName','Middle Name') !!}
        {!! Form::text('strIndClientMName',null, array('class'=>'form-control','placeholder'=>'Middle Name')) !!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        {!! Form::label('strIndClientLName','Last Name ') !!} <span class="text-danger">*</span>
        {!! Form::text('strIndClientLName',null, array('class'=>'form-control','placeholder'=>'Last Name')) !!}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 col-md-offset-1">
    <div class="form-group">
      <div>
        {!! Form::label('strIndClientContactNo','Contact No. ') !!} <span class="text-danger">*</span>
        {!! Form::text('strIndClientContactNo',null, array('class'=>'form-control','placeholder'=>'Contact #')) !!}
      </div>
    </div>
  </div>
    <div class="col-md-3">
    <div class="form-group">
      <div>
        {!! Form::label('strIndClientTIN','Client TIN') !!}
        {!! Form::text('strIndClientTIN',null, array('class'=>'form-control','placeholder'=>'Client TIN')) !!}
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
        {!! Form::label('strIndClientAddress','Address') !!}
        {!! Form::text('strIndClientAddress',null, array('class'=>'form-control','placeholder'=>'Address')) !!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        {!! Form::label('strIndClientCity','City') !!}
        {!! Form::text('strIndClientCity',null, array('class'=>'form-control','placeholder'=>'City')) !!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        {!! Form::label('strIndClientProv','Province') !!}
        {!! Form::text('strIndClientProv',null, array('class'=>'form-control','placeholder'=>'Province')) !!}
      </div>
    </div>
  </div>
</div>