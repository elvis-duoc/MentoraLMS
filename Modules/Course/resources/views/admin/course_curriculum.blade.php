@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Course Curriculum') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Course Curriculum') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Course') }} >> {{ __('translate.Course Curriculum') }}</p>
@endsection

@section('body-content')

    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row row__bscreen">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-psidebar edc-edit-course-sidebar">
                            <!-- Features Tab List -->
                            @include('course::admin.course_sidebar')

                        </div>

                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="crancy-personals mg-top-30">
                                <div class="crancy-ptabs edc-edit-course-body">

                                    <div class="crancy-customer-filter">
                                        <div
                                            class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                            <div
                                                class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Module List') }}</h4>

                                                <a href="javascript:;" data-bs-toggle="modal"
                                                   data-bs-target="#curriculumAdd" class="crancy-btn ">
                                                    <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         viewBox="0 0 16 16" fill="none">
                                                                        <path d="M8 1V15" stroke="white"
                                                                              stroke-width="2" stroke-linecap="round"
                                                                              stroke-linejoin="round"></path>
                                                                        <path d="M1 8H15" stroke="white"
                                                                              stroke-width="2" stroke-linecap="round"
                                                                              stroke-linejoin="round"></path>
                                                                    </svg>
                                                    </span>
                                                    {{ __('translate.Add Module') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- crancy Table -->
                                    <div id="crancy-table__main_wrapper"
                                         class=" dt-bootstrap5 no-footer overflow-x-auto">

                                        <table class="crancy-table__main crancy-table__main-v3  no-footer">
                                            <!-- crancy Table Head -->
                                            <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Module Name') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Total Lessons') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('translate.Status') }}
                                                </th>


                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('translate.Action') }}
                                                </th>

                                            </tr>
                                            </thead>

                                            <!-- crancy Table Body -->
                                            <tbody class="crancy-table__body edc-curriculum-table">
                                            @foreach ($course_modules as $index => $course_module)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $course_module->serial }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ html_decode($course_module?->name) }}</h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $course_module->lessonsForPrivate->count() }}</h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($course_module->status == 'enable')
                                                            <span
                                                                class="badge bg-success">{{ __('translate.Active') }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger">{{ __('translate.In-active') }}</span>
                                                        @endif
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2 edc_gropu_action_btns">
                                                        <!-- actions -->
                                                        <a
                                                           href="{{ route('admin.course-lesson', ['course_id' => $course->id, 'course_module' => $course_module->id, 'req_type' => 'from_create'] ) }}"
                                                           class="crancy-btn delete_danger_btn mix_content_list_btn"><i
                                                                class="fas fa-list"></i> {{ __('translate.Lessons') }}</a>

                                                        <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#curriculumEdit{{ $course_module->id }}"
                                                           class="crancy-btn delete_danger_btn mix_content_edit_btn"><i
                                                                class="fas fa-edit"></i> </a>

                                                        <a onclick="itemDeleteConfrimation({{ $course->id }})"
                                                           href="javascript:;" data-bs-toggle="modal"
                                                           data-bs-target="#exampleModal"
                                                           class="crancy-btn delete_danger_btn "><i
                                                                class="fas fa-trash"></i> </a>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            <!-- End crancy Table Body -->
                                        </table>
                                    </div>
                                    <!-- End crancy Table -->
                                    <div class="d-flex justify-content-end">
                                        <div>
                                            @if (request()->has('req_type') && request()->get('req_type') == 'from_create')

                                                <a class="crancy-btn  next-btn mg-top-25" href="{{ route('admin.course-media', ['course_id' => $course->id, 'req_type' => 'from_create'] ) }}">  {{ __('translate.Previous') }}</a>

                                                <a class="crancy-btn edc-crs-step-save-btn  next-btn p mg-top-25" href="{{ route('admin.course-seo', ['course_id' => $course->id, 'req_type' => 'from_create']) }}">  {{ __('translate.Next') }}</a>

                                            @else

                                                <a class="crancy-btn  next-btn mg-top-25" href="{{ route('admin.course-media', $course->id ) }}">  {{ __('translate.Previous') }}</a>

                                                <a class="crancy-btn edc-crs-step-save-btn next-btn mg-top-25" href="{{ route('admin.course-seo', $course->id ) }}">  {{ __('translate.Next') }}</a>

                                            @endif
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


    <!-- Edit curriculum modal -->
    @foreach ($course_modules as $index => $course_module)
        <div class="modal fade" id="curriculumEdit{{ $course_module->id }}" tabindex="-1"
             aria-labelledby="curriculumEdit{{ $course_module->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form class="modal-content delet_modal_form" method="POST"
                      action="{{ route('admin.update-course-curriculum', ['course_id' => $course->id, 'course_module' => $course_module->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="curriculumEdit{{ $course_module->id }}">{{ __('translate.Edit Module') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="crancy__item-form--group">
                                    <label class="crancy__item-label">{{ __('translate.Name') }} * </label>
                                    <input class="crancy__item-input" type="text" name="name"
                                           value="{{ html_decode($course_module->name) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Serial') }} * </label>
                                    <input class="crancy__item-input" type="number" name="serial"
                                           value="{{ html_decode($course_module->serial) }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="crancy__item-form--group mg-top-form-20">
                                    <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                    <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                        <label class="crancy__item-switch">
                                            <input
                                                {{  $course_module->status == 'enable' ? 'checked' : '' }} name="status"
                                                type="checkbox">
                                            <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-primary">{{ __('translate.Update Module') }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- New curriculum modal -->
    <div class="modal fade" id="curriculumAdd" tabindex="-1" aria-labelledby="curriculumAdd" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content delet_modal_form" method="POST"
                  action="{{ route('admin.store-course-curriculum', $course->id) }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="curriculumAdd">{{ __('translate.Create Module') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="crancy__item-form--group">
                                <label class="crancy__item-label">{{ __('translate.Name') }} * </label>
                                <input class="crancy__item-input" type="text" name="name" id="name"
                                       value="{{ html_decode(old('name')) }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Serial') }} * </label>
                                <input class="crancy__item-input" type="number" name="serial"
                                       value="{{ old('serial') }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="crancy__item-form--group mg-top-form-20">
                                <label class="crancy__item-label">{{ __('translate.Visibility Status') }} </label>
                                <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                    <label class="crancy__item-switch">
                                        <input {{ old('status') ? 'checked' : '' }} name="status" type="checkbox">
                                        <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer ">
                    <button type="submit" class="btn btn-primary">{{ __('translate.Save Module') }}</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.Delete Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('translate.Are you realy want to delete this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Delete') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('js_section')
    <script>
        "use strict"

        function itemDeleteConfrimation(course_id, course_module_id) {

            $("#item_delect_confirmation").attr("action", '{{ url("admin/destroy-course-curriculum/") }}' + "/" + course_id + "/" + course_module_id)
        }
    </script>
@endpush


