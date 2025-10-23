@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Create School') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Create School') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage School') }} >> {{ __('translate.Create School') }}</p>
@endsection

@section('body-content')

    <form action="{{ route('admin.schools.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('translate.Basic Information') }}</h4>

                                            <a href="{{ route('admin.schools.index') }}" class="crancy-btn crancy-btn__filter">
                                                <i class="fas fa-list"></i> {{ __('translate.School List') }}
                                            </a>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.School Name') }} <span class="text-danger">*</span></label>
                                                    <input class="crancy__item-input" type="text" name="name" id="name" value="{{ old('name') }}" required>
                                                    @error('name')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Slug') }}</label>
                                                    <input class="crancy__item-input" type="text" name="slug" id="slug" value="{{ old('slug') }}">
                                                    <small class="text-muted">{{ __('translate.Leave empty to auto-generate from name') }}</small>
                                                    @error('slug')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Primary Color') }} <span class="text-danger">*</span></label>
                                                    <input class="crancy__item-input" type="color" name="primary_color" value="{{ old('primary_color', '#007bff') }}" required>
                                                    @error('primary_color')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Secondary Color') }} <span class="text-danger">*</span></label>
                                                    <input class="crancy__item-input" type="color" name="secondary_color" value="{{ old('secondary_color', '#6c757d') }}" required>
                                                    @error('secondary_color')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.Status') }} <span class="text-danger">*</span></label>
                                                    <select class="form-select crancy__item-input" name="status" required>
                                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>{{ __('translate.Active') }}</option>
                                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>{{ __('translate.Inactive') }}</option>
                                                    </select>
                                                    @error('status')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('translate.School Logo') }}</label>
                                                    <input class="crancy__item-input" type="file" name="logo" accept="image/*" onchange="previewImage(event)">
                                                    <small class="text-muted">{{ __('translate.Supported formats: jpeg, jpg, png, gif. Max size: 2MB') }}</small>
                                                    @error('logo')
                                                        <div class="text-danger mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <div class="mt-2">
                                                        <img id="logo_preview" src="#" alt="Logo Preview" style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; display: none; border: 2px solid #e5e5e5;">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="mg-top-40">
                                            <button class="crancy-btn" type="submit">{{ __('translate.Save') }}</button>
                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
    </form>

@endsection

@push('js_section')
    <script>
        "use strict";

        // Auto-generate slug from name
        document.getElementById('name').addEventListener('input', function() {
            var name = this.value;
            var slug = name.toLowerCase()
                .replace(/[^\w ]+/g, '')
                .replace(/ +/g, '-');
            document.getElementById('slug').value = slug;
        });

        // Preview logo image
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('logo_preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>
@endpush