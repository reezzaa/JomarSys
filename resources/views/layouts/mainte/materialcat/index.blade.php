@extends('layouts.mainte.main')
@section('head')
  <script>
    function readByAjax()
      {
          $.ajax({
            type : 'get',
            url  : "{{ url('readByAjax9') }}",
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
              @include('layouts.dashboard.sidebar')
              <!-- @include('layouts.mainte.materialcat.sidebar') -->
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
            <i class="fa fa-wrench"> </i> Material Category Maintenance<br>
        </h4>
      </div>
  </div>
  <ol class="breadcrumb breadcrumb-top">
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Maintenance</a></li>
      <li><a href="javascript:void(0)">Material</a></li>
      <li><a href="javascript:void(0)">Material Category</a></li>
  </ol>
  <div class="block">
   
    <div id="add_modal" class="modal fade add-matclass-modal" tabindex="-1" role="dialog" aria-labelledby="AddMatClassModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block">
            <div class="block-title themed-background">
              <div class="block-options pull-right">
                  <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
              </div>
              <h3 class="themed-background" style="color:white;"><strong>Add Material Category</strong></h3>
            </div>
              
            {!! Form::open(['url'=>'materialcat', 'method'=>'POST', 'id'=>'frm-insert']) !!}
            <div class="row">
              <div class="col-md-5 col-md-offset-1">
                <div class="form-group">
                  <div>
                    <label for="matclassname">
                    Material Classification
                      <!-- Required--><span class="text-danger">*</span>
                    </label>
                    <select id="matclassname"  name="matclassname[]" style="width: 250px;" class="form-control" data-placeholder="Select Classification">
                      <option></option>
                      @foreach($matclass as $matclasses)
                      <option value="{{ $matclasses->intMatClassID }}">{{ $matclasses->strMatClassName }}
                      </option>
                      @endforeach
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
                    <label for="matcatname" > 
                    Material Name
                      <!-- Required--><span class="text-danger">*</span>
                    </label>
                    {!! Form::text('matcatname',null ,['id'=>'matcatname','placeholder'=>'Material Name', 'class' => 'form-control', 'maxlength'=>'40'])!!}
                  </div>
                  <script>
                    $('#matcatname').alphanum({
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
                    <label for="matsubcatname">Material Sub-Category Names</label>
                    {!! Form::text('matsubcatname',null ,['id'=>'matsubcatname','class' => 'input-tags']) !!}
                  </div>
                  <span id="duplicate3" class="help-block animation-slideDown">
                    Duplicate Material Category Name
                  </span>
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
 <a class="float"  data-toggle="tooltip" data-placement="left" title="Add Material Category">
  <i class="fa fa-plus my-float"></i></a>
@endsection

@section('script')
  <script>
    $(document).ready(function(){
    var selfName = '';
    var id='';
    var url = "/materialcat";
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });  
      //hide
       $('#matcatname').focus(function(){
      $('span#duplicate').hide();
      $('span#duplicate2').hide();
      $('span#duplicate3').hide();
     });

     $('.float').click(function(){
        $('html,body').animate({
            scrollTop: 0
        }, 500);
        $('#frm-insert').trigger("reset");
        $('span#duplicate').hide();
        $('span#duplicate2').hide();
        $('span#duplicate3').hide();
        $('#add_modal').modal('show');
      });

      //insert data
      $('#frm-insert').on('submit', function(e){
        
        $('span#duplicate').hide();
        $('span#duplicate2').hide();
        $('span#duplicate3').hide();
        e.preventDefault();
        if($('#matclassname').val() != "")
        {
          if($('#matcatname').val().trim() != "")
          {
            var ddata;
            if($('#matsubcatname').val() != "")
            {
              var pass =  $('#matsubcatname').val();
              var array = new Array();
              array = pass.split(',');
              ddata = {
                intMatClassID: $('#matclassname').val(),
                strMatCatName: $('#matcatname').val(),
                strMatSubCatName: array
              }
            }
            else
            {
             ddata = {
                intMatClassID: $('#matclassname').val(),
                strMatCatName: $('#matcatname').val(),
                strMatSubCatName:  $('#matsubcatname').val()
              }
            }
            /////////////////start top loading//////////
            NProgress.start();
            ///////////////////////////////////////////
            $.ajax({
              type : 'post',
              url  : url,
              data : ddata,
              dataType: 'json',
              success:function(data){
                readByAjax();
                swal("Success","Material Category Added!", "success");
                $(".modal").modal('hide');
              },
              error:function(data){
                /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
                 $('span#duplicate2').text("Duplicate Material Category");
                 $('span#duplicate2').show();
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
          $('span#duplicate').hide();
          $('span#duplicate2').hide();
          $('span#duplicate3').hide();
          var classID = $(this).val();
          id = classID;
          $.get(url + '/' + classID + '/edit', function (data) {
                $('#matcatID').val(data.intMatCatID);
                $('#matcatnames').val(data.strMatCatName);
                selfName =   $('#matcatnames').val();
                $('#matclassnames > option[value="'+ data.intMatClassID +'"]').prop('selected', true);
                className = $('#matclassnames').val();
                $('#matsubcatnames').importTags('');
            })
          $.get(url + '/' + classID + '/editSubCat', function (data) {
                var dats;
                for(var a=0;a<data.length;a++)
                {
                  $('#matsubcatnames').addTag(data[a]);
                }

                $('#edit_modal').modal('show');
                /////////////////stop top loading//////////
                NProgress.done();
                ///////////////////////////////////////////
            })
      });
     

      //update edit data
      $(this).on('submit', function(e){
         $('span#duplicate').hide();
         $('span#duplicate2').hide();
          $('span#duplicate3').hide();
          e.preventDefault();
          if($('#matclassnames').val() != "")
          {
            if($('#matcatnames').val() != "")
            {
              var formData;
              if($('#matsubcatname').val() != "")
              {
                var pass =  $('#matsubcatnames').val();
                var array = new Array();
                array = pass.split(',');
                formData = {
                  intMatClassID: $('#matclassnames').val(),
                  strMatCatName: $('#matcatnames').val(),
                  strMatSubCatName: array
                }
              }
              else
              {
                formData = {
                  matclassID: $('#matcatID').val(),
                  strMatCatName: $('#matcatnames').val(),
                  intMatClassID: $('#matclassnames').val(),
                  intMatSubName: $('#matsubcatnames').val()
                }
              }
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
                  swal("Success","Material Category Edited!", "success");
                },
                error:function(data){
                  /////////////////stop top loading//////////
                  NProgress.done();
                  ///////////////////////////////////////////
                   $('span#duplicate2').text("Duplicate Material Category Name");
                   $('span#duplicate2').show();
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

      //status listen edit
      $(this).on('change','#status',function(e){ 
       /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
       e.preventDefault(); 
       var stat = $(this).val();
       $.ajax({
          url: 'materialcat/checkbox' + '/' + stat,
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
     $(this).on('click','.del_supp', function(){
      /////////////////start top loading//////////
      NProgress.start();
      ///////////////////////////////////////////
      var classe = $(this).val();
      $.get(url + '/' + classe + '/edit', function (data) {
            $('#deleteID').text(data.intMatCatID);
            $('#del_classname').text(data.strMatCatName);
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
@endsection