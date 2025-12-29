@extends('admin.admin_master')
@section('admin') 

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Failed Approval </div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> Failed Approval </li>
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
					<div class="card-body">
						<!--<div class="table-responsive">-->
						<div>
							<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Full Name</th>
									<th>Chassis Number</th>
									<th>Number Plate</th>
									<th>Vehicle Make</th>
									<th>Vehicle Model</th>
									<th>Request Date</th>
									<th>Verified By</th>
									<th>Approved By</th>
									<th>Status</th>
									<th>Action</th> 
								</tr>
							</thead>
							<tbody>
								@foreach($vehicleData as $key => $item)		
										<tr>
											<td> {{ $key+1 }} </td>
											<td>{{$item->first_name}} {{$item->last_name}}</td>
											<td>{{$item->chassis_number}}</td>
											<td>{{$item->number_plate}}</td>
											<td>{{$item->vehicle_make}}</td>
											<td>{{$item->vehicle_model}}</td>
											<td>{{$item->created_at}}</td>
											<td>{{$item['user_details']['first_name']}} {{$item['user_details']['last_name']}}</td>
											<td>{{$item['admin_details']['first_name']}} {{$item['admin_details']['last_name']}}</td>
											<td>{{$item->request_status}}</td>

									<td> 
										<a href="{{ route('a.verify.details',$item->id) }}" class="btn btn-info">Verify Vehicle</a>
									</td> 
								</tr>
						@endforeach
					</tbody>
	<!--	<tfoot>
			<tr>
				<th>S/N</th>
				<th>Full Name </th>
				<th>Username </th>
				<th>Phone Number</th>
				<th>Email</th>
				<th>Status </th>
				<th>Action</th> 
			</tr>
		</tfoot>-->
	</table>
						</div>
					</div>
				</div>



			</div>




@endsection