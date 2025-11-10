

<li class="{{ Route::is('admin.course-enrollments') || Route::is('admin.course-enrollment') || Route::is('admin.course-pending-payment') || Route::is('admin.course-rejected-payment') ? 'active' : '' }}"><a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__enrollment_list"><span class="menu-bar__text">
    <span class="crancy-menu-icon crancy-svg-icon__v1">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 21C2.5 20.0909 4.4 18.2727 8 18.2727C11.6 18.2727 13.5 16.0909 14 15M8 8V5C8 3.89543 8.89543 3 10 3H20C21.1046 3 22 3.89543 22 5V13C22 14.1046 21.1046 15 20 15H16.7397M12 7H18M10 13C10 14.1046 9.10457 15 8 15C6.89543 15 6 14.1046 6 13C6 11.8954 6.89543 11 8 11C9.10457 11 10 11.8954 10 13Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M15 11H18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>



    </span>

    <span class="menu-bar__name">{{ __('translate.Enrollments') }}</span></span> <span class="crancy__toggle"></span></a></span>
    <!-- Dropdown Menu -->
    <div class="collapse crancy__dropdown {{ Route::is('admin.course-enrollments') || Route::is('admin.course-enrollment') || Route::is('admin.course-pending-payment') || Route::is('admin.course-rejected-payment')  ? 'show' : '' }}" id="menu-item__enrollment_list"  data-bs-parent="#CrancyMenu">
        <ul class="menu-bar__one-dropdown">

            <li><a href="{{ route('admin.course-enrollments') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Enrollments List') }}</span></span></a></li>

            <li><a href="{{ route('admin.course-pending-payment') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Pending Payment') }}</span></span></a></li>

            <li><a href="{{ route('admin.course-rejected-payment') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Rejected Payment') }}</span></span></a></li>



        </ul>
    </div>
</li>
