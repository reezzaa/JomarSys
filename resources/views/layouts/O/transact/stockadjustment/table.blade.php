<table id="stock-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
     <tr>
      <th class="text-center">Material Name</th>
      <th class="text-center"> Stock</th>
      <th class="text-center">Date as of</th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody>
    @foreach($stock as $s)
    <tr >

      <td class="text-center">
        {{ $s->MaterialName }}
      </td>
      <td class="text-center">
       {{$s->stocks}}
      </td>
      <td class="text-center">
        {{\Carbon\Carbon::parse($s->date_s)->toDayDateTimeString()}}
      </td>
      <td class="text-center">
         <button id="view" class="btn btn-info btn-alt view" value="{{$s->id}}" data-toggle="tooltip" data-placement="top" data-original-title="Show Stock Card "> <span class="gi gi-eye_open"> </span> </button>
        <button id="add" class="btn btn-success btn-alt add" value="{{$s->id}}" data-toggle="tooltip" data-placement="top" data-original-title="In"> <span class="gi gi-inbox_in"></span> </button>
        <button id="subtract" class="btn btn-danger btn-alt subtract" value="{{$s->id}}" data-toggle="tooltip" data-placement="top" data-original-title="Out"> <span class="gi gi-inbox_out"></span> </button>

    </td>
    
  </tr>
  @endforeach
  </tbody>

</table>
 <div id="stock_modal" class="modal fade edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="block full container-fluid">
              <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Edit Specialization</strong></h3>

             
        </div>
      </div>
    </div> 
  </div>

      <div id="add_modal" class="modal fade edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block full container-fluid">
              <div class="block-title">
              <button class="close" data-dismiss="modal">&times;</button>
              <h3>Replenish Stocks</h3>
              </div>

               {!! Form::open(['url'=>route('stockadjustment.storeThis','classID'),'method'=>'POST','id'=>'frm-update']) !!}
               <input type="hidden" name="thisId" id="thisId" >
              <div class="form-group">
                  <label for="mats">Material Name</label>
                  {!! Form::text('matsname', null,  ['id'=>'matsname','class'=>'form-control', 'placeholder'=>'','readonly'=>'readonly']) !!}
              </div>
              <div class="form-group">
                  <label for="quantitys">Current Stocks </label>
                  {!!Form::text('quantitys',null,['id'=>'quantitys', 'class'=>'form-control','readonly'=>'readonly'])!!}
                </div>
              <div class="form-group">
                  <label for="qty">Quantity to be Added </label>
                  {!!Form::text('qty',null,['id'=>'qty', 'class'=>'form-control'])!!}
                  <script>
                      $('#qty').numeric({
                          decimalSeparator: ".",
                          maxDecimalPlaces : 2,
                          allowMinus:   false
                      });
                    </script>
                </div>
                  <input type="hidden" id="mats" name="mats">

                <hr>
                <div class="pull-right">
                <input type="hidden" name="myId" id="myId">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                <button type="submit" id="add"  class="btn btn-primary" ><span class="gi gi-pen"></span> Save Changes</button>
              </div>
              {!!Form::close()!!}
        </div>
      </div>
    </div> 
  </div>

 <div id="sub_modal" class="modal fade edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block full container-fluid">
              <div class="block-title">
              <button class="close" data-dismiss="modal">&times;</button>
              <h3>Deplete Stocks</h3>
              </div>

               {!! Form::open(['url'=>route('stockadjustment.storeThat','classID'),'id'=>'frm-upd']) !!}
               <input type="hidden" name="thisIdd" id="thisIdd" >
              <div class="form-group">
                  <label for="mats">Material Name</label>
                  {!! Form::text('matdname',null,  ['id'=>'matdname','class'=>'form-control', 'placeholder'=>'','readonly'=>'readonly']) !!}
              </div>
              <div class="form-group">
                  <label for="quantitys">Current Stock </label>
                  {!!Form::text('quantityd',null,['id'=>'quantityd', 'class'=>'form-control','readonly'=>'readonly'])!!}
                </div>
              <div class="form-group">
                  <label for="qty">Quantity to be Reduced </label>
                  <input type="text" class="form-control" name="qtyd" id="qtyd" onkeyup="validate(this.value);">
                  <span id="duplicates3" class="help-block animation-slideDown">
                    Invalid Quantity
                    </span>
                  <script>

                      $('#qtyd').numeric({
                          decimalSeparator: ".",
                          maxDecimalPlaces : 2,
                          allowMinus:   false
                      });
                    </script>
                </div>
                  <input type="hidden" id="matd" name="matd">

                <hr>
                <div class="pull-right">
                <input type="hidden" name="myIdd" id="myIdd">
                <button type="button" class="btn btn-warning " data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                <button type="submit" class="btn btn-primary here" ><span class="gi gi-pen"></span> Save Changes</button>
              </div>
              {!!Form::close()!!}
        </div>
      </div>
    </div> 
  </div>





        
            <script>$(function(){ TablesDatatables.init(); });</script>