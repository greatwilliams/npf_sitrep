@extends('admin.admin_master')
@section('admin')
<!-- Page Header-->
<header class="page-header-ui page-header-ui-light bg-white">
    <div class="page-header-ui-content pt-5">
        <div class="container px-5">
            
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h5 class="mb-0 text-uppercase">Analysts Registration</h5>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <form method="POST" action="{{ route('store.analyst') }}">
                            @csrf
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h6 class="mb-0 text-primary">Analysts Registration Form</h6>
                                    </div>
                                    <hr/>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Rank</label>
                                        <div class="col-sm-9">
                                            <x-text-input id="first_name" class="form-control" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" placeholder="Enter Your first_Name" />
                                            <x-input-error :messages="$errors->get('first_name')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">Full Name</label>
                                        <div class="col-sm-9">
                                            <x-text-input id="last_name" class="form-control" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" placeholder="Enter Your last_Name" />
                                            <x-input-error :messages="$errors->get('last_name')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPhoneNo2" class="col-sm-3 col-form-label">Phone No</label>
                                        <div class="col-sm-9">
                                            <x-text-input id="phone_number" class="form-control" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" placeholder="Phone No" />
                                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2 text-danger" />
                                        
                                        </div>
                                    </div>
                                     <div class="row mb-3">
                                        <label for="inputAddress4" class="col-sm-3 col-form-label">AP Number</label>
                                        <div class="col-sm-9">
                                            <x-text-input id="contact_address" class="form-control" type="text" name="contact_address" :value="old('contact_address')" required autofocus autocomplete="contact_address" placeholder="Contact Address" />
                                        <x-input-error :messages="$errors->get('contact_address')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Email Address </label>
                                        <div class="col-sm-9">
                                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email Address"/>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                        
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Admin Role Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-select mb-3" aria-label="Default select example" name="role">
                                                <option selected="">Select Admin</option>
                                                <option value="state_admin" selected="">State Admin</option>
                                                <option value="admin">Federal Admin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">State Command</label>
                                        <div class="col-sm-9">
                                            <select class="form-select mb-3" aria-label="Default select example" name="state_command">
                                                <option value="" selected="selected">- Select -</option>
                                                <option value="FCT">FCT</option>
                                                <option value="Abia">Abia</option>
                                                <option value="Adamawa">Adamawa</option>
                                                <option value="Akwa Ibom">Akwa Ibom</option>
                                                <option value="Anambra">Anambra</option>
                                                <option value="Bauchi">Bauchi</option>
                                                <option value="Bayelsa">Bayelsa</option>
                                                <option value="Benue">Benue</option>
                                                <option value="Borno">Borno</option>
                                                <option value="Cross River">Cross River</option>
                                                <option value="Delta">Delta</option>
                                                <option value="Ebonyi">Ebonyi</option>
                                                <option value="Edo">Edo</option>
                                                <option value="Ekiti">Ekiti</option>
                                                <option value="Enugu">Enugu</option>
                                                <option value="Gombe">Gombe</option>
                                                <option value="Imo">Imo</option>
                                                <option value="Jigawa">Jigawa</option>
                                                <option value="Kaduna">Kaduna</option>
                                                <option value="Kano">Kano</option>
                                                <option value="Katsina">Katsina</option>
                                                <option value="Kebbi">Kebbi</option>
                                                <option value="Kogi">Kogi</option>
                                                <option value="Kwara">Kwara</option>
                                                <option value="Lagos">Lagos</option>
                                                <option value="Nassarawa">Nassarawa</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Ogun">Ogun</option>
                                                <option value="Ondo">Ondo</option>
                                                <option value="Osun">Osun</option>
                                                <option value="Oyo">Oyo</option>
                                                <option value="Plateau">Plateau</option>
                                                <option value="Rivers">Rivers</option>
                                                <option value="Sokoto">Sokoto</option>
                                                <option value="Taraba">Taraba</option>
                                                <option value="Yobe">Yobe</option>
                                                <option value="Zamfara">Zamfara</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <!--<label for="inputChoosePassword2" class="col-sm-3 col-form-label">Default Password</label>-->
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control" id="inputChoosePassword2" placeholder="The Default Password is 'password' " readonly>
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
                                            <button type="submit" class="btn btn-primary px-5">Register Analysts</button>
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