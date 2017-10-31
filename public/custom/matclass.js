$(document).ready(function(){
    var id='';
    var url = "/materialclass";
      function readByAjax()
      {
          $.ajax({
            type : 'get',
            url  : "{{ url('readByAjax') }}",
            dataType : 'html',
            success:function(data)
            {
                $('.table-responsive').html(data);
            }
          })
      };
      
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });  

      //reset field
      $('#add').on('click',function(){
        $('#frm-insert').trigger("reset");
        $('span#duplicate').hide();
      });

      //insert data
      $('#frm-insert').on('submit', function(e){
        $('span#duplicate').hide();
        e.preventDefault();
        if($('#matclassname').val().trim() != "")
          {
            var ddata = {
                strMaterialClassname: $('#matclassname').val()
            }
            $.ajax({
              type : 'post',
              url  : url,
              data : ddata,
              dataType: 'json',
              success:function(data){
                readByAjax();
                swal("Success","Material Classification Added!", "success");
                $(".modal").modal('hide');
              },
              error:function(data){
                 $('span#duplicate').text("Duplicate Material Classification Name");
                 $('span#duplicate').show();
              }
            })
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
          $('span#duplicate').hide();
          var classID = $(this).val();
          id = classID;
          $.get(url + '/' + classID + '/edit', function (data) {
                $('#matclassID').val(data.intMaterialClassID);
                $('#strMaterialClassname').val(data.strMaterialClassName);
                $('#edit_modal').modal('show');
            })
      });

      //update edit data
      $(this).on('submit', function(e){
         $('span#duplicate').hide();
          e.preventDefault();
          var formData = {
                matclassID: $('#matclassID').val(),
                strMaterialClassname: $('#strMaterialClassname').val()
            }
          if($('#strMaterialClassname').val() != "")
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
                swal("Success","Material Classification Edited!", "success");
              },
              error:function(data){
                 $('span#duplicate').text("Duplicate Material Classification Name");
                 $('span#duplicate').show();
              }
            })
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
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      })
       e.preventDefault(); 
       var stat = $(this).val();
       $.ajax({
          url: 'materialclass/checkbox' + '/' + stat,
          type: "PUT",
          success: function (data) {
              readByAjax();
          }
      });
       e.stopPropagation();
    });

    //delete get data
     $(this).on('click','.del_supp', function(){
      var classe = $(this).val();
      $.get(url + '/' + classe + '/edit', function (data) {
            $('#del_classname').text(data.strMaterialClassName);
            $('#del_modal').modal('show');
        })
      });

    //read ajaxrequest
    readByAjax();

  });