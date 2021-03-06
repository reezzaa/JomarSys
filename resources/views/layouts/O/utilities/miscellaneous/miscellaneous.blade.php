 <script>
   function readByAjax()
    {
      /////////////////stop top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
        $.ajax({
          type : 'get',
          url  : "{{ route('misc.index') }}",
          dataType : 'html',
          success:function(data)
          {
              $('.table-responsive').html(data);

              // $('[data-toggle="tooltip"]').tooltip();
              $('#title').html('<strong>Miscellaneous Fee</strong>  <i role="button" class="gi gi-circle_info" data-toggle="tooltip" data-placement="bottom" title="Rate!"></i>');
          }
        })
         /////////////////stop top loading//////////
          NProgress.done();
         ///////////////////////////////////////////
    };
 </script>
 <div>
   {!! Form::open(['url'=>'misc', 'method'=>'POST', 'id'=>'frm-insert']) !!}
                      <div class="col-md-5">
                          <div class="form-group">
                          <label for="miscdesc">Description</label> <span class="text-danger">*</span> 
                          {!! Form::text('miscdesc', null,  ['id'=>'miscdesc','class'=>'form-control', 'placeholder'=>'e.g Power Consumption, etc.']) !!}
                          <span id="duplicate1" class="help-block animation-slideDown">
                              Duplicate Material Name
                          </span>
                          <script>
                              $('#miscdesc').alphanum({
                                      allow :    '-,.()/', // Specify characters to allow
                                    });
                            </script>
                        </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                            <label for="miscvalue">Miscellaneous Value</label> <span class="text-danger">*</span>
                            {!! Form::text('miscvalue',null ,['id'=>'miscvalue','placeholder'=>'e.g. 99999', 'class' => 'form-control', 'maxlength'=>'30']) !!}
                            <span id="duplicate" class="help-block animation-slideDown">
                              Duplicate Material Name
                            </span>
                            <script>
                              $('#miscvalue').numeric({
                                decimalSeparator: ".",
                                maxDecimalPlaces : 2,
                                allowMinus:   false
                            });
                            </script>
                          </div>
                      </div>
                    <label for="ratevalue"></label>
                        <br>
                  <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add</button>
                        
                      </div>
                    </div>               
                <div class="clearfix"></div>
              {!! Form::close() !!}
 </div>

 <hr>
 <table id="rate-datatable" class="table table-vcenter table-striped table-condensed table-bordered table-hover">
    <thead>
      <tr>
        <th class="text-center">Description</th>
        <th class="text-center">Miscellaneous Value</th>
        <th style="width: 60px;" class="text-center"></th>
        <th style="width: 200px;" class="text-center">Controls</th>
      </tr>
    </thead>
    <tbody>
      @foreach($misc as $key => $u)
      <tr id="id{{$u->id}}">
          <td class="text-center">
              {{ $u->MiscDesc }}
          </td>
          <td class="text-center">
              {{ $u->MiscValue }} %
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
<div class="text-center">
<div id="edit_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
              <div class="block-title themed-background">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white;"><strong>Edit Miscellaneous</strong></h3>
              </div>

              {!! Form::open(['url'=>'{{ route(o.utilities.misc)}}','method'=>'PUT','id'=>'frm-upd']) !!}
              <div class="form-group">
                 <label for="miscdescs">Description</label> 
                 <span class="text-danger">*</span> 
                  {!! Form::text('miscdescs', null,  ['id'=>'miscdescs','class'=>'form-control', 'placeholder'=>'e.g Overtime, etc.']) !!}
                  <span id="duplicate" class="help-block animation-slideDown">
                  Duplicate Material Classification Name
                  </span>
                   <script>
                    $('#miscdescs').alphanum({
                     allow :    '-,.()/', // Specify characters to allow
                   });
                </script>
              </div>
              <div class="form-group">
                <label for="miscvalues">Miscellaneous Value</label> <span class="text-danger">*</span>
                {!! Form::text('miscvalues',null ,['id'=>'miscvalues','placeholder'=>'e.g. 99999', 'class' => 'form-control', 'maxlength'=>'30']) !!}
                  <span id="duplicate1" class="help-block animation-slideDown">
                     Duplicate Material Name
                  </span>
                  <script>
                    $('#miscvalues').numeric({
                      decimalSeparator: ".",
                      maxDecimalPlaces : 2,
                      allowMinus:   false
                    });
                 </script>
              </div>
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
<div class="text-center">
    <div id="del_modal" class="modal fade del_modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block">
         <div class="block-title themed-background">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
            </div>
            <h3 class="themed-background" style="color:white;"><strong>Delete Miscellaneous</strong></h3>
          </div>
           {!!Form::open(['url'=>'{{ route(o.utilities.misc.del)}}','method'=>'PUT','id'=>'frm-del'])!!}
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
<br><br>

