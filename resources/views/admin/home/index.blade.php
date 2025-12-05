@extends('layouts.merge.dashboard')
@section('titulo', 'Administrativo')
@section('content')


    <div class="card mb-2">
        <div class="card-body">
            <div class="row justify-content-between">

                <div class="col-12 col-md-6 col-lg-6">

                    <h2 class="h5 page-title mt-2">
                        <b>PORTAL DO ANGOLA ICT FÓRUM – ANGOTIC 2026</b><br>
                        <small>NA ROTA DA TRANSFORMAÇÃO DIGITAL</small>
                    </h2>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 mb-2">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <h5 class="text-dark">Participantes</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-2">
            <div class="card shadow bg-dark text-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-light">
                                <i class="fe fe-16 fe-users text-dark mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-light mb-0">GERAL</p>
                            <span class="h3 mb-0 text-white">{{ $registration }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-3 mb-2">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-dark mb-0"> <b>PARTICIPANTE ESTUDANTE</b></p>
                            <span class="h3 mb-0 text-dark">{{ $registration_Participant_Estudante }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-2">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-dark mb-0"> <b>PARTICIPANTE C</b></p>
                            <span class="h3 mb-0 text-dark">{{ $registration_Participant_c }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-2">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-dark mb-0"> <b>PARTICIPANTE B</b></p>
                            <span class="h3 mb-0 text-dark">{{ $registration_Participant_b }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-2">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-dark mb-0"> <b>PARTICIPANTE A</b></p>
                            <span class="h3 mb-0 text-dark">{{ $registration_Participant_a }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-2">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-dark mb-0"> <b>INGRESSO FAMILIAR</b></p>
                            <span class="h3 mb-0 text-dark">{{ $registration_Participant_Familiar }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-3 mb-2">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-dark mb-0"> <b>INGRESSO VIP</b></p>
                            <span class="h3 mb-0 text-dark">{{ $registration_vip }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection
