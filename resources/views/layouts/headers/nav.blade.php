<header class="navbar navbar-inverse">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
             <div class="col-sm-4">
                <ul class="nav navbar-nav-custom">
                    <li>
                        <a href="" data-placement="bottom"><img src="img/header/homex32.png">  JMSESMS </a>
                    </li>
                    <li>
                        <a href="#modal-user-settings" data-toggle="modal"><img src="img/header/accountx32.png">  Account</a>
                    </li>
                    <li >
                        <a href="##" class="dropdown-toggle"><img src="img/header/maintenancex32.png">  Maintenance</a>
                    </li>
                     <li class="navbar-right" >
                        <a href="{{ route('/logout') }}"> Logout</a>
                    </li>
                </ul>  
            </div>
            <div class="col-sm-4">
            </div>
        </div>
       
      

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
