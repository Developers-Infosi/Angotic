@extends('layouts.merge.dashboard')
@section('titulo', 'List Operational Teams')
@section('content')


    <div class="card mb-2">
        <div class="card-body">

            <div class="row justify-content-between">
                <div class="col-12 col-md-8 col-lg-6">
                    <h2 class="h5 page-title">
                        List Operational Teams
                    </h2>
                </div>
                <div class="col-12 col-md-6 col-lg-6 text-right">

                    <a href="{{ route('admin.team.create') }}" class="btn btn-primary">
                        <i class="fa fa-plus text-white"></i>Create
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body table-responsive">
            <table class="table datatables table-hover table-bordered" id="dataTable-1">
                <thead class="bg-primary">
                    <tr class="text-center">
                        <th>#</th>
                        <th>NAME</th>
                        <th>COMPANY</th>
                        <th>CATEGORY</th>
                        <th>QNT</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($teams as $item)
                        <tr class="text-center text-dark">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->company }} </td>
                            <td>{{ $item->type }} </td>
                            <td>{{ $item->quantity }} </td>
                            <td>
                                @if ($item->status == 'RECEBIDO')
                                    <b class="bg-primary p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                              
                                @elseif ($item->status == 'DUPLICADO')
                                    <b class="bg-danger p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @elseif ($item->status == 'EMITIDO')
                                    <b class="bg-success p-2 rounded text-white">
                                        {{ $item->status }}
                                    </b>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href='{{ route('admin.team.show', $item->id) }}'>
                                    <i class="fe fe-eye" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-primary btn-sm" href='{{ route('admin.team.edit', $item->id) }}'>
                                    <i class="fe fe-edit" aria-hidden="true"></i>
                                </a>

                                <a class="btn btn-success btn-sm"
                                    href='{{ route('admin.team.print', $item->id) }}' target='_blank'>
                                    <i class="fe fe-printer text-white" aria-hidden="true"></i>
                                </a>

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
