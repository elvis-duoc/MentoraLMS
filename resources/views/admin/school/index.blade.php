@extends('admin.master_layout')
@section('title')
<title>{{ __('translate.School Management') }}</title>
@endsection
@section('admin-content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ __('translate.School Management') }}</h1>
        </div>

        <div class="section-body">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('translate.School List') }}</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.schools.create') }}" class="btn btn-success">
                                <i class="fas fa-plus"></i> {{ __('translate.Create New') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">{{ __('translate.SN') }}</th>
                                        <th width="10%">{{ __('translate.Logo') }}</th>
                                        <th width="20%">{{ __('translate.Name') }}</th>
                                        <th width="15%">{{ __('translate.Slug') }}</th>
                                        <th width="10%">{{ __('translate.Students') }}</th>
                                        <th width="10%">{{ __('translate.Instructors') }}</th>
                                        <th width="10%">{{ __('translate.Status') }}</th>
                                        <th width="20%">{{ __('translate.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($schools as $index => $school)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <img src="{{ $school->logo_url }}"
                                                 alt="{{ $school->name }}"
                                                 style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                        </td>
                                        <td>
                                            <div style="color: {{ $school->primary_color }}; font-weight: bold;">
                                                {{ $school->name }}
                                            </div>
                                        </td>
                                        <td>
                                            <code>{{ $school->slug }}</code>
                                        </td>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $school->total_students }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-warning">
                                                {{ $school->total_instructors }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($school->status == 'active')
                                                <span class="badge badge-success" onclick="schoolStatus({{ $school->id }})">{{ __('translate.Active') }}</span>
                                            @else
                                                <span class="badge badge-danger" onclick="schoolStatus({{ $school->id }})">{{ __('translate.Inactive') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.schools.show', $school->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.schools.edit', $school->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="javascript:;" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="deleteData({{ $school->id }})">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">{{ __('translate.No schools found') }}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            {{ $schools->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('translate.School Delete Confirmation') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('translate.Are You sure want to delete this school?') }}</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('translate.Close') }}</button>
                <form id="delete_form" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">{{ __('translate.Yes, Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteData(id){
        $("#delete_form").attr("action",'{{ url("admin/schools/") }}'+"/"+id)
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
@endsection