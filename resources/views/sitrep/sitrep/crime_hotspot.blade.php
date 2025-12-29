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
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
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
    
    <title>SITREP - Crime Hotspot Map</title>
    
    <style>
        /* Print Styles */
        @media print {
            .sidebar-wrapper,
            .header,
            .fullscreen-btn,
            #toggleFullscreenBtn,
            #fullscreenBtn,
            #zoomInBtn,
            #zoomOutBtn,
            #resetViewBtn,
            #resetFilters,
            .btn-secondary,
            .btn-group,
            .alert-info,
            .how-to-use-card,
            .legend {
                display: none !important;
            }
            
            .page-wrapper {
                margin-left: 0 !important;
                padding: 0 !important;
            }
            
            .card {
                border: 1px solid #dee2e6 !important;
                box-shadow: none !important;
                margin-bottom: 10px !important;
            }
            
            .card-body {
                padding: 15px !important;
            }
            
            #map {
                height: 500px !important;
                border: 1px solid #dee2e6 !important;
                box-shadow: none !important;
            }
            
            .table {
                font-size: 12px !important;
            }
            
            h1, h2, h3, h4, h5, h6 {
                color: #000 !important;
            }
            
            body {
                background: white !important;
                color: black !important;
            }
            
            .no-print {
                display: none !important;
            }
            
            .print-only {
                display: block !important;
            }
            
            /* Ensure map is visible in print */
            .leaflet-container {
                overflow: visible !important;
            }
        }
        
        @media screen {
            .print-only {
                display: none !important;
            }
        }
        
        /* Sidebar toggle styles */
        .sidebar-toggle-btn {
            position: fixed;
            left: 10px;
            top: 70px;
            z-index: 1000;
            background: #0d6efd;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        
        .sidebar-toggle-btn:hover {
            background: #0b5ed7;
            transform: scale(1.1);
        }
        
        .sidebar-toggle-btn i {
            font-size: 20px;
        }
        
        .sidebar-collapsed .sidebar-wrapper {
            margin-left: -250px;
        }
        
        .sidebar-collapsed .page-wrapper {
            margin-left: 0;
        }
        
        .sidebar-collapsed .sidebar-toggle-btn {
            left: 20px;
        }
        
        .sidebar-collapsed .sidebar-toggle-btn i {
            transform: rotate(180deg);
        }
        
        /* Smooth transitions */
        .sidebar-wrapper,
        .page-wrapper {
            transition: all 0.3s ease;
        }
        
        #map {
            height: 600px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        
        #map.fullscreen {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100vw !important;
            height: 100vh !important;
            z-index: 9999 !important;
            border-radius: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        
        .fullscreen-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1000;
            background: white;
            border: 2px solid rgba(0,0,0,0.2);
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .fullscreen-btn:hover {
            background: #f8f9fa;
            border-color: #0d6efd;
        }
        
        .fullscreen-btn.fullscreen-mode {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.9);
        }
        
        .map-container {
            position: relative;
        }
        
        /* Updated Intensity Colors - More Distinct and Visible */
        .intensity-0 { background-color: #a3c8f3ff !important; border: 1px solid #dee2e6 !important; color: #333 !important; }
        .intensity-1 { background-color: #a3c8f3ff !important; color: #333 !important; } /* White for low incidents */
        .intensity-2 { background-color: #2196f3 !important; color: white !important; } /* Blue for medium */
        .intensity-3 { background-color: #dbe914 !important; color: black !important; } /* Yellow for high */
        .intensity-4 { background-color: #e91e63 !important; color: white !important; } /* Pink for very high */
        .intensity-5 { background-color: #f44336 !important; color: white !important; } /* Red for critical */
        
        /* Table row colors matching map */
        .table-intensity-0 { background-color: #a3c8f3ff; color: #333; border: 1px solid #dee2e6; }
        .table-intensity-1 { background-color: #a3c8f3ff; color: #333; }
        .table-intensity-2 { background-color: #2196f3; color: white; }
        .table-intensity-3 { background-color: #dbe914; color: black; }
        .table-intensity-4 { background-color: #e91e63; color: white; }
        .table-intensity-5 { background-color: #f44336; color: white; }
        
        .legend {
            padding: 15px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 1000;
            position: relative;
            border: 2px solid #0d6efd;
            min-width: 280px;
        }
        
        .legend h6 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
            border-bottom: 3px solid #0d6efd;
            padding-bottom: 8px;
            font-size: 16px;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 5px;
            transition: all 0.2s ease;
            background: rgba(248, 249, 250, 0.7);
            min-height: 40px;
        }
        
        .legend-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }
        
        .legend-color {
            width: 30px;
            height: 30px;
            margin-right: 15px;
            border-radius: 6px;
            border: 2px solid rgba(0,0,0,0.2);
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            flex-shrink: 0;
        }
        
        .legend-text {
            font-size: 14px;
            font-weight: 600;
            flex-grow: 1;
        }
        
        .legend-count {
            font-size: 12px;
            font-weight: bold;
            color: #0d6efd;
            background: rgba(13, 110, 253, 0.1);
            padding: 3px 8px;
            border-radius: 12px;
            min-width: 60px;
            text-align: center;
        }
        
        .state-popup {
            min-width: 300px;
            font-family: Arial, sans-serif;
            padding: 15px;
        }
        
        .state-popup h5 {
            color: #0d6efd;
            border-bottom: 3px solid #0d6efd;
            padding-bottom: 10px;
            margin-bottom: 15px;
            font-weight: bold;
            font-size: 18px;
        }
        
        .state-popup .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }
        
        .state-popup .info-label {
            font-weight: 600;
            color: #555;
            font-size: 14px;
        }
        
        .state-popup .info-value {
            font-weight: bold;
            color: #333;
            font-size: 14px;
        }
        
        .crime-circle {
            border-radius: 50%;
            opacity: 0.85;
            transition: all 0.3s ease;
            border: 3px solid rgba(255, 255, 255, 0.9);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
        }
        
        .crime-circle:hover {
            opacity: 1;
            transform: scale(1.2);
            border: 3px solid #a3c8f3ff;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
            z-index: 1000 !important;
        }
        
        /* Minimum size for all circles */
        .crime-minimum {
            min-width: 20px !important;
            min-height: 20px !important;
        }
        
        /* Heat intensity indicator */
        .intensity-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 8px;
            vertical-align: middle;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }
        
        .table-intensity {
            font-weight: bold;
            padding: 6px 12px;
            border-radius: 4px;
            display: inline-block;
            min-width: 90px;
            text-align: center;
            font-size: 13px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        /* Loading spinner */
        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 600px;
            background: rgba(255,255,255,0.9);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            border-radius: 10px;
        }
        
        .spinner-border {
            width: 3rem;
            height: 3rem;
        }
        
        /* State label on map */
        .state-label {
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.7);
            pointer-events: none;
        }
        
        /* Intensity scale for table */
        .intensity-scale {
            display: inline-block;
            width: 100%;
            height: 20px;
            border-radius: 10px;
            margin-top: 5px;
            background: linear-gradient(to right, #a3c8f3ff, #2196f3, #dbe914, #e91e63, #f44336);
        }
        
        .crime-type-badge {
            font-size: 12px;
            padding: 4px 8px;
            border-radius: 4px;
        }
        
        /* Print header */
        .print-header {
            display: none;
            text-align: center;
            padding: 20px;
            border-bottom: 2px solid #000;
            margin-bottom: 20px;
        }
        
        .print-header img {
            height: 80px;
            margin-bottom: 10px;
        }
        
        .print-header h3 {
            margin: 0;
            color: #000;
        }
        
        @media print {
            .print-header {
                display: block !important;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle-btn no-print" id="sidebarToggle">
        <i class="bx bx-chevron-left"></i>
    </button>
    
    <!-- Print Header (only visible when printing) -->
    <div class="print-header">
        <img src="{{ asset('sitrep/adminbackend/assets/images/logo/logo.png') }}" alt="Logo">
        <h3><b>CRIME HOTSPOT ANALYSIS MAP</b></h3>
        <h4>Crime Distribution Across Nigeria</h4>
        <p>Generated on: {{ date('F d, Y') }}</p>
    </div>
    
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
                                    <h3><b>CRIME HOTSPOT ANALYSIS MAP</b></h3>  
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <h4>Crime Distribution Across Nigeria</h4>
                                        <h5 class="text-muted">Visual representation of crime intensity by state</h5>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <a href="javascript:history.back()" class="btn btn-secondary no-print">Back</a>
                                        <button onclick="printReport()" class="btn btn-primary">Print Report</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Filter Crime Hotspot Data</h5>
                                <form id="hotspotFilterForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Select Year</label>
                                                <select class="form-control" name="year" id="year">
                                                    @php
                                                        $currentYear = date('Y');
                                                        $startYear = 2020;
                                                        for($year = $currentYear; $year >= $startYear; $year--) {
                                                            echo "<option value=\"$year\"" . ($year == $currentYear ? ' selected' : '') . ">$year</option>";
                                                        }
                                                    @endphp
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Select Month (Optional)</label>
                                                <select class="form-control" name="month" id="month">
                                                    <option value="">All Months</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Select Crime Type (Optional)</label>
                                                <select class="form-control" name="crime_type" id="crime_type">
                                                    <option value="">All Crime Types</option>
                                                    @foreach(App\Models\Crime_type::all() as $crimeType)
                                                        <option value="{{ $crimeType->id }}">{{ $crimeType->crime_type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center no-print">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bx bx-filter-alt"></i> Apply Filters
                                        </button>
                                        <button type="button" id="resetFilters" class="btn btn-secondary">
                                            <i class="bx bx-reset"></i> Reset Filters
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">National Total</h5>
                                <h2 class="text-primary" id="nationalTotal">0</h2>
                                <p class="text-muted" id="filterInfo">All Crimes - {{ date('Y') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Top 5 Crime Hotspots</h5>
                                <div class="row" id="topHotspots">
                                    <!-- Top hotspots will be loaded here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="row mt-4">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Crime Intensity Map</h5>
                                    <div class="btn-group no-print">
                                        <button id="fullscreenBtn" class="btn btn-outline-primary btn-sm">
                                            <i class="bx bx-fullscreen"></i> Full Screen
                                        </button>
                                        <button id="zoomInBtn" class="btn btn-outline-secondary btn-sm">
                                            <i class="bx bx-zoom-in"></i>
                                        </button>
                                        <button id="zoomOutBtn" class="btn btn-outline-secondary btn-sm">
                                            <i class="bx bx-zoom-out"></i>
                                        </button>
                                        <button id="resetViewBtn" class="btn btn-outline-secondary btn-sm">
                                            <i class="bx bx-reset"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="map-container">
                                    <div id="map"></div>
                                    <div id="mapLoading" class="loading-spinner" style="display: none;">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <span class="ms-2">Loading crime data...</span>
                                    </div>
                                    <button id="toggleFullscreenBtn" class="fullscreen-btn no-print" style="display: none;">
                                        <i class="bx bx-fullscreen"></i> Full Screen
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <div class="legend">
                                        <h6><i class="bx bx-legend"></i> Crime Intensity Legend</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="legend-item">
                                                    <div class="legend-color" style="background-color: #a3c8f3ff; border: 2px solid #adb5bd;"></div>
                                                    <div class="legend-text">No Data / 0 incidents</div>
                                                    <div class="legend-count" id="legendCount0">0 states</div>
                                                </div>
                                                <div class="legend-item">
                                                    <div class="legend-color" style="background-color: #a3c8f3ff;"></div>
                                                    <div class="legend-text">Low (1-10 incidents)</div>
                                                    <div class="legend-count" id="legendCount1">0 states</div>
                                                </div>
                                                <div class="legend-item">
                                                    <div class="legend-color" style="background-color: #2196f3;"></div>
                                                    <div class="legend-text">Medium (11-50 incidents)</div>
                                                    <div class="legend-count" id="legendCount2">0 states</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="legend-item">
                                                    <div class="legend-color" style="background-color: #dbe914;"></div>
                                                    <div class="legend-text">High (51-100 incidents)</div>
                                                    <div class="legend-count" id="legendCount3">0 states</div>
                                                </div>
                                                <div class="legend-item">
                                                    <div class="legend-color" style="background-color: #e91e63;"></div>
                                                    <div class="legend-text">Very High (101-200 incidents)</div>
                                                    <div class="legend-count" id="legendCount4">0 states</div>
                                                </div>
                                                <div class="legend-item">
                                                    <div class="legend-color" style="background-color: #f44336;"></div>
                                                    <div class="legend-text">Critical (200+ incidents)</div>
                                                    <div class="legend-count" id="legendCount5">0 states</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-3 pt-3 border-top">
                                            <small class="text-muted">
                                                <i class="bx bx-info-circle"></i> 
                                                Circle size indicates number of incidents. 
                                                <span class="intensity-scale"></span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">State Details</h5>
                                <div id="stateDetails">
                                    <div class="text-center p-4">
                                        <i class="bx bx-map-pin text-muted" style="font-size: 48px;"></i>
                                        <p class="mt-3 text-muted">Click on any state on the map to view detailed statistics</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card mt-4 how-to-use-card no-print">
                            <div class="card-body">
                                <h5 class="card-title">How to Use</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bx bx-circle text-primary"></i> Circle size represents number of incidents</li>
                                    <li class="mb-2"><i class="bx bx-palette"></i> Color indicates intensity level</li>
                                    <li class="mb-2"><i class="bx bx-filter"></i> Use filters to analyze specific time periods</li>
                                    <li class="mb-2"><i class="bx bx-zoom-in"></i> Click on states for detailed breakdown</li>
                                    <li><i class="bx bx-map"></i> Use fullscreen for better map view</li>
                                </ul>
                                <div class="alert alert-info mt-3">
                                    <i class="bx bx-info-circle"></i>
                                    <small>Tip: Use the fullscreen button for better map visualization and analysis.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Table -->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">State-wise Crime Statistics</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="hotspotTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>State</th>
                                                <th>Total Incidents</th>
                                                <th>Number of Reports</th>
                                                <th>Intensity Level</th>
                                                <th>Percentage of National</th>
                                                <th>Rank</th>
                                            </tr>
                                        </thead>
                                        <tbody id="hotspotTableBody">
                                            <!-- Table data will be loaded here -->
                                        </tbody>
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
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <script>
        // Global variables
        var map;
        var isFullscreen = false;
        var originalMapContainer = null;
        var originalMapHeight = null;
        var originalMapWidth = null;
        var currentCirclesLayer = null;
        
        // Color definitions for intensity levels - More distinct
        const INTENSITY_COLORS = {
            0: '#a3c8f3ff',      // White - No Data / 0 incidents
            1: '#a3c8f3ff',      // White for low incidents
            2: '#2196f3',      // Blue for medium
            3: '#dbe914',      // Yellow for high
            4: '#e91e63',      // Pink for very high
            5: '#f44336'       // Red for critical
        };
        
        // Intensity labels
        const INTENSITY_LABELS = {
            0: 'No Data',
            1: 'Low',
            2: 'Medium',
            3: 'High',
            4: 'Very High',
            5: 'Critical'
        };
        
        // Intensity descriptions
        const INTENSITY_DESCRIPTIONS = {
            0: '0 incidents',
            1: '1-10 incidents',
            2: '11-50 incidents',
            3: '51-100 incidents',
            4: '101-200 incidents',
            5: '200+ incidents'
        };
        
        // Minimum circle sizes for each intensity level
        const MIN_CIRCLE_SIZES = {
            0: 0,      // No circle for 0 incidents
            1: 15,     // Minimum size for low incidents
            2: 20,     // Minimum size for medium incidents
            3: 25,     // Minimum size for high incidents
            4: 30,     // Minimum size for very high incidents
            5: 35      // Minimum size for critical incidents
        };
        
        // Initialize map
        function initializeMap() {
            if (map) {
                map.remove();
            }
            
            map = L.map('map', {
                center: [9.0820, 8.6753], // Nigeria center coordinates
                zoom: 6,
                zoomControl: true
            });
            
            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 18,
                minZoom: 5
            }).addTo(map);
            
            // Load initial data immediately
            loadHotspotData();
        }
        
        // Custom print function
        function printReport() {
            // Trigger browser's print dialog
            window.print();
        }
        
        // Toggle sidebar
        function toggleSidebar() {
            document.body.classList.toggle('sidebar-collapsed');
            var toggleBtn = document.getElementById('sidebarToggle');
            var icon = toggleBtn.querySelector('i');
            
            if (document.body.classList.contains('sidebar-collapsed')) {
                icon.className = 'bx bx-chevron-right';
            } else {
                icon.className = 'bx bx-chevron-left';
            }
            
            // Resize map after sidebar toggle
            setTimeout(function() {
                if (map) {
                    map.invalidateSize();
                }
            }, 300);
        }
        
        // Calculate intensity level based on incidents
        function calculateIntensity(incidents) {
            if (incidents === 0) return 0;
            if (incidents <= 10) return 1;
            if (incidents <= 50) return 2;
            if (incidents <= 100) return 3;
            if (incidents <= 200) return 4;
            return 5; // 200+ incidents
        }
        
        // Get color for intensity level
        function getIntensityColor(intensity) {
            return INTENSITY_COLORS[intensity] || '#6c757d';
        }
        
        // Get label for intensity level
        function getIntensityLabel(intensity) {
            return INTENSITY_LABELS[intensity] || 'Unknown';
        }
        
        // Get description for intensity level
        function getIntensityDescription(intensity) {
            return INTENSITY_DESCRIPTIONS[intensity] || '';
        }
        
        // Get minimum circle size for intensity level
        function getMinCircleSize(intensity) {
            return MIN_CIRCLE_SIZES[intensity] || 10;
        }
        
        // Show loading spinner
        function showLoading() {
            $('#mapLoading').show();
        }
        
        // Hide loading spinner
        function hideLoading() {
            $('#mapLoading').hide();
        }
        
        // Load hotspot data
        function loadHotspotData() {
            var formData = $('#hotspotFilterForm').serialize();
            
            showLoading();
            
            $.ajax({
                url: '{{ route("crime.hotspot.data") }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        updateStatistics(response);
                        renderMapMarkers(response.map_data);
                        updateTable(response.map_data, response.total_national_incidents);
                        updateTopHotspots(response.top_hotspots);
                        hideLoading();
                    }
                },
                error: function(xhr) {
                    console.error('Error loading hotspot data:', xhr);
                    alert('Error loading crime hotspot data. Please try again.');
                    hideLoading();
                }
            });
        }
        
        // Update statistics
        function updateStatistics(data) {
            $('#nationalTotal').text(data.total_national_incidents.toLocaleString());
            $('#filterInfo').text(data.crime_type + ' - ' + data.year + ' (' + data.month + ')');
        }
        
        // Render map markers with minimum sizes
        function renderMapMarkers(mapData) {
            // Remove existing layer
            if (currentCirclesLayer) {
                map.removeLayer(currentCirclesLayer);
            }
            
            // Create new layer
            currentCirclesLayer = L.layerGroup();
            
            // Track intensity distribution for legend
            var intensityCounts = {0:0,1:0,2:0,3:0,4:0,5:0};
            var hasMarkers = false;
            var bounds = [];
            
            // First pass: count intensities
            mapData.forEach(function(state) {
                var intensity = calculateIntensity(state.incidents);
                intensityCounts[intensity]++;
            });
            
            // Second pass: create circles with proper sizing
            mapData.forEach(function(state) {
                // Calculate intensity based on incidents
                var intensity = calculateIntensity(state.incidents);
                
                // Get color for this intensity
                var color = getIntensityColor(intensity);
                
                // Only create visual elements if there are incidents
                if (state.incidents > 0) {
                    hasMarkers = true;
                    
                    // Calculate circle size with minimum size for each intensity
                    var radius = calculateCircleRadius(state.incidents, intensity);
                    
                    // Create circle with intensity-based color
                    var circle = L.circleMarker([state.latitude, state.longitude], {
                        radius: radius,
                        fillColor: color,
                        color: '#a3c8f3ff', // White border
                        weight: 2, // Thicker border
                        opacity: 0.9,
                        fillOpacity: 0.8, // More opaque for better visibility
                        className: 'crime-circle crime-minimum'
                    });
                    
                    // Add popup with state information
                    circle.bindPopup(createStatePopup(state, intensity, color));
                    
                    // Add click event for detailed view
                    circle.on('click', function(e) {
                        loadStateDetails(state.state_name);
                        e.originalEvent.stopPropagation();
                    });
                    
                    // Add hover effect
                    circle.on('mouseover', function() {
                        this.setStyle({
                            fillOpacity: 1.0,
                            weight: 3,
                            color: '#a3c8f3ff'
                        });
                        this.bringToFront();
                    });
                    
                    circle.on('mouseout', function() {
                        this.setStyle({
                            fillOpacity: 0.8,
                            weight: 2,
                            color: '#a3c8f3ff'
                        });
                    });
                    
                    // Add text label for state
                    var label = L.marker([state.latitude, state.longitude], {
                        icon: L.divIcon({
                            className: 'state-label',
                            html: `<div style="
                                background: rgba(0,0,0,0.6); 
                                color: white; 
                                padding: 3px 6px; 
                                border-radius: 3px; 
                                font-size: 11px; 
                                font-weight: bold;
                                text-shadow: 1px 1px 2px black;
                                white-space: nowrap;
                            ">
                            ${state.state_name.substring(0, 10)}
                            </div>`,
                            iconSize: [null, null],
                            iconAnchor: [0, 0]
                        })
                    });
                    
                    label.bindPopup(createStatePopup(state, intensity, color));
                    label.on('click', function(e) {
                        loadStateDetails(state.state_name);
                        e.originalEvent.stopPropagation();
                    });
                    
                    currentCirclesLayer.addLayer(circle);
                    currentCirclesLayer.addLayer(label);
                    
                    // Add to bounds for auto-zoom
                    bounds.push([state.latitude, state.longitude]);
                }
            });
            
            // Add layer to map
            currentCirclesLayer.addTo(map);
            
            // Update legend counts
            updateLegendCounts(intensityCounts);
            
            // Auto-zoom to show all markers
            if (hasMarkers && bounds.length > 0) {
                map.fitBounds(bounds, {
                    padding: [50, 50],
                    maxZoom: 8
                });
            }
        }
        
        // Calculate circle radius based on incidents with minimum size per intensity
        function calculateCircleRadius(incidents, intensity) {
            if (incidents === 0) return 0;
            
            // Get minimum size for this intensity
            var minSize = getMinCircleSize(intensity);
            
            // Calculate proportional size based on incidents (logarithmic scale)
            var proportionalSize = Math.max(minSize, Math.min(60, Math.sqrt(incidents) * 3));
            
            // For very low incident counts, ensure they're visible
            if (incidents < 5 && proportionalSize < minSize) {
                return minSize;
            }
            
            return proportionalSize;
        }
        
        // Create state popup
        function createStatePopup(state, intensity, color) {
            var intensityLabel = getIntensityLabel(intensity);
            var intensityDesc = getIntensityDescription(intensity);
            var textColor = (intensity >= 2 && intensity <= 5) ? 'white' : 'black';
            
            return `
                <div class="state-popup">
                    <h5>${state.state_name}</h5>
                    <div class="info-row">
                        <span class="info-label">Total Incidents:</span>
                        <span class="info-value">${state.incidents.toLocaleString()}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Number of Reports:</span>
                        <span class="info-value">${state.incident_count}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Intensity Level:</span>
                        <span class="info-value">
                            <span class="intensity-indicator" style="background-color: ${color}; border-color: ${textColor === 'white' ? 'rgba(255,255,255,0.5)' : 'rgba(0,0,0,0.3)'};"></span>
                            <strong>${intensityLabel}</strong>
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Range:</span>
                        <span class="info-value">${intensityDesc}</span>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-sm btn-primary w-100" onclick="loadStateDetails('${state.state_name}')">
                            <i class="bx bx-stats"></i> View Detailed Statistics
                        </button>
                    </div>
                </div>
            `;
        }
        
        // Update legend counts
        function updateLegendCounts(intensityCounts) {
            for (var i = 0; i <= 5; i++) {
                var countElement = document.getElementById('legendCount' + i);
                if (countElement) {
                    var count = intensityCounts[i] || 0;
                    countElement.textContent = count + (count === 1 ? ' state' : ' states');
                    
                    // Update legend item visibility
                    var legendItem = countElement.closest('.legend-item');
                    if (legendItem) {
                        if (count === 0) {
                            legendItem.style.opacity = '0.6';
                        } else {
                            legendItem.style.opacity = '1';
                        }
                    }
                }
            }
        }
        
        // Load state details
        function loadStateDetails(stateName) {
            var year = $('#year').val();
            var crimeType = $('#crime_type').val();
            
            $.ajax({
                url: '{{ route("crime.hotspot.state.details", ["stateName" => "__STATE__"]) }}'.replace('__STATE__', stateName),
                type: 'GET',
                data: {
                    year: year,
                    crime_type: crimeType
                },
                success: function(response) {
                    if (response.success) {
                        updateStateDetails(response);
                    }
                },
                error: function(xhr) {
                    console.error('Error loading state details:', xhr);
                }
            });
        }
        
        // Update state details
        function updateStateDetails(data) {
            var intensity = calculateIntensity(data.total_incidents);
            var color = getIntensityColor(intensity);
            var textColor = (intensity >= 2 && intensity <= 5) ? 'white' : 'black';
            
            var html = `
                <h5 class="text-primary">${data.state_name}</h5>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="text-center p-3 rounded" style="background-color: ${color}; color: ${textColor};">
                            <h6>Total Incidents</h6>
                            <h3>${data.total_incidents.toLocaleString()}</h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center p-3 bg-light rounded">
                            <h6>Number of Reports</h6>
                            <h3 class="text-success">${data.incident_count.toLocaleString()}</h3>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="alert ${intensity >= 4 ? 'alert-danger' : intensity >= 3 ? 'alert-warning' : intensity >= 2 ? 'alert-info' : 'alert-success'}">
                        <div class="d-flex align-items-center">
                            <span class="intensity-indicator" style="background-color: ${color}; width: 15px; height: 15px; border: 2px solid ${textColor === 'white' ? 'rgba(255,255,255,0.5)' : 'rgba(0,0,0,0.3)'};"></span>
                            <strong class="ms-2">Intensity Level: ${getIntensityLabel(intensity)}</strong>
                            <span class="ms-2">(${getIntensityDescription(intensity)})</span>
                        </div>
                    </div>
                </div>
            `;
            
            // Add top crimes if available
            if (data.top_crimes && data.top_crimes.length > 0) {
                html += `
                    <div class="mt-4">
                        <h6>Top Crime Types:</h6>
                        <div class="list-group">
                `;
                
                data.top_crimes.forEach(function(crime, index) {
                    // Check if crime_type_name exists, if not, use crime_type as fallback
                    var crimeName = crime.crime_type_name || `Crime Type ${crime.crime_type}`;
                    
                    html += `
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>${index + 1}. ${crimeName}</span>
                            <span class="badge bg-primary rounded-pill">${crime.total.toLocaleString()}</span>
                        </div>
                    `;
                });
                
                html += `
                        </div>
                    </div>
                `;
            } else {
                html += `
                    <div class="mt-4">
                        <div class="alert alert-warning">
                            <i class="bx bx-info-circle"></i>
                            No crime data available for this state with the current filters.
                        </div>
                    </div>
                `;
            }
            
            $('#stateDetails').html(html);
        }
                
        // Update table with matching colors
        function updateTable(mapData, nationalTotal) {
            var html = '';
            var rank = 1;
            
            mapData.forEach(function(state) {
                var intensity = calculateIntensity(state.incidents);
                var percentage = nationalTotal > 0 ? ((state.incidents / nationalTotal) * 100).toFixed(1) : 0;
                var color = getIntensityColor(intensity);
                var textColor = (intensity >= 2 && intensity <= 5) ? 'white' : 'black';
                
                html += `
                    <tr class="table-intensity-${intensity}">
                        <td><strong>${state.state_name}</strong></td>
                        <td>${state.incidents.toLocaleString()}</td>
                        <td>${state.incident_count.toLocaleString()}</td>
                        <td>
                            <span class="table-intensity" style="background-color: ${color}; color: ${textColor}; border: 1px solid ${textColor === 'white' ? 'rgba(255,255,255,0.3)' : 'rgba(0,0,0,0.2)'}">
                                <i class="bx bx-circle me-1"></i> ${getIntensityLabel(intensity)}
                            </span>
                        </td>
                        <td>${percentage}%</td>
                        <td><span class="badge bg-${rank <= 3 ? 'danger' : rank <= 10 ? 'warning' : 'secondary'}">${rank}</span></td>
                    </tr>
                `;
                
                rank++;
            });
            
            $('#hotspotTableBody').html(html);
        }
        
        // Update top hotspots
        function updateTopHotspots(topHotspots) {
            var html = '';
            
            topHotspots.forEach(function(hotspot, index) {
                var intensity = calculateIntensity(hotspot.incidents);
                var color = getIntensityColor(intensity);
                var textColor = (intensity >= 2 && intensity <= 5) ? 'white' : 'black';
                
                html += `
                    <div class="col-md">
                        <div class="card mb-3" style="border: 3px solid ${color};">
                            <div class="card-body text-center" style="color: ${textColor};">
                                <h6 class="card-title">
                                    #${index + 1} ${hotspot.state_name}
                                </h6>
                                <h3>
                                    ${hotspot.incidents.toLocaleString()}
                                </h3>
                                <p class="mb-0">incidents</p>
                                <div class="mt-2">
                                    <span class="badge" style="background-color: ${textColor === 'white' ? 'rgba(245, 232, 232, 1)' : 'rgba(247, 237, 237, 1)'}; color: ${color};">
                                        ${getIntensityLabel(intensity)} intensity
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            $('#topHotspots').html(html);
        }
        
        // Toggle fullscreen mode
        function toggleFullscreen() {
            var mapElement = document.getElementById('map');
            var fullscreenBtn = document.getElementById('fullscreenBtn');
            var toggleBtn = document.getElementById('toggleFullscreenBtn');
            
            if (!isFullscreen) {
                // Enter fullscreen
                isFullscreen = true;
                
                // Store original dimensions
                originalMapContainer = mapElement.parentElement;
                originalMapHeight = mapElement.style.height;
                originalMapWidth = mapElement.style.width;
                
                // Add fullscreen class
                mapElement.classList.add('fullscreen');
                
                // Move map to body for fullscreen
                document.body.appendChild(mapElement);
                
                // Show toggle button in fullscreen mode
                toggleBtn.style.display = 'flex';
                toggleBtn.classList.add('fullscreen-mode');
                toggleBtn.innerHTML = '<i class="bx bx-exit-fullscreen"></i> Exit Full Screen';
                
                // Update main button
                fullscreenBtn.innerHTML = '<i class="bx bx-exit-fullscreen"></i> Exit Full Screen';
                
                // Hide other content
                document.querySelector('.page-wrapper').style.display = 'none';
                
                // Add ESC key listener
                document.addEventListener('keydown', handleEscKey);
                
            } else {
                // Exit fullscreen
                isFullscreen = false;
                
                // Remove fullscreen class
                mapElement.classList.remove('fullscreen');
                
                // Restore original container and dimensions
                originalMapContainer.appendChild(mapElement);
                mapElement.style.height = originalMapHeight;
                mapElement.style.width = originalMapWidth;
                
                // Hide toggle button
                toggleBtn.style.display = 'none';
                toggleBtn.classList.remove('fullscreen-mode');
                toggleBtn.innerHTML = '<i class="bx bx-fullscreen"></i> Full Screen';
                
                // Update main button
                fullscreenBtn.innerHTML = '<i class="bx bx-fullscreen"></i> Full Screen';
                
                // Show other content
                document.querySelector('.page-wrapper').style.display = 'block';
                
                // Remove ESC key listener
                document.removeEventListener('keydown', handleEscKey);
            }
            
            // Trigger map resize
            setTimeout(function() {
                map.invalidateSize();
            }, 100);
        }
        
        // Handle ESC key press
        function handleEscKey(event) {
            if (event.key === 'Escape' && isFullscreen) {
                toggleFullscreen();
            }
        }
        
        // Initialize when document is ready
        $(document).ready(function() {
            // Initialize map
            initializeMap();
            
            // Initialize sidebar toggle
            document.getElementById('sidebarToggle').addEventListener('click', toggleSidebar);
            
            // Handle filter form submission
            $('#hotspotFilterForm').on('submit', function(e) {
                e.preventDefault();
                loadHotspotData();
            });
            
            // Handle reset filters
            $('#resetFilters').on('click', function() {
                $('#year').val('{{ date("Y") }}');
                $('#month').val('');
                $('#crime_type').val('');
                loadHotspotData();
            });
            
            // Handle fullscreen button click
            $('#fullscreenBtn').on('click', toggleFullscreen);
            $('#toggleFullscreenBtn').on('click', toggleFullscreen);
            
            // Handle zoom buttons
            $('#zoomInBtn').on('click', function() {
                map.zoomIn();
            });
            
            $('#zoomOutBtn').on('click', function() {
                map.zoomOut();
            });
            
            $('#resetViewBtn').on('click', function() {
                map.setView([9.0820, 8.6753], 6);
            });
            
            // Handle page visibility change (for mobile devices)
            document.addEventListener('visibilitychange', function() {
                if (document.hidden && isFullscreen) {
                    toggleFullscreen();
                }
            });
            
            // Handle window resize for map
            window.addEventListener('resize', function() {
                if (map) {
                    setTimeout(function() {
                        map.invalidateSize();
                    }, 100);
                }
            });
        });
    </script>
    
</body>
</html>