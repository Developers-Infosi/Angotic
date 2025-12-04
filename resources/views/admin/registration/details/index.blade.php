@extends('layouts.merge.dashboard')
@section('titulo', 'Participant > ' . $registration->fullname)

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.registration.index') }}"><u>Listed Participants</u></a> >
                {{ $registration->fullname }}
            </h2>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="container-fluid">


                <div class="row justify-content-between mb-4">
                    <div class="col-12 col-md-6 col-lg-6">
                        <h4 class="h4 my-4 page-title">

                            Name: {{ $registration->fullname }}
                            <br>
                            Code: {{ $registration->code }}

                            <br>
                            Status:
                            @if ($registration->status == 'RECEBIDO')
                                <b class="btn btn-primary p-2 rounded text-white">
                                    {{ $registration->status }}
                                </b>
                            @elseif ($registration->status == 'IMPRESSO')
                                <b class="btn btn-success p-2 rounded text-white">
                                    {{ $registration->status }}
                                </b>
                            @elseif ($registration->status == 'DUPLICADO')
                                <b class="btn btn-danger p-2 rounded text-white">
                                    {{ $registration->status }}
                                </b>
                            @elseif ($registration->status == 'APROVADO')
                                <b class="btn btn-warning p-2 rounded text-white">
                                    {{ $registration->status }}
                                </b>
                            @endif
                        </h4>
                    </div>

                    @if ('USP' == Auth::user()->level || 'Administrador' == Auth::user()->level)

                        <div class="col-12 col-md-4 col-lg-4 text-right pt-3">
                            @if ($registration->status == 'IMPRESSO' || $registration->status == 'APROVADO')
                                <a href='{{ route('admin.registration.print', $registration->code) }}'
                                    class="btn btn-success" target='_blank'><i class="fe fe-printer text-white" aria-hidden="true"></i></a>
                            @endif
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" class="btn btn-white text-dark border-dark">Editar
                            </button>

                        </div>
                    @endif
                </div>

                <div class="row">

                    <!-- DELEGATE INFORMATION -->
                    <div class="col-12">
                        <div class="card shadow-sm p-3 mb-4 bg-white rounded">
                            <h5 class="mb-3"><b>Delegate Information</b></h5>

                            <p class="mb-1"><b>Registering on behalf:</b> {{ $registration->type }}</p>
                            <p class="mb-1"><b>Based in Angola:</b> {{ $registration->based }}</p>
                            <p class="mb-1"><b>Nationality:</b> {{ $registration->nationality }}</p>
                            <p class="mb-1"><b>Title:</b> {{ $registration->title }}</p>
                            <p class="mb-1"><b>Full Name:</b> {{ $registration->fullname }}</p>
                            <p class="mb-1"><b>Phone:</b> {{ $registration->phone }}</p>
                            <p class="mb-1"><b>Email:</b> {{ $registration->email }}</p>
                        </div>
                    </div>

                    <!-- ORGANIZATION DETAILS -->
                    <div class="col-12">
                        <div class="card shadow-sm p-3 mb-4 bg-white rounded">
                            <h5 class="mb-3"><b>Organization Details</b></h5>

                            <p class="mb-1"><b>Organization Type:</b> {{ $registration->org_type }}</p>
                            <p class="mb-1"><b>Organization Name:</b> {{ $registration->org_name }}</p>
                            <p class="mb-1"><b>Position:</b> {{ $registration->position }}</p>
                            <p class="mb-1"><b>Head of Delegation:</b> {{ $registration->head_of_delegation }}</p>
                        </div>
                    </div>

                    @if ($registration->based == 'No')
                        <!-- ACCOMMODATION & DIET -->
                        <div class="col-12">
                            <div class="card shadow-sm p-3 mb-4 bg-white rounded">
                                <h5 class="mb-3"><b>Accommodation & Diet</b></h5>

                                <p class="mb-1"><b>Accommodation:</b> {{ $registration->accommodation }}</p>
                                <p class="mb-1"><b>Diet:</b> {{ $registration->diet }}</p>
                            </div>
                        </div>

                        <!-- TRAVEL INFORMATION -->
                        <div class="col-12">
                            <div class="card shadow-sm p-3 mb-4 bg-white rounded">
                                <h5 class="mb-3"><b>Travel Information</b></h5>

                                <p class="mb-1"><b>Passport Number:</b> {{ $registration->passport_number }}</p>
                                <p class="mb-1"><b>Passport Type:</b> {{ $registration->passport_type }}</p>
                                <p class="mb-1"><b>Visa Status:</b> {{ $registration->visa_status }}</p>
                                <p class="mb-1"><b>Country of Departure:</b>
                                    {{ $registration->country_of_departure }}</p>
                                <p class="mb-1"><b>Arrival Date:</b> {{ $registration->arrival_date }}</p>
                                <p class="mb-1"><b>Departure Date:</b> {{ $registration->departure_date }}</p>
                            </div>
                        </div>
                    @endif
                    <!-- STATUS -->
                    <div class="col-12">
                        <div class="card shadow-sm p-3 mb-4 bg-white rounded">

                            <p class="mb-1"><b>Level:</b> {{ $registration->level }}</p>

                        </div>
                    </div>

                    <!-- TIMESTAMPS -->
                    <div class="col-12">
                        <div class="card shadow-sm p-3 mb-4 bg-white rounded">
                            <p class="mb-1"><b>Created At:</b> {{ $registration->created_at }}</p>
                            <p class="mb-1"><b>Last Updated:</b> {{ $registration->updated_at }}</p>
                            @if ($registration->printed_at)
                                <p class="mb-1"><b>Printed At:</b> {{ $registration->printed_at }}</p>
                            @endif
                        </div>
                    </div>

                </div> <!-- .row -->

            </div> <!-- .container-fluid -->
        </div>
    </div>


    @include('extra._registration.edit')
@endsection
