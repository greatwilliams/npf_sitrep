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
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" > -->

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







		<div class="page-content"> 
			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">Add Sitrep</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Add Sitrep</li>
						</ol>
					</nav>
				</div>
				<div class="ms-auto"></div>
			</div>

			<!--end breadcrumb-->
			<div class="row">
				<div class="col-xl-12 mx-auto">
					<hr/>
					<div class="card border-top border-0 border-4 border-primary">
						<div class="card-body p-5">
							<div class="card-title d-flex align-items-center">
								<div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
								<h5 class="mb-0 text-primary">Sitrep Registration</h5>
							</div>
							<hr>
							<form class="row g-3" method="POST" action="{{route('admin.submit.sitrep')}}">
								@csrf
								<div class="col-md-3">
									<label for="inputFirstName" class="form-label">Date of Incident</label>
									<input type="date" class="form-control" id="inputFirstName" name="incident_date" required>
								</div>
								<div class="col-md-3">
									<label for="inputLastName" class="form-label">Time of Incident</label>
									<input type="time" class="form-control" id="inputLastName" name="incident_time" required>
								</div>
								<div class="col-md-3">
									<label for="inputState" class="form-label">Sitrep Type</label>
									<select name="reporting_agency" class="form-select" required>
										<option value="">Select State</option>
										@foreach ($reporting_agencies as $reporting_agency)
											<option value="{{ $reporting_agency->agency_name }}">{{ $reporting_agency->agency_name }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-3">
									<label for="inputState" class="form-label">National Importance</label>
									<select id="inputState" class="form-select" required name="incident_level">
										<option selected>Select menu</option>
										<option value="1">High</option>
										<option value="2">Medium</option>
										<option value="3">Low</option>
									</select>
								</div>

								<div class="col-md-4">
									<label for="inputFirstName" class="form-label">State of Incident</label>
									<select id="state" name="state" class="form-select mb-3" aria-label="Default select example">
										<option value="">Select State</option>
										@foreach ($states as $state)
											<option value="{{ $state->id }}">{{ $state->name }}</option>
										@endforeach
									</select>                                      
								</div>

								<div class="col-md-4">
									<label for="inputLastName" class="form-label">LGA of Incident</label>
									<select id="city" name="city" disabled class="form-select mb-3" aria-label="Default select example">
										<option value="">Select City</option>
									</select>
								</div>

								<div class="col-md-4">
									<label for="inputPassword" class="form-label">Town/Location of Incident</label>
									<input class="form-control" type='text' name='location' required>
								</div>

								<div class="col-12">
									<label for="inputAddress" class="form-label">Incident Details</label>
									<textarea class="form-control" required name="crime_description" rows="5">Narration should be concise.</textarea>
								</div>

								
								<!-- <div class="col-6">
									<label for="inputAddress2" class="form-label">Police Actions/Response</label>
									<textarea class="form-control" required name="police_action" rows="5">Police Action should be concise.</textarea>
								</div> -->
								<input class="form-control" type='hidden' name='police_action' value=".">


								<div class="col-12">
									<table id="crimeTable" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr style="text-align: center;">
												<th>Crime/Incident Type</th>
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
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="main-tbody">
											<tr>
												<td>
													<select required class="form-control" name='crime_type[]'>
														<option selected disabled value="">Select Crime Type</option>
														@foreach($crime_types as $crime_type)
															<option value="{{$crime_type->id}}">{{$crime_type->crime_type}}</option>
														@endforeach
													</select>
												</td>
												<input type="hidden" name="number_incidents[]" value="1">
												<input type="hidden" name="remarks[]" value="1">
												<td><input class="form-control" type='text' name='number_victims[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_victims_injured[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_victim_casualties[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_victims_rescused[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_arrests[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='suspect_casualties[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_firearms[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_dane_gun[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_ammunition[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_caterages[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_vehicle[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='number_others[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='police_casualties[]' pattern="[0-9]+"></td>
												<td><input class="form-control" type='text' name='operative_casualties[]' pattern="[0-9]+"></td>
												<td></td>
											</tr>
										</tbody>
										<tbody id="dynamic-tbody"></tbody>
									</table>
								</div>

								<div class="col-12">
									<input type="submit" class="btn btn-success" name="submitCrimeReport" value="Submit">
									<button type="button" id="addCrimeBtn" class="btn btn-info">+ Add Crime/Incidents</button>
								</div>
							</form>
						</div>
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





<script>
    $(document).ready(function() {
        // State-City Dropdown
        $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/city/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                      
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                        $('select[name="city"]').prop('disabled', false);
                    }
                });
            } else {
                $('select[name="city"]').empty().prop('disabled', true);
            }
        });

        // Add Crime/Incident Row
        $('#addCrimeBtn').click(function() {
            var newRow = `
            <tr>
                <td>
                    <select required class="form-control" name="crime_type[]">
                        <option selected disabled value="">Select Crime Type</option>
                        @foreach($crime_types as $crime_type)
                        <option value="{{$crime_type->id}}">{{$crime_type->crime_type}}</option>
                        @endforeach
                    </select>
                </td>
                <input type="hidden" name="number_incidents[]" value="1">
                <input type="hidden" name="remarks[]" value="0">
                <td><input class="form-control" type="hidden" name="number_victims[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_victims_injured[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_victim_casualties[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_victims_rescused[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_arrests[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="suspect_casualties[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_firearms[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_dane_gun[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_ammunition[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_caterages[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_vehicle[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="number_others[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="police_casualties[]" pattern="[0-9]+"></td>
                <td><input class="form-control" type="hidden" name="operative_casualties[]" pattern="[0-9]+"></td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm remove-row">×</button>
                </td>
            </tr>`;
            
            $('#dynamic-tbody').append(newRow);
        });

        // Remove Row
        $(document).on('click', '.remove-row', function() {
            $(this).closest('tr').remove();
        });
    });
</script>

<script>
	$(function() {
		$(".knob").knob();
	});
</script>
	

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

</body>

</html>