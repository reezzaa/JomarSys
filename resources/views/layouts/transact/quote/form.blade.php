<div class="form-group">
	<div>
	    <div class="col-md-3 col-md-offset-2">
	      <div class="form-group">
			  {!! Form::label('intClientID','Client ID') !!}
			  {!! Form::text('intClientID',$client->intClientID, array('class'=>'form-control', 'readonly')) !!}
		  </div>
		</div>
		<div class="col-md-5">
	      <div class="form-group">
		  	  {!! Form::label('','Client Name') !!}
			  {!! Form::text('',$client->strClientName, array('class'=>'form-control', 'readonly')) !!}
	      </div>
	    </div>
	</div>
	<div>
		<div class="col-md-9 col-md-offset-2">
	      <div class="form-group">
		 	{!! Form::label('strQuoteName','Quote Description') !!}
  			{!! Form::textarea('strQuoteName',null, ['class'=>'form-control','size' => '30x5','placeholder'=>'Quote Description']) !!}
		  </div>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="col-md-offset-9">
	   {!! Form::submit('Save',['id'=>'submithead','class'=>'btn btn-alt btn-success']) !!}
	</div>
</div>