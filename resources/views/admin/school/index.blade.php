@extends('admin.master_layout')
@section('title')
    <title>Gestión de Colegios</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">Gestionar Colegio</h3>
    <p class="crancy-header__text">Gestionar Colegio &gt;&gt; Lista de Colegios</p>
@endsection

@section('body-content')
<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12">
                <div class="crancy-body">

                    {{-- Mensajes de éxito o error --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <strong>✔️ {{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <strong>❌ {{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="crancy-dsinner">
                        <div class="crancy-table crancy-table--v3 mg-top-30">

                            <div class="crancy-customer-filter">
                                <div class="crancy-customer-filter__single crancy-customer-filter__single-one">
                                    <div class="crancy-header__form crancy-header__form--customer">
                                        <h4 class="crancy-product-card__title">Lista de Colegios</h4>
                                    </div>
                                </div>

                                <div class="crancy-customer-filter__single crancy-customer-filter__single-two">
                                    <div class="crancy-header__form--group">
                                            <a href="{{ route('admin.schools.create') }}" class="crancy-btn">
                                            <i class="fas fa-plus-circle"></i> Crear Nuevo
                                        </a>
                                        <button type="button" class="crancy-btn crancy-btn__filter ms-2" data-bs-toggle="modal" data-bs-target="#importExcelModal">
                                            <i class="fas fa-file-upload"></i> Importar Excel

                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content" id="nav-tabContent">
                                <table id="crancy-table__main" class="crancy-table__main crancy-table__main-v3">
                                    <thead class="crancy-table__head">
                                        <tr>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">N.º</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">Logo</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">Nombre</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">Slug</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">Estudiantes</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">Instructores</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">Estado</th>
                                            <th class="crancy-table__column-3 crancy-table__h3 sorting">Acción</th>
                                        </tr>
                                    </thead>

                                    <tbody class="crancy-table__body">
                                        @forelse($schools as $index => $school)
                                            <tr class="odd">
                                                {{-- Número consecutivo --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $schools->firstItem() + $index }}</h4>
                                                </td>

                                                {{-- Logo --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <img src="{{ $school->logo_url }}" alt="{{ $school->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                                </td>

                                                {{-- Nombre --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2" style="max-width: 150px;">
                                                    <h4 class="crancy-table__product-title" style="color: {{ $school->primary_color }}; font-weight: bold; white-space: normal; word-wrap: break-word; line-height: 1.3;">{{ $school->name }}</h4>
                                                </td>

                                                {{-- Slug --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2" style="max-width: 150px;">
                                                    <h4 class="crancy-table__product-title" style="white-space: normal; word-wrap: break-word; line-height: 1.3;"><code style="white-space: normal; word-wrap: break-word;">{{ $school->slug }}</code></h4>
                                                </td>

                                                {{-- Estudiantes --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <span class="badge bg-info">{{ $school->total_students }}</span>
                                                </td>

                                                {{-- Instructores --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <span class="badge bg-warning">{{ $school->total_instructors }}</span>
                                                </td>

                                                {{-- Status --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if($school->status == 'active')
                                                        <span class="badge bg-success" style="cursor: pointer;" onclick="schoolStatus({{ $school->id }})">Activo</span>
                                                    @else
                                                        <span class="badge bg-danger" style="cursor: pointer;" onclick="schoolStatus({{ $school->id }})">Inactivo</span>
                                                    @endif
                                                </td>

                                                {{-- Acciones --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <a href="{{ route('admin.schools.show', $school->id) }}" class="crancy-btn crancy-btn__filter" title="Ver">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.schools.edit', $school->id) }}" class="crancy-btn crancy-btn__filter">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a onclick="itemDeleteConfrimation({{ $school->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#deleteModal" class="crancy-btn delete_danger_btn">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No se encontraron colegios</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Paginación --}}
                            <div class="crancy-table-bottom mg-top-30">
                                <div class="crancy-table-bottom__right">
                                    {{ $schools->links() }}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

{{-- Modal de confirmación de borrado --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmación de Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este colegio?</p>
            </div>
            <div class="modal-footer">
                <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal de importación Excel --}}
<div class="modal fade" id="importExcelModal" tabindex="-1" aria-labelledby="importExcelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="importExcelModalLabel">Importar Colegios desde Excel</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.schools.import-excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="excel_file" class="form-label">Seleccionar Archivo (.xls)</label>
                        <input type="file" class="form-control" id="excel_file" name="file" accept=".xls,.csv" required>
                        <small class="text-muted">Formatos aceptados: .xls (Excel 97-2003)</small>
                    </div>
                    <div class="alert alert-info">
                        <strong>Formato requerido:</strong>
                        <ul class="mb-0 mt-2">
                            <li><strong>name</strong>: Nombre del colegio (único campo obligatorio)</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('admin.schools.download-template') }}" class="btn btn-sm btn-success">
                            <i class="fas fa-download"></i> Descargar Plantilla (.xls)
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Importar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('js_section')
<script>
    "use strict"
    
    function itemDeleteConfrimation(id){
        $("#item_delect_confirmation").attr("action",'{{ url("admin/schools/") }}'+"/"+id)
    }

    function schoolStatus(id){
        var isDemo = "{{ env('APP_MODE') }}"
        if(isDemo == 'DEMO'){
            toastr.error('This Is Demo Version. You Can Not Change Anything');
            return;
        }
        $.ajax({
            type:"put",
            data: { _token : '{{ csrf_token() }}' },
            url:"{{url('/admin/school-status/')}}"+"/"+id,
            success:function(response){
                toastr.success(response.notification)
                window.location.reload();
            },
            error:function(err){
                toastr.error('{{ __("translate.Something went wrong") }}')
            }
        });
    }
</script>
@endpush