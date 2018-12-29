<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background: #0F78B1">
    <a class="navbar-brand" href="{{route('home')}}">ADS</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link {{request()->is('dashboard') ? 'active-link': ''}}" href="{{route('home')}}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                <li class="nav-item" data-toggle="tooltip" data-placement="right" >
                    <a class="nav-link nav-link-collapse collapsed {{ request()->is('dashboard/course-management/assign-subject') ? 'active-link': request()->is('dashboard/course-management/assign-exam') ? 'active-link' : ''}}"
                       data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-book"></i>
                        <span class="nav-link-text">Course Management</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                        <li>
                            <a href="{{route('subject.view')}}" class="{{ request()->is('dashboard/course-management/assign-subject') ? 'active-link' : ''}}">Assign Subject</a>
                        </li>
                        <li>
                            <a href="{{route('exam.view')}}" class="{{ request()->is('dashboard/course-management/assign-exam') ? 'active-link' : ''}}">Assign Exam</a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link {{request()->is('dashboard/user-management') ? 'active-link' : ''}}" href="{{route('user.view')}}">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">User Management</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" >
                    <a class="nav-link {{ request()->is('dashboard/take-attendance') ? 'active-link': request()->is('dashboard/take-attendance/*') ? 'active-link' : ''}}" href="{{route('take.attendance.view')}}">
                        <i class="fa fa-fw fa-pencil-square-o"></i>
                        <span class="nav-link-text">Take Exam Attendance</span>
                    </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link {{request()->is('dashboard/logfile') ? 'active-link' : ''}}" href="{{route('log.view')}}">
                        <i class="fa fa-fw fa-archive"></i>
                        <span class="nav-link-text">Log File</span>
                    </a>
                </li>
            @endif

            @if(Auth::user()->hasRole('student'))
                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link {{request()->is('dashboard/view-attendance') ? 'active-link' : ''}}" href="{{route('view.attendance.view')}}">
                        <i class="fa fa-fw fa-calendar-check-o"></i>
                        <span class="nav-link-text">View Attendance</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right">
                    <a class="nav-link {{request()->is('dashboard/view-exams') ? 'active-link' : ''}}" href="{{route('view.exams.view')}}">
                        <i class="fa fa-fw fa-file"></i>
                        <span class="nav-link-text">View Exams</span>
                    </a>
                </li>
            @endif

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item" data-placement="center">
                <div class="dropdown show">
                    <a class="nav-link dropdown-toggle" id="dropdownMenuLink" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-user"></i>
                        <span class="nav-link-text">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Upload Picture</a>
                    </div>
                </div>
            </li>

            @if(Auth::user()->hasRole('student'))
                <li class="nav-item" data-placement="center">
                        <a class="nav-link" id="dropdownMenuLink" href="#" style="cursor: context-menu">
                            <span class="nav-link-text">{{\Illuminate\Support\Facades\Auth::user()->intake}}</span>
                        </a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-sign-out"></i>Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>