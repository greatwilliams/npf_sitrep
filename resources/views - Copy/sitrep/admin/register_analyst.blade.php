

@extends('sitrep/admin.admin_dashboard')
@section('admin')

<!-- Page Header-->
<header class="page-header-ui page-header-ui-light bg-white">
    <div class="page-header-ui-content pt-5">
        <div class="container px-5">
            
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h5 class="mb-0 text-uppercase">State Admin Registration</h5>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <form method="POST" action="{{ route('store.analyst') }}">
                            @csrf
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h6 class="mb-0 text-primary">State Admin Registration Form</h6>
                                    </div>
                                    <hr/>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Rank</label>
                                        <div class="col-sm-9">
                                            <x-text-input id="rank" class="form-control" type="text" name="rank" :value="old('rank')" required autofocus autocomplete="rank" placeholder="Enter Your rank" />
                                            <x-input-error :messages="$errors->get('rank')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <x-text-input id="full_name" class="form-control" type="text" name="full_name" :value="old('full_name')"  autofocus autocomplete="full_name" placeholder="Enter Your full_Name" />
                                            <x-input-error :messages="$errors->get('full_name')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                                        <div class="col-sm-9">
                                            <x-text-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" placeholder="Phone No" />
                                            <x-input-error :messages="$errors->get('phone')" class="mt-2 text-danger" />
                                        
                                        </div>
                                    </div>
                                     <div class="row mb-3">
                                        <label for="inputAddress4" class="col-sm-3 col-form-label">AP Number</label>
                                        <div class="col-sm-9">
                                            <x-text-input id="ap_number" class="form-control" type="text" name="ap_number" :value="old('ap_number')" required autofocus autocomplete="ap_number" placeholder="AP Number" />
                                        <x-input-error :messages="$errors->get('ap_number')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address </label>
                                        <div class="col-sm-9">
                                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email Address"/>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                        
                                        </div>
                                    </div>

                                    <!-- <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Admin Role Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-select mb-3" aria-label="Default select example" name="role">
                                                <option selected="">Select Admin</option>
                                                <option value="vendor" selected="">State Admin</option>
                                                <option value="admin">Federal Admin</option>
                                            </select>
                                        </div>
                                    </div> -->

                                     <x-text-input type="hidden" name="role"  value="admin"/>

                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">State Command</label>
                                        <div class="col-sm-9">
                                            <select class="form-select mb-3" aria-label="Default select example" name="state">
                                                <option value="" selected="selected">- Select -</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <!--<label for="inputChoosePassword2" class="col-sm-3 col-form-label">Default Password</label>-->
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control" id="inputChoosePassword2" readonly>
                                        </div>
                                    </div>
                                   
                                   
                                    <!--<div class="row mb-3">-->
                                    <!--    <label for="inputAddress4" class="col-sm-3 col-form-label"></label>-->
                                    <!--    <div class="col-sm-9">-->
                                    <!--        <div class="form-check">-->
                                    <!--            <input class="form-check-input" type="checkbox" id="gridCheck4">-->
                                    <!--            <label class="form-check-label" for="gridCheck4">Check me out</label>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-5">Register State Admin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</header>
@endsection