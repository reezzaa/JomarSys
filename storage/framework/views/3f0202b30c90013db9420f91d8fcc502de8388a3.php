<?php $__env->startSection('head'); ?>
  <script>
    function readByAjax()
      {
          $.ajax({
            type : 'get',
            url  : "<?php echo e(url('readByAjax2')); ?>",
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
      function changeType(val)
      {
        $('#matclass').empty();
        var id;
        var opt;
        var a;
        var newSelect = document.getElementById("matclass");
        /////////////////start top loading//////////
        NProgress.start();
        $('span#duplicate').hide();
        ///////////////////////////////////////////
        $.get('/getMatClass/' + val, function (data) {
          for(a=0;a<data.length;a++)
          {
            opt = new Option(data[a].strMatClassName,data[a].intMatClassID);
            newSelect.appendChild(opt);
            id = data[0].intMatClassID;
          }
          /////////////////stop top loading//////////
          NProgress.done();
          ///////////////////////////////////////////
        })
      }
     
      function changeUOM(val)
      {
          /////////////////start top loading//////////
          NProgress.start();
          $('span#duplicate4').hide();
          ///////////////////////////////////////////
          $('#detailuom').empty();
          var id2;
          var opt3;
          var a3;
          var newSelect3 = document.getElementById("detailuom");
          $.get('/getMatUOM/' + val, function (data) {
          if(data.length != 0)
          {
            for(a3=0;a3<data.length;a3++)
            {
              opt3 = new Option(data[a3].strDetailUOMText,data[a3].intDetailUOMID);
              newSelect3.appendChild(opt3);
              id2 = data[0].intDetailUOMID;
            }
          }
          /////////////////stop top loading//////////
          NProgress.done();
          ///////////////////////////////////////////
          changeSymbol(id2);
        })
      }
      function changeSymbol(val)
      {
          /////////////////start top loading//////////
          NProgress.start();
          ///////////////////////////////////////////
          $('#symbol').val('');
          var a4;
          $.get('/getMatSymbol/' + val, function (data) {
          if(data.length != 0)
          {
            for(a4=0;a4<data.length;a4++)
            {
              $('#symbol').val(data[a4].strUOMUnitSymbol);
            }
          }
          /////////////////stop top loading//////////
          NProgress.done();
          ///////////////////////////////////////////
        })
      }
  </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
  <!-- Main Sidebar -->
  <div id="sidebar">
      <!-- Wrapper for scrolling functionality -->
      <div class="sidebar-scroll">
          <!-- Sidebar Content -->
          <div class="sidebar-content">
            <!-- Icon for user -->
            <?php echo $__env->make('layouts.headers.usericon', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Sidebar Navigation -->
              <?php echo $__env->make('layouts.dashboard.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- <?php echo $__env->make('layouts.mainte.material.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> -->
            <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
      </div>
      <!-- END Wrapper for scrolling functionality -->
  </div>
  <!-- END Main Sidebar -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="content-header">
      <div class="header-section">
        <h4>
            <i class="fa fa-wrench"> </i> Material Maintenance<br>
        </h4>
      </div>
  </div>
  <ol class="breadcrumb breadcrumb-top">
      <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-home"></i></a></li>
      <li><a href="javascript:void(0)">Maintenance</a></li>
      <li><a href="javascript:void(0)">Material</a></li>
      <li><a href="javascript:void(0)">Materials</a></li>
  </ol>

  <div class="block">
    <div id="addMat_modal" class="modal fade add-mat-modal" tabindex="-1" role="dialog" aria-labelledby="AddMatModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="block">
              <div class="block-title themed-background">
                <div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                </div>
                <h3 class="themed-background" style="color:white;"><strong>Add Material</strong></h3>
              </div>

              <?php echo Form::open(['url'=>'material', 'method'=>'POST', 'id'=>'frm-insert']); ?>

              <?php echo $__env->make('layouts.mainte.material.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php echo Form::close(); ?>

              <div class="clearfix"></div>
           </div>
        </div>
      </div>
    </div>

    <div class="table-responsive">
    </div><br>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('addbtn'); ?>
<a class="float"  data-toggle="tooltip" data-placement="left" title="Add Material">
<i class="fa fa-plus my-float"></i></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    $(document).ready(function(){
    var selfName = '';
    var className = '';
    var selfprice = '';
    var id='';
    var date = new Date();
    var url = "/material";
     $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      }); 
     /////////////////////////////////////////////////////
    //clear on focus
    $('#mattype').focus(function(){
      $('span#duplicate').hide();
     });
     $('#matclass').focus(function(){
      $('span#duplicate2').hide();
     });
     $('#matname').focus(function(){
      $('span#duplicate3').hide();
     });
      $('#matprice').focus(function(){
      $('span#duplicate4').hide();
     });
      $('#groupuom').focus(function(){
      $('span#duplicate5').hide();
     });
      $('#detailuom').focus(function(){
      $('span#duplicate6').hide();
     });


     ////////////////////////////////////////////////////////
    $('.float').click(function(){
        $('html,body').animate({
            scrollTop: 0
        }, 500);
        $('#frm-insert').trigger("reset");
        $('.select-chosen').val('').trigger('chosen:updated');
        $('#matclass').empty();
        $('span#duplicate').hide();
        $('span#duplicate2').hide();
        $('span#duplicate3').hide();
        $('span#duplicate4').hide();
        $('span#duplicate5').hide();
        $('span#duplicate6').hide();
        $('#addMat_modal').modal('show');
      });
      //////////////////////////////////////////////////////////////
       //insert data
      $('#frm-insert').on('submit', function(e){
        $('span#duplicate').hide();
        $('span#duplicate2').hide();
        $('span#duplicate3').hide();
        $('span#duplicate4').hide();
        $('span#duplicate5').hide();
        $('span#duplicate6').hide();
        e.preventDefault();
        if($('#mattype').val() != "")
        {
          if($('#matclass').val() != "")
          {
            if($('#matname').val().trim() != "")
            {
              if($('#matprice').val() != "")
              {
                if($('#groupuom').val() != "")
                {
                  if($('#detailuom').val() != "")
                  {
                    /////////////////start top loading//////////
                    NProgress.start();
                    ///////////////////////////////////////////
                    var ddata = {
                      intMatClassID: $('#matclass').val(),
                      strMaterialName: $('#matname').val(),
                      intMatUOM: $('#detailuom').val(),
                      strMaterialBrand: $('#matbrand').val(),
                      strMaterialSize: $('#matsize').val(),
                      strMaterialColor: $('#matcolor').val(),
                      strMaterialDimension: $('#matdimen').val(),
                      dcmMaterialUnitPrice: $('#matprice').val()
                    }
                    $.ajax({
                      type : 'post',
                      url  : url,
                      data : ddata,
                      dataType: 'json',
                      success:function(data){
                        readByAjax();
                        $(".modal").modal('hide');
                        swal("Success","Material Added!", "success");
                      },
                      error:function(data){
                        /////////////////stop top loading//////////
                        NProgress.done();
                        ///////////////////////////////////////////
                         $('span#duplicate2').text("Duplicate Material Name");
                         $('span#duplicate2').show();
                      }
                    })
                  }
                  else
                  {
                    $('span#duplicate5').text("Fill up required");
                    $('span#duplicate5').show();
                  }
                }
                else
                {
                  $('span#duplicate4').text("Fill up required");
                  $('span#duplicate4').show();
                }
              }
              else
              {
                $('span#duplicate3').text("Fill up required");
                $('span#duplicate3').show();
              }
            } 
            else
            {
              $('span#duplicate3').text("Fill up required");
              $('span#duplicate3').show(); 
            }
          }
          else
          {
            $('span#duplicate2').text("Choose Material Classification with Material Name");
            $('span#duplicate2').show();
          }
        }
        else
        {
            $('span#duplicate').text("Select Material Classification");
            $('span#duplicate').show();
        }
        e.stopPropagation();
      });

      //get edit data
      $(this).on('click','.edit_supp', function(){
          $('span#duplicates').hide();
          $('span#duplicates2').hide();
          $('span#duplicates3').hide();
          $('span#duplicates4').hide();
          $('span#duplicates5').hide();
          $('span#duplicates6').hide();
          var classID = $(this).val();
          id = classID;
          $.get(url + '/' + classID + '/edit', function (data) {
                
                $('#editmat_modal').modal('show');
            })
      });

      //update edit data
      $(this).on('submit' ,function(e){
         $('span#duplicates').hide();
         $('span#duplicates2').hide();
         $('span#duplicates3').hide();
          e.preventDefault();
          var formData = {
                matID: $('#matID').val(),
                strMaterialName: $('#matnames').val(),
                intMatMaterialClassID : $('#matcats').val(),
                dblMaterialPrice : $('#prices').val()
          }
          if($('#matcats').val() != "")
          {
            if($('#matnames').val() != "")
            {
              if($('#matnames').val() != "")
              {
                if(selfName == $('#matnames').val() && className == $('#matcats').val() && selfPrice == $('#prices').val())
                {
                  swal("Info", "Same Material Infromation", "info");
                }
                else
                {
                  var mod_url = url+'/'+id;
                  $.ajax({
                    type : 'put',
                    url  : mod_url,
                    data : formData,
                    dataType: 'json',
                    success:function(data){
                      readByAjax();
                      $(".modal").modal('hide');
                      swal("Success","Material Edited!", "success");
                    },
                    error:function(data){
                       $('span#duplicates2').text("Duplicate Material Name");
                       $('span#duplicates2').show();
                    }
                  })
                }
              }
              else
              {
                $('span#duplicates3').text("Fill up required");
                $('span#duplicates3').show();
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
              $('span#duplicates').text("Select Material Classification");
              $('span#duplicates').show();
          }
           e.stopPropagation();
        }); 

      //status listen edit
      $(this).on('change','#status',function(e){ 
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
      var classe = $(this).val();
      $.get(url + '/' + classe + '/edit', function (data) {
            $('#deleteID').text(data.intMaterialID);
            $('#del_classname').text(data.strMaterialName);
            $('#del_modal').modal('show');
        })
      });

     //soft delete
     $(this).on('submit','#frm-del' ,function(e){
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.mainte.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>