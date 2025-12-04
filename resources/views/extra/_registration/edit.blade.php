<!-- Estrutura da Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action='{{ route('admin.registration.update', $registration->id) }}' method="POST">

            <!-- Header da Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Name: {{ $registration->fullname }}
                    <br>
                    <small> Code: {{ $registration->code }}</small>
                </h5>
                <button type="button" class="btn-secondary" data-bs-dismiss="modal" aria-label="Fechar">X</button>
            </div>

            <!-- Body da Modal -->
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mx-4">
                    @csrf
                    @method('PUT')


                    <div class="col-12 col-md-12 col-lg-12 mt-4">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>

                                @if (isset($registration->status))
                                    <option value="{{ $registration->status }}" class="text-primary h6" selected>
                                        {{ $registration->status }}
                                    </option>
                                @else
                                    <option disabled selected>Selecione o Status</option>
                                @endif

                                <option value="IMPRESSO">IMPRESSO</option>
                                <option value="APROVADO">APROVADO</option>
                                <option value="RECEBIDO">RECEBIDO</option>
                                <option value="DUPLICADO">DUPLICADO</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer da Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar Alterações
                    <span class="fe fe-chevron-right fe-16"></span>
                </button>
            </div>

        </form>
    </div>
</div>
<!-- JS Bootstrap (necessário para funcionar a modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