<script>$(function(){ TablesDatatables.init(); });</script>
<script>
  $('span#duplicate').hide();
  $('span#duplicate1').hide();
  $(document).ready(function(){
      var selfName = '';
      var className = '';
      var id='';
      var url = "misc";
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      }); 
      /////////////////////////////////////////////////////
      //clear on focus
      $('#miscdesc').focus(function(){
        $('span#duplicate1').hide();
       });
       $('#miscvalue').focus(function(){
        $('span#duplicate').hide();
       });
         ////////////////////////////////////////////////////////

        $('#frm-insert').on('submit', function(e){
        $('span#duplicate').hide();
        $('span#duplicate1').hide();
        e.preventDefault();
        if($('#miscdesc').val() != "")
        {
          if($('#miscvalue').val() != "")
            {
                          /////////////////start top loading//////////
                          NProgress.start();
                          ///////////////////////////////////////////
                          var ddata = {
                            desc: $('#miscdesc').val(),
                            value: $('#miscvalue').val(),
                          } 
                          $.ajax({
                            type : 'post',
                            url  : url,
                            data : ddata,
                            dataType: 'json',
                            success:function(data){
                              readByAjax();
                              $(".modal").modal('hide');
                              swal("Success","Miscellaneous Added!", "success");
                            },
                            error:function(data){
                              /////////////////stop top loading//////////
                              NProgress.done();
                              ///////////////////////////////////////////
                               $('span#duplicate1').text("Duplicate Miscellaneous Description!");
                               $('span#duplicate1').show();
                            }
                          })
                    }
                 
          else
          {
            $('span#duplicate').text("Fill up required");
            $('span#duplicate').show();
          }
        }
        else
        {
          $('span#duplicate1').text("Fill up required");
          $('span#duplicate1').show();
        }
          e.stopPropagation();
      });

     //get edit data
      $(this).on('click','.edit_supp', function(){
          /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
          $('span#duplicates').hide();
          $('span#duplicates1').hide();
          var classID = $(this).val();
          id = classID;
          $.get(url + '/' + classID + '/edit', function (data) {
                $('#miscdescs').val(data.MiscDesc);
                $('#miscvalues').val(data.MiscValue);
                selfName = $('#miscdescs').val();
                className = $('#miscvalues').val();
                $('#edit_modal').modal('show');
                /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
            })
      });

       //update edit data
      $(this).on('submit' ,function(e){
        
         $('span#duplicates').hide();
         $('span#duplicates1').hide();
          e.preventDefault();
          
          if($('#miscdescs').val() != "")
        {
           if($('#miscvalues').val() != "")
            {
                       
                          if(selfName == $('#miscdescs').val() && className == $('#miscvalues').val())
                          {
                            swal("Info", "Same Miscellaneous Information", "info");
                          }
                          else
                          { 
                            /////////////////start top loading//////////
                            NProgress.start();
                            ///////////////////////////////////////////
                            var formData = {
                                    MiscDesc: $('#miscdescs').val(),
                                    MiscValue : $('#miscvalues').val()
                              }
                            var mod_url = url+'/'+id;
                            $.ajax({
                              type : 'put',
                              url  : mod_url,
                              data : formData,
                              dataType: 'json',
                              success:function(data){
                                readByAjax();
                                $(".modal").modal('hide');
                                swal("Success","Miscellaneous Edited!", "success");
                              },
                              error:function(data){
                                  /////////////////stop top loading//////////
                                  NProgress.done();
                                  ///////////////////////////////////////////
                                 $('span#duplicates1').text("Duplicate Miscellaneous Name");
                                 $('span#duplicates1').show();
                              }
                            })
                          }
                       }
                 
          else
          {
            $('span#duplicate').text("Fill up required");
            $('span#duplicate').show();
          }
        }
        else
        {
          $('span#duplicate1').text("Fill up required");
          $('span#duplicate1').show();
        }
          e.stopPropagation();
      }); 


    //status listen edit
      $(this).on('change','#status',function(e){ 
       /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
       e.preventDefault(); 
       var stat = $(this).val();
       $.ajax({
          url: url + '/checkbox/' + stat,
          type: "PUT",
          success: function (data) {
              readByAjax();
          }
      });
       e.stopPropagation();
    });

       //delete get data
     $(this).on('click','#del_supp', function(){
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
      var classe = $(this).val();
      $.get(url + '/' + classe + '/edit', function (data) {
            $('#deleteID').text(data.id);
            $('#del_classname').text(data.MiscDesc);
            $('#del_modal').modal('show');
            /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
        })
      });

     //soft delete
     $(this).on('submit','#frm-del' ,function(e){
        /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
          e.preventDefault();
            var mod_url = url+'/'+$('#deleteID').text()+ '/delete';
            var data = $('#del_classname').text();
            $.ajax({
              type : 'put',
              url  : mod_url,
              data : data,
              dataType: 'json',
              success:function(data){
                readByAjax();
                $(".modal").modal('hide');
                swal("Deleted!", "", "success");
              }
            })
           e.stopPropagation();
        }); 
  });
 </script>