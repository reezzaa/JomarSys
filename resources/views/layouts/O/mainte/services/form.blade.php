<div class="col-md-12">
  <div class="block">
     <div class="block-title">
            <h2><strong>Declare Service</strong> </h2>
         </div>
     <div class="row">
<div class="col-md-1">
  
</div>
  <label for="" class="col-md-2">Service Name <span class="text-danger">*</span> </label>
  <div class="col-md-7" >
    <input type="text" id="servname" name="servname" class="form-control" placeholder="e.g. Fabrication, Scaffolding" required maxlength="200">
    <!-- <span id="duplicate5" class="help-block animation-slideDown">
          Duplicate Material Name
        </span> -->
        <script>
          $('#servname').alphanum({
                  allow :    '-,.()/', // Specify characters to allow
                });
        </script>
  </div>
  <div class="col-md-2">
    
  </div>
</div>
<br>
<div class="row">
<div class="col-md-1">
  
</div>
  <label for="" class="col-md-4">Work Duration (<em>approximate</em>) <span class="text-danger">*</span></label>
  <div class="col-md-2">
    {!! Form::text('duration',null ,['id'=>'duration','placeholder'=>'0', 'class' => 'form-control', 'maxlength'=>'30','required', 'disabled'=>'disabled','style'=>"text-align: right"]) !!}
        <!-- <span id="duplicate6" class="help-block animation-slideDown">
          Duplicate Material Name
        </span> -->
        <script>
          $('#duration').numeric({
              decimalSeparator: ".",
              maxDecimalPlaces : 2,
              allowMinus:   false
          });
        </script>
  </div>
  <div class="col-md-1">
    <input type="text" class="form-control" value="day/s" disabled="disabled">
  </div>
  <div class="col-md-4">
    
  </div>
</div>
<br>
<div class="row">
<div class="col-md-1"></div>
  <label for="" class="col-md-2">Description: </label>
  <div class="col-md-7">
    <textarea class="form-control" name="servdesc" id="servdesc" rows="3"></textarea>
  </div>
  <div class="col-md-2"></div>

</div>
<hr>
  </div>     
</div>


<div class="col-md-6">
  <div class="block full">
         <div class="block-title">
            <h2><strong>Assign Resources</strong> </h2>
         </div>
        <div class="block">
  <div class="block-title themed-background-night">
              <div class="block-options pull-right">
                <a class="btn btn-sm  btn-primary addworkBtn" data-placement="top" data-toggle="tooltip" title="Assign Worker Specialization"><i class="fa fa-plus"></i></a>

              </div>
              <h3 style="color:white;"><strong>Worker Specialization</strong></h3>
            </div>
             <div id="addworker_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Assign Worker Specialization</strong></h3>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <div>
                              <label for="specname">Specialization Name</label> <span class="text-danger">*</span>
                              <select id="specname" name="specname" style="width: 250px;" onchange="findRPD(this.value)" class="select-chosen" data-placeholder="Select Material">
                                <option></option>
                                <option value=""></option>
                                 @foreach($spec as $spec)
                                <option value="{{ $spec->id }}">{{ $spec->SpecDesc }}
                                </option>
                                @endforeach
                              </select>
                              <span id="duplicate" class="help-block animation-slideDown">
                                    Duplicate Material Classification Name
                              </span>
                              <input type="hidden" name="rpd" id="rpd">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <div>
                              <label for="workerqty">Quantity</label> <span class="text-danger">*</span>

                              {!! Form::text('number',null ,['id'=>'workerqty','placeholder'=>'Qty', 'class' => 'form-control', 'maxlength'=>'30']) !!}
                               <script>
                                $('#workerqty').numeric({
                                    decimalSeparator: ".",
                                    maxDecimalPlaces : 2,
                                    allowMinus:   false
                                });
                              </script>
                              <span id="duplicate3" class="help-block animation-slideDown">
                                    Duplicate Material Classification Name
                              </span>
                            </div>
                          </div>
                        </div><br>
                        <div class="col-md-offset-9">
                          <a id="addworker" class="btn btn-primary btn-alt">Assign </a>
                        </div>
                      </div><br>
                  </div>
                </div>
              </div>
            </div>

            
    <div class="table-worker"></div><hr>
    <div id="addworkfee_div">
    </div>
    <div id="addworkfee_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Add Additional Fee for Worker Specialization</strong></h3>
                    </div>
                    <div class="row">
                      <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <label for=""> Additional Fee</label>
                       <select id="addworkfee" name="addworkfee" style="width: 250px;" class="select-chosen" onchange="addWorkFee(this.value)" data-placeholder="Choose..">
                                <option></option>
                                <option value=""></option>
                                 @foreach($addfee as $fee)
                                <option value="{{ $fee->id }}">{{$fee->FeeValue}}% {{ $fee->FeeDesc }}
                                </option>
                                @endforeach
                              </select>
                              <span id="duplicate" class="help-block animation-slideDown">
                                    Duplicate Material Classification Name
                              </span>
                              <input type="hidden" id="workfee_val">
                              <input type="hidden" id="addwork">

                              <input type="hidden" id="workfee_desc">
                    </div>
                    <div class="col-md-1"></div>
                    </div>
                      <br>
                      <div class="col-md-offset-9">
                          <a id="addworkfee_submit" class="btn btn-primary btn-alt">Add </a>
                      </div><br>
                      <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
            
    <br>
