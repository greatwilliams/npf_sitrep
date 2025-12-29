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
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.5.3/dist/MarkerCluster.Default.css" />
    
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
        #map {
            height: 600px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .intensity-0 { background-color: #f8f9fa; }
        .intensity-1 { background-color: #d1ecf1; }
        .intensity-2 { background-color: #bee5eb; }
        .intensity-3 { background-color: #86cfda; }
        .intensity-4 { background-color: #0dcaf0; }
        .intensity-5 { background-color: #0d6efd; }
        
        .legend {
            padding: 10px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        
        .legend-color {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border-radius: 3px;
        }
        
        .state-popup {
            min-width: 250px;
            font-family: Arial, sans-serif;
        }
        
        .state-popup h5 {
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 5px;
        }
        
        .crime-circle {
            border-radius: 50%;
            opacity: 0.7;
            transition: all 0.3s ease;
        }
        
        .crime-circle:hover {
            opacity: 1;
            transform: scale(1.1);
        }
    </style>
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
                                    <h3><b>CRIME HOTSPOT ANALYSIS MAP</b></h3>  
                                </div>
                                
                                <div class="row mt-4">
                                    <div class="col-md-8">
                                        <h4>Crime Distribution Across Nigeria</h4>
                                        <h5 class="text-muted">Visual representation of crime intensity by state</h5>
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
                                    
                                    <div class="text-center">
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
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Crime Intensity Map</h5>
                                <div id="map"></div>
                                <div class="mt-3">
                                    <div class="legend">
                                        <h6>Crime Intensity Legend:</h6>
                                        <div class="legend-item">
                                            <div class="legend-color intensity-0"></div>
                                            <span>No Data / 0 incidents</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color intensity-1"></div>
                                            <span>Low (1-10 incidents)</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color intensity-2"></div>
                                            <span>Medium (11-50 incidents)</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color intensity-3"></div>
                                            <span>High (51-100 incidents)</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color intensity-4"></div>
                                            <span>Very High (101-200 incidents)</span>
                                        </div>
                                        <div class="legend-item">
                                            <div class="legend-color intensity-5"></div>
                                            <span>Critical (200+ incidents)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
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
                        
                        <div class="card mt-4">
                            <div class="card-body">
                                <h5 class="card-title">How to Use</h5>
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="bx bx-circle text-primary"></i> Circle size represents crime intensity</li>
                                    <li class="mb-2"><i class="bx bx-filter"></i> Use filters to analyze specific time periods</li>
                                    <li class="mb-2"><i class="bx bx-zoom-in"></i> Click on states for detailed breakdown</li>
                                    <li class="mb-2"><i class="bx bx-mouse"></i> Hover over states to see incident counts</li>
                                    <li><i class="bx bx-map"></i> Use zoom controls for better view</li>
                                </ul>
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
    <script src="https://unpkg.com/leaflet.markercluster@1.5.3/dist/leaflet.markercluster.js"></script>
    
    <script>
        // Initialize map
        var map = L.map('map').setView([9.0820, 8.6753], 6); // Nigeria center coordinates
        var markers = L.markerClusterGroup();
        var circles = [];
        
        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        
        // Load initial data
        $(document).ready(function() {
            loadHotspotData();
            
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
        });
        
        function loadHotspotData() {
            var formData = $('#hotspotFilterForm').serialize();
            
            $.ajax({
                url: '{{ route("crime.hotspot.data") }}',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        updateStatistics(response);
                        updateMap(response.map_data);
                        updateTable(response.map_data, response.total_national_incidents);
                        updateTopHotspots(response.top_hotspots);
                    }
                },
                error: function(xhr) {
                    console.error('Error loading hotspot data:', xhr);
                    alert('Error loading crime hotspot data. Please try again.');
                }
            });
        }
        
        function updateStatistics(data) {
            $('#nationalTotal').text(data.total_national_incidents.toLocaleString());
            $('#filterInfo').text(data.crime_type + ' - ' + data.year + ' (' + data.month + ')');
        }
        
        function updateMap(mapData) {
            // Clear existing markers and circles
            markers.clearLayers();
            circles.forEach(function(circle) {
                map.removeLayer(circle);
            });
            circles = [];
            
            // Add new markers and circles
            mapData.forEach(function(state) {
                if (state.incidents > 0) {
                    // Calculate circle radius based on incidents (logarithmic scale for better visualization)
                    var radius = Math.max(10, Math.min(50, Math.log(state.incidents + 1) * 10));
                    
                    // Create circle with intensity-based color
                    var color = getIntensityColor(state.intensity);
                    var circle = L.circleMarker([state.latitude, state.longitude], {
                        radius: radius,
                        fillColor: color,
                        color: '#000',
                        weight: 1,
                        opacity: 0.8,
                        fillOpacity: 0.6,
                        className: 'crime-circle'
                    });
                    
                    // Add popup with state information
                    circle.bindPopup(createStatePopup(state));
                    
                    // Add click event for detailed view
                    circle.on('click', function() {
                        loadStateDetails(state.state_name);
                    });
                    
                    // Add hover effect
                    circle.on('mouseover', function() {
                        this.setStyle({fillOpacity: 0.8});
                    });
                    
                    circle.on('mouseout', function() {
                        this.setStyle({fillOpacity: 0.6});
                    });
                    
                    circles.push(circle);
                    markers.addLayer(circle);
                    
                    // Also add a marker for clustering
                    var marker = L.marker([state.latitude, state.longitude], {
                        title: state.state_name + ': ' + state.incidents + ' incidents'
                    });
                    
                    marker.bindPopup(createStatePopup(state));
                    marker.on('click', function() {
                        loadStateDetails(state.state_name);
                    });
                    
                    markers.addLayer(marker);
                }
            });
            
            // Add markers to map
            map.addLayer(markers);
            
            // Fit map bounds to show all markers
            if (circles.length > 0) {
                var group = L.featureGroup(circles);
                map.fitBounds(group.getBounds().pad(0.1));
            }
        }
        
        function getIntensityColor(intensity) {
            switch(intensity) {
                case 0: return '#f8f9fa';
                case 1: return '#d1ecf1';
                case 2: return '#bee5eb';
                case 3: return '#86cfda';
                case 4: return '#0dcaf0';
                case 5: return '#0d6efd';
                default: return '#6c757d';
            }
        }
        
        function createStatePopup(state) {
            return `
                <div class="state-popup">
                    <h5>${state.state_name}</h5>
                    <div class="mt-2">
                        <p><strong>Total Incidents:</strong> ${state.incidents.toLocaleString()}</p>
                        <p><strong>Number of Reports:</strong> ${state.incident_count}</p>
                        <p><strong>Intensity Level:</strong> ${getIntensityLabel(state.intensity)}</p>
                        <button class="btn btn-sm btn-primary w-100 mt-2" onclick="loadStateDetails('${state.state_name}')">
                            View Detailed Statistics
                        </button>
                    </div>
                </div>
            `;
        }
        
        function getIntensityLabel(intensity) {
            switch(intensity) {
                case 0: return 'No Data';
                case 1: return 'Low';
                case 2: return 'Medium';
                case 3: return 'High';
                case 4: return 'Very High';
                case 5: return 'Critical';
                default: return 'Unknown';
            }
        }
        
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
        
        function updateStateDetails(data) {
            var html = `
                <h5 class="text-primary">${data.state_name}</h5>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="text-center p-3 bg-light rounded">
                            <h6>Total Incidents</h6>
                            <h3 class="text-danger">${data.total_incidents.toLocaleString()}</h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-center p-3 bg-light rounded">
                            <h6>Number of Reports</h6>
                            <h3 class="text-success">${data.incident_count.toLocaleString()}</h3>
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
                    // You would need to fetch crime type names here
                    html += `
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>${index + 1}. Crime Type ${crime.crime_type}</span>
                            <span class="badge bg-primary rounded-pill">${crime.total.toLocaleString()}</span>
                        </div>
                    `;
                });
                
                html += `
                        </div>
                    </div>
                `;
            }
            
            $('#stateDetails').html(html);
        }
        
        function updateTable(mapData, nationalTotal) {
            var html = '';
            var rank = 1;
            
            mapData.forEach(function(state) {
                var percentage = nationalTotal > 0 ? ((state.incidents / nationalTotal) * 100).toFixed(1) : 0;
                
                html += `
                    <tr class="intensity-${state.intensity}">
                        <td><strong>${state.state_name}</strong></td>
                        <td>${state.incidents.toLocaleString()}</td>
                        <td>${state.incident_count.toLocaleString()}</td>
                        <td>${getIntensityLabel(state.intensity)}</td>
                        <td>${percentage}%</td>
                        <td><span class="badge bg-${rank <= 3 ? 'danger' : 'warning'}">${rank}</span></td>
                    </tr>
                `;
                
                rank++;
            });
            
            $('#hotspotTableBody').html(html);
        }
        
        function updateTopHotspots(topHotspots) {
            var html = '';
            
            topHotspots.forEach(function(hotspot, index) {
                html += `
                    <div class="col-md">
                        <div class="card ${index === 0 ? 'border-danger' : 'border-primary'} mb-3">
                            <div class="card-body text-center">
                                <h6 class="card-title text-${index === 0 ? 'danger' : 'primary'}">#${index + 1} ${hotspot.state_name}</h6>
                                <h3 class="text-${index === 0 ? 'danger' : 'primary'}">${hotspot.incidents.toLocaleString()}</h3>
                                <p class="text-muted mb-0">incidents</p>
                                <small class="text-muted">${getIntensityLabel(hotspot.intensity)} intensity</small>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            $('#topHotspots').html(html);
        }
    </script>
    
</body>
</html>