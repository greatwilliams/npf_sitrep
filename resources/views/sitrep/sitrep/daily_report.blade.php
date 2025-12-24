<!-- resources\views\sitrep\sitrep\daily_report.blade.php -->
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
	<!-- <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" /> -->

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
	<title>SITREP - Admin</title>
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

		



		



@foreach($sitreps_total as $sitrep_total) 
          
@endforeach


<div class="page-content">

                <div class="col-md-12">
                    
                </div> 

				<div class="row">
					<div class="col-12 col-lg-12 col-xl-12 d-flex">
					   <div class="card w-100">
						<div class="card">
                            <div class="card-body">
                            
                                <div style="text-align: center;">
                                    <img src="{{ asset('sitrep/adminbackend/assets/images/logo/logo.png') }}"  alt="My Image"  height="100px">


                                    <h3><b> SITUATION REPORT ACROSS THE COUNTRY</b></h3>  
                                </div>

                                <div style="text-align: right;">
                                    
                                    <h4>  
                                        @if($sitreps_total->all() != null)
                                            <h4 class="m-0">{{$info}}</h4>
                                        @endif
                                        @if($sitreps_total->all() == null)
                                            <h4 class="m-0">No Record for {{$info}}</h4>
                                        @endif
                                    </h4> 

                                </div>  
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
					   </div>
					</div>
				</div><!--End Row-->

                <div class="row">
					<div class="col-12 col-lg-12 col-xl-12 d-flex">
					   <div class="card w-100">
						<div class="card-body">
							 
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Incident Freqency per State</h6>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Number of Incidents Reported</span>
								<!-- <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ade2f9"></i>Old Visitor</span> -->
							</div>
						   <div class="chart-container-1">
							 <canvas id="chart1"></canvas>
						   </div>
						</div>
					   </div>
					</div>
				</div><!--End Row-->



				<div class="row">
					<div class="col-12 col-lg-12 col-xl-12 d-flex">
					   <div class="card w-100">
						<div class="card-body">
							 
							<div class="d-flex align-items-center">
								<div>

									<h6 class="mb-0">Key Insight for  

									@if($sitreps_total->all() != null)
										{{$info}}
									@endif

									@if($sitreps_total->all() == null)
										No Record for {{$info}}
									@endif
									</h6>
									@foreach($sitreps_state_total as $sitrep_insight) 
									@endforeach  
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							
						  
						</div>

						<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-0 row-group  border-top">
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
									<td>{{$sitrep_total->crime1}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i>Armed Robbery</td>
									<td>{{$sitrep_total->crime2}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i>Kidnapping</td>
									<td>{{$sitrep_total->crime3}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i>Banditry</td>
									<td>{{$sitrep_total->crime4}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i>Terrorism</td>
									<td>{{$sitrep_total->crime5}}</td>
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
									<td><i class="bx bxs-circle me-2" style="color:rgb(65, 89, 230)"><B> RECOVERIES &ARRESTS</B></i></td>
									<td></td>
									</tr>


									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Suspects Arrested</td>
									<td>{{$sitrep_insight->number_arrest}}</td>
									</tr>
									<tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Sophisticated Firearms Recovered</td>
									<td>{{$sitrep_insight->number_firearms}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Pump Action/Dane/Fabricated Guns</td>
									<td>{{$sitrep_insight->number_dane_gun}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Ammunitions Recovered</td>
									<td>{{$sitrep_insight->number_ammunition}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(17, 12, 94)"></i> Cartridges/Pellets Recovered</td>
									<td>{{$sitrep_insight->number_caterages}}</td>
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
									<td><i class="bx bxs-circle me-2" style="color:rgba(14, 90, 7, 0.98)"><B> VICTIMS  & CASUALTIES</span></B></i></td>
									<td></td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(4, 87, 29)"></i> Victims Rescued</td>
									<td>{{$sitrep_insight->number_victims_rescused}}</td>
									</tr>
									<tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(4, 87, 29)"></i> Victims Kidnapped</td>
									<td>{{$sitrep_insight->number_victims}}</td>
									</tr>
									<!-- <tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(4, 87, 29)"></i> Victims Injured</td>
									<td>{{$sitrep_insight->number_victims_injured}}</td>
									</tr> -->
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Victims Killed</td>
									<td>{{$sitrep_insight->number_casualties}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Police KIA</td>
									<td>{{$sitrep_insight->police_casualties}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Other Personnel KIA</td>
									<td>{{$sitrep_insight->operative_casualties}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(231, 228, 6)"></i> Suspects Neutralised</td>
									<td>{{$sitrep_insight->suspect_casualties}}</td>
									</tr>
									
								</tbody>
								</table>
							</div>
						  </div>
						  <!-- <div class="col">
							<div class="table-responsive">
								<table class="table align-items-center mb-0">
								<tbody>
									<tr>
									<td><i class="bx bxs-circle me-2" style="color:rgba(90, 19, 7, 0.98)"><B> CASUALTIES  </B></i></td>
									<td></td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Police KIA</td>
									<td>{{$sitrep_insight->police_casualties}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Other Personnel KIA</td>
									<td>{{$sitrep_insight->operative_casualties}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(202, 46, 7)"></i> Other Personnel KIA</td>
									<td>{{$sitrep_insight->operative_casualties}}</td>
									</tr>
									<tr>
									<td><i class="bx bx-right-arrow-alt me-2" style="color:rgb(231, 228, 6)"></i> Suspects Neutralised</td>
									<td>{{$sitrep_insight->suspect_casualties}}</td>
									</tr>
									
								</tbody>
								</table>
							</div>
						  </div> -->
						</div>
					   </div>
					</div>
				</div><!--End Row-->

					<!--end row-->
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
					<div class="col">
						<div class="card w-100">
							<div class="card-body">
								
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Major Incident Freqency  </h6>
									</div>
									<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
									</div>
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
									<h6 class="mb-0">Major Arrests, Recoveries and Rescues Freqency  </h6>
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
				</div>
				<!--end row-->

               
 

                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0"> Major Arrests, Recoveries, Rescues and Casualties Table per Crime Type by State  </h5>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <table id="example1" class="table table-striped table-bordered" style="width:100%">

                                <thead class="text-dark">
                                    <tr>
                                    <th>S/N</th>
                                    <!-- <th>Crime Type</th> -->
                                    <th>State</th>
                                    <th>Number of Incidents</th>
                                    <th style="background-color: lightblue;">Victims Abducted</th>
                                    <th style="background-color: lightblue;">Victims Injured</th>
                                    <th style="background-color: pink;">Victims Killed</th>
                                    <th style="background-color: lightblue;">Victims Rescued</th>
                                    <th style="background-color: lightyellow;">Suspects Arrested</th>
                                    <th style="background-color: lightyellow;">Suspects Neutralised</th>
                                    <th style="background-color: lightgreen;">Firearms Recovered</th>
                                    <th style="background-color: lightgreen;">Dane Guns Recovered</th>
                                    <th style="background-color: lightgreen;">Ammunitions Recovered</th>
                                    <th style="background-color: lightgreen;">Cartridges Recovered</th>
                                    <th style="background-color: lightgreen;">Vehicles Recovered</th>
                                    <th style="background-color: lightgreen;">Other Items Recovered</th>
                                    <th style="background-color: pink;">Police KIA</th>
                                    <th style="background-color: pink;">Other Personnel KIA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i=0;
                                @endphp
                                    @foreach($sitreps_crime_type_state as $sitrep) 
                                    <tr>                    
                                        <td>{{$i=$i+1}}</td> 
                                        
                                        <td align="right">{{$sitrep->state_id}}</td>

                                            @if ($sitrep->number_incident == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_incident}} </td>
                                            @endif

                                            @if ($sitrep->number_victims == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_victims}} </td>
                                            @endif

                                            @if ($sitrep->number_victims_injured == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_victims_injured}} </td>
                                            @endif

                                            @if ($sitrep->number_casualties == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_casualties}} </td>
                                            @endif

                                            @if ($sitrep->number_victims_rescused == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_victims_rescused}} </td> 
                                            @endif

                                            @if ($sitrep->number_arrest == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_arrest}} </td> 
                                            @endif

                                            @if ($sitrep->suspect_casualties == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->suspect_casualties}} </td>
                                            @endif

                                            @if ($sitrep->number_firearms == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_firearms}} </td>
                                            @endif

                                            @if ($sitrep->number_dane_gun == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_dane_gun}} </td>
                                            @endif

                                            @if ($sitrep->number_ammunition == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_ammunition}} </td>
                                            @endif

                                            @if ($sitrep->number_caterages == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_caterages}} </td>
                                            @endif

                                            @if ($sitrep->number_vehicle == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_vehicle}} </td>
                                            @endif

                                            @if ($sitrep->number_others == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_others}} </td>
                                            @endif

                                            @if ($sitrep->police_casualties == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->police_casualties}} </td>
                                            @endif

                                            @if ($sitrep->operative_casualties == 0)
                                            <td align="center"> - </td>
                                            @else
                                            <td align="center"> {{$sitrep->operative_casualties}} </td>
                                            @endif
                                    </tr>  
                                    @endforeach    
                                    
                                    @foreach($sitreps_state_total as $sitrep) 
                                    <tr class="fw-bold">                    
                                    <td></td> 
                                        
                                        <td  align="center">TOTAL</td>

                                            @if ($sitrep->number_incident == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_incident}} </td>
                                            @endif

                                            @if ($sitrep->number_victims == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_victims}} </td>
                                            @endif

                                            @if ($sitrep->number_victims_injured == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_victims_injured}} </td>
                                            @endif

                                            @if ($sitrep->number_casualties == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_casualties}} </td>
                                            @endif

                                            @if ($sitrep->number_victims_rescused == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_victims_rescused}} </td> 
                                            @endif

                                            @if ($sitrep->number_arrest == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_arrest}} </td> 
                                            @endif

                                            @if ($sitrep->suspect_casualties == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->suspect_casualties}} </td>
                                            @endif

                                            @if ($sitrep->number_firearms == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_firearms}} </td>
                                            @endif

                                            @if ($sitrep->number_dane_gun == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_dane_gun}} </td>
                                            @endif

                                            @if ($sitrep->number_ammunition == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_ammunition}} </td>
                                            @endif

                                            @if ($sitrep->number_caterages == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_caterages}} </td>
                                            @endif

                                            @if ($sitrep->number_vehicle == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_vehicle}} </td>
                                            @endif

                                            @if ($sitrep->number_others == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->number_others}} </td>
                                            @endif

                                            @if ($sitrep->police_casualties == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->police_casualties}} </td>
                                            @endif

                                            @if ($sitrep->operative_casualties == 0)
                                            <td align="center"> 0 </td>
                                            @else
                                            <td align="center"> {{$sitrep->operative_casualties}} </td>
                                            @endif


                                    </tr>  
                                    @endforeach 
                                </tfoot>
                            </table>       
                        </div>
                    </div>
                </div>



















				<!-- Major Crime Distribution Table -->
