@extends('layouts.merge.dashboard')
@section('titulo', 'Detalhes do registo ' . $registration->name)

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.registration.index') }}"><u>Lista De Participantes</u></a> >
                {{ $registration->name }}
            </h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row justify-content-between mb-4">
                            <div class="col-12 col-md-6 col-lg-6 mt-5 ml-5">
                                <h2 class="h3 page-title">
                                    Nome: {{ $registration->name }}
                                </h2>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 text-right mt-5">
                              {{--

                                @if ($registration->status == 'EMITIDO' || $registration->status == 'APROVADO')
                                    <a href='{{ route('admin.credencial.guest.print', $registration->code) }}'
                                        class="btn btn-primary" target='_blank'>Imprimir Credencial</a>
                                @endif

                              --}}
                                <a href='{{ route('admin.registration.edit', $registration->id) }}'
                                    class="btn btn-white text-dark border-dark">Editar</a>
                                <a href='{{ route('site.registration.invoice', ['idCard' => $registration->idCard, 'code' => $registration->code]) }}'
                                    target="_blank" class="btn btn-primary text-white border-dark">Documento de
                                    Pagamento</a>
                            </div>
                        </div>
                        <div class="row mx-5 mb-5 align-items-center">

                            <div class="row align-items-center">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <h5 class="mb-2">
                                                <b>Estado da Inscrição</b>
                                            </h5>
                                            <p class="text-dark">
                                                @if ($registration->status == 'RECEBIDO')
                                                    <b class="bg-primary p-2 rounded text-white">
                                                        {{ $registration->status }}
                                                    </b>
                                                @elseif($registration->status == 'APROVADO')
                                                    <b class="bg-warning p-2 rounded text-dark">
                                                        {{ $registration->status }}
                                                    </b>
                                                @elseif ($registration->status == 'DUPLICADO')
                                                    <b class="bg-danger p-2 rounded text-white">
                                                        {{ $registration->status }}
                                                    </b>
                                                @elseif ($registration->status == 'EMITIDO')
                                                    <b class="bg-success p-2 rounded text-white">
                                                        {{ $registration->status }}
                                                    </b>
                                                @endif
                                            </p>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <h5 class="mb-1">
                                        <b>Tipo</b>
                                    </h5>
                                    <p class="text-dark">
                                        {{ $registration->type }}
                                    </p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <h5 class="mb-1">
                                        <b>NIF (Número de Identificação Fiscal) / Passaporte</b>
                                    </h5>
                                    <p class="text-dark">
                                        {{ $registration->nif }}
                                    </p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <h5 class="mb-1">
                                        <b>Nome</b>
                                    </h5>
                                    <p class="text-dark">
                                        {{ $registration->name }}
                                    </p>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <h5 class="mb-1">
                                        <b>Email</b>
                                    </h5>
                                    <p class="text-dark">
                                        {{ $registration->email }}
                                    </p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <h5 class="mb-1">
                                        <b>Telefone</b>
                                    </h5>
                                    <p class="text-dark">
                                        {{ $registration->tel }}
                                    </p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <h5 class="mb-1">
                                        <b>Telefone</b>
                                    </h5>
                                    <p class="text-dark">
                                        {{ $registration->tel }}
                                    </p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <h5 class="mb-1">
                                        <b>Plafond</b>
                                    </h5>
                                    <p class="text-dark">
                                        {{ $registration->plafond }}
                                    </p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <h5 class="mb-1">
                                        <b>Metodo de Pagamento</b>
                                    </h5>
                                    <p class="text-dark">
                                        {{ $registration->paymethod }}
                                    </p>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <h5 class="mb-1">
                                        <b>Quantidade de Credenciais</b>
                                    </h5>
                                    <h2 class="text-dark text-justify">
                                        {{ $registration->quantity }}
                                    </h2>
                                </div>


                            </div>

                            <div class="row align-items-center">
                                <div class="col-md-7 mb-2">
                                    <hr>
                                    <p class="mb-1 text-dark"><b>Data de Cadastro</b> {{ $registration->created_at }}
                                    </p>
                                    <p class="mb-1 text-dark"><b>Última Actualização</b> {{ $registration->updated_at }}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div> <!-- /.col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
        </div>
    </div>
@endsection
