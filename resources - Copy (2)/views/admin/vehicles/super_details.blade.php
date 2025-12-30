@extends('admin.admin_master')
@section('admin') 

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Super Request Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> Request Details</li>
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
						<h5 class="card-title">Request Details</h5>
						<hr>
						 <div class="form-body mt-4">
						  <div class="row">
							 <div class="col-lg-5">
							  <div class="border border-3 p-4 rounded">
								<div class="row g-3">

									<div class="col-md-6">
										<label for="inputPrice" class="form-label">Reason for Request</label>
										<input type="text" class="form-control" id="inputPrice" value="{{$vehicleData->reason}}" readonly>
									  </div>

									@if ($vehicleData->personality != null)
									<div class="col-md-6">
									  <label for="inputCompareatprice" class="form-label">Personality</label>
									  <input type="text" class="form-control" id="inputCompareatprice" value="{{$vehicleData->personality}}" readonly>
									</div>
									@endif

									@if ($vehicleData->health_report != null)
									<div class="col-md-6">
										<label for="inputCompareatprice" class="form-label">Medical Report</label>
										<br>
										<a href="{{$vehicleData->health_report}}" target="_blank" rel="noopener noreferrer">View Report</a>
									  </div>
									@endif

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
										<label for="inputStarPoints" class="form-label">Number Plate</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->number_plate}}" readonly>
									</div>
									
									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Chassis Number</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->chassis_number}}" readonly>
									</div>

									

									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Vehicle Make</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->vehicle_make}}" readonly>
									</div>

									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Vehicle Model</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->vehicle_model}}" readonly>
									</div>

									<div class="col-md-6">
										<label for="inputStarPoints" class="form-label">Color</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->vehicle_color}}" readonly>
									</div>

									<div class="col-md-6">
									<label for="inputStarPoints" class="form-label">Request Status</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->request_status}}" readonly>
									</div>

									<div class="col-md-6">
									<label for="inputStarPoints" class="form-label">Request State</label>
										<input type="text" class="form-control" id="inputStarPoints" value="{{$vehicleData->request_state}}" readonly>
									</div>
								</div> 
							</div>
							</div>

							<div class="col-lg-7">
								<div class="border border-3 p-4 rounded">
					            	<!--<div class="table-responsive">-->
									<div>
										All Actions Taken
										<table id="example" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th>S/N</th>
													<th>Action Type </th>
													<th>Status </th>
													<th>Remarks </th>
													<th>Treated By</th>
													<th>Formation</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
												@foreach($task_action as $key => $item)		
												<tr>
													<td> {{ $key+1 }} </td>
													<td> {{ $item->action_type }}</td>
													@php
														if ( $item->action_status == 200){
															$action_status = "Successful";
														}
														else {
															$action_status = $item->action_status;
														}														
													@endphp
													<td> {{ $action_status }}</td>
													<td> {{ $item->action_taken }}</td>
													<td> {{ $item['user_details']['last_name'] }} {{ $item['user_details']['first_name'] }} </td>
													<td> {{ $item['user_details']['state_origin'] }} </td>
													{{-- <td> {{ $item->created_at }}</td> --}}
													@php
													$date=date_create($item->created_at);
													//echo date_format($date,"d/m/Y H:i");
													@endphp


													<td> {{ date_format($date,"d/m/Y H:i") }}</td>
													
												</tr>
												@endforeach
											</tbody>
											
										</table>
									</div>

									@if($vehicleData->cmr_upload != 200)

									<form method="POST" action="{{ route('super.update.verify') }}">
										@csrf

										<input type="hidden" name="request_id" value="{{$vehicleData->request_id}}">
										<input type="hidden" name="id" value="{{$vehicleData->id}}">

										<div class="mb-3">
											<label for="inputProductType" class="form-label">Status Action</label>
                                            <input class="form-select" type="text" name="request_status" value="Change State" readonly>
											
										</div>

                                        <div class="mb-3">
											<label for="inputProductType" class="form-label">Select State</label>
                                            <select class="form-select mb-3" aria-label="Default select example" name="state_command">
                                                <option value="" selected="selected">- Select -</option>
                                                <option value="FCT">FCT</option>
                                                <option value="Abia">Abia</option>
                                                <option value="Adamawa">Adamawa</option>
                                                <option value="Akwa Ibom">Akwa Ibom</option>
                                                <option value="Anambra">Anambra</option>
                                                <option value="Bauchi">Bauchi</option>
                                                <option value="Bayelsa">Bayelsa</option>
                                                <option value="Benue">Benue</option>
                                                <option value="Borno">Borno</option>
                                                <option value="Cross River">Cross River</option>
                                                <option value="Delta">Delta</option>
                                                <option value="Ebonyi">Ebonyi</option>
                                                <option value="Edo">Edo</option>
                                                <option value="Ekiti">Ekiti</option>
                                                <option value="Enugu">Enugu</option>
                                                <option value="Gombe">Gombe</option>
                                                <option value="Imo">Imo</option>
                                                <option value="Jigawa">Jigawa</option>
                                                <option value="Kaduna">Kaduna</option>
                                                <option value="Kano">Kano</option>
                                                <option value="Katsina">Katsina</option>
                                                <option value="Kebbi">Kebbi</option>
                                                <option value="Kogi">Kogi</option>
                                                <option value="Kwara">Kwara</option>
                                                <option value="Lagos">Lagos</option>
                                                <option value="Nassarawa">Nassarawa</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Ogun">Ogun</option>
                                                <option value="Ondo">Ondo</option>
                                                <option value="Osun">Osun</option>
                                                <option value="Oyo">Oyo</option>
                                                <option value="Plateau">Plateau</option>
                                                <option value="Rivers">Rivers</option>
                                                <option value="Sokoto">Sokoto</option>
                                                <option value="Taraba">Taraba</option>
                                                <option value="Yobe">Yobe</option>
                                                <option value="Zamfara">Zamfara</option>
                                            </select>
										</div>


										<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Reason for Action</label>
											<textarea class="form-control" name="verify_reason" id="inputProductDescription" rows="3" required></textarea>
										</div>

										<div class="mb-3">
												<div class="d-grid">
												<button type="submit" class="btn btn-primary">Submit Approval</button>
												</div>
											</div>
									</form>

									@endif


								</div>

								
								 
							</div>

						 </div><!--end row-->
					  </div>
					</div>
				</div>



			</div>




@endsection