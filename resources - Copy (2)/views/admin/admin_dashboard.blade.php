@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-6">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
             <div class="card-body">
                <a href="{{ route('a.vehicle.verify')}}">
                    <div class="d-flex align-items-center">
                       <h5 class="mb-0 text-white">
                            @foreach($number_awaiting_verification as $item)
                             {{$item->total}}
                            @endforeach
                        </h5>
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Awaiting Verification</p>
                        {{-- <p class="mb-0 ms-auto">+4.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                    </div>
                </a>

            </div>
          </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-orange">
            <div class="card-body">
                <a href="{{ route('a.awaiting.approval')}}">
                    <div class="d-flex align-items-center">
                       <h5 class="mb-0 text-white">
                            @foreach($number_awaiting_approval as $item)
                             {{$item->total}}
                            @endforeach
                        </h5>
                        <div class="ms-auto">
                            <i class='bx bx-box fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Awaiting Approval</p>
                    </div>
                </a>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-warning">
            <div class="card-body">
                <a href="{{ route('a.not.verified')}}">
                    <div class="d-flex align-items-center">
                       <h5 class="mb-0 text-white">
                            @foreach($number_not_verified as $item)
                             {{$item->total}}
                            @endforeach
                        </h5>
                        <div class="ms-auto">
                            <i class='bx bx-group fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Verification Denied</p>
                    </div>
                </a>
            </div>
        </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-success">
             <div class="card-body">
                <a href="{{ route('a.approval.granted')}}">
                    <div class="d-flex align-items-center">
                       <h5 class="mb-0 text-white">
                            @foreach($number_approved as $item)
                             {{$item->total}}
                            @endforeach
                        </h5>
                        <div class="ms-auto">
                            <i class='bx bx-envelope fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Successful Approvals</p>
                    </div>
                </a>
            </div>
         </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
             <div class="card-body">
                <a href="{{ route('a.approval.failed')}}">
                    <div class="d-flex align-items-center">
                       <h5 class="mb-0 text-white">
                            @foreach($failed_approved as $item)
                             {{$item->total}}
                            @endforeach
                        </h5>
                        <div class="ms-auto">
                            <i class='bx bx-envelope fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Failed Approvals</p>
                    </div>
                </a>
            </div>
         </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
             <div class="card-body">
                <a href="{{ route('a.approval.denied')}}">
                    <div class="d-flex align-items-center">
                       <h5 class="mb-0 text-white">
                            @foreach($number_denied as $item)
                             {{$item->total}}
                            @endforeach
                        </h5>
                        <div class="ms-auto">
                            <i class='bx bx-envelope fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0"> Approvals Denied</p>
                    </div>
                </a>
            </div>
         </div>
        </div>
    </div><!--end row-->    


    {{-- Charts Row --}}
    <div class="chartBox">
        <canvas id="myChart"></canvas>
    </div>


    @php

            foreach ($number_state as $item) {
                 $state_name[] = $item->request_state; 
                 $state_total[] = $item->total; 
              }
    @endphp
      
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        //SetUp Block
        const data = {
            labels  : {!! json_encode($state_name) !!},

            datasets: [{
                label: '# of Votes',
                data:  {!! json_encode($state_total) !!},

                borderWidth: 1
            }]
        };

        //  Config Block 
        const config = {
            type: 'bar',
            data,
            options: {
                indexAxis: 'y',
            }
        };

        //  Render Block 
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
      

    
</div>
@endsection('admin')
