

@php
    $auth_user = Auth::guard('web')->user();
@endphp
<!-- Main Menu -->
<div class="admin-menu__one crancy-sidebar-padding mg-top-20">

    <!-- Nav Menu -->
    <div class="menu-bar">
        <ul id="CrancyMenu" class="menu-bar__one crancy-dashboard-menu">

            <li class="{{ Route::is('student.dashboard') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.dashboard') }}"><span class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">

                    <svg class="crancy-svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.02 2.84L3.63 7.04C2.73 7.74 2 9.23 2 10.36V17.77C2 20.09 3.89 21.99 6.21 21.99H17.79C20.11 21.99 22 20.09 22 17.78V10.5C22 9.29 21.19 7.74 20.2 7.05L14.02 2.72C12.62 1.74 10.37 1.79 9.02 2.84Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 17.99V14.99" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Dashboard') }}</span></span></a>
            </li>


            <li class="{{ Route::is('student.enrolled-courses') || Route::is('student.enrolled-course') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.enrolled-courses') }}"><span class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">

                    <svg class="crancy-svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 21C2.5 20.0909 4.4 18.2727 8 18.2727C11.6 18.2727 13.5 16.0909 14 15M8 8V5C8 3.89543 8.89543 3 10 3H20C21.1046 3 22 3.89543 22 5V13C22 14.1046 21.1046 15 20 15H16.7397M12 7H18M10 13C10 14.1046 9.10457 15 8 15C6.89543 15 6 14.1046 6 13C6 11.8954 6.89543 11 8 11C9.10457 11 10 11.8954 10 13Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M15 11H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Enrolled Courses') }}</span></span></a>
            </li>


            <li class="{{ Route::is('student.transactions') || Route::is('student.invoice') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.transactions') }}"><span class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">

                    <svg class="crancy-svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 8H22M11 19H4C2.89543 19 2 18.1046 2 17V5C2 3.89543 2.89543 3 4 3H20C21.1046 3 22 3.89543 22 5V9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M15 16V15H22L20.5 13M22 18V19H15L16.5 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.My Transaction') }}</span></span></a>
            </li>
            <li class="{{ Route::is('student.wishlist.index') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.wishlist.index') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">


                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 6.49999C18.1045 6.49999 19 7.39542 19 8.49999M12 5.70252L12.6851 4.99999C14.816 2.8147 18.2709 2.8147 20.4018 4.99999C22.4755 7.12659 22.5392 10.5538 20.5461 12.7599L14.8197 19.0981C13.2984 20.782 10.7015 20.782 9.18026 19.0981L3.45393 12.7599C1.46078 10.5538 1.5245 7.12661 3.5982 5C5.72912 2.81471 9.18404 2.81472 11.315 5.00001L12 5.70252Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Wishlist') }}</span>
                </span>

                </a>
            </li>



            <li class="{{ Route::is('student.edit-profile') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.edit-profile') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="12" cy="17.5" rx="7" ry="3.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Edit Profile') }}</span>
                </span>

                </a>
            </li>

            <li class="{{ Route::is('student.change-password') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.change-password') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                      <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 7H5M13 7C15.2091 7 17 8.79086 17 11V17C17 19.2091 15.2091 21 13 21H5C2.79086 21 1 19.2091 1 17V11C1 8.79086 2.79086 7 5 7M13 7V5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5V7M9 15V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Change Password') }}</span>
                </span>

                </a>
            </li>

            <li class="{{ Route::is('student.event-calendar') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.event-calendar') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18 2V4M6 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11.9955 13H12.0045M11.9955 17H12.0045M15.991 13H16M8 13H8.00897M8 17H8.00897" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M3.5 8H20.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M2.5 12.2432C2.5 7.88594 2.5 5.70728 3.75212 4.35364C5.00424 3 7.01949 3 11.05 3H12.95C16.9805 3 18.9958 3 20.2479 4.35364C21.5 5.70728 21.5 7.88594 21.5 12.2432V12.7568C21.5 17.1141 21.5 19.2927 20.2479 20.6464C18.9958 22 16.9805 22 12.95 22H11.05C7.01949 22 5.00424 22 3.75212 20.6464C2.5 19.2927 2.5 17.1141 2.5 12.7568V12.2432Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M3 8H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Calendar') }}</span>
                </span>

                </a>
            </li>


            <li class="{{ Route::is('student.notice-board') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.notice-board') }}">
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

            <li class="{{ Route::is('student.teacher-support.*') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.teacher-support.index') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3 3H19C20.1046 3 21 3.89543 21 5V13.5C21 14.6046 20.1046 15.5 19 15.5H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M11 7H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7 8C7 9.10457 6.10457 10 5 10C3.89543 10 3 9.10457 3 8C3 6.89543 3.89543 6 5 6C6.10457 6 7 6.89543 7 8Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.5 12.5H6.99015M6.99015 12.5H4.00017C3.44791 12.5 3.0002 12.9477 3.00018 13.4999L3 17M6.99015 12.5L7 17M3 21V17M3 17H7M7 17V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Teacher Support') }}</span>
                </span>

                </a>
            </li>


            <li class="{{ Route::is('student.support-ticket.*') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.support-ticket.index') }}">
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







            <li class="{{ Route::is('student.account-delete') ? 'active' : '' }}"><a class="collapsed" href="{{ route('student.account-delete') }}">
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
    @if ($auth_user->instructor_joining_request == 'approved')

        <div class="d-flex d-md-none justify-content-center pt-5">
            <a href="{{ route('instructor.dashboard') }}" class="panel-switcher-btn">{{ __('translate.Instructor Panel') }}</a>
        </div>
    @else
        <div class="d-flex d-md-none justify-content-center pt-5">
            <a href="{{ route('student.become-an-instructor') }}" class="panel-switcher-btn">{{ __('translate.Become Instructor') }}</a>
        </div>
    @endif

    <!-- End Nav Menu -->
</div>
