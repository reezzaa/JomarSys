<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
            #add_modal {
            top:30%;
            outline: none;
            }
            #edit_modal {
            top:25%;
            outline: none;
            }
            #del_modal {
            top:30%;
            outline: none;
            }
            #duplicate{
            color: red;
            }
            .label-container{
                  position:fixed;
                  bottom:48px;
                  right:105px;
                  display:table;
                  visibility: hidden;
            }
            .label-text{
                    color:#FFF;
                    background:rgba(51,51,51,0.5);
                    display:table-cell;
                    vertical-align:middle;
                    padding:10px;
                    border-radius:3px;
            }
            .label-arrow{
                    display:table-cell;
                    vertical-align:middle;
                    color:#577162;
                    opacity:0.5;
            }
            .float{
                    position:fixed;
                    width:60px;
                    height:60px;
                    bottom:40px;
                    right:40px;
                    background-color:#577162;
                    color:#FFFFFF;
                    border-radius:50px;
                    text-align:center;
                    box-shadow: 2px 2px 3px #999;
            }
            .my-float{
                    font-size:24px;
                    margin-top:18px;
            }
            a.float + div.label-container {
              visibility: hidden;
              opacity: 0;
              transition: visibility 0s, opacity 0.5s ease;
            }
            a.float:hover + div.label-container{
              visibility: visible;
              opacity: 1;
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
              url  : "{{ url('readByAjax3') }}",
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
  </head>
<body>
<body class="page-loading">
          <!-- Preloader -->
          <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
          <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in body element (HTML version) -->
          <div class="preloader themed-background">
              <h1 class="push-top-bottom text-light text-center"><strong>JMSESMS</strong></h1>
              <div class="inner">
                  <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
                  <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
              </div>
          </div>
          <!-- END Preloader -->

          <!-- Page Container -->
          <!-- In the PHP version you can set the following options from inc/config file -->
          <!--
              Available #page-container classes:

              '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

              'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
              'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
              'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)

              'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
              'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
              'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

              'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

              'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

              'style-alt'                                     for an alternative main style (without it: the default style)
              'footer-fixed'                                  for a fixed footer (without it: a static footer)

              'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

              'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
              'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar
          -->
          <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
              <!-- Alternative Sidebar -->
              <div id="sidebar-alt">
                  <!-- Wrapper for scrolling functionality -->
                  <div class="sidebar-scroll">
                      <!-- Sidebar Content -->
                      <div class="sidebar-content">
                          <!-- Chat -->
                          <!-- Chat demo functionality initialized in js/app.js -> chatUi() -->
                          <a href="page_ready_chat.html" class="sidebar-title">
                              <i class="gi gi-comments pull-right"></i> <strong>Chat</strong>UI
                          </a>
                          <!-- Chat Users -->
                          <ul class="chat-users clearfix">
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-online">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar12.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-online">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar15.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-online">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar10.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-online">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-away">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar7.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-away">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar9.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-busy">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar16.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar1.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar3.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar13.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                          </ul>
                          <!-- END Chat Users -->

                          <!-- Chat Talk -->
                          <div class="chat-talk display-none">
                              <!-- Chat Info -->
                              <div class="chat-talk-info sidebar-section">
                                  <img src="img/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle pull-left">
                                  <strong>John</strong> Doe
                                  <button id="chat-talk-close-btn" class="btn btn-xs btn-default pull-right">
                                      <i class="fa fa-times"></i>
                                  </button>
                              </div>
                              <!-- END Chat Info -->

                              <!-- Chat Messages -->
                              <ul class="chat-talk-messages">
                                  <li class="text-center"><small>Yesterday, 18:35</small></li>
                                  <li class="chat-talk-msg animation-slideRight">Hey admin?</li>
                                  <li class="chat-talk-msg animation-slideRight">How are you?</li>
                                  <li class="text-center"><small>Today, 7:10</small></li>
                                  <li class="chat-talk-msg chat-talk-msg-highlight themed-border animation-slideLeft">I'm fine, thanks!</li>
                              </ul>
                              <!-- END Chat Messages -->

                              <!-- Chat Input -->
                              <form action="index.html" method="post" id="sidebar-chat-form" class="chat-form">
                                  <input type="text" id="sidebar-chat-message" name="sidebar-chat-message" class="form-control form-control-borderless" placeholder="Type a message..">
                              </form>
                              <!-- END Chat Input -->
                          </div>
                          <!--  END Chat Talk -->
                          <!-- END Chat -->

                          <!-- Activity -->
                          <a href="javascript:void(0)" class="sidebar-title">
                              <i class="fa fa-globe pull-right"></i> <strong>Activity</strong>UI
                          </a>
                          <div class="sidebar-section">
                              <div class="alert alert-danger alert-alt">
                                  <small>just now</small><br>
                                  <i class="fa fa-thumbs-up fa-fw"></i> Upgraded to Pro plan
                              </div>
                              <div class="alert alert-info alert-alt">
                                  <small>2 hours ago</small><br>
                                  <i class="gi gi-coins fa-fw"></i> You had a new sale!
                              </div>
                              <div class="alert alert-success alert-alt">
                                  <small>3 hours ago</small><br>
                                  <i class="fa fa-plus fa-fw"></i> <a href="page_ready_user_profile.html"><strong>John Doe</strong></a> would like to become friends!<br>
                                  <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Accept</a>
                                  <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Ignore</a>
                              </div>
                              <div class="alert alert-warning alert-alt">
                                  <small>2 days ago</small><br>
                                  Running low on space<br><strong>18GB in use</strong> 2GB left<br>
                                  <a href="page_ready_pricing_tables.html" class="btn btn-xs btn-primary"><i class="fa fa-arrow-up"></i> Upgrade Plan</a>
                              </div>
                          </div>
                          <!-- END Activity -->

                          <!-- Messages -->
                          <a href="page_ready_inbox.html" class="sidebar-title">
                              <i class="fa fa-envelope pull-right"></i> <strong>Messages</strong>UI (5)
                          </a>
                          <div class="sidebar-section">
                              <div class="alert alert-alt">
                                  Debra Stanley<small class="pull-right">just now</small><br>
                                  <a href="page_ready_inbox_message.html"><strong>New Follower</strong></a>
                              </div>
                              <div class="alert alert-alt">
                                  Sarah Cole<small class="pull-right">2 min ago</small><br>
                                  <a href="page_ready_inbox_message.html"><strong>Your subscription was updated</strong></a>
                              </div>
                              <div class="alert alert-alt">
                                  Bryan Porter<small class="pull-right">10 min ago</small><br>
                                  <a href="page_ready_inbox_message.html"><strong>A great opportunity</strong></a>
                              </div>
                              <div class="alert alert-alt">
                                  Jose Duncan<small class="pull-right">30 min ago</small><br>
                                  <a href="page_ready_inbox_message.html"><strong>Account Activation</strong></a>
                              </div>
                              <div class="alert alert-alt">
                                  Henry Ellis<small class="pull-right">40 min ago</small><br>
                                  <a href="page_ready_inbox_message.html"><strong>You reached 10.000 Followers!</strong></a>
                              </div>
                          </div>
                          <!-- END Messages -->
                      </div>
                      <!-- END Sidebar Content -->
                  </div>
                  <!-- END Wrapper for scrolling functionality -->
              </div>
              <!-- END Alternative Sidebar -->

               <!-- Main Sidebar -->
              <div id="sidebar">
                  <!-- Wrapper for scrolling functionality -->
                  <div class="sidebar-scroll">
                      <!-- Sidebar Content -->
                      <div class="sidebar-content">
                          <!-- Brand -->
                          <a href="index.html" class="sidebar-brand">
                              <i class="gi gi-flash"></i><strong>JMSESMS</strong>
                          </a>
                          <!-- END Brand -->

                          <!-- User Info -->
                          <div class="sidebar-section sidebar-user clearfix">
                              <div class="sidebar-user-avatar">
                                  <a href="page_ready_user_profile.html">
                                      <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar">
                                  </a>
                              </div>
                              <div class="sidebar-user-name">John Sese</div>
                              <div class="sidebar-user-links">
                                  <a href="page_ready_user_profile.html" data-toggle="tooltip" title="Profile"><i class="gi gi-user"></i></a>
                                  <a href="page_ready_inbox.html" data-toggle="tooltip" title="Messages"><i class="gi gi-envelope"></i></a>
                                  <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                  <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" title="Settings"><i class="gi gi-cogwheel"></i></a>
                                  <a href="{{ route('logout') }}" data-toggle="tooltip" title="Logout"><i class="gi gi-exit"></i></a>
                              </div>
                          </div>
                          <!-- END User Info -->

                          <!-- Theme Colors -->
                          <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
                          <ul class="sidebar-section sidebar-themes clearfix">
                              <li class="active">
                                  <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default Blue"></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="css/themes/night.css" data-toggle="tooltip" title="Night"></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="css/themes/modern.css" data-toggle="tooltip" title="Modern"></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="css/themes/flatie.css" data-toggle="tooltip" title="Flatie"></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="css/themes/spring.css" data-toggle="tooltip" title="Spring"></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="css/themes/fancy.css" data-toggle="tooltip" title="Fancy"></a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
                              </li>
                          </ul>
                          <!-- END Theme Colors -->

                          <!-- Sidebar Navigation -->
                          @include('layouts.mainte.equiptype.sidebar')
                          <!-- END Sidebar Navigation -->
                      </div>
                      <!-- END Sidebar Content -->
                  </div>
                  <!-- END Wrapper for scrolling functionality -->
              </div>
              <!-- END Main Sidebar -->

              <!-- Main Container -->
              <div id="main-container">
                  <!-- Header -->
                  <!-- In the PHP version you can set the following options from inc/config file -->
                  <!--
                      Available header.navbar classes:

                      'navbar-default'            for the default light header
                      'navbar-inverse'            for an alternative dark header

                      'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                          'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                      'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                          'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                  -->
                  <!-- END Header -->

                  <!-- Page content -->
                  <header class="navbar navbar-default">
                  <!-- Navbar Header -->
                    <div class="navbar-header">
                        <!-- Main Sidebar Toggle Button -->
                        <ul class="nav navbar-nav-custom">
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- END Main Sidebar Toggle Button -->
                    </div>
                    <!-- END Navbar Header -->


                    <!-- Alternative Sidebar Toggle Button, Visible only in large screens (> 767px) -->
                    <ul class="nav navbar-nav-custom pull-right hidden-xs">
                        <li>
                            <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');">
                                <i class="gi gi-share_alt"></i>
                                <span class="label label-primary label-indicator animation-floating">4</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END Alternative Sidebar Toggle Button -->

                  </header>
                  <!-- END Header -->

                <!-- Page content -->
                <div id="page-content">
                  <div class="content-header">
                      <div class="header-section">
                        <h4>
                            <i class="fa fa-wrench"> </i> Equipment Type Maintenance<br>
                        </h4>
                      </div>
                  </div>
                  <ol class="breadcrumb breadcrumb-top">
                      <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
                      <li><a href="javascript:void(0)">Maintenance</a></li>
                      <li><a href="javascript:void(0)">Equipment</a></li>
                      <li><a href="javascript:void(0)">Equipment Type</a></li>
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
                          <h3 class="themed-background" style="color:white;"><strong>Add Equipment Type</strong></h3>
                        </div>

                         {!! Form::open(['url'=>'equiptype', 'method'=>'POST', 'id'=>'frm-insert']) !!}
                          <div class="form-group">
                            <label for="typeName">
                            Equipment Type Name
                            <span class="text-danger">*</span> 
                            </label>
                            {!! Form::text('typeName',null ,['id'=>'typeName','placeholder'=>'Equipment Type Name', 'class' => 'form-control', 'maxlength'=>'40'])
                            !!}
                            <span id="duplicate" class="help-block animation-slideDown">
                            Duplicate Material Classification Name
                            </span>
                            <script>
                              $('#typeName').alphanum({
                                    allow :    '-,.()/', // Specify characters to allow
                                  });
                              </script>
                          </div>
                          <div class="pull-right">
                            <button id="cancel" type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                            <button type="submit" class="btn btn-primary"><span class="gi gi-plus"></span> Add</button>
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
                </div>
                <!-- END Page Content -->

                <!-- Footer -->
                <footer class="clearfix">
                    <div class="pull-right">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a href="javascript:void(0)">HeartCoded</a>
                    </div>
                    <div class="pull-left">
                        <span>2016-2017</span> &copy; <a href="javascript:void(0)">JMSESMS</a>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->


  <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
 <a class="float"  data-toggle="tooltip" data-placement="left" title="Add Equipment Type">
    <i class="fa fa-plus my-float"></i>
  </a>
  
    @include('layouts.scripts.script')
    <script>
       $(document).ready(function(){
          var selfName = '';
          var id='';
          var url = "/equiptype";
             $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            //hide
            $('#typeName').focus(function(){
              $('span#duplicate').hide();
            });  

            $('.float').click(function(){
              $('html,body').animate({
                  scrollTop: 0
              }, 500);
              $('#frm-insert').trigger("reset");
              $('span#duplicate').hide();
              $('#add_modal').modal('show');
            });

            //insert data
            $('#frm-insert').on('submit', function(e){
              $('span#duplicate').hide();
              e.preventDefault();
              if($('#typeName').val().trim() != "")
                {
                  /////////////////start top loading//////////
                NProgress.start();
                ///////////////////////////////////////////
                  var ddata = {
                      strEquipTypeDesc: $('#typeName').val()
                  }
                  $.ajax({
                    type : 'post',
                    url  : url,
                    data : ddata,
                    dataType: 'json',
                    success:function(data){
                      readByAjax();
                      swal("Success","Equipment Type Added!", "success");
                      $(".modal").modal('hide');
                    },
                    error:function(data){
                      /////////////////stop top loading//////////
                      NProgress.done();
                      ///////////////////////////////////////////
                       $('span#duplicate').text("Duplicate Equipment Type Name");
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
                  /////////////////start top loading//////////
                  NProgress.start();
                  ///////////////////////////////////////////
                  $('span#duplicate').hide();
                  var classID = $(this).val();
                  id = classID;
                  $.get(url + '/' + classID + '/edit', function (data) {
                        $('#typeID').val(data.intEquipTypeID);
                        $('#strEquipTypeDesc').val(data.strEquipTypeDesc);
                        selfName =   $('#strEquipTypeDesc').val();
                        $('#edit_modal').modal('show');
                        /////////////////stop top loading//////////
                        NProgress.done();
                        ///////////////////////////////////////////
                    })
              });
              
              //update edit data
              $(this).on('submit', function(e){
                  
                 $('span#duplicate').hide();
                  e.preventDefault();
                  
                  if($('#strEquipTypeDesc').val() != "")
                  {
                    if(selfName == $('#strEquipTypeDesc').val())
                    {
                      swal("Info", "Same Equipment Type Name", "info");
                    }
                    else
                    {
                      /////////////////start top loading//////////
                      NProgress.start();
                      ///////////////////////////////////////////
                      var formData = {
                          typeID: $('#typeID').val(),
                          strEquipTypeDesc: $('#strEquipTypeDesc').val()
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
                          swal("Success","Equipment Type Edited!", "success");
                        },
                        error:function(data){
                            /////////////////stop top loading//////////
                            NProgress.done();
                            ///////////////////////////////////////////
                           $('span#duplicate').text("Duplicate Equipment Type Name");
                           $('span#duplicate').show();
                        }
                      })
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
           $(this).on('click','.del_supp', function(){
            /////////////////start top loading//////////
            NProgress.start();
            ///////////////////////////////////////////
            var classe = $(this).val();
            $.get(url + '/' + classe + '/edit', function (data) {
                  $('#deleteID').text(data.intEquipTypeID);
                  $('#del_classname').text(data.strEquipTypeDesc);
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
</body>
</html>