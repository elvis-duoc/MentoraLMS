@extends('admin.master_layout')
@section('title')
    <title>Sección Frontend</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">Sección Frontend</h3>
    <p class="crancy-header__text">Gestionar Contenido >> Sección Frontend</p>
@endsection
@php

@endphp
@section('body-content')

    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="crancy-table crancy-table--v3 mg-top-30">
                                <div class="crancy-customer-filter">

                                     <div class="container">
                                            <div class="row">
                                                @foreach ($sections as $key => $section)
                                                    <div class="col-md-4 mb-4">
                                                        <div class="card h-100">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $section['name'] }}</h5>
                                                                <a href="{{ route('admin.front-end.section', ['id'=> $key, 'lang_code' => admin_lang()]) }}" class="btn btn-primary"> <i class="fas fa-edit    "></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
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