</div>
<div class="block">
  <div class="block-title themed-background-night">
              <div class="block-options pull-right">
                <a class="btn btn-sm  btn-primary addmatBtn" data-placement="top" data-toggle="tooltip" title="Assign Material"><i class="fa fa-plus"></i></a>
              </div>
              <h3 style="color:white;"><strong>Material</strong></h3>
            </div>
          
            <div id="addmat_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Assign Material</strong></h3>
                    </div>
                      <div class="row">
                        <div class="col-md-offset-1">
                          <span class="fa fa-filter"> </span>  Filter by:
                        </div><br>
                        <div class="col-md-5 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="materialClass">Classification</label>
                              <select id="materialClass" name="materialClass" onchange="findMatbyClass(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by Classification">
                                <option></option>
                                <option value=""></option>
                                @foreach($materialClass as $materialClass)
                                <option value="{{ $materialClass->id }}">{{ $materialClass->MatClassName }}
                                </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <div>
                              <label for="uom">Unit of Measurement</label>
                              <select id="uom" name="uom" onchange="findMatbyUOM(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by UOM">
                                <option></option>
                                <option value=""></option>
                                @foreach($uom as $uom)
                                <option value="{{ $uom->id }}">{{ $uom->DetailUOMText }}
                                </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="material">Material</label> <span class="text-danger">*</span>
                              <select id="material" name="material" onchange="findPrice(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Select Material">
                                <option></option>
                                 @foreach($material as $material)
                                <option value="{{ $material->id }}">{{ $material->MaterialName }}
                                </option>
                                @endforeach
                              </select>
                              <span id="duplicate" class="help-block animation-slideDown">
                                    Duplicate Material Classification Name
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <div>
                              <label for="price">Price</label>
                              {!! Form::text('text',null ,['id'=>'price','placeholder'=>'0', 'class' => 'form-control', 'maxlength'=>'30','disabled'=>'disabled']) !!}
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-md-offset-2">
                          <div class="form-group">
                            <div>
                              <label for="materialqty">Quantity</label> <span class="text-danger">*</span>
                              {!! Form::text('number',null ,['id'=>'materialqty','placeholder'=>'Qty', 'class' => 'form-control', 'maxlength'=>'30','onchange'=>'compute(this.value)']) !!}
                            </div>
                            <span id="duplicate2" class="help-block animation-slideDown">
                                    Duplicate Material Classification Name
                              </span>
                            <script>
                              $('#materialqty').numeric({
                                  decimalSeparator: ".",
                                  maxDecimalPlaces : 2,
                                  allowMinus:   false
                              });
                            </script>
                          </div>
                        </div>
                         <div class="col-md-4">
                          <div class="form-group">
                            <div>
                              <label for="cost">Unit Cost</label>
                              <input type="text" class="form-control" id="cost" placeholder="0" disabled="disabled">  
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-offset-9">
                          <a id="addmaterial" class="btn btn-primary btn-alt">Assign </a>
                      </div><br>
                      <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
            
<div class="table-material"></div><hr>
<div id="addmatfee_div">
  
</div>
 <div id="addmatfee_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Add Additional Fee for Materials</strong></h3>
                    </div>
                    <div class="row">
                      <div class="col-md-1"></div>
                    <div class="col-md-10">
                      <label for=""> Additional Fee</label>
                       <select id="addmatfee" name="addmatfee" style="width: 250px;" class="select-chosen" onchange="addMatFee(this.value)" data-placeholder="Choose..">
                                <option></option>
                                <option value=""></option>
                                 @foreach($addfee as $mfee)
                                <option value="{{ $mfee->id }}">{{$mfee->FeeValue}}% {{ $mfee->FeeDesc }}
                                </option>
                                @endforeach
                              </select>
                              <span id="duplicate" class="help-block animation-slideDown">
                                    Duplicate Material Classification Name
                              </span>
                              <input type="hidden" id="matfee_val">
                              <input type="hidden" id="addmat">
                              <input type="hidden" id="matfee_desc">
                    </div>
                    <div class="col-md-1"></div>
                    </div>
                      <br>
                      <div class="col-md-offset-9">
                          <a id="addmatfee_submit" class="btn btn-primary btn-alt">Add </a>
                      </div><br>
                      <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
    <br>
