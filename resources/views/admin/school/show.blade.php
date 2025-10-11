@extends('admin.master_layout')
@section('title')
<title>{{ __('translate.School Details') }}</title>
@endsection
@section('admin-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('translate.School Details') }}</h1>
        </div>

        <div class="section-body">
            <a href="{{ route('admin.schools.index') }}" class="btn btn-primary">
                <i class="fas fa-list"></i> {{ __('translate.School List') }}
            </a>
            <a href="{{ route('admin.schools.edit', $school->id) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> {{ __('translate.Edit School') }}
            </a>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $school->name }}</h4>
                            <div class="card-header-action">
                                @if($school->status == 'active')
                                    <span class="badge badge-success">{{ __('translate.Active') }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __('translate.Inactive') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <img src="{{ $school->logo_url }}" alt="{{ $school->name }}"
                                             style="width: 200px; height: 200px; object-fit: cover; border-radius: 10px; border: 3px solid {{ $school->primary_color }};">
                                        <h5 class="mt-3" style="color: {{ $school->primary_color }};">{{ $school->name }}</h5>
                                        <p class="text-muted">{{ $school->slug }}</p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>{{ __('translate.School Name') }}:</strong></label>
                                                <p>{{ $school->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>{{ __('translate.Slug') }}:</strong></label>
                                                <p><code>{{ $school->slug }}</code></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>{{ __('translate.Primary Color') }}:</strong></label>
                                                <p>
                                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: {{ $school->primary_color }}; border-radius: 50%; border: 1px solid #ddd; vertical-align: middle;"></span>
                                                    <code>{{ $school->primary_color }}</code>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>{{ __('translate.Secondary Color') }}:</strong></label>
                                                <p>
                                                    <span style="display: inline-block; width: 30px; height: 30px; background-color: {{ $school->secondary_color }}; border-radius: 50%; border: 1px solid #ddd; vertical-align: middle;"></span>
                                                    <code>{{ $school->secondary_color }}</code>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>{{ __('translate.Total Students') }}:</strong></label>
                                                <p><span class="badge badge-info badge-lg">{{ $school->total_students }}</span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>{{ __('translate.Total Instructors') }}:</strong></label>
                                                <p><span class="badge badge-warning badge-lg">{{ $school->total_instructors }}</span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>{{ __('translate.Created At') }}:</strong></label>
                                                <p>{{ $school->created_at->format('M d, Y h:i A') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><strong>{{ __('translate.Updated At') }}:</strong></label>
                                                <p>{{ $school->updated_at->format('M d, Y h:i A') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Students Tab -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('translate.Students') }} ({{ $school->total_students }})</h4>
                        </div>
                        <div class="card-body">
                            @if($students->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('translate.Name') }}</th>
                                                <th>{{ __('translate.Email') }}</th>
                                                <th>{{ __('translate.Status') }}</th>
                                                <th>{{ __('translate.Joined') }}</th>
                                                <th>{{ __('translate.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)
                                            <tr>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>
                                                    @if($student->status == 'enable')
                                                        <span class="badge badge-success">{{ __('translate.Active') }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ __('translate.Inactive') }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $student->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.user-show', $student->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    {{ $students->appends(['instructors_page' => request('instructors_page')])->links() }}
                                </div>
                            @else
                                <p class="text-center text-muted">{{ __('translate.No students found for this school') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Instructors Tab -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('translate.Instructors') }} ({{ $school->total_instructors }})</h4>
                        </div>
                        <div class="card-body">
                            @if($instructors->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('translate.Name') }}</th>
                                                <th>{{ __('translate.Email') }}</th>
                                                <th>{{ __('translate.Status') }}</th>
                                                <th>{{ __('translate.Courses') }}</th>
                                                <th>{{ __('translate.Students') }}</th>
                                                <th>{{ __('translate.Joined') }}</th>
                                                <th>{{ __('translate.Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($instructors as $instructor)
                                            <tr>
                                                <td>{{ $instructor->name }}</td>
                                                <td>{{ $instructor->email }}</td>
                                                <td>
                                                    @if($instructor->status == 'enable')
                                                        <span class="badge badge-success">{{ __('translate.Active') }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ __('translate.Inactive') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">{{ $instructor->total_course }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-warning">{{ $instructor->total_student }}</span>
                                                </td>
                                                <td>{{ $instructor->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.seller-show', $instructor->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3">
                                    {{ $instructors->appends(['students_page' => request('students_page')])->links() }}
                                </div>
                            @else
                                <p class="text-center text-muted">{{ __('translate.No instructors found for this school') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection