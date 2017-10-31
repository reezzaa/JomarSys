<div class="container">
    <div class="row" >
        <div class="col-lg-1"></div>
        <div class="col-lg-2">
            <ul class="nav navbar-nav-custom">
                <li>
                    <a href="{{ route('dashboard') }}">
                       <span class="hi hi-tasks"></span>  Dashboard
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-2">
                <ul class="nav navbar-nav-custom">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-gears"></span>  Maintenance  <i class="fa fa-angle-down"> </i></a>
                        <ul class="dropdown-menu">
                            <!-- <li>
                                <a href="{{ route('serviceOff.index') }}" tabindex="-1">
                                    <span class="fa fa-files-o"> </span>  Services Offered
                                </a>
                            </li> -->
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <span class="gi gi-group"> </span>  Worker
                                    <span class="fa fa-angle-right pull-right"> </span> 
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('specialization.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Worker Specialization
                                        </a>
                                    </li>
                                     <li>
                                        <a href="{{ route('worker.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Worker
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <span class="fa fa-cubes"> </span>  Material
                                    <span class="fa fa-angle-right pull-right"> </span> 
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('materialclass.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Material Classification
                                        </a>
                                    </li>
                                     <li>
                                        <a href="{{ route('material.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Material 
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <span class="gi gi-blacksmith"> </span>  Equipment
                                    <span class="fa fa-angle-right pull-right"> </span> 
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('equiptype.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Equipment Type
                                        </a>
                                    </li>
                                     <li>
                                        <a href="{{ route('equipment.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Equipment 
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('deliverytruck.index') }}" tabindex="-1">
                                    <span class="fa fa-truck"> </span>  Delivery Trucks
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('mclient.index') }}" tabindex="-1">
                                    <span class="gi gi-parents"> </span>  Client
                                </a>
                            </li>
                         </ul>
                    </li>
                </ul>
        </div>
        <div class="col-lg-2">
                <ul class="nav navbar-nav-custom">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-gears"></span>  Transaction  <i class="fa fa-angle-down"> </i></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('client.index') }}" tabindex="-1">
                                    <span class="gi gi-parents"> </span>  Client Registration
                                </a>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <span class="gi gi-pen"> </span>  Contract
                                    <span class="fa fa-angle-right pull-right"> </span> 
                                </a>
                                <ul class="dropdown-menu">
                                     <li>
                                        <a href="{{ route('contractadd.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Add Contract
                                        </a>
                                    </li>
                                     <li>
                                        <a href="{{ route('contractlist.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Contracts 
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <span class="gi gi-notes_2"> </span>  Project
                                    <span class="fa fa-angle-right pull-right"> </span> 
                                </a>
                                <ul class="dropdown-menu">
                                     <li>
                                        <a href="{{ route('projectadd.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Add Project
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('projectlist.index') }}" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Project List
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <span class="gi gi-blacksmith"> </span>  Billing & Collection
                                    <span class="fa fa-angle-right pull-right"> </span> 
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/billing" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Billing
                                        </a>
                                    </li>
                                     <li>
                                        <a href="/billingdetail" tabindex="-1">
                                        <span class="fa fa-cog"> </span> Billing Detail
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/payment" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Payment
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0)" tabindex="-1">
                                    <span class="gi gi-blacksmith"> </span>  Progress
                                    <span class="fa fa-angle-right pull-right"> </span> 
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/progressdetails" tabindex="-1">
                                        <span class="fa fa-cog"> </span>  Progress Details
                                        </a>
                                    </li>
                                     <li>
                                        <a href="/progressmonitoring" tabindex="-1">
                                        <span class="fa fa-cog"> </span> Progress Monitoring
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        <div class="col-lg-2">
            <ul class="nav navbar-nav-custom">
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><span class="gi gi-database_plus"></span>  Reports  <i class="fa fa-angle-down"> </i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('rclient.index') }}" tabindex="-1">
                                <span class="gi gi-parents"> </span>  Client
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-lg-2">
            <ul class="nav navbar-nav-custom">
                <li>
                    <a href="">
                       <span class="fa fa-check-square"></span>  Utilities
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-1"></div>
    </div>
</div>