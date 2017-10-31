<!DOCTYPE html>
<html>
    <?php echo $__env->make('layouts.headers.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <body>
        <img src="img/login_bg.png" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <div id="login-container" class="animation-fadeIn">
            <div class="login-title text-center">
                <h1><strong>JMSESMS</strong><br> <strong>Login</strong></h1>
            </div>

            <div class="block push-bit">
               <?php if(Session::has('flash_login_failed')): ?>
                  <script>
                  $(function(){
                    $.bootstrapGrowl('<h4>Invalid Credentials!</h4> <p>Failed to login</p>', {
                      type: 'danger',
                      delay: 3000,
                      allow_dismiss: true
                    });
                  });
                   </script>
                <?php elseif(Session::has('flash_logout_success')): ?>
                  <script>
                  $(function(){
                    $.bootstrapGrowl('<h4>Success!</h4> <p>Successfully logout</p>', {
                      type: 'success',
                      delay: 3000,
                      allow_dismiss: true
                    });
                  });
                   </script>
                <?php endif; ?>
                                
                <form action="<?php echo e(route('login')); ?>" method="POST" class="form-horizontal form-bordered form-control-borderless">
                <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="text" class="form-control input-lg" placeholder="Username" name="username" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" class="form-control input-lg" placeholder="Password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-4">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                <input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
                                <span></span>
                            </label>

                        </div>
                        <div class="col-xs-8 text-right">
                            <button class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i>  Login to Dashboard</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php echo $__env->make('layouts.scripts.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script src="js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
    </body>
</html>     