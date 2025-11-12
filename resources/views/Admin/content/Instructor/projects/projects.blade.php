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
                                            <span class="text-secondary">{{ __('Projects') }}</span> {{ __('management') }}
                                            </h1>
                                        </div>
                                        <p class="mb-4">{{ __('You can manage active projects (assign tests, deadlines, view progress, grades and more).') }}</p>
                                    </div>
                                    <div class="col-lg-6 banner-img">
                                        <div class="img">
                                            <img src="../assets/images/principal/plataforma.png" class="img-fluid " alt="img8">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">                                                                                                                                                                                  
                                <div class="w-100 h-100">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                    <div class="header-title d-flex justify-content-between align-items-center w-100 mb-4">
                                        <h4 class="card-title mb-0">Lista de proyectos </h4> 
                                    </div>
                                    <div class="table-responsive">
                                        <table id="project-list-table" class="table table-striped table-wrap" role="grid">
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