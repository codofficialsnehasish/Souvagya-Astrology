<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">

    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ asset('dashboard_asset/assets/images/logo-icon.png') }}" class="logo-img" alt="">
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Souvagya</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>

    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{ route('dashboard') }}" class="">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">lock</i></div>
                    <div class="menu-title">Roles Permissions</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('roles') }}">
                            <i class="material-icons-outlined">arrow_right</i>Roles
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('permission') }}">
                            <i class="material-icons-outlined">arrow_right</i>Permission
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">account_circle</i>
                    </div>
                    <div class="menu-title">Employees</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('employee.add') }}">
                            <i class="material-icons-outlined">arrow_right</i>Add Employee
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('employee') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Employees
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">person</i>
                    </div>
                    <div class="menu-title">Astrologer</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('astrologer.create') }}">
                            <i class="material-icons-outlined">arrow_right</i>Add Astrologer
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('astrologer.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Astrologers
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">event</i>
                    </div>
                    <div class="menu-title">Bookings</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('bookings.create') }}">
                            <i class="material-icons-outlined">arrow_right</i>Make New Booking
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('booking.today-bookings') }}">
                            <i class="material-icons-outlined">arrow_right</i>Todays Bookings
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('booking.today-appointments') }}">
                            <i class="material-icons-outlined">arrow_right</i>Todays Appointments
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bookings.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Bookings
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">event</i>
                    </div>
                    <div class="menu-title">Attendance</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('attendance.todays-attendance') }}">
                            <i class="material-icons-outlined">arrow_right</i>Todays Atendance
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('attendance') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Attendance
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--end navigation-->
    </div>

</aside>
<!--end sidebar-->