<!DOCTYPE html>
<html>
    <?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <body>
        <?php echo Html::image("img/login_bg.png"); ?>


        <!-- <img src="img/login_bg.png" alt="Login Full Background" class="full-bg animation-pulseSlow"> -->
        <div id="login-container" class="animation-fadeIn">
            <div class="login-title text-center">
                <h1> <strong>JMSESMS</strong><br><br> <strong>Login as PROJECT MANAGER</strong></h1>
                
              <form class="form-horizontal form-borderless" method="POST" id="form-login" action="<?php echo e(route('pm.login.submit')); ?>">
                        <?php echo e(csrf_field()); ?>


                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input id="email" type="email" class="form-control input-lg" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <!-- <label for="password" class="col-md-4 control-label">Password</label> -->
                         <div class="col-xs-12">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input id="password" type="password" class="form-control input-lg" placeholder="Password" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <div class="col-xs-4 checkbox">
                                    <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <span></span>
                                    </label>

                                </div>
                                 <div class="col-xs-8">
                                     <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>
                                </div>
                                <!-- <div class="checkbox">

                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div> -->
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>

                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div> -->
                    </form>
            </div>
        </div>

    </body>
</html>     