<!-- Major Crime Distribution Table -->
<!-- Major Crime Distribution Table -->
<div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-0">Major Crime Distribution by Crime Type</h5>
            </div>
            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
            </div>
        </div>
        <hr>
        <div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="btn-group" role="group" aria-label="Export Buttons">
                        <button type="button" class="btn btn-outline-secondary" onclick="exportTable('copy')">
                            <i class="bx bx-copy"></i> Copy
                        </button>
                        <button type="button" class="btn btn-outline-secondary" onclick="exportTable('excel')">
                            <i class="bx bx-spreadsheet"></i> Excel
                        </button>
                        <button type="button" class="btn btn-outline-secondary" onclick="exportTable('pdf')">
                            <i class="bx bxs-file-pdf"></i> PDF
                        </button>
                        <button type="button" class="btn btn-outline-secondary" onclick="window.print()">
                            <i class="bx bx-printer"></i> Print
                        </button>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="dataTables_length" id="example3_length">
                        <label>Show 
                            <select name="example3_length" aria-controls="example3" class="form-select form-select-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries
                        </label>
                    </div>
                </div>
            </div>
            
            <table id="example3" class="table table-striped table-bordered" style="width:100%">
                <thead class="text-dark">
                    <tr>
                        <th>S/N</th>
                        <th>Crime Type</th>
                        <th>Number of Incidents</th>
                        <th style="background-color: lightblue;">Victims Abducted</th>
                        <th style="background-color: pink;">Victims Killed</th>
                        <th style="background-color: lightblue;">Victims Rescued</th>
                        <th style="background-color: lightyellow;">Suspects Arrested</th>
                        <th style="background-color: lightyellow;">Suspects Neutralised</th>
                        <th style="background-color: lightgreen;">Firearms Recovered</th>
                        <th style="background-color: lightgreen;">Dane Guns Recovered</th>
                        <th style="background-color: lightgreen;">Ammunitions Recovered</th>
                        <th style="background-color: lightgreen;">Cartridges Recovered</th>
                        <th style="background-color: lightgreen;">Vehicles Recovered</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i=0;
                    // Define crime type labels (you can adjust this based on your actual crime types)
                    $crime_types = [
                        1 => 'Homicide',
                        2 => 'Armed Robbery',
                        3 => 'Kidnapping',
                        4 => 'Banditry',
                        5 => 'Terrorism',
                        6 => 'Cultism',
                        7 => 'Rape',
                        8 => 'Civil Unrest',
                        15 => 'Car Theft',
                        17 => 'Assault',
                        21 => 'Other Major Crimes'
                    ];
                @endphp
                
                @foreach($crime_distribution as $crime) 
                <tr>                    
                    <td>{{++$i}}</td> 
                    <td align="left">{{ $crime_types[$crime->crime_type] ?? 'Crime Type ' . $crime->crime_type }}</td>
                    
                    @if ($crime->number_incident == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_incident}} </td>
                    @endif

                    @if ($crime->number_victims == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_victims}} </td>
                    @endif

                    @if ($crime->number_casualties == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_casualties}} </td>
                    @endif

                    @if ($crime->number_victims_rescused == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_victims_rescused}} </td> 
                    @endif

                    @if ($crime->number_arrest == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_arrest}} </td> 
                    @endif

                    @if ($crime->suspect_casualties == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->suspect_casualties}} </td>
                    @endif

                    @if ($crime->number_firearms == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_firearms}} </td>
                    @endif

                    @if ($crime->number_dane_gun == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_dane_gun}} </td>
                    @endif

                    @if ($crime->number_ammunition == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_ammunition}} </td>
                    @endif

                    @if ($crime->number_caterages == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_caterages}} </td>
                    @endif

                    @if ($crime->number_vehicle == 0)
                    <td align="center"> - </td>
                    @else
                    <td align="center"> {{$crime->number_vehicle}} </td>
                    @endif
                </tr>  
                @endforeach    
                
                <!-- Total Row -->
                @if($crime_distribution_total)
                <tr class="fw-bold">                    
                    <td colspan="2" align="center">TOTAL</td>
                    
                    @if ($crime_distribution_total->number_incident == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_incident}} </td>
                    @endif

                    @if ($crime_distribution_total->number_victims == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_victims}} </td>
                    @endif

                    @if ($crime_distribution_total->number_casualties == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_casualties}} </td>
                    @endif

                    @if ($crime_distribution_total->number_victims_rescused == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_victims_rescused}} </td> 
                    @endif

                    @if ($crime_distribution_total->number_arrest == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_arrest}} </td> 
                    @endif

                    @if ($crime_distribution_total->suspect_casualties == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->suspect_casualties}} </td>
                    @endif

                    @if ($crime_distribution_total->number_firearms == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_firearms}} </td>
                    @endif

                    @if ($crime_distribution_total->number_dane_gun == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_dane_gun}} </td>
                    @endif

                    @if ($crime_distribution_total->number_ammunition == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_ammunition}} </td>
                    @endif

                    @if ($crime_distribution_total->number_caterages == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_caterages}} </td>
                    @endif

                    @if ($crime_distribution_total->number_vehicle == 0)
                    <td align="center"> 0 </td>
                    @else
                    <td align="center"> {{$crime_distribution_total->number_vehicle}} </td>
                    @endif
                </tr>  
                @endif 
                </tbody>
                <tfoot>
                    <tr>
                        <th>S/N</th>
                        <th>Crime Type</th>
                        <th>Number of Incidents</th>
                        <th>Victims Abducted</th>
                        <th>Victims Killed</th>
                        <th>Victims Rescued</th>
                        <th>Suspects Arrested</th>
                        <th>Suspects Neutralised</th>
                        <th>Firearms Recovered</th>
                        <th>Dane Guns Recovered</th>
                        <th>Ammunitions Recovered</th>
                        <th>Cartridges Recovered</th>
                        <th>Vehicles Recovered</th>
                    </tr>
                </tfoot>
            </table>       
        </div>
    </div>
