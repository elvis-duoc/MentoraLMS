<!-- Main Menu -->
<div class="admin-menu__one crancy-sidebar-padding mg-top-20">

    <!-- Nav Menu -->
    <div class="menu-bar">
        <ul id="CrancyMenu" class="menu-bar__one crancy-dashboard-menu">

            <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a class="collapsed"
                                                                              href="{{ route('admin.dashboard') }}"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">

                    <svg class="crancy-svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.02 2.84L3.63 7.04C2.73 7.74 2 9.23 2 10.36V17.77C2 20.09 3.89 21.99 6.21 21.99H17.79C20.11 21.99 22 20.09 22 17.78V10.5C22 9.29 21.19 7.74 20.2 7.05L14.02 2.72C12.62 1.74 10.37 1.79 9.02 2.84Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 17.99V14.99" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Dashboard') }}</span></span></a>
            </li>
            <li class="{{ Route::is('admin.earning-and-revenue') ? 'active' : '' }}"><a class="collapsed"
                                                                                        href="{{ route('admin.earning-and-revenue') }}"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">


                    <svg class="crancy-svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14 12.75C14 11.7835 13.1046 11 12 11C10.8954 11 10 11.7835 10 12.75C10 13.7165 10.8954 14.5 12 14.5C13.1046 14.5 14 15.2835 14 16.25C14 17.2165 13.1046 18 12 18C10.8954 18 10 17.2165 10 16.25"
                        stroke="#404054" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M12 9.5V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 18V19.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M5.63246 11.1026C6.44914 8.65258 8.74197 7 11.3246 7H12.6754C15.258 7 17.5509 8.65258 18.3675 11.1026L19.3675 14.1026C20.6626 17.9878 17.7708 22 13.6754 22H10.3246C6.22921 22 3.33739 17.9878 4.63246 14.1026L5.63246 11.1026Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    <path
                        d="M14.0859 7L9.91411 7L8.51303 5.39296C7.13959 3.81763 8.74185 1.46298 10.7471 2.10985L11.6748 2.40914C11.8861 2.47728 12.1139 2.47728 12.3252 2.40914L13.2529 2.10985C15.2582 1.46298 16.8604 3.81763 15.487 5.39296L14.0859 7Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Earning & Revenue') }}</span></span></a>
            </li>


            <li class="{{ Route::is('admin.category.*') || Route::is('admin.courselevel.*') || Route::is('admin.courselanguage.*') || Route::is('admin.courses.*') || Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') || Route::is('admin.course-media') || Route::is('admin.submit-for-review') || Route::is('admin.pending-course') || Route::is('admin.rejected-course') || Route::is('admin.active-course') || Route::is('admin.course-seo') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__course_list"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7 3H5.00015C3.89559 3 3.00016 3.89542 3.00015 4.99998L3.00002 19C3.00001 20.1046 3.89544 21 5.00002 21H18C19.1046 21 20 20.1046 20 19V15"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path
                        d="M14 3L14.2954 2.31064C14.1068 2.22979 13.8932 2.22979 13.7046 2.31064L14 3ZM7 6L6.70456 5.31064C6.4288 5.42882 6.25 5.69997 6.25 6C6.25 6.30002 6.4288 6.57117 6.70456 6.68935L7 6ZM21 6L21.2954 6.68935C21.5712 6.57117 21.75 6.30002 21.75 6C21.75 5.69997 21.5712 5.42882 21.2954 5.31064L21 6ZM14 9L13.7046 9.68936C13.8932 9.77021 14.1068 9.77021 14.2954 9.68936L14 9ZM10.7442 7.90697L10.6512 7.16277L9.16277 7.34882L9.25579 8.09303L10.7442 7.90697ZM18.7442 8.09303L18.8372 7.34882L17.3488 7.16277L17.2558 7.90697L18.7442 8.09303ZM21.25 6.5C21.25 6.08579 20.9142 5.75 20.5 5.75C20.0858 5.75 19.75 6.08579 19.75 6.5H21.25ZM19.75 10.2692C19.75 10.6834 20.0858 11.0192 20.5 11.0192C20.9142 11.0192 21.25 10.6834 21.25 10.2692H19.75ZM13.7046 2.31064L6.70456 5.31064L7.29544 6.68936L14.2954 3.68936L13.7046 2.31064ZM21.2954 5.31064L14.2954 2.31064L13.7046 3.68936L20.7046 6.68936L21.2954 5.31064ZM14.2954 8.31064L7.29544 5.31064L6.70456 6.68935L13.7046 9.68936L14.2954 8.31064ZM20.7046 5.31064L13.7046 8.31064L14.2954 9.68936L21.2954 6.68935L20.7046 5.31064ZM9.25579 8.09303L9.68941 11.562L11.1778 11.3759L10.7442 7.90697L9.25579 8.09303ZM10.6902 12.911C11.3767 13.2058 12.7879 13.75 14 13.75V12.25C13.1261 12.25 11.9677 11.8271 11.2821 11.5327L10.6902 12.911ZM17.2558 7.90697L16.8222 11.3759L18.3106 11.562L18.7442 8.09303L17.2558 7.90697ZM16.7179 11.5327C16.0323 11.8271 14.8739 12.25 14 12.25V13.75C15.2121 13.75 16.6233 13.2058 17.3098 12.911L16.7179 11.5327ZM19.75 6.5V10.2692H21.25V6.5H19.75ZM16.8222 11.3759C16.8113 11.4631 16.7628 11.5134 16.7179 11.5327L17.3098 12.911C17.8793 12.6664 18.2386 12.1383 18.3106 11.562L16.8222 11.3759ZM9.68941 11.562C9.76145 12.1383 10.1207 12.6664 10.6902 12.911L11.2821 11.5327C11.2372 11.5134 11.1887 11.4631 11.1778 11.3759L9.68941 11.562Z"
                        fill="currentColor"/>
                    </svg>


                </span>

                <span class="menu-bar__name">{{ __('translate.Manage Course') }}</span></span> <span
                        class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.category.*') || Route::is('admin.courselevel.*') || Route::is('admin.courselanguage.*') || Route::is('admin.courses.*') || Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') || Route::is('admin.course-media') || Route::is('admin.submit-for-review') || Route::is('admin.pending-course') || Route::is('admin.rejected-course') || Route::is('admin.active-course') || Route::is('admin.course-seo')  ? 'show' : '' }}"
                    id="menu-item__course_list" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">


                        <li><a href="{{ route('admin.category.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Category List') }}</span></span></a></li>

                        <li><a href="{{ route('admin.courses.create') }}"><span class="menu-bar__text"><span
                                            class="menu-bar__name">{{ __('translate.Create Course') }}</span></span></a></li>

                        <li><a href="{{ route('admin.courses.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Course List') }}</span></span></a></li>

                        <li><a href="{{ route('admin.active-course') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Active Course') }}</span></span></a></li>

                        <li><a href="{{ route('admin.pending-course') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Awaiting Course') }}</span></span></a></li>

                        <li><a href="{{ route('admin.rejected-course') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Rejected Course') }}</span></span></a></li>

                        <li><a href="{{ route('admin.courselevel.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Course Level') }}</span></span></a></li>

                        <li><a href="{{ route('admin.courselanguage.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Course Language') }}</span></span></a></li>


                    </ul>
                </div>
            </li>


            @include('course::admin.enrollment.sidebar')




            @include('coupon::sidebar')


            <li class="{{ Route::is('admin.withdraw-methods.*') || Route::is('admin.withdraw-list.*') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse"
                   data-bs-target="#menu-item__withdraw_list"><span class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M21 11C21.8626 10.7762 22 9.98695 22 9.04763V5.01588C22 3.90254 21.1046 3 20 3H4C2.89543 3 2 3.90254 2 5.01588V9.04763C2 9.98695 2.13739 10.7762 3 11"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 21C15.866 21 19 17.866 19 14C19 10.134 15.866 7 12 7C8.13401 7 5 10.134 5 14C5 17.866 8.13401 21 12 21Z"
                    stroke="currentColor" stroke-width="1.5"/>
                <path
                    d="M12 11C10.8954 11 10 11.6716 10 12.5C10 13.3284 10.8954 14 12 14C13.1046 14 14 14.6716 14 15.5C14 16.3284 13.1046 17 12 17M12 11C12.8708 11 13.6116 11.4174 13.8862 12M12 11V10M12 17C11.1292 17 10.3884 16.5826 10.1138 16M12 17V18"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5 7H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>

                </span>

                <span class="menu-bar__name">{{ __('translate.Manage Withdraw') }}</span></span> <span
                        class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.withdraw-methods.*') || Route::is('admin.withdraw-list.*') ? 'show' : '' }}"
                    id="menu-item__withdraw_list" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">

                        <li><a href="{{ route('admin.withdraw-methods.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Withdraw Method') }}</span></span></a></li>

                        <li><a href="{{ route('admin.withdraw-list.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Withdraw List') }}</span></span></a></li>

                    </ul>
                </div>
            </li>


            <li class="{{ Route::is('admin.seller-list') || Route::is('admin.pending-seller') || Route::is('admin.seller-show') || Route::is('admin.seller-joining-request') || Route::is('admin.seller-joining-detail') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__seller"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 5V3C6 1.89543 6.89543 1 8 1H19C20.1046 1 21 1.89543 21 3V12C21 13.1046 20.1046 14 19 14H14M10 5.5H17M13 9.5H17M4.58579 14.5858C5.36683 15.3668 6.63317 15.3668 7.41421 14.5858C7.78929 14.2107 8.29799 14 8.82843 14H9C10.1046 14 11 14.8954 11 16V17C11 18.1046 10.1046 19 9 19H3C1.89543 19 1 18.1046 1 17V16C1 14.8954 1.89543 14 3 14H3.17157C3.70201 14 4.21071 14.2107 4.58579 14.5858ZM8 10C8 11.1046 7.10457 12 6 12C4.89543 12 4 11.1046 4 10C4 8.89543 4.89543 8 6 8C7.10457 8 8 8.89543 8 10Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>


                </span>
                <span class="menu-bar__name">{{ __('translate.Manage Instructor') }}</span></span> <span
                        class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.seller-list') || Route::is('admin.pending-seller')  || Route::is('admin.seller-show') || Route::is('admin.seller-joining-request') || Route::is('admin.seller-joining-detail') ? 'show' : '' }}"
                    id="menu-item__seller" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">

                        <li><a href="{{ route('admin.seller-list') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Instructor List') }}</span></span></a></li>

                        <li><a href="{{ route('admin.seller-joining-request') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Join Request') }}</span></span></a></li>


                    </ul>
                </div>
            </li>


            <li class="{{ Route::is('admin.user-list') || Route::is('admin.pending-user') || Route::is('admin.user-show') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__users"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 5V10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    <path
                        d="M16.75 7V6.25H15.25V7H16.75ZM8.75 7V6.25H7.25V7H8.75ZM12 2L12.2633 1.29775C12.0936 1.23408 11.9064 1.23408 11.7367 1.29775L12 2ZM4 5L3.73666 4.29775C3.44393 4.40753 3.25 4.68737 3.25 5C3.25 5.31263 3.44393 5.59247 3.73666 5.70225L4 5ZM12 8L11.7367 8.70225C11.9064 8.76592 12.0936 8.76592 12.2633 8.70225L12 8ZM20 5L20.2633 5.70225C20.5561 5.59247 20.75 5.31263 20.75 5C20.75 4.68737 20.5561 4.40753 20.2633 4.29775L20 5ZM12.711 17.0059L12.1778 16.4785V16.4785L12.711 17.0059ZM14.2996 15.3996L14.8328 15.927L14.8328 15.927L14.2996 15.3996ZM15.238 15.1441L15.4496 14.4246L15.238 15.1441ZM9.70045 15.3996L10.2337 14.8722L9.70045 15.3996ZM11.289 17.0059L11.8222 16.4785L11.289 17.0059ZM8.762 15.1441L8.5504 14.4246L8.762 15.1441ZM19.25 22C19.25 22.4142 19.5858 22.75 20 22.75C20.4142 22.75 20.75 22.4142 20.75 22H19.25ZM3.25 22C3.25 22.4142 3.58579 22.75 4 22.75C4.41421 22.75 4.75 22.4142 4.75 22H3.25ZM15.25 7V9H16.75V7H15.25ZM8.75 9V7H7.25V9H8.75ZM12 12.25C10.2051 12.25 8.75 10.7949 8.75 9H7.25C7.25 11.6234 9.37665 13.75 12 13.75V12.25ZM15.25 9C15.25 10.7949 13.7949 12.25 12 12.25V13.75C14.6234 13.75 16.75 11.6234 16.75 9H15.25ZM11.7367 1.29775L3.73666 4.29775L4.26334 5.70225L12.2633 2.70225L11.7367 1.29775ZM12.2633 8.70225L20.2633 5.70225L19.7367 4.29775L11.7367 7.29775L12.2633 8.70225ZM11.7367 2.70225L19.7367 5.70225L20.2633 4.29775L12.2633 1.29775L11.7367 2.70225ZM12.2633 7.29775L4.26334 4.29775L3.73666 5.70225L11.7367 8.70225L12.2633 7.29775ZM13.2443 17.5332L14.8328 15.927L13.7663 14.8722L12.1778 16.4785L13.2443 17.5332ZM15.0264 15.8637C17.6994 16.6497 19.25 18.3265 19.25 20H20.75C20.75 17.3393 18.3869 15.2884 15.4496 14.4246L15.0264 15.8637ZM9.16718 15.927L10.7557 17.5332L11.8222 16.4785L10.2337 14.8722L9.16718 15.927ZM4.75 20C4.75 18.3265 6.30063 16.6497 8.97359 15.8637L8.5504 14.4246C5.61309 15.2884 3.25 17.3393 3.25 20H4.75ZM19.25 20V22H20.75V20H19.25ZM3.25 20V22H4.75V20H3.25ZM10.2337 14.8722C9.81027 14.444 9.17106 14.2421 8.5504 14.4246L8.97359 15.8637C9.02255 15.8493 9.09983 15.8589 9.16718 15.927L10.2337 14.8722ZM14.8328 15.927C14.9002 15.8589 14.9774 15.8493 15.0264 15.8637L15.4496 14.4246C14.8289 14.2421 14.1897 14.444 13.7663 14.8722L14.8328 15.927ZM12.1778 16.4785C12.0799 16.5774 11.9201 16.5774 11.8222 16.4785L10.7557 17.5332C11.4407 18.2259 12.5593 18.2259 13.2443 17.5332L12.1778 16.4785Z"
                        fill="currentColor"/>
                    </svg>


                </span>
                <span class="menu-bar__name">{{ __('translate.Manage Student') }}</span></span> <span
                        class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.user-list') || Route::is('admin.pending-user')  || Route::is('admin.user-show') ? 'show' : '' }}"
                    id="menu-item__users" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">

                        <li><a href="{{ route('admin.user-list') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Student List') }}</span></span></a></li>

                        <li><a href="{{ route('admin.pending-user') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Pending Student') }}</span></span></a></li>


                    </ul>
                </div>
            </li>


            <li class="{{ Route::is('admin.contact-message') || Route::is('admin.show-message') ? 'active' : '' }}"><a
                    class="collapsed" href="{{ route('admin.contact-message') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 10H16M8 14H12M11 3H13C17.9706 3 22 7.02944 22 12C22 16.9706 17.9706 21 13 21H6C3.79086 21 2 19.2091 2 17V12C2 7.02944 6.02944 3 11 3Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>


                    </span>
                    <span class="menu-bar__name">{{ __('translate.Contact Message') }}</span>
                </span>

                </a>
            </li>


            <li class="{{ Route::is('admin.support-tickets') || Route::is('admin.support-ticket') ? 'active' : '' }}"><a class="collapsed" href="{{ route('admin.support-tickets') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                      <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 7H5M13 7C15.2091 7 17 8.79086 17 11V17C17 19.2091 15.2091 21 13 21H5C2.79086 21 1 19.2091 1 17V11C1 8.79086 2.79086 7 5 7M13 7V5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5V7M9 15V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>

                    </span>
                    <span class="menu-bar__name">{{ __('translate.Support Ticket') }}</span>
                </span>

                </a>
            </li>

            <h4 class="admin-menu__title pt-4">{{ __('translate.CMS & Blogs') }}</h4>

            <li class="{{ Route::is('admin.blog.*') || Route::is('admin.blog-category.*') || Route::is('admin.comment-list') || Route::is('admin.show-comment') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__blog"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.5 8V5C17.5 3.89543 16.6046 3 15.5 3H4.5C3.39543 3 2.5 3.89543 2.5 5V19C2.5 20.1046 3.39543 21 4.5 21H19.5"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.5 8H13.5M6.5 12H13.5M6.5 16H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"/>
                    <path
                        d="M17.5 8H19.5C20.6046 8 21.5 8.89543 21.5 10V19C21.5 20.1046 20.6046 21 19.5 21C18.3954 21 17.5 20.1046 17.5 19V8Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Manage Blog') }}</span></span> <span class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.blog.*') || Route::is('admin.blog-category.*') || Route::is('admin.comment-list') || Route::is('admin.show-comment') ? 'show' : '' }}"
                    id="menu-item__blog" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">

                        <li><a href="{{ route('admin.blog-category.create') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Create Categroy') }}</span></span></a></li>

                        <li><a href="{{ route('admin.blog-category.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Categroy List') }}</span></span></a></li>

                        <li><a href="{{ route('admin.blog.create') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Create Blog') }}</span></span></a></li>

                        <li><a href="{{ route('admin.blog.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Blog List') }}</span></span></a></li>

                        <li><a href="{{ route('admin.comment-list') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Comment List') }}</span></span></a></li>


                    </ul>
                </div>
            </li>


            <li class="{{ Route::is('admin.terms-conditions') || Route::is('admin.privacy-policy') || Route::is('admin.faq.*') || Route::is('admin.custom-page.*') || Route::is('admin.contact-us') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__pages"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10.5 22H4.50002C3.39544 22 2.50001 21.1046 2.50002 20L2.50016 3.99998C2.50017 2.89542 3.39559 2 4.50016 2H17.5C18.6046 2 19.5 2.89543 19.5 4V11"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M7 7H15M7 12H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M13.5 20V22H15.5L21.5 16L19.5 14L13.5 20Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Manage Pages') }}</span></span> <span class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.terms-conditions') || Route::is('admin.privacy-policy') || Route::is('admin.faq.*') || Route::is('admin.custom-page.*') || Route::is('admin.contact-us') ? 'show' : '' }}"
                    id="menu-item__pages" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">


                        <li><a href="{{ route('admin.contact-us', ['lang_code' => admin_lang()]) }}"><span
                                    class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Contact Us') }}</span></span></a></li>

                        <li><a href="{{ route('admin.terms-conditions', ['lang_code' => admin_lang()]) }}"><span
                                    class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Terms and Conditions') }}</span></span></a></li>

                        <li><a href="{{ route('admin.privacy-policy', ['lang_code' => admin_lang()]) }}"><span
                                    class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Privacy Policy') }}</span></span></a></li>

                        <li><a href="{{ route('admin.faq.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.FAQ') }}</span></span></a></li>


                        <li><a href="{{ route('admin.custom-page.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Custom Page') }}</span></span></a></li>

                    </ul>
                </div>
            </li>


            <li class="{{ Route::is('admin.front-end.frontend-section') || Route::is('admin.front-end.section') || Route::is('admin.testimonial.*') || Route::is('admin.partner.*') || Route::is('admin.footer') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__for_section"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 10V4.5C21 3.39543 20.1046 2.5 19 2.5H4C2.89543 2.5 2 3.39543 2 4.5V17.5C2 18.6046 2.89543 19.5 4 19.5H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 8.5H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13 19.0265L19.2367 12.7898C19.6231 12.4034 20.2496 12.4034 20.6359 12.7898L21.7102 13.8641C22.0966 14.2504 22.0966 14.8769 21.7102 15.2633L15.4735 21.5H13V19.0265Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5.5 5.5H5.50998M9.49002 5.5H9.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>


                </span>
                <span class="menu-bar__name">{{ __('translate.Manage Content') }}</span></span> <span
                        class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.front-end.frontend-section') || Route::is('admin.front-end.section') || Route::is('admin.testimonial.*') || Route::is('admin.partner.*') || Route::is('admin.footer') ? 'show' : '' }}"
                    id="menu-item__for_section" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">


                        <li><a href="{{ route('admin.front-end.frontend-section') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Frontend Section') }}</span></span></a></li>


                        <li><a href="{{ route('admin.footer', ['lang_code' => admin_lang()]) }}"><span
                                    class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Footer Info') }}</span></span></a></li>


                        <li><a href="{{ route('admin.testimonial.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Testimonial') }}</span></span></a></li>

                        <li><a href="{{ route('admin.partner.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Partner') }}</span></span></a></li>

                    </ul>
                </div>
            </li>


            <h4 class="admin-menu__title pt-4">{{ __('translate.Setting & Configuration') }}</h4>


            <li class="{{ Route::is('admin.general-setting') ? 'active' : '' }}"><a class="collapsed"
                                                                                    href="{{ route('admin.general-setting') }}"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.8485 4H11.1515C10.2143 4 9.45453 4.71634 9.45453 5.6C9.45453 6.61121 8.37258 7.25411 7.48444 6.77064L7.39423 6.72153C6.58258 6.27971 5.54472 6.54191 5.07612 7.30717L4.22763 8.69281C3.75902 9.45808 4.03711 10.4366 4.84877 10.8785C5.73734 11.3622 5.73733 12.6378 4.84876 13.1215C4.03711 13.5634 3.75902 14.5419 4.22763 15.3072L5.07612 16.6928C5.54472 17.4581 6.58258 17.7203 7.39423 17.2785L7.48444 17.2294C8.37258 16.7459 9.45453 17.3888 9.45453 18.4C9.45453 19.2837 10.2143 20 11.1515 20H12.8485C13.7857 20 14.5455 19.2837 14.5455 18.4C14.5455 17.3888 15.6274 16.7459 16.5156 17.2294L16.6058 17.2785C17.4174 17.7203 18.4553 17.4581 18.9239 16.6928L19.7724 15.3072C20.241 14.5419 19.9629 13.5634 19.1512 13.1215C18.2627 12.6378 18.2627 11.3622 19.1512 10.8785C19.9629 10.4366 20.241 9.45809 19.7724 8.69283L18.9239 7.30719C18.4553 6.54192 17.4174 6.27972 16.6058 6.72154L16.5156 6.77065C15.6274 7.25412 14.5455 6.61122 14.5455 5.6C14.5455 4.71634 13.7857 4 12.8485 4Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Setting') }}</span></span></a>
            </li>

            <li class="{{ Route::is('admin.multi-currency.*') ? 'active' : '' }}"><a class="collapsed" href="{{ route('admin.multi-currency.index') }}">
                <span class="menu-bar__text">
                    <span class="crancy-menu-icon crancy-svg-icon__v1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M7.86004 10.75C7.78769 11.1563 7.75 11.574 7.75 12C7.75 12.426 7.78769 12.8437 7.86004 13.25H16C16.4142 13.25 16.75 13.5858 16.75 14C16.75 14.4142 16.4142 14.75 16 14.75H8.30272C9.40895 17.385 12.0576 19.25 15.1667 19.25C17.2472 19.25 19.124 18.4137 20.4698 17.0684C20.7627 16.7756 21.2376 16.7757 21.5304 17.0686C21.8233 17.3615 21.8232 17.8364 21.5302 18.1293C19.9114 19.7475 17.6564 20.75 15.1667 20.75C11.2308 20.75 7.87522 18.2419 6.6988 14.75H3C2.58579 14.75 2.25 14.4142 2.25 14C2.25 13.5858 2.58579 13.25 3 13.25H6.34014C6.28074 12.8419 6.25 12.4246 6.25 12C6.25 11.5754 6.28074 11.1581 6.34015 10.75H3C2.58579 10.75 2.25 10.4142 2.25 10C2.25 9.58579 2.58579 9.25 3 9.25H6.6988C7.87522 5.75809 11.2308 3.25 15.1667 3.25C17.6564 3.25 19.9114 4.25247 21.5302 5.87074C21.8232 6.16359 21.8233 6.63846 21.5304 6.9314C21.2376 7.22435 20.7627 7.22443 20.4698 6.93158C19.124 5.58631 17.2472 4.75 15.1667 4.75C12.0576 4.75 9.40895 6.61504 8.30272 9.25H16C16.4142 9.25 16.75 9.58579 16.75 10C16.75 10.4142 16.4142 10.75 16 10.75H7.86004Z"
                                  fill="currentColor"/>
                        </svg>

                    </span>
                    <span class="menu-bar__name">{{ __('translate.Multi Currency') }}</span>
                </span>

            </a>
            </li>

            <li class="{{ Route::is('admin.language.*') || Route::is('admin.theme-language') ? 'active' : '' }}"><a
                    href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__languages"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1444_12299)">
                        <path
                            d="M7.50753 9.196C7.40053 8.732 7.10453 8.31 6.66553 8.126C6.45953 8.04 6.25253 8 6.05253 8C5.36353 8 4.76553 8.475 4.60953 9.147L3.13453 15.399C3.06253 15.706 3.29453 16 3.61053 16C3.83653 16 4.03253 15.845 4.08553 15.625L4.47453 14H7.58953L7.96353 15.621C8.01453 15.843 8.21253 16 8.43953 16H8.45153C8.76553 16 8.99753 15.708 8.92753 15.402L7.50553 9.196H7.50753ZM4.71453 13L5.58353 9.373C5.63453 9.154 5.82753 9 6.05253 9C6.12553 9 6.20153 9.016 6.27853 9.049C6.38953 9.095 6.49153 9.246 6.53153 9.42L7.35853 13H4.71453ZM19.5195 4H4.51953C2.03753 4 0.0195312 6.019 0.0195312 8.5V15.5C0.0195312 17.981 2.03853 20 4.51953 20H19.5195C22.0005 20 24.0195 17.981 24.0195 15.5V8.5C24.0195 6.019 22.0005 4 19.5195 4ZM1.01953 15.5V8.5C1.01953 6.57 2.58953 5 4.51953 5H11.5195V19H4.51953C2.58953 19 1.01953 17.43 1.01953 15.5ZM23.0195 15.5C23.0195 17.43 21.4495 19 19.5195 19H12.5195V5H19.5195C21.4495 5 23.0195 6.57 23.0195 8.5V15.5ZM22.0195 9.491V9.509C22.0195 9.78 21.7995 10 21.5285 10H20.9825C20.8755 10.917 20.4655 12.904 18.8975 14.341C19.5985 14.695 20.4715 14.936 21.5555 14.989C21.8155 15.002 22.0195 15.218 22.0195 15.479V15.497C22.0195 15.778 21.7845 16.002 21.5035 15.988C20.0345 15.917 18.8985 15.54 18.0195 15.002C17.1405 15.54 16.0045 15.917 14.5355 15.988C14.2555 16.002 14.0195 15.778 14.0195 15.497V15.479C14.0195 15.219 14.2235 15.002 14.4835 14.989C15.5685 14.935 16.4405 14.694 17.1425 14.341C16.6025 13.846 16.1995 13.286 15.8995 12.727C15.7235 12.398 15.9585 12 16.3315 12C16.5125 12 16.6765 12.1 16.7635 12.259C17.0545 12.793 17.4585 13.325 18.0205 13.778C19.4945 12.593 19.8825 10.853 19.9845 10.001H14.5115C14.2405 10.001 14.0205 9.781 14.0205 9.51V9.492C14.0205 9.221 14.2405 9.001 14.5115 9.001H17.5205V8.492C17.5205 8.221 17.7405 8.001 18.0115 8.001H18.0295C18.3005 8.001 18.5205 8.221 18.5205 8.492V9.001H21.5295C21.8005 9.001 22.0205 9.221 22.0205 9.492L22.0195 9.491Z"
                            fill="currentColor"/>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M8.92831 15.4018C8.99831 15.7078 8.76631 15.9998 8.45231 15.9998H8.44031C8.21331 15.9998 8.01531 15.8428 7.96431 15.6208L7.59031 13.9998H4.47531L4.08631 15.6248C4.03331 15.8448 3.83731 15.9998 3.61131 15.9998C3.29531 15.9998 3.06331 15.7058 3.13531 15.3988L4.61031 9.1468C4.76631 8.4748 5.36431 7.9998 6.05331 7.9998C6.25331 7.9998 6.46031 8.0398 6.66631 8.1258C7.0412 8.28293 7.3118 8.61362 7.44948 8.9958C7.47203 9.05841 7.49102 9.1224 7.50631 9.18723C7.50695 9.18994 7.50759 9.19265 7.50821 9.19537C7.50818 9.19522 7.50824 9.19551 7.50821 9.19537L7.50641 9.19624L8.92831 15.4018ZM7.75732 9.3958H7.75968L7.7032 9.15086C7.58517 8.63903 7.25479 8.1556 6.74362 7.94135C6.51372 7.84537 6.28031 7.7998 6.05331 7.7998C5.27133 7.7998 4.5927 8.33886 4.41557 9.10127C4.41554 9.10137 4.41559 9.10117 4.41557 9.10127L2.94066 15.3529C2.83932 15.785 3.166 16.1998 3.61131 16.1998C3.93018 16.1998 4.20621 15.981 4.28075 15.6716L4.63309 14.1998H7.4312L7.76939 15.6656M7.75732 9.3958L9.12326 15.3571C9.22182 15.788 8.89518 16.1998 8.45231 16.1998H8.44031C8.12039 16.1998 7.84138 15.9785 7.76939 15.6656M5.58431 9.3728L4.71531 12.9998H7.35931L6.53231 9.4198C6.49231 9.2458 6.39031 9.0948 6.27931 9.0488C6.20231 9.0158 6.12631 8.9998 6.05331 8.9998C5.82831 8.9998 5.63531 9.1538 5.58431 9.3728ZM7.10784 12.7998L6.33744 9.46482C6.32267 9.40056 6.29666 9.3423 6.26706 9.29878C6.23571 9.25268 6.20996 9.23656 6.20274 9.23357L6.20052 9.23265C6.14597 9.20927 6.09669 9.1998 6.05331 9.1998C5.92175 9.1998 5.80912 9.28928 5.7791 9.41817L5.77881 9.4194L4.96889 12.7998H7.10784ZM22.0213 9.48981C22.0213 9.48948 22.0213 9.49014 22.0213 9.48981C22.0207 9.32807 21.9417 9.18467 21.8203 9.09566C21.739 9.03603 21.6388 9.0008 21.5303 9.0008H18.5213V8.4918C18.5213 8.2208 18.3013 8.0008 18.0303 8.0008H18.0123C17.7413 8.0008 17.5213 8.2208 17.5213 8.4918V9.0008H14.5123C14.2413 9.0008 14.0213 9.2208 14.0213 9.4918V9.5098C14.0213 9.7808 14.2413 10.0008 14.5123 10.0008H19.9853C19.9779 10.0629 19.9689 10.1298 19.9581 10.2008C19.8209 11.1036 19.3878 12.6792 18.0213 13.7778C17.4593 13.3248 17.0553 12.7928 16.7643 12.2588C16.6773 12.0998 16.5133 11.9998 16.3323 11.9998C15.9593 11.9998 15.7243 12.3978 15.9003 12.7268C16.171 13.2312 16.5256 13.7364 16.989 14.194C17.0391 14.2435 17.0906 14.2925 17.1433 14.3408C17.08 14.3726 17.0153 14.4035 16.9493 14.4335C16.2823 14.7357 15.4715 14.9397 14.4843 14.9888C14.2243 15.0018 14.0203 15.2188 14.0203 15.4788V15.4968C14.0203 15.7778 14.2563 16.0018 14.5363 15.9878C16.0053 15.9168 17.1413 15.5398 18.0203 15.0018C18.8993 15.5398 20.0353 15.9168 21.5043 15.9878C21.7853 16.0018 22.0203 15.7778 22.0203 15.4968V15.4788C22.0203 15.2178 21.8163 15.0018 21.5563 14.9888C20.57 14.9406 19.7584 14.7367 19.0921 14.4337C19.0261 14.4037 18.9615 14.3727 18.8983 14.3408C18.951 14.2925 19.0024 14.2436 19.0526 14.1941C20.4935 12.7714 20.8799 10.886 20.9833 9.9998H21.5293C21.7231 9.9998 21.8909 9.88727 21.9707 9.72402C22.0025 9.65902 22.0203 9.58598 22.0203 9.5088V9.4908L22.0213 9.4918C22.0213 9.49147 22.0213 9.49014 22.0213 9.48981ZM22.1178 9.87109L22.2213 9.97465V9.4918C22.2213 9.11035 21.9118 8.80081 21.5303 8.80081H18.7213V8.4918C18.7213 8.11035 18.4118 7.80081 18.0303 7.80081H18.0123C17.6309 7.80081 17.3213 8.11035 17.3213 8.4918V8.80081H14.5123C14.1309 8.80081 13.8213 9.11035 13.8213 9.4918V9.5098C13.8213 9.89126 14.1309 10.2008 14.5123 10.2008H19.7558C19.6218 11.0553 19.2197 12.4821 18.0215 13.5174C17.5475 13.107 17.1981 12.6369 16.9399 12.1631C16.8189 11.9419 16.5886 11.7998 16.3323 11.7998C15.8058 11.7998 15.4778 12.361 15.724 12.8211C15.9923 13.3212 16.3417 13.8239 16.7952 14.2831C16.1668 14.5566 15.4035 14.7428 14.4744 14.7891C14.1067 14.8074 13.8203 15.1135 13.8203 15.4788V15.4968C13.8203 15.8922 14.152 16.2071 14.546 16.1876C15.9885 16.1179 17.1254 15.7583 18.0203 15.2349C18.9152 15.7583 20.0522 16.1179 21.4947 16.1876C21.8899 16.2071 22.2203 15.8919 22.2203 15.4968V15.4788C22.2203 15.1122 21.9337 14.8074 21.5663 14.7891C20.638 14.7437 19.8739 14.5576 19.2461 14.2834C20.6023 12.9104 21.0261 11.1486 21.1592 10.1998H21.5293C21.7779 10.1998 21.996 10.0683 22.1178 9.87109ZM4.52031 3.7998H19.5203C22.1118 3.7998 24.2203 5.90835 24.2203 8.4998V15.4998C24.2203 18.0913 22.1118 20.1998 19.5203 20.1998H4.52031C1.92886 20.1998 -0.179688 18.0913 -0.179688 15.4998V8.4998C-0.179688 5.90838 1.92783 3.7998 4.52031 3.7998ZM1.22031 8.4998V15.4998C1.22031 17.3193 2.70077 18.7998 4.52031 18.7998H11.3203V5.1998H4.52031C2.70077 5.1998 1.22031 6.68026 1.22031 8.4998ZM19.5203 18.7998C21.3399 18.7998 22.8203 17.3193 22.8203 15.4998V8.4998C22.8203 6.68026 21.3399 5.1998 19.5203 5.1998H12.7203V18.7998H19.5203ZM4.52031 3.9998H19.5203C22.0013 3.9998 24.0203 6.0188 24.0203 8.4998V15.4998C24.0203 17.9808 22.0013 19.9998 19.5203 19.9998H4.52031C2.03931 19.9998 0.0203125 17.9808 0.0203125 15.4998V8.4998C0.0203125 6.0188 2.03831 3.9998 4.52031 3.9998ZM1.02031 8.4998V15.4998C1.02031 17.4298 2.59031 18.9998 4.52031 18.9998H11.5203V4.9998H4.52031C2.59031 4.9998 1.02031 6.5698 1.02031 8.4998ZM19.5203 18.9998C21.4503 18.9998 23.0203 17.4298 23.0203 15.4998V8.4998C23.0203 6.5698 21.4503 4.9998 19.5203 4.9998H12.5203V18.9998H19.5203Z"
                              fill="currentColor"/>
                        </g>

                        </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Language') }}</span></span> <span
                        class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.language.*') || Route::is('admin.theme-language') ? 'show' : '' }}"
                    id="menu-item__languages" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">

                        <li><a href="{{ route('admin.language.index') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Languages') }}</span></span></a></li>

                        <li><a href="{{ route('admin.theme-language', ['lang_code' => 'en']) }}"><span
                                    class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Theme Languages') }}</span></span></a></li>

                    </ul>
                </div>
            </li>


            <li class="{{ Route::is('admin.email-setting') || Route::is('admin.email-template') || Route::is('admin.edit-email-template') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__apps_email_config"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 9L9.7812 11.5208C11.1248 12.4165 12.8752 12.4165 14.2188 11.5208L14.7092 11.1939M13.8027 4H6C3.79086 4 2 5.79086 2 8V18C2 20.2091 3.79086 22 6 22H18C20.2091 22 22 20.2091 22 18V12.1973M22 7C22 8.65685 20.6569 10 19 10C17.3431 10 16 8.65685 16 7C16 5.34315 17.3431 4 19 4C20.6569 4 22 5.34315 22 7Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Email Configuration') }}</span></span> <span
                        class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.email-setting') || Route::is('admin.email-template') || Route::is('admin.edit-email-template') ? 'show' : '' }}"
                    id="menu-item__apps_email_config" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">

                        <li><a href="{{ route('admin.email-setting') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Configuration') }}</span></span></a></li>

                        <li><a href="{{ route('admin.email-template') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Email Template') }}</span></span></a></li>


                    </ul>
                </div>
            </li>


            <li class="{{ Route::is('admin.certificatebuilder') || Route::is('admin.cookie-consent') || Route::is('admin.error-image') || Route::is('admin.login-image') || Route::is('admin.breadcrumb') || Route::is('admin.social-login') || Route::is('admin.default-avatar') || Route::is('admin.maintenance-mode') || Route::is('admin.admin-login-image') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse" data-bs-target="#menu-item__apps"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" y="2" width="20" height="16" rx="3" stroke="currentColor" stroke-width="1.5"/>
                        <path d="M9 22H12M15 22H12M12 22V18" stroke="currentColor" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11 15H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Website Setup') }}</span></span> <span
                        class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.certificatebuilder') || Route::is('admin.cookie-consent') || Route::is('admin.error-image') || Route::is('admin.login-image') || Route::is('admin.breadcrumb') || Route::is('admin.social-login') || Route::is('admin.default-avatar') || Route::is('admin.maintenance-mode') || Route::is('admin.admin-login-image') ? 'show' : '' }}"
                    id="menu-item__apps" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">

                        <li><a href="{{ route('admin.certificatebuilder') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Certificate Builder') }}</span></span></a></li>

                        <li><a href="{{ route('admin.cookie-consent') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Cookie Consent') }}</span></span></a></li>

                        <li><a href="{{ route('admin.error-image') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Error Page') }}</span></span></a></li>

                        <li><a href="{{ route('admin.login-image') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Login Page') }}</span></span></a></li>

                        <li><a href="{{ route('admin.admin-login-image') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Admin Login') }}</span></span></a></li>

                        <li><a href="{{ route('admin.breadcrumb') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Breadcrumb Image') }}</span></span></a></li>

                        <li><a href="{{ route('admin.social-login') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Social Login') }}</span></span></a></li>


                        <li><a href="{{ route('admin.default-avatar') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Default Avatar') }}</span></span></a></li>

                        <li><a href="{{ route('admin.maintenance-mode') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Maintenance mode') }}</span></span></a></li>

                    </ul>
                </div>
            </li>

            <li class="{{ Route::is('admin.seo-setting') ? 'active' : '' }}"><a class="collapsed"
                                                                                href="{{ route('admin.seo-setting') }}"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2.75 11.5C2.75 16.3325 6.66751 20.25 11.5 20.25C16.3325 20.25 20.25 16.3325 20.25 11.5C20.25 6.66751 16.3325 2.75 11.5 2.75C6.66751 2.75 2.75 6.66751 2.75 11.5ZM11.5 21.75C5.83908 21.75 1.25 17.1609 1.25 11.5C1.25 5.83908 5.83908 1.25 11.5 1.25C17.1609 1.25 21.75 5.83908 21.75 11.5C21.75 14.0605 20.8111 16.4017 19.2589 18.1982L22.5303 21.4697C22.8232 21.7626 22.8232 22.2374 22.5303 22.5303C22.2374 22.8232 21.7626 22.8232 21.4697 22.5303L18.1982 19.2589C16.4017 20.8111 14.0605 21.75 11.5 21.75Z"
                              fill="currentColor"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.SEO Setup') }}</span></span></a>
            </li>

            <li class="{{ Route::is('admin.paymentgateway') ? 'active' : '' }}"><a class="collapsed"
                                                                                   href="{{ route('admin.paymentgateway') }}"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
                        <path
                            d="M14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <path
                            d="M12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16C10.8954 16 10 15.1046 10 14"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M12 6.5V8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M12 16V17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Payment Method') }}</span></span></a>
            </li>

        </ul>
    </div>
    <!-- End Nav Menu -->
