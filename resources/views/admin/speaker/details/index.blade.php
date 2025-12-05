@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes do Orador')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.speaker.index') }}"><u>Listar Oradores</u></a> > {{ $speaker->name }}
            </h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">

            <div class="container-fluid">
                <div class="row align-items-center m-5">
                    <div class="col">
                        <h4 class="page-title">{{ $speaker->name }} <br>
                            <small><i>Nome</i></small>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href='{{ route('admin.speaker.edit', $speaker->id) }}' type="button"
                            class="btn btn-lg btn-primary text-white"><span class="fe fe-plus fe-16 mr-3"></span>
                            Editar
                        </a>
                        <a type="button" class="btn btn-lg btn-primary text-white"
                            href="{{ route('admin.credencial.speaker.print', $speaker->id) }}"
                            target="_blank">
                            <span class="fa fa-print fa-16 mr-3"></span>Imprimir Credencial
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row m-5 align-items-center">

                              <div class="col-12 col-md-6 col-lg-6 mb-2">
                                <h5 class="mb-1">
                                    <b>Estado</b>
                                </h5>
                                 <p class="text-dark">
                                                @if ($speaker->status == 'RECEBIDO')
                                                    <b class="bg-primary p-2 rounded text-white">
                                                        {{ $speaker->status }}
                                                    </b>

                                                @elseif ($speaker->status == 'DUPLICADO')
                                                    <b class="bg-danger p-2 rounded text-white">
                                                        {{ $speaker->status }}
                                                    </b>
                                                @elseif ($speaker->status == 'EMITIDO')
                                                    <b class="bg-warning p-2 rounded text-white">
                                                        {{ $speaker->status }}
                                                    </b>
                                                @endif
                                            </p>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                <h5 class="mb-1">
                                    <b>Género</b>
                                </h5>
                                <p class="text-dark text-justify">{{ $speaker->gender }}</p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                <h5 class="mb-1">
                                    <b>Função ou Grau Académico:</b>
                                </h5>
                                <p class="text-dark text-justify">{{ $speaker->function }}</p>

                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                <h5 class="mb-1">
                                    <b>Empresa/Governo/Instituição:</b>
                                </h5>
                                <p class="text-dark text-justify">{{ $speaker->company }}</p>

                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-2">
                                <h5 class="mb-1">
                                    <b>Ordem de Prioridade:</b>
                                </h5>
                                <p class="text-dark text-justify">{{ $speaker->priority }}</p>

                            </div>


                            <div class="col-md-12 mb-2">
                                <h5 class="mb-1">
                                    <b>Descrição:</b>
                                </h5>
                                <p class="text-dark text-justify">{!! html_entity_decode($speaker->description) !!}</p>

                            </div>

                            <div class="col-12">
                                <div class="row align-items-center my-4">
                                    <div class="col">
                                        <h2 class="page-title">Foto</h2>
                                    </div>

                                </div>
                                <div class="card-deck mb-4">

                                    <div class="col-12 col-md-6 col-lg-6">
                                        <img src="/storage/{{ $speaker->photo }}" width="100%">

                                    </div> <!-- .card -->
                                </div> <!-- .card-deck -->
                            </div>


                            <div class="col-12 mb-2">
                                <hr>
                                <p class="mb-1 text-dark"><b>Data de Cadastro:</b> {{ $speaker->created_at }}
                                </p>
                                <p class="mb-1 text-dark"><b>Última Actualização:</b> {{ $speaker->updated_at }}
                                </p>

                            </div>

                        </div>


                    </div> <!-- /.col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->


        </div>
    </div>




@endsection
