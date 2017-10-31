<table id="discount-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Discount Name</th>
      <th class="text-center">Percentage</th>
      <th style="width: 60px;" class="text-center"></th>
      <th style="width: 200px;" class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="equip-list">
    @foreach($discount as $key => $u)
    <tr id="id{{$u->intDiscountID}}">
        <td class="text-center">
            {{ $u->strDiscountName }} 
        </td>
        <td class="text-center">
            {{$u->dblDiscountPercent}} %
        </td>
        <td class="text-center">
          <label class="switch switch-primary">
            @if(($u->status)==1)
                  <p hidden>1</p>
              @else
                  <p hidden>0</p> 
              @endif
            <input name="status" id="status" type="checkbox" value="{{ $u->intDiscountID }}" 
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
            <button id="edit_supp" class="btn btn-alt btn-warning edit_supp" value = "{{$u->intDiscountID}}" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><span class="gi gi-pencil"></span>
            </button>
            <button id="del_supp" class="btn btn-alt btn-danger del_supp" value="{{$u->intDiscountID}}" data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <span class="gi gi-bin"></span>
            </button>
          </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<div>
      <div id="edit_modal" class="modal fade edit-employee-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
             <div class="block-title themed-background">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white;"><strong>Edit Equipment</strong></h3>
              </div>

               {!! Form::open(['url'=>'equipment','method'=>'PUT','id'=>'frm-update']) !!}
                <div class="row">
                  <div class="col-md-1">
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <div>
                        <label for="discountnames">Discount Name</label> <span class="text-danger">*</span> 
                        {!! Form::text('discountnames',null ,['id'=>'discountnames','placeholder'=>'Discount Name', 'class' => 'form-control', 'maxlength'=>'30']) !!}
                      </div>
                      <span id="duplicates" class="help-block animation-slideDown">
                      Duplicate Material Name
                      </span>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <div>
                        <label for="discountpercents">Discount Percentage %</label> <span class="text-danger">*</span> 
                        {!! Form::text('discountpercents',null ,['id'=>'discountpercents','placeholder'=>'%', 'class' => 'form-control', 'maxlength'=>'10']) !!}
                      </div>
                      <span id="duplicates2" class="help-block animation-slideDown">
                      Duplicate Material Name
                      </span>
                      <script>
                        $('#discountpercents').numeric({
                            decimalSeparator: ".",
                            maxDecimalPlaces : 2,
                            allowMinus:   false
                        });
                      </script>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-4 col-md-offset-8">
                      <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                      <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add </button>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <script>
                    $('#discountnames').focus(function(){
                        $('span#duplicates').hide();
                       });
                    $('#discountpercents').focus(function(){
                        $('span#duplicates2').hide();
                       });
                  </script>
              {!!Form::close()!!}
        </div>
      </div>
    </div> 
  </div>
</div>

<div class="text-center">
   <div id="del_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block">
          <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong>Delete Equipment</strong></h3>
          </div>
             {!!Form::open(['url'=>'discount','method'=>'PUT','id'=>'frm-del'])!!}
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