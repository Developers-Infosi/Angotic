@extends('layouts.merge.dashboard')
@section('titulo', 'Details ' . $team->name)

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.team.index') }}"><u>List Operational Teams</u></a> >
                {{ $team->name }}
            </h2>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">

            <!-- card-->
            <div class="card shadow col-12">
                <div class="card-body">


                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h4 class="page-title">{{ $team->name }} <br>
                                <small><i>Name</i></small>
                            </h4>
                        </div>
                        <div class="col-auto">
                            <a type="button" class="btn btn-lg btn-primary text-white"
                                href="{{ route('admin.team.edit', $team->id) }}">
                                <span class="fe fe-plus fe-16 mr-3"></span>Edit
                            </a>
                            <a type="button" class="btn btn-lg btn-primary text-white"
                                href="{{ route('admin.team.print', $team->id) }}" target="_blank">
                                Print Credential
                            </a>
                        </div>
                    </div>

                    <div class="col-12 mt-5 mb-5">

                        <div class="row align-items-center">
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <h5 class="mb-1">
                                    <b>Status</b>
                                </h5>
                                <p class="text-dark">

                                    @if ($team->status == 'RECEBIDO')
                                        <b class="bg-primary p-2 rounded text-white">
                                            {{ $team->status }}
                                        </b>
                                   
                                    @elseif ($team->status == 'DUPLICADO')
                                        <b class="bg-danger p-2 rounded text-white">
                                            {{ $team->status }}
                                        </b>
                                    @elseif ($team->status == 'EMITIDO')
                                        <b class="bg-success p-2 rounded text-white">
                                            {{ $team->status }}
                                        </b>
                                    @endif
                                </p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <h5 class="mb-1">
                                    <b>Category</b>
                                </h5>
                                <p class="text-dark text-justify">
                                    {{ $team->type }}
                                </p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <h5 class="mb-1">
                                    <b>Company</b>
                                </h5>
                                <p class="text-dark text-justify">
                                    {{ $team->company }}
                                </p>
                            </div>

                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <h5 class="mb-1">
                                    <b>Quantity</b>
                                </h5>
                                <p class="text-dark">
                                    {{ $team->quantity }}
                                </p>
                            </div>


                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <h5 class="mb-1">
                                    <b>Phone</b>
                                </h5>
                                <p class="text-dark text-justify">
                                    {{ $team->tel }}
                                </p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 mb-2">
                                <h5 class="mb-1">
                                    <b>Email</b>
                                </h5>
                                <p class="text-dark text-justify">
                                    {{ $team->email }}
                                </p>
                            </div>
                        </div>



                        <div class="col-12 mt-3">
                            <hr>
                            <p class="mb-1 text-dark"><b>Created At</b>
                                {{ $team->created_at }}
                            </p>
                            <p class="mb-1 text-dark"><b>Updated At</b>
                                {{ $team->updated_at }}
                            </p>

                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div> <!-- .container-fluid -->
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
