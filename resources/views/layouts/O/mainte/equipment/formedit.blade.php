<div class="row">
  <div class="col-md-6">
     <div class="form-group">
      <label for="equiptypes">Equipment Type</label>
      {!! Form::select('equiptypes', $equiptype, null,  ['id'=>'equiptypes','class'=>'form-control', 'placeholder'=>'']) !!}
      <span id="duplicates" class="help-block animation-slideDown">
        Duplicate Material Classification
     </span>
    </div>
  </div>
  <div class="col-md-6">
     <div class="form-group">
      <label for="equipnames">Equipment Name</label>
        {!!Form::text('equipnames',null,['id'=>'equipnames', 'class'=>'form-control', 'maxLength'=>'30'])!!}
          <span id="duplicates2" class="help-block animation-slideDown">
          Duplicate Material Name
         </span>
         <script>
         $('#equipnames').alphanum({
          allow :    '-,.()/', // Specify characters to allow
          });
        </script>
     </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label for="equipkeys">Equipment key (<em>identifier</em>)</label> <span class="text-danger">*</span> 
      {!! Form::text('equipkeys',null ,['id'=>'equipkeys','placeholder'=>'e.g. Serial key', 'class' => 'form-control', 'maxlength'=>'45']) !!}
      <span id="duplicatez3" class="help-block animation-slideDown">
        Duplicate Material Name
      </span>
      <script>
        $('#equipkeys').alphanum({
              allow :    '-./', // Specify characters to allow
            });
      </script>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="equipleasers">Equipment Leaser </label> <span class="text-danger">*</span> 
      {!! Form::text('equipleasers',null ,['id'=>'equipleasers','placeholder'=>'Leaser', 'class' => 'form-control', 'maxlength'=>'50']) !!}
      <span id="duplicate3" class="help-block animation-slideDown">
        Duplicate Material Name
      </span>
      <script>
        $('#equipleasers').alphanum({
            allow :    '-./', // Specify characters to allow
          });
      </script>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="equipprices">Rental Price per Day</label> <span class="text-danger">*</span> 
      {!! Form::text('equipprices',null ,['id'=>'equipprices','placeholder'=>'e.g 999999', 'class' => 'form-control', 'maxlength'=>'30']) !!}
      <span id="duplicate3" class="help-block animation-slideDown">
        Duplicate Material Name
      </span>
      <script>
        $('#equipprices').numeric({
          decimalSeparator: ".",
          maxDecimalPlaces : 2,
          allowMinus:   false
      });
      </script>
    </div>
  </div>
</div>
<div class="pull-right">
  <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
  <button type="submit" class="btn btn-primary"><span class="gi gi-pen"></span> Save Changes</button>
</div>