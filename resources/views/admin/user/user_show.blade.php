@extends('admin.master_layout')
@section('title')
    <title>Detalles del Estudiante</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">Detalles del Estudiante</h3>
    <p class="crancy-header__text">Gestionar Estudiante &gt;&gt; Detalles del Estudiante</p>
@endsection

@section('body-content')

<!-- crancy Dashboard -->
<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row row__bscreen justify-content-center">

            <div class="col-xxl-4 col-md-6 col-12 mg-top-30">
                <div class="crancy-ecom-card crancy-ecom-card__v2">
                    <div class="flex-main">
                        <span>
                            @include('admin.user.svg.enrolled_course_qty')
                        </span>
                        <div class="flex-1">
                            <div class="crancy-ecom-card__heading">
                                <div class="crancy-ecom-card__icon">
                                    <h4 class="crancy-ecom-card__title">Curso Inscrito</h4>
                                </div>
                            </div>
                            <div class="crancy-ecom-card__content">
                                <div class="crancy-ecom-card__camount">
                                    <div class="crancy-ecom-card__camount__inside">
                                        <h3 class="crancy-ecom-card__amount">{{ $enrolled_course_qty }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mg-top-30 row__bscreen">
            <div class="col-xxl-3 col-xl-4 col-lg-4">
                <div class="overview-profile">
                    <div class="overview-profile-thumb-main">
                        <div class="overview-profile-thumb">
                            @if ($user->image)
                                <img src="{{ asset($user->image) }}" alt="thumb">
                            @else
                                <img src="{{ asset($general_setting->default_avatar) }}" alt="thumb">
                            @endif
                        </div>
                        <div class="overview-profile-txt">
                            <h4>{{ html_decode($user->name) }}</h4>
                        </div>
                    </div>

                    <div class="overview-profile-item">
                        <div class="overview-profile-inner">
                            <h4>Información de Contacto</h4>
                            <ul class="overview-profile-inner-contact">
                                <li>
                                    <a href="tel:{{ html_decode($user->phone) }}">
                                        <span>@include('admin.seller.svg.phone')</span>
                                        {{ html_decode($user->phone) }}
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:{{ html_decode($user->email) }}">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 12V7C2 4.79086 3.79086 3 6 3H18C20.2091 3 22 4.79086 22 7V17C22 19.2091 20.2091 21 18 21H8M6 8L9.7812 10.5208C11.1248 11.4165 12.8752 11.4165 14.2188 10.5208L18 8M2 15H8M2 18H8"
                                                stroke="#6440FBFF" stroke-width="1.5"
                                                stroke-linecap="round" />
                                            </svg>
                                        </span>
                                        {{ html_decode($user->email) }}
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 3L2 8L12 13L22 8L12 3Z" stroke="#6440FBFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M2 12L12 17L22 12" stroke="#6440FBFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M2 16L12 21L22 16" stroke="#6440FBFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                        @if($user->school_id && $user->school)
                                            {{ $user->school->name }}
                                        @else
                                            <span class="text-muted">Sin colegio asignado</span>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="overview-profile-inner">
                            @if ($user->is_seller == 1)
                                <a target="_blank" href="{{ route('instructors', $user->username) }}" class="crancy-btn crancy-full-width mg-top-20">
                                    <i class="fas fa-eye"></i> Ir al Perfil Público
                                </a>
                            @endif

                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#assignSchoolModal" class="crancy-btn crancy-full-width mg-top-20 user_edit_btn">
                                <i class="fas fa-school"></i> Asignar Colegio
                            </a>

                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#assignCourseModal" class="crancy-btn crancy-full-width mg-top-20 user_edit_btn">
                                <i class="fas fa-book"></i> Asignar Cursos
                            </a>

                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#editModal" class="crancy-btn crancy-full-width mg-top-20 user_edit_btn">
                                <i class="fas fa-edit"></i> Editar Perfil
                            </a>

                            <a onclick="itemDeleteConfrimation({{ $user->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="crancy-btn crancy-full-width mg-top-20 user_delete_btn">
                                <i class="fas fa-trash"></i> Eliminar Estudiante
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-9 col-xl-8 col-lg-8">
                <div class="container container__bscreen">
                    <div class="row">
                        <div class="col-12">
                            <div class="crancy-body">
                                <div class="crancy-dsinner">

                                    <div class="crancy-table crancy-table--v3">
                                        <div class="crancy-customer-filter">
                                            <div class="crancy-customer-filter__single crancy-customer-filter__single-one">
                                                    <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title">Cursos Inscritos</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content" id="nav-tabContent">
                                            <table id="crancy-table__main" class="crancy-table__main crancy-table__main-v3">
                                                <thead class="crancy-table__head">
                                                    <tr>
                                                        <th class="crancy-table__column-2 crancy-table__h2 sorting">N.º</th>
                                                        <th class="crancy-table__column-2 crancy-table__h2 sorting">Miniatura</th>
                                                        <th class="crancy-table__column-2 crancy-table__h2 sorting">Título</th>
                                                        <th class="crancy-table__column-2 crancy-table__h2 sorting">Instructor</th>
                                                        <th class="crancy-table__column-2 crancy-table__h2 sorting">Acción</th>
                                                    </tr>
                                                </thead>

                                                <tbody class="crancy-table__body">
                                                    @forelse ($enrollments as $index => $enrollment)
                                                        @foreach ($enrollment->course_list as $course_list_index => $course_list)
                                                            <tr class="odd">
                                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                                    <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                                </td>

                                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                                    <img src="{{ asset($course_list->course?->thumb_image) }}" style="width: 60px; height: 40px;">
                                                                </td>

                                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                                    <h4 class="crancy-table__product-title">{{ html_decode($course_list->course?->title) }}</h4>
                                                                </td>

                                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                                    <h4 class="crancy-table__product-title">{{ html_decode($course_list->course?->instructor?->name) }}</h4>
                                                                </td>

                                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                                    <a href="{{ route('admin.courses.edit', $course_list->course?->id) }}" class="crancy-btn" title="Ver curso">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" onclick="removeCourseConfirmation({{ $user->id }}, {{ $course_list->course?->id }})" class="crancy-btn ms-1" style="background-color: #dc3545; color: white;" title="Eliminar curso">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">No hay cursos inscritos</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
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
</section>

<!-- Modal: Asignar Colegio -->
<div class="modal fade" id="assignSchoolModal" tabindex="-1" aria-labelledby="assignSchoolModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignSchoolModalLabel">Asignar Colegio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.assign-school', $user->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="school_id">Seleccionar Colegio *</label>
                        <select name="school_id" id="school_id" class="form-select" required>
                            <option value="">Seleccionar un colegio</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}" {{ $user->school_id == $school->id ? 'selected' : '' }}>
                                    {{ $school->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @if($user->school_id)
                        <div class="alert alert-info mt-3">
                            <strong>Colegio Actual:</strong> {{ $user->school->name ?? 'N/A' }}
                        </div>
                    @endif
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Asignar Cursos -->
<div class="modal fade" id="assignCourseModal" tabindex="-1" aria-labelledby="assignCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignCourseModalLabel">Asignar Cursos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.add-student-courses', $user->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="courseSelect" class="form-label fw-bold">Selecciona los cursos que deseas agregar a este estudiante:</label>
                        <select class="form-select" id="courseSelect" name="courses[]" multiple size="1" style="min-height: 45px;">
                            @foreach ($courses as $course)
                                @if(!in_array($course->id, $studentCourseIds))
                                    <option value="{{ $course->id }}">
                                        {{ $course->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <small class="text-muted d-block mt-2">Mantén presionado Ctrl (Windows) o Cmd (Mac) para seleccionar múltiples cursos. Solo se muestran cursos no inscritos.</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Agregar Cursos</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Editar Usuario -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Información Básica del Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.user-update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nombre *</label>
                            <input type="text" name="name" class="form-control" value="{{ html_decode($user->name) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Género *</label>
                            <select class="form-select" name="gender" required>
                                <option value="">Seleccionar</option>
                                <option {{ $user->gender == 'Male' ? 'selected' : '' }} value="Male">Masculino</option>
                                <option {{ $user->gender == 'Female' ? 'selected' : '' }} value="Female">Femenino</option>
                                <option {{ $user->gender == 'Others' ? 'selected' : '' }} value="Others">Otros</option>
                            </select>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Teléfono *</label>
                            <input type="text" name="phone" class="form-control" value="{{ html_decode($user->phone) }}" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label>Dirección *</label>
                            <input type="text" name="address" class="form-control" value="{{ html_decode($user->address) }}" required>
                        </div>
                        <div class="col-12 mt-3">
                            <label>Estado</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="status" type="checkbox" {{ $user->status == 'enable' ? 'checked' : '' }}>
                                <label class="form-check-label">Activo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar Información</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Delete Confirmation -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmación de Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Realmente desea eliminar este elemento?</p>
            </div>
            <div class="modal-footer">
                <form id="item_delect_confirmation" method="POST" class="w-100">
                    @csrf
                    @method('DELETE')
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal: Confirmar Eliminación de Curso -->
<div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="deleteCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCourseModalLabel">Confirmación de Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este curso del estudiante?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteCourse">Sí, Eliminar</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js_section')
<script>
"use strict"
function itemDeleteConfrimation(id){
    $("#item_delect_confirmation").attr("action",'{{ url("admin/user-delete/") }}/'+id)
}

function manageStatus(id){
    var appMODE = "{{ env('APP_MODE') }}"
    if(appMODE == 'DEMO'){
        toastr.error('This Is Demo Version. You Can Not Change Anything');
        return;
    }

    $.ajax({
        type:"put",
        data: { _token : '{{ csrf_token() }}' },
        url:"{{url('/admin/user-status/') }}/"+id,
        success:function(response){
            toastr.success(response)
        },
        error:function(err){
            toastr.error('{{ __("translate.Something went wrong") }}')
        }
    })
}

var currentUserId = null;
var currentCourseId = null;

function removeCourseConfirmation(userId, courseId){
    currentUserId = userId;
    currentCourseId = courseId;

    // Abrir el modal de confirmación
    var modal = new bootstrap.Modal(document.getElementById('deleteCourseModal'));
    modal.show();
}

// Manejar el click en el botón de confirmación del modal
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('confirmDeleteCourse').addEventListener('click', function() {
        var appMODE = "{{ env('APP_MODE') }}"
        if(appMODE == 'DEMO'){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }

        $.ajax({
            type:"DELETE",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/remove-student-course/') }}/" + currentUserId + "/" + currentCourseId,
            success:function(response){
                // Cerrar el modal
                var modal = bootstrap.Modal.getInstance(document.getElementById('deleteCourseModal'));
                modal.hide();

                // Verificar si la operación fue exitosa
                if(response.success === true){
                    toastr.success(response.message);
                    setTimeout(function(){
                        location.reload();
                    }, 1000);
                } else {
                    toastr.error(response.message);
                }
            },
            error:function(xhr, status, error){
                // Cerrar el modal
                var modal = bootstrap.Modal.getInstance(document.getElementById('deleteCourseModal'));
                modal.hide();

                // Intentar obtener mensaje de error del servidor
                var errorMessage = '{{ __("translate.Something went wrong") }}';
                if(xhr.responseJSON && xhr.responseJSON.message){
                    errorMessage = xhr.responseJSON.message;
                }
                toastr.error(errorMessage);
            }
        })
    });
});
</script>
@endpush