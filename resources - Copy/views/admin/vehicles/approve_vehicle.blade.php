@extends('admin.admin_master')
@section('admin') 

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Awaiting Verification Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Awaiting Verification Details</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">

						</div>
					</div>
				</div>
				<!--end breadcrumb-->

				<hr/>

				<div class="card">
					<div class="card-body p-4">
						<h5 class="card-title">Verification Details</h5>
						<hr>
						 <div class="form-body mt-4">
						  <div class="row">
							 <div class="col-lg-6">
							  <div class="border border-3 p-4 rounded">
								<div class="row g-3">
								  <div class="col-md-6">
									  <label for="inputPrice" class="form-label">First Name</label>
									  <input type="text" class="form-control" id="inputPrice" value="{{$vehicleData->first_name}}" readonly>
									</div>
									<div class="col-md-6">
									  <label for="inputCompareatprice" class="form-label">Last Name</label>
									  <input type="text" class="form-control" id="inputCompareatprice" value="{{$vehicleData->last_name}}" readonly>
									</div>
									<div class="col-md-6">
									  <label for="inputCostPerPrice" class="form-label"> Phone Number</label>
									  <input type="text" class="form-control" id="inputCostPerPrice" value="{{$vehicleData->phone_number}}" readonly>
									</div>
									<div class="col-md-6">
									  <label for="inputStarPoints" class="form-label">Email</label>
									  <input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->email}}" readonly>
									</div>
									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Chassis Number</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->chassis_number}}" readonly>
									</div>

									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Number Plate</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->number_plate}}" readonly>
									</div>

									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Vehicle Make</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->vehicle_make}}" readonly>
									</div>

									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Request Status</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->request_status}}" readonly>
									</div>

									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Color</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->vehicle_color}}" readonly>
									</div>

									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Email</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->id}}" readonly>
									</div>
								</div> 
							</div>
							</div>

							<div class="col-lg-6">
								<div class="border border-3 p-4 rounded">
									<form method="POST" action="{{ route('a.update.verify', $vehicleData->id) }}">
										@csrf

										<div class="mb-3">
											<label for="inputProductType" class="form-label">Select Approval Status</label>
											<select class="form-select" id="inputProductType" name="request_status">
												<option></option>
												<option value="Verified">Verified</option>
												<option value="Not Verified">Not Verified</option>
											</select>
										</div>


										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Reason for Decision</label>
											<textarea class="form-control" name="verify_reason" id="inputProductDescription" rows="3"></textarea>
										</div>

										<div class="mb-3">
												<div class="d-grid">
												<button type="submit" class="btn btn-primary">Submit Verification</button>
												</div>
											</div>
									</form>


								</div>

								
								 
							</div>

						 </div><!--end row-->
					  </div>
					</div>
				</div>

				<hr/>
				<div class="card">
					<div class="card-body">
						<!--<div class="table-responsive">-->
						<div>
							<div class="container">
								<div class="main-body">
									<div class="row">
										<div class="col-lg-6">
											<div class="card">
												<div class="card-body">
													<div class="d-flex flex-column align-items-center text-center">
																<h4>{{ $vehicleData->applicant_id }}</h4>

																
																{{-- <h3>{{ $vehicleData['user']['id'] }}<h3> --}}
													</div>

													<hr class="my-4" />
													<ul class="list-group list-group-flush">
														
														
													
														<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
															<h6 class="mb-0">
																Payment Status</h6>
															<span class="text-secondary">{{ $vehicleData->request_status}}</span>
														</li>  
													</ul>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											
											<div class="card">
												<div class="card-body">
														<form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data" >
														@csrf
													<div class="row mb-3">
														<div class="col-sm-3">
															<h6 class="mb-0">Verification</h6>
														</div>
														<div class="col-sm-9 text-secondary">
															<input type="text" name="name" class="form-control" value="{{ $vehicleData->name }}" required />
														</div>


														<div class="col-sm-5">
															<h6 class="mb-0">Reason for Denial/Approval</h6>
														</div>											

														<div class="col-sm-7 text-secondary">
															<textarea name="name" class="form-control" id="inputAddress2" placeholder="Address 2..." rows="3">{{ $vehicleData->name }}</textarea>
														</div>

													</div>
			
													<div class="row">
														<div class="col-sm-3"></div>
														<div class="col-sm-9 text-secondary">
															<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
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
				</div>



			</div>




@endsection