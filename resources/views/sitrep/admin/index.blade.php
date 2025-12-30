<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
    
    <!-- jQuery -->
    <script src="{{ asset('sitrep/adminbackend/assets/js/jquery.min.js')}}"></script>
    
    <!-- Mobile optimizations -->
    <style type="text/css">
        /* Vertical text for mobile table headers */
        @media (max-width: 768px) {
            .vertical-header {
                writing-mode: vertical-lr;
                transform: rotate(180deg);
                text-align: center;
                min-height: 120px;
                padding: 5px !important;
                font-size: 11px;
                background-color: #f8f9fa !important;
                border-right: 1px solid #dee2e6 !important;
            }
            
            .compact-table {
                font-size: 11px !important;
            }
            
            .compact-table th,
            .compact-table td {
                padding: 4px 3px !important;
            }
            
            /* Make summary table S/N column 5% */
            #example2 th:first-child,
            #example2 td:first-child {
                width: 5% !important;
                min-width: 40px;
                max-width: 50px;
            }
            
            #example2 th:nth-child(2),
            #example2 td:nth-child(2) {
                width: 95% !important;
            }
            
            .incident-cell {
                white-space: normal !important;
                line-height: 1.3;
                font-size: 11px;
            }
            
            .state-date-row {
                font-weight: bold;
                color: #2c3e50;
                margin-bottom: 8px;
                font-size: 11px;
                background-color: #f8f9fa;
                padding: 4px;
                border-radius: 3px;
            }
            
            /* Mobile chart optimizations */
            .chart-container-1 {
                height: 250px !important;
            }
        }
        
        /* Desktop styles */
        @media (min-width: 769px) {
            .vertical-header {
                writing-mode: horizontal-tb;
                transform: none;
                text-align: center;
                height: auto;
                padding: 0.75rem !important;
                font-size: 14px;
            }
        }
        
        /* Common styles */
        .incident-cell {
            white-space: pre-line;
            line-height: 1.4;
        }
        
        .state-date-row {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        /* Desktop sidebar collapse styles */
        .wrapper.toggled .sidebar-wrapper {
            width: 70px !important;
            transition: width 0.3s ease;
        }
        
        .wrapper.toggled .sidebar-wrapper .sidebar-header .logo-text,
        .wrapper.toggled .sidebar-wrapper .menu-title,
        .wrapper.toggled .sidebar-wrapper .has-arrow:after {
            display: none !important;
        }
        
        .wrapper.toggled .sidebar-wrapper .sidebar-header {
            padding: 0 10px !important;
            justify-content: center !important;
        }
        
        .wrapper.toggled .sidebar-wrapper .sidebar-header > div {
            display: none;
        }
        
        .wrapper.toggled .sidebar-wrapper .sidebar-header .toggle-icon {
            display: block !important;
            margin: 0 !important;
        }
        
        .wrapper.toggled .sidebar-wrapper .sidebar-header .logo-icon {
            display: block !important;
            margin: 0 auto;
        }
        
        .wrapper.toggled .sidebar-wrapper .metismenu .menu-title {
            display: none;
        }
        
        .wrapper.toggled .sidebar-wrapper .metismenu .parent-icon {
            margin-right: 0 !important;
            margin-left: 0 !important;
        }
        
        .wrapper.toggled .sidebar-wrapper .metismenu a {
            justify-content: center !important;
            padding: 10px !important;
        }
        
        .wrapper.toggled .page-wrapper {
            margin-left: 70px !important;
            transition: margin-left 0.3s ease;
        }
        
        /* Mobile sidebar styles */
        @media (max-width: 768px) {
            .sidebar-wrapper {
                position: fixed;
                top: 0;
                left: -280px;
                width: 280px;
                height: 100vh;
                z-index: 1050;
                transition: left 0.3s ease;
                box-shadow: 0 0 15px rgba(0,0,0,0.1);
            }
            
            .sidebar-wrapper.open {
                left: 0;
            }
            
            .page-wrapper {
                transition: margin-left 0.3s ease;
            }
            
            .page-wrapper.sidebar-open {
                margin-left: 280px;
            }
            
            .overlay.toggle-icon {
                display: none;
            }
            
            .overlay.toggle-icon.show {
                display: block;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                z-index: 1049;
            }
            
            .mobile-toggle-menu {
                cursor: pointer;
                font-size: 24px;
                padding: 10px;
                z-index: 1051;
            }
            
            /* Hide desktop toggle arrow on mobile */
            .sidebar-header .toggle-icon {
                display: none !important;
            }
        }
        
        /* Desktop - show toggle arrow */
        @media (min-width: 769px) {
            .mobile-toggle-menu {
                display: none !important;
            }
            
            .sidebar-header .toggle-icon {
                display: flex !important;
                cursor: pointer;
            }
        }
    </style>
    
    <title>{{$info}}</title>
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
            <!-- Filter Record Button -->
            <div class="col mb-3 left">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bx bx-filter"></i> Filter Record
                </button> |
                 <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    <i class="bx bx-filter"></i> Generate Sitrep Report
                </button>
            </div>

          
            
            <!-- Filter Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Search SITREP</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.dashboard2')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label class="col-form-label">From</label>
                                <input type="date" class="form-control" name="date_from" required>
                            </div>
                            <div class="modal-body">
                                <label class="col-form-label">To</label>
                                <input type="date" class="form-control" name="date_to" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Filter Record</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Page Title -->
            @if($sitreps_total->all() != null)
                <h4 class="text-uppercase fw-bold mb-3" style="color:rgba(5, 22, 117, 1)">{{$info}}</h4>
            @endif

            @if($sitreps_total->all() == null)
                <h4 class="text-uppercase fw-bold mb-3" style="color:rgba(5, 22, 117, 1)">No Record for {{$info}}</h4>
            @endif

            @foreach($sitreps_total as $sitrep_total) @endforeach

            <!--Main Page section-->
            <div class="page-content">
                <!--Banner row-->
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5 g-3 mb-3">
                    <div class="col">
                        <div class="card radius-10 bg-gradient-deepblue">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0 text-white">{{intval($sitrep_total->crime1 ?? 0)}}</h3>
                                    <div class="ms-auto">
                                        <i class='bx bx-bone fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <h4 class="mb-0 text-white">Homicide</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-gradient-orange">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0 text-white">{{intval($sitrep_total->crime2 ?? 0)}}</h3>
                                    <div class="ms-auto">
                                        <i class='bx bx-target-lock fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <h4 class="mb-0 text-white">Armed Robbery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-gradient-ohhappiness">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0 text-white">{{intval($sitrep_total->crime3 ?? 0)}}</h3>
                                    <div class="ms-auto">
                                        <i class='bx bx-user-x fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <h4 class="mb-0 text-white">Kidnapping</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-gradient-ibiza">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0 text-white">{{intval($sitrep_total->crime4 ?? 0)}}</h3>
                                    <div class="ms-auto">
                                        <i class='bx bx-mask fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <h4 class="mb-0 text-white">Banditry</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 bg-gradient-moonlit text-white">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mb-0 text-white">{{intval($sitrep_total->crime5 ?? 0)}}</h3>
                                    <div class="ms-auto">
                                        <i class='bx bx-bomb fs-3 text-white'></i>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-white">
                                    <h4 class="mb-0 text-white">Terrorism</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->

                  <!-- Summary Table - FIXED FORMAT -->
                <div class="card radius-10 mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="text-uppercase fw-bold" style="color:rgba(5, 22, 117, 1)">{{$info}} Summary</h5>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i></div>
                        </div>
                        <hr>
                        <div>
                            <table id="example2" class="table table-striped table-bordered compact-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="vertical-header">S/N</th>
                                        <th class="vertical-header">SITUATION REPORT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($sitrep_details as $sitrep_detail)
                                        <tr>
                                            <td style="width:5%; vertical-align: top; font-weight: bold;">
                                                {{$i=$i+1}}.
                                            </td>
                                            <td>
                                                <!-- State and Date in the same row/line -->
                                               
                                                
                                                <!-- Incident Description without "INCIDENT" title and without Police Action -->
                                                <div>
                                                    <div class="state-date-row">
                                                        <strong>{{$sitrep_detail->state_id}}</strong> | 
                                                        {{ \Carbon\Carbon::parse($sitrep_detail->incident_date)->format('d/m/Y') }}
                                                    </div>
                                                    {{ $sitrep_detail->crime_description }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="vertical-header">S/N</th>
                                        <th class="vertical-header">SITUATION REPORT</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>


                <!-- Key Insights Row -->
                <div class="row mb-3">
                    <div class="col-12 col-lg-12 col-xl-12 d-flex">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="text-uppercase fw-bold" style="color:rgba(5, 22, 117, 1)">
                                            @if($sitreps_total->all() != null)
                                                Key Insight for {{$info}}
                                            @else
                                                No Record for {{$info}}
                                            @endif
                                        </h5>
                                        @foreach($sitreps_state_total as $sitrep_insight) @endforeach
                                    </div>
                                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i></div>
                                </div>
                                
                                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-0 row-group border-top">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="bx bxs-circle me-2" style="color:rgba(172, 17, 6, 0.83)"><B> FREQUENCY OF MAJOR CRIMES</B></i></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Homicide</td>
                                                        <td>{{intval($sitrep_total->crime1 ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i>Armed Robbery</td>
                                                        <td>{{intval($sitrep_total->crime2 ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i>Kidnapping</td>
                                                        <td>{{intval($sitrep_total->crime3 ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i>Banditry</td>
                                                        <td>{{intval($sitrep_total->crime4 ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i>Terrorism</td>
                                                        <td>{{intval($sitrep_total->crime5 ?? 0)}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="bx bxs-circle me-2" style="color:rgb(65, 89, 230)"><B> RECOVERIES & ARRESTS</B></i></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Suspects Arrested</td>
                                                        <td>{{intval($sitrep_insight->number_arrest ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Sophisticated Firearms Recovered</td>
                                                        <td>{{intval($sitrep_insight->number_firearms ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Pump Action/Dane/Fabricated Guns</td>
                                                        <td>{{intval($sitrep_insight->number_dane_gun ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Ammunitions Recovered</td>
                                                        <td>{{intval($sitrep_insight->number_ammunition ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Cartridges/Pellets Recovered</td>
                                                        <td>{{intval($sitrep_insight->number_caterages ?? 0)}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="bx bxs-circle me-2" style="color:rgba(14, 90, 7, 0.98)"><B> VICTIMS & CASUALTIES</B></i></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(4, 87, 29)"></i> Victims Rescued</td>
                                                        <td>{{intval($sitrep_insight->number_victims_rescused ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(4, 87, 29)"></i> Victims Kidnapped</td>
                                                        <td>{{intval($sitrep_insight->number_victims ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Victims Killed</td>
                                                        <td>{{intval($sitrep_insight->number_casualties ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Police KIA</td>
                                                        <td>{{intval($sitrep_insight->police_casualties ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Other Personnel KIA</td>
                                                        <td>{{intval($sitrep_insight->operative_casualties ?? 0)}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(231, 228, 6)"></i> Suspects Neutralised</td>
                                                        <td>{{intval($sitrep_insight->suspect_casualties ?? 0)}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->

                <!-- Charts Row -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 g-3 mb-3">
                    <div class="col">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="text-uppercase fw-bold" style="color:rgba(5, 22, 117, 1)">Major Incident Frequency</h5>
                                    </div>
                                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i></div>
                                </div>
                                <div class="chart-container-1">
                                    <canvas id="chart6"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="text-uppercase fw-bold" style="color:rgba(5, 22, 117, 1)">Arrests, Recoveries and Rescues</h5>
                                    </div>
                                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i></div>
                                </div>
                                <div class="chart-container-1">
                                    <canvas id="chart7"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->

              
                <!-- Incident Frequency Chart -->
                <div class="row mb-3">
                    <div class="col-12 col-lg-12 col-xl-12 d-flex">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="text-uppercase fw-bold" style="color:rgba(5, 22, 117, 1)">Incident Frequency per State</h5>
                                    </div>
                                    <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i></div>
                                </div>
                                <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Number of Incidents Reported</span>
                                </div>
                                <div class="chart-container-1">
                                    <canvas id="chart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--End Row-->

                <!-- State-wise Statistics Table -->
                <div class="card radius-10 mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="text-uppercase fw-bold" style="color:rgba(5, 22, 117, 1)">State-wise Statistics</h5>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i></div>
                        </div>
                        <hr>
                        <div>
                            <table id="example1" class="table table-striped table-bordered compact-table">
                                <thead class="text-dark">
                                    <tr>
                                        <th class="vertical-header">S/N</th>
                                        <th class="vertical-header">State</th>
                                        <th class="vertical-header">Incidents</th>
                                        <th class="vertical-header" style="background-color: lightyellow;">Arrests</th>
                                        <th class="vertical-header" style="background-color: lightgreen;">Firearms</th>
                                        <th class="vertical-header" style="background-color: lightgreen;">Dane Guns</th>
                                        <th class="vertical-header" style="background-color: lightgreen;">Ammunitions</th>
                                        <th class="vertical-header" style="background-color: lightgreen;">Cartridges</th>
                                        <th class="vertical-header" style="background-color: lightgreen;">Vehicles</th>
                                        <th class="vertical-header" style="background-color: lightblue;">Rescued</th>
                                        <th class="vertical-header" style="background-color: lightyellow;">Neutralized</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach($sitreps as $sitrep) 
                                        <tr>                    
                                            <td>{{$i=$i+1}}</td>
                                            <td>{{$sitrep->state_id}}</td>
                                            <td align="center">{{intval($sitrep->number_incident ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_arrest ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_firearms ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_dane_gun ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_ammunition ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_caterages ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_vehicle ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_victims_rescused ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->suspect_casualties ?? 0)}}</td>
                                        </tr>  
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    @foreach($sitreps_state_total as $sitrep)
                                        <tr class="fw-bold">                    
                                            <td></td>
                                            <td align="center">TOTAL</td>
                                            <td align="center">{{intval($sitrep->number_incident ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_arrest ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_firearms ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_dane_gun ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_ammunition ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_caterages ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_vehicle ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->number_victims_rescused ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->suspect_casualties ?? 0)}}</td>
                                        </tr>  
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Crime Type Statistics Table -->
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="text-uppercase fw-bold" style="color:rgba(5, 22, 117, 1)">Crime Type Statistics</h5>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i></div>
                        </div>
                        <hr>
                        <div>
                            <table id="example3" class="table table-striped table-bordered compact-table" style="width:100%">
                                <thead class="text-dark">
                                    <tr>
                                        <th class="vertical-header">S/N</th>
                                        <th class="vertical-header">Crime Type</th>
                                        <th class="vertical-header" style="background-color: lightblue;">Homicide</th>
                                        <th class="vertical-header" style="background-color: lightblue;">Armed Robbery</th>
                                        <th class="vertical-header" style="background-color: lightblue;">Kidnapping</th>
                                        <th class="vertical-header" style="background-color: lightblue;">Banditry</th>
                                        <th class="vertical-header" style="background-color: lightblue;">Terrorism</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach($sitreps_state_group as $sitrep)
                                        <tr>
                                            <td>{{$i=$i+1}}</td>
                                            <td>{{$sitrep->state_id ?? 'N/A' }}</td>
                                            <td align="center">{{intval($sitrep->crime1 ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->crime2 ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->crime3 ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->crime4 ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->crime5 ?? 0)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    @foreach($sitreps_total as $sitrep)
                                        <tr class="fw-bold">
                                            <td></td>
                                            <td align="center">TOTAL</td>
                                            <td align="center">{{intval($sitrep->crime1 ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->crime2 ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->crime3 ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->crime4 ?? 0)}}</td>
                                            <td align="center">{{intval($sitrep->crime5 ?? 0)}}</td>
                                        </tr>
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>


                
            </div><!-- End Page Content -->
        </div><!--end page wrapper -->
        
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        
        @include('sitrep.admin.body.footer')
        
        @php
            // Prepare data for charts - Ensure all values are integers
            $state_id = [];
            $number_incident = [];
            $number_arrest = [];
            
            if(isset($sitreps) && $sitreps->count() > 0) {
                foreach ($sitreps as $sitrep) {
                    $state_id[] = $sitrep->state_id;
                    $number_incident[] = intval($sitrep->number_incident ?? 0);
                    $number_arrest[] = intval($sitrep->number_arrest ?? 0);
                }
            }
        @endphp
    </div><!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{ asset('sitrep/adminbackend/assets/js/bootstrap.bundle.min.js')}}"></script>
    
    <!--plugins-->
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/jquery-knob/excanvas.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('sitrep/adminbackend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>

    <!-- DataTables Configuration -->
    <script>
        $(document).ready(function() {
            // Initialize all DataTables with mobile-responsive settings
            function initializeDataTables() {
                const isMobile = window.innerWidth <= 768;
                
                // Table 1: State-wise Statistics
                $('#example1').DataTable({
                    "responsive": true,
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "pageLength": 10,
                    "language": {
                        "search": "Search:",
                        "lengthMenu": "Show _MENU_ entries",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "paginate": {
                            "previous": "←",
                            "next": "→"
                        }
                    },
                    "dom": isMobile ? 
                        '<"top"f>rt<"bottom"ilp><"clear">' : 
                        '<"top"fl>rt<"bottom"ip><"clear">',
                    "columnDefs": [
                        { "orderable": false, "targets": 0 }
                    ]
                });
                
                // Table 2: Summary Table
                $('#example2').DataTable({
                    "responsive": true,
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                    "pageLength": 10,
                    "language": {
                        "search": "Search:",
                        "lengthMenu": "Show _MENU_ entries",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "paginate": {
                            "previous": "←",
                            "next": "→"
                        }
                    },
                    "dom": isMobile ? 
                        '<"top"f>rt<"bottom"ilp><"clear">' : 
                        '<"top"fl>rt<"bottom"ip><"clear">'
                });
                
                // Table 3: Crime Type Statistics
                $('#example3').DataTable({
                    "responsive": true,
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "pageLength": 10,
                    "language": {
                        "search": "Search:",
                        "lengthMenu": "Show _MENU_ entries",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "paginate": {
                            "previous": "←",
                            "next": "→"
                        }
                    },
                    "dom": isMobile ? 
                        '<"top"f>rt<"bottom"ilp><"clear">' : 
                        '<"top"fl>rt<"bottom"ip><"clear">',
                    "columnDefs": [
                        { "orderable": false, "targets": 0 }
                    ]
                });
            }
            
            // Initial initialization
            initializeDataTables();
            
            // Re-initialize on window resize
            let resizeTimer;
            $(window).on('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    $('.dataTable').DataTable().destroy();
                    initializeDataTables();
                }, 250);
            });
        });
    </script>

    <!-- ORIGINAL Chart JavaScript (reverted to original format with integer fix) -->
   @if($sitreps->all() != null)
	<script>
		$(function() {
		"use strict";

		// chart 1
		
			var ctx = document.getElementById('chart1').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($state_id) !!},
                    datasets: [{
                        label: 'Number of Incident',
                        data: {!! json_encode($number_incident) !!},
                        backgroundColor: '#14abef',
                        borderColor: "transparent",
                        pointRadius: "0",
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: '#585757',  
                            boxWidth: 30
                        }
                    },
                    tooltips: {
                        displayColors: false,
                        mode: 'index',
                        intersect: false
                    },	
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#585757',
                                fontSize: 14, // Smaller font for many labels
                                maxRotation: 90, // Rotate labels 90 degrees
                                minRotation: 45, // Minimum rotation
                                autoSkip: true,
                                maxTicksLimit: 37, // Show all 37 labels
                                padding: 5
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.05)"
                            },
                            // Adjust bar width for many bars
                            barPercentage: 0.6,
                            categoryPercentage: 0.8
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#585757',
                                fontSize: 10
                            },
                            gridLines: {
                                display: true,
                                color: "rgba(0, 0, 0, 0.05)"
                            }
                        }]
                    },
                    // Adjust layout to make room for labels
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 0,
                            bottom: 20
                        }
                    }
                }
            });
			
		// chart 6

			var ctx = document.getElementById("chart6").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ["Homicide", "Armed Robbery", "Kidnapping", "Banditry", "Terrorism"],
						datasets: [{
							backgroundColor: [
								"#14abef",
								"#02ba5a",
								"#d13adf",
								"#fba540",
								"#ff0000"  
							],
							data: [{{$sitrep_total->crime1}}, {{$sitrep_total->crime2}}, {{$sitrep_total->crime3}}, {{$sitrep_total->crime4}},{{$sitrep_total->crime5}}],
							borderWidth: [0, 0, 0, 0,0]
						}]
					},
					options: {
						maintainAspectRatio: false,
						cutoutPercentage: 60,
					legend: {
						position :"bottom",	
						display: false,
							labels: {
							fontColor: '#ddd',  
							boxWidth:15
						}
						}
						,
						tooltips: {
						displayColors:false
						}
					}
			});
			
		// chart 7

			var ctx = document.getElementById("chart7").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: ["Suspects", "Sophisticated Firearms", "Dane Guns ", "Ammunitions", "Cartridges","Victims Rescued"],
						datasets: [{
							backgroundColor: [
								"#14abef",
								"#02ba5a",
								"#d13adf",
								"#fba540",
								"#ff0000"  
							],
							data: [{{$sitrep_insight->number_arrest}}, {{$sitrep_insight->number_firearms}}, {{$sitrep_insight->number_dane_gun}}, {{$sitrep_insight->number_ammunition}},{{$sitrep_insight->number_caterages}},{{$sitrep_insight->number_victims_rescused}}],
							borderWidth: [0, 0, 0, 0,0]
						}]
					},
					options: {
						maintainAspectRatio: false,
						cutoutPercentage: 60,
					legend: {
						position :"bottom",	
						display: false,
							labels: {
							fontColor: '#ddd',  
							boxWidth:15
						}
						}
						,
						tooltips: {
						displayColors:false
						}
					}
			});
			
			
		
				// easy pie chart 
		
		$('.easy-dash-chart1').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#3b5998',
			lineWidth: 10,
			trackColor : 'rgba(0, 0, 0, 0.08)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.w_percent').text(Math.round(percent));
			}
		});	


		$('.easy-dash-chart2').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#55acee',
			lineWidth: 10,
			trackColor : 'rgba(0, 0, 0, 0.08)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.w_percent').text(Math.round(percent));
			}
		});


		$('.easy-dash-chart3').easyPieChart({
			easing: 'easeOutBounce',
			barColor : '#e52d27',
			lineWidth: 10,
			trackColor : 'rgba(0, 0, 0, 0.08)',
			scaleColor: false,
			onStep: function(from, to, percent) {
				$(this.el).find('.w_percent').text(Math.round(percent));
			}
		});
			
			
		// worl map

		jQuery('#dashboard-map').vectorMap(
		{
			map: 'world_mill_en',
			backgroundColor: 'transparent',
			borderColor: '#818181',
			borderOpacity: 0.25,
			borderWidth: 1,
			zoomOnScroll: false,
			color: '#009efb',
			regionStyle : {
				initial : {
				fill : '#14abef'
				}
			},
			markerStyle: {
			initial: {
				r: 9,
				'fill': '#fff',
				'fill-opacity':1,
				'stroke': '#000',
				'stroke-width' : 5,
				'stroke-opacity': 0.4
						},
						},
			enableZoom: true,
			hoverColor: '#009efb',
			markers : [{
				latLng : [21.00, 78.00],
				name : 'Lorem Ipsum Dollar'
			
			}],
			hoverOpacity: null,
			normalizeFunction: 'linear',
			scaleColors: ['#b6d6ff', '#005ace'],
			selectedColor: '#c9dfaf',
			selectedRegions: [],
			showTooltip: true,
		});
				
				
		$("#trendchart1").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#eb5076'
			});
				

			$("#trendchart2").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#14abef'
			});


			$("#trendchart3").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#02ba5a'
			});


			$("#trendchart4").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#d13adf'
			});	


			$("#trendchart5").sparkline([5,8,7,10,9,10,8,6,4,6,8,7,6,8,9,10,8], {
			type: 'bar',
			height: '20',
			barWidth: '2',
			resize: true,
			barSpacing: '3',
			barColor: '#000000'
			});	

			
			// chart 3

			var ctx = document.getElementById('chart3').getContext('2d');
					
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
				labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
				datasets: [{
					label: 'Page Views',
					data: [0, 8, 12, 5, 12, 8, 16, 25, 15, 10, 20, 10, 30],
					backgroundColor: 'rgba(0, 150, 136, 0.33)',
					borderColor: '#009688',
					pointBackgroundColor:'#fff',
					pointHoverBackgroundColor:'#fff',
					pointBorderColor :'#fff',
					pointHoverBorderColor :'#fff',
					pointBorderWidth :1,
					pointRadius :0,
					pointHoverRadius :4,
					borderWidth: 3
				}]
				}
				,
				options: {
					maintainAspectRatio: false,
					legend: {
						position: false,
						display: true,
					},
				tooltips: {
				enabled: false
			},
			scales: {
				xAxes: [{
					display: false,
					gridLines: false
				}],
				yAxes: [{
					display: false,
					gridLines: false
				}]
				}
				}
			
			});

			// chart 4
			
			var ctx = document.getElementById("chart4").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
							datasets: [{
								label: 'Total Clicks',
								data: [0, 10, 14, 18, 12, 8, 16, 25, 15, 10, 20, 10, 30],
								backgroundColor: "#ff6a00"
							}]
						},
						options: {
							maintainAspectRatio: false,
							legend: {
							display: false,
							labels: {
								fontColor: '#ddd',  
								boxWidth:40
							}
							},
							tooltips: {
							enabled:false
							},	
							
							scales: {
							xAxes: [{
								barPercentage: .3,
								display: false,
								gridLines: false
							}],
							yAxes: [{
								display: false,
								gridLines: false
							}]
							}

					}
					
					});
			
			// chart 5

			var ctx = document.getElementById("chart5").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'bar',
						data: {
							labels: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
							datasets: [{
								label: 'Total Earning',
								data: [39, 19, 25, 16, 31, 39, 23, 20, 23, 18, 15, 20],
								backgroundColor: "#04b35a"
							},{
								label: 'Total Sales',
								data: [27, 12, 26, 15, 21, 27, 13, 19, 32, 22, 18, 30],
								backgroundColor: "rgba(4, 179, 90, 0.35)"
							}]
						},
						options: {
							maintainAspectRatio: false,
							legend: {
							display: false,
							position: 'bottom',
							labels: {
								fontColor: '#ddd',  
								boxWidth:13
							}
							},
							tooltips: {
							enabled:true,
							displayColors:false,
							},	
							
							scales: {
							xAxes: [{
								stacked: true,
								barPercentage: .4,
								display: false,
								gridLines: false
							}],
							yAxes: [{
								stacked: true,
								display: false,
								gridLines: false
							}]
							}

					}
					
					});
			
			
				
				
		});	 
	
	</script>
	@endif


    <!-- Toastr notifications -->
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif 
    </script>

    <!-- AJAX for City Selection -->
    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
                var stateId = $(this).val();
                if (stateId) {
                    $.ajax({
                        url: "{{ route('locations.get_cities') }}",
                        type: "GET",
                        data: { state_id: stateId },
                        dataType: "json",
                        success: function(data) {
                            $('#city').empty();
                            $('#city').append('<option value="">Select City</option>');
                            if (data.length > 0) {
                                $.each(data, function(key, value) {
                                    $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                                $('#city').prop('disabled', false);
                            } else {
                                $('#city').prop('disabled', true);
                            }
                        }
                    });
                } else {
                    $('#city').empty();
                    $('#city').append('<option value="">Select City</option>');
                    $('#city').prop('disabled', true);
                }
            });
        });
    </script>

    <!-- Sidebar Toggle Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Desktop sidebar toggle (sidebar arrow)
        const sidebarToggleArrow = document.querySelector('.sidebar-header .toggle-icon');
        const wrapper = document.querySelector('.wrapper');
        
        if (sidebarToggleArrow && wrapper) {
            sidebarToggleArrow.addEventListener('click', function(e) {
                e.preventDefault();
                wrapper.classList.toggle('toggled');
                
                // Also update the arrow icon direction
                const icon = this.querySelector('i');
                if (icon) {
                    if (wrapper.classList.contains('toggled')) {
                        icon.classList.remove('bx-arrow-to-left');
                        icon.classList.add('bx-arrow-to-right');
                    } else {
                        icon.classList.remove('bx-arrow-to-right');
                        icon.classList.add('bx-arrow-to-left');
                    }
                }
                
                // Store state in localStorage for persistence
                localStorage.setItem('sidebarCollapsed', wrapper.classList.contains('toggled'));
            });
            
            // Check localStorage for saved state
            if (localStorage.getItem('sidebarCollapsed') === 'true') {
                wrapper.classList.add('toggled');
                const icon = sidebarToggleArrow.querySelector('i');
                if (icon) {
                    icon.classList.remove('bx-arrow-to-left');
                    icon.classList.add('bx-arrow-to-right');
                }
            }
        }
        
        // Mobile sidebar toggle (keep existing but ensure it works with desktop toggle)
        const mobileToggleMenu = document.querySelector('.mobile-toggle-menu');
        const sidebarWrapper = document.querySelector('.sidebar-wrapper');
        const pageWrapper = document.querySelector('.page-wrapper');
        const overlay = document.querySelector('.overlay.toggle-icon');
        
        if (mobileToggleMenu && sidebarWrapper) {
            mobileToggleMenu.addEventListener('click', function(e) {
                e.preventDefault();
                sidebarWrapper.classList.toggle('open');
                pageWrapper.classList.toggle('sidebar-open');
                
                // Toggle overlay
                if (overlay) {
                    overlay.classList.toggle('show');
                }
            });
            
            // Close sidebar when clicking overlay
            if (overlay) {
                overlay.addEventListener('click', function() {
                    sidebarWrapper.classList.remove('open');
                    pageWrapper.classList.remove('sidebar-open');
                    overlay.classList.remove('show');
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                if (window.innerWidth <= 768) {
                    if (sidebarWrapper.classList.contains('open') && 
                        !event.target.closest('.sidebar-wrapper') && 
                        !event.target.closest('.mobile-toggle-menu') &&
                        !event.target.closest('.overlay')) {
                        sidebarWrapper.classList.remove('open');
                        pageWrapper.classList.remove('sidebar-open');
                        if (overlay) {
                            overlay.classList.remove('show');
                        }
                    }
                }
            });
        }
    });
    </script>

    <!--app JS-->
    <script src="{{ asset('sitrep/adminbackend/assets/js/app.js')}}"></script>
</body>
</html>