@extends('layouts.mainte.main')
@section('head')
<script>
   function readByAjax()
  {
      $.ajax({
        type : 'get',
        url  : "{{ url('readByAjax15') }}",
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
  function validate(val)
                   {
                    var quantityd = $('#quantityd').val();
                    var currquan = quantityd - val;
                    if(currquan<0)
                    {
                      $('span#duplicates3').text("Invalid Quantity");
                      $('span#duplicates3').show();
                      $('.here').attr('disabled',true);

                    }
                    else 
                    {
                      $('span#duplicates3').hide();
                      $('.here').attr('disabled',false);

                    }
                   }
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
              <!-- @include('layouts.transact.stockadjustment.sidebar') -->
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
          <i class="fa fa-cubes"> </i> Stock Adjustment Transaction<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Transaction</a></li>
        <li><a href="javascript:void(0)">Stock Adjustment</a></li>
    </ol>
       
      <!-- Simple Profile Widgets Row -->
      
      <div class="block block-full">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>Stock Adjustment</strong></h3>
        </div> 
          <br>

          <div class="table-responsive">
        </div>
        <br>
      </div>
      <div id="stock_modal" class="modal fade add-spec-modal" tabindex="-1" role="dialog" aria-labelledby="AddSpecModal" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                      <div class="block full container-fluid">
                        <div class="block-title">
                        <button class="close" data-dismiss="modal">&times;</button>
                          <h3>Add Stock</h3>
                        </div>
                        {!! Form::open(['url'=>'stockadjustment', 'method'=>'POST', 'id'=>'frm-insert']) !!}
                         <div class="form-group">
                            <label for="mat">Material <span class="text-danger">*</span>  </label>
                            {!! Form::select('mat', $mat, null,  ['id'=>'mat','class'=>'form-control', 'placeholder'=>' ']) !!}
                          </div>
                          <span id="duplicates2" class="help-block animation-slideDown">
                    Duplicate Material
                    </span>
                        <div class="form-group">
                          <label for="quantity">Quantity <span class="text-danger">*</span> </label>
                          {!! Form::number('quantity',null ,['id'=>'quantity','placeholder'=>'', 'class' => 'form-control']) !!}
                          <script>
                      $('#quantity').numeric({
                          decimalSeparator: ".",
                          maxDecimalPlaces : 2,
                          allowMinus:   false
                      });
                    </script>
                    
                        </div>
                        <div class="pull-right">
                          <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                          <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add</button>
                        </div>
                      {!! Form::close() !!}

                    </div>
                  </div>
                </div>
        </div>   
     
    

@endsection
@section('addbtn')
<a class="float"  data-toggle="tooltip" data-placement="left" title="Add Stocks">
    <i class="fa fa-plus my-float"></i></a>
@endsection

@section('script')
  <script >
    // $(function(){ FormsValidation.init(); });
     $(document).ready(function(){
      var id='';
      var url = "/stockadjustment";
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $('#mat').focus(function(){
        $('span#duplicates2').hide();
       });
      $('#qtyd').focus(function(){
        $('span#duplicates3').hide();
       });
          

       $('.float').click(function(){
          $('html,body').animate({
              scrollTop: 0
          }, 500);
          $('#frm-insert').trigger("reset");
          // $('span#duplicate').hide();
          $('span#duplicates2').hide();

          $('#stock_modal').modal('show');
        });

       $('#frm-insert').on('submit', function(e){
          e.preventDefault();
          var ddata = $("#frm-insert").serialize();
          console.log(ddata);
          $.ajax({
            type : 'post',
            url  : url,
            data : ddata,
            dataType: 'json',
            success:function(data){
              readByAjax();
              swal("Success","Stock Added!", "success");
              $(".modal").modal('hide');
            },
            error:function(data){
               $('span#duplicates2').text("Duplicate Material");
              $('span#duplicates2').show();
            }
          })
        });

        $(this).on('click','.add', function(){
            var classID = $(this).val();
            id = classID;
            $.get(url + '/' + classID + '/edit', function (data) {
                  $('#thisId').val(data.intMaterialID);
                  $('#quantitys').val(data.intStocks);
                  $('#mats').val(data.intMaterialID);
                  $('#matsname').val(data.strMaterialName);
                  selfName = $('#quantitys').val();
                  className = $('#mats').val();
                  $('#add_modal').modal('show');
              })
        });

        $(this).on('click','.subtract', function(){
            var classID = $(this).val();
            id = classID;
            $.get(url + '/' + classID + '/edit', function (data) {
                  $('#thisIdd').val(data.intMaterialID);
                  $('#quantityd').val(data.intStocks);
                  $('#matd').val(data.intMaterialID);
                  $('#matdname').val(data.strMaterialName);
                  selfName = $('#quantityd').val();
                  className = $('#matd').val();
          $('span#duplicates3').hide();

                  $('#sub_modal').modal('show');
              })
        });

         $('#frm-update').on('submit' ,function(e){
          var formData = $('#frm-update').serialize();
          console.log(formData);
          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            dataType: 'json',
            success:function(data){
              console.log(data);
              readByAjax();
              $(".modal").modal('hide');
              swal("Success","Stocks Updated!", "success");
            },
            error:function(data){

            }
          })
        }); 

        $('#frm-upd').on('submit' ,function(e){
            var formData = $('#frm-upd').serialize();
          console.log(formData);
          $.ajax({
            type : 'POST',
            url  : url,
            data : formData,
            dataType: 'json',
            success:function(data){
              console.log(data);
              readByAjax();
              $(".modal").modal('hide');
              swal("Success","Stocks Updated!", "success");
            },
            error:function(data){
              $('span#duplicates3').text("Invalid Quantity");
              $('span#duplicates3').show();
            }
          })
        }); 


    });
  </script>


@endsection