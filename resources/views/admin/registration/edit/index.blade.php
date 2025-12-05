@extends('layouts.merge.dashboard')
@section('titulo', 'Editar Inscrição ', $registration->name)

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.registration.index') }}"><u>Lista De Participantes</u></a> >
                <a href="{{ route('admin.registration.show', $registration->id) }}"><u> {{ $registration->name }}</u></a>
            </h2>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action='{{ route('admin.registration.update', $registration->id) }}' method="POST" class="mx-4">
                @csrf
                @method('PUT')

                <h4 class="my-5">
                    <b>Nome: {{ $registration->name }}</b>
                    <hr>
                </h4>

                @include('forms._formRegistration.index')



                <div class="row mx-4">
                    <div class="col-12 col-md-6 col-lg-4 mt-4">
                        <div class="form-group">
                            <label for="plafond">Plafond Escolhido</label>
                            <select name="plafond" id="plafond" class="form-control" required>

                                @if (isset($registration->plafond))
                                    <option value="{{ $registration->plafond }}" class="text-primary h6" selected>
                                        {{ $registration->plafond }}
                                    </option>
                                @else
                                    <option disabled selected>Selecione o Plafond</option>
                                @endif
                                <option value="PARTICIPANTE ESTUDANTE">PARTICIPANTE ESTUDANTE</option>
                                <option value="PARTICIPANTE C">PARTICIPANTE C</option>
                                <option value="PARTICIPANTE B">PARTICIPANTE B</option>
                                <option value="PARTICIPANTE A">PARTICIPANTE A</option>
                                <option value="PARTICIPANTE A">PARTICIPANTE VIP</option>
                                <option value="INGRESSO FAMILIAR">INGRESSO FAMILIAR</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-8 mt-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control border-dark" required>

                                @if (isset($registration->status))
                                    <option value="{{ $registration->status }}" class="text-primary h6" selected>
                                        {{ $registration->status }}
                                    </option>
                                @else
                                    <option disabled selected>Selecione o Status</option>
                                @endif


                                <option value="APROVADO">APROVADO</option>
                                <option value="EMITIDO">EMITIDO</option>
                                <option value="RECEBIDO">RECEBIDO</option>
                                <option value="DUPLICADO">DUPLICADO</option>

                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-md-12 mt-3">
                    <div class="form-group text-center">
                        <button type="submit" class="btn px-5 col-md-4 btn-primary">
                            Salvar alterações
                            <span class="fe fe-chevron-right fe-16"></span>
                        </button>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
