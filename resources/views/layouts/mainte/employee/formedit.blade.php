<div class="row">
  <div class="col-md-3 col-md-offset-1">
    <div class="form-group">
      <div>
        <label for="strEmpFirstName">First Name</label> <span class="text-danger">*</span> 
        <input type="text" id="strEmpFirstName" name="strEmpFirstName" class="form-control" placeholder="First Name" required maxlength="50">
      </div>
      <script>
        $('#strEmpFirstName').alpha({
            allow : '-' });
      </script>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        <label for="strEmpMiddleName">Middle Name </label>
        <input type="text" id="strEmpMiddleName" name="strEmpMiddleName" class="form-control" placeholder="Middle Name" maxlength="50">
      </div>
      <script>
          $('#strEmpMiddleName').alpha({
              allow :    '-' });
      </script>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <div>
        <label for="strEmpLastName">Last Name </label> <span class="text-danger">*</span> 
        <input type="text" id="strEmpLastName" name="strEmpLastName" class="form-control" placeholder="Last Name" required maxlength="50">
      </div>
      <script>
          $('#strEmpLastName').alpha({
              allow :    '-.'});
      </script>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-5">
    <div class="form-group">
      <div>
        <label for="strEmpContactNo">Contact Number</label> <span class="text-danger">*</span> 
        <div>
          <div class="col-md-5">
            <select id="contacttype" class="form-control" onchange="changeContType(this.value)">
              <option value="" disabled selected hidden>-------</option>
              <option value="Landline">Landline</option>
              <option value="Phone">Phone</option>
            </select>
          </div>
          <div class="input-group">      
            <input type="text" id="strEmpContactNo" name="strEmpContactNo" class="form-control" placeholder="Contact No." required maxlength="16">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
          </div>
        </div>
      </div>
      <script>
        function changeContType(val)
        {
          if(val == 'Phone')
          {
            $('#strEmpContactNo').val('');
            $('#strEmpContactNo').mask('+63-999-999-9999');
          }
          else if(val == 'Landline')
          {
            $('#strEmpContactNo').val('');
            $('#strEmpContactNo').mask('999-9999');
          }
        }
      </script>
    </div>
  </div>
  <div class="col-md-5">
    <div class="form-group">
      <div>
        <label for="strEmpEmail">Email</label>
        <div class="input-group">
          <input type="email" id="strEmpEmail" name="strEmpEmail" class="form-control" placeholder="Email" maxlength="50">
          <span class="input-group-addon"><i class="hi hi-envelope"></i></span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-5">
    <div class="form-group">
      <div>
        <label for="strEmpCity">City</label> <span class="text-danger">*</span> 
        <div class="input-group">
            <input type="text" id="strEmpCity" name="strEmpCity" class="form-control" placeholder="City" required maxlength="50">
            <span class="input-group-addon"><i class="gi gi-road"></i></span>
        </div>
        <script>
          $('#strEmpCity').alpha();
        </script>
      </div>
    </div>
  </div>
  <div class="col-md-5">
    <div class="form-group">
      <div>
        <label for="strEmpProvince">Province</label> <span class="text-danger">*</span> 
        <div class="input-group">
            <input type="text" id="strEmpProvince" name="strEmpProvince" class="form-control" placeholder="Province" required maxlength="50">
            <span class="input-group-addon"><i class="gi gi-road"></i></span>
        </div>
        <script>
          $('#strEmpProvince').alpha();
        </script>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-10">
      <div class="form-group">
        <div>
          <label class="col-md-4 control-label" for="example-chosen-multiple">Specialization <span class="text-danger">*</span> </label>
          <div class="col-md-6">
              <select id="example-chosen-multiple" name="specs[]" class="select-chosen" data-placeholder="Specialization.." style="width: 250px;" multiple>
              @foreach($special as $key)
                  <option value="{{ $key->intSpecID }}"> {{ $key->strSpecDesc }}
                  </option>
              @endforeach
              </select>
              <span id="duplicate" class="help-block animation-slideDown">
                Select specialization for this employee.
              </span>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-md-offset-9">
      <button type="button" id="resets" class="btn btn-warning"><span class="gi gi-remove_2"></span> Reset</button>
      <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add</button>
  </div>
</div>