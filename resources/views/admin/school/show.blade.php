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

                        <!-- Action Buttons -->
                        <div class="row">
                            <div class="col-12">
                                <div class="crancy-product-card mg-top-30">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="crancy-product-card__title m-0">{{ $school->name }}</h4>
                                        <div>
                                            <a href="{{ route('admin.schools.index') }}" class="crancy-btn crancy-btn__filter me-2">
                                                <i class="fas fa-list"></i> {{ __('translate.School List') }}
                                            </a>
                                            <a href="{{ route('admin.schools.edit', $school->id) }}" class="crancy-btn">
                                                <i class="fas fa-edit"></i> {{ __('translate.Edit School') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- School Information Card -->
                        <div class="row mg-top-30">
                            <div class="col-12">
                                <div class="crancy-product-card">
                                    <div class="row">
                                        <!-- Logo Column -->
                                        <div class="col-md-4">
                                            <div class="text-center">
                                                <img src="{{ $school->logo_url }}" alt="{{ $school->name }}"
                                                     style="width: 200px; height: 200px; object-fit: cover; border-radius: 10px; border: 3px solid {{ $school->primary_color }};">
                                                <h5 class="mt-3" style="color: {{ $school->primary_color }};">{{ $school->name }}</h5>
                                                <p class="text-muted"><code>{{ $school->slug }}</code></p>
                                                <div class="mt-2">
                                                    @if($school->status == 'active')
                                                        <span class="badge bg-success">{{ __('translate.Active') }}</span>
                                                    @else
                                                        <span class="badge bg-danger">{{ __('translate.Inactive') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Details Column -->
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>{{ __('translate.School Name') }}:</strong></label>
                                                    <p>{{ $school->name }}</p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>{{ __('translate.Slug') }}:</strong></label>
                                                    <p><code>{{ $school->slug }}</code></p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>{{ __('translate.Primary Color') }}:</strong></label>
                                                    <p>
                                                        <span style="display: inline-block; width: 30px; height: 30px; background-color: {{ $school->primary_color }}; border-radius: 50%; border: 1px solid #ddd; vertical-align: middle;"></span>
                                                        <code>{{ $school->primary_color }}</code>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>{{ __('translate.Secondary Color') }}:</strong></label>
                                                    <p>
                                                        <span style="display: inline-block; width: 30px; height: 30px; background-color: {{ $school->secondary_color }}; border-radius: 50%; border: 1px solid #ddd; vertical-align: middle;"></span>
                                                        <code>{{ $school->secondary_color }}</code>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>{{ __('translate.Total Students') }}:</strong></label>
                                                    <p><span class="badge bg-info" style="font-size: 1rem; padding: 0.5rem 1rem;">{{ $school->total_students }}</span></p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>{{ __('translate.Total Instructors') }}:</strong></label>
                                                    <p><span class="badge bg-warning" style="font-size: 1rem; padding: 0.5rem 1rem;">{{ $school->total_instructors }}</span></p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>{{ __('translate.Created At') }}:</strong></label>
                                                    <p>{{ $school->created_at->format('M d, Y h:i A') }}</p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>{{ __('translate.Updated At') }}:</strong></label>
                                                    <p>{{ $school->updated_at->format('M d, Y h:i A') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Students List -->
                        <div class="row mg-top-30">
                            <div class="col-12">
                                <div class="crancy-product-card">
                                    <div class="crancy-table crancy-table--v3">
                                        <h4 class="crancy-product-card__title mb-3">{{ __('translate.Students') }} ({{ $school->total_students }})</h4>

                                        @if($students->count() > 0)
                                            <div class="table-responsive">
                                                <table class="crancy-table__main crancy-table__main-v3">
                                                    <thead class="crancy-table__head">
                                                        <tr>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Name') }}</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Email') }}</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Status') }}</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Joined') }}</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="crancy-table__body">
                                                        @foreach($students as $student)
                                                        <tr>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <h4 class="crancy-table__product-title">{{ $student->name }}</h4>
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <p>{{ $student->email }}</p>
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                @if($student->status == 'enable')
                                                                    <span class="badge bg-success">{{ __('translate.Active') }}</span>
                                                                @else
                                                                    <span class="badge bg-danger">{{ __('translate.Inactive') }}</span>
                                                                @endif
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <p>{{ $student->created_at->format('M d, Y') }}</p>
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <a href="{{ route('admin.user-show', $student->id) }}" class="crancy-btn crancy-btn__filter">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="crancy-table-bottom mg-top-30">
                                                <div class="crancy-table-bottom__right">
                                                    {{ $students->appends(['instructors_page' => request('instructors_page')])->links() }}
                                                </div>
                                            </div>
                                        @else
                                            <p class="text-center text-muted py-4">{{ __('translate.No students found for this school') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Instructors List -->
                        <div class="row mg-top-30">
                            <div class="col-12">
                                <div class="crancy-product-card">
                                    <div class="crancy-table crancy-table--v3">
                                        <h4 class="crancy-product-card__title mb-3">{{ __('translate.Instructors') }} ({{ $school->total_instructors }})</h4>

                                        @if($instructors->count() > 0)
                                            <div class="table-responsive">
                                                <table class="crancy-table__main crancy-table__main-v3">
                                                    <thead class="crancy-table__head">
                                                        <tr>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Name') }}</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Email') }}</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Status') }}</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Joined') }}</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">{{ __('translate.Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="crancy-table__body">
                                                        @foreach($instructors as $instructor)
                                                        <tr>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <h4 class="crancy-table__product-title">{{ $instructor->name }}</h4>
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <p>{{ $instructor->email }}</p>
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                @if($instructor->status == 'enable')
                                                                    <span class="badge bg-success">{{ __('translate.Active') }}</span>
                                                                @else
                                                                    <span class="badge bg-danger">{{ __('translate.Inactive') }}</span>
                                                                @endif
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <p>{{ $instructor->created_at->format('M d, Y') }}</p>
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <a href="{{ route('admin.seller-show', $instructor->id) }}" class="crancy-btn crancy-btn__filter">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="crancy-table-bottom mg-top-30">
                                                <div class="crancy-table-bottom__right">
                                                    {{ $instructors->appends(['students_page' => request('students_page')])->links() }}
                                                </div>
                                            </div>
                                        @else
                                            <p class="text-center text-muted py-4">{{ __('translate.No instructors found for this school') }}</p>
                                        @endif
                                    </div>
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