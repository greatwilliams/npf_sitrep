@extends('sitrep.admin.admin_dashboard')
@section('admin')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{ $active_status }} Analyst Details</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $active_status }} Analyst Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        <form method="post" action="{{ route('activate.analyst') }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="row mb-3">
                                <input type="hidden" name="user_id" value="{{ $inActiveAnalystDetails->id }}">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ $inActiveAnalystDetails->first_name }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"> Last Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="name" class="form-control" value="{{ $inActiveAnalystDetails->last_name }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Analyst Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" class="form-control" value="{{ $inActiveAnalystDetails->email }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Analyst Phone </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone" class="form-control" value="{{ $inActiveAnalystDetails->phone_number }}" readonly />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">State Command</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="state_command" class="form-control" value="{{ $inActiveAnalystDetails->state_origin }}" readonly />
                                </div>
                            </div>




                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contact Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea name="contact_address" class="form-control" id="inputAddress2" placeholder="Vendor Info " rows="3" readonly>{{ $inActiveAnalystDetails->contact_address }}
                                </textarea>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-success px-4" value="Activate Analyst" />
                                </div>
                            </div>
                        </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection