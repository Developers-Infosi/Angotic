@extends('layouts.merge.dashboard')
@section('titulo', 'Edited Operational Team ' . $team->name)

@section('content')
    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                <a href="{{ route('admin.team.show', $team->id) }}"><u> {{ $team->name }}</u></a>
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
            <form action='{{ route('admin.team.update', $team->id) }}' method="POST" enctype="multipart/form-data"
                class="mx-4 row">
                @csrf
                @method('PUT')


                @include('forms._formTeam.index')

                <div class="col-12 col-md-12 col-lg-12 mt-4">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>

                            @if (isset($team->status))
                                <option value="{{ $team->status }}" class="text-primary h6" selected>
                                    {{ $team->status }}
                                </option>
                            @else
                                <option disabled selected>Select an option</option>
                            @endif

                            <option value="EMITIDO">EMITIDO</option>
                            <option value="DUPLICADO">DUPLICADO</option>
                            <option value="RECEBIDO">RECEBIDO</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="form-group text-center">
                        <button type="submit" class="btn px-5 col-md-4 btn-primary">
                            Saved Changes
                            <span class="fe fe-chevron-right fe-16"></span>
                        </button>

                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
