@extends('admin.master_layout')
@section('title')
<title>{{ __('translate.Setting') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Setting') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Dashboard') }} >> {{ __('translate.Setting') }}</p>
@endsection

@section('body-content')

<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row row__bscreen">
            <div class="col-12">
                <div class="crancy-body">
                    <!-- Dashboard Inner -->
                    <div class="crancy-dsinner">
                        <div class="crancy-personals mg-top-30">
                            <div class="row">
                                <div class="col-lg-3 col-md-2 col-12 crancy-personals__list">
                                    <div class="crancy-psidebar">
                                        <!-- Features Tab List -->
                                        <div class="list-group crancy-psidebar__list" id="list-tab" role="tablist">
                                            <a class="list-group-item active" data-bs-toggle="list" href="#id1" role="tab" aria-selected="true"><span class="crancy-psidebar__icon">

                                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5 12C15.5 13.933 13.933 15.5 12 15.5C10.067 15.5 8.5 13.933 8.5 12C8.5 10.067 10.067 8.5 12 8.5C13.933 8.5 15.5 10.067 15.5 12Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M22 13.9669V10.0332C19.1433 10.0332 17.2857 6.93041 18.732 4.46691L15.2679 2.5001C13.8038 4.99405 10.1978 4.99395 8.73363 2.5L5.26953 4.46681C6.71586 6.93035 4.85673 10.0332 2 10.0332V13.9669C4.85668 13.9669 6.71425 17.0697 5.26795 19.5332L8.73205 21.5C10.1969 19.0048 13.8046 19.0047 15.2695 21.4999L18.7336 19.5331C17.2874 17.0696 19.1434 13.9669 22 13.9669Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>



                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.General Setting') }}</h4>
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#id2" role="tab" aria-selected="false"><span class="crancy-psidebar__icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19.5 9.49988C20.6046 9.49988 21.5 10.3953 21.5 11.4999V19.4999C21.5 20.6044 20.6046 21.4999 19.5 21.4999H11.5C10.3954 21.4999 9.5 20.6044 9.5 19.4999V11.4999C9.5 10.3953 10.3954 9.49988 11.5 9.49988H19.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M18 9.5V7.99988C18 6.89531 17.1046 5.99988 16 5.99988H8C6.89543 5.99988 6 6.89531 6 7.99988V15.9999C6 17.1044 6.89543 17.9999 8 17.9999H9.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M14.5 6V4.49988C14.5 3.39531 13.6046 2.49988 12.5 2.49988H4.5C3.39543 2.49988 2.5 3.39531 2.5 4.49988V12.4999C2.5 13.6044 3.39543 14.4999 4.5 14.4999H6" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
</svg>


                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Logo and Favicon') }} </h4>
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#id3" role="tab" aria-selected="false"><span class="crancy-psidebar__icon">
                                               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.4649 10C14.7733 8.8044 13.4806 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16C13.8638 16 15.4299 14.7252 15.874 13M15.4649 10V7.5M15.4649 10L13.5 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>



                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Google reCaptcha') }} </h4>
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#id4" role="tab" aria-selected="false"><span class="crancy-psidebar__icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7 18V16M12 18V15M17 18V13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M19.5 2.5C20.6046 2.5 21.5 3.39543 21.5 4.5V19.5C21.5 20.6046 20.6046 21.5 19.5 21.5H4.5C3.39543 21.5 2.5 20.6046 2.5 19.5V4.5C2.5 3.39543 3.39543 2.5 4.5 2.5H19.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M15 6H18V9M6 12C13 12 17.5 6.5 17.5 6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Tawk Chat') }} </h4>
                                            </a>
                                            <a class="list-group-item" data-bs-toggle="list" href="#id5" role="tab" aria-selected="false"><span class="crancy-psidebar__icon ">
                                             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19.5 2.5H4.5C3.39543 2.5 2.5 3.39543 2.5 4.5V19.5C2.5 20.6046 3.39543 21.5 4.5 21.5H19.5C20.6046 21.5 21.5 20.6046 21.5 19.5V4.5C21.5 3.39543 20.6046 2.5 19.5 2.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M2.5 9H21.5" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M17 17C17 14.2386 14.7614 12 12 12C9.23858 12 7 14.2386 7 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M12.5 15L11 16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M10.9955 6H11.0045M7 6H7.00897" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>



                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Google Analytic') }} </h4>
                                            </a>



                                            <a class="list-group-item" data-bs-toggle="list" href="#id6" role="tab" aria-selected="false"><span class="crancy-psidebar__icon">
                                               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19.5 2.5C20.6046 2.5 21.5 3.39543 21.5 4.5V19.5C21.5 20.6046 20.6046 21.5 19.5 21.5H4.5C3.39543 21.5 2.5 20.6046 2.5 19.5V4.5C2.5 3.39543 3.39543 2.5 4.5 2.5H19.5Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M17 7.5H14.0005C12.893 7.5 11.9964 8.39996 12.0005 9.50742L12.0153 13.4995M12.0153 13.4995V21.5M12.0153 13.4995H10M12.0153 13.4995H14.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Facebook Pixel') }}</h4>
                                            </a>

                                            <a class="list-group-item" data-bs-toggle="list" href="#id7" role="tab" aria-selected="false">
                                                <span class="crancy-psidebar__icon">
                                               <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9 11.5H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M10.5 15.5H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M19.5 5.5L18.6139 20.121C18.5499 21.1766 17.6751 22 16.6175 22H7.38246C6.32488 22 5.4501 21.1766 5.38612 20.121L4.5 5.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M3 5.5H8M8 5.5L9.24025 2.60608C9.39783 2.2384 9.75937 2 10.1594 2H13.8406C14.2406 2 14.6022 2.2384 14.7597 2.60608L16 5.5M8 5.5H16M21 5.5H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


                                                </span>
                                                <h4 class="crancy-psidebar__title">{{ __('translate.Database Clear') }}</h4>
                                            </a>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-9 col-md-10 col-12  crancy-personals__content">
                                    <div class="crancy-ptabs">

                                        <div class="crancy-ptabs__inner">
                                            <div class="tab-content" id="nav-tabContent">
                                                <!--  Features Single Tab -->
                                                <div class="tab-pane fade active show" id="id1" role="tabpanel">
                                                    <form action="{{ route('admin.update-general-setting') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.General Setting') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.App Name') }} </label>
                                                                                            <input class="crancy__item-input" type="text" value="{{ $general_setting->app_name }}" name="app_name">
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group  mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Commission Type') }}</label>
                                                                                            <select class="form-select crancy__item-input" name="commission_type" id="commission_type">
                                                                                                <option {{ $general_setting->commission_type == 'commission' ? 'selected' : '' }} value="commission">{{ __('translate.Commission') }}</option>


                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12 {{ $general_setting->commission_type == 'subscription' ? 'd-none' : '' }}" id="commission_per_sale">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Commission per sale (%)') }} </label>
                                                                                            <input class="crancy__item-input" type="text" value="{{ $general_setting->commission_per_sale }}" name="commission_per_sale">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group  mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Preloader Status') }}</label>
                                                                                            <select class="form-select crancy__item-input" name="preloader_status">
                                                                                                <option {{ $general_setting->preloader_status == 'enable' ? 'selected' : '' }} value="enable">{{ __('translate.Enable') }}</option>
                                                                                                <option {{ $general_setting->preloader_status == 'disable' ? 'selected' : '' }} value="disable">{{ __('translate.Disable') }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group  mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Select Theme') }}</label>
                                                                                            <select class="form-select crancy__item-input" name="selected_theme">
                                                                                                <option {{ $general_setting->selected_theme == 'all_theme' ? 'selected' : '' }} value="all_theme">{{ __('translate.All Theme') }}</option>
                                                                                                <option {{ $general_setting->selected_theme == 'theme_one' ? 'selected' : '' }} value="theme_one">{{ __('translate.Theme One') }}</option>
                                                                                                <option {{ $general_setting->selected_theme == 'theme_two' ? 'selected' : '' }} value="theme_two">{{ __('translate.Theme Two') }}</option>
                                                                                                <option {{ $general_setting->selected_theme == 'theme_three' ? 'selected' : '' }} value="theme_three">{{ __('translate.Theme Three') }}</option>
                                                                                                <option {{ $general_setting->selected_theme == 'theme_four' ? 'selected' : '' }} value="theme_four">{{ __('translate.Theme Four') }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group  mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Blog Layout') }}</label>
                                                                                            <select class="form-select crancy__item-input" name="blog_theme">
                                                                                                <option {{ $general_setting->blog_theme == 'all_theme' ? 'selected' : '' }} value="all_theme">{{ __('translate.All Layout') }}</option>
                                                                                                <option {{ $general_setting->blog_theme == 'with_sidebar' ? 'selected' : '' }} value="with_sidebar">{{ __('translate.With Sidebar') }}</option>

                                                                                                <option {{ $general_setting->blog_theme == 'without_sidebar' ? 'selected' : '' }} value="without_sidebar">{{ __('translate.Without Sidebar') }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group  mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Course Layout') }}</label>
                                                                                            <select class="form-select crancy__item-input" name="course_theme">
                                                                                                <option {{ $general_setting->course_theme == 'all_theme' ? 'selected' : '' }} value="all_theme">{{ __('translate.All Layout') }}</option>
                                                                                                <option {{ $general_setting->course_theme == 'with_sidebar' ? 'selected' : '' }} value="with_sidebar">{{ __('translate.With Sidebar') }}</option>

                                                                                                <option {{ $general_setting->course_theme == 'without_sidebar' ? 'selected' : '' }} value="without_sidebar">{{ __('translate.Without Sidebar') }}</option>

                                                                                            </select>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Contact Message Receiver Email') }} </label>
                                                                                            <input class="crancy__item-input" type="text" value="{{ $general_setting->contact_message_mail }}" name="contact_message_mail">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group  mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Timezone') }}</label>
                                                                                            <select class="form-select crancy__item-input" name="timezone">
                                                                                                <option {{ $general_setting->timezone == 'Africa/Abidjan' ? 'selected' : '' }} value="Africa/Abidjan" selected>Africa/Abidjan</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Accra' ? 'selected' : '' }} value="Africa/Accra" >Africa/Accra</option>
                                                                                                <option  {{ $general_setting->timezone == 'Africa/Addis_Ababa' ? 'selected' : '' }}value="Africa/Addis_Ababa" >Africa/Addis_Ababa</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Algiers' ? 'selected' : '' }} value="Africa/Algiers" >Africa/Algiers</option>
                                                                                                <option  {{ $general_setting->timezone == 'Africa/Asmara' ? 'selected' : '' }}value="Africa/Asmara" >Africa/Asmara</option>
                                                                                                <option  {{ $general_setting->timezone == 'Africa/Bamako' ? 'selected' : '' }}value="Africa/Bamako" >Africa/Bamako</option>
                                                                                                <option  {{ $general_setting->timezone == 'Africa/Bangui' ? 'selected' : '' }}value="Africa/Bangui" >Africa/Bangui</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Banjul' ? 'selected' : '' }} value="Africa/Banjul" >Africa/Banjul</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Bissau' ? 'selected' : '' }} value="Africa/Bissau" >Africa/Bissau</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Blantyre' ? 'selected' : '' }} value="Africa/Blantyre" >Africa/Blantyre</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Brazzaville' ? 'selected' : '' }} value="Africa/Brazzaville" >Africa/Brazzaville</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Bujumbura' ? 'selected' : '' }} value="Africa/Bujumbura" >Africa/Bujumbura</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Cairo"' ? 'selected' : '' }} value="Africa/Cairo" >Africa/Cairo</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Casablanca' ? 'selected' : '' }} value="Africa/Casablanca" >Africa/Casablanca</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Ceuta' ? 'selected' : '' }} value="Africa/Ceuta" >Africa/Ceuta</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Conakry' ? 'selected' : '' }} value="Africa/Conakry" >Africa/Conakry</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Dakar' ? 'selected' : '' }} value="Africa/Dakar" >Africa/Dakar</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Dar_es_Salaam' ? 'selected' : '' }} value="Africa/Dar_es_Salaam" >Africa/Dar_es_Salaam</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Djibouti' ? 'selected' : '' }} value="Africa/Djibouti" >Africa/Djibouti</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Douala' ? 'selected' : '' }} value="Africa/Douala" >Africa/Douala</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/El_Aaiun' ? 'selected' : '' }} value="Africa/El_Aaiun" >Africa/El_Aaiun</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Freetown' ? 'selected' : '' }} value="Africa/Freetown" >Africa/Freetown</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Gaborone' ? 'selected' : '' }} value="Africa/Gaborone" >Africa/Gaborone</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Harare' ? 'selected' : '' }} value="Africa/Harare" >Africa/Harare</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Johannesburg' ? 'selected' : '' }} value="Africa/Johannesburg" >Africa/Johannesburg</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Juba' ? 'selected' : '' }} value="Africa/Juba" >Africa/Juba</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Kampala' ? 'selected' : '' }} value="Africa/Kampala" >Africa/Kampala</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Khartoum' ? 'selected' : '' }} value="Africa/Khartoum" >Africa/Khartoum</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Kigali' ? 'selected' : '' }} value="Africa/Kigali" >Africa/Kigali</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Kinshasa' ? 'selected' : '' }} value="Africa/Kinshasa" >Africa/Kinshasa</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Lagos' ? 'selected' : '' }} value="Africa/Lagos" >Africa/Lagos</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Libreville' ? 'selected' : '' }} value="Africa/Libreville" >Africa/Libreville</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Lome' ? 'selected' : '' }} value="Africa/Lome" >Africa/Lome</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Luanda' ? 'selected' : '' }} value="Africa/Luanda" >Africa/Luanda</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Lubumbashi' ? 'selected' : '' }} value="Africa/Lubumbashi" >Africa/Lubumbashi</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Lusaka' ? 'selected' : '' }} value="Africa/Lusaka" >Africa/Lusaka</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Malabo' ? 'selected' : '' }} value="Africa/Malabo" >Africa/Malabo</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Maputo' ? 'selected' : '' }} value="Africa/Maputo" >Africa/Maputo</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Maseru' ? 'selected' : '' }} value="Africa/Maseru" >Africa/Maseru</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Mbabane' ? 'selected' : '' }} value="Africa/Mbabane" >Africa/Mbabane</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Mogadishu' ? 'selected' : '' }} value="Africa/Mogadishu" >Africa/Mogadishu</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Monrovia' ? 'selected' : '' }} value="Africa/Monrovia" >Africa/Monrovia</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Nairobi' ? 'selected' : '' }} value="Africa/Nairobi" >Africa/Nairobi</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Ndjamena' ? 'selected' : '' }} value="Africa/Ndjamena" >Africa/Ndjamena</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Niamey' ? 'selected' : '' }} value="Africa/Niamey" >Africa/Niamey</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Nouakchott' ? 'selected' : '' }} value="Africa/Nouakchott" >Africa/Nouakchott</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Ouagadougou' ? 'selected' : '' }} value="Africa/Ouagadougou" >Africa/Ouagadougou</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Porto-Novo' ? 'selected' : '' }} value="Africa/Porto-Novo" >Africa/Porto-Novo</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Sao_Tome' ? 'selected' : '' }} value="Africa/Sao_Tome" >Africa/Sao_Tome</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Tripoli' ? 'selected' : '' }} value="Africa/Tripoli" >Africa/Tripoli</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Tunis' ? 'selected' : '' }} value="Africa/Tunis" >Africa/Tunis</option>
                                                                                                <option {{ $general_setting->timezone == 'Africa/Windhoek' ? 'selected' : '' }} value="Africa/Windhoek" >Africa/Windhoek</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Adak' ? 'selected' : '' }} value="America/Adak" >America/Adak</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Anchorage' ? 'selected' : '' }} value="America/Anchorage" >America/Anchorage</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Anguilla' ? 'selected' : '' }} value="America/Anguilla" >America/Anguilla</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Antigua' ? 'selected' : '' }} value="America/Antigua" >America/Antigua</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Araguaina' ? 'selected' : '' }} value="America/Araguaina" >America/Araguaina</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/Buenos_Aires' ? 'selected' : '' }} value="America/Argentina/Buenos_Aires" >America/Argentina/Buenos_Aires</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/Catamarca' ? 'selected' : '' }} value="America/Argentina/Catamarca" >America/Argentina/Catamarca</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/Cordoba' ? 'selected' : '' }} value="America/Argentina/Cordoba" >America/Argentina/Cordoba</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/Jujuy' ? 'selected' : '' }} value="America/Argentina/Jujuy" >America/Argentina/Jujuy</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/La_Rioja' ? 'selected' : '' }} value="America/Argentina/La_Rioja" >America/Argentina/La_Rioja</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/Mendoza' ? 'selected' : '' }} value="America/Argentina/Mendoza" >America/Argentina/Mendoza</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/Rio_Gallegos' ? 'selected' : '' }} value="America/Argentina/Rio_Gallegos" >America/Argentina/Rio_Gallegos</option>

                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/Salta' ? 'selected' : '' }}  value="America/Argentina/Salta" >America/Argentina/Salta</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/San_Juan' ? 'selected' : '' }}  value="America/Argentina/San_Juan" >America/Argentina/San_Juan</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/San_Luis' ? 'selected' : '' }}  value="America/Argentina/San_Luis" >America/Argentina/San_Luis</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/Tucuman' ? 'selected' : '' }}  value="America/Argentina/Tucuman" >America/Argentina/Tucuman</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Argentina/Ushuaia' ? 'selected' : '' }}  value="America/Argentina/Ushuaia" >America/Argentina/Ushuaia</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Aruba' ? 'selected' : '' }}  value="America/Aruba" >America/Aruba</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Asuncion' ? 'selected' : '' }}  value="America/Asuncion" >America/Asuncion</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Atikokan' ? 'selected' : '' }}  value="America/Atikokan" >America/Atikokan</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Bahia' ? 'selected' : '' }}  value="America/Bahia" >America/Bahia</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Bahia_Banderas' ? 'selected' : '' }}  value="America/Bahia_Banderas" >America/Bahia_Banderas</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Barbados' ? 'selected' : '' }}  value="America/Barbados" >America/Barbados</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Belem' ? 'selected' : '' }}  value="America/Belem" >America/Belem</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Belize' ? 'selected' : '' }}  value="America/Belize" >America/Belize</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Blanc-Sablon' ? 'selected' : '' }}  value="America/Blanc-Sablon" >America/Blanc-Sablon</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Boa_Vista' ? 'selected' : '' }}  value="America/Boa_Vista" >America/Boa_Vista</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Bogota' ? 'selected' : '' }}  value="America/Bogota" >America/Bogota</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Boise' ? 'selected' : '' }}  value="America/Boise" >America/Boise</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Cambridge_Bay' ? 'selected' : '' }}  value="America/Cambridge_Bay" >America/Cambridge_Bay</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Campo_Grande' ? 'selected' : '' }}  value="America/Campo_Grande" >America/Campo_Grande</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Cancun' ? 'selected' : '' }}  value="America/Cancun" >America/Cancun</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Caracas' ? 'selected' : '' }}  value="America/Caracas" >America/Caracas</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Cayenne' ? 'selected' : '' }}  value="America/Cayenne" >America/Cayenne</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Cayman' ? 'selected' : '' }}  value="America/Cayman" >America/Cayman</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Chicago' ? 'selected' : '' }}  value="America/Chicago" >America/Chicago</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Chihuahua' ? 'selected' : '' }}  value="America/Chihuahua" >America/Chihuahua</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Costa_Rica' ? 'selected' : '' }}  value="America/Costa_Rica" >America/Costa_Rica</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Creston' ? 'selected' : '' }}  value="America/Creston" >America/Creston</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Cuiaba' ? 'selected' : '' }}  value="America/Cuiaba" >America/Cuiaba</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Curacao' ? 'selected' : '' }}  value="America/Curacao" >America/Curacao</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Danmarkshavn' ? 'selected' : '' }}  value="America/Danmarkshavn" >America/Danmarkshavn</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Dawson' ? 'selected' : '' }}  value="America/Dawson" >America/Dawson</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Dawson_Creek' ? 'selected' : '' }}  value="America/Dawson_Creek" >America/Dawson_Creek</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Denver' ? 'selected' : '' }}  value="America/Denver" >America/Denver</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Detroit' ? 'selected' : '' }}  value="America/Detroit" >America/Detroit</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Dominica' ? 'selected' : '' }}  value="America/Dominica" >America/Dominica</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Edmonton' ? 'selected' : '' }}  value="America/Edmonton" >America/Edmonton</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Eirunepe' ? 'selected' : '' }}  value="America/Eirunepe" >America/Eirunepe</option>
                                                                                                <option {{ $general_setting->timezone == 'America/El_Salvador' ? 'selected' : '' }}  value="America/El_Salvador" >America/El_Salvador</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Fort_Nelson' ? 'selected' : '' }}  value="America/Fort_Nelson" >America/Fort_Nelson</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Fortaleza' ? 'selected' : '' }}  value="America/Fortaleza" >America/Fortaleza</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Glace_Bay' ? 'selected' : '' }}  value="America/Glace_Bay" >America/Glace_Bay</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Goose_Bay' ? 'selected' : '' }}  value="America/Goose_Bay" >America/Goose_Bay</option>

                                                                                                <option {{ $general_setting->timezone == 'America/Grand_Turk' ? 'selected' : '' }}  value="America/Grand_Turk" >America/Grand_Turk</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Grenada' ? 'selected' : '' }}  value="America/Grenada" >America/Grenada</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Guadeloupe' ? 'selected' : '' }}  value="America/Guadeloupe" >America/Guadeloupe</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Guatemala' ? 'selected' : '' }}  value="America/Guatemala" >America/Guatemala</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Guayaquil' ? 'selected' : '' }}  value="America/Guayaquil" >America/Guayaquil</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Guyana' ? 'selected' : '' }}  value="America/Guyana" >America/Guyana</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Halifax' ? 'selected' : '' }}  value="America/Halifax" >America/Halifax</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Havana' ? 'selected' : '' }}  value="America/Havana" >America/Havana</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Hermosillo' ? 'selected' : '' }}  value="America/Hermosillo" >America/Hermosillo</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Indiana/Indianapolis' ? 'selected' : '' }}  value="America/Indiana/Indianapolis" >America/Indiana/Indianapolis</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Indiana/Knox' ? 'selected' : '' }}  value="America/Indiana/Knox" >America/Indiana/Knox</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Indiana/Marengo' ? 'selected' : '' }}  value="America/Indiana/Marengo" >America/Indiana/Marengo</option>

                                                                                                <option {{ $general_setting->timezone == 'America/Indiana/Petersburg' ? 'selected' : '' }}  value="America/Indiana/Petersburg" >America/Indiana/Petersburg</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Indiana/Tell_City' ? 'selected' : '' }}  value="America/Indiana/Tell_City" >America/Indiana/Tell_City</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Indiana/Vevay' ? 'selected' : '' }}  value="America/Indiana/Vevay" >America/Indiana/Vevay</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Indiana/Vincennes' ? 'selected' : '' }}  value="America/Indiana/Vincennes" >America/Indiana/Vincennes</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Indiana/Winamac' ? 'selected' : '' }}  value="America/Indiana/Winamac" >America/Indiana/Winamac</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Inuvik' ? 'selected' : '' }}  value="America/Inuvik" >America/Inuvik</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Iqaluit' ? 'selected' : '' }}  value="America/Iqaluit" >America/Iqaluit</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Jamaica' ? 'selected' : '' }}  value="America/Jamaica" >America/Jamaica</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Juneau' ? 'selected' : '' }}  value="America/Juneau" >America/Juneau</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Kentucky/Louisville' ? 'selected' : '' }}  value="America/Kentucky/Louisville" >America/Kentucky/Louisville</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Kentucky/Monticello' ? 'selected' : '' }}  value="America/Kentucky/Monticello" >America/Kentucky/Monticello</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Kralendijk' ? 'selected' : '' }}  value="America/Kralendijk" >America/Kralendijk</option>
                                                                                                <option {{ $general_setting->timezone == 'America/La_Paz' ? 'selected' : '' }}  value="America/La_Paz" >America/La_Paz</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Lima' ? 'selected' : '' }}  value="America/Lima" >America/Lima</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Los_Angeles' ? 'selected' : '' }}  value="America/Los_Angeles" >America/Los_Angeles</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Lower_Princes' ? 'selected' : '' }}  value="America/Lower_Princes" >America/Lower_Princes</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Maceio' ? 'selected' : '' }}  value="America/Maceio" >America/Maceio</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Managua' ? 'selected' : '' }}  value="America/Managua" >America/Managua</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Manaus' ? 'selected' : '' }}  value="America/Manaus" >America/Manaus</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Marigot' ? 'selected' : '' }}  value="America/Marigot" >America/Marigot</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Martinique' ? 'selected' : '' }}  value="America/Martinique" >America/Martinique</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Matamoros' ? 'selected' : '' }}  value="America/Matamoros" >America/Matamoros</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Mazatlan' ? 'selected' : '' }}  value="America/Mazatlan" >America/Mazatlan</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Menominee' ? 'selected' : '' }}  value="America/Menominee" >America/Menominee</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Merida' ? 'selected' : '' }}  value="America/Merida" >America/Merida</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Metlakatla' ? 'selected' : '' }}  value="America/Metlakatla" >America/Metlakatla</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Mexico_City' ? 'selected' : '' }}  value="America/Mexico_City" >America/Mexico_City</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Miquelon' ? 'selected' : '' }}  value="America/Miquelon" >America/Miquelon</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Moncton' ? 'selected' : '' }}  value="America/Moncton" >America/Moncton</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Monterrey' ? 'selected' : '' }}  value="America/Monterrey" >America/Monterrey</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Montevideo' ? 'selected' : '' }}  value="America/Montevideo" >America/Montevideo</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Montserrat' ? 'selected' : '' }}  value="America/Montserrat" >America/Montserrat</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Nassau' ? 'selected' : '' }}  value="America/Nassau" >America/Nassau</option>
                                                                                                <option {{ $general_setting->timezone == 'America/New_York' ? 'selected' : '' }}  value="America/New_York" >America/New_York</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Nipigon' ? 'selected' : '' }}  value="America/Nipigon" >America/Nipigon</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Nome' ? 'selected' : '' }}  value="America/Nome" >America/Nome</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Noronha' ? 'selected' : '' }}  value="America/Noronha" >America/Noronha</option>
                                                                                                <option {{ $general_setting->timezone == 'America/North_Dakota/Beulah' ? 'selected' : '' }}  value="America/North_Dakota/Beulah" >America/North_Dakota/Beulah</option>
                                                                                                <option {{ $general_setting->timezone == 'America/North_Dakota/Center' ? 'selected' : '' }}  value="America/North_Dakota/Center" >America/North_Dakota/Center</option>
                                                                                                <option {{ $general_setting->timezone == 'America/North_Dakota/New_Salem' ? 'selected' : '' }}  value="America/North_Dakota/New_Salem" >America/North_Dakota/New_Salem</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Nuuk' ? 'selected' : '' }}  value="America/Nuuk" >America/Nuuk</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Ojinaga' ? 'selected' : '' }}  value="America/Ojinaga" >America/Ojinaga</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Panama' ? 'selected' : '' }}  value="America/Panama" >America/Panama</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Pangnirtung' ? 'selected' : '' }}  value="America/Pangnirtung" >America/Pangnirtung</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Paramaribo' ? 'selected' : '' }}  value="America/Paramaribo" >America/Paramaribo</option>


                                                                                                <option {{ $general_setting->timezone == 'America/Phoenix' ? 'selected' : '' }} value="America/Phoenix" >America/Phoenix</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Port-au-Prince' ? 'selected' : '' }} value="America/Port-au-Prince" >America/Port-au-Prince</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Port_of_Spain' ? 'selected' : '' }} value="America/Port_of_Spain" >America/Port_of_Spain</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Porto_Velho' ? 'selected' : '' }} value="America/Porto_Velho" >America/Porto_Velho</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Puerto_Rico' ? 'selected' : '' }} value="America/Puerto_Rico" >America/Puerto_Rico</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Punta_Arenas' ? 'selected' : '' }} value="America/Punta_Arenas" >America/Punta_Arenas</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Rainy_River' ? 'selected' : '' }} value="America/Rainy_River" >America/Rainy_River</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Rankin_Inlet' ? 'selected' : '' }} value="America/Rankin_Inlet" >America/Rankin_Inlet</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Recife' ? 'selected' : '' }} value="America/Recife" >America/Recife</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Regina' ? 'selected' : '' }} value="America/Regina" >America/Regina</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Resolute' ? 'selected' : '' }} value="America/Resolute" >America/Resolute</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Rio_Branco' ? 'selected' : '' }} value="America/Rio_Branco" >America/Rio_Branco</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Santarem' ? 'selected' : '' }} value="America/Santarem" >America/Santarem</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Santiago' ? 'selected' : '' }} value="America/Santiago" >America/Santiago</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Santo_Domingo' ? 'selected' : '' }} value="America/Santo_Domingo" >America/Santo_Domingo</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Sao_Paulo' ? 'selected' : '' }} value="America/Sao_Paulo" >America/Sao_Paulo</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Scoresbysund' ? 'selected' : '' }} value="America/Scoresbysund" >America/Scoresbysund</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Sitka' ? 'selected' : '' }} value="America/Sitka" >America/Sitka</option>
                                                                                                <option {{ $general_setting->timezone == 'America/St_Barthelemy' ? 'selected' : '' }} value="America/St_Barthelemy" >America/St_Barthelemy</option>
                                                                                                <option {{ $general_setting->timezone == 'America/St_Johns' ? 'selected' : '' }} value="America/St_Johns" >America/St_Johns</option>
                                                                                                <option {{ $general_setting->timezone == 'America/St_Kitts' ? 'selected' : '' }} value="America/St_Kitts" >America/St_Kitts</option>
                                                                                                <option {{ $general_setting->timezone == 'America/St_Lucia' ? 'selected' : '' }} value="America/St_Lucia" >America/St_Lucia</option>
                                                                                                <option {{ $general_setting->timezone == 'America/St_Thomas' ? 'selected' : '' }} value="America/St_Thomas" >America/St_Thomas</option>
                                                                                                <option {{ $general_setting->timezone == 'America/St_Vincent' ? 'selected' : '' }} value="America/St_Vincent" >America/St_Vincent</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Swift_Current' ? 'selected' : '' }} value="America/Swift_Current" >America/Swift_Current</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Tegucigalpa' ? 'selected' : '' }} value="America/Tegucigalpa" >America/Tegucigalpa</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Thule' ? 'selected' : '' }} value="America/Thule" >America/Thule</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Thunder_Bay' ? 'selected' : '' }} value="America/Thunder_Bay" >America/Thunder_Bay</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Tijuana' ? 'selected' : '' }} value="America/Tijuana" >America/Tijuana</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Toronto' ? 'selected' : '' }} value="America/Toronto" >America/Toronto</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Tortola' ? 'selected' : '' }} value="America/Tortola" >America/Tortola</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Vancouver' ? 'selected' : '' }} value="America/Vancouver" >America/Vancouver</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Whitehorse' ? 'selected' : '' }} value="America/Whitehorse" >America/Whitehorse</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Winnipeg' ? 'selected' : '' }} value="America/Winnipeg" >America/Winnipeg</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Yakutat' ? 'selected' : '' }} value="America/Yakutat" >America/Yakutat</option>
                                                                                                <option {{ $general_setting->timezone == 'America/Yellowknife' ? 'selected' : '' }} value="America/Yellowknife" >America/Yellowknife</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/Casey' ? 'selected' : '' }} value="Antarctica/Casey" >Antarctica/Casey</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/Davis' ? 'selected' : '' }} value="Antarctica/Davis" >Antarctica/Davis</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/DumontDUrville' ? 'selected' : '' }} value="Antarctica/DumontDUrville" >Antarctica/DumontDUrville</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/Macquarie' ? 'selected' : '' }} value="Antarctica/Macquarie" >Antarctica/Macquarie</option>


                                                                                                <option {{ $general_setting->timezone == 'Antarctica/Mawson' ? 'selected' : '' }} value="Antarctica/Mawson" >Antarctica/Mawson</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/McMurdo' ? 'selected' : '' }} value="Antarctica/McMurdo" >Antarctica/McMurdo</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/Palmer' ? 'selected' : '' }} value="Antarctica/Palmer" >Antarctica/Palmer</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/Rothera' ? 'selected' : '' }} value="Antarctica/Rothera" >Antarctica/Rothera</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/Syowa' ? 'selected' : '' }} value="Antarctica/Syowa" >Antarctica/Syowa</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/Troll' ? 'selected' : '' }} value="Antarctica/Troll" >Antarctica/Troll</option>
                                                                                                <option {{ $general_setting->timezone == 'Antarctica/Vostok' ? 'selected' : '' }} value="Antarctica/Vostok" >Antarctica/Vostok</option>
                                                                                                <option {{ $general_setting->timezone == 'Arctic/Longyearbyen' ? 'selected' : '' }} value="Arctic/Longyearbyen" >Arctic/Longyearbyen</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Aden' ? 'selected' : '' }} value="Asia/Aden" >Asia/Aden</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Almaty' ? 'selected' : '' }} value="Asia/Almaty" >Asia/Almaty</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Amman' ? 'selected' : '' }} value="Asia/Amman" >Asia/Amman</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Anadyr' ? 'selected' : '' }} value="Asia/Anadyr" >Asia/Anadyr</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Aqtau' ? 'selected' : '' }} value="Asia/Aqtau" >Asia/Aqtau</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Aqtobe' ? 'selected' : '' }} value="Asia/Aqtobe" >Asia/Aqtobe</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Ashgabat' ? 'selected' : '' }} value="Asia/Ashgabat" >Asia/Ashgabat</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Atyrau' ? 'selected' : '' }} value="Asia/Atyrau" >Asia/Atyrau</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Baghdad' ? 'selected' : '' }} value="Asia/Baghdad" >Asia/Baghdad</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Bahrain' ? 'selected' : '' }} value="Asia/Bahrain" >Asia/Bahrain</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Baku' ? 'selected' : '' }} value="Asia/Baku" >Asia/Baku</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Bangkok' ? 'selected' : '' }} value="Asia/Bangkok" >Asia/Bangkok</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Barnaul' ? 'selected' : '' }} value="Asia/Barnaul" >Asia/Barnaul</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Beirut' ? 'selected' : '' }} value="Asia/Beirut" >Asia/Beirut</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Bishkek' ? 'selected' : '' }} value="Asia/Bishkek" >Asia/Bishkek</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Brunei' ? 'selected' : '' }} value="Asia/Brunei" >Asia/Brunei</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Chita' ? 'selected' : '' }} value="Asia/Chita" >Asia/Chita</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Choibalsan' ? 'selected' : '' }} value="Asia/Choibalsan" >Asia/Choibalsan</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Colombo' ? 'selected' : '' }} value="Asia/Colombo" >Asia/Colombo</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Damascus' ? 'selected' : '' }} value="Asia/Damascus" >Asia/Damascus</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Dhaka' ? 'selected' : '' }} value="Asia/Dhaka" >Asia/Dhaka</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Dili' ? 'selected' : '' }} value="Asia/Dili" >Asia/Dili</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Dubai' ? 'selected' : '' }} value="Asia/Dubai" >Asia/Dubai</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Dushanbe' ? 'selected' : '' }} value="Asia/Dushanbe" >Asia/Dushanbe</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Famagusta' ? 'selected' : '' }} value="Asia/Famagusta" >Asia/Famagusta</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Gaza' ? 'selected' : '' }} value="Asia/Gaza" >Asia/Gaza</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Hebron' ? 'selected' : '' }} value="Asia/Hebron" >Asia/Hebron</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Ho_Chi_Minh' ? 'selected' : '' }} value="Asia/Ho_Chi_Minh" >Asia/Ho_Chi_Minh</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Hong_Kong' ? 'selected' : '' }} value="Asia/Hong_Kong" >Asia/Hong_Kong</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Hovd' ? 'selected' : '' }} value="Asia/Hovd" >Asia/Hovd</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Irkutsk' ? 'selected' : '' }} value="Asia/Irkutsk" >Asia/Irkutsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Jakarta' ? 'selected' : '' }} value="Asia/Jakarta" >Asia/Jakarta</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Jayapura' ? 'selected' : '' }} value="Asia/Jayapura" >Asia/Jayapura</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Jerusalem' ? 'selected' : '' }} value="Asia/Jerusalem" >Asia/Jerusalem</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Kabul' ? 'selected' : '' }} value="Asia/Kabul" >Asia/Kabul</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Kamchatka' ? 'selected' : '' }} value="Asia/Kamchatka" >Asia/Kamchatka</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Karachi' ? 'selected' : '' }} value="Asia/Karachi" >Asia/Karachi</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Kathmandu' ? 'selected' : '' }} value="Asia/Kathmandu" >Asia/Kathmandu</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Khandyga' ? 'selected' : '' }} value="Asia/Khandyga" >Asia/Khandyga</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Kolkata' ? 'selected' : '' }} value="Asia/Kolkata" >Asia/Kolkata</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Krasnoyarsk' ? 'selected' : '' }} value="Asia/Krasnoyarsk" >Asia/Krasnoyarsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Kuala_Lumpur' ? 'selected' : '' }} value="Asia/Kuala_Lumpur" >Asia/Kuala_Lumpur</option>


                                                                                                <option {{ $general_setting->timezone == 'Asia/Kuching' ? 'selected' : '' }} value="Asia/Kuching" >Asia/Kuching</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Kuwait' ? 'selected' : '' }} value="Asia/Kuwait" >Asia/Kuwait</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Macau' ? 'selected' : '' }} value="Asia/Macau" >Asia/Macau</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Magadan' ? 'selected' : '' }} value="Asia/Magadan" >Asia/Magadan</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Makassar' ? 'selected' : '' }} value="Asia/Makassar" >Asia/Makassar</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Manila' ? 'selected' : '' }} value="Asia/Manila" >Asia/Manila</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Muscat' ? 'selected' : '' }} value="Asia/Muscat" >Asia/Muscat</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Nicosia' ? 'selected' : '' }} value="Asia/Nicosia" >Asia/Nicosia</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Novokuznetsk' ? 'selected' : '' }} value="Asia/Novokuznetsk" >Asia/Novokuznetsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Novosibirsk' ? 'selected' : '' }} value="Asia/Novosibirsk" >Asia/Novosibirsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Omsk' ? 'selected' : '' }} value="Asia/Omsk" >Asia/Omsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Oral' ? 'selected' : '' }} value="Asia/Oral" >Asia/Oral</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Phnom_Penh' ? 'selected' : '' }} value="Asia/Phnom_Penh" >Asia/Phnom_Penh</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Pontianak' ? 'selected' : '' }} value="Asia/Pontianak" >Asia/Pontianak</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Pyongyang' ? 'selected' : '' }} value="Asia/Pyongyang" >Asia/Pyongyang</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Qatar' ? 'selected' : '' }} value="Asia/Qatar" >Asia/Qatar</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Qostanay' ? 'selected' : '' }} value="Asia/Qostanay" >Asia/Qostanay</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Qyzylorda' ? 'selected' : '' }} value="Asia/Qyzylorda" >Asia/Qyzylorda</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Riyadh' ? 'selected' : '' }} value="Asia/Riyadh" >Asia/Riyadh</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Sakhalin' ? 'selected' : '' }} value="Asia/Sakhalin" >Asia/Sakhalin</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Samarkand' ? 'selected' : '' }} value="Asia/Samarkand" >Asia/Samarkand</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Seoul' ? 'selected' : '' }} value="Asia/Seoul" >Asia/Seoul</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Shanghai' ? 'selected' : '' }} value="Asia/Shanghai" >Asia/Shanghai</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Singapore' ? 'selected' : '' }} value="Asia/Singapore" >Asia/Singapore</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Srednekolymsk' ? 'selected' : '' }} value="Asia/Srednekolymsk" >Asia/Srednekolymsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Taipei' ? 'selected' : '' }} value="Asia/Taipei" >Asia/Taipei</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Tashkent' ? 'selected' : '' }} value="Asia/Tashkent" >Asia/Tashkent</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Tbilisi' ? 'selected' : '' }} value="Asia/Tbilisi" >Asia/Tbilisi</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Tehran' ? 'selected' : '' }} value="Asia/Tehran" >Asia/Tehran</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Thimphu' ? 'selected' : '' }} value="Asia/Thimphu" >Asia/Thimphu</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Tokyo' ? 'selected' : '' }} value="Asia/Tokyo" >Asia/Tokyo</option>


                                                                                                <option {{ $general_setting->timezone == 'Asia/Tomsk' ? 'selected' : '' }} value="Asia/Tomsk" >Asia/Tomsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Ulaanbaatar' ? 'selected' : '' }}  value="Asia/Ulaanbaatar" >Asia/Ulaanbaatar</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Urumqi' ? 'selected' : '' }}  value="Asia/Urumqi" >Asia/Urumqi</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Ust-Nera' ? 'selected' : '' }}  value="Asia/Ust-Nera" >Asia/Ust-Nera</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Vientiane' ? 'selected' : '' }}  value="Asia/Vientiane" >Asia/Vientiane</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Vladivostok' ? 'selected' : '' }}  value="Asia/Vladivostok" >Asia/Vladivostok</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Yakutsk' ? 'selected' : '' }}  value="Asia/Yakutsk" >Asia/Yakutsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Yangon' ? 'selected' : '' }}  value="Asia/Yangon" >Asia/Yangon</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Yekaterinburg' ? 'selected' : '' }}  value="Asia/Yekaterinburg" >Asia/Yekaterinburg</option>
                                                                                                <option {{ $general_setting->timezone == 'Asia/Yerevan' ? 'selected' : '' }}  value="Asia/Yerevan" >Asia/Yerevan</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/Azores' ? 'selected' : '' }}  value="Atlantic/Azores" >Atlantic/Azores</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/Bermuda' ? 'selected' : '' }}  value="Atlantic/Bermuda" >Atlantic/Bermuda</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/Canary' ? 'selected' : '' }}  value="Atlantic/Canary" >Atlantic/Canary</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/Cape_Verde' ? 'selected' : '' }}  value="Atlantic/Cape_Verde" >Atlantic/Cape_Verde</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/Faroe' ? 'selected' : '' }}  value="Atlantic/Faroe" >Atlantic/Faroe</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/Madeira' ? 'selected' : '' }}  value="Atlantic/Madeira" >Atlantic/Madeira</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/Reykjavik' ? 'selected' : '' }}  value="Atlantic/Reykjavik" >Atlantic/Reykjavik</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/South_Georgia' ? 'selected' : '' }}  value="Atlantic/South_Georgia" >Atlantic/South_Georgia</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/St_Helena' ? 'selected' : '' }}  value="Atlantic/St_Helena" >Atlantic/St_Helena</option>
                                                                                                <option {{ $general_setting->timezone == 'Atlantic/Stanley' ? 'selected' : '' }}  value="Atlantic/Stanley" >Atlantic/Stanley</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Adelaide' ? 'selected' : '' }}  value="Australia/Adelaide" >Australia/Adelaide</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Brisbane' ? 'selected' : '' }}  value="Australia/Brisbane" >Australia/Brisbane</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Broken_Hill' ? 'selected' : '' }}  value="Australia/Broken_Hill" >Australia/Broken_Hill</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Darwin' ? 'selected' : '' }}  value="Australia/Darwin" >Australia/Darwin</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Eucla' ? 'selected' : '' }}  value="Australia/Eucla" >Australia/Eucla</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Hobart' ? 'selected' : '' }}  value="Australia/Hobart" >Australia/Hobart</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Lindeman' ? 'selected' : '' }}  value="Australia/Lindeman" >Australia/Lindeman</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Lord_Howe' ? 'selected' : '' }}  value="Australia/Lord_Howe" >Australia/Lord_Howe</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Melbourne' ? 'selected' : '' }}  value="Australia/Melbourne" >Australia/Melbourne</option>
                                                                                                <option {{ $general_setting->timezone == 'Australia/Perth' ? 'selected' : '' }}  value="Australia/Perth" >Australia/Perth</option>

                                                                                                <option {{ $general_setting->timezone == 'Australia/Sydney' ? 'selected' : '' }} value="Australia/Sydney" >Australia/Sydney</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Amsterdam' ? 'selected' : '' }} value="Europe/Amsterdam" >Europe/Amsterdam</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Andorra' ? 'selected' : '' }} value="Europe/Andorra" >Europe/Andorra</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Astrakhan' ? 'selected' : '' }} value="Europe/Astrakhan" >Europe/Astrakhan</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Athens' ? 'selected' : '' }} value="Europe/Athens" >Europe/Athens</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Belgrade' ? 'selected' : '' }} value="Europe/Belgrade" >Europe/Belgrade</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Berlin' ? 'selected' : '' }} value="Europe/Berlin" >Europe/Berlin</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Bratislava' ? 'selected' : '' }} value="Europe/Bratislava" >Europe/Bratislava</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Brussels' ? 'selected' : '' }} value="Europe/Brussels" >Europe/Brussels</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Bucharest' ? 'selected' : '' }} value="Europe/Bucharest" >Europe/Bucharest</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Budapest' ? 'selected' : '' }} value="Europe/Budapest" >Europe/Budapest</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Busingen' ? 'selected' : '' }} value="Europe/Busingen" >Europe/Busingen</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Chisinau' ? 'selected' : '' }} value="Europe/Chisinau" >Europe/Chisinau</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Copenhagen' ? 'selected' : '' }} value="Europe/Copenhagen" >Europe/Copenhagen</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Dublin' ? 'selected' : '' }} value="Europe/Dublin" >Europe/Dublin</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Gibraltar' ? 'selected' : '' }} value="Europe/Gibraltar" >Europe/Gibraltar</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Guernsey' ? 'selected' : '' }} value="Europe/Guernsey" >Europe/Guernsey</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Helsinki' ? 'selected' : '' }} value="Europe/Helsinki" >Europe/Helsinki</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Isle_of_Man' ? 'selected' : '' }} value="Europe/Isle_of_Man" >Europe/Isle_of_Man</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Istanbul' ? 'selected' : '' }} value="Europe/Istanbul" >Europe/Istanbul</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Jersey' ? 'selected' : '' }} value="Europe/Jersey" >Europe/Jersey</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Kaliningrad' ? 'selected' : '' }} value="Europe/Kaliningrad" >Europe/Kaliningrad</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Kiev' ? 'selected' : '' }} value="Europe/Kiev" >Europe/Kiev</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Kirov' ? 'selected' : '' }} value="Europe/Kirov" >Europe/Kirov</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Lisbon' ? 'selected' : '' }} value="Europe/Lisbon" >Europe/Lisbon</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Ljubljana' ? 'selected' : '' }} value="Europe/Ljubljana" >Europe/Ljubljana</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/London' ? 'selected' : '' }} value="Europe/London" >Europe/London</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Luxembourg' ? 'selected' : '' }} value="Europe/Luxembourg" >Europe/Luxembourg</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Madrid' ? 'selected' : '' }} value="Europe/Madrid" >Europe/Madrid</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Malta' ? 'selected' : '' }} value="Europe/Malta" >Europe/Malta</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Mariehamn' ? 'selected' : '' }} value="Europe/Mariehamn" >Europe/Mariehamn</option>

                                                                                                <option {{ $general_setting->timezone == 'Europe/Minsk' ? 'selected' : '' }} value="Europe/Minsk" >Europe/Minsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Monaco' ? 'selected' : '' }} value="Europe/Monaco" >Europe/Monaco</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Moscow' ? 'selected' : '' }} value="Europe/Moscow" >Europe/Moscow</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Oslo' ? 'selected' : '' }} value="Europe/Oslo" >Europe/Oslo</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Paris' ? 'selected' : '' }} value="Europe/Paris" >Europe/Paris</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Podgorica' ? 'selected' : '' }} value="Europe/Podgorica" >Europe/Podgorica</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Prague' ? 'selected' : '' }} value="Europe/Prague" >Europe/Prague</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Riga' ? 'selected' : '' }} value="Europe/Riga" >Europe/Riga</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Rome' ? 'selected' : '' }} value="Europe/Rome" >Europe/Rome</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Samara' ? 'selected' : '' }} value="Europe/Samara" >Europe/Samara</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/San_Marino' ? 'selected' : '' }} value="Europe/San_Marino" >Europe/San_Marino</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Sarajevo' ? 'selected' : '' }} value="Europe/Sarajevo" >Europe/Sarajevo</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Saratov' ? 'selected' : '' }} value="Europe/Saratov" >Europe/Saratov</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Simferopol' ? 'selected' : '' }} value="Europe/Simferopol" >Europe/Simferopol</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Skopje' ? 'selected' : '' }} value="Europe/Skopje" >Europe/Skopje</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Sofia' ? 'selected' : '' }} value="Europe/Sofia" >Europe/Sofia</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Stockholm' ? 'selected' : '' }} value="Europe/Stockholm" >Europe/Stockholm</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Tallinn' ? 'selected' : '' }} value="Europe/Tallinn" >Europe/Tallinn</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Tirane' ? 'selected' : '' }} value="Europe/Tirane" >Europe/Tirane</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Ulyanovsk' ? 'selected' : '' }} value="Europe/Ulyanovsk" >Europe/Ulyanovsk</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Uzhgorod' ? 'selected' : '' }} value="Europe/Uzhgorod" >Europe/Uzhgorod</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Vaduz' ? 'selected' : '' }} value="Europe/Vaduz" >Europe/Vaduz</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Vatican' ? 'selected' : '' }} value="Europe/Vatican" >Europe/Vatican</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Vienna' ? 'selected' : '' }} value="Europe/Vienna" >Europe/Vienna</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Vilnius' ? 'selected' : '' }} value="Europe/Vilnius" >Europe/Vilnius</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Volgograd' ? 'selected' : '' }} value="Europe/Volgograd" >Europe/Volgograd</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Warsaw' ? 'selected' : '' }} value="Europe/Warsaw" >Europe/Warsaw</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Zagreb' ? 'selected' : '' }} value="Europe/Zagreb" >Europe/Zagreb</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Zaporozhye' ? 'selected' : '' }} value="Europe/Zaporozhye" >Europe/Zaporozhye</option>
                                                                                                <option {{ $general_setting->timezone == 'Europe/Zurich' ? 'selected' : '' }} value="Europe/Zurich" >Europe/Zurich</option>
                                                                                                <option {{ $general_setting->timezone == 'Indian/Antananarivo' ? 'selected' : '' }} value="Indian/Antananarivo" >Indian/Antananarivo</option>
                                                                                                <option {{ $general_setting->timezone == 'Indian/Chagos' ? 'selected' : '' }} value="Indian/Chagos" >Indian/Chagos</option>

                                                                                                <option  {{ $general_setting->timezone == 'Indian/Christmas' ? 'selected' : '' }} value="Indian/Christmas" >Indian/Christmas</option>
                                                                                                <option  {{ $general_setting->timezone == 'Indian/Cocos' ? 'selected' : '' }} value="Indian/Cocos" >Indian/Cocos</option>
                                                                                                <option  {{ $general_setting->timezone == 'Indian/Comoro' ? 'selected' : '' }} value="Indian/Comoro" >Indian/Comoro</option>
                                                                                                <option  {{ $general_setting->timezone == 'Indian/Kerguelen' ? 'selected' : '' }} value="Indian/Kerguelen" >Indian/Kerguelen</option>
                                                                                                <option  {{ $general_setting->timezone == 'Indian/Mahe' ? 'selected' : '' }} value="Indian/Mahe" >Indian/Mahe</option>
                                                                                                <option  {{ $general_setting->timezone == 'Indian/Maldives' ? 'selected' : '' }} value="Indian/Maldives" >Indian/Maldives</option>
                                                                                                <option  {{ $general_setting->timezone == 'Indian/Mauritius' ? 'selected' : '' }} value="Indian/Mauritius" >Indian/Mauritius</option>
                                                                                                <option  {{ $general_setting->timezone == 'Indian/Mayotte' ? 'selected' : '' }} value="Indian/Mayotte" >Indian/Mayotte</option>
                                                                                                <option  {{ $general_setting->timezone == 'Indian/Reunion' ? 'selected' : '' }} value="Indian/Reunion" >Indian/Reunion</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Apia' ? 'selected' : '' }} value="Pacific/Apia" >Pacific/Apia</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Auckland' ? 'selected' : '' }} value="Pacific/Auckland" >Pacific/Auckland</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Bougainville' ? 'selected' : '' }} value="Pacific/Bougainville" >Pacific/Bougainville</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Chatham' ? 'selected' : '' }} value="Pacific/Chatham" >Pacific/Chatham</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Chuuk' ? 'selected' : '' }} value="Pacific/Chuuk" >Pacific/Chuuk</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Easter' ? 'selected' : '' }} value="Pacific/Easter" >Pacific/Easter</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Efate' ? 'selected' : '' }} value="Pacific/Efate" >Pacific/Efate</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Enderbury' ? 'selected' : '' }} value="Pacific/Enderbury" >Pacific/Enderbury</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Fakaofo' ? 'selected' : '' }} value="Pacific/Fakaofo" >Pacific/Fakaofo</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Fiji' ? 'selected' : '' }} value="Pacific/Fiji" >Pacific/Fiji</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Funafuti' ? 'selected' : '' }} value="Pacific/Funafuti" >Pacific/Funafuti</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Galapagos' ? 'selected' : '' }} value="Pacific/Galapagos" >Pacific/Galapagos</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Gambier' ? 'selected' : '' }} value="Pacific/Gambier" >Pacific/Gambier</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Guadalcanal' ? 'selected' : '' }} value="Pacific/Guadalcanal" >Pacific/Guadalcanal</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Guam' ? 'selected' : '' }} value="Pacific/Guam" >Pacific/Guam</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Honolulu' ? 'selected' : '' }} value="Pacific/Honolulu" >Pacific/Honolulu</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Kiritimati' ? 'selected' : '' }} value="Pacific/Kiritimati" >Pacific/Kiritimati</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Kosrae' ? 'selected' : '' }} value="Pacific/Kosrae" >Pacific/Kosrae</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Kwajalein' ? 'selected' : '' }} value="Pacific/Kwajalein" >Pacific/Kwajalein</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Majuro' ? 'selected' : '' }} value="Pacific/Majuro" >Pacific/Majuro</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Marquesas' ? 'selected' : '' }} value="Pacific/Marquesas" >Pacific/Marquesas</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Midway' ? 'selected' : '' }} value="Pacific/Midway" >Pacific/Midway</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Nauru' ? 'selected' : '' }} value="Pacific/Nauru" >Pacific/Nauru</option>
                                                                                                <option  {{ $general_setting->timezone == 'IPacific/Niue' ? 'selected' : '' }} value="Pacific/Niue" >Pacific/Niue</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Norfolk' ? 'selected' : '' }} value="Pacific/Norfolk" >Pacific/Norfolk</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Noumea' ? 'selected' : '' }} value="Pacific/Noumea" >Pacific/Noumea</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Pago_Pago' ? 'selected' : '' }} value="Pacific/Pago_Pago" >Pacific/Pago_Pago</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Palau' ? 'selected' : '' }} value="Pacific/Palau" >Pacific/Palau</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Pitcairn' ? 'selected' : '' }} value="Pacific/Pitcairn" >Pacific/Pitcairn</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Pohnpei' ? 'selected' : '' }} value="Pacific/Pohnpei" >Pacific/Pohnpei</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Port_Moresby' ? 'selected' : '' }} value="Pacific/Port_Moresby" >Pacific/Port_Moresby</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Rarotonga' ? 'selected' : '' }} value="Pacific/Rarotonga" >Pacific/Rarotonga</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Saipan' ? 'selected' : '' }} value="Pacific/Saipan" >Pacific/Saipan</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Tahiti' ? 'selected' : '' }} value="Pacific/Tahiti" >Pacific/Tahiti</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Tarawa' ? 'selected' : '' }} value="Pacific/Tarawa" >Pacific/Tarawa</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Tongatapu' ? 'selected' : '' }} value="Pacific/Tongatapu" >Pacific/Tongatapu</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Wake' ? 'selected' : '' }} value="Pacific/Wake" >Pacific/Wake</option>
                                                                                                <option  {{ $general_setting->timezone == 'Pacific/Wallis' ? 'selected' : '' }} value="Pacific/Wallis" >Pacific/Wallis</option>
                                                                                                <option  {{ $general_setting->timezone == 'UTC' ? 'selected' : '' }} value="UTC" >UTC</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade" id="id2" role="tabpanel">
                                                    <form action="{{ route('admin.update-logo-favicon') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Logo and Favicon') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group mg-top-20">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Website Logo') }}</label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="logo" id="input-img1" autocomplete="off" onchange="reviewImage(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img1">
                                                                                                            <img id="view_img" src="{{ asset($general_setting->logo) }}" class="home2_explore_img">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group mg-top-20">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Footer Logo') }}</label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="footer_logo" id="input-img-footer" autocomplete="off" onchange="footerLogo(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-footer">
                                                                                                            <img id="view_footer_img" src="{{ asset($general_setting->footer_logo) }}" class="home2_explore_img">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group mg-top-20">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Home4 Logo') }}</label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="secondary_logo" id="input-img-secondary_logo" autocomplete="off" onchange="secondaryLogo(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-secondary_logo">
                                                                                                            <img id="view_secondary_logo" src="{{ asset($general_setting->secondary_logo) }}" class="home2_explore_img">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>




                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group mg-top-20">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Home4 Footer Logo') }}</label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="secondary_footer_logo" id="input-img-secondary_footer_logo" autocomplete="off" onchange="secondaryFooterLogo(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-secondary_footer_logo">
                                                                                                            <img id="view_secondary_footer_logo" src="{{ asset($general_setting->secondary_footer_logo) }}" class="home2_explore_img">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group mg-top-20">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Home4 Menu Logo') }}</label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="secondary_navmenu_logo" id="input-img-secondary_navmenu_logo" autocomplete="off" onchange="secondaryMenuLogo(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-secondary_navmenu_logo">
                                                                                                            <img id="view_secondary_navmenu_logo" src="{{ asset($general_setting->secondary_navmenu_logo) }}" class="home2_explore_img">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group mg-top-20">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Home3 Menu Logo') }}</label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="home3_logo" id="input-img-home3_logo" autocomplete="off" onchange="home3Logo(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-home3_logo">
                                                                                                            <img id="view_home3_logo" src="{{ asset($general_setting->home3_logo) }}" class="home2_explore_img">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group mg-top-20">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Home3 Footer Logo') }}</label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="home3_footer_logo" id="input-img-home3_footer_logo" autocomplete="off" onchange="home3FooterLogo(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-img-home3_footer_logo">
                                                                                                            <img id="view_home3_footer_logo" src="{{ asset($general_setting->home3_footer_logo ?? '') }}" class="home2_explore_img">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>







                                                                                    <div class="col-12">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <div class="crancy__item-form--group mg-top-20">
                                                                                                    <label class="crancy__item-label">{{ __('translate.Website favicon') }}</label>
                                                                                                    <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                        <input type="file" class="btn-check" name="favicon" id="input-favicon" autocomplete="off" onchange="reviewImage2(event)">
                                                                                                        <label class="crancy-image-video-upload__label" for="input-favicon">
                                                                                                            <img id="view_img2" src="{{ asset($general_setting->favicon) }}">
                                                                                                            <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class=" mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade" id="id3" role="tabpanel">
                                                    <form action="{{ route('admin.update-google-captcha') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Google reCaptcha') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input name="status" {{ $general_setting->recaptcha_status == 1 ? 'checked' : '' }} type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Captcha Site Key') }} </label>
                                                                                            <input class="crancy__item-input" type="text" name="site_key" value="{{ $general_setting->recaptcha_site_key }}">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Captcha Secret Key') }} </label>
                                                                                            <input class="crancy__item-input" type="text" name="secret_key" value="{{ $general_setting->recaptcha_secret_key }}">
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class=" mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade" id="id4" role="tabpanel">
                                                    <form action="{{ route('admin.update-tawk-chat') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Tawk Chat') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input name="status" {{ $general_setting->tawk_status == 1 ? 'checked' : '' }} type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Tawk Chat Link') }} </label>
                                                                                            <input class="crancy__item-input" type="text" name="chat_link" value="{{ $general_setting->tawk_chat_link }}">
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class=" mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade" id="id5" role="tabpanel">
                                                    <form action="{{ route('admin.update-google-analytic') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Google Analytic') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input name="status" {{ $general_setting->google_analytic_status == 1 ? 'checked' : '' }} type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Analytic Id') }} </label>
                                                                                            <input class="crancy__item-input" type="text" name="analytic_id" value="{{ $general_setting->google_analytic_id }}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class=" mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>


                                                <div class="tab-pane fade" id="id6" role="tabpanel">
                                                    <form action="{{ route('admin.update-facebook-pixel') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">{{ __('translate.Facebook Pixel') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                                                                            <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                <label class="crancy__item-switch">
                                                                                                <input name="status" {{ $general_setting->pixel_status == 1 ? 'checked' : '' }} type="checkbox" >
                                                                                                <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-12">
                                                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                                                            <label class="crancy__item-label">{{ __('translate.Pixel App Id') }} </label>
                                                                                            <input class="crancy__item-input" type="text" name="app_id" value="{{ $general_setting->pixel_app_id }}">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class=" mg-top-40">
                                                                            <button class="crancy-btn" type="submit">{{ __('translate.Update') }}</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane fade" id="id7" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="crancy-ptabs__separate">
                                                                <div class="crancy-ptabs__form-main">
                                                                    <div class="crancy__item-group">
                                                                        <h3 class="crancy__item-group__title">{{ __('translate.Database Clear') }}</h3>
                                                                        <div class="crancy__item-form--group">
                                                                            <div class="row">

                                                                                <div class="col-12">
                                                                                    <div class="alert alert-warning alert-has-icon">
                                                                                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                                                                                        <div class="alert-body">
                                                                                            <div class="alert-title">{{ __('translate.Warning') }}</div>
                                                                                            <p>{{ __('translate.If you want to use the software from scratch, you can click here to reset the database. You do not need to remove the existing data one by one.') }}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class=" mg-top-40">
                                                                        <button data-bs-toggle="modal" data-bs-target="#dbCleawrModal" class="crancy-btn" type="button">{{ __('translate.Clear Now') }}</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Dashboard Inner -->
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Delete Confirmation Modal -->
<div class="modal fade" id="dbCleawrModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Clear Confirmation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('translate.Are you realy want to clear this database?') }}</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.database-clear') }}" class="delet_modal_form" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Clear Now') }}</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js_section')
    <script>
        "use strict";

        function reviewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function footerLogo(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_footer_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function secondaryLogo(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_secondary_logo');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function secondaryFooterLogo(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_secondary_footer_logo');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function secondaryMenuLogo(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_secondary_navmenu_logo');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function home3Logo(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_home3_logo');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function home3FooterLogo(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_home3_footer_logo');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };








        function reviewImage2(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img2');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };


    </script>
@endpush
