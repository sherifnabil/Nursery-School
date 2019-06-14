<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ is_active('dashboard') }}">
                <a href="{{ route('home') }}">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>
            <li class="{{ is_active('students') }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Students</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('students.create') }}"><i class="fa fa-plus"></i> Add</a></li>
                    <li><a href="{{ route('students.index') }}"><i class="fa fa-users"></i>All Students </a></li>
                    <li><a href="{{ route('students.new') }}"><i class="ion ion-person-add"></i>New Students </a></li>
                    <li><a href="{{ route('students.index', ['status' => 'pending   ']) }}"><i class="fa fa-users"></i>Pending Students </a></li>
                    <li><a href="{{ route('students.index', ['status' => 'accepted']) }}"><i class="fa fa-users"></i>Accepted Students </a></li>
                    <li><a href="{{ route('students.index', ['status' => 'refused']) }}"><i class="fa fa-users"></i>Refused Students </a></li>
                    <li><a href="{{ route('students.graduated') }}"><i class="fa fa-users"></i>Graduated Students </a></li>
            
            </li>
                </ul>
            </li>


            <li class="{{ is_active('classrooms') }}">
                <a href="{{ route('classrooms.index') }}">
                    <i class="fa fa-th"></i> <span>Classrooms</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>



        </ul>
    </section>
    <!-- /.sidebar -->
</aside>