</div>
<div class="block">
  <div class="block-title themed-background-night">
              <div class="block-options pull-right">
              <a class="btn btn-sm  btn-primary addequiBtn" data-placement="top" data-toggle="tooltip" title="Assign Equipment"><i class="fa fa-plus"></i></a>
              </div>
              <h3 style="color:white;"><strong>Equipment</strong></h3>
            </div>           

             <div id="addequip_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Assign Equipment</strong></h3>
                    </div>
                     <div class="row">
                        <div class="col-md-offset-1">
                          <span class="fa fa-filter"> </span>  Filter by:
                        </div><br>
                        
                        <div class="col-md-8 col-md-offset-2">
                          <div class="form-group">
                            <div>
                              <label for="equiptype">Equipment Type</label>
                              <select id="equiptype" name="equiptype" onchange="findEquipbyType(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Filter by UOM">
                                <option></option>
                                <option value=""></option>
                                @foreach($equiptype as $equiptype)
                                <option value="{{ $equiptype->id }}">{{ $equiptype->EquipTypeDesc }}
                                </option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                          <div class="form-group">
                            <div>
                              <label for="equipname">Equipment Name</label> <span class="text-danger">*</span>
                              <select id="equipname" name="equipname" onchange="findEPrice(this.value)" style="width: 250px;" class="select-chosen" data-placeholder="Select Material">
                                <option></option>
                                <option value=""></option>
                                @foreach($equip as $equip)
                                <option value="{{ $equip->id }}">{{ $equip->EquipName }}
                                </option>
                                @endforeach
                              </select>
                               <span id="duplicate2" class="help-block animation-slideDown">
                                    Duplicate Material Classification Name
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <div>
                              <label for="equipprice">Rental Price</label> <span class="text-danger">*</span>
                              {!! Form::text('text',null ,['id'=>'equipprice','placeholder'=>'0', 'class' => 'form-control', 'maxlength'=>'30','onchange'=>'compute2(this.value)','disabled'=>'disabled']) !!}
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-offset-9">
                          <a id="addequipment" class="btn btn-primary btn-alt">Assign </a>
                        </div><br>
                  </div>
                </div>
              </div>
            </div>
    <div class="table-equipment"></div><br>
</div>
      </div>
</div>

<div class="col-md-6">
  <div class="block full">
     <div class="block-title">
       <div class="block-options pull-right">
               <a href="javascript:void(0)" id="btnAdd" class="btn btn-alt btn-sm btn-primary" data-toggle="tooltip" title="Add"><i class="gi gi-circle_plus"></i></a>
               <a href="javascript:void(0)" id="btnDel" class="btn btn-alt btn-sm btn-danger" data-toggle="tooltip" title="Remove"><i class="gi gi-circle_minus"></i></a>
              </div>
            <h2><strong>Identify Tasks</strong> </h2>
         </div>
         
            <div class="row">
            <label for="" class="col-md-1"></label>
            <label for="" class="col-md-9">Task/s</label>
            <label for="" class="col-md-2">Day/s </label>
          </div>
              <!-- Begin cloned task section -->
        <div id="entry1" class="clone_task">
          <!-- Text input-->
          
          <div class="row">
            <p id="num" class="text-center col-md-1">1</p>
           <div class="col-md-9">
            <input id="servtask" name="servtask[]" type="text" placeholder="e.g. Fabricate venting, repair of, Mobilization, Drill ...  " class="form-control" required>
          </div>
           <script>
          $('#servtask').alphanum({
                  allow :    '-,.()/"', // Specify characters to allow
                });
        </script>
          <div class="col-md-2">
            <input id="servduration1" name="servduration[]" type="text" placeholder="e.g. 9999 " class="form-control servduration" style="text-align: right" required >
          </div>
           <script>
          $('#servduration').numeric({
              decimalSeparator: ".",
              maxDecimalPlaces : 2,
              allowMinus:   false
          });
        </script>
           </div>
        </div><!-- end #entry1 -->
       
  </div>
</div>
<div class="col-md-12">
  <fieldset class="form-group">
              <div class="block">
                 {!! Form::submit('Add Service',['id'=>'submit','class'=>'btn btn-default btn-block']) !!}
                 <!-- {!! Form::button('Reset',['type'=>'reset','class'=>'btn btn-warning']) !!} -->
                 <br>
              </div>
           </fieldset>
          <div class="clearfix"></div> 
</div>