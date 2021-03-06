<table id="price-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Material</th>
      <th class="text-center">Price</th>
      <th style="width: 200px;" class="text-center">Controls</th>
    </tr>
  </thead>
   <tbody id="bank-list">
    @foreach($material as $key => $u)
    <tr id="id{{$u->id}}">
        <td class="text-center">
            {{ $u->MaterialName }}
        </td>
        <td class="text-center">
           ₱ {{ $u->MaterialUnitPrice }}
        </td>
        <td>
          <div class="text-center">
            <button id="edit_supp" class="btn btn-alt btn-warning edit_supp" value = "{{$u->id}}" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><span class="gi gi-pencil"></span>
            </button>
            
          </div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>        
<br>
<div >
     <div id="edit_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
             <div class="block-title themed-background">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white;"><strong> <p id="matname"> </p> </strong></h3>
              </div>

              {!! Form::open(['url'=>'price','method'=>'PUT','id'=>'frm-mat-upd']) !!}
                <div class="form-group">
                    <label for="matprice">Price <span class="text-danger">*</span> </label>
                    {!!Form::text('matprice' , null,['id'=>'matprice', 'class'=>'form-control', 'maxLength'=>'30'])!!}
                    <span id="duplicate" class="help-block animation-slideDown">
                    Duplicate Material Type Name
                    </span>
                    <script>
                      $('#matprice').numeric({
                        decimalSeparator: ".",
                        maxDecimalPlaces : 2,
                        allowMinus:   false
                      });
                    </script>
                    </div>
                    <input type="hidden" id="matID" name="matID">
                <br>
                <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                  <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span> Save Changes</button>
                </div>
                <div class="clearfix"></div>
                {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div> 
  </div>
<script>$(function(){ TablesDatatables.init(); });</script>
  

