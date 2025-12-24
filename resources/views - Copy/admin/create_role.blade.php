@extends('admin.admin_master')
@section('admin')
<!-- Page Header-->
<header class="page-header-ui page-header-ui-light bg-white">
    <div class="page-header-ui-content pt-5">
        <div class="container px-5">
            
            <div class="row">
                @php  if (Auth::user()->email == "greatestwilliams@gmail.com") { @endphp 
                    <div class="col-xl-9 mx-auto">
                        <h5 class="mb-0 text-uppercase">Assign Role</h5>
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                            <form method="POST" action="{{ route('store.role') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="card-title d-flex align-items-center">
                                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                            </div>
                                            <h6 class="mb-0 text-primary">Assign Role Form</h6>
                                        </div>
                                        <hr/>
                                        <div class="row mb-3">
                                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Admin</label>
                                            <div class="col-sm-9">
                                                <select class="form-select mb-3" aria-label="Default select example" name="user_id">
                                                    <!-- <option selected="">Select Admin</option> -->
                                                    @foreach($admin as $item)	
                                                    <option value="{{ $item->id }}">{{ $item->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>  
                                        

                                        
                                        <div class="row mb-3">
                                            <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Permission</label>
                                            <div class="col-sm-9">
                                                <select class="form-select mb-3" aria-label="Default select example" name="state_permissions">
                                                    <!-- <option selected="">Select Permission</option> -->
                                                    @foreach($permissions as $state_permission)	
                                                    <option value="{{ $state_permission->id }}" >{{ $state_permission->request_state }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>  

                                        

                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary px-5">Add Role</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @php  } @endphp

                    <div class="col-xl-12 mx-auto">
                        <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                                        
                            <h3>Admin Roles : <br>
                            <hr/>

                                @foreach ($admin as $item)
                                        <a  >
                                                <span class="float badge bg-primary" style="font-size: large" > {{ $item->last_name}} &nbsp;</span> 
                                        </a> :

                                        @php
                                            $role_permission =  App\Models\Admin_role::where('user_id', $item->id)->get();
                                        @endphp


                                        @foreach ($role_permission as $permission)
                                            @php  if (Auth::user()->email == "greatestwilliams@gmail.com") { @endphp 
                                                <a href="{{route('remove.permission', $permission->id)}}" >
                                                    <span class="float badge bg-danger" style="font-size: small" > {{ $permission->state_permissions}} &nbsp;</span> 
                                                </a> 
                                            @php  } @endphp

                                            @php  if (Auth::user()->email != "greatestwilliams@gmail.com") { @endphp 
                                                <a>
                                                    <span class="float badge bg-danger" style="font-size: small" > {{ $permission->state_permissions}} &nbsp;</span> 
                                                </a> 
                                            @php  } @endphp
                                        @endforeach
                                <br>
                                @endforeach
                            </h3>
                        </div>
                    </div>

            </div>
            <!--end row-->
        </div>
    </div>
</header>
@endsection