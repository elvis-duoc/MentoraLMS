@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Comment Detail') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Comment Detail') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Blog') }} >> {{ __('translate.Comment Detail') }}</p>
@endsection

@section('body-content')


 <!-- crancy Dashboard -->
 <section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12">
                <div class="crancy-body">
                    <div class="crancy-dsinner">

                        <div class="crancy-table crancy-table--v3 mg-top-30">

                            <div class="crancy-customer-filter">
                                <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                    <div class="crancy-header__form crancy-header__form--customer">
                                        <h4 class="crancy-product-card__title">{{ __('translate.Comment Detail') }}</h4>
                                    </div>
                                </div>
                            </div>

                            <!-- crancy Table -->
                            <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer">

                                    <!-- crancy Table Body -->
                                    <tbody class="crancy-table__body review-detials">

                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Name') }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ html_decode($blog_comment->name) }}</h4>
                                                </td>


                                            </tr>

                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Email') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ html_decode($blog_comment->email) }}</h4>
                                                </td>

                                            </tr>


                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Created') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $blog_comment->created_at->format('h:iA, d F Y') }}</h4>
                                                </td>

                                            </tr>

                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Message') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ html_decode($blog_comment->comment) }}</h4>
                                                </td>

                                            </tr>

                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Blog') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                <a target="_blank" class="btn-black" href="{{ route('blog', $blog_comment?->blog?->slug) }}">{{ __('translate.Go to Blog') }}</a>
                                                </td>

                                            </tr>



                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Change Status') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <div class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                        <label class="crancy__item-switch">
                                                        <input onClick="manageStatus({{ $blog_comment->id }})" name="status" type="checkbox" {{ $blog_comment->status == 1 ? 'checked' : '' }}>
                                                        <span class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                        </label>
                                                    </div>
                                                </td>

                                            </tr>

                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('translate.Delete Comment') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <a onclick="itemDeleteConfrimation({{ $blog_comment->id }})" href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" class="crancy-btn delete_danger_btn"><i class="fas fa-trash"></i> </a>
                                                </td>

                                            </tr>

                                    </tbody>
                                    <!-- End crancy Table Body -->
                                </table>
                            </div>
                            <!-- End crancy Table -->
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End crancy Dashboard -->



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
            $("#item_delect_confirmation").attr("action",'{{ url("admin/cms/delete-blog-comment/") }}'+"/"+id)
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
                url:"{{url('/admin/cms/blog-comment-status/') }}"+"/"+id,
                success:function(response){
                    toastr.success(response)
                },
                error:function(err){}
            })
        }
    </script>
@endpush
