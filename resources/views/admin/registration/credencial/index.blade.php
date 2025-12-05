@extends('layouts.merge.dashboard')
@section('titulo', 'Credencial de Participantes')

@section('content')
    <div class="card mb-2">
        <div class="card-body">

            <h2 class="h5 page-title">
                Credencial de Participantes
            </h2>



        </div>
    </div>

    <div class="card shadow mb-4">

        <div class="card-body table-responsive">

            <form class="row" action="{{ route('admin.credencial.guest.store') }}" method="POST" target="_blank">
                @csrf

                <div class="col-lg-3 col-md-6 col-12 mt-2">
                    <div class="form-group">
                        <label for="category">Categoria</label>
                        <select name="category" id="category" class="form-control" required
                            onchange="toggleDescription()">>
                            <option disabled selected>Selecione a categoria</option>

                            <option value="ESTUDANTE">ESTUDANTE</option>
                            <option value="PARTICIPANTE C">PARTICIPANTE C</option>
                            <option value="PARTICIPANTE B">PARTICIPANTE B</option>
                            <option value="PARTICIPANTE A">PARTICIPANTE A</option>
                            <option value="INGRESSO FAMILIAR">INGRESSO FAMILIAR</option>
                            <option value="PARTICIPANTE VIP">PARTICIPANTE VIP</option>
                            <option value="CONVIDADO">CONVIDADO</option>


                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mt-2">
                    <div class="form-group">
                        <label for="type">Tipologia de Entrega</label>
                        <select name="type" id="type" class="form-control" required>
                            <option disabled selected>Selecione a tipologia</option>


                            <option value="OFERTA">OFERTA</option>
                            <option value="PAGO">PAGO</option>
                            <option value="CONVIDADO MINTTICS">CONVIDADO MINTTICS</option>

                        </select>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-12 mt-2">
                    <label for="quantity" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Padrão é 1"
                        required />
                </div>
                <div class="col-lg-4 col-md-6 col-12 mt-2" id="descriptionContainer" style="display: none;">
                    <label for="description" class="form-label">Descrição (Apenas pra Convidados)</label>
                    <input type="text" class="form-control" id="description" name="description"
                        placeholder="Digite o Nome da Empresa que Convidou" />
                </div>
                <div class="col-12 my-5">

                    <div class="form-group text-center">
                        <button type="submit" class="btn px-4 col-md-3 btn-success">
                            Emitir
                            <span class="fe fe-chevron-right fe-16"></span>
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header">
            <h4 class="mb-0">Resumo por Categoria</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table datatables table-hover table-bordered" id="dataTable-1">
                <thead class="bg-primary">
                    <tr>
                        <th>Categoria</th>
                        <th>Total Credenciais</th>
                        <th>Pagos</th>
                        <th>Ofertas</th>
                        <th>Convidado MINTTICS</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        use App\Models\PrintBatch;
                        $resumo = PrintBatch::select('category', 'type', \DB::raw('SUM(quantity) as total'))
                            ->groupBy('category', 'type')
                            ->get()
                            ->groupBy('category');
                    @endphp

                    @foreach ($resumo as $categoria => $tipos)
                        <tr>
                            <td>{{ $categoria }}</td>
                            <td>{{ $tipos->sum('total') }}</td>
                            <td>{{ $tipos->where('type', 'PAGO')->sum('total') }}</td>
                            <td>{{ $tipos->where('type', 'OFERTA')->sum('total') }}</td>
                            <td>{{ $tipos->where('type', 'CONVIDADO MINTTICS')->sum('total') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function toggleDescription() {
            const category = document.getElementById('category').value;
            const descriptionContainer = document.getElementById('descriptionContainer');

            if (category === 'CONVIDADO') {
                descriptionContainer.style.display = 'block';
            } else {
                descriptionContainer.style.display = 'none';
            }
        }
    </script>
@endsection
