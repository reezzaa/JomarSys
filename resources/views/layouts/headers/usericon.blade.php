<!-- Brand -->
<a href="{{ route('dashboard') }}" class="sidebar-brand">
    <i class="gi gi-flash"></i><strong>JMSESMS</strong>
</a>
<!-- END Brand -->

<!-- User Info -->
<div class="sidebar-section sidebar-user clearfix">
    <div class="sidebar-user-avatar">
        <a href="javascript:void(0)">
            <img src="{{asset('img/user/mechanic.png')}}" alt="avatar">
        </a>
    </div>
    <div class="sidebar-user-name">{{ Auth::user()->username }}</div>
    <div class="sidebar-user-links">
   
        <a href="javascript:void(0)" data-toggle="tooltip" title="Profile"><i class="gi gi-user"></i></a>
        <a href="{{ route('logout') }}" data-toggle="tooltip" title="Logout"><i class="gi gi-exit"></i></a>
    </div>
</div>
<!-- END User Info -->

<!-- Theme Colors -->
<!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
 <ul class="sidebar-section sidebar-themes clearfix">
  <li class="active">
      <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="{{asset('css/themes/blue.css')}}" data-toggle="tooltip" title="Blue"></a>
  </li>
  <li>
      <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="{{asset('css/themes/night.css')}}" data-toggle="tooltip" title="Night"></a>
  </li>
  <li>
      <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="{{asset('css/themes/amethyst.css')}}" data-toggle="tooltip" title="Amethyst"></a>
  </li>
  <li>
      <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="{{asset('css/themes/modern.css')}}" data-toggle="tooltip" title="Modern"></a>
  </li>
  <li>
      <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="{{asset('css/themes/autumn.css')}}" data-toggle="tooltip" title="Autumn"></a>
  </li>
  <li>
      <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="{{asset('css/themes/flatie.css')}}" data-toggle="tooltip" title="Flatie"></a>
  </li>
  <li>
      <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="{{asset('css/themes/spring.css')}}" data-toggle="tooltip" title="Spring"></a>
  </li>
  <li>
      <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="{{asset('css/themes/fancy.css')}}" data-toggle="tooltip" title="Fancy"></a>
  </li>
  <li>
      <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="{{asset('css/themes/fire.css')}}" data-toggle="tooltip" title="Fire"></a>
  </li>
</ul>
<!-- END Theme Colors -->