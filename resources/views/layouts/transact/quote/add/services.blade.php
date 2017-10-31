<div class="block">
  <div class="block-title">
    <h3><strong>Quote Detailed Services</strong></h3>
  </div>
  {!! Form::open(['url'=>'service', 'id'=>'save-service','class'=>'form-horizontal']) !!}
    <div class="form-group">
      <div>
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
              {!! Form::label('service','Service Name') !!} <span class="text-danger">*</span>
              <select id="service" name="service" class="select-chosen" data-placeholder="Select Service">
                <option></option>
                @foreach($serveOff as $service)
                <option value="{{ $service->intServiceOffID }}">{{ $service->strServiceOffName }}
                </option>
                @endforeach
              </select>
          </div>
        </div>
      </div>
      <div>
        <div class="col-md-6 col-md-offset-3">
          <div class="form-group">
            {!! Form::label('strQuoteDesc','Service Description') !!}
            {!! Form::textarea('strQuoteDesc',null, ['class'=>'form-control','size' => '20x5','placeholder'=>'Service Description']) !!}
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-10">
        {!! Form::submit('Add Service',['id'=>'addservice','class'=>'btn btn-alt btn-success']) !!}
      </div>
    </div>
  {!! Form::close() !!}
</div>