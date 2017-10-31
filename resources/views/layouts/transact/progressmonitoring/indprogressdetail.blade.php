@extends('layouts.transact.main')
@section('head')

   <input type="hidden" name="myId2" id="myId2" value="{{$myId}}">

    <script>
      // function showThis()
      var id= $('#myId2').val();
     var url = "/indprogressmonitoring";
     function readByAjax()
        {
          $.get(url + '/' + id +'/readByAjax2', function (data) {
              // alert(id);
              $(function(){ TablesDatatables.init(); });

               $('.table-responsive').html(data);
            
          })
        };
        readByAjax();

      function findQuote(val)
      {
        $('#workers').empty().trigger('chosen:updated');
        $('#equip').empty().trigger('chosen:updated');
        $('#mat-list').empty();
        $('#spec').empty().trigger('chosen:updated');

        var opt;
        var opt2;
        var a;
        var b;
        var newSelect3 = document.getElementById('workers');
        var newSelect = document.getElementById('spec');
        var newSelect2 = document.getElementById('equip');
       


        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
         
          $.get('/ifindSpec/' + val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>There are no available Specialization!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
            else
            {
                
               $(function(){
                $.bootstrapGrowl('<h4>Specialization/s Found!</h4>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });
                opt = new Option("No Filter");
                newSelect.appendChild(opt);


              for(a=0;a<data.length;a++)
              {
                  opt = new Option(data[a].strSpecDesc,data[a].intSpecID);
                  newSelect.appendChild(opt);
              }


              $('#spec').trigger('chosen:updated');

              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            
            if($('.spec').val()=="No Filter")
            {
              $.get('/ifindWorkerbyNone', function (data) {
                   $(function(){
                    $.bootstrapGrowl('<h4>Worker/s Found!</h4>', {
                      type: 'info',
                      allow_dismiss: true
                    });
                  });
                  for(a=0;a<data.length;a++)
                  {
                    opt = new Option((data[a].strEmpLastName+", "+data[a].strEmpFirstName+"--"+data[a].strSpecDesc),data[a].strEmpID);
                    newSelect3.appendChild(opt);
                  }
                  $('#workers').trigger('chosen:updated');
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
                  })
            }
            }
          })
        $.get('/ifindEquip/' + val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>There are no Equipments available for this Project!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
            else
            {

               $(function(){
                $.bootstrapGrowl('<h4>Equipment/s Found!</h4>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });

              for(a=0;a<data.length;a++)
              {
                  opt = new Option(data[a].strEquipName,data[a].intEquipID);
                  newSelect2.appendChild(opt);
              }


              $('#equip').trigger('chosen:updated');

              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
        
        $.get('/ifindStock/' + val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>There are no Materials/Stocks available!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
            else
            {

               $(function(){
                $.bootstrapGrowl('<h4>Material/s with Stocks Found!</h4>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });
              for(a=0;a<data.length;a++)
              {

                if(data[a].intStockQty!=0)
                 {
                   $('#mat-list').append("<tr><td class='text-center'>"+data[a].strMaterialName+"</td><td class='text-center'>"+data[a].intStockQty+"</td><td><input type='hidden' name='stock["+a+"]' id='stockQty["+a+"]' value="+data[a].intStockQty+"><input type='hidden' name='mat["+a+"]' value="+data[a].intMaterialID+"><input type='text' id='inputQty' name='qty["+a+"]'  class='form-control input-xs' style='text-align:right;'' ></td></tr>");
                  
                 }
                 else
                 {
                  $('#mat-list').append("<tr><td class='text-center'>"+data[a].strMaterialName+"</td><td class='text-center'>"+data[a].intStockQty+"</td><td><input type='hidden' name='stock["+a+"]' id='stockQty["+a+"]' value="+data[a].intStockQty+"><input type='hidden' name='mat["+a+"]' value="+data[a].intMaterialID+"><input type='text' id='inputQty' name='qty["+a+"]'  class='form-control input-xs' style='text-align:right;' readonly='readonly' ></td></tr>");
                 
                 }


              }

              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
        
      };
      

      function findWorker(val)
      {
        $('#workers').empty().trigger('chosen:updated');
        var opt;
        var a;
        var newSelect = document.getElementById('workers');
        // alert(newSelect);
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
        if($('.spec').val() != "No Filter")
        {
          $.get('/ifindWorker/' + val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>There are no available Worker!</p>', {
                  type: 'warning',
                  allow_dismiss: true
                });
              });
              
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
            else
            {

               $(function(){
                $.bootstrapGrowl('<h4>Worker/s Found!</h4>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });
              for(a=0;a<data.length;a++)
              {
                opt = new Option((data[a].strEmpLastName+", "+data[a].strEmpFirstName+"--"+data[a].strSpecDesc),data[a].strEmpID);
                newSelect.appendChild(opt);
              }
              $('#workers').trigger('chosen:updated');
              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
        }
        else
        {
          $.get('/ifindWorkerbyNone', function (data) {
           $(function(){
            $.bootstrapGrowl('<h4>Worker/s Found!</h4>', {
              type: 'info',
              allow_dismiss: true
            });
          });
          for(a=0;a<data.length;a++)
          {
            opt = new Option((data[a].strEmpLastName+", "+data[a].strEmpFirstName+"--"+data[a].strSpecDesc),data[a].strEmpID);
            newSelect.appendChild(opt);
          }
          $('#workers').trigger('chosen:updated');
          /////////////////stop top loading//////////
          NProgress.done();
          ///////////////////////////////////////////
          })
        }
      };

        
    </script>
@endsection
 @section('sidebar')
 <!-- Main Sidebar -->
  <div id="sidebar">
      <!-- Wrapper for scrolling functionality -->
      <div class="sidebar-scroll">
          <!-- Sidebar Content -->
          <div class="sidebar-content">
              <!-- Icon for user -->
              @include('layouts.headers.usericon')
              <!-- Sidebar Navigation -->
              @include('layouts.dashboard.sidebar')
              <!-- @include('layouts.transact.progressmonitoring.indsidebar') -->
              <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
      </div>
      <!-- END Wrapper for scrolling functionality -->
  </div>
  <!-- END Main Sidebar -->
@endsection
@section('content')
              <div class="content-header">
                  <div class="header-section">
                    <h4>
                        <i class="fa fa-signal"> </i> Progress Monitoring Transaction<br>
                    </h4>
                  </div>
              </div>
              <ol class="breadcrumb breadcrumb-top">
                  <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                  <li><a href="javascript:void(0)">Transaction</a></li>
                  <li><a href="javascript:void(0)">Progress Monitoring</a></li>    
              </ol>
             <div class="block block-full">
            <div class="block-title themed-background">
              <h3 class="themed-background" style="color:white"><strong>Progress Monitoring</strong></h3>
              </div>              
                  @foreach($progd as $pd)
                  <div class="row">
                  <div class="container-fluid">
                  <div class="col-md-3">
                      <div class="box box-danger">
                        <div class="box-header with-border">
                        </div>
                        <div class="box-body">
                          <canvas id="pieChart" style="height:250px"></canvas>
                          <h3 class="text-center" ><input type="hidden" id="thisval" class="text-center" style="border: 0;" value="0"> <p id="out">{{$showOverall}}</p></h3>
                          <input type="hidden" id="over" value="{{$showOverall}}">
                          <br>
                         <div class="text-center col-md-offset-3">
                            <button id="show" class="btn btn-box-tool btn-md show text-center"  value=""> <span class="gi gi-power"> </span> <b> Turnover</b></button>
                          </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    
                  </div>
                  <br>
                  <div class="col-md-3">
                      <table class="table table-vcenter table-striped table-bordered table-hover">
                          <tr>
                          <th class="text-center"> <b>Project </b></th>
                          <td class="text-center">{{$pd->strQuoteName}} </td>
                          </tr>
                          <tr>
                           <th class="text-center"><b> Client </b></th>
                           <td class="text-center">{{ $pd->strIndClientFName }} {{ $pd->strIndClientLName }}</td>
                         </tr>
                          <tr>
                             <th class="text-center"><b> Starting Date </b></th>
                             <td class="text-center">{{\Carbon\Carbon::parse($pd->datProjStart)->toFormattedDateString()}} </td>
                          </tr>
                         <tr>
                           <th class="text-center"><b> End Date </b></th>
                           <td class="text-center">{{\Carbon\Carbon::parse($pd->datProjEnd)->toFormattedDateString()}}</td>
                         </tr>  
                         <input type="hidden" id="phId" name="phId" value="{{$pd->intProgHID}}">
                    </table>
                    <div class="row text-center">
                      <label for=""><h5><strong>Legend: </strong></h5></label> <label class="label label-primary ">On schedule</label>
                      <label class="label label-info ">Ahead</label>
                      <label class="label label-danger ">Delayed</label>
                      
                    </div>

                  </div>
                 
                    <div class="col-md-6">
                    <table class="table table-vcenter ">
                        <thead>
                          <tr>
                          <th class="text-center"> <b>Workers </b></th>
                          <th class="text-center"><b> Materials Used</b></th>
                          <th class="text-center" style="width: 70px"><b> Equipments Used</b></th>

                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">
                            @foreach($getWork as $gwork)
                                <h5><b>{{$gwork->strEmpFirstName}} {{$gwork->strEmpMiddleName}} {{$gwork->strEmpLastName}} </b></h5>
                            @endforeach
                            </td>
                           
                            <td class="text-center">
                             @foreach($getTotal as $gmat)
                                <h5> {{$gmat->strMaterialName}} </h5>
                            @endforeach

                            </td>
                            <td class="text-center">
                                @foreach($getEquip as $gequi)
                                <h5><b>{{$gequi->strEquipName}} </b><small>{{$gequi->txtProgDActivity}}</small></h5>
                            @endforeach
                            </td>
                          </tr>
                        </tbody>
                      
                    </table>
                  </div>
                 </div>
                </div>
        <hr>
        
                <div class="box">
                  <div class="box-header with-border">
                  <div class="box-tools pull-right">
                            <button type="button" id="edit_supp" class="btn btn-box-tool btn-lg edit_supp  "><i class="fa fa-plus animation-floating"></i> Add Activity</button>
                            <a type="button" href="{{route('stockadjustment.index') }}"  id="stocks" class="btn btn-lg stocks"><i class="fa fa-cubes animation-floating"></i>  Add Stocks</a>
                  </div> <br><br>
                  <h4 class="box-title" style="text-indent: 1%;"><b> Activities/Tasks</b></h4>

                           
                            
                            
                  </div>
                  <div class="box-body">
                     <div class="table-responsive">
                    
                  </div>
                  
                  </div><br>

                  <!-- /.box-header -->
                 
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
                @endforeach
                <div id="add_modal" class="modal fade edit-mat-modal" tabindex="-1" role="dialog" aria-labelledby="EditMaterialModal" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="block full container-fluid">
                            <div class="block-title themed-background">
                                <div class="block-options pull-right">
                                    <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                                </div>
                                <h3 class="themed-background" style="color:white;"><strong>Add Activity</strong></h3>
                              </div>   
                          
                            {!! Form::open(['url'=>'progressmonitoring','id'=>'form-progress']) !!}
                          <fieldset>
                              <div class="col-md-5 form-group">
                                  <label for="serv" class="text-center">Service Name  <span class="text-danger">*</span></label>
                                  <div class="form-group">
                                       <select id="serv"  name="serv" onchange="findQuote(this.value)"  class="form-control col-md-9 serv " placeholder="">
                                        <option></option>
                                        @foreach($getserv as $gserv)
                                      
                                            <option value="{{$gserv->intQDID}}">{{$gserv->strServiceOffName}} </option>

                                        @endforeach
                                      </select>
                                      
                                  </div>
                                </div>
                                <div class="col-sm-7 form-group">
                                    <label for="actdesc" class="text-center">Activity:  <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        {!! Form::textarea('actdesc',  null,  ['id'=>'actdesc','class'=>'form-control', 'placeholder'=>'','style'=>'height:50px;']) !!}
                                      <!-- <span id="duplicates" class="help-block animation-slideDown">
                                        Duplicate Material Classification
                                      </span> -->
                                  </div><br>
                                  <label class=" control-label text-center" for="example-daterange1">Target Date<span class="text-danger">*</span></label>
                                      <div class="input-group input-daterange col-md-12" data-date-format="yyyy-mm-dd">
                                          <input type="text" id="datStart" name="datStart" class="form-control text-center input-datepicker-close" placeholder="Target Start Date">
                                          <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                          <input type="text" id="datEnd" name="datEnd" class="form-control text-center input-datepicker-close" placeholder="Target End Date">
                                      </div>
                                </div>
                            </fieldset><hr>
                            <fieldset>
                                    <label for="" class="col-md-4 text-center">Assign Workers</label>                            
                                            <div class="col-md-offset-5">
                                              <div class="col-md-5 form-group">
                                                  <select id="spec"  name="spec" onchange="findWorker(this.value)" style="width: 250px;" class="form-control spec " placeholder="Select Specialization">
                                                        <option></option>
                                                        @foreach($getSpec as $gspec)
                                                       <option value="{{$gspec->intSpecID}}">{{$gspec->strSpecDesc}}</option>
                                                       @endforeach
                                                </select>
                                                <span id="duplicate" class="help-block animation-slideDown">
                                                    Select Workers with Specialization
                                                  </span>
                                                </div>
                                                <div class="col-md-7 form-group" id="er">
                                                  <select id="workers" name="workers[]" class="select-chosen workers" data-placeholder="Choose.." style="width: 250px;" multiple>
                                                  @foreach($getWorker as $key)
                                                      <option value="{{ $key->strEmpID }}"> {{ $key->strEmpLastName }}, {{ $key->strEmpFirstName }} -- {{$key->strSpecDesc}}

                                                      </option>
                                                  @endforeach
                                                  </select>
                                                  <span id="duplicatew" class="help-block animation-slideDown ">
                                                    Assign workers for this activity
                                                  </span>
                                                </div>
                                            </div>
                                        
 
                                 
                            </fieldset><hr>
                            <fieldset>
                                    <label for="" class="col-md-4 text-center">Materials</label>                            
                                            <div class="col-md-offset-5">
                                              <div class="col-md-12">
                                                  <table >
                                                      <tr>
                                                      <th class="text-center col-md-5">Material Name</th>
                                                      <th class="text-center col-md-4">Stocks</th>
                                                      <th class="text-center col-md-3">Quantity</th>
                                                    </tr>
                                                    <tbody id="mat-list">
                                                      
                                                    </tbody>
                                                  </table>
                                            </div>
                                        

 
                                 
                            </fieldset><hr>
                            <fieldset>
                                    <label for="" class="col-md-4 text-center">Equipments</label>                            
                                         <div class="col-md-offset-5">
                                                <div class="col-md-12 form-group">
                                                  <select id="equip" name="equip[]" class="select-chosen" data-placeholder="Choose.." style="width: 250px;" multiple>
                                                  @foreach($getEquip as $equi)
                                                      <option value="{{ $equi->intEquipID }}"> {{ $equi->strEquipName }}
                                                      </option>
                                                  @endforeach
                                                  </select>
                                                  <span id="duplicate" class="help-block animation-slideDown">
                                                   Select Equipment/s for this activity
                                                  </span>
                                                </div>
                                            </div>
 
                                 
                            </fieldset>

                               
                            <hr>
                            <div class="form-group form-actions ">
                             <input type="hidden" name="myId" id="myId" value="{{$myId}}"> <!-- contract ID-->
                             <input type="hidden" name="lpId" id="lpId"><!-- progress header ID-->
                             <input type="hidden" name="overall" id="overall">

                            <div class="col-md-offset-9">
                              <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                              <button type="submit" class="btn btn-primary" ><span class="gi gi-check"></span> Save </button>
                            </div>
                      </div>
                            {!!Form::close()!!}
                    </div>
                  </div> 
                </div>
             </div>

          {!! Form::open(['url'=>'billing','method'=>'put', 'id'=>'frm-upd']) !!}
          <div id="turnover_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="block">
                 <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>Turnover Confirmation</strong></h3>
                  </div>          
                    <div>
                      <div class="row col-md-offset-1">
                        <h5 for=""> <i class="hi hi-list-alt"></i> <strong>Quote No:</strong> <span id="contId"></span></h5>
                      </div>
                      <input type="hidden" id="cont" name="cont">
                      <div class="row col-md-offset-0">
                        <h4 for="" class="text-center"> <strong><span id="quoteName"></span></strong> </h4>
                      </div>
                      <div class="row col-md-offset-0">
                        <h4 for="" class="text-center"> <strong></strong> <span id="client"></span></h4>
                      </div>
                      <hr>
                      <div class="row col-md-offset-1">
                        <h5 for=""><i class="gi gi-calendar"></i> <strong>Starting Date</strong> <span id="datTStart"></span></h5><h5 for=""><i class="gi gi-calendar"></i> <strong>End Date</strong> <span id="datTEnd"></span></h5>
                      </div>

                

                    </div>
                    </div>
                    <div class="col-md-offset-8">
                        <button type="submit" class="btn btn-md btn-primary" > <span class="hi hi-off"></span> Turnover Project</button>
                    </div>
                    <div class="clearfix"></div>
                    <br>
              </div>
            </div>
          </div>
          {!! Form::close() !!}

                <br>

                
            </div>
          
@endsection    
@section('script')
  <script>$(function(){ FormsValidation.init(); });</script>
  <script>

    $(document).ready(function(){
     var id= $('#myId2').val();
     var url = "/indprogressmonitoring";
     $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 
          var over = $('#over').val();
          $('#updoverval').val(over);
          // alert(over);
          if(over == "")
          {
            var val = 0;
            $('#thisval').val(0) ;
          }
          else
          {
            $('#thisval').val(over);
          }

          $('#material').on('change',function(){
            var getmat = $('#material').val();
            $.get('/findStock/'+getmat , function (data)
            {
                // alert(getmat);
                var getstock = data.intStockMatID;
                // alert(data.intStockQty);

              if(data.intStockMatID==getmat)
              {
                $('#stock').val(data.intStockQty);
              }
            })
            
          });

           $(this).on('click','.edit_supp', function(){
           var classID = $(this).val();

             $('#form-progress').trigger("reset");
             $('#add_modal').modal('show');
         });


            var getval = $('#thisval').val();
            var total = 100 -getval;
            $('#out').text(getval+" % Progress");

            var gb = $('#getbill').val();

           var getprog = $('#phId').val();
           $('#lpId').val(getprog);//proghead ID
           $('#updover').val(getprog);//proghead ID


           
           if(getval==100)
           {
            $('#show').attr('disabled',false);
           }
           else
           {
            $('#show').attr('disabled',true);

           }
          $(this).on('click','#show', function(){
          var getId = $('#myId').val();
          $.get( getId +'/indturnover', function (data) {
           a='';
           for (a=0; a<data.length; a++) {
                  $('#contId').text(data[a].strQuoteID);
                  $('#cont').val(data[a].strQuoteID);
                $('#quoteName').text(data[a].strQuoteName);
                $('#client').text(data[a].strIndClientFName+" "+data[a].strIndClientLName);
                $('#datTStart').text(data[a].datProjStart);
                $('#datTEnd').text(data[a].datProjEnd);
           }
            })
          $('#turnover_modal').modal('show');
        });

       $('#frm-upd').on('submit' ,function(e){
              e.preventDefault();
              var id= $('#myId2').val();
              var formData = $('#frm-upd').serialize();
              console.log(formData);
              $.ajax({
                type : 'PUT',
                url  : url+"/"+id+'/updturnover',
                data : formData,
                dataType: 'json',
                success:function(data){
                swal("Success",id+" Turnovered!", "success");
                window.location = '/indprogressmonitoring';
                  
                },
                error:function(data){

                }
              })
            });

            $(this).on('click','#edit_this', function(){
                var classID = $(this).val();
                $('#updId').val(classID);//progtarg id
                var getId = $('#myId').val();
                $('#mydId').val(getId);//proj id
           $.get(url + '/' + classID + '/edit' , function (data) {
           $('#updstat').val(data.dblProgDTargPercent);
           $('#updtobe').val(data.datProgDTargDateToBe);
           $('#updend').val(data.datProgDTargEndDate);

             $('#edit_modal').modal('show');
           });

         });


           $(this).on('click','#del_this', function(){
             var classe = $(this).val();
                   
             // alert(classe);
            $.get(url + '/' + classe + '/edit', function (data) {
              var a='';
              for(a=0;a<data.length;a++)
              {
                // alert(data[a].intMUQty);
                $('#mathere').append("<input type='hidden' name='demat["+a+"]' value='"+data[a].intMUQty+"'>");
                $('#matidhere').append('<input type="hidden" name="dematid['+a+']" value="'+data[a].intMUMatID+'">');
                $('#stochere').append('<input type="hidden" name="stoc['+a+']" value="'+data[a].intStocks+'">');
              $('#deleteID').text(data[a].intProgID);
              $('#del_classname').text(data[a].txtProgDActivity);
              }
              $('#del_modal').modal('show');
          });
            $('#mathere').empty();
                $('#matidhere').empty();
                $('#stochere').empty();
        });

            
    $('span#duplicatew').hide();
      //not working (try to hide error if user focus on the select)
      $('#workers').focus(function(){
        $('span#duplicatew').hide();
       });
      //
    
      $('#form-progress').submit(function(){
           var options = $('#workers > option:selected');
           if(options.length == 0){
            $('span#duplicatew').show();
            return false;
           }
           else
           {
            $('span#duplicatew').hide();
           }
      });
         



  //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: getval,
        color: /*"#f56954"*/ "#00c0ef",
        highlight: "#00c0ef",
        label: "Progress"
      },
      // {
      //   value: 500,
      //   color: "#00a65a",
      //   highlight: "#00a65a",
      //   label: "IE"
      // },
      // {
      //   value: 400,
      //   color: "#f39c12",
      //   highlight: "#f39c12",
      //   label: "FireFox"
      // },
      // {
      //   value: 600,
      //   color: "#00c0ef",
      //   highlight: "#00c0ef",
      //   label: "Safari"
      // },
      // {
      //   value: 300,
      //   color: "#3c8dbc",
      //   highlight: "#3c8dbc",
      //   label: "Opera"
      // },
      {
        value: total,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: ""
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

        var pathname = window.location.pathname;

       //insert data
       $('#form-progress').on('submit', function(e){
          e.preventDefault();
          var ddata = $("#form-progress").serialize();
          console.log(ddata);
          var $form = $(this);
          if(! $form.valid()) return false;
          $.ajax({
            type : 'post',
            url  : url,
            data : ddata,
            dataType: 'json',
            success:function(data){
              readByAjax();
              swal("Success","Activity Added!", "success");
              $(".modal").modal('hide');
              window.location = $('#myId').val();

            },
            error:function(data){
            }
          })
        });

        $(this).on('submit','#form-validation' ,function(e){
        // e.preventDefault();

        var classID = $('#edit_this').val();
        id = classID;
        var formData = $('#form-validation').serialize();
        console.log(formData);
        var $form = $(this);
        if(! $form.valid()) return false;
        $.ajax({
          type : 'POST',
          url  : url,
          data : formData,
          dataType: 'json',
          success:function(data){
            console.log(data);
            // readByAjax();
            $(".modal").modal('hide');
            swal("Success","Activity Edited!", "success"); 
          },
          error:function(data){

          }
        })
      }); 

        $(this).on('submit','#frm-del' ,function(e){
          e.preventDefault();
            var mod_url = url+'/'+$('#deleteID').text();
            console.log(mod_url);
            var data = $('#frm-del').serialize();
            $.ajax({
              type : 'put',
              url  : mod_url,
              data : data,
              dataType: 'json',
              success:function(data){
                readByAjax();
                $(".modal").modal('hide');
                swal("Deleted!", "", "success");
              window.location = $('#myId').val();
                
              }
            })
        }); 

      //get view data
      $(this).on('click','#view_this', function(){
          var classID = $(this).val();
          var a,b=0;

         /////////////////top loading//////////
          NProgress.start();
          /////////////////////////////////////
          $.ajax({
          type : 'get',
          url  : '/ifindWork/'+classID,
          dataType: 'json',
          success:function(data){
            for(a=0;a<data.length;a++)
            {
                document.getElementById("special").innerHTML += '<li>'+ data[a].strEmpFirstName +' '+data[a].strEmpMiddleName+' '+data[a].strEmpLastName+'</li><br>';

            }
          }
          });
           $.get('/ifindMat/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("special1").innerHTML += '<li>'+ data[a].intMUQty+' '+data[a].strMaterialName +'</li><br>';

            }
          });
            $.get('/ifindEqui/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("special2").innerHTML += '<li>'+ data[a].strEquipName+'</li><br>';

            }
          });
        $.get('/ifindHistory/' + classID , function (data) {
              for(a=0;a<data.length;a++)
            {
                document.getElementById("his").innerHTML += '<li>'+ data[a].dblProgActualPercent+'% on '+data[a].datProgDActualDate +'</li><br>';

            }
              $('#view_modal').modal('show');
            /////////////////stop top loading//////////
            NProgress.done();
            ///////////////////////////////////////////
          });
          $('#special').empty();
          $('#special1').empty();
          $('#special2').empty();
          $('#his').empty();


      });
        var id = $('#cont').val();
       $('#frm-upd').on('submit' ,function(e){
        e.preventDefault();
        var formData = $('#frm-upd').serialize();
        console.log(formData);
        $.ajax({
          type : 'PUT',
          url  : id,
          data : formData,
          dataType: 'json',
          success:function(data){
          window.location = '/billing';
            
          },
          error:function(data){

          }
        })
      }); 
  });
</script>
@endsection
