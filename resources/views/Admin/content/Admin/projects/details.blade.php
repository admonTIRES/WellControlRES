@extends('Template/maestraAdmin')
@section('contenido')

<div class="conatiner-fluid content-inner mt-5 py-0">
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card banner">
                    <div class="card-body ">
                        <div class="row justify-content-center align-items-center banner-container">
                            <div class="col-lg-6 banner-item">
                                <div class="banner-text">
                                    <h1 class="fw-bold mb-4">
                                        <span class="text-secondary">{{ __('Projects') }} </span> {{ __('management') }}
                                    </h1>
                                </div>
                                <p class="mb-4">{{ __('You can create project (general data, students, passwords, date)') }}</p>
                            </div>
                            <div class="col-lg-6 banner-img">
                                <div class="img">
                                    <img src="/assets/images/plataformas/plataforma.png" class="img-fluid w-55"
                                        alt="img8">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 text-capitalize">{{ __('Projects dashboard') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="w-100 h-100">
                            <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                <h4 class="card-title mb-0">{{ __('Projects list') }}</h4>
                            </div>
                            <div class="table-container">
                                <table id="students-list-table" class="table" role="grid">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@php
$css_identifier = 'detailsProject';
@endphp