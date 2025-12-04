@extends('layouts.merge.dashboard')
@section('titulo', 'Listed Participants')

@section('content')
    <div class="card mb-2">
        <div class="card-body">

            <div class="row justify-content-between">
                <div class="col-12 col-md-6 col-lg-8">
                    <h2 class="h5 page-title">
                        Listed Participants
                    </h2>
                </div>

                @if ('Convidado' == Auth::user()->level || 'Administrador' == Auth::user()->level)
                    <div class="col-12 col-md-6 col-lg-4">
                        <button onclick="window.location.href='{{ route('registrations.export') }}'" class="btn btn-primary">
                            📊 Export Records
                        </button>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <div class="card shadow mb-4">

        <div class="card-body table-responsive">
            <table class="table datatables table-hover table-bordered" id="dataTable-1">
                <thead class="bg-primary">
                    <tr class="text-center">
                        <th>ID.</th>
                        <th>CODE</th>
                        <th>NAME</th>
                        <th>ORGANIZATION</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($registrations as $item)
                        <tr class="text-center text-dark">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->title . ' ' . $item->fullname }} </td>
                            <td>{{ $item->org_name }}
                                <br>
                                <small>"{{ $item->org_type }}"</small>
                            </td>

                            <td>
                                @if ($item->status == 'RECEBIDO')
                                    <b class="bg-primary p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @elseif ($item->status == 'IMPRESSO')
                                    <b class="bg-success p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @elseif ($item->status == 'DUPLICADO')
                                    <b class="bg-danger p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @elseif ($item->status == 'APROVADO')
                                    <b class="bg-warning p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @endif
                            </td>


                            <td>
                                <a class="btn btn-primary btn-sm" href='{{ route('admin.registration.show', $item->id) }}'>
                                    <i class="fe fe-eye" aria-hidden="true"></i>
                                </a>

                                @if ($item->status == 'APROVADO' || $item->status == 'IMPRESSO')
                                    @if ('USP' == Auth::user()->level || 'Administrador' == Auth::user()->level)
                                        <a class="btn btn-success btn-sm"
                                            href='{{ route('admin.registration.print', $item->code) }}' target='_blank'>
                                            <i class="fe fe-printer text-white" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                @endif

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
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
