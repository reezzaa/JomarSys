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
                              <div class="sidebar-user-name"></div>
                              <div class="sidebar-user-links">
                                  <a href="page_ready_user_profile.html" data-toggle="tooltip" title="Profile"><i class="gi gi-user"></i></a>
                                  <a href="page_ready_inbox.html" data-toggle="tooltip" title="Messages"><i class="gi gi-envelope"></i></a>
                                  <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                  <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" title="Settings"><i class="gi gi-cogwheel"></i></a>
                                  <a href="#" data-toggle="tooltip" title="Logout"><i class="gi gi-exit"></i></a>
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
                          <ul class="sidebar-nav">
                              <li class="active">
                                  <a href="{{ route('dashboard') }}" class="active"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
                              </li>
                              <li class="sidebar-header">
                                  <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                                  <span class="sidebar-header-title">Maintenance</span>
                              </li>

                              <li>
                                  <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                                  <i class="gi gi-group sidebar-nav-icon"></i>Worker</a>
                                  <ul>
                                      <li>
                                          <a href="{{ route('specialization.index')}}">Worker Specialization</a>
                                      </li>
                                      <li>
                                          <a href="{{ route('worker.index') }}">Worker</a>
                                      </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                                  <i class="fa fa-cubes sidebar-nav-icon"></i>Material</a>
                                  <ul>
                                      <li>
                                          <a href="{{ route('materialclass.index') }}" class="active">Material Classification</a>
                                      </li>
                                      <li>
                                          <a href="{{ route('material.index') }}">Material</a>
                                      </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                                  <i class="gi gi-blacksmith sidebar-nav-icon"></i>Equipment</a>
                                  <ul>
                                      <li>
                                          <a href="{{ route('equiptype.index') }}">Equipment Type</a>
                                      </li>
                                      <li>
                                          <a href="{{ route('equipment.index') }}">Equipment</a>
                                      </li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="{{ route('deliverytruck.index') }}"><i class="fa fa-truck sidebar-nav-icon"></i>Delivery Truck</a>
                              </li>
                              <li class="sidebar-header">
                                  <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                                  <span class="sidebar-header-title">Transaction</span>
                              </li>
                              <li>
                                  <a href=""><i class="fa fa-files-o sidebar-nav-icon"></i>Transaction1</a>
                              </li>
                              <li>
                                  <a href=""><i class="fa fa-truck sidebar-nav-icon"></i>Transaction2</a>
                              </li>
                              <li>
                                  <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Transaction3</a>
                              </li>
                              <li>
                                  <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Transaction4</a>
                              </li>
                              <li>
                                  <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Transaction5</a>
                              </li>
                              <li class="sidebar-header">
                                  <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                                  <span class="sidebar-header-title">Report</span>
                              </li>
                              <li>
                                  <a href=""><i class="fa fa-files-o sidebar-nav-icon"></i>Report1</a>
                              </li>
                              <li>
                                  <a href=""><i class="fa fa-truck sidebar-nav-icon"></i>Report2</a>
                              </li>
                              <li>
                                  <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Report3</a>
                              </li>
                              <li>
                                  <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Report4</a>
                              </li>
                              <li>
                                  <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Report5</a>
                              </li>
                              <li class="sidebar-header">
                                  <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                                  <span class="sidebar-header-title">Utilities</span>
                              </li>
                              <li>
                                  <a href=""><i class="fa fa-files-o sidebar-nav-icon"></i>Utilities1</a>
                              </li>
                              <li>
                                  <a href=""><i class="fa fa-truck sidebar-nav-icon"></i>Utilities2</a>
                              </li>
                              <li>
                                  <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Utilities3</a>
                              </li>
                              <li>
                                  <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Utilities4</a>
                              </li>
                              <li>
                                  <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Utilities5</a>
                              </li>
                          </ul>
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
                    <!-- Dashboard Header -->
                    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
                    <div class="content-header content-header-media">
                        <div class="header-section">
                            <div class="row">
                                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                    <h1>Welcome <strong>Admin</strong><br><small>You Look Awesome!</small></h1>
                                </div>
                                <!-- END Main Title -->

                                <!-- Top Stats -->
                                <div class="col-md-8 col-lg-6">
                                    <div class="row text-center">
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                $<strong>93.7k</strong><br>
                                                <small><i class="fa fa-thumbs-o-up"></i> Great</small>
                                            </h2>
                                        </div>
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                <strong>167k</strong><br>
                                                <small><i class="fa fa-heart-o"></i> Likes</small>
                                            </h2>
                                        </div>
                                        <div class="col-xs-4 col-sm-3">
                                            <h2 class="animation-hatch">
                                                <strong>101</strong><br>
                                                <small><i class="fa fa-calendar-o"></i> Events</small>
                                            </h2>
                                        </div>
                                        <!-- We hide the last stat to fit the other 3 on small devices -->
                                        <div class="col-sm-3 hidden-xs">
                                            <h2 class="animation-hatch">
                                                <strong>27&deg; C</strong><br>
                                                <small><i class="fa fa-map-marker"></i> Sydney</small>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Top Stats -->
                            </div>
                        </div>
                        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                        <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                    </div>
                    <!-- END Dashboard Header -->

                    <!-- Mini Top Stats Row -->
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <a href="page_ready_article.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                        <i class="fa fa-file-text"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        New <strong>Article</strong><br>
                                        <small>Mountain Trip</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <a href="page_comp_charts.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                                        <i class="gi gi-usd"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        + <strong>250%</strong><br>
                                        <small>Sales Today</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <a href="page_ready_inbox.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                                        <i class="gi gi-envelope"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        5 <strong>Messages</strong>
                                        <small>Support Center</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <!-- Widget -->
                            <a href="page_comp_gallery.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                                        <i class="gi gi-picture"></i>
                                    </div>
                                    <h3 class="widget-content text-right animation-pullDown">
                                        +30 <strong>Photos</strong>
                                        <small>Gallery</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Widget -->
                            <a href="page_comp_charts.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                                        <i class="gi gi-wallet"></i>
                                    </div>
                                    <div class="pull-right">
                                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                        <span id="mini-chart-sales"></span>
                                    </div>
                                    <h3 class="widget-content animation-pullDown visible-lg">
                                        Latest <strong>Sales</strong>
                                        <small>Per hour</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                        <div class="col-sm-6">
                            <!-- Widget -->
                            <a href="page_widgets_stats.html" class="widget widget-hover-effect1">
                                <div class="widget-simple">
                                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                                        <i class="gi gi-crown"></i>
                                    </div>
                                    <div class="pull-right">
                                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                                        <span id="mini-chart-brand"></span>
                                    </div>
                                    <h3 class="widget-content animation-pullDown visible-lg">
                                        Our <strong>Brand</strong>
                                        <small>Popularity over time</small>
                                    </h3>
                                </div>
                            </a>
                            <!-- END Widget -->
                        </div>
                    </div>
                    <!-- END Mini Top Stats Row -->

                    <!-- Widgets Row -->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Timeline Widget -->
                            <div class="widget">
                                <div class="widget-extra themed-background-dark">
                                    <div class="widget-options">
                                        <div class="btn-group btn-group-xs">
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit Widget"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Quick Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                    </div>
                                    <h3 class="widget-content-light">
                                        Latest <strong>News</strong>
                                        <small><a href="page_ready_timeline.html"><strong>View all</strong></a></small>
                                    </h3>
                                </div>
                                <div class="widget-extra">
                                    <!-- Timeline Content -->
                                    <div class="timeline">
                                        <ul class="timeline-list">
                                            <li class="active">
                                                <div class="timeline-icon"><i class="gi gi-airplane"></i></div>
                                                <div class="timeline-time"><small>just now</small></div>
                                                <div class="timeline-content">
                                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Jordan Carter</strong></a></p>
                                                    <p class="push-bit">The trip was an amazing and a life changing experience!!</p>
                                                    <p class="push-bit"><a href="page_ready_article.html" class="btn btn-xs btn-primary"><i class="fa fa-file"></i> Read the article</a></p>
                                                    <div class="row push">
                                                        <div class="col-sm-6 col-md-4">
                                                            <a href="img/placeholders/photos/photo1.jpg" data-toggle="lightbox-image">
                                                                <img src="img/placeholders/photos/photo1.jpg" alt="image">
                                                            </a>
                                                        </div>
                                                        <div class="col-sm-6 col-md-4">
                                                            <a href="img/placeholders/photos/photo22.jpg" data-toggle="lightbox-image">
                                                                <img src="img/placeholders/photos/photo22.jpg" alt="image">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="active">
                                                <div class="timeline-icon themed-background-fire themed-border-fire"><i class="fa fa-file-text"></i></div>
                                                <div class="timeline-time"><small>5 min ago</small></div>
                                                <div class="timeline-content">
                                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Administrator</strong></a></p>
                                                    <strong>Free courses</strong> for all our customers at A1 Conference Room - 9:00 <strong>am</strong> tomorrow!
                                                </div>
                                            </li>
                                            <li class="active">
                                                <div class="timeline-icon"><i class="gi gi-drink"></i></div>
                                                <div class="timeline-time"><small>3 hours ago</small></div>
                                                <div class="timeline-content">
                                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Ella Winter</strong></a></p>
                                                    <p class="push-bit"><strong>Happy Hour!</strong> Free drinks at <a href="javascript:void(0)">Cafe-Bar</a> all day long!</p>
                                                    <div id="gmap-timeline" class="gmap"></div>
                                                </div>
                                            </li>
                                            <li class="active">
                                                <div class="timeline-icon"><i class="fa fa-cutlery"></i></div>
                                                <div class="timeline-time"><small>yesterday</small></div>
                                                <div class="timeline-content">
                                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Patricia Woods</strong></a></p>
                                                    <p class="push-bit">Today I had the lunch of my life! It was delicious!</p>
                                                    <div class="row push">
                                                        <div class="col-sm-6 col-md-4">
                                                            <a href="img/placeholders/photos/photo23.jpg" data-toggle="lightbox-image">
                                                                <img src="img/placeholders/photos/photo23.jpg" alt="image">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="active">
                                                <div class="timeline-icon themed-background-fire themed-border-fire"><i class="fa fa-smile-o"></i></div>
                                                <div class="timeline-time"><small>2 days ago</small></div>
                                                <div class="timeline-content">
                                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Administrator</strong></a></p>
                                                    To thank you all for your support we would like to let you know that you will receive free feature updates for life! You are awesome!
                                                </div>
                                            </li>
                                            <li class="active">
                                                <div class="timeline-icon"><i class="fa fa-pencil"></i></div>
                                                <div class="timeline-time"><small>1 week ago</small></div>
                                                <div class="timeline-content">
                                                    <p class="push-bit"><a href="page_ready_user_profile.html"><strong>Nicole Ward</strong></a></p>
                                                    <p class="push-bit">Consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate.</p>
                                                    Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum.
                                                </div>
                                            </li>
                                            <li class="text-center">
                                                <a href="javascript:void(0)" class="btn btn-xs btn-default">View more..</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END Timeline Content -->
                                </div>
                            </div>
                            <!-- END Timeline Widget -->
                        </div>
                        <div class="col-md-6">
                            <!-- Your Plan Widget -->
                            <div class="widget">
                                <div class="widget-extra themed-background-dark">
                                    <div class="widget-options">
                                        <div class="btn-group btn-group-xs">
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit Widget"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Quick Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                    </div>
                                    <h3 class="widget-content-light">
                                        Your <strong>VIP Plan</strong>
                                        <small><a href="page_ready_pricing_tables.html"><strong>Upgrade</strong></a></small>
                                    </h3>
                                </div>
                                <div class="widget-extra-full">
                                    <div class="row text-center">
                                        <div class="col-xs-6 col-lg-3">
                                            <h3>
                                                <strong>35</strong> <small>/50</small><br>
                                                <small><i class="fa fa-folder-open-o"></i> Projects</small>
                                            </h3>
                                        </div>
                                        <div class="col-xs-6 col-lg-3">
                                            <h3>
                                                <strong>25</strong> <small>/100GB</small><br>
                                                <small><i class="fa fa-hdd-o"></i> Storage</small>
                                            </h3>
                                        </div>
                                        <div class="col-xs-6 col-lg-3">
                                            <h3>
                                                <strong>65</strong> <small>/1k</small><br>
                                                <small><i class="fa fa-building-o"></i> Clients</small>
                                            </h3>
                                        </div>
                                        <div class="col-xs-6 col-lg-3">
                                            <h3>
                                                <strong>10</strong> <small>k</small><br>
                                                <small><i class="fa fa-envelope-o"></i> Emails</small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Your Plan Widget -->

                            <!-- Charts Widget -->
                            <div class="widget">
                                <div class="widget-advanced widget-advanced-alt">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-center themed-background">
                                        <h3 class="widget-content-light text-left pull-left animation-pullDown">
                                            <strong>Sales</strong> &amp; <strong>Earnings</strong><br>
                                            <small>Last Year</small>
                                        </h3>
                                        <!-- Flot Charts (initialized in js/pages/index.js), for more examples you can check out http://www.flotcharts.org/ -->
                                        <div id="dash-widget-chart" class="chart"></div>
                                    </div>
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main">
                                        <div class="row text-center">
                                            <div class="col-xs-4">
                                                <h3 class="animation-hatch"><strong>7.500</strong><br><small>Clients</small></h3>
                                            </div>
                                            <div class="col-xs-4">
                                                <h3 class="animation-hatch"><strong>10.970</strong><br><small>Sales</small></h3>
                                            </div>
                                            <div class="col-xs-4">
                                                <h3 class="animation-hatch">$<strong>31.230</strong><br><small>Earnings</small></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Widget Main -->
                                </div>
                            </div>
                            <!-- END Charts Widget -->

                            <!-- Weather Widget -->
                            <div class="widget">
                                <div class="widget-advanced widget-advanced-alt">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-left">
                                        <!-- For best results use an image with at least 150 pixels in height (with the width relative to how big your widget will be!) - Here I'm using a 1200x150 pixels image -->
                                        <img src="img/placeholders/headers/widget5_header.jpg" alt="background" class="widget-background animation-pulseSlow">
                                        <h3 class="widget-content widget-content-image widget-content-light clearfix">
                                            <span class="widget-icon pull-right">
                                                <i class="fa fa-sun-o animation-pulse"></i>
                                            </span>
                                            Weather <strong>Station</strong><br>
                                            <small><i class="fa fa-location-arrow"></i> The Mountain</small>
                                        </h3>
                                    </div>
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main">
                                        <div class="row text-center">
                                            <div class="col-xs-6 col-lg-3">
                                                <h3>
                                                    <strong>10&deg;</strong> <small>C</small><br>
                                                    <small>Sunny</small>
                                                </h3>
                                            </div>
                                            <div class="col-xs-6 col-lg-3">
                                                <h3>
                                                    <strong>80</strong> <small>%</small><br>
                                                    <small>Humidity</small>
                                                </h3>
                                            </div>
                                            <div class="col-xs-6 col-lg-3">
                                                <h3>
                                                    <strong>60</strong> <small>km/h</small><br>
                                                    <small>Wind</small>
                                                </h3>
                                            </div>
                                            <div class="col-xs-6 col-lg-3">
                                                <h3>
                                                    <strong>5</strong> <small>km</small><br>
                                                    <small>Visibility</small>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Widget Main -->
                                </div>
                            </div>
                            <!-- END Weather Widget-->

                            <!-- Advanced Gallery Widget -->
                            <div class="widget">
                                <div class="widget-advanced">
                                    <!-- Widget Header -->
                                    <div class="widget-header text-center themed-background-dark">
                                        <h3 class="widget-content-light clearfix">
                                            Awesome <strong>Gallery</strong><br>
                                            <small>4 Photos</small>
                                        </h3>
                                    </div>
                                    <!-- END Widget Header -->

                                    <!-- Widget Main -->
                                    <div class="widget-main">
                                        <a href="page_comp_gallery.html" class="widget-image-container">
                                            <span class="widget-icon themed-background"><i class="gi gi-picture"></i></span>
                                        </a>
                                        <div class="gallery gallery-widget" data-toggle="lightbox-gallery">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-3">
                                                    <a href="img/placeholders/photos/photo15.jpg" class="gallery-link" title="Image Info">
                                                        <img src="img/placeholders/photos/photo15.jpg" alt="image">
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 col-sm-3">
                                                    <a href="img/placeholders/photos/photo5.jpg" class="gallery-link" title="Image Info">
                                                        <img src="img/placeholders/photos/photo5.jpg" alt="image">
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 col-sm-3">
                                                    <a href="img/placeholders/photos/photo6.jpg" class="gallery-link" title="Image Info">
                                                        <img src="img/placeholders/photos/photo6.jpg" alt="image">
                                                    </a>
                                                </div>
                                                <div class="col-xs-6 col-sm-3">
                                                    <a href="img/placeholders/photos/photo13.jpg" class="gallery-link" title="Image Info">
                                                        <img src="img/placeholders/photos/photo13.jpg" alt="image">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Widget Main -->
                                </div>
                            </div>
                            <!-- END Advanced Gallery Widget -->
                        </div>
                    </div>
                    <!-- END Widgets Row -->
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
    @include('layouts.scripts.script')
    </body>
</html>