@extends('layouts.transact.main')
@section('head')

    <script>
      function findProject(val)
      {
        $('#mat-list').empty().trigger('chosen:updated');
        var opt;
        var a;
        var newSelect = document.getElementById('del-list');
        // alert(newSelect);
        /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
       $.get('/findDelMat/' + val, function (data) {
            if(data.length == 0)
            {
              $(function(){
                $.bootstrapGrowl('<h4>Not Found!</h4> <p>There are no Activities/Materials assigned for this Project</p>', {
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
                $.bootstrapGrowl('<h4>Data Found!</h4>', {
                  type: 'info',
                  allow_dismiss: true
                });
              });

              for(a=0;a<data.length;a++)
              {
                 if(data[a].strMaterialBrand==null)
                 {

                      $('#mat-list').append("<tr><td class='text-center'>"+data[a].strMaterialName+"</td><td class='text-center'>"+data[a].strUOMUnitSymbol+"</td><td class='text-center'></td><td><input type='hidden' name='mat["+a+"]' value="+data[a].intMaterialID+"><input type='number' id='inputQty' name='qty["+a+"]'  class='form-control input-xs this inputQty["+a+"]' style='text-align:right;' maxlength='10' placeholder='Qty.'></td></tr>");

                 }
                 
                   else
                   {
                    $('#mat-list').append("<tr><td class='text-center'>"+data[a].strMaterialName+"</td><td class='text-center'>"+data[a].strUOMUnitSymbol+"</td><td class='text-center'>"+data[a].strMaterialBrand+"</td><td><input type='hidden' name='mat["+a+"]' value="+data[a].intMaterialID+"><input type='number' id='inputQty' name='qty["+a+"]'  class='form-control this input-xs' style='text-align:right;' maxlength='10' placeholder='Qty.' ></td></tr>");

                 }



              }
                 $('.this').numeric({
                          decimalSeparator: ".",
                          maxDecimalPlaces : 2,
                          allowMinus:   false
                        });

              /////////////////stop top loading//////////
              NProgress.done();
              ///////////////////////////////////////////
            }
          })
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
              <!-- @include('layouts.transact.delivery.sidebar') -->
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
                        <i class="gi gi-cargo"></i> Delivery Transaction<br>
                    </h4>
                  </div>
              </div>
              <ol class="breadcrumb breadcrumb-top">
                  <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                  <li><a href="javascript:void(0)">Transaction</a></li>
                  <li><a href="{{route('delivery.index')}}">Delivery</a></li>  
                  <li><a href="javascript:void(0)">Create Delivery</a></li>    

              </ol>
              <div class="block-title themed-background">
              <h3 class="themed-background" style="color:white"><strong> Create Delivery</strong></h3>
              </div>

             <div class="block block-full">
                <br>
                <div class="table-responsive">
                {!! Form::open(['url'=>route('delivery.store'), 'method'=>'POST', 'id'=>'form-validation']) !!}
              <h4 class="col-md-offset-9" ><strong>Delivery No: {{$deliveryid}}</strong></h4>
                      <br>
                      <fieldset class="col-md-12 ">
                           <div class="form-group col-md-4">
                            <label for="project" class="text-center animation-stretchLeft"><b>Select Project </b><span class="text-danger">*</span>  </label>
                               <div>
                                     <select id="proj"  name="proj" onchange="findProject(this.value)" class="form-control  proj " data-placeholder="Choose..">
                                        <option></option>
                                        @foreach($getProj as $gp)
                                          <option value="{{$gp->strContractID}}">{{$gp->strQuoteName}}</option>
                                        @endforeach
                                    </select> 
                                    <!-- <span id="duplicatew1" class="help-block animation-slideDown ">
                                  Project Selection Field is required! 
                              </span>        --> 
                              </div>
                          </div>

                          <div class="col-md-8">
                              <div class="form-group">
                              <label for="worker" class="animation-stretchLeft">Assign Person-in-charge <span class="text-danger">*</span>  </label>
                                     <select id="worker" name="worker"  class="form-control  worker " data-placeholder="Choose..">
                                        <option></option>
                                        @foreach($getWorkers as $gw)
                                          <option value="{{$gw->strEmpID}}">{{$gw->strEmpLastName}}, {{$gw->strEmpFirstName}}</option>
                                        @endforeach
                                    </select> 
                                    <!-- <span id="duplicatew2" class="help-block animation-slideDown ">
                                  Person-in-charge selection field is required!
                              </span>        -->   
                            </div>
                            <div class="form-group ">
                              <label for="delitruck">Select Delivery Truck (<i>according to plate number</i>)  </label>
                               <select id="truck" name="truck[]" class="select-chosen" data-placeholder="Choose.." style="width: 250px;" multiple>
                                      <option value=""></option>
                                       @foreach($getTrucks as $gt)
                                          <option value="{{$gt->intDeliTruckID}}">{{$gt->strDeliTruckPlateNo}}</option>
                                        @endforeach
                              </select>
                               <span id="duplicatew" class="help-block animation-slideDown ">
                                  Delivery Truck Selection Field is required!
                              </span>
                            </div>
                            <div class="form-group">
                              <label for="">Delivery Date <span class="text-danger">*</span> </label>
                               <input type="text" id="delidate" name="delidate" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="year/month/day">
                            </div>
                            <div class="form-group">
                              <label for="">Remarks </label>
                               <textarea id="remarks" name="remarks" class="form-control " rows="3" placeholder=""></textarea>
                            </div>
                           
                          </div><br><hr>
                          <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <div>
                                      {!! Form::label('deladdress','Address') !!}
                                      {!! Form::text('deladdress',null, array('class'=>'form-control','placeholder'=>'Address')) !!}
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <div>
                                      {!! Form::label('City','City') !!}
                                      {!! Form::text('City',null, array('class'=>'form-control','placeholder'=>'City')) !!}
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <div>
                                      {!! Form::label('Province','Province') !!}
                                      {!! Form::text('Province',null, array('class'=>'form-control','placeholder'=>'Province')) !!}
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </fieldset><hr><br><br>
                          <fieldset class="col-md-12">
                            <h4 class="themed-color-dark">Select Materials to be Delivered</h4>
                          </fieldset>

                        <fieldset class="col-md-12">
                          <div id="del-list">
                              <br>
                              <table class="table">
                               <thead>
                                 <tr>
                               <th class="text-center">Material Name</th>
                               <th class="text-center">Unit</th>
                               <th class="text-center">Brand</th>
                              <th class="text-center" style=" width: 200px">To be Delivered</th>
                              </tr>
                               </thead>
                              <tbody id="mat-list">
                                                      
                            </tbody>
                          </table>
                          </div>
                        </fieldset> <hr><br>               
                          <div></div>
                          <br><hr>
                          <div class="form-group form-actions ">
                            <div class="col-md-offset-9">
                             {!! Form::submit('Save',['class'=>'btn btn-alt btn-success']) !!}
                              {!! Form::button('Reset',['type'=>'reset','class'=>'btn btn-alt btn-warning']) !!}
                            </div>
                      </div>                                    
                                                   
                       {!! Form::close() !!}
                </div>

                <div></div>
              <br>
            </div>
@endsection

@section('script')
  <script>$(function(){ FormsValidation.init(); });</script>

  <script>
  $(document).ready(function(){
      var id='';
      var url = "/delivery";
       $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

 $('span#duplicatew').hide();
      //not working (try to hide error if user focus on the select)
      $('#truck').focus(function(){
        $('span#duplicatew').hide();
       });
      //
    
      $('#form-validation').submit(function(){
           var options = $('#truck > option:selected');
           if(options.length == 0){
            $('span#duplicatew').show();
            return false;
           }
           else
           {
            $('span#duplicatew').hide();
           }
      });


      $('#form-validation').on('submit', function(e){
          e.preventDefault();
          var ddata = $("#form-validation").serialize();
          console.log(ddata);
          var $form = $(this);
          if(! $form.valid()) return false;
          $.ajax({
            type : 'post',
            url  : url,
            data : ddata,
            dataType: 'json',
            success:function(data){
              window.location='/delivery';
            },
            error:function(data){
            }
          })
        });

       }); 


  </script>


@endsection
