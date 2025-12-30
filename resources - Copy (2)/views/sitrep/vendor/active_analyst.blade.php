@extends('sitrep.admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Active Analyst</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Active Analyst</li>
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
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Rank </th>
										<th>Name </th>
										<th>AP Number</th>
										<th>Email</th>
										<th>Status </th>
										<th>Action</th> 
									</tr>
								</thead>
								<tbody>
									@foreach($inActiveAnalyst as $key => $item)		
									<tr>
										<td> {{ $key+1 }} </td>
										<td> {{ $item->rank }}</td>
										<td> {{ $item->full_name }}</td>
										<td> {{ $item->ap_number }}</td>
										<td> {{ $item->email }}  </td>
										<td> <span class="btn btn-secondary">{{ $item->status }}</span>   </td>

										<td> 
											<a href="{{ route('active.analyst.details',$item->id) }}" class="btn btn-info">Analyst Details</a>

										</td> 
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>S/N</th>
										<th>First Name </th>
										<th>Last </th>
										<th>Phone Number</th>
										<th>Email</th>
										<th>Status </th>
										<th>Action</th> 
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>



			</div>




@endsection