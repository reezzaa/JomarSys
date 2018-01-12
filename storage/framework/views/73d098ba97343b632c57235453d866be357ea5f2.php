<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jomar Machine Shop & Engineering Services Management System</title>
        <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.ico')); ?>">


        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('img/login_bg.png');
                background-color: #fff;
               color: white;
                font-family: 'Candara', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 70px;
                 color: white;
                text-shadow: 5px 5px 4px black;
            }
            
            .lit-links 
            {
                color: white;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;

                /*text-transform: uppercase;*/
            }
             .links{

                color: white;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;

            }
            #this{
                background-color: #E0E0E0;
                border-radius: 2%;
                /*margin: 0 20% 0 20% ;*/
                background: rgba(76, 76, 76, 0.7);
                

            }
            

            .m-b-md {
                margin-bottom: 30px;
            }

            #compimage{
                display: block;
                margin: auto;
                width: 20%;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            

            <div class="content" id="this">
               
                <div class="title m-b-md">
                    <div class="row">
                        <div class="col-md-3">
                             <img src="img/favicon.ico" id="compimage">
                        </div>
                        <div class="col-md-9">
                            Jomar Machine Shop & Engineering Services Management System
                        </div>
                    </div>
                </div>

                <div>
                    <?php if(Route::has('login')): ?>
               
                    <?php if(Auth::check()): ?>
                        <a  class="links" href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                    <br>
                        <a class="links">Login as</a>
                        <!-- <a href="<?php echo e(url('/register')); ?>" class="links">egRister</a> -->
                        <br><br>
                        <a href="<?php echo e(url('/pm/login')); ?>" class="lit-links" >Project Manager</a>|
                        <a href="<?php echo e(url('/bd/login')); ?>" class="lit-links">Budget Department</a>|
                        <a href="<?php echo e(url('/o/login')); ?>" class="lit-links">Operations</a><br>
                    <?php endif; ?>
            <?php endif; ?>
            <br><br>
                </div>
            </div>
        </div>
    </body>
</html>
