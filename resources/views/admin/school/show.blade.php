@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.School Details') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.School Details') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage School') }} >> {{ __('translate.School Details') }}</p>
@endsection

@section('body-content')
<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12">
                <div class="crancy-body">
                    <div class="crancy-dsinner">

                        <!-- School Info -->
                        <div class="row mg-top-30">
                            <div class="col-12">
                                <div class="crancy-product-card">
                                    <h4 class="crancy-product-card__title">{{ $school->name }}</h4>
                                    <p>Status: 
                                        @if($school->status == 'active')
                                            <span class="badge bg-success">{{ __('translate.Active') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ __('translate.Inactive') }}</span>
                                        @endif
                                    </p>
                                    <p>Total Students: {{ $school->total_students }}</p>
                                    <p>Total Instructors: {{ $school->total_instructors }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Students List -->
                        <div class="row mg-top-30">
                            <div class="col-12">
                                <div class="crancy-table crancy-table--v3">
                                    <h4>{{ __('translate.Students') }} ({{ $school->total_students }})</h4>

                                    @if($students->count() > 0)
                                        <table class="crancy-table__main crancy-table__main-v3">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('translate.Name') }}</th>
                                                    <th>{{ __('translate.Email') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($students as $student)
                                                    <tr>
                                                        <td>{{ $student->name }}</td>
                                                        <td>{{ $student->email }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="crancy-table-bottom mg-top-20">
                                            {{ $students->links('pagination::bootstrap-5') }}
                                        </div>
                                    @else
                                        <p class="text-center text-muted">{{ __('translate.No students found for this school') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Instructors List -->
                        <div class="row mg-top-30">
                            <div class="col-12">
                                <div class="crancy-table crancy-table--v3">
                                    <h4>{{ __('translate.Instructors') }} ({{ $school->total_instructors }})</h4>

                                    @if($instructors->count() > 0)
                                        <table class="crancy-table__main crancy-table__main-v3">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('translate.Name') }}</th>
                                                    <th>{{ __('translate.Email') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($instructors as $instructor)
                                                    <tr>
                                                        <td>{{ $instructor->name }}</td>
                                                        <td>{{ $instructor->email }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <div class="crancy-table-bottom mg-top-20">
                                            {{ $instructors->links('pagination::bootstrap-5') }}
                                        </div>
                                    @else
                                        <p class="text-center text-muted">{{ __('translate.No instructors found for this school') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
