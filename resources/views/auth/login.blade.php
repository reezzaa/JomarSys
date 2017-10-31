<!DOCTYPE html>
<html>
    @include('layouts.headers.head')
    <body>
        <img src="img/login_bg.png" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <div id="login-container" class="animation-fadeIn">
            <div class="login-title text-center">
                <h1><strong>JMSESMS</strong><br> <strong>Login</strong></h1>
            </div>

            <div class="block push-bit">
               @if(Session::has('flash_login_failed'))
                  <script>
                  $(function(){
                    $.bootstrapGrowl('<h4>Invalid Credentials!</h4> <p>Failed to login</p>', {
                      type: 'danger',
                      delay: 3000,
                      allow_dismiss: true
                    });
                  });
                   </script>
                @elseif(Session::has('flash_logout_success'))
                  <script>
                  $(function(){
                    $.bootstrapGrowl('<h4>Success!</h4> <p>Successfully logout</p>', {
                      type: 'success',
                      delay: 3000,
                      allow_dismiss: true
                    });
                  });
                   </script>
                @endif
                                
                <form action="{{ route('login') }}" method="POST" class="form-horizontal form-bordered form-control-borderless">
                {{ csrf_field() }}
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

        @include('layouts.scripts.script')
        <script src="js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
    </body>
</html>     