<table id="matCategory-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Material Classification</th>
      <th class="text-center">Material Name</th>
      <th class="text-center">Sub-Categories</th>
      <th style="width: 60px;" class="text-center"></th>
      <th style="width: 200px;" class="text-center">Controls</th>
    </tr>
  </thead>
   <tbody id="matcat-list">
    @foreach($matcat as $key => $u)
    <tr id="id{{$u->intMatCatID}}">
        <td class="text-center">
            {{ $u->strMatClassName }}
        </td>
        <td class="text-center">
            {{ $u->strMatCatName }}
        </td>
        <td class="text-center">
          <div>
          @php
            $numTot = count($matsubcat);
            $count1 = 0;
            $count2 = 0;
             foreach($matsubcat as $kk => $sub)
             {
                if($sub->intMatCatID == $u->intMatCatID)
                {
                  $count1++;
                  echo '<span class="label label-primary">'.$sub->strMatSubCatName.'</span>'.' ';
                }
                else if($sub->intMatCatID != $u->intMatCatID && ($numTot-1) != $count2)
                {
                  $count2++;
                }
                else if(($numTot-1) == $count2 && $count1 == 0)
                {
                    echo '<i>None</i>';
                }
             }
          @endphp
           
          </div>
        </td>
        <td class="text-center">
          <label class="switch switch-primary">
            @if(($u->status)==1)
                  <p hidden>1</p>
              @else
                  <p hidden>0</p> 
              @endif
            <input name="status" id="status" type="checkbox" value="{{ $u->intMatCatID }}" 
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
            <button id="edit_supp" class="btn btn-alt btn-warning edit_supp" value = "{{$u->intMatCatID}}" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><span class="gi gi-pencil"></span>
            </button>
            <button id="del_supp" class="btn btn-alt btn-danger del_supp" value="{{$u->intMatCatID}}" data-toggle="tooltip" data-placement="top" data-original-title="Delete"> <span class="gi gi-bin"></span>
            </button>
          </div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>        
<div class="text-center">
     <div id="edit_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
             <div class="block-title themed-background">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white;"><strong>Edit Material Classification</strong></h3>
              </div>

              {!! Form::open(['url'=>'materialcat','method'=>'PUT','id'=>'frm-upd']) !!}

                <div class="row">
                  <div class="col-md-5 col-md-offset-1">
                    <div class="form-group">
                      <div>
                        <label for="matclassnames">
                        Material Classification
                          <!-- Required--><span class="text-danger">*</span>
                        </label>
                        {!! Form::select('matclassnames', $matclass, null, ['id'=>'matclassnames', 'style'=>'width: 250px;', 'class'=>'form-control', 'placeholder'=>'']) !!}
                        </select>

                      </div>
                       <span id="duplicate" class="help-block animation-slideDown">
                      Duplicate Material Classification
                      </span>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <div>
                        <label for="matcatnames" > 
                        Material Category Name
                          <!-- Required--><span class="text-danger">*</span>
                        </label>
                        {!! Form::text('matcatnames',null ,['id'=>'matcatnames', 'class' => 'form-control', 'maxlength'=>'40'])!!}
                      </div>
                      <script>
                        $('#matcatnames').alphanum({
                          allow :    '-,.()/', // Specify characters to allow
                        });
                      </script>
                       <span id="duplicate2" class="help-block animation-slideDown">
                          Duplicate Material Category Name
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                      <div>
                        <label for="matsubcatnames">Material Sub-Category Names</label>
                        {!! Form::text('matsubcatnames',null,['id'=>'matsubcatnames','class' => 'input-tags']) !!}
                      </div>
                      <span id="duplicate3" class="help-block animation-slideDown">
                        Duplicate Material Category Name
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-7 col-md-offset-6">
                      <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                      <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span> Save Changes</button>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div> 
  </div>
  
  <div class="text-center">
    <div id="del_modal" class="modal fade del_modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
            <div class="block-title themed-background">
              <div class="block-options pull-right">
                  <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
              </div>
              <h3 class="themed-background" style="color:white;"><strong>Delete Material Classification</strong></h3>
            </div>
             {!!Form::open(['url'=>'materialcat','method'=>'PUT','id'=>'frm-del'])!!}
                  <p><h4>Are you sure you want to delete</h4>
                  </p>
                  <p hidden><b id="deleteID"></b></p>
                  <p>
                    <h3><b id="del_classname" ></b>??</h3>
                  </p>
                  <hr>
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