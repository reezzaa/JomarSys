<!-- Brand -->
<a href="<?php echo e(route('o.home')); ?>" class="sidebar-brand">
    <i class="gi gi-flash"></i><strong>JMSESMS</strong>
</a>
<!-- END Brand -->

<!-- User Info -->
<div class="sidebar-section sidebar-user clearfix">
    <div class="sidebar-user-avatar">
        <a href="javascript:void(0)">
            <img src="<?php echo e(asset('img/favicon.ico')); ?>" alt="avatar">
        </a>
    </div>
    <div class="sidebar-user-name"><input type="hidden" id="userid" value="<?php echo e(Auth::user()->id); ?>"><?php echo e(Auth::user()->fname); ?> <?php echo e(Auth::user()->mname); ?> <?php echo e(Auth::user()->lname); ?> <?php echo e(Auth::user()->suffix); ?></div>
    <div class="sidebar-user-links">
   
        <a href="javascript:void(0)" data-toggle="tooltip" title="Profile"><i class="gi gi-user"></i></a>
        <a href="<?php echo e(route('logout')); ?>" data-toggle="tooltip" title="Logout"><i class="gi gi-exit"></i></a>
    </div>
</div>
<!-- END User Info -->

<!-- Theme Colors -->

<!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
