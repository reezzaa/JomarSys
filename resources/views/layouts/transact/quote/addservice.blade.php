<div class="form-group">
	<div>
		<div class="col-md-8 col-md-offset-2">
	      <div class="form-group">
           	{!! Form::label('service','Service Name',array('class'=>'label_ttl')) !!}
			  <select id="service"  name="service" style="width: 250px;" class="select-chosen" data-placeholder="Select Service">
			  	<option></option>
			  	@foreach($serveOff as $service)
			  	<option value="{{ $service->intServiceOffID }}">{{ $service->strServiceOffName }}
			  	</option>
			  	@endforeach
			  </select>
		  </div>
		</div>
	</div>
</div>
<div class="form-group">
	 <div class="col-md-offset-10">
	     {!! Form::submit('Add',['id'=>'addservice','class'=>'btn btn-alt btn-success']) !!}
	  </div>
</div>


