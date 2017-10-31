@extends('layouts.mainte.main')
@section('head')
  <script>
    function readByAjax()
      {
          $.ajax({
            type : 'get',
            url  : "{{ url('readByAjax12') }}",
            dataType : 'html',
            success:function(data)
            {
                $('.table-responsive').html(data);
                $('[data-toggle="tooltip"]').tooltip();
                /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
            }
          })
      };
      readByAjax();
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
              @include('layouts.mainte.discount.sidebar')
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
            <i class="fa fa-wrench"> </i> Discount Maintenance<br>
        </h4>
      </div>
  </div>
  <ol class="breadcrumb breadcrumb-top">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Maintenance</a></li>
      <li><a href="">Discount</a></li>
  </ol>

  <div class="block">

    <div id="add_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="block">
                    <div class="block-title themed-background">
                      <div class="block-options pull-right">
                          <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                      </div>
                      <h3 class="themed-background" style="color:white;"><strong>Add Equipment</strong></h3>
                    </div>

                    {!! Form::open(['url'=>'discount', 'method'=>'POST', 'id'=>'frm-insert']) !!}
                    
                    <div class="row">
                      <div class="col-md-1">
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <div>
                            <label for="discountname">Discount Name</label> <span class="text-danger">*</span> 
                            {!! Form::text('discountname',null ,['id'=>'discountname','placeholder'=>'Discount Name', 'class' => 'form-control', 'maxlength'=>'30']) !!}
                          </div>
                          <span id="duplicate" class="help-block animation-slideDown">
                          Duplicate Material Name
                          </span>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <div>
                            <label for="discountpercent">Discount Percentage %</label> <span class="text-danger">*</span> 
                            {!! Form::text('discountpercent',null ,['id'=>'discountpercent','placeholder'=>'%', 'class' => 'form-control', 'maxlength'=>'10']) !!}
                          </div>
                          <span id="duplicate2" class="help-block animation-slideDown">
                          Duplicate Material Name
                          </span>
                          <script>
                            $('#discountpercent').numeric({
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
                    {!! Form::close() !!}

                </div>
              </div>
            </div>
    </div>

    <div class="table-responsive">
    </div>
    <br>
    </div>
@endsection

@section('addbtn')
<a class="float"  data-toggle="tooltip" data-placement="left" title="Add Discount">
    <i class="fa fa-plus my-float"></i>
  </a>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
       var selfName = '';
       var selfPrice = '';
        var className = '';
        var url = "/discount";
         $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }); 

          /////////////////////////////////////////////////////
          //clear on focus
          $('#strDiscountName').focus(function(){
            $('span#duplicate').hide();
           });

          $('#dblDiscountPercent').focus(function(){
            $('span#duplicate2').hide();
           });
           
           ////////////////////////////////////////////////////////
          //reset field
          $('.float').click(function(){
            $('html,body').animate({
                scrollTop: 0
            }, 500);
            $('#frm-insert').trigger("reset");
            $('span#duplicate').hide();
            $('span#duplicate2').hide();
            $('#add_modal').modal('show');
          });

        //////////////////////////////////////////////////////////////
         //insert data
        $('#frm-insert').on('submit', function(e){
          $('span#duplicate').hide();
          $('span#duplicate2').hide();
          e.preventDefault();
            if($('#discountname').val().trim() != "")
            {
              if($('#discountpercent').val().trim() != "")
              {
                /////////////////start top loading//////////
                NProgress.start();
                ///////////////////////////////////////////
                var ddata = {
                  strDiscountName: $('#discountname').val(),
                  dblDiscountPercent: $('#discountpercent').val()
                }
                $.ajax({
                  type : 'post',
                  url  : url,
                  data : ddata,
                  dataType: 'json',
                  success:function(data){
                    readByAjax();
                    $(".modal").modal('hide');
                    swal("Success","Discount Added!", "success");
                    /////////////////stop top loading//////////
                    NProgress.done();
                    ///////////////////////////////////////////
                  },
                  error:function(data){
                    /////////////////stop top loading//////////
                    NProgress.done();
                    ///////////////////////////////////////////
                     $('span#duplicate').text("Duplicate Discount Name");
                     $('span#duplicate').show();
                  }
                })
              }
              else
              {
                $('span#duplicate2').text("Fill up required");
                $('span#duplicate2').show();
              }
            }
            else
            {
              $('span#duplicate').text("Fill up required");
              $('span#duplicate').show();
            }
          e.stopPropagation();
        });

         //get edit data
        $(this).on('click','.edit_supp', function(){
            /////////////////start top loading//////////
            NProgress.start();
            ///////////////////////////////////////////
            $('span#duplicates').hide();
            $('span#duplicates2').hide();
            var classID = $(this).val();
            id = classID;
            $.get(url + '/' + classID + '/edit', function (data) {
                  $('#discountID').val(data.intDiscountID);
                  $('#discountnames').val(data.strDiscountName);
                  $('#discountpercents').val(data.dblDiscountPercent);
                  selfName = $('#discountnames').val();
                  selfPrice = $('#discountpercents').val();
                  $('#edit_modal').modal('show');
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
              })
        });


      //update edit data
      $(this).on('submit' ,function(e){
         $('span#duplicates').hide();
         $('span#duplicates2').hide();
          e.preventDefault();
          var formData = {
                discountID: $('#discountID').val(),
                strDiscountName: $('#discountnames').val(),
                dblDiscountPercent : $('#discountpercents').val()
          }
            if($('#discountnames').val() != "")
            {
              if($('#discountpercents').val() != "")
              {
                 if(selfName == $('#discountnames').val() && selfPrice == $('#discountpercents').val())
                {
                  swal("Info", "Same Discount Infromation", "info");
                }
                else
                {
                  /////////////////start top loading//////////
                  NProgress.start();
                  ///////////////////////////////////////////
                  var mod_url = url+'/'+id;
                  $.ajax({
                    type : 'put',
                    url  : mod_url,
                    data : formData,
                    dataType: 'json',
                    success:function(data){
                      readByAjax();
                      $(".modal").modal('hide');
                      swal("Success","Discount Edited!", "success");
                      /////////////////stop top loading//////////
                      NProgress.done();
                      ///////////////////////////////////////////
                    },
                    error:function(data){
                      /////////////////stop top loading//////////
                      NProgress.done();
                      ///////////////////////////////////////////
                       $('span#duplicates').text("Duplicate Discount Name");
                       $('span#duplicates').show();
                    }
                  })
                }
              }
              else
              {
                $('span#duplicates2').text("Fill up required");
                $('span#duplicates2').show();
              }
             
            }
            else
            {
              $('span#duplicates').text("Fill up required");
              $('span#duplicates').show();
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
                //reload
                //location.reload();
                //noreload but glitch
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
              $('#deleteID').text(data.intDiscountID);
              $('#del_classname').text(data.strDiscountName);
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
              console.log(mod_url);
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
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
                }
              })
             e.stopPropagation();
          }); 
    });
  </script>
@endsection