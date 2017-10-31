<!DOCTYPE html>
<html>
    @include('layouts.headers.head')
    <body>
        <div id="page-container">
            <div id="main-container">
                
                <header class="navbar navbar-inverse">
                    <div class="container">
                        <ul class="nav navbar-nav-custom">
                            <li>
                                <a href="" data-placement="bottom"><img src="img/header/homex32.png">  JMSESMS </a>
                            </li>
                            <li>
                                <a href="#modal-user-settings" data-toggle="modal"><img src="img/header/accountx32.png">  Account</a>
                            </li>
                            <!-- <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><img src="img/header/maintenancex32.png">Maintenance<i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>   
                                    <li class="dropdown-submenu">
                                        <a href="javascript:void(0)" tabindex="-1"><img src="img/header/next.png" class="pull-right">Employee</a>
                                        <ul class="dropdown-menu">
                                            <li class="divider"></li>
                                            <li>
                                                <a href="page_mainte_empspec.php"> Specialization<img src="img/header/specialization.png" class="pull-left"></a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="page_mainte_employee.php"  tabindex="-1"> Employee List<img src="img/header/helmet.png" class="pull-left"></a>
                                            </li>
                                            <li class="divider"></li>
                                        </ul>
                                    </li>
                                    <li class="divider"></li>   
                                    <li class="dropdown-submenu">
                                        <a href="javascript:void(0)" tabindex="-1"><img src="img/header/next.png" class="pull-right">Equipment</a>
                                        <ul class="dropdown-menu">
                                            <li class="divider"></li>
                                            <li>
                                                <a href="page_mainte_equiptype.php">
                                                <img src="img/header/driller.png" class="pull-left"> Equipment Type</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="page_mainte_equip.php">
                                                <img src="img/header/driller.png" class="pull-left"> Equipment List</a>
                                            </li>
                                            <li class="divider"></li>
                                        </ul>
                                    </li>
                                    <li class="divider"></li>   
                                    <li class="dropdown-submenu">
                                        <a href="javascript:void(0)" tabindex="-1"><img src="img/header/next.png" class="pull-right"> Material</a>
                                        <ul class="dropdown-menu">
                                                <li class="divider"></li>
                                                <li>
                                                <a href="page_mainte_materialcat.php">
                                                <img src="img/header/bricks.png" class="pull-left">  Material Category</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="page_mainte_material.php">
                                                <img src="img/header/bricks.png" class="pull-left">  Material List</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="page_mainte_truck.php"><img src="img/header/truck.png" class="pull-left">  Delivery Truck</a>
                                    </li>
                                    <li class="divider"></li>
                                </ul>
                            </li> -->
                            <li class="text-right" >
                                <a class="text-right" href="{{ route('logout') }}"> Logout</a>
                            </li>
                        </ul>  

                        <div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
                                    </div>

                                    <div class="modal-body">
                                        <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;" >
                                            <fieldset>
                                                <legend>User Information</legend>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label">Username</label>
                                                    <div class="col-md-8">
                                                        <p class="form-control-static">ADMIN</p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                                                    <div class="col-md-8">
                                                        <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="admin@example.com">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="user-settings-contact">Contact Number</label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="user-settings-contact" name="user-settings-contact" class="form-control" value="09191991919">
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <fieldset>
                                                <legend>Password Update</legend>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please choose a complex one..">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="..and confirm it!">
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="form-group form-actions">
                                                <div class="col-xs-12 text-right">
                                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <div id="page-content" style="background-color: #464646"> 
                    <div class="content-header">
                        <div class="header-section">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1>Welcome to <strong>Maintenance</strong><br><small>Good to see you again!</small></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="block" style="background-color: #577162">
                            <div class="block-title">
                                <h1>JMSESMS MAINTENANCE</h1>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{ route('specialization') }}" class="widget widget-hover-effect1">
                                        <div class="widget-simple">
                                            <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                                <i class="hi hi-briefcase"></i>
                                            </div>
                                            <h3 class="widget-content text-right animation-hatch">
                                                <strong>EMPLOYEE SPECIALIZATION</strong><br>
                                                <small>Manage Specialization</small>
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ route('employee') }}" class="widget widget-hover-effect1">
                                        <div class="widget-simple">
                                            <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <h3 class="widget-content text-right animation-hatch">
                                                <strong>EMPLOYEE LIST</strong><br>
                                                <small>Manage Employee</small>
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-sm-6">
                                    <a href="{{ route('equiptype') }}" class="widget widget-hover-effect1">
                                        <div class="widget-simple">
                                            <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                                <i class="gi gi-cargo"></i>
                                            </div>
                                            <h3 class="widget-content animation-hatch text-right">
                                                <strong>EQUIPMENT TYPE</strong><br>
                                                <small>Manage Equipment Types</small>
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ route('equipment') }}" class="widget widget-hover-effect1">
                                        <div class="widget-simple">
                                            <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                                <i class="fa fa-folder-open-o"></i>
                                            </div>
                                            <h3 class="widget-content animation-hatch text-right">
                                                <strong>EQUIPMENT LIST</strong><br>
                                                <small>Manage Equipment Lists</small>
                                            </h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>  
        </div>

        <script src="js/vendor/jquery-1.11.1.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>