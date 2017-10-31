<div class="row">
  <div class="col-md-2">
    <div class="center">
      <img id="img-upload" style="width:100px;display:block;margin:auto;" />
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        {!! Form::label('strClientImage','Client Logo') !!}
        {!! Form::file('strClientImage', array('class'=>'form-control')) !!}
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <div>
        {!! Form::label('strClientTIN','Client TIN') !!}
        {!! Form::text('strClientTIN',null, array('class'=>'form-control','placeholder'=>'Client TIN')) !!}
      </div>
      <script>
        $('#strClientTIN').mask('999-999-999-999');
      </script>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        {!! Form::label('strClientName','Client Company Name') !!}
        {!! Form::text('strClientName',null, array('class'=>'form-control','placeholder'=>'Company Name')) !!}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 col-md-offset-2">
    <div class="form-group">
      <div>
        {!! Form::label('strClientContactPerson','Representative Name') !!}
        {!! Form::text('strClientContactPerson',null, array('class'=>'form-control','placeholder'=>'Representative Name')) !!}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        {!! Form::label('strClientPosition','Representative Position') !!}
        {!! Form::text('strClientPosition',null, array('class'=>'form-control','placeholder'=>'Representative Position')) !!}
      </div>
    </div>
  </div>
  
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-2">
    <div class="form-group">
      <div>
        {!! Form::label('strClientContactNo','Contact No') !!}
        {!! Form::text('strClientContactNo',null, array('class'=>'form-control','placeholder'=>'Contact No')) !!}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        {!! Form::label('strClientEmail','Email') !!}
        {!! Form::email('strClientEmail',null, array('class'=>'form-control','placeholder'=>'Email')) !!}
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-1">
    <div class="form-group">
      <div>
        {!! Form::label('strClientAddress','Address') !!}
        {!! Form::text('strClientAddress',null, array('class'=>'form-control','placeholder'=>'Address')) !!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        {!! Form::label('strClientCity','City') !!}
        {!! Form::text('strClientCity',null, array('class'=>'form-control','placeholder'=>'City')) !!}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        {!! Form::label('strClientProv','Province') !!}
        {!! Form::text('strClientProv',null, array('class'=>'form-control','placeholder'=>'Province')) !!}
      </div>
    </div>
  </div>
</div>