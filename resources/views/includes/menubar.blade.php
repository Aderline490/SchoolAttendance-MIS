<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/male6.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name }} </p>
                <a><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">STATISTICS</li>

            <li class=""><a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

            <li class="header">MANAGE</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Students</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/students"><i class="fa fa-circle-o"></i>Students List</a></li>
                    <li><a href="/sattendance"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
                    <li><a href="/sleave"><i class="fa fa-calendar"></i> <span>On Leave</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Teachers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/teachers"><i class="fa fa-circle-o"></i> Teachers List</a></li>
                    <li><a href="/tattendance"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>