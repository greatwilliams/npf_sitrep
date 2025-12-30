<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('sitrep/adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

					<li>
					<a href="{{ route('admin.dashboard') }}">
						<div class="parent-icon"><i class='bx bx-cookie'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				@php  if (Auth::user()->state == "FHQ") { @endphp 
				<li>
					<a href="{{route('admin.add.sitrep')}}">
						<div class="parent-icon"><i class="bx bx-cookie"></i>
						</div>
						<div class="menu-title">Add Sitrep</div>
					</a>
				</li>
				@php  } @endphp
				@php  if (Auth::user()->state != "FHQ") { @endphp 
				<li>
					<a href="{{route('state.add.sitrep')}}">
						<div class="parent-icon"><i class="bx bx-cookie"></i>
						</div>
						<div class="menu-title">Add Sitrep</div>
					</a>
				</li>
				@php  } @endphp

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Generate Report</div>
					</a>
					<ul>
						<li><a data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="bx bx-right-arrow-alt"></i>Daily SITREP</a></li>
						@php  if (Auth::user()->state == "FHQ") { @endphp 

						<!-- <li><a data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="bx bx-right-arrow-alt"></i>Monthly SITREP</a></li> -->
						<li><a data-bs-toggle="modal" data-bs-target="#exampleModal3"><i class="bx bx-right-arrow-alt"></i>Custom SITREP</a></li>					
						<li><a data-bs-toggle="modal" data-bs-target="#exampleModal7"><i class="bx bx-right-arrow-alt"></i>Validate SITREP</a></li>					
					</ul>
				</li>
				<!-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">SITREP Analysis</div>
					</a>
					<ul>
						<li><a data-bs-toggle="modal" data-bs-target="#exampleModal4"><i class="bx bx-right-arrow-alt"></i>Year-on-Year Analysis</a></li>
						<li><a data-bs-toggle="modal" data-bs-target="#exampleModal5"><i class="bx bx-right-arrow-alt"></i>Month-on-Month Analysis</a></li>
						<li><a data-bs-toggle="modal" data-bs-target="#exampleModal6"><i class="bx bx-right-arrow-alt"></i>Custom Analysis</a></li>
					</ul>
				</li> -->

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Crime Trends</div>
					</a>
					<ul>
								<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal9">
									<i class="bx bx-line-chart"></i> Generate Yearly Trend
								</button>
								<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#monthlyTrendModal">
									<i class="bx bx-line-chart"></i> Generate Custom Trend
								</button>
					</ul>
				</li>
				<li>
					<a href="{{route('crime.hotspot')}}">
						<div class="parent-icon"><i class="bx bx-cookie"></i>
						</div>
						<div class="menu-title">Crime Hotspots</div>
					</a>
				</li>
				@php  } @endphp

				<!-- I SHALL USE THIS <li></li> ABOVE -->
				@php  if (Auth::user()->email == "greatestwilliams@gmail.com") { @endphp 

				 <li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-menu"></i>
						</div>
						<div class="menu-title">Manage Admin</div>
					</a>
					<ul>
							<li> <a href="{{route('register.analyst')}}"><i class="bx bx-right-arrow-alt"></i>Register Analysts</a>
							</li>
						
							<li> <a href="{{route('active.analyst')}}"><i class="bx bx-right-arrow-alt"></i>Active Analysts</a>
							</li>
							<li> <a href="{{route('inactive.analyst')}}"><i class="bx bx-right-arrow-alt"></i>In-active Analysts</a>
							</li>
							<li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Orders</a>
							</li>
					</ul>
				 </li>
				@php  } @endphp

       












				<!-- <li class="menu-label">UI Elements</li>
			
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">eCommerce</div>
					</a>
					<ul>
						<li> <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>Products</a>
						</li>
						<li> <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>Product Details</a>
						</li>
						<li> <a href="ecommerce-add-new-products.html"><i class="bx bx-right-arrow-alt"></i>Add New Products</a>
						</li>
						<li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Orders</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Components</div>
					</a>
					<ul>
						<li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Alerts</a>
						</li>
						<li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Accordions</a>
						</li>
						<li> <a href="component-badges.html"><i class="bx bx-right-arrow-alt"></i>Badges</a>
						</li>
						<li> <a href="component-buttons.html"><i class="bx bx-right-arrow-alt"></i>Buttons</a>
						</li>
						<li> <a href="component-cards.html"><i class="bx bx-right-arrow-alt"></i>Cards</a>
						</li>
						<li> <a href="component-carousels.html"><i class="bx bx-right-arrow-alt"></i>Carousels</a>
						</li>
						<li> <a href="component-list-groups.html"><i class="bx bx-right-arrow-alt"></i>List Groups</a>
						</li>
						<li> <a href="component-media-object.html"><i class="bx bx-right-arrow-alt"></i>Media Objects</a>
						</li>
						<li> <a href="component-modals.html"><i class="bx bx-right-arrow-alt"></i>Modals</a>
						</li>
						<li> <a href="component-navs-tabs.html"><i class="bx bx-right-arrow-alt"></i>Navs & Tabs</a>
						</li>
						<li> <a href="component-navbar.html"><i class="bx bx-right-arrow-alt"></i>Navbar</a>
						</li>
						<li> <a href="component-paginations.html"><i class="bx bx-right-arrow-alt"></i>Pagination</a>
						</li>
						<li> <a href="component-popovers-tooltips.html"><i class="bx bx-right-arrow-alt"></i>Popovers & Tooltips</a>
						</li>
						<li> <a href="component-progress-bars.html"><i class="bx bx-right-arrow-alt"></i>Progress</a>
						</li>
						<li> <a href="component-spinners.html"><i class="bx bx-right-arrow-alt"></i>Spinners</a>
						</li>
						<li> <a href="component-notifications.html"><i class="bx bx-right-arrow-alt"></i>Notifications</a>
						</li>
						<li> <a href="component-avtars-chips.html"><i class="bx bx-right-arrow-alt"></i>Avatrs & Chips</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">Content</div>
					</a>
					<ul>
						<li> <a href="content-grid-system.html"><i class="bx bx-right-arrow-alt"></i>Grid System</a>
						</li>
						<li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Typography</a>
						</li>
						<li> <a href="content-text-utilities.html"><i class="bx bx-right-arrow-alt"></i>Text Utilities</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"> <i class="bx bx-donate-blood"></i>
						</div>
						<div class="menu-title">Icons</div>
					</a>
					<ul>
						<li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Line Icons</a>
						</li>
						<li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>Boxicons</a>
						</li>
						<li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Feather Icons</a>
						</li>
					</ul>
				</li>
			 



				 
			 
			   
				<li class="menu-label">Charts & Maps</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-line-chart"></i>
						</div>
						<div class="menu-title">Charts</div>
					</a>
					<ul>
						<li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
						</li>
						<li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
						</li>
						<li> <a href="charts-highcharts.html"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
						</li>
					</ul>
				</li>
				 
		 
			  
				<li>
					<a href=" " target="_blank">
						<div class="parent-icon"><i class="bx bx-support"></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
				</li> -->
			</ul>
			<!--end navigation-->
		</div>