</div>

<script>
// Function to handle export actions
function exportTable(type) {
    var table = $('#example3').DataTable();
    
    switch(type) {
        case 'copy':
            table.button('.buttons-copy').trigger();
            break;
        case 'excel':
            table.button('.buttons-excel').trigger();
            break;
        case 'pdf':
            table.button('.buttons-pdf').trigger();
            break;
    }
}

// Initialize DataTable with buttons
$(document).ready(function() {
    var table = $('#example3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                className: 'btn btn-outline-secondary',
                text: '<i class="bx bx-copy"></i> Copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                className: 'btn btn-outline-secondary',
                text: '<i class="bx bx-spreadsheet"></i> Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                className: 'btn btn-outline-secondary',
                text: '<i class="bx bxs-file-pdf"></i> PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-outline-secondary',
                text: '<i class="bx bx-printer"></i> Print',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ],
        lengthChange: true,
        pageLength: 10,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]]
    });
    
    // Style the DataTables buttons container
    $('.dt-buttons').addClass('btn-group');
    $('.dt-buttons .btn').removeClass('dt-button').addClass('btn btn-outline-secondary');
    
    // Move buttons to our custom container
    $('.btn-group').html(table.buttons().container());
});
</script>

<style>
/* Style for export buttons */
.btn-group .btn {
    margin-right: 5px;
    border-radius: 4px;
}

