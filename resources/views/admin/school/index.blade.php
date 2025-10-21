@extends('admin.master_layout')
@section('title')
    <title>Gestionar Colegio</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.School Management') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage School') }} >> {{ __('translate.School List') }}</p>
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
                            <strong>⚠️ {{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="crancy-dsinner">
                        <div class="crancy-table crancy-table--v3 mg-top-30">

                            {{-- Botones Crear e Importar --}}
                            <div class="crancy-customer-filter">
                                <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                    <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                        <h4 class="crancy-product-card__title">{{ __('translate.School List') }}</h4>

                                        {{-- Formulario Importar CSV --}}
                                        <form action="{{ route('admin.schools.import.csv') }}" method="POST" enctype="multipart/form-data" class="d-inline-block ms-2">
                                            @csrf
                                            <input type="file" name="file" accept=".csv" required style="display:inline-block;">
                                            <button type="submit" class="crancy-btn">Importar CSV Masivo</button>
                                        </form>

                                        {{-- Crear Nuevo Colegio --}}
                                        <a href="{{ route('admin.schools.create') }}" class="crancy-btn">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M8 1V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M1 8H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                            {{ __('translate.Create New') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- Tabla de colegios --}}
                            <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">
                                <table class="crancy-table__main crancy-table__main-v3 no-footer" id="dataTable">
                                    <thead class="crancy-table__head">
                                        <tr>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">{{ __('translate.SN') }}</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">{{ __('translate.Logo') }}</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">{{ __('translate.Name') }}</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">{{ __('translate.Slug') }}</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">{{ __('translate.Students') }}</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">{{ __('translate.Instructors') }}</th>
                                            <th class="crancy-table__column-2 crancy-table__h2 sorting">{{ __('translate.Status') }}</th>
                                            <th class="crancy-table__column-3 crancy-table__h3 sorting">{{ __('translate.Action') }}</th>
                                        </tr>
                                    </thead>

                                    <tbody class="crancy-table__body">
                                        @foreach ($schools as $index => $school)
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
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title" style="color: {{ $school->primary_color }}; font-weight: bold;">{{ $school->name }}</h4>
                                                </td>

                                                {{-- Slug --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title"><code>{{ $school->slug }}</code></h4>
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
                                                        <span class="badge bg-success" style="cursor: pointer;" onclick="schoolStatus({{ $school->id }})">{{ __('translate.Active') }}</span>
                                                    @else
                                                        <span class="badge bg-danger" style="cursor: pointer;" onclick="schoolStatus({{ $school->id }})">{{ __('translate.Inactive') }}</span>
                                                    @endif
                                                </td>

                                                {{-- Acciones --}}
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <a href="{{ route('admin.schools.show', $school->id) }}" class="crancy-btn" title="{{ __('translate.View') }}"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('admin.schools.edit', $school->id) }}" class="crancy-btn"><i class="fas fa-edit"></i> {{ __('translate.Edit') }}</a>
                                                    <a onclick="itemDeleteConfrimation({{ $school->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="crancy-btn delete_danger_btn"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translate.Close') }}</button>
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
            }
        });
    }
</script>
@endpush
