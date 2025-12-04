@extends('layouts.merge.dashboard')
@section('titulo', 'Dashboard')
@section('content')


    <div class="card mb-2">
        <div class="card-body">
            <h2 class="h5 page-title">
                III Luanda Financing Summit for Africa's Infrastructure Development<br>
                <small>Dashboard</small>
            </h2>
        </div>
    </div>

    <div class="row">


        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-dark mb-0">International Participants</p>
                            <span class="h3 mb-0 text-dark">{{ $count_international_registration }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-dark mb-0">Residing in Angola</p>
                            <span class="h3 mb-0 text-dark">{{ $count_based_registration }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card shadow text-dark">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                                <i class="fe fe-16 fe-users text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-dark mb-0">Operational Teams</p>
                            <span class="h3 mb-0 text-dark">{{ $count_teams }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row mt-4">
        <!-- Each chart inside equal cards -->
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Based in Angola vs International</h5>
                    <div style="height:300px">
                        <canvas id="basedChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Top 10 Nationalities</h5>
                    <div style="height:300px">
                        <canvas id="nationalityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Delegates by Title</h5>
                    <div style="height:300px">
                        <canvas id="titleChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Delegates by Organization Type</h5>
                    <div style="height:300px">
                        <canvas id="orgTypeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Registrations by Status</h5>
                    <div style="height:300px">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Registrations by Level</h5>
                    <div style="height:300px">
                        <canvas id="levelChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Visa Status</h5>
                    <div style="height:300px">
                        <canvas id="visaStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Passport Type</h5>
                    <div style="height:300px">
                        <canvas id="passportTypeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Diet</h5>
                    <div style="height:300px">
                        <canvas id="dietChart"></canvas>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <h5 class="card-title">Operational Teams by Type</h5>
                    <div style="height:350px">
                        <canvas id="teamsByTypeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Data from backend
        const countInternational = {{ $count_international_registration }};
        const countBased = {{ $count_based_registration }};

        const nationalityLabels = @json($registrations_by_nationality->pluck('nationality'));
        const nationalityData = @json($registrations_by_nationality->pluck('total'));

        const titleLabels = @json($registrations_by_title->pluck('title'));
        const titleData = @json($registrations_by_title->pluck('total'));

        const orgTypeLabels = @json($registrations_by_org_type->pluck('org_type'));
        const orgTypeData = @json($registrations_by_org_type->pluck('total'));

        const statusLabels = @json($registrations_by_status->pluck('status'));
        const statusData = @json($registrations_by_status->pluck('total'));

        const levelLabels = @json($registrations_by_level->pluck('level'));
        const levelData = @json($registrations_by_level->pluck('total'));

        const visaStatusLabels = @json($registrations_by_visa_status->pluck('visa_status'));
        const visaStatusData = @json($registrations_by_visa_status->pluck('total'));

        const passportTypeLabels = @json($registrations_by_passport_type->pluck('passport_type'));
        const passportTypeData = @json($registrations_by_passport_type->pluck('total'));

        const dietLabels = @json($registrations_by_diet->pluck('diet'));
        const dietData = @json($registrations_by_diet->pluck('total'));

        // Common colors
        const corporateColors = [
            '#1f4e79', // navy blue
            '#2e7d32', // dark green
            '#6c757d', // gray
            '#b8860b', // gold
            '#8b0000', // dark red
            '#4e73df' // lighter blue for accents
        ];

        // Chart 1 - Based vs International
        new Chart(document.getElementById('basedChart'), {
            type: 'doughnut',
            data: {
                labels: ['International', 'Based in Angola'],
                datasets: [{
                    data: [countInternational, countBased],
                    backgroundColor: [corporateColors[0], corporateColors[1]]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                maintainAspectRatio: false
            }
        });

        // Chart 2 - Nationality
        new Chart(document.getElementById('nationalityChart'), {
            type: 'bar',
            data: {
                labels: nationalityLabels,
                datasets: [{
                    label: 'Delegates',
                    data: nationalityData,
                    backgroundColor: corporateColors[0]
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Chart 3 - Title
        new Chart(document.getElementById('titleChart'), {
            type: 'pie',
            data: {
                labels: titleLabels,
                datasets: [{
                    data: titleData,
                    backgroundColor: corporateColors
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                maintainAspectRatio: false
            }
        });

        // Chart 4 - Org Type
        new Chart(document.getElementById('orgTypeChart'), {
            type: 'bar',
            data: {
                labels: orgTypeLabels,
                datasets: [{
                    label: 'Organizations',
                    data: orgTypeData,
                    backgroundColor: corporateColors[0]
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });



        // Registrations by Status (mudado para Bar)
        new Chart(document.getElementById('statusChart'), {
            type: 'bar',
            data: {
                labels: statusLabels,
                datasets: [{
                    label: 'Delegates',
                    data: statusData,
                    backgroundColor: corporateColors[0]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Chart 6 - Level
        new Chart(document.getElementById('levelChart'), {
            type: 'bar',
            data: {
                labels: levelLabels,
                datasets: [{
                    label: 'Levels',
                    data: levelData,
                    backgroundColor: corporateColors[0]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Visa Status
        new Chart(document.getElementById('visaStatusChart'), {
            type: 'bar',
            data: {
                labels: visaStatusLabels,
                datasets: [{
                    label: 'Visa Requests',
                    data: visaStatusData,
                    backgroundColor: corporateColors[1]
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Passport Type
        new Chart(document.getElementById('passportTypeChart'), {
            type: 'bar',
            data: {
                labels: passportTypeLabels,
                datasets: [{
                    label: 'Delegates',
                    data: passportTypeData,
                    backgroundColor: corporateColors[2]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Diet
        new Chart(document.getElementById('dietChart'), {
            type: 'bar',
            data: {
                labels: dietLabels,
                datasets: [{
                    label: 'Delegates',
                    data: dietData,
                    backgroundColor: corporateColors[1]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        // Operational Teams by Type
        new Chart(document.getElementById('teamsByTypeChart'), {
            type: 'bar',
            data: {
                labels: @json($teams_by_type->pluck('type')),
                datasets: [{
                    label: 'Teams',
                    data: @json($teams_by_type->pluck('total')),
                    backgroundColor: corporateColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
