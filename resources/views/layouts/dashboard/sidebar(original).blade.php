<ul class="sidebar-nav">
    <li class="active">
        <a href="{{ route('dashboard') }}" class="active"><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
    </li>
    <li class="sidebar-header">
        <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
        <span class="sidebar-header-title">Maintenance</span>
    </li>

    <li>
        <a href="{{ route('serviceOff.index') }}"><i class="gi gi-hand_saw sidebar-nav-icon"></i>Services Offered</a>
    </li>
    <li>
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
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
      <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
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
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
        <i class="fa fa-cubes sidebar-nav-icon"></i>Material</a>
        <ul>
            <li>
                <a href="{{ route('materialclass.index') }}">Material Classification</a>
            </li>
            <li>
                <a href="{{ route('materialcat.index') }}">Material Category</a>
            </li>
            <li>
                <a href="{{ route('material.index') }}">Material</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
        <i class="gi gi-blacksmith sidebar-nav-icon"></i>Equipment</a>
        <ul>
            <li>
                <a href="{{ route('equiptype.index') }}">Equipment Type</a>
            </li>
            <li>
                <a href="{{ route('equipment.index') }}">Equipment</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{ route('deliverytruck.index') }}"><i class="fa fa-truck sidebar-nav-icon"></i>Delivery Truck</a>
    </li>
    <li>
        <a href="{{ route('discount.index') }}"><i class="hi hi-heart-empty sidebar-nav-icon"></i>Discount</a>
    </li>
    <li class="sidebar-header">
        <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
        <span class="sidebar-header-title">Transaction</span>
    </li>
    <li>
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
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
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
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
        <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator"></i>
        <i class="gi gi-notes_2 sidebar-nav-icon"></i>Contract</a>
        <ul>
            <li>
                <a href="/contractadd">Add Contract</a>
            </li>
            <li>
                <a href="/contractlist">Contract List</a>
            </li>
        </ul>
    </li>
    <li>
        <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Transaction3</a>
    </li>
    <li>
        <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Transaction4</a>
    </li>
    <li>
        <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Transaction5</a>
    </li>
    <li class="sidebar-header">
        <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
        <span class="sidebar-header-title">Report</span>
    </li>
    <li>
        <a href=""><i class="fa fa-files-o sidebar-nav-icon"></i>Report1</a>
    </li>
    <li>
        <a href=""><i class="fa fa-truck sidebar-nav-icon"></i>Report2</a>
    </li>
    <li>
        <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Report3</a>
    </li>
    <li>
        <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Report4</a>
    </li>
    <li>
        <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Report5</a>
    </li>
    <li class="sidebar-header">
        <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
        <span class="sidebar-header-title">Utilities</span>
    </li>
    <li>
        <a href=""><i class="fa fa-files-o sidebar-nav-icon"></i>Utilities1</a>
    </li>
    <li>
        <a href=""><i class="fa fa-truck sidebar-nav-icon"></i>Utilities2</a>
    </li>
    <li>
        <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Utilities3</a>
    </li>
    <li>
        <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Utilities4</a>
    </li>
    <li>
        <a href=""><i class="gi gi-parents sidebar-nav-icon"></i>Utilities5</a>
    </li>
</ul>