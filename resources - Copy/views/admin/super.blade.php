@extends('admin.dashboard_master')
@section('admin')
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-6">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
             <div class="card-body">
                <a href="{{ route('super.vehicle.verify')}}">
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
                <a href="{{ route('super.awaiting.approval')}}">
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
                <a href="{{ route('super.not.verified')}}">
                    <div class="d-flex align-items-center">
                       <h5 class="mb-0 text-white">
                            @foreach($number_not_eligible as $item)
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
                <a href="{{ route('super.approval.granted')}}">
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
                <a href="{{ route('super.approval.failed')}}">
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
                <a href="{{ route('super.approval.denied')}}">
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

   <div class="card radius-10">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="mb-0">

                    @if ($request_from == null)
                    All Requests                         
                    @else

                    @php
                    $date_from = date_create($request_from);
                    $date_to = date_create($request_to);
                    @endphp

                    Requests From {{ date_format($date_from,"jS F, Y") }} -to- {{ date_format($date_to,"jS F, Y") }}
                    @endif
                    </h5>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-12 col-lg-8 col-xl-8 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h6 class="mb-0">Tinted Issued Bar Chart</h6>
                            </div>
                            <hr>
                            <div>
                                <canvas id="myChart" width="1000px" height="800px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-12 col-lg-4 col-xl-4 d-flex">
                <div class="card radius-10 overflow-hidden w-100">
                    <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Tinted Issued per State</h6>
                        </div>
                        <hr>
                        <div class="font-22 ms-auto text-white"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                    </div>
                    <div class="table-responsive">
                   
                    <table id="example5" class="table table-bordered table-striped">
                        <thead class="text-dark">
                        <tr>
                          <th>S/N</th>
                          <th>State Commands</th>
                          <th>Number of Requests</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach($number_state as $item)
                            <tr>                    
                              <td>{{$i=$i+1}}</td>                                                
                              <td> {{ $item->request_state }} </td>
                              <td> {{ $item->total }} </td>
                            </tr>   
                            @endforeach
                            <tfoot>
                              <tr>
                                <td></td>
                                <th>Total Requests</th>
                                <th>{{ $total_state }}</th>
                              </tr> 
                            </tfoot>
                    </table>
    
    
                    </div>
                </div>
            </div>
        </div><!--End Row-->
    </div>
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
            label: '# of Tinted',
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
  
{{-- End of Charts Row --}}

    
</div>
@endsection('admin')
