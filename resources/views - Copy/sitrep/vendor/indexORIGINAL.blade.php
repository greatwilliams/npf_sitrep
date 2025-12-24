@extends('sitrep.admin.admin_dashboard')
@section('admin')

<div class="col">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleSmallModal">Small Modal</button>
	<!-- Modal -->
	<div class="modal fade" id="exampleSmallModal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title333333333</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>

@if($sitreps_total->all() != null)
    <h4 class="m-0">{{$info}}</h4>
@endif

@if($sitreps_total->all() == null)
    <h4 class="m-0">No Record for {{$info}}</h4>
@endif

@foreach($sitreps_total as $sitrep_total) 
          
@endforeach


<div class="page-content">

					<div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">
						<div class="col">
							<div class="card radius-10 bg-gradient-deepblue">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								<h3 class="mb-0 text-white">{{$sitrep_total->crime1}}</h3>
								<div class="ms-auto">
                                        <i class='bx bx-cart fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<h4 class="mb-0 text-white">Homicide </h4>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-orange">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h3 class="mb-0 text-white">{{$sitrep_total->crime2}}</h3>
									<div class="ms-auto">
                                        <i class='bx bx-dollar fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<h4 class="mb-0 text-white">Armed Robbery </h4>
								</div>
							</div>
						  </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-ohhappiness">
							<div class="card-body">
								<div class="d-flex align-items-center">
								<h3 class="mb-0 text-white">{{$sitrep_total->crime3}}</h3>
								<div class="ms-auto">
                                        <i class='bx bx-group fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<h4 class="mb-0 text-white"> Kidnapping </h4>
									<p class="mb-0 ms-auto">+5.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						</div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-ibiza">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								<h3 class="mb-0 text-white">{{$sitrep_total->crime4}}</h3>
								<div class="ms-auto">
                                        <i class='bx bx-envelope fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<h4 class="mb-0 text-white"> Banditry </h4>
								</div>
							</div>
						 </div>
						</div>
						<div class="col">
							<div class="card radius-10 bg-gradient-moonlit text-white">
							 <div class="card-body">
								<div class="d-flex align-items-center">
								<h3 class="mb-0 text-white">{{$sitrep_total->crime5}}</h3>
								<div class="ms-auto">
                                        <i class='bx bx-envelope fs-3 text-white'></i>
									</div>
								</div>
								<div class="progress my-3 bg-light-transparent" style="height:3px;">
									<div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div class="d-flex align-items-center text-white">
									<h4 class="mb-0 text-white"> Terrorism </h4>
									<p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p>
								</div>
							</div>
						 </div>
						</div>
					</div><!--end row-->
				
				<div class="row">
					<div class="col-12 col-lg-8 col-xl-8 d-flex">
					   <div class="card radius-10 w-100">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Site Traffic</h6>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>New Visitor</span>
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ade2f9"></i>Old Visitor</span>
							</div>
						   <div class="chart-container-1">
							 <canvas id="chart1"></canvas>
						   </div>
						</div>
						<div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
						  <div class="col">
							<div class="p-3">
							  <h5 class="mb-0">45.87M</h5>
							  <small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
							</div>
						  </div>
						  <div class="col">
							<div class="p-3">
							  <h5 class="mb-0">15:48</h5>
							  <small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
							</div>
						  </div>
						  <div class="col">
							<div class="p-3">
							  <h5 class="mb-0">245.65</h5>
							  <small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
							</div>
						  </div>
						</div>
					   </div>
					</div>
			   
					<div class="col-12 col-lg-4 col-xl-4 d-flex">
					   <div class="card radius-10 overflow-hidden w-100">
						  <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Weekly sales</h6>
								</div>
								<div class="font-22 ms-auto text-white"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<div class="chart-container-2 my-3">
							  <canvas id="chart2"></canvas>
							 </div>
						  </div>
						  <div class="table-responsive">
							<table class="table align-items-center mb-0">
							  <tbody>
								<tr>
								  <td><i class="bx bxs-circle me-2" style="color: #14abef"></i> Direct</td>
								  <td>$5856</td>
								  <td>+55%</td>
								</tr>
								<tr>
								  <td><i class="bx bxs-circle me-2" style="color: #02ba5a"></i>Affiliate</td>
								  <td>$2602</td>
								  <td>+25%</td>
								</tr>
								<tr>
								  <td><i class="bx bxs-circle me-2" style="color: #d13adf"></i>E-mail</td>
								  <td>$1802</td>
								  <td>+15%</td>
								</tr>
								<tr>
								  <td><i class="bx bxs-circle me-2" style="color: #fba540"></i>Other</td>
								  <td>$1105</td>
								  <td>+5%</td>
								</tr>
							  </tbody>
							</table>
						  </div>
						</div>
					</div>
				   </div><!--End Row-->


				

					


					<div class="card radius-10">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h5 class="mb-0">Orders Summary</h5>
								</div>
								<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
								</div>
							</div>
							<hr>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>S/N</th>
											<th>State</th>
											<th>Date</th>
											<th>Incident</th>
											<th>Police Actions</th>
										</tr>
									</thead>
									<tbody>
										
										

									@php $i=0;  @endphp								   

										@foreach ($sitrep_details as $sitrep_detail)

											<tr>
												<td>{{$i=$i+1}}</td> 
												<td>{{$sitrep_detail->state_id}}</td>
												<td>{{$sitrep_detail->incident_date}}</td>
												<td>{{$sitrep_detail->crime_description}}</td>
												<td>{{$sitrep_detail->police_action}}</td>
											</tr>
										@endforeach


										
									</tbody>
									<tfoot>
										<tr>
										<th>S/N</th>
											<th>State</th>
											<th>Date</th>
											<th>Incident</th>
											<th>Police Actions</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
</div>

@endsection




  
 