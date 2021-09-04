<header class="main-header">
    <!-- Logo -->
    <a href="/admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>&#8362; </b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Attendance</b> System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="user user-menu">
                
                    <a href="#profile" class="pull-left" data-toggle="modal"id="admin_profile" role="button">
                            {{ Auth::user()->name }}
                    </a>
                    <a href="{{ route('logout') }}" role="button" class="pull-right" onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();" role="button">
                    <i class="fa fa-power-off"></i>
                    </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                    </form>
                </li>
        </ul>
        </div>
    </nav>
</header>
