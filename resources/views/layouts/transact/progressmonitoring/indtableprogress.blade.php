<table  class="table table-vcenter table-striped table-bordered table-hover">
              <thead>
              	 <tr>
                 <th class="text-center" style="width: 150px;"><b>Service</b></th>
                 <th class="text-center"><b>Activity</b></th>
                 <th class="text-center" style="width: 120px;"><b>Due Date</b></th>
                 <th class="text-center"><b>Progress</b></th>
                 <th class="text-center" style="width: 50px;"></th>
                 <th class="text-center" style="width: 120px;"><b>Status</b></th>
                 <th class="text-center" style="width: 140px; "><b>Controls</b></th>
               </tr>
              </thead>
              <tbody>
              	 @foreach($fetch as $f)
				<tr>
                 <td class="text-center">{{$f->strServiceOffName}}</td>
                 <td class="text-center">{{$f->txtProgDActivity}}</td>
                 <td class="text-center">{{\Carbon\Carbon::parse($f->datProgDTargEndDate)->toFormattedDateString()}}</td>
                 <td class="text-center">
                 <input type="hidden" id="title" value="{{$f->dblProgDTargPercent}}">
                   <div class="progress progress-xs progress-striped active" >
                     <div class="progress-bar progress-bar-success " style="width: {{$f->dblProgActualPercent}}%"></div>
                   </div>
             
                 </td>
                 <td class="text-center">
                 @if($f->dblProgActualPercent==100)
                 <i class="fa fa-check text-success"></i>
                 @else
                   <span class="label label-default"> {{$f->dblProgActualPercent}}%</span>
                  @endif
                 </td>
                 <td class="text-center">
                 	@if(($f->status==1))
                    @if($f->dblProgActualPercent==100)
                    <span class="label label-primary ">Finished</span>
                     @else     
                 	  <span class="label label-primary">On Schedule</span>
                      @endif
                 	@elseif($f->status==2)
                 	  @if($f->dblProgActualPercent==100)
                    <span class="label label-info ">Finished</span>
                     @else     
                    <span class="label label-info">Ahead</span>
                    @endif
                 	@elseif($f->status==3)
                 	  @if($f->dblProgActualPercent==100)
                    <span class="label label-danger ">Finished</span>
                     @else     
                    <span class="label label-danger">Delayed</span>
                    @endif
                 	@endif




                 </td>
                 <td class="">
                         <button type="button" id="view_this" value="{{$f->intProgID}}" class="btn btn-sm btn-info butun" data-toggle="tooltip" data-placement="top" title="View"><i class="gi gi-eye_open"></i></button> 
                         <button type="button" id="edit_this" value="{{$f->intProgID}}" class="btn btn-sm btn-warning butun" data-toggle="tooltip" data-placement="top" title="Edit"><i class="gi gi-pen"></i></button> 
                          <button type="button" id="del_this"  value="{{$f->intProgID}}" class="btn btn-sm btn-danger butun " data-toggle="tooltip" data-placement="top" title="Remove"><i class="fa fa-times"></i></button>
                  </td>
               </tr>
               @endforeach
              </tbody>
             
             </table> 
  <div id="edit_modal" class="modal fade edit-mat-modal" tabindex="-1" role="dialog" aria-labelledby="EditMaterialModal" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="block full container-fluid">
                <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>Update Activity</strong></h3>
                  </div>   
              
                {!! Form::open(['url'=>route('indprogressmonitoring.storeThis','classID'),'method'=>'POST','id'=>'form-validation']) !!}       
                <br>         
             
               <fieldset>
                <div class="form-group">
                <label class=" control-label col-md-5 text-center" for="val_range">Set Progress(<em>percentage</em>)  <span class="text-danger">*</span></label>
                  <div class="col-md-7">
                    {!! Form::number('val_range',  null,  ['id'=>'val_range','class'=>'form-control', 'placeholder'=>'Range[0-100]']) !!}
                  </div>
                </div>
               </fieldset><br><hr>                
                <div class="form-group form-actions ">
                 <!--  -->
                 <input type="hidden" id="updId" name="updId">
                 <input type="hidden" id="mydId" name="mydId">
                 <input type="hidden" name="updover" id="updover"><!-- progress header ID-->
                 <input type="hidden" name="updoverval" id="updoverval"><!-- progress header ID-->
                  <input type="hidden" id="updstat" name="updstat">
                 <input type="hidden" id="updend" name="updend" >
                 <input type="hidden" id="updtobe" name="updtobe" >


                 

                <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                  <button type="submit" class="btn btn-primary" ><span class="gi gi-check"></span> Save </button>
                </div>
                <!-- <script>
                  $('#matcats').focus(function(){
                      $('span#duplicates').hide();
                     });
                  $('#matnames').focus(function(){
                      $('span#duplicates2').hide();
                     });
                </script> -->
          </div>

                {!!Form::close()!!}
        </div>
      </div> 
    </div>
 </div>

 <div class="text-center">
   <div id="del_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block full container-fluid">
            <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>Delete Activity</strong></h3>
                  </div>   
             {!!Form::open(['url'=>'indprogressmonitoring','method'=>'PUT','id'=>'frm-del'])!!}
                <p><h4>Remove this activity?</h4>
                </p>
                <p hidden><b id="deleteID"></b></p>
                <p>
                  <h3><b id="del_classname" ></b>?</h3>
                </p>
                <hr>
                <div id="mathere">
                  
                </div>
                <div id="matidhere">
                </div>
                <div id="stochere">
                  
                </div>
                <div class="pull-right">
                  <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                  <button type="submit" class="btn btn-danger" ><span class="gi gi-pen"></span>Delete</button>
              </div>
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div> 
</div>

   <div id="view_modal" class="modal fade delete-employee-modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block full container-fluid">
            <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>View Activity</strong></h3>
                  </div>   
                <div class="row">
                <div class="col-md-offset-1">
                      <h4><i class="gi gi-construction_cone"></i> Workers:</h4> 
                    <div class="col-md-5 col-md-offset-1" id="special">
                   
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-offset-1">
                  <h4><i class="fa fa-cube"></i> Materials: </h4>
                  <div class="col-md-5 col-md-offset-1" id="special1">
                   
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-offset-1">
                  <h4><i class="gi gi-blacksmith"></i> Equipments: </h4>
                  <div class="col-md-5 col-md-offset-1" id="special2">
                   
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-offset-1">
                  <h4><strong>Update History</strong></h4>
                  </div>
                  <div class="col-md-6 col-md-offset-1" id="his">
                    <br>
                  </div>
                </div>
              </div>     
        </div>
      </div>
    </div>
