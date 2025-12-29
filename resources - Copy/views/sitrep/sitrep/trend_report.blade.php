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

	<style type="text/css">
		.vertical-text-table {
			writing-mode: vertical-rl;
			transform: rotate(180deg);
			text-align: left;
			max-height: 150px;
		}
	</style>
	<title>SITREP - Yearly Crime Trends</title>
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
					<div class="col-12 col-lg-12 col-xl-12 d-flex">
						<div class="card w-100">
							<div class="card-body">
								<div style="text-align: center;">
									<img src="{{ asset('sitrep/adminbackend/assets/images/logo/logo.png') }}" alt="Logo" height="100px">
									<h3><b>YEARLY CRIME TREND ANALYSIS ACROSS THE COUNTRY</b></h3>  
								</div>

								<div class="row mt-4">
									<div class="col-md-8">
										<h4>Annual Crime Report - {{ $year }}</h4>
										<h5 class="text-muted">Location: All States</h5>
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
				<div class="row mt-4">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h5 class="card-title">Total Incidents</h5>
								<h2 class="text-primary">{{ number_format($totalIncidents) }}</h2>
								<p class="text-muted">All States ({{ $year }})</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<h5 class="card-title">Average Monthly</h5>
								<h2 class="text-success">{{ number_format($averageIncidents) }}</h2>
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
								<h2 class="text-danger">{{ number_format($maxIncidents) }}</h2>
								<p class="text-muted">Maximum incidents</p>
							</div>
						</div>
					</div>
				</div>

				<!-- Monthly Data Breakdown Table -->
				<div class="row mt-4">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Monthly Data Breakdown - All States</h5>
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead class="table-light">
											<tr>
												<th>Month</th>
												<th>Culpable Homicide</th>
												<th>Armed Robbery</th>
												<th>Kidnapping</th>
												<th>Banditry</th>
												<th>Terrorism</th>
												<th>Total Incidents</th>
												<th>Percentage</th>
												<th>Trend</th>
											</tr>
										</thead>
										<tbody>
											@php
												$totalAll = $totalIncidents > 0 ? $totalIncidents : 1;
											@endphp
											@foreach($allMonthsData as $month => $data)
											<tr>
												<td>{{ $month }}</td>
												<td>{{ number_format($data['crime1']) }}</td>
												<td>{{ number_format($data['crime2']) }}</td>
												<td>{{ number_format($data['crime3']) }}</td>
												<td>{{ number_format($data['crime4']) }}</td>
												<td>{{ number_format($data['crime5']) }}</td>
												<td><strong>{{ number_format($data['total']) }}</strong></td>
												<td>
													@php
														$percentage = $totalAll > 0 ? round(($data['total'] / $totalAll) * 100, 1) : 0;
													@endphp
													{{ $percentage }}%
												</td>
												<td>
													@php
														$monthsArray = array_keys($allMonthsData);
														$currentIndex = array_search($month, $monthsArray);
													@endphp
													@if($currentIndex > 0)
														@php
															$prevMonth = $monthsArray[$currentIndex - 1];
															$prevValue = $allMonthsData[$prevMonth]['total'];
															$currentValue = $data['total'];
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
												<td><strong>{{ number_format($sitreps_total_bar->crime1 ?? 0) }}</strong></td>
												<td><strong>{{ number_format($sitreps_total_bar->crime2 ?? 0) }}</strong></td>
												<td><strong>{{ number_format($sitreps_total_bar->crime3 ?? 0) }}</strong></td>
												<td><strong>{{ number_format($sitreps_total_bar->crime4 ?? 0) }}</strong></td>
												<td><strong>{{ number_format($sitreps_total_bar->crime5 ?? 0) }}</strong></td>
												<td><strong>{{ number_format($totalIncidents) }}</strong></td>
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

				<!-- Individual Crime Trend Charts -->
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 mt-4">
					<div class="col">
						<div class="card w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="text-uppercase fw-bold" style="color:rgba(90, 113, 238, 1)">{{ $year }} Culpable Homicide Trend</h6>
									</div>
									<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
									</div>
								</div>
								<div class="chart-container-1">
									<canvas id="chart7"></canvas>
								</div>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="text-uppercase fw-bold" style="color:rgba(10, 88, 3, 1)">{{ $year }} Armed Robbery Trend</h6>
									</div>
									<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
									</div>
								</div>
								<div class="chart-container-1">
									<canvas id="chart8"></canvas>
								</div>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="text-uppercase fw-bold" style="color:rgba(190, 24, 212, 1)">{{ $year }} Kidnapping Trend</h6>
									</div>
									<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
									</div>
								</div>
								<div class="chart-container-1">
									<canvas id="chart9"></canvas>
								</div>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="text-uppercase fw-bold" style="color:rgba(211, 68, 12, 1)">{{ $year }} Banditry Trend</h6>
									</div>
									<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
									</div>
								</div>
								<div class="chart-container-1">
									<canvas id="chart10"></canvas>
								</div>
							</div>
						</div>
					</div>

					<div class="col">
						<div class="card w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="text-uppercase fw-bold" style="color:rgba(177, 19, 19, 1)">{{ $year }} Terrorism Trend</h6>
									</div>
									<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
									</div>
								</div>
								<div class="chart-container-1">
									<canvas id="chart11"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Comparative Crime Trends Chart -->
				<div class="row row-cols-1 row-cols-md-1 row-cols-xl-1 mt-4">
					<div class="col">
						<div class="card w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="text-uppercase fw-bold" style="color: #333">{{ $year }} Comparative Crime Trends</h6>
										<p class="text-muted mb-0" style="font-size: 14px">Monthly trends for all crime categories</p>
									</div>
									<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
									</div>
								</div>
								<div class="chart-container-1" style="height: 450px">
									<canvas id="comparativeCrimeChart"></canvas>
								</div>
								<div class="mt-3">
									<div class="row">
										<div class="col-md-6">
											<div class="legend-item d-flex align-items-center mb-2">
												<div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(90, 113, 238, 1);"></div>
												<small>Culpable Homicide</small>
											</div>
											<div class="legend-item d-flex align-items-center mb-2">
												<div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(10, 88, 3, 1);"></div>
												<small>Armed Robbery</small>
											</div>
											<div class="legend-item d-flex align-items-center">
												<div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(190, 24, 212, 1);"></div>
												<small>Kidnapping</small>
											</div>
										</div>
										<div class="col-md-6">
											<div class="legend-item d-flex align-items-center mb-2">
												<div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(211, 68, 12, 1);"></div>
												<small>Banditry</small>
											</div>
											<div class="legend-item d-flex align-items-center mb-2">
												<div class="color-box me-2" style="width: 15px; height: 15px; background-color: rgba(177, 19, 19, 1);"></div>
												<small>Terrorism</small>
											</div>
										</div>
									</div>
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
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/jquery-knob/excanvas.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('sitrep/adminbackend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>

	<!-- Chart Scripts -->
	<script>
		$(function() {
			"use strict";
			
			// Prepare month labels
			const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", 
							  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			
			// Prepare data array for all 12 months
			let homicideData = new Array(12).fill(0);
			let robberyData = new Array(12).fill(0);
			let kidnappingData = new Array(12).fill(0);
			let banditryData = new Array(12).fill(0);
			let terrorismData = new Array(12).fill(0);
			
			// Fill in the data from sitreps_total
			@foreach($sitreps_total as $data)
				homicideData[{{ $data->month }} - 1] = {{ $data->crime1 }};
				robberyData[{{ $data->month }} - 1] = {{ $data->crime2 }};
				kidnappingData[{{ $data->month }} - 1] = {{ $data->crime3 }};
				banditryData[{{ $data->month }} - 1] = {{ $data->crime4 }};
				terrorismData[{{ $data->month }} - 1] = {{ $data->crime5 }};
			@endforeach
			
			// Chart 7 - Culpable Homicide Trend
			var ctx7 = document.getElementById("chart7").getContext('2d');
			var chart7 = new Chart(ctx7, {
				type: 'line',
				data: {
					labels: monthNames,
					datasets: [{
						label: 'Culpable Homicide',
						data: homicideData,
						borderColor: "#14abef",
						backgroundColor: "rgba(20, 171, 239, 0.1)",
						borderWidth: 3,
						pointBackgroundColor: "#14abef",
						pointBorderColor: "#fff",
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
							titleFont: { size: 14 },
							bodyFont: { size: 13 }
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
							}
						}
					}
				}
			});
			
			// Chart 8 - Armed Robbery Trend
			var ctx8 = document.getElementById("chart8").getContext('2d');
			var chart8 = new Chart(ctx8, {
				type: 'line',
				data: {
					labels: monthNames,
					datasets: [{
						label: 'Armed Robbery',
						data: robberyData,
						borderColor: "#1ac932ff",
						backgroundColor: "rgba(65, 170, 79, 0.1)",
						borderWidth: 3,
						pointBackgroundColor: "#053f29ff",
						pointBorderColor: "#fff",
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
							titleFont: { size: 14 },
							bodyFont: { size: 13 }
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
							}
						}
					}
				}
			});
			
			// Chart 9 - Kidnapping Trend
			var ctx9 = document.getElementById("chart9").getContext('2d');
			var chart9 = new Chart(ctx9, {
				type: 'line',
				data: {
					labels: monthNames,
					datasets: [{
						label: 'Kidnapping',
						data: kidnappingData,
						borderColor: "#ab24d4ff",
						backgroundColor: "rgba(207, 51, 181, 0.1)",
						borderWidth: 3,
						pointBackgroundColor: "#420442ff",
						pointBorderColor: "#fff",
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
							titleFont: { size: 14 },
							bodyFont: { size: 13 }
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
							}
						}
					}
				}
			});
			
			// Chart 10 - Banditry Trend
			var ctx10 = document.getElementById("chart10").getContext('2d');
			var chart10 = new Chart(ctx10, {
				type: 'line',
				data: {
					labels: monthNames,
					datasets: [{
						label: 'Banditry',
						data: banditryData,
						borderColor: "#f7772dff",
						backgroundColor: "rgba(209, 126, 78, 0.1)",
						borderWidth: 3,
						pointBackgroundColor: "#420442ff",
						pointBorderColor: "#fff",
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
							titleFont: { size: 14 },
							bodyFont: { size: 13 }
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
							}
						}
					}
				}
			});
			
			// Chart 11 - Terrorism Trend
			var ctx11 = document.getElementById("chart11").getContext('2d');
			var chart11 = new Chart(ctx11, {
				type: 'line',
				data: {
					labels: monthNames,
					datasets: [{
						label: 'Terrorism',
						data: terrorismData,
						borderColor: "#d4190cff",
						backgroundColor: "rgba(218, 63, 63, 0.1)",
						borderWidth: 3,
						pointBackgroundColor: "#f50c0cff",
						pointBorderColor: "#fff",
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
							titleFont: { size: 14 },
							bodyFont: { size: 13 }
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
							}
						}
					}
				}
			});
			
			// Comparative Crime Trends Chart
			var ctxComparative = document.getElementById("comparativeCrimeChart").getContext('2d');
			var comparativeChart = new Chart(ctxComparative, {
				type: 'line',
				data: {
					labels: monthNames,
					datasets: [
						{
							label: 'Culpable Homicide',
							data: homicideData,
							borderColor: "rgba(90, 113, 238, 1)",
							backgroundColor: "rgba(90, 113, 238, 0.1)",
							borderWidth: 2,
							pointBackgroundColor: "rgba(90, 113, 238, 1)",
							pointBorderColor: "#fff",
							pointBorderWidth: 1.5,
							pointRadius: 4,
							pointHoverRadius: 6,
							fill: false,
							tension: 0.3
						},
						{
							label: 'Armed Robbery',
							data: robberyData,
							borderColor: "rgba(10, 88, 3, 1)",
							backgroundColor: "rgba(10, 88, 3, 0.1)",
							borderWidth: 2,
							pointBackgroundColor: "rgba(10, 88, 3, 1)",
							pointBorderColor: "#fff",
							pointBorderWidth: 1.5,
							pointRadius: 4,
							pointHoverRadius: 6,
							fill: false,
							tension: 0.3
						},
						{
							label: 'Kidnapping',
							data: kidnappingData,
							borderColor: "rgba(190, 24, 212, 1)",
							backgroundColor: "rgba(190, 24, 212, 0.1)",
							borderWidth: 2,
							pointBackgroundColor: "rgba(190, 24, 212, 1)",
							pointBorderColor: "#fff",
							pointBorderWidth: 1.5,
							pointRadius: 4,
							pointHoverRadius: 6,
							fill: false,
							tension: 0.3
						},
						{
							label: 'Banditry',
							data: banditryData,
							borderColor: "rgba(211, 68, 12, 1)",
							backgroundColor: "rgba(211, 68, 12, 0.1)",
							borderWidth: 2,
							pointBackgroundColor: "rgba(211, 68, 12, 1)",
							pointBorderColor: "#fff",
							pointBorderWidth: 1.5,
							pointRadius: 4,
							pointHoverRadius: 6,
							fill: false,
							tension: 0.3
						},
						{
							label: 'Terrorism',
							data: terrorismData,
							borderColor: "rgba(177, 19, 19, 1)",
							backgroundColor: "rgba(177, 19, 19, 0.1)",
							borderWidth: 2,
							pointBackgroundColor: "rgba(177, 19, 19, 1)",
							pointBorderColor: "#fff",
							pointBorderWidth: 1.5,
							pointRadius: 4,
							pointHoverRadius: 6,
							fill: false,
							tension: 0.3
						}
					]
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					interaction: {
						mode: 'index',
						intersect: false,
					},
					plugins: {
						legend: {
							display: false,
							position: 'top',
							labels: {
								font: { size: 11 },
								boxWidth: 15,
								padding: 10,
								usePointStyle: true
							}
						},
						tooltip: {
							mode: 'index',
							intersect: false,
							backgroundColor: 'rgba(0, 0, 0, 0.8)',
							titleFont: { size: 13 },
							bodyFont: { size: 12 },
							padding: 12,
							callbacks: {
								label: function(context) {
									let label = context.dataset.label || '';
									if (label) {
										label += ': ';
									}
									if (context.parsed.y !== null) {
										label += context.parsed.y.toLocaleString();
									}
									return label;
								}
							}
						}
					},
					scales: {
						x: {
							grid: {
								color: 'rgba(0, 0, 0, 0.05)',
								drawBorder: false
							},
							ticks: {
								font: { size: 11 },
								color: '#666'
							}
						},
						y: {
							beginAtZero: true,
							grid: {
								color: 'rgba(0, 0, 0, 0.05)',
								drawBorder: false
							},
							ticks: {
								font: { size: 11 },
								color: '#666',
								callback: function(value) {
									return value.toLocaleString();
								}
							},
							title: {
								display: true,
								text: 'Number of Cases',
								color: '#666',
								font: {
									size: 12,
									weight: 'normal'
								}
							}
						}
					},
					elements: {
						line: { tension: 0.3 },
						point: { hoverRadius: 7 }
					}
				}
			});
		});
	</script>
	
</body>
</html>