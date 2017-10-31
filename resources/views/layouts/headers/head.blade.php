<head>
        <title>Jomar's Machine Shop and Engineering Services Management System (JMSESMS)</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" href="img/favicon.ico">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/plugins.css">
        <link rel="stylesheet" href="css/main.css">

        <link id="theme-link" rel="stylesheet" href="css/themes/spring.css">
        <link rel="stylesheet" href="css/themes.css">
        <script src="js/vendor/modernizr.min.js"></script>
        <script src="dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
        <style>
        	
                #matclassAdd_modal {
                top:30%;
                outline: none;
                }
                #truckAdd_modal {
                top:17%;
                outline: none;
                }
                #specAdd_modal {
                top:30%;
                outline: none;
                }
                #edit_modal {
                top:25%;
                outline: none;
                }
                #empedit_modal {
                top:5%;
                outline: none;
                }
                #edit2_modal {
                top:15%;
                outline: none;
                }
                #edit2_modal {
                top:12%;
                outline: none;
                }
                #del_modal {
                top:30%;
                outline: none;
                }
                #matAdd_modal{
                top:30%;
                outline: none;
                }

                #duplicate{
                color: red;
                text-transform: bold;
                }
                #duplicate2{
                color: red;
                text-transform: bold;
                }
                #duplicate3{
                color: red;
                text-transform: bold;
                }
                #duplicate4{
                color: red;
                text-transform: bold;
                }
                #duplicate5{
                color: red;
                text-transform: bold;
                }
                #duplicate6{
                color: red;
                text-transform: bold;
                }
                #duplicate7{
                color: red;
                text-transform: bold;
                }
                #duplicate8{
                color: red;
                text-transform: bold;
                }
                #duplicates{
                color: red;
                text-transform: bold;
                }
                #duplicates2{
                color: red;
                text-transform: bold;
                }
                #duplicates3{
                color: red;
                text-transform: bold;
                }
                #duplicates4{
                color: red;
                text-transform: bold;
                }
        </style>
       
        <script src="js/vendor/jquery-latest.min.js"></script>
        <script src="js/vendor/jquery.alphanum.js"></script>
        <script src="js/vendor/jquery.mask.min.js"></script>
        <script>
          function readByAjax()
            {
                $.ajax({
                  type : 'get',
                  url  : "{{ url('readByAjax7') }}",
                  dataType : 'html',
                  success:function(data)
                  {
                      $('.table-responsive').html(data);
                  }
                })
            };
            readByAjax();
        </script>
</head>