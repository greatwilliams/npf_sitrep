<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('sitrep/adminbackend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
    </div>
    
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @php if (Auth::user()->state == "FHQ") { @endphp 
        <li>
            <a href="{{route('admin.add.sitrep')}}">
                <div class="parent-icon"><i class="bx bx-cookie"></i></div>
                <div class="menu-title">Add Sitrep</div>
            </a>
        </li>
        @php } @endphp
        
        @php if (Auth::user()->state != "FHQ") { @endphp 
        <li>
            <a href="{{route('state.add.sitrep')}}">
                <div class="parent-icon"><i class="bx bx-cookie"></i></div>
                <div class="menu-title">Add Sitrep</div>
            </a>
        </li>
        @php } @endphp

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                <div class="menu-title">Generate Report</div>
            </a>
            <ul>
                <li><a data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="bx bx-right-arrow-alt"></i>Daily SITREP</a></li>
                @php if (Auth::user()->state == "FHQ") { @endphp 
                <li><a data-bs-toggle="modal" data-bs-target="#exampleModal3"><i class="bx bx-right-arrow-alt"></i>Custom SITREP</a></li>                    
                <li><a data-bs-toggle="modal" data-bs-target="#exampleModal7"><i class="bx bx-right-arrow-alt"></i>Validate SITREP</a></li>                    
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Crime Trends</div>
            </a>
            <ul>
                <li><a data-bs-toggle="modal" data-bs-target="#exampleModal9"><i class="bx bx-right-arrow-alt"></i>Yearly Trend</a></li>
                <li><a data-bs-toggle="modal" data-bs-target="#monthlyTrendModal"><i class="bx bx-right-arrow-alt"></i>Custom Trend</a></li>
            </ul>
        </li>
        
        <li>
            <a href="{{route('crime.hotspot')}}">
                <div class="parent-icon"><i class="bx bx-cookie"></i></div>
                <div class="menu-title">Crime Hotspots</div>
            </a>
        </li>
        @php } @endphp

        @php if (Auth::user()->email == "greatestwilliams@gmail.com") { @endphp 
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-menu"></i></div>
                <div class="menu-title">Manage Admin</div>
            </a>
            <ul>
                <li><a href="{{route('register.analyst')}}"><i class="bx bx-right-arrow-alt"></i>Register Analysts</a></li>
                <li><a href="{{route('active.analyst')}}"><i class="bx bx-right-arrow-alt"></i>Active Analysts</a></li>
                <li><a href="{{route('inactive.analyst')}}"><i class="bx bx-right-arrow-alt"></i>In-active Analysts</a></li>
            </ul>
        </li>
        @php } @endphp
    </ul>
    <!--end navigation-->
</div>