.btn-group .btn:hover {
    background-color: #f8f9fa;
}

/* DataTables styling */
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    margin-bottom: 15px;
}

.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #dee2e6;
    border-radius: 4px;
    padding: 5px 10px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 5px 10px;
    border: 1px solid #dee2e6;
    margin-left: 2px;
    border-radius: 4px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #007bff;
    color: white;
    border-color: #007bff;
}
</style>







































                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">SITREP Summary</h5>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>State</th>
										<th>Date of Incident</th>
                                        <th>Incident</th>
                                        <!-- <th>Police Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    

                                @php $i=0;  @endphp								   

                                    @foreach ($sitrep_details as $sitrep_detail)

                                        <tr style="text-align: justify;">
                                            <td>{{$i=$i+1}}</td> 
                                            <td>{{$sitrep_detail->state_id}}</td>
											<td>{{ \Carbon\Carbon::parse($sitrep_detail->incident_date)->format('d-m-Y') }}</td>
                                            <!-- <td>{{$sitrep_detail->incident_date}}</td> -->
                                            <td class="text-uppercase">{{$sitrep_detail->crime_description}}
												{{$sitrep_detail->police_action}}
											</td>
                                            <!-- <td>{{$sitrep_detail->police_action}}</td> -->
                                        </tr>
                                    @endforeach


                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>S/N</th>
                                        <th>State</th>
                                        <th>Date</th>
										<th>Date of Incident</th>
                                        <!-- <th>Police Actions</th> -->
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
</div>
			

		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('sitrep.admin.body.footer')
		@php
			// Initialize arrays
			$state_id = [];
			$number_incident = [];
			$number_arrest = [];
			
			foreach ($sitreps as $sitrep) {
				$state_id[] = $sitrep->state_id;
				$number_incident[] = $sitrep->number_incident; 
				$number_arrest[] = $sitrep->number_arrest;
			}
		@endphp
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

	<script>
		$(document).ready(function() {
			$('#example').DataTable();
			} );
	</script>
	<script>
		$(document).ready(function() {
			$('#example11').DataTable();
			} );
	</script>

	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
			
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
   
    <script>
		$(document).ready(function() {
			var table = $('#example1').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
			
			table.buttons().container()
				.appendTo( '#example1_wrapper .col-md-6:eq(0)' );
		} );
	</script>

     <script>
		$(document).ready(function() {
			var table = $('#example3').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
			
			table.buttons().container()
				.appendTo( '#example3_wrapper .col-md-6:eq(0)' );
		} );
	</script>


	<script>
		$(function() {
			$(".knob").knob();
		});
	</script>
	@if($sitreps->all() != null)
	<script>
		$(function() {
		"use strict";

		// chart 1
		
			var ctx = document.getElementById('chart1').getContext('2d');
			
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						// labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
						labels  : {!! json_encode($state_id) !!},

						datasets: [{
							label: 'Number of Incident',
							data                :  {!! json_encode($number_incident) !!},

							backgroundColor: '#14abef',
							borderColor: "transparent",
							pointRadius :"0",
							borderWidth: 3
						}, 
						// {
						// 	label: 'Old Visitor',
						// 	// data: [7, 5, 14, 7, 12, 6, 10, 6, 11, 5],
						// 	data                :  {!! json_encode($number_arrest) !!},

						// 	backgroundColor: "rgba(239, 64, 20, 0.35)",
						// 	borderColor: "transparent",
						// 	pointRadius :"0",
						// 	borderWidth: 1
						// }
					]
					},
				options: {
					maintainAspectRatio: false,
					legend: {
					display: false,
					labels: {
						fontColor: '#585757',  
						boxWidth:40
					}
					},
					tooltips: {
					displayColors:false
					},	
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero:true,
							fontColor: '#585757'
						},
						gridLines: {
						display: true ,
						color: "rgba(0, 0, 0, 0.05)"
						},
					}],
					yAxes: [{
						ticks: {
							beginAtZero:true,
							fontColor: '#585757'
						},
						gridLines: {
						display: true ,
						color: "rgba(0, 0, 0, 0.05)"
						},
					}]
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
	<!--app JS-->
	<script src="{{ asset('sitrep/adminbackend/assets/js/app.js')}}"></script>
	<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
 
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

	<script>
    $(document).ready(function() {
        var table = $('#example3').DataTable({
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print']
        });
        
        table.buttons().container()
            .appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
</script>

<script>
$(document).ready(function() {
    var table = $('#example3').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ],
        lengthChange: true,
        pageLength: 10,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]]
    });
});
</script>

</body>

</html>