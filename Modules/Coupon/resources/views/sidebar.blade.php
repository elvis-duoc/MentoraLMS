

<li class="{{ Route::is('admin.coupon.*') || Route::is('admin.coupon-log') ? 'active' : '' }}"><a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-coupon_list"><span class="menu-bar__text">
    <span class="crancy-menu-icon crancy-svg-icon__v1">

<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 17C2 19.2091 3.79086 21 6 21H18C20.2091 21 22 19.2091 22 17V16C22 15.4477 21.54 15.0163 21.0181 14.8356C19.8435 14.4289 19 13.313 19 12C19 10.687 19.8435 9.57105 21.0181 9.16437C21.54 8.98368 22 8.55228 22 8V7C22 4.79086 20.2091 3 18 3H6C3.79086 3 2 4.79086 2 7V8C2 8.55228 2.46 8.98368 2.98189 9.16437C4.15653 9.57105 5 10.687 5 12C5 13.313 4.15653 14.4289 2.98189 14.8356C2.46 15.0163 2 15.4477 2 16V17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M10 9C10 9.55228 9.55228 10 9 10C8.44772 10 8 9.55228 8 9C8 8.44772 8.44772 8 9 8C9.55228 8 10 8.44772 10 9Z" fill="currentColor"/>
<path d="M16 15C16 15.5523 15.5523 16 15 16C14.4477 16 14 15.5523 14 15C14 14.4477 14.4477 14 15 14C15.5523 14 16 14.4477 16 15Z" fill="currentColor"/>
<path d="M15 9L9 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>

    </span>

    <span class="menu-bar__name">{{ __('translate.Manage Coupon') }}</span></span> <span class="crancy__toggle"></span></a></span>
    <!-- Dropdown Menu -->
    <div class="collapse crancy__dropdown {{ Route::is('admin.coupon.*') || Route::is('admin.coupon-log')  ? 'show' : '' }}" id="menu-coupon_list"  data-bs-parent="#CrancyMenu">
        <ul class="menu-bar__one-dropdown">

            <li><a href="{{ route('admin.coupon.index') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Coupon List') }}</span></span></a></li>

            <li><a href="{{ route('admin.coupon-log') }}"><span class="menu-bar__text"><span class="menu-bar__name">{{ __('translate.Coupon Log') }}</span></span></a></li>


        </ul>
    </div>
</li>
