<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('sitrep/adminbackend/assets/images/favicon-32x32.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('sitrep/adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
    <link href="{{ asset('sitrep/adminbackend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{ asset('sitrep/adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
    <link href="{{ asset('sitrep/adminbackend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('sitrep/adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    
    <!-- loader-->
    <link href="{{ asset('sitrep/adminbackend/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{ asset('sitrep/adminbackend/assets/js/pace.min.js')}}"></script>
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('sitrep/adminbackend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('sitrep/adminbackend/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('sitrep/adminbackend/assets/css/icons.css')}}" rel="stylesheet">
    
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('sitrep/adminbackend/assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{ asset('sitrep/adminbackend/assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{ asset('sitrep/adminbackend/assets/css/header-colors.css')}}" />
    
    <title>SITREP - Monthly Crime Trend</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('sitrep.admin.body.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('sitrep.admin.body.header')
        <!--end header -->
        
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="{{ asset('sitrep/adminbackend/assets/images/logo/logo.png') }}" alt="Logo" height="100px">
                                    <h3><b>MONTHLY CRIME TREND ANALYSIS</b></h3>  
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <h4>{{ $crimeTypeName }} Trend - {{ date('F', mktime(0, 0, 0, $startMonth, 1)) }} to {{ date('F', mktime(0, 0, 0, $endMonth, 1)) }} {{ $year }}</h4>
                                        <h5 class="text-muted">Location: {{ $stateName }}</h5>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="javascript:history.back()" class="btn btn-secondary">Back</a>
                                        <button onclick="window.print()" class="btn btn-primary">Print Report</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Total Incidents</h5>
                                <h2 class="text-primary">{{ $totalIncidents }}</h2>
                                <p class="text-muted">{{ $stateName }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Average Monthly</h5>
                                <h2 class="text-success">{{ $averageIncidents }}</h2>
                                <p class="text-muted">Per month average</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Peak Month</h5>
                                <h2 class="text-warning">{{ $peakMonth }}</h2>
                                <p class="text-muted">Highest activity</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Peak Value</h5>
                                <h2 class="text-danger">{{ $maxIncidents }}</h2>
                                <p class="text-muted">Maximum incidents</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if($comparativeData)
                <!-- Comparative Statistics (When a specific state is selected) -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Comparison: {{ $stateName }} vs All States</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="text-center p-3">
                                            <h6>{{ $stateName }} Total</h6>
                                            <h3 class="text-primary">{{ $comparativeData['state_total'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center p-3">
                                            <h6>All States Total</h6>
                                            <h3 class="text-secondary">{{ $comparativeData['all_states_total'] }}</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-center p-3">
                                            <h6>Percentage Share</h6>
                                            <h3 class="text-{{ $comparativeData['state_total'] > 0 ? 'success' : 'secondary' }}">
                                                @php
                                                    $percentage = $comparativeData['all_states_total'] > 0 
                                                        ? round(($comparativeData['state_total'] / $comparativeData['all_states_total']) * 100, 1)
                                                        : 0;
                                                @endphp
                                                {{ $percentage }}%
                                            </h3>
                                            <small>{{ $stateName }} contribution to national total</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Trend Chart -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Monthly Trend Chart</h5>
                                <div class="chart-container-1" style="height: 400px;">
                                    <canvas id="monthlyTrendChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if($comparativeData)
                <!-- Comparative Chart (When a specific state is selected) -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Comparative Trend: {{ $stateName }} vs All States</h5>
                                <div class="chart-container-1" style="height: 400px;">
                                    <canvas id="comparativeTrendChart"></canvas>
                                </div>
                                <div class="mt-3 text-center">
                                    <span class="badge bg-primary me-3">● {{ $stateName }}</span>
                                    <span class="badge bg-secondary">● All States (National)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Data Table -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Monthly Data Breakdown - {{ $stateName }}</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Month</th>
                                                <th>Number of Incidents</th>
                                                <th>Percentage</th>
                                                <th>Trend</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = $totalIncidents > 0 ? $totalIncidents : 1; // Avoid division by zero
                                            @endphp
                                            @foreach($monthLabels as $index => $month)
                                            <tr>
                                                <td>{{ $month }}</td>
                                                <td>{{ $trendData[$index] }}</td>
                                                <td>
                                                    @php
                                                        $percentage = $totalIncidents > 0 ? round(($trendData[$index] / $totalIncidents) * 100, 1) : 0;
                                                    @endphp
                                                    {{ $percentage }}%
                                                </td>
                                                <td>
                                                    @if($index > 0)
                                                        @php
                                                            $prevValue = $trendData[$index - 1];
                                                            $currentValue = $trendData[$index];
                                                            $change = $prevValue > 0 ? round((($currentValue - $prevValue) / $prevValue) * 100, 1) : 0;
                                                        @endphp
                                                        @if($change > 0)
                                                            <span class="text-danger"><i class="bx bx-up-arrow-alt"></i> {{ $change }}%</span>
                                                        @elseif($change < 0)
                                                            <span class="text-success"><i class="bx bx-down-arrow-alt"></i> {{ abs($change) }}%</span>
                                                        @else
                                                            <span class="text-muted">No change</span>
                                                        @endif
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="table-active">
                                                <td><strong>Total</strong></td>
                                                <td><strong>{{ $totalIncidents }}</strong></td>
                                                <td><strong>100%</strong></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end page wrapper -->
        
        @include('sitrep.admin.body.footer')
        
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{ asset('sitrep/adminbackend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{ asset('sitrep/adminbackend/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
    
    <!-- Chart Script -->
    <script>
        $(function() {
            "use strict";
            
            // Main Trend Chart
            var ctx = document.getElementById("monthlyTrendChart").getContext('2d');
            var monthlyTrendChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($monthLabels),
                    datasets: [{
                        label: '{{ $crimeTypeName }} Incidents - {{ $stateName }}',
                        data: @json($trendData),
                        borderColor: '#14abef',
                        backgroundColor: 'rgba(20, 171, 239, 0.1)',
                        borderWidth: 3,
                        pointBackgroundColor: '#14abef',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontColor: '#ddd',
                                fontSize: 12,
                                boxWidth: 20,
                                padding: 15
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            titleFont: {
                                size: 14
                            },
                            bodyFont: {
                                size: 13
                            },
                            callbacks: {
                                label: function(context) {
                                    return context.dataset.label + ': ' + context.parsed.y + ' incidents';
                                }
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)',
                                borderColor: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                fontColor: '#ddd',
                                fontSize: 11
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)',
                                borderColor: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                fontColor: '#ddd',
                                fontSize: 11,
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            },
                            title: {
                                display: true,
                                text: 'Number of Incidents',
                                color: '#ddd'
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'nearest'
                    }
                }
            });
            
            @if($comparativeData)
            // Comparative Trend Chart
            var ctx2 = document.getElementById("comparativeTrendChart").getContext('2d');
            var comparativeTrendChart = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: @json($monthLabels),
                    datasets: [
                        {
                            label: '{{ $stateName }}',
                            data: @json($comparativeData['state_data']),
                            borderColor: '#14abef',
                            backgroundColor: 'rgba(20, 171, 239, 0.1)',
                            borderWidth: 3,
                            pointBackgroundColor: '#14abef',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: false,
                            tension: 0.3
                        },
                        {
                            label: 'All States (National)',
                            data: @json($comparativeData['all_states_data']),
                            borderColor: '#6c757d',
                            backgroundColor: 'rgba(108, 117, 125, 0.1)',
                            borderWidth: 3,
                            pointBackgroundColor: '#6c757d',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            fill: false,
                            tension: 0.3,
                            borderDash: [5, 5]
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                fontColor: '#ddd',
                                fontSize: 12,
                                boxWidth: 20,
                                padding: 15
                            }
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            titleFont: {
                                size: 14
                            },
                            bodyFont: {
                                size: 13
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)',
                                borderColor: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                fontColor: '#ddd',
                                fontSize: 11
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)',
                                borderColor: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                fontColor: '#ddd',
                                fontSize: 11,
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            },
                            title: {
                                display: true,
                                text: 'Number of Incidents',
                                color: '#ddd'
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'nearest'
                    }
                }
            });
            @endif
        });
    </script>
    
</body>
</html>