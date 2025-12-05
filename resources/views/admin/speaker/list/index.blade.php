@extends('layouts.merge.dashboard')
@section('titulo', 'Lista de Oradores')

@section('content')


    <div class="card mb-2">
        <div class="card-body">
            <div class="row justify-content-between">
                <div class="col-12 col-md-6 col-lg-6">
                    <h2 class="h5 page-title">
                        Lista de Oradores
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
        <div class="card-body">

            <h5 class="text-center my-3">Lista de Oradores Aprovados e Emitidos</h5>

            <table class="table datatables table-hover table-bordered" id="dataTable-1">
                <thead class="bg-primary">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NOME</th>
                        <th>FUNÇÃO</th>
                        <th>EMPRESA</th>
                        <th>GÉNERO</th>
                         <th>STATUS</th>
                        <th>ACÇÕES</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($speakers as $item)

                    @if($item->status === 'APROVADO' || $item->status === 'EMITIDO')

                        <tr class="text-center text-dark">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }} </td>
                            <td>{{ $item->function }} </td>
                            <td>{{ $item->company }} </td>
                            <td>{{ $item->gender }} </td>
                            <td>
                                <a class="bg-warning text-white btn btn-sm"> {{ $item->status }} </a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                        <a href='{{ route('admin.speaker.show', $item->id) }}'
                                            class="dropdown-item">Detalhes</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.credencial.speaker.print', $item->id) }}"
                                            target="_blank">
                                            Imprimir Credencial
                                        </a>
                                        <a href='{{ route('admin.speaker.edit', $item->id) }}'
                                            class="dropdown-item">Editar</a>
                                        <a href='{{ route('admin.speaker.delete', $item->id) }}'
                                            class="dropdown-item">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endif
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>



    <div class="card shadow mb-4">
        <div class="card-body">

            <h5 class="text-center my-3">Lista de Oradores Recebidos</h5>

            <table class="table datatables table-hover table-bordered" id="dataTable-1">
                <thead class="bg-primary">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NOME</th>
                        <th>FUNÇÃO</th>
                        <th>EMPRESA</th>
                        <th>GÉNERO</th>
                        <th>STATUS</th>
                        <th>ACÇÕES</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($speakers as $item)
                    @if($item->status !== 'APROVADO' && $item->status !== 'EMITIDO')

                    <tr class="text-center text-dark">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }} </td>
                            <td>{{ $item->function }} </td>
                            <td>{{ $item->company }} </td>
                            <td>{{ $item->gender }} </td>
                            <td>
                             @if ($item->status === 'RECEBIDO')
                                <a class="bg-dark text-white btn btn-sm"> {{ $item->status }} </a>
                             @else($item->status === 'DUPLICADO')
                                <a class="bg-danger text-white btn btn-sm"> {{ $item->status }} </a>

                             @endif
                             </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                        <a href='{{ route('admin.speaker.show', $item->id) }}'
                                            class="dropdown-item">Detalhes</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.credencial.speaker.print', $item->id) }}"
                                            target="_blank">
                                            Imprimir Credencial
                                        </a>
                                        <a href='{{ route('admin.speaker.edit', $item->id) }}'
                                            class="dropdown-item">Editar</a>
                                        <a href='{{ route('admin.speaker.delete', $item->id) }}'
                                            class="dropdown-item">Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endif
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>


    @include('extra.modal.speaker.index')

@endsection
