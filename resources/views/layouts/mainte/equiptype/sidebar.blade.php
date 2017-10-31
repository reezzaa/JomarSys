<ul class="sidebar-nav">
    <li>
        <a href="{{ route('dashboard') }}"><i class="gi gi-display sidebar-nav-icon"></i>Dashboard</a>
    </li>
    <li>
        <a href="{{ route('utilities.index') }}"><i class="fa fa-cogs sidebar-nav-icon"></i>Utilities</a>
    </li>
    <li class="active">
        <a href="#" class="sidebar-nav-menu active"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
        <i class="gi gi-adjust_alt sidebar-nav-icon"></i>Maintenance</a>
        <ul>
            <li>
                <a href="{{ route('serviceOff.index') }}"><i class="gi gi-hand_saw sidebar-nav-icon"></i>Services Offered</a>
            </li>
            <li>
                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                <i class="gi gi-group sidebar-nav-icon"></i>Worker</a>
                <ul>
                    <li>
                        <a href="{{ route('specialization.index')}}">Worker Specialization</a>
                    </li>
                    <li>
                        <a href="{{ route('worker.index') }}">Worker</a>
                    </li>
                </ul>
            </li>
            <li>
              <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
              <i class="fa fa-tachometer sidebar-nav-icon"></i>Unit of Measurement</a>
              <ul>
                  <li>
                      <a href="{{ route('groupuomeasure.index')}}">Based UOM</a>
                  </li>
                  <li>
                      <a href="{{ route('detailuomeasure.index')}}">Detail UOM</a>
                  </li>
              </ul>
            </li>
            <li>
                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                <i class="fa fa-cubes sidebar-nav-icon"></i>Material</a>
                <ul>
                    <li>
                        <a href="{{ route('materialtype.index') }}">Material Type</a>
                    </li>
                    <li>
                        <a href="{{ route('materialclass.index') }}">Material Classification</a>
                    </li>
                    <li>
                        <a href="{{ route('material.index') }}">Material</a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#" class="sidebar-nav-submenu active"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                <i class="gi gi-blacksmith sidebar-nav-icon"></i>Equipment</a>
                <ul>
                    <li>
                        <a href="{{ route('equiptype.index') }}" class="active">Equipment Type</a>
                    </li>
                    <li>
                        <a href="{{ route('equipment.index') }}">Equipment</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('deliverytruck.index') }}"><i class="fa fa-truck sidebar-nav-icon"></i>Delivery Truck</a>
            </li>
        </ul>
    </li>
    <li  >
        <a class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
        <i class="gi gi-notes sidebar-nav-icon"></i>Transactions</a>
        <ul>
            <li>
                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                <i class="gi gi-user sidebar-nav-icon"></i>Client</a>
                <ul>
                    <li>
                        <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Add Client</a>
                        <ul>
                            <li>
                                <a href="{{ route('newindclient.create') }}">Individual Client</a>
                            </li>
                            <li>
                                <a href="{{ route('newcompclient.create') }}">Company Client</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="sidebar-nav-submenu "><i class="fa fa-angle-left sidebar-nav-indicator"></i>Client List</a>
                        <ul>
                            <li>
                                <a href="{{ route('newindclient.index') }}" >Individual Client</a>
                            </li>
                            <li>
                                <a href="{{ route('newcompclient.index') }}">Company Client</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                <i class="gi gi-notes_2 sidebar-nav-icon"></i>Quote</a>
                <ul>
                    <li>
                        <a href="/quote">Add Quote</a>
                    </li>
                    <li>
                        <a href="/quotelist">Quote List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="sidebar-nav-submenu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
                <i class="gi gi-notes_2 sidebar-nav-icon"></i>Contract</a>
                <ul>
                    <li>
                        <a href="/contractadd" >Add Contract</a>
                    </li>
                    <li>
                        <a href="/contractlist">Contract List</a>
                    </li>
                </ul>
            </li>
             <li>
                <a class="sidebar-nav-submenu" href="{{ route('billing.index')}}"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-tags sidebar-nav-icon"></i>Billing and Collection</a>
                <ul>
                    <li>
                        <a href="{{ route('individualbilling.index')}}"> Individual Client</a>
                    </li>
                    <li>
                        <a  href="{{ route('billing.index')}}"> Company Client</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('stockadjustment.index')}}">
                <i class="fa fa-cubes sidebar-nav-icon"></i>Stock Adjustment</a>
            </li>
            <li>
                <a href="{{ route('progressmonitoring.index')}}" ">
                <i class="fa fa-signal sidebar-nav-icon"></i>Progress Monitoring</a>
            </li>
            <li>
                <a href="{{ route('delivery.index')}}">
                <i class="gi gi-cargo sidebar-nav-icon"></i>Delivery</a>
            </li>
        </ul>
    </li>
    <li >
        <a class="sidebar-nav-menu "><i class="fa fa-angle-left sidebar-nav-indicator"></i>
        <i class="gi gi-search sidebar-nav-icon"></i>Queries</a>
        <ul>
            <li>
                <a  href="{{ route('clientqueries.index')}}" >
                <i class="gi gi-group sidebar-nav-icon"></i> Clients</a>
            </li>
            <li>
                <a><i class="gi gi-group sidebar-nav-icon"></i> Materials</a>
            </li>
            <li>
                <a><i class="gi gi-group sidebar-nav-icon"></i> Workers</a>
            </li>
            <li>
                <a><i class="gi gi-group sidebar-nav-icon"></i> Projects</a>
            </li>
            <li>
                <a><i class="gi gi-group sidebar-nav-icon"></i> Invoices</a>
            </li>
            <li>
                <a><i class="gi gi-group sidebar-nav-icon"></i> Delivery</a>
            </li>
        </ul>
    </li>   
    <li>
        <a class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
        <i class="gi gi-pie_chart sidebar-nav-icon"></i>Reports</a>
        <ul>
            <li>
                <a><i class="fa fa-files-o sidebar-nav-icon"></i>Report1</a>
            </li>
            <li>
                <a><i class="fa fa-truck sidebar-nav-icon"></i>Report2</a>
            </li>
        </ul>
    </li>
</ul>