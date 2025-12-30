<header>
			<div class="topbar d-flex align-items-center">

				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
				
						@php
							$id = Auth::user()->id;
							$adminData = App\Models\User::find($id);
						
						@endphp	


					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ (!empty($adminData->photo)) ? url('sitrep/upload/admin_images/'.$adminData->photo):url('sitrep/upload/no_image.jpg') }}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
									<p class="user-name mb-0">{{ Auth::user()->name }}</p>
									<p class="designattion mb-0">{{ Auth::user()->username }}</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							
							<li><a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="bx bx-cog"></i><span>Change Password</span></a>
 
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
</header>


<!-- DAILY SITREP MODAL -->
	<div class="modal fade" id="exampleModal1" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Generate Daily SITREP </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				


				<form action="{{ route('daily.report')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"> Date</label>
                      <input type="date" class="form-control" name="date_from" id="" required>
                  </div>
                  
                 			  
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Generate Record </button>
				</div>
			</form>

			</div>
		</div>
	</div>
	<!-- DAILY SITREP MODAL ENDS -->

	<!-- MONTHLY SITREP MODAL -->
	<div class="modal fade" id="exampleModal22" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Generate Monthly SITREP </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				


				<form action="{{ route('monthly.report')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"> Select Month</label>
                      <input type="month" class="form-control" name="date_from2" id="" required>
                  </div>
                  
                 			  
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Generate Report </button>
				</div>
			</form>

			</div>
		</div>
	</div>
	<!-- MONTHLY SITREP MODAL ENDS --> 


	<!-- CUSTOM SITREP MODAL  -->
	<div class="modal fade" id="exampleModal3" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Generate Custom SITREP </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				


				<form action="{{ route('custom.report')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">From</label>
                      <input type="date" class="form-control" name="date_from" id="" required>
                  </div>
                   <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">To</label>
                      <input type="date" class="form-control" name="date_to" id="" required>
                  </div>
                 			  
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Generate Report </button>
				</div>
			</form>

			</div>
		</div>
	</div>
	<!-- CUSTOM SITREP MODAL ENDS -->

	<!-- VALIDATE SITREP MODAL  --> 
	<div class="modal fade" id="exampleModal7" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Generate Daily SITREP </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				


				<form action="{{ route('validate.report')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"> Date</label>
                      <input type="date" class="form-control" name="date_from" id="" required>
                  </div>
                  
                 			  
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Generate Record </button>
				</div>
			</form>

			</div>
		</div>
	</div>
	<!-- VALIDATE SITREP MODAL ENDS -->

	<!-- YEAR ON YEAR SITREP MODAL  -->
	<div class="modal fade" id="exampleModal4" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Year-on-Year Analysis</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				


				<form action="{{ route('yearly.analysis')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Year 1</label>
					  <input type="number" class="form-control" name="date_from" id="year_input" placeholder="YYYY" min="1900" max="2100" required>

                  </div>
                   <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Year 2</label>
					<input type="number" class="form-control" name="date_to" id="year_input" placeholder="YYYY" min="1900" max="2100" required>
                  </div>
                 			  
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Analyse Report </button>
				</div>
			</form>

			</div>
		</div>
	</div>
	<!-- YEAR ON YEAR SITREP MODAL ENDS -->

	<!-- MONTH ON MONTH SITREP MODAL  -->
	<div class="modal fade" id="exampleModal5" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Month-on-Month Analysis</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				


				<form action="{{ route('monthly.analysis')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Month 1</label>
					  <input type="month" class="form-control" name="date_from" id="month_input" placeholder="Enter Month" min="1900" max="2100" required>

                  </div>
                   <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">Month 2</label>
					<input type="month" class="form-control" name="date_to" id="month_input" placeholder="Enter Month" min="1900" max="2100" required>
                  </div>
                 			  
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Analyse Report </button>
				</div>
			</form>

			</div>
		</div>
	</div>
	<!-- MONTH ON MONTH SITREP MODAL ENDS -->

	<!-- YEARLY SITREP Trends -->
	<div class="modal fade" id="exampleModal9" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Generate Yearly Trends  </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				


				<form action="{{ route('yearly.trends')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label"> Select Year</label>
				  		<select class="form-control" name="date_from" id="year_picker" required>
							<option value="" disabled selected>Select Year</option>
						</select>
                  </div>
                  
                 			  
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Generate Report </button>
				</div>
			</form>

			</div>
		</div>
	</div>
	<!-- YEARLY SITREP Trends ENDS -->  

	<!-- CUSTOM SITREP MODAL -->
	<div class="modal fade" id="exampleModal2d" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Generate Custom Trends</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				
			<form action="{{ route('custom.trends')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">From</label>
                      <input type="date" class="form-control" name="date_from" id="" required>
                  </div>
                   <div class="modal-body">
                  <label for="inputEmail3" class="col-sm-3 col-form-label">To</label>
                      <input type="date" class="form-control" name="date_to" id="" required>
                  </div>
                 			  
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Generate Custom Trends</button>
				</div>
			</form>

			</div>
		</div>
	</div>
	<!-- CUSTOM SITREP MODAL ENDS --> 

	<!-- MONTHLY TREND MODAL -->
<div class="modal fade" id="monthlyTrendModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Monthly Crime Trend</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="{{ route('monthly.trends') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- State Selection -->
                    <div class="mb-3">
                        <label class="form-label">Select State (Optional)</label>
                        <select class="form-control" name="state_id">
                            <option value="">All States</option>
                            @foreach(App\Models\State::orderBy('name')->get() as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                        <small class="text-muted">Leave blank to analyze all states</small>
                    </div>
                    
                    <!-- Crime Type Selection -->
                    <div class="mb-3">
                        <label class="form-label">Select Crime Type</label>
                        <select class="form-control" name="crime_type" required>
                            <option value="" disabled selected>Select Crime Type</option>
                            @foreach(App\Models\Crime_type::all() as $crimeType)
                                <option value="{{ $crimeType->id }}">{{ $crimeType->crime_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Start Month Selection -->
                    <div class="mb-3">
                        <label class="form-label">Start Month</label>
                        <select class="form-control" name="start_month" id="start_month" required>
                            <option value="" disabled selected>Select Start Month</option>
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
                    
                    <!-- End Month Selection -->
                    <div class="mb-3">
                        <label class="form-label">End Month</label>
                        <select class="form-control" name="end_month" id="end_month" required>
                            <option value="" disabled selected>Select End Month</option>
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
                    
                    <!-- Year Selection -->
                    <div class="mb-3">
                        <label class="form-label">Select Year</label>
                        <select class="form-control" name="year" id="year_picker" required>
                            <option value="" disabled selected>Select Year</option>
                            @php
                                $currentYear = date('Y');
                                $startYear = 2020; // Change this to your desired starting year
                                // Generate years from current year back to start year
                                for($year = $currentYear; $year >= $startYear; $year--) {
                                    echo "<option value=\"$year\">$year</option>";
                                }
                            @endphp
                        </select>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate Trend</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MONTHLY TREND MODAL ENDS -->

