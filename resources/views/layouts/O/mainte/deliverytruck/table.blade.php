<table id="deliTruck-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Plate Number</th>
      <th class="text-center">VIN</th>
      <th class="text-center">Net Capacity </th>
      <th class="text-center">Gross Weight</th>
      <th style="width: 60px;" class="text-center"></th>
      <th style="width: 125px;" class="text-center">Controls</th>
    </tr>
  </thead>
   <tbody id="delt-list">
    @foreach($delt as $key => $u)
    <tr>
        <td class="text-center">
            {{ $u->DeliTruckPlateNo }}
        </td>
        <td class="text-center">
            {{ $u->DeliTruckVINNo }}
        </td>
        <td class="text-center">
            {{ $u->DeliTruckCapacity }}
        </td>
        <td class="text-center">
            {{ $u->DeliTruckGrossWeight }}
        </td>
        <td class="text-center">
          <label class="switch switch-primary">
            @if(($u->status)==1)
                  <p hidden>1</p>
              @else
                  <p hidden>0</p> 
              @endif
            <input name="status" id="status" type="checkbox" value="{{ $u->id }}" 
              @if(($u->status)==1)
                  {{"checked"}}
              @else
                  {{""}} 
              @endif
              >
              <span></span></label>
        </td>
        <td>
          <div class="text-center">
            <button id="edit_supp" class="btn btn-alt btn-warning edit_supp" value = "{{$u->id}}" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><span class="gi gi-pencil"></span>
            </button>
            <button id="del_supp" class="btn btn-alt btn-danger del_supp" value="{{$u->id}}" data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <span class="gi gi-bin"></span>
            </button>
          </div>

      </td>
  </tr>
    @endforeach
  </tbody>
</table>
<div>
  <div id="editTruck_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditMatModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong>Edit Delivery Truck</strong></h3>
          </div>
          
           {!! Form::open(['url'=>'deliverytruck', 'method'=>'PUT', 'id'=>'frm-upd']) !!}
             <div class="form-group">
                <label for="platenos">Plate Number</label>
                {!! Form::text('platenos',null ,['id'=>'platenos','placeholder'=>'eg. ABC 1234', 'class' => 'form-control', 'maxlength'=>'8']) !!}
                 <span id="duplicates" class="help-block animation-slideDown">
                  Duplicate Material Name
                  </span>
                  <script>
                     $('#platenos').mask('SSS 0000', {
                            'translation': {
                                S: {pattern: /[A-Za-z]/},
                                0: {pattern: /[0-9]/}
                            }, 
                            onKeyPress: function (value, event) {
                                  event.currentTarget.value = value.toUpperCase();
                              }
                          });
                  </script>
              </div>
              <div class="form-group">
                <label for="vins">Vehicle Identification Number (VIN)</label>
                {!! Form::text('vins',null ,['id'=>'vins','placeholder'=>'17 character VIN', 'class' => 'form-control', 'maxlength'=>'17']) !!}
                 <span id="duplicates2" class="help-block animation-slideDown">
                Duplicate Material Name
                </span>
                <script>
                  $("#vins").bind('keyup', function (e) {
                      if (e.which >= 97 && e.which <= 122) {
                          var newKey = e.which - 32;
                          // I have tried setting those
                          e.keyCode = newKey;
                          e.charCode = newKey;
                      }
                      $("#vins").val(($("#vins").val()).toUpperCase());
                  });
                 </script>
              </div>
              <div class="form-group">
                <label for="netcaps">Net Capacity (in Kg)</label>
                 {!! Form::text('netcaps',null ,['id'=>'netcaps','placeholder'=>'Net Capacity', 'class' => 'form-control', 'maxlength'=>'10']) !!}
                <span id="duplicates3" class="help-block animation-slideDown">
                Duplicate Material Name
                </span>
                <script>
                  $('#netcaps').numeric({
                      decimalSeparator: ".",
                      maxDecimalPlaces : 2,
                      allowMinus:   false
                  });
                </script>
              </div>
              <div class="form-group">
                <label for="weights">Gross Weight</label>
                {!! Form::text('weights',null ,['id'=>'weights','placeholder'=>'Gross Weight', 'class' => 'form-control', 'maxlength'=>'10']) !!}
                <span id="duplicates4" class="help-block animation-slideDown">
                Duplicate Material Name
                </span>
                <script>
                  $('#weights').numeric({
                      decimalSeparator: ".",
                      maxDecimalPlaces : 2,
                      allowMinus:   false
                  });
                </script>
              </div>
              <div class="pull-right">
                <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel
                </button>
                <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Save Changes
                </button>
              </div>
              <div class="clearfix"></div>
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>

 
<div class="text-center">
<div id="del_modal" class="modal fade del-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
<div class="modal-dialog modal-md">
  <div class="modal-content">
    <div class="block">
      <div class="block-title themed-background">
          <div class="block-options pull-right">
              <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="themed-background" style="color:white;"><strong>Delete Delivery Truck</strong></h3>
        </div>

            {!!Form::open(['url'=>'deliverytruck','method'=>'PUT','id'=>'frm-del'])!!}
              <p><h4>Are you sure you want to delete</h4>
              </p>
              <p hidden><b id="deleteID"></b></p>
              <p>
                <h3><b id="del_classname" ></b>??</h3>
              </p>
              <div class="pull-right">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span>Delete</button>
            </div>
            <div class="clearfix"></div>
        {!!Form::close()!!}
    </div>
  </div>
</div>
</div> 
</div> 
<script>$(function(){ TablesDatatables.init(); });</script>