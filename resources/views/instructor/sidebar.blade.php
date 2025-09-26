

@php
    $auth_user = Auth::guard('web')->user();
@endphp
<!-- Main Menu -->
<div class="admin-menu__one crancy-sidebar-padding mg-top-20">
    <!-- Nav Menu -->
    <div class="menu-bar">
        <ul id="CrancyMenu" class="menu-bar__one crancy-dashboard-menu">

            <li class="{{ Route::is('instructor.dashboard') ? 'active' : '' }}"><a class="collapsed" href="{{ route('instructor.dashboard') }}"><span class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">

                    <svg class="crancy-svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.02 2.84L3.63 7.04C2.73 7.74 2 9.23 2 10.36V17.77C2 20.09 3.89 21.99 6.21 21.99H17.79C20.11 21.99 22 20.09 22 17.78V10.5C22 9.29 21.19 7.74 20.2 7.05L14.02 2.72C12.62 1.74 10.37 1.79 9.02 2.84Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 17.99V14.99" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Dashboard') }}</span></span></a>
            </li>





            @include('course::instructor.sidebar')

            @include('course::instructor.enrollment.sidebar')

            @include('paymentwithdraw::seller.sidebar')


            <li class="{{ Route::is('instructor.edit-profile') ? 'active' : '' }}"><a class="collapsed" href="{{ route('instructor.edit-profile') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="12" cy="17.5" rx="7" ry="3.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.My Profile') }}</span>
                </span>

                </a>
            </li>
            <li class="{{ Route::is('instructor.instructor-profile') ? 'active' : '' }}"><a class="collapsed" href="{{ route('instructor.instructor-profile') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22L10 16H2L4 22H15.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4 13V9.5C4 8.94772 4.44772 8.5 5 8.5H11C11.5523 8.5 12 8.94772 12 9.5V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.5 22H21C21.5523 22 22 21.5523 22 21V18.5C22 17.9477 21.5523 17.5 21 17.5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.0194 13C19.0194 14.1046 18.1232 15 17.0175 15C15.9119 15 15.0156 14.1046 15.0156 13C15.0156 11.8954 15.9119 11 17.0175 11C18.1232 11 19.0194 11.8954 19.0194 13Z" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M10.0038 4C10.0038 5.10457 9.10753 6 8.00191 6C6.89628 6 6 5.10457 6 4C6 2.89543 6.89628 2 8.00191 2C9.10753 2 10.0038 2.89543 10.0038 4Z" stroke="currentColor" stroke-width="1.5"/>
                        </svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Instructor Profile') }}</span>
                </span>

                </a>
            </li>
            <li class="{{ Route::is('instructor.change-password') ? 'active' : '' }}"><a class="collapsed" href="{{ route('instructor.change-password') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 8H8M16 8C18.2091 8 20 9.79086 20 12V18C20 20.2091 18.2091 22 16 22H8C5.79086 22 4 20.2091 4 18V12C4 9.79086 5.79086 8 8 8M16 8V6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6V8M12 16V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Change Password') }}</span>
                </span>

                </a>
            </li>

            <li class="{{ Route::is('instructor.notice-board.*') ? 'active' : '' }}"><a class="collapsed" href="{{ route('instructor.notice-board.index') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.99805 16H11.998M7.99805 11H15.998" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M7.5 3.5C5.9442 3.54667 5.01661 3.71984 4.37477 4.36227C3.49609 5.24177 3.49609 6.6573 3.49609 9.48836V15.9944C3.49609 18.8255 3.49609 20.241 4.37477 21.1205C5.25345 22 6.66767 22 9.49609 22H14.4961C17.3245 22 18.7387 22 19.6174 21.1205C20.4961 20.241 20.4961 18.8255 20.4961 15.9944V9.48836C20.4961 6.6573 20.4961 5.24177 19.6174 4.36228C18.9756 3.71984 18.048 3.54667 16.4922 3.5" stroke="currentColor" stroke-width="1.5"/>
