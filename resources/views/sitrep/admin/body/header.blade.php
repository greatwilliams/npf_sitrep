<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <!-- Hamburger menu toggle for mobile -->
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            
            <!-- Search bar -->
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search...">
                    <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                </div>
            </div>
            
            <!-- User profile dropdown -->
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
                    <li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user"></i><span>Profile</span></a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.change.password') }}"><i class="bx bx-cog"></i><span>Change Password</span></a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class='bx bx-home-circle'></i><span>Dashboard</span></a></li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- All your modals remain the same -->
<!-- ... -->
<!-- DAILY SITREP MODAL -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Daily SITREP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('daily.report')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="inputEmail3" class="col-form-label">Date</label>
                    <input type="date" class="form-control" name="date_from" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate Record</button>
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
                <h5 class="modal-title">Generate Monthly SITREP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('monthly.report')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="inputEmail3" class="col-form-label">Select Month</label>
                    <input type="month" class="form-control" name="date_from2" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- MONTHLY SITREP MODAL ENDS -->

<!-- CUSTOM SITREP MODAL -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Custom SITREP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('custom.report')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="inputEmail3" class="col-form-label">From</label>
                    <input type="date" class="form-control" name="date_from" required>
                </div>
                <div class="modal-body">
                    <label for="inputEmail3" class="col-form-label">To</label>
                    <input type="date" class="form-control" name="date_to" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- CUSTOM SITREP MODAL ENDS -->

<!-- VALIDATE SITREP MODAL -->
<div class="modal fade" id="exampleModal7" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Daily SITREP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('validate.report')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="inputEmail3" class="col-form-label">Date</label>
                    <input type="date" class="form-control" name="date_from" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate Record</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- VALIDATE SITREP MODAL ENDS -->

<!-- YEAR ON YEAR SITREP MODAL -->
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
                    <label for="inputEmail3" class="col-form-label">Year 1</label>
                    <input type="number" class="form-control" name="date_from" id="year_input1" placeholder="YYYY" min="1900" max="2100" required>
                </div>
                <div class="modal-body">
                    <label for="inputEmail3" class="col-form-label">Year 2</label>
                    <input type="number" class="form-control" name="date_to" id="year_input2" placeholder="YYYY" min="1900" max="2100" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Analyse Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- YEAR ON YEAR SITREP MODAL ENDS -->

<!-- MONTH ON MONTH SITREP MODAL -->
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
                    <label for="inputEmail3" class="col-form-label">Month 1</label>
                    <input type="month" class="form-control" name="date_from" id="month_input1" placeholder="Enter Month" required>
                </div>
                <div class="modal-body">
                    <label for="inputEmail3" class="col-form-label">Month 2</label>
                    <input type="month" class="form-control" name="date_to" id="month_input2" placeholder="Enter Month" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Analyse Report</button>
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
                <h5 class="modal-title">Generate Yearly Trends</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('yearly.trends')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="inputEmail3" class="col-form-label">Select Year</label>
                    <select class="form-control" name="date_from" id="year_picker" required>
                        <option value="" disabled selected>Select Year</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- YEARLY SITREP Trends ENDS -->

