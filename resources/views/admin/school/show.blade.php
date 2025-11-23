@extends('admin.master_layout')
@section('title')
    <title>Detalles del Colegio</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">Detalles del Colegio</h3>
    <p class="crancy-header__text">Gestionar Colegio &gt;&gt; Detalles del Colegio</p>
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
                                                <i class="fas fa-list"></i> Lista de Colegios
                                            </a>
                                            <a href="{{ route('admin.schools.edit', $school->id) }}" class="crancy-btn">
                                                <i class="fas fa-edit"></i> Editar Colegio
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
                                                        <span class="badge bg-success">Activo</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactivo</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Details Column -->
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>Nombre del Colegio:</strong></label>
                                                    <p>{{ $school->name }}</p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>Slug:</strong></label>
                                                    <p><code>{{ $school->slug }}</code></p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>Color Primario:</strong></label>
                                                    <p>
                                                        <span style="display: inline-block; width: 30px; height: 30px; background-color: {{ $school->primary_color }}; border-radius: 50%; border: 1px solid #ddd; vertical-align: middle;"></span>
                                                        <code>{{ $school->primary_color }}</code>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>Color Secundario:</strong></label>
                                                    <p>
                                                        <span style="display: inline-block; width: 30px; height: 30px; background-color: {{ $school->secondary_color }}; border-radius: 50%; border: 1px solid #ddd; vertical-align: middle;"></span>
                                                        <code>{{ $school->secondary_color }}</code>
                                                    </p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>Total de Estudiantes:</strong></label>
                                                    <p><span class="badge bg-info" style="font-size: 1rem; padding: 0.5rem 1rem;">{{ $school->total_students }}</span></p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>Total de Instructores:</strong></label>
                                                    <p><span class="badge bg-warning" style="font-size: 1rem; padding: 0.5rem 1rem;">{{ $school->total_instructors }}</span></p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>Creado En:</strong></label>
                                                    <p>{{ $school->created_at->format('M d, Y h:i A') }}</p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="crancy__item-label"><strong>Actualizado En:</strong></label>
                                                    <p>{{ $school->updated_at->format('M d, Y h:i A') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Assign Course to School (Bulk) -->
                        <div class="row mg-top-20">
                            <div class="col-12">
                                <div class="crancy-product-card">
                                    <h4 class="crancy-product-card__title">Asignar Curso a Todos los Estudiantes</h4>
                                    <form action="{{ route('admin.schools.assign-course', $school->id) }}" method="POST" class="row g-3 mt-3">
                                        @csrf
                                        <div class="col-md-8">
                                            <label class="form-label">Seleccionar Curso</label>
                                            <select name="course_id" class="form-control" required>
                                                <option value="">-- Seleccionar Curso --</option>
                                                @foreach($courses as $course)
                                                    <option value="{{ $course->id }}">{{ Str::limit($course->title, 80) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-end">

                                            <button type="submit" class="crancy-btn btn-block">Asignar a Estudiantes del Colegio</button>
                                        </div>
                                    </form>
                                    <p class="text-muted small mt-2">Esto asignará el curso seleccionado a todos los estudiantes activos de este colegio. Los cursos ya asignados se mantendrán (se ignoran duplicados).</p>
                                </div>
                            </div>
                        </div>

                        <!-- Students List -->
                        <div class="row mg-top-30">
                            <div class="col-12">
                                <div class="crancy-product-card">
                                    <div class="crancy-table crancy-table--v3">
                                        <h4 class="crancy-product-card__title mb-3">Estudiantes ({{ $school->total_students }})</h4>

                                        @if($students->count() > 0)
                                            <div class="table-responsive">
                                                <table class="crancy-table__main crancy-table__main-v3">
                                                    <thead class="crancy-table__head">
                                                        <tr>
                                                            <th class="crancy-table__column-2 crancy-table__h2">Nombre</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">Correo</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">Estado</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">Fecha de registro</th>
                                                            <th class="crancy-table__column-2 crancy-table__h2">Acción</th>
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
                                                                    <span class="badge bg-success">Activo</span>
                                                                @else
                                                                    <span class="badge bg-danger">Inactivo</span>
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
                                            <p class="text-center text-muted py-4">No se encontraron estudiantes para este colegio</p>
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