<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <title>
      @yield('title', 'Jomar Machine Shop and Engineering Services Management System (JMSESMS)')
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link id="theme-link" rel="stylesheet" href="{{asset('css/themes/spring.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes.css')}}">

    <script src="{{asset('js/vendor/modernizr.min.js')}}"></script>
    <script src="{{asset('dist/sweetalert.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('dist/sweetalert.css')}}">
   
    <script src="{{asset('js/vendor/jquery-latest.min.js')}}"></script>
    <script src="{{asset('js/vendor/jquery.alphanum.js')}}"></script>
    <script src="{{asset('js/vendor/jquery.mask.min.js')}}"></script>
    @yield('head')
  </head>
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
                                      <img src="{{asset('img/placeholders/avatars/avatar12.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-online">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar15.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-online">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar10.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-online">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar4.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-away">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar7.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-away">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar9.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)" class="chat-user-busy">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar16.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar1.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar4.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar3.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar13.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                              <li>
                                  <a href="javascript:void(0)">
                                      <span></span>
                                      <img src="{{asset('img/placeholders/avatars/avatar5.jpg')}}" alt="avatar" class="img-circle">
                                  </a>
                              </li>
                          </ul>
                          <!-- END Chat Users -->

                          <!-- Chat Talk -->
                          <div class="chat-talk display-none">
                              <!-- Chat Info -->
                              <div class="chat-talk-info sidebar-section">
                                  <img src="{{asset('img/placeholders/avatars/avatar5.jpg')}}" alt="avatar" class="img-circle pull-left">
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
              @yield('sidebar')
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
                    @yield('content')
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
  <a class="float" href="/admin/addworker" data-toggle="tooltip" data-placement="left" title="Add Specialization">
    <i class="fa fa-plus my-float"></i>
  </a>
    @yield('script')
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/pages/formsValidation.js') }}"></script>
    <script src="{{ asset('js/pages/formsWizard.js') }}"></script>
    <script src="{{ asset('js/pages/tablesDatatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    </body>
</html>