<!-- CUSTOM TRENDS MODAL -->
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
                    <label for="inputEmail3" class="col-form-label">From</label>
                    <input type="date" class="form-control" name="date_from" required>
                </div>
                <div class="modal-body">
                    <label for="inputEmail3" class="col-form-label">To</label>
                    <input type="date" class="form-control" name="date_to" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Generate Custom Trends</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- CUSTOM TRENDS MODAL ENDS -->

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
                            @for($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>
                    </div>
                    
                    <!-- End Month Selection -->
                    <div class="mb-3">
                        <label class="form-label">End Month</label>
                        <select class="form-control" name="end_month" id="end_month" required>
                            <option value="" disabled selected>Select End Month</option>
                            @for($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>
                    </div>
                    
                    <!-- Year Selection -->
                    <div class="mb-3">
                        <label class="form-label">Select Year</label>
                        <select class="form-control" name="year" id="year_picker" required>
                            <option value="" disabled selected>Select Year</option>
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

<style>
    /* Mobile sidebar styles */
    @media (max-width: 768px) {
        .sidebar-wrapper {
            position: fixed;
            top: 0;
            left: -280px;
            width: 280px;
            height: 100vh;
            z-index: 1050;
            transition: left 0.3s ease;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        
        .sidebar-wrapper.open {
            left: 0;
        }
        
        .page-wrapper {
            transition: margin-left 0.3s ease;
        }
        
        .page-wrapper.sidebar-open {
            margin-left: 280px;
        }
        
        .overlay.toggle-icon {
            display: none;
        }
        
        .overlay.toggle-icon.show {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1049;
        }
        
        .mobile-toggle-menu {
            cursor: pointer;
            font-size: 24px;
            padding: 10px;
            z-index: 1051;
        }
        
        /* Adjust header for mobile */
        .topbar {
            padding: 10px;
        }
        
        .search-bar {
            margin: 0 10px;
        }
        
        .user-info {
            display: none;
        }
    }
    
    /* Mobile table optimizations */
    @media (max-width: 768px) {
        .vertical-header {
            writing-mode: vertical-lr;
            transform: rotate(180deg);
            white-space: nowrap;
            height: 150px;
            vertical-align: middle;
            padding: 5px !important;
            font-size: 12px;
            background-color: #f8f9fa;
        }
        
        .compact-table {
            font-size: 11px !important;
        }
        
        .compact-table td {
            padding: 5px 3px !important;
        }
        
        .table-responsive {
            border: 1px solid #dee2e6;
        }
        
        /* Make summary table S/N column 5% */
        #example2 th:first-child,
        #example2 td:first-child {
            width: 5% !important;
            min-width: 40px;
            max-width: 50px;
        }
        
        #example2 th:nth-child(2),
        #example2 td:nth-child(2) {
            width: 95% !important;
        }
        
        .incident-cell {
            line-height: 1.3;
            font-size: 11px;
        }
        
        .state-date-row {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
            padding-bottom: 5px;
            border-bottom: 1px solid #eee;
        }
    }
</style>

<!-- Mobile sidebar toggle script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile sidebar toggle
    const mobileToggleMenu = document.querySelector('.mobile-toggle-menu');
    const sidebarWrapper = document.querySelector('.sidebar-wrapper');
    const pageWrapper = document.querySelector('.page-wrapper');
    const overlay = document.querySelector('.overlay.toggle-icon');
    
    if (mobileToggleMenu && sidebarWrapper) {
        mobileToggleMenu.addEventListener('click', function(e) {
            e.preventDefault();
            sidebarWrapper.classList.toggle('open');
            pageWrapper.classList.toggle('sidebar-open');
            
            // Toggle overlay
            if (overlay) {
                overlay.classList.toggle('show');
            }
        });
        
        // Close sidebar when clicking overlay
        if (overlay) {
            overlay.addEventListener('click', function() {
                sidebarWrapper.classList.remove('open');
                pageWrapper.classList.remove('sidebar-open');
                overlay.classList.remove('show');
            });
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                if (sidebarWrapper.classList.contains('open') && 
                    !event.target.closest('.sidebar-wrapper') && 
                    !event.target.closest('.mobile-toggle-menu') &&
                    !event.target.closest('.overlay')) {
                    sidebarWrapper.classList.remove('open');
                    pageWrapper.classList.remove('sidebar-open');
                    if (overlay) {
                        overlay.classList.remove('show');
                    }
                }
            }
        });
    }
});
</script>

<style>
    /* Mobile sidebar styles */
    @media (max-width: 768px) {
        .sidebar-wrapper {
            position: fixed;
            top: 0;
            left: -280px;
            width: 280px;
            height: 100vh;
            z-index: 1050;
            transition: left 0.3s ease;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        
        .sidebar-wrapper.open {
            left: 0;
        }
        
        .overlay.toggle-icon.show {
            display: block !important;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1049;
        }
        
        .mobile-toggle-menu {
            cursor: pointer;
            font-size: 24px;
            padding: 10px;
        }
    }
</style> 