<path d="M7.49609 3.75C7.49609 2.7835 8.2796 2 9.24609 2H14.7461C15.7126 2 16.4961 2.7835 16.4961 3.75C16.4961 4.7165 15.7126 5.5 14.7461 5.5H9.24609C8.2796 5.5 7.49609 4.7165 7.49609 3.75Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
</svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Notice Board') }}</span>
                </span>

                </a>
            </li>


            <li class="{{ Route::is('instructor.teacher-supports') || Route::is('instructor.teacher-support') ? 'active' : '' }}"><a class="collapsed" href="{{ route('instructor.teacher-supports') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3 3H19C20.1046 3 21 3.89543 21 5V13.5C21 14.6046 20.1046 15.5 19 15.5H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11 7H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7 8C7 9.10457 6.10457 10 5 10C3.89543 10 3 9.10457 3 8C3 6.89543 3.89543 6 5 6C6.10457 6 7 6.89543 7 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.5 12.5H6.99015M6.99015 12.5H4.00017C3.44791 12.5 3.0002 12.9477 3.00018 13.4999L3 17M6.99015 12.5L7 17M3 21V17M3 17H7M7 17V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Student Support') }}</span>
                </span>

                </a>
            </li>


            <li class="{{ Route::is('instructor.support-ticket.*') ? 'active' : '' }}"><a class="collapsed" href="{{ route('instructor.support-ticket.index') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.2419 12.2555C10.2419 10.7377 9.0123 9.50732 7.49538 9.50732C5.97848 9.50732 4.74878 10.7377 4.74878 12.2555C4.74878 13.7732 5.97848 15.0036 7.49538 15.0036C9.0123 15.0036 10.2419 13.7732 10.2419 12.2555Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M12.9881 21.9985H2.00171C2.00171 19.7909 4.46111 17.5016 7.49491 17.5016C10.5287 17.5016 12.9881 19.7909 12.9881 21.9985Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15.4944 7.01221H15.5025M18.4944 7.01221H18.5025" stroke="currentColor" stroke-width="1.5" stroke-linecap="square"/>
<path d="M16.9799 12.0102C19.7514 12.0102 21.9982 9.7697 21.9982 7.00586C21.9982 4.24201 19.7514 2.00146 16.9799 2.00146C14.2084 2.00146 11.9617 4.24201 11.9617 7.00586C11.9617 8.71617 12.9965 10.248 13.9497 10.9756C13.88 11.7125 13.5228 12.4935 13.0049 13.0032C12.9133 13.0933 14.243 12.7049 15.812 11.8587C16.2939 11.9708 16.3293 12.0102 16.9799 12.0102Z" stroke="currentColor" stroke-width="1.5"/>
</svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Support Ticket') }}</span>
                </span>

                </a>
            </li>




            @include('eventcalendar::instructor.sidebar')


            <li class="{{ Route::is('instructor.account-delete') ? 'active' : '' }}"><a class="collapsed" href="{{ route('instructor.account-delete') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 11.5H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.5 15.5H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.5 5.5L18.6139 20.121C18.5499 21.1766 17.6751 22 16.6175 22H7.38246C6.32488 22 5.4501 21.1766 5.38612 20.121L4.5 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 5.5H8M8 5.5L9.24025 2.60608C9.39783 2.2384 9.75937 2 10.1594 2H13.8406C14.2406 2 14.6022 2.2384 14.7597 2.60608L16 5.5M8 5.5H16M21 5.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Account Delete') }}</span>
                </span>

                </a>
            </li>

            <li><a href="{{ route('student.logout') }}" class="collapsed"><span class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 14L21.2929 12.7071C21.6834 12.3166 21.6834 11.6834 21.2929 11.2929L20 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21 12H13M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Logout') }}</span></span></a>
            </li>



        </ul>
    </div>
   <div class="d-flex d-md-none justify-content-center pt-5">
       <a href="{{ route('student.dashboard') }}" class="panel-switcher-btn">{{ __('translate.Student Panel') }}</a>
   </div>
    <!-- End Nav Menu -->
</div>
