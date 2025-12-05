@extends('layouts.merge.dashboard')
@section('titulo', 'Lista De Participantes')

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-12 col-md-6 col-lg-6">
                    <h2 class="h5 page-title">
                        Lista de Participantes
                    </h2>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-right">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-file-pdf-o text-white"></i>Imprimir Lista
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">


        {{--  <div class="container-fluid my-5">

                <h3 class="text-center">Estatística de Participantes Emitidos e Aprovados</h3>

        <div class="row">



            <div class="col-12 col-md-4 col-lg-3 mb-2 my-3">
                <div style="background: purple;" class="card shadow text-white">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-light">
                                    <i class="fe fe-16 fe-users text-dark mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-white mb-0">PARTICIPANTE VIP</p>
                                <span class="h3 mb-0 text-white">{{ $registration_vip }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-3 mb-2 my-3">
                <div style="background: #484848;" class="card shadow text-white">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-light">
                                    <i class="fe fe-16 fe-users text-dark mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-white mb-0">PARTICIPANTE C</p>
                                <span class="h3 mb-0 text-white">{{ $registration_Participant_c }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-3 mb-2 my-3">
                <div style="background: darkgoldenrod;" class="card shadow text-white">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-light">
                                    <i class="fe fe-16 fe-users text-dark mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-white mb-0">PARTICIPANTE B</p>
                                <span class="h3 mb-0 text-white">{{ $registration_Participant_b }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-3 mb-2 my-3">
                <div style="background: darkred;" class="card shadow text-white">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-light">
                                    <i class="fe fe-16 fe-users text-dark mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-white mb-0">PARTICIPANTE A</p>
                                <span class="h3 mb-0 text-white">{{ $registration_Participant_a }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-3 mb-2 my-3">
                <div style="background: rgb(139, 0, 86);" class="card shadow text-white">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-light">
                                    <i class="fe fe-16 fe-users text-dark mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-white mb-0">INGRESSO FAMILIAR</p>
                                <span class="h3 mb-0 text-white">{{ $registration_Participant_Familiar }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-3 mb-2 my-3">
                <div style="background: #0e20a9;" class="card shadow text-white">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-3 text-center">
                                <span class="circle circle-sm bg-light">
                                    <i class="fe fe-16 fe-users text-dark mb-0"></i>
                                </span>
                            </div>
                            <div class="col pr-0">
                                <p class="small text-white mb-0">PARTICIPANTE ESTUDANTE</p>
                                <span class="h3 mb-0 text-white">{{ $registration_Participant_Estudante }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</div>
        </div>
 --}}

        <div class="card-body table-responsive">
            <h3 class="text-center">Lista de Registos Emitidos e Aprovados</h3>
            <table class="table datatables table-hover table-bordered" id="dataTable-1">
                <thead class="bg-primary">
                    <tr class="text-center">
                        <th>#</th>

                        <th>CÓDIGO</th>
                        <th>NOME</th>
                        <th>PLAFOND</th>
                        <th>TIPO DE PAGAMENTO</th>
                        <th>STATUS <br> INSCRIÇÃO</th>
                        <th>QNT</th>
                        <th>ACÇÕES</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($registration_general as $item)
                        <tr class="text-center text-dark">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }} </td>
                            <td>{{ $item->plafond }}</td>
                            <td>{{ $item->paymethod }}</td>

                            <td>
                                @if ($item->status == 'RECEBIDO')
                                    <b class="bg-primary p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @elseif($item->status == 'APROVADO')
                                    <b class="bg-warning p-2 rounded text-dark">
                                        {{ $item->status }}
                                    </b>
                                @elseif ($item->status == 'DUPLICADO')
                                    <b class="bg-danger p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @elseif ($item->status == 'EMITIDO')
                                    <b class="bg-success p-2 rounded text-white">
                                        {{ $item->status }}-{{ $item->printed_at }}
                                    </b>
                                @endif
                            </td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a href='{{ route('admin.registration.show', $item->id) }}'
                                            class="dropdown-item">Detalhes</a>
                                            {{--


                                        @if ($item->status == 'EMITIDO' || $item->status == 'APROVADO')
                                            <a href='{{ route('admin.credencial.guest.print', $item->code) }}'
                                                class="dropdown-item" target='_blank'>Imprimir Credencial</a>
                                        @endif


                                            --}}
                                        <a href='{{ route('admin.registration.edit', $item->id) }}'
                                            class="dropdown-item">Editar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body table-responsive">
            <h3 class="text-center">Lista de Registos Recebidos</h3>
            <table class="table datatables table-hover table-bordered" id="dataTable-2">
                <thead class="bg-primary">
                    <tr class="text-center">
                        <th>#</th>
                        <th>CÓDIGO</th>
                        <th>NOME</th>
                        <th>PLAFOND</th>
                        <th>TIPO DE PAGAMENTO</th>
                        <th>STATUS <br> INSCRIÇÃO</th>
                        <th>QNT</th>
                        <th>ACÇÕES</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($registration as $item)
                        <tr class="text-center text-dark">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }} </td>
                            <td>{{ $item->plafond }}</td>
                            <td>{{ $item->paymethod }}</td>

                            <td>
                                @if ($item->status == 'RECEBIDO')
                                    <b class="bg-primary p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @elseif($item->status == 'APROVADO')
                                    <b class="bg-warning p-2 rounded text-dark">
                                        {{ $item->status }}
                                    </b>
                                @elseif ($item->status == 'DUPLICADO')
                                    <b class="bg-danger p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @elseif ($item->status == 'EMITIDO')
                                    <b class="bg-success p-2 rounded text-white">
                                        {{ $item->status }}-{{ $item->printed_at }}
                                    </b>
                                @endif
                            </td>
                         <td>{{ $item->quantity }}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a href='{{ route('admin.registration.show', $item->id) }}'
                                            class="dropdown-item">Detalhes</a>

                                        @if ($item->status == 'EMITIDO' || $item->status == 'APROVADO')
                                            <a href='{{ route('admin.credencial.guest.print', $item->code) }}'
                                                class="dropdown-item" target='_blank'>Imprimir Credencial</a>
                                        @endif

                                        <a href='{{ route('admin.registration.edit', $item->id) }}'
                                            class="dropdown-item">Editar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>


    @include('extra.modal.participant.index')


@endsection

@section('JS')
    <script>
        $('#dataTable-2').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [8, 16, 32, -1],
                [8, 16, 32, "All"]
            ],
            "order": [
                [0, 'desc']
            ]
        });
    </script>
@endsection
