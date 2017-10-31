<div class="form-group">
    <label for="equiptype">Equipment Type</label> <span class="text-danger">*</span> 
    {!! Form::select('equiptype', $equiptype, null,  ['id'=>'equiptype','class'=>'form-control', 'placeholder'=>' ']) !!}
		<span id="duplicate4" class="help-block animation-slideDown">
        Duplicate Material Name
    </span>
	</div>
<div class="form-group">
  <label for="equipname">Equipment Name</label> <span class="text-danger">*</span>
  {!! Form::text('equipname',null ,['id'=>'equipname','placeholder'=>'Equipment Name', 'class' => 'form-control', 'maxlength'=>'30']) !!}
  <span id="duplicate" class="help-block animation-slideDown">
    Duplicate Material Name
  </span>
  <script>
    $('#equipname').alphanum({
            allow :    '-,.()/', // Specify characters to allow
          });
  </script>
</div>
<div class="form-group">
  <label for="equipmodel">Model </label> <span class="text-danger">*</span> 
  {!! Form::text('equipmodel',null ,['id'=>'equipmodel','placeholder'=>'Model', 'class' => 'form-control', 'maxlength'=>'30']) !!}
  <span id="duplicate2" class="help-block animation-slideDown">
    Duplicate Material Name
  </span>
  <script>
    $('#equipmodel').alphanum({
        allow :    '-./', // Specify characters to allow
      });
  </script>
</div>
<div class="form-group">
  <label for="equipweight">Operating Weight (in tonage)</label> <span class="text-danger">*</span> 
  {!! Form::text('equipweight',null ,['id'=>'equipweight','placeholder'=>'Operating Weight', 'class' => 'form-control', 'maxlength'=>'30']) !!}
  <span id="duplicate3" class="help-block animation-slideDown">
    Duplicate Material Name
  </span>
  <script>
    $('#equipweight').numeric({
      decimalSeparator: ".",
      maxDecimalPlaces : 2,
      allowMinus:   false
  });
  </script>
</div>
<div class="pull-right">
  <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
  <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add</button>
</div>