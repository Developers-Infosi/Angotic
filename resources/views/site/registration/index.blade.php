@extends('layouts.merge.site')
@section('titulo', 'Registration')
@section('content')
    <section class="rts-breadcrumb breadcrumb-height breadcumb-bg"
        style="background-image: url(/site/images/banner/breadcrumb.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">

                        <h2 class="section-title">Registration<br>
                            <small>III Luanda Financing Summit for Africa's Infrastructure Development</small>

                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <div class="rts-page-content rts-section-padding">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-12">
                    <div class="rts-ap-section">
                        <div class="rts-application-form">


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('site.registration.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('POST')
                                @include('forms._formRegistration.index')


                                <button type="submit" class="rts-theme-btn primary with-arrow">Submit
                                    <span>
                                        <i class="fa-thin fa-arrow-right"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
@section('JS')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const basedSelect = document.getElementById("based");

            // Campos que devem ser ocultados/mostrados
            const toggleFields = [
                "accommodation",
                "diet",
                "passport_number",
                "passport_type",
                "visa_status",
                "country_of_departure",
                "arrival_date",
                "departure_date"
            ];

            // Div do título "TRAVEL INFORMATION"
            const travelInfoHeader = document.getElementById("travel-info-header");

            function toggleBasedFields() {
                const isBasedInAngola = basedSelect.value === "Yes";

                toggleFields.forEach(id => {
                    const field = document.getElementById(id);
                    if (field) {
                        const formGroup = field.closest(".single-input, .single-input-item, .form-group");

                        if (isBasedInAngola) {
                            formGroup.style.display = "none";
                            field.removeAttribute("required");
                        } else {
                            formGroup.style.display = "";
                            field.setAttribute("required", "required");
                        }
                    }
                });

                // Controla o título
                if (travelInfoHeader) {
                    travelInfoHeader.style.display = isBasedInAngola ? "none" : "";
                }
            }

            toggleBasedFields(); // inicializa
            basedSelect.addEventListener("change", toggleBasedFields);
        });
    </script>

    @if (session('create'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('title') }} {{ session('fullname') }}',
                text: 'Registration completed successfully!',
                confirmButtonText: 'Get Registration Receipt',
                confirmButtonColor: '#4B7E55',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open('{{ route('site.registration.receipt', session('code')) }}', '_blank');
                }
            });
        </script>
    @endif

@endsection
