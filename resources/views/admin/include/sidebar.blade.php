<!--start sidebar-->
<aside class="sidebar-wrapper" data-simplebar="true">

    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ optional(general_settings())->getFirstMediaUrl('logo') ?? '' }}" class="logo-img" alt="">
        </div>
        {{-- <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Souvagya</h5>
        </div> --}}
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
            @canany(['Settings Show', 'Settings Edit'])
            <li>
                <a href="{{ route('settings.index') }}" class="">
                    <div class="parent-icon"><i class="material-icons-outlined">settings</i></div>
                    <div class="menu-title">Settings</div>
                </a>
            </li>
            @endcanany
            @canany(['Permission Show', 'Role Show'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">lock</i></div>
                    <div class="menu-title">Roles Permissions</div>
                </a>
                <ul>
                    @can('Role Show')
                    <li>
                        <a href="{{ route('roles') }}">
                            <i class="material-icons-outlined">arrow_right</i>Roles
                        </a>
                    </li>
                    @endcan
                    @can('Permission Show')
                    <li>
                        <a href="{{ route('permission') }}">
                            <i class="material-icons-outlined">arrow_right</i>Permission
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            @can('Employee Show')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">account_circle</i>
                    </div>
                    <div class="menu-title">Employees</div>
                </a>
                <ul>
                    @can('Employee Create')
                    <li>
                        <a href="{{ route('employee.add') }}">
                            <i class="material-icons-outlined">arrow_right</i>Add Employee
                        </a>
                    </li>
                    @endcan
                    @can('Employee Show')
                    <li>
                        <a href="{{ route('employee') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Employees
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('Astrologer Show')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">person</i>
                    </div>
                    <div class="menu-title">Astrologer</div>
                </a>
                <ul>
                    @can('Astrologer Create')
                    <li>
                        <a href="{{ route('astrologer.create') }}">
                            <i class="material-icons-outlined">arrow_right</i>Add Astrologer
                        </a>
                    </li>
                    @endcan
                    @can('Astrologer Show')
                    <li>
                        <a href="{{ route('astrologer.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Astrologers
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('Booking Show')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">event</i>
                    </div>
                    <div class="menu-title">Bookings</div>
                </a>
                <ul>
                    @can('Booking Create')
                    <li>
                        <a href="{{ route('bookings.create') }}">
                            <i class="material-icons-outlined">arrow_right</i>Make New Booking
                        </a>
                    </li>
                    @endcan
                    @can('Booking Show')
                    <li>
                        <a href="{{ route('booking.today-bookings') }}">
                            <i class="material-icons-outlined">arrow_right</i>Todays Bookings
                        </a>
                    </li>
                    @endcan
                    @can('Booking Show')
                    <li>
                        <a href="{{ route('booking.today-appointments') }}">
                            <i class="material-icons-outlined">arrow_right</i>Todays Appointments
                        </a>
                    </li>
                    @endcan
                    @can('Booking Show')
                    <li>
                        <a href="{{ route('bookings.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Bookings
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            @can('Attendance Show')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">calendar_today</i>
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
            @endcan

            @can('Enquiry Show')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">question_answer</i>
                    </div>
                    <div class="menu-title">Enquiry</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('enquirys.todays-enquiry') }}">
                            <i class="material-icons-outlined">arrow_right</i>Todays Enquiry
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('enquiry.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Enquiry
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @canany(['Service Show', 'Service Create'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">miscellaneous_services</i>
                    </div>
                    <div class="menu-title">Services</div>
                </a>
                <ul>
                    @can('Service Create')
                    <li>
                        <a href="{{ route('services.create') }}">
                            <i class="material-icons-outlined">arrow_right</i>Add Services
                        </a>
                    </li>
                    @endcan
                    @can('Service Show')
                    <li>
                        <a href="{{ route('services.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Services
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @can('Product Show')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">inventory_2</i>
                    </div>
                    <div class="menu-title">Products</div>
                </a>
                <ul>
                    @can('Category Show')
                    <li>
                        <a href="{{ route('category.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>Category
                        </a>
                    </li>
                    @endcan
                    <li>
                        <a href="{{ route('product.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>Products
                        </a>
                    </li>
                </ul>
            </li>
            @endcan

            @canany(['Magazine Show', 'Magazine Create'])
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">menu_book</i>
                    </div>
                    <div class="menu-title">Magazines</div>
                </a>
                <ul>
                    @can('Magazine Create')
                    <li>
                        <a href="{{ route('magazines.create') }}">
                            <i class="material-icons-outlined">arrow_right</i>Add Magazine
                        </a>
                    </li>
                    @endcan
                    @can('Magazine Show')
                    <li>
                        <a href="{{ route('magazines.index') }}">
                            <i class="material-icons-outlined">arrow_right</i>All Magazines
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcanany

            @can('Order Show')
            <li>
                <a href="{{ route('order.index') }}" class="">
                    <div class="parent-icon">
                        <i class="material-icons-outlined">shopping_bag</i>
                    </div>
                    <div class="menu-title">Orders</div>
                </a>
            </li>
            @endcan
        </ul>
        <!--end navigation-->
    </div>

</aside>
<!--end sidebar-->