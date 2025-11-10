


@if (request()->has('req_type') && request()->get('req_type') == 'from_create')

    <div class="list-group crancy-psidebar__list" id="list-tab" role="tablist">
        <a class="list-group-item {{ Route::is('admin.courses.edit') || Route::is('admin.course-media') || Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') || Route::is('admin.course-seo') || Route::is('admin.submit-for-review') ? 'active' : '' }}"
        href="{{ route('admin.courses.edit', ['course' => $course->id, 'lang_code' => admin_lang(), 'req_type' => 'from_create'] ) }}">

            <h4 class="crancy-psidebar__title">{{ __('translate.Basic Information') }}</h4>
        </a>
        <span class="crs-step-ico {{ Route::is('admin.courses.edit') || Route::is('admin.course-media') || Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') || Route::is('admin.course-seo') || Route::is('admin.submit-for-review') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16"/>
            </svg>
        </span>
        <a class="list-group-item {{ Route::is('admin.course-media') || Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') || Route::is('admin.course-seo') || Route::is('admin.submit-for-review') ? 'active' : '' }}"
        href="{{ route('admin.course-media', ['course_id' => $course->id, 'req_type' => 'from_create'] ) }}">
            <h4 class="crancy-psidebar__title">{{ __('translate.Image & Video') }} </h4>
        </a>

        <span class="crs-step-ico {{ Route::is('admin.course-media') || Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') || Route::is('admin.course-seo') || Route::is('admin.submit-for-review') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16"/>
        </svg>
        </span>



        <a class="list-group-item {{ Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') || Route::is('admin.course-seo') || Route::is('admin.submit-for-review') ? 'active' : '' }}"
        href="{{ route('admin.course-curriculum', ['course_id' => $course->id, 'req_type' => 'from_create']  ) }}" role="tab">

            <h4 class="crancy-psidebar__title">{{ __('translate.Curriculum') }} </h4>
        </a>

        <span class="crs-step-ico {{ Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') || Route::is('admin.course-seo') || Route::is('admin.submit-for-review') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16"/>
                </svg>
        </span>
        <a class="list-group-item {{ Route::is('admin.course-seo') || Route::is('admin.submit-for-review') ? 'active' : '' }}"
        href="{{ route('admin.course-seo', ['course_id' => $course->id, 'req_type' => 'from_create']  ) }}">

            <h4 class="crancy-psidebar__title">{{ __('translate.SEO Setup') }} </h4>
        </a>




        @if ($course->approved_by_admin != 'approved')

            <span class="crs-step-ico {{ Route::is('admin.submit-for-review') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16"/>
            </svg>
        </span>
            <a class="list-group-item {{ Route::is('admin.submit-for-review') ? 'active' : '' }}"
            href="{{ route('admin.submit-for-review', ['course_id' => $course->id, 'req_type' => 'from_create']  ) }}" role="tab">
                <h4 class="crancy-psidebar__title">{{ __('translate.Submit for Review') }} </h4>
            </a>
        @endif


</div>

@else
    <div class="list-group crancy-psidebar__list" id="list-tab" role="tablist">
        <a class="list-group-item {{ Route::is('admin.courses.edit') ? 'active' : '' }}"
        href="{{ route('admin.courses.edit', ['course' => $course->id, 'lang_code' => admin_lang()] ) }}">

            <h4 class="crancy-psidebar__title">{{ __('translate.Basic Information') }}</h4>
        </a>
        <span class="crs-step-ico {{ Route::is('admin.courses.edit') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16"/>
    </svg>
        </span>
        <a class="list-group-item {{ Route::is('admin.course-media') ? 'active' : '' }}"
        href="{{ route('admin.course-media', $course->id ) }}">
            <h4 class="crancy-psidebar__title">{{ __('translate.Image & Video') }} </h4>
        </a>

        <span class="crs-step-ico {{ Route::is('admin.course-media') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16"/>
    </svg>
        </span>



        <a class="list-group-item {{ Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') ? 'active' : '' }}"
        href="{{ route('admin.course-curriculum', $course->id ) }}" role="tab">

            <h4 class="crancy-psidebar__title">{{ __('translate.Curriculum') }} </h4>
        </a>
        <span class="crs-step-ico {{ Route::is('admin.course-curriculum') || Route::is('admin.course-lesson') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16"/>
            </svg>
    </span>
        <a class="list-group-item {{ Route::is('admin.course-seo') ? 'active' : '' }}"
        href="{{ route('admin.course-seo', $course->id ) }}">

            <h4 class="crancy-psidebar__title">{{ __('translate.SEO Setup') }} </h4>
        </a>




        @if ($course->approved_by_admin != 'approved')

            <span class="crs-step-ico {{ Route::is('admin.submit-for-review') ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M9.00005 6L15 12L9 18" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="16"/>
            </svg>
        </span>
            <a class="list-group-item {{ Route::is('admin.submit-for-review') ? 'active' : '' }}"
            href="{{ route('admin.submit-for-review', $course->id ) }}" role="tab">
                <h4 class="crancy-psidebar__title">{{ __('translate.Submit for Review') }} </h4>
            </a>
        @endif


    </div>

@endif
