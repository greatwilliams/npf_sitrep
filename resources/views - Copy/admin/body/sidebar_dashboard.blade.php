<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('logo/logo.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Tinted Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard')}}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>


        <li class="menu-label">Filter Requests by Date</li>
        <form action="{{ route('dashboard.search')}}" method="POST">
            @csrf
      
        <li> 
            <a>
                <div>
                    <i class='bx bx-arrow-to-right'>From</i>
                    <input type="date" id="from" name="from" class="form-control" required />
                </div>
            </a>
        </li>

        <li> 
            <a>
                <div>
                    <i class='bx bx-arrow-to-left'>To</i>
                    <input type="date" id="to" name="to" class="form-control" required/>
                </div>
            </a>
        </li>

        <li> 
                <div >
                    <i class='bx bx-arrow-to-right'></i>
                    <input type="submit"  class="btn btn-primary px-5 radius-60" value="Filter" />
                    <i class='bx bx-arrow-to-left'></i>

                </div>
        </li>

        </form>

       
        <li class="menu-label"> Manage Analysts </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-edit'></i>
                </div>
                <div class="menu-title">Manage Analysts</div>
            </a>
            <ul>
                <li> <a href="{{route('active.analyst')}}"><i class="bx bx-right-arrow-alt"></i>Active Analysts</a></li>
                <li> <a href="{{route('inactive.analyst')}}"><i class="bx bx-right-arrow-alt"></i>In-active Analysts</a></li>
                <li> <a class="has-arrow" href="{{route('register.analyst')}}"><i class="bx bx-right-arrow-alt"></i>Register Analysts</a></li>

            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">Manage Admin</div>
            </a>
            <ul>
                @php  if (Auth::user()->email == "greatestwilliams@gmail.com") { @endphp 
                    <li> <a class="has-arrow" href="{{route('register.analyst')}}"><i class="bx bx-right-arrow-alt"></i>Register Analysts</a></li>
                    <li> <a class="has-arrow" href="{{route('create.permission')}}"><i class="bx bx-right-arrow-alt"></i>Create Permissions</a> </li>
                @php  } @endphp
                    <li> <a class="has-arrow" href="{{route('create.role')}}"><i class="bx bx-right-arrow-alt"></i>Roles</a></li>

            </ul>
        </li>
       
       
        <li class="menu-label">Verifications & Approvals</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Request Tasks</div>
            </a>
            <ul>
                <li>  <a href="{{ route('a.awaiting.approval')}}"><i class="bx bx-right-arrow-alt"></i>Awaiting Approval</a>
                </li>
                <li> <a href="{{ route('a.not.verified')}}"><i class="bx bx-right-arrow-alt"></i>Verification Denied</a>
                </li>
                <li> <a href="{{ route('a.approval.failed')}}"><i class="bx bx-right-arrow-alt"></i>Failed Approvals</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-map-alt"></i>
                </div>
                <div class="menu-title">Request Treated</div>
            </a>
            <ul>
                <li>  <a href="{{ route('a.approval.granted')}}"><i class="bx bx-right-arrow-alt"></i>Successful Approvals</a>
                </li>
                <li> <a href="{{ route('a.approval.denied')}}"><i class="bx bx-right-arrow-alt"></i> Approvals Denied</a>
                </li>
            </ul>
        </li>       
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->