</div>


<div class="crancy-sidebar-padding pd-btm-40 pb-btm2">
    <h4 class="admin-menu__title">{{ __('translate.Others') }}</h4>
    <!-- Nav Menu -->
    <div class="menu-bar">
        <ul class="menu-bar__one crancy-dashboard-menu" id="CrancyMenu">
            <li class="{{ Route::is('admin.newsletter-list') || Route::is('admin.newsletter-email') ? 'active' : '' }}">
                <a href="#!" class="collapsed" data-bs-toggle="collapse"
                   data-bs-target="#menu-item__apps_newsletter"><span class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 9H12M8 13H16M8 17H16M15.9995 2V5M7.99951 2V5M7 3.5H17C19.2091 3.5 21 5.29086 21 7.5V18C21 20.2091 19.2091 22 17 22H7C4.79086 22 3 20.2091 3 18V7.5C3 5.29086 4.79086 3.5 7 3.5Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                </span>
                <span class="menu-bar__name">{{ __('translate.Newsletter') }}</span></span> <span
                        class="crancy__toggle"></span></a></span>
                <!-- Dropdown Menu -->
                <div
                    class="collapse crancy__dropdown {{ Route::is('admin.newsletter-list') || Route::is('admin.newsletter-email') ? 'show' : '' }}"
                    id="menu-item__apps_newsletter" data-bs-parent="#CrancyMenu">
                    <ul class="menu-bar__one-dropdown">

                        <li><a href="{{ route('admin.newsletter-list') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Subscriber List') }}</span></span></a></li>

                        <li><a href="{{ route('admin.newsletter-email') }}"><span class="menu-bar__text"><span
                                        class="menu-bar__name">{{ __('translate.Send Mail') }}</span></span></a></li>

                    </ul>
                </div>
            </li>

            <li><a class="collapsed" href="{{ route('admin.cache-clear') }}"><span class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
               <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1 10C1 14.9706 5.02944 19 10 19C14.9706 19 19 14.9706 19 10C19 5.02944 14.9706 1 10 1C6.66873 1 3.76018 2.80989 2.20404 5.5M1.5 1L1.93552 6L7 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


                </span>
                <span class="menu-bar__name">{{ __('translate.Cache Clear') }}</span></span></a>
            </li>

            <li><a href="javascript:;" onclick="event.preventDefault();
                document.getElementById('admin-sidebar-logout').submit();" class="collapsed"><span
                        class="menu-bar__text">
                <span class="crancy-menu-icon crancy-svg-icon__v1">
                    <svg class="crancy-svg-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="18"
                         viewBox="0 0 22 18" fill="none">
                        <path d="M19 11L20.2929 9.70711C20.6834 9.31658 20.6834 8.68342 20.2929 8.29289L19 7"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M20 9H12M5 17C2.79086 17 1 15.2091 1 13V5C1 2.79086 2.79086 1 5 1M5 17C7.20914 17 9 15.2091 9 13V5C9 2.79086 7.20914 1 5 1M5 17H13C15.2091 17 17 15.2091 17 13M5 1H13C15.2091 1 17 2.79086 17 5"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="menu-bar__name">{{ __('translate.Logout') }}</span></span></a>
            </li>

            <form id="admin-sidebar-logout" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </ul>
    </div>
    <!-- End Nav Menu -->
    <!-- Support Card -->
    <p class=" crancy-ybcolor mg-top-20">{{ __('translate.Version') }} : {{ $general_setting->app_version }}</p>
    <!-- End Support Card -->
</div>
