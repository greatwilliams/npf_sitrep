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

                        <form method="post" action="{{ route('deactivate.analyst') }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="row mb-3">
                                <input type="hidden" name="user_id" value="{{ $ActiveAnalystDetails->id }}">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">First Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ $ActiveAnalystDetails->first_name }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0"> Last Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="name" class="form-control" value="{{ $ActiveAnalystDetails->last_name }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Analyst Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" name="email" class="form-control" value="{{ $ActiveAnalystDetails->email }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Analyst Phone </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="phone" class="form-control" value="{{ $ActiveAnalystDetails->phone_number }}" readonly />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">State Command</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="state_command" class="form-control" value="{{ $ActiveAnalystDetails->state_origin }}" readonly />
                                </div>
                            </div>




                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Contact Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea name="contact_address" class="form-control" id="inputAddress2" placeholder="Vendor Info " rows="3" readonly>{{ $ActiveAnalystDetails->contact_address }}
                                </textarea>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-danger px-4" value="De-activate Analyst" />
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