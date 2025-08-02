@extends('Template/maestraAdmin')
@section('contenido')

        <div class="conatiner-fluid content-inner mt-5 py-0">
            <div class="row">
                <div class="col-md-12">
                    <div class="card banner">
                        <div class="card-body ">
                            <div class="row justify-content-center align-items-center banner-container">
                                <div class="col-lg-6 banner-item">
                                    <div class="banner-text">
                                        <h1 class="fw-bold mb-4">
                                         {{ __('Welcome') }}, <span class="text-secondary"> {{ __('Instructor') }} !</span>
                                        </h1>
                                    </div>
                                    <p class="mb-4">{{ __('Welcome to your instructor dashboard, create exercises and add students.') }}</p>
                                    <!-- <button type="button" class="btn btn-primary">Get Started</button> -->
                                </div>
                                <div class="col-lg-6 banner-img">
                                    <div class="img">
                                        <img src="../assets/images/principal/plataforma.png" class="img-fluid w-55" alt="img8">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection