@extends('admin.master_layout')
@section('title')
<title>{{ __('translate.Edit School') }}</title>
@endsection
@section('admin-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('translate.Edit School') }}</h1>
        </div>

        <div class="section-body">
            <a href="{{ route('admin.schools.index') }}" class="btn btn-primary">
                <i class="fas fa-list"></i> {{ __('translate.School List') }}
            </a>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('translate.Edit School') }}: {{ $school->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.schools.update', $school->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>{{ __('translate.School Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $school->name) }}" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('translate.Slug') }}</label>
                                        <input type="text" id="slug" class="form-control" name="slug" value="{{ old('slug', $school->slug) }}">
                                        <small class="text-muted">{{ __('translate.Leave empty to auto-generate from name') }}</small>
                                        @error('slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('translate.School Logo') }}</label>
                                        @if($school->logo)
                                            <div class="mb-2">
                                                <img src="{{ $school->logo_url }}" alt="Current Logo" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                                                <small class="d-block text-muted">{{ __('translate.Current Logo') }}</small>
                                            </div>
                                        @endif
                                        <input type="file" class="form-control-file" name="logo" accept="image/*" onchange="previewImage(event)">
                                        <small class="text-muted">{{ __('translate.Supported formats: jpeg, jpg, png, gif. Max size: 2MB') }}</small>
                                        @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="mt-2">
                                            <img id="logo_preview" src="#" alt="Logo Preview" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px; display: none;">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>{{ __('translate.Primary Color') }} <span class="text-danger">*</span></label>
                                        <input type="color" class="form-control" name="primary_color" value="{{ old('primary_color', $school->primary_color) }}" required>
                                        @error('primary_color')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>{{ __('translate.Secondary Color') }} <span class="text-danger">*</span></label>
                                        <input type="color" class="form-control" name="secondary_color" value="{{ old('secondary_color', $school->secondary_color) }}" required>
                                        @error('secondary_color')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('translate.Status') }} <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control" required>
                                            <option value="active" {{ old('status', $school->status) == 'active' ? 'selected' : '' }}>{{ __('translate.Active') }}</option>
                                            <option value="inactive" {{ old('status', $school->status) == 'inactive' ? 'selected' : '' }}>{{ __('translate.Inactive') }}</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">{{ __('translate.Update') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    document.getElementById('name').addEventListener('input', function() {
        var name = this.value;
        var slug = name.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        document.getElementById('slug').value = slug;
    });

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('logo_preview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection