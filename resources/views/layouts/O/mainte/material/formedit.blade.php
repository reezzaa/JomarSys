<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="mattype">Type</label> <span class="text-danger">*</span>
        <select id="mattype" onchange="changeType(this.value)" name="mattype" style="width: 250px;" class="select-chosen form-control" data-placeholder="Select Type">
          <option></option>
          @foreach($type as $mattype)
          <option value="{{ $mattype->id }}">{{ $mattype->MatTypeName }}
          </option>
          @endforeach
        </select>
      </div>
       <span id="duplicates" class="help-block animation-slideDown">
          Duplicate Material Classification
        </span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matclass">Classification</label> <span class="text-danger">*</span>
        <select id="matclass" name="matclass" class="form-control" placeholder=" ">
          <option></option>
          @foreach($class as $matclass)
          <option value="{{ $matclass->MatClassID }}">{{ $matclass->MatClassName }}
          </option>
          @endforeach 
        </select>  
      </div>
       <span id="duplicates2" class="help-block animation-slideDown">
          Duplicate Material Category Name
      </span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matname" >Material Name</label> <span class="text-danger">*</span>
        {!! Form::text('matname',null ,['id'=>'matname','placeholder'=>'Material Name', 'class' => 'form-control', 'maxlength'=>'30']) !!}
      </div>
      <span id="duplicates3" class="help-block animation-slideDown">
          Duplicate Material Category Name
      </span>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matbrands" >Brand</label>
        {!! Form::text('matbrands',null ,['id'=>'matbrands','placeholder'=>'Brand', 'class' => 'form-control', 'maxlength'=>'30']) !!}
      </div>
      <script>
        $('#matbrands').alphanum({
          allow :    '-,.()/"', // Specify characters to allow
        });
      </script>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matsizes" >Size</label>
        {!! Form::text('matsizes',null ,['id'=>'matsizes','placeholder'=>'Size', 'class' => 'form-control', 'maxlength'=>'15']) !!}
      </div>
      <script>
        $('#matsizes').alphanum({
          allow :    '-,.()/"', // Specify characters to allow
        });
      </script>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
       <label for="matcolors">Color</label>
      {!! Form::text('matcolors',null ,['id'=>'matcolors','placeholder'=>'Color', 'class' => 'form-control', 'maxlength'=>'30']) !!}
      </div>
      <script>
      $('#matcolors').alphanum({
          allow :    '-,.()/"', // Specify characters to allow
        });
     </script>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-2">
    <div class="form-group">
      <div>
        <label for="matdimens" >Dimension</label>
        {!! Form::text('matdimens',null ,['id'=>'matdimens','placeholder'=>'Dimension', 'class' => 'form-control', 'maxlength'=>'40']) !!}
      </div>
      <script>
        $('#matdimens').alphanum({
          allow :    '-./"', // Specify characters to allow
        });
      </script>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="matprices" >Unit Price</label> <span class="text-danger">*</span>
        {!! Form::text('matprices',null ,['id'=>'matprices','placeholder'=>'Unit Price', 'class' => 'form-control', 'maxlength'=>'15']) !!}
      </div>
      <span id="duplicates4" class="help-block animation-slideDown">
      Duplicate Material Classification
      </span>
      <script>
        $('#matprices').numeric({
            decimalSeparator: ".",
            maxDecimalPlaces : 2,
            allowMinus:   false
        });
      </script>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4 col-md-offset-1">
    <div class="form-group">
      <div>
        <label for="groupuoms">Group UOM</label> <span class="text-danger">*</span>
        <select id="groupuoms" onchange="changeUOM(this.value)" name="groupuoms" style="width: 250px;" class="select-chosen form-control" data-placeholder="Select Group UOM">
          <option></option>
          @foreach($guom as $groupuoms)
          <option value="{{ $groupuoms->id }}">{{ $groupuoms->GroupUOMText }}
          </option>
          @endforeach  
        </select>
      </div>
       <span id="duplicates5" class="help-block animation-slideDown">
      Duplicate Material Classification
      </span>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <div>
        <label for="detailuoms" >Detail UOM</label> <span class="text-danger">*</span>
        <select id="detailuoms" onchange="changeSymbols(this.value)" name="detailuoms" class="form-control" placeholder=" ">
          <option></option>
          @foreach($duom as $detailuoms)
          <option value="{{ $detailuoms->id }}">{{ $detailuoms->DetailUOMText }}
          </option>
          @endforeach  
        </select>  
          <span id="duplicates6" class="help-block animation-slideDown">
          Duplicate Material Classification
          </span> 
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <div>
        <label for="symbols" >UOM Symbol</label>
        {!! Form::text('symbols',null ,['id'=>'symbols', 'class' => 'form-control','readonly'=>'readonly']) !!}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-3 col-md-offset-9">
    <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
    <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add </button>
  </div>
</div>