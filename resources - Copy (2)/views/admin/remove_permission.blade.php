@extends('admin.admin_master')
@section('admin')
<!-- Page Header-->
<header class="page-header-ui page-header-ui-light bg-white">
    <div class="page-header-ui-content pt-5">
        <div class="container px-5">
            
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h5 class="mb-0 text-uppercase">Assign Role</h5>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <form method="POST" action="{{ route('update.permission') }}">
                            @csrf
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h6 class="mb-0 text-primary">Remove State Permission </h6>
                                    </div>
                                    <hr/>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Admin</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $UserData->last_name }}" readonly>
                                        </div>
                                    </div>  

                                    

                                    @foreach ( $PermissionData as $permission )

                                        
                                        
                                    @endforeach

                                    <input type="hidden" value="{{ $UserData->id }}"  name="user_id"  > 
                                    <input type="hidden" value="{{ $Admin_role->id }}"  name="role_id"  > 
                                    <input type="hidden" value="{{ $permission->id }}"  name="permission_id"  >

                                    

                                    
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Permission</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $permission->request_state }}"  readonly>
                                        </div>
                                    </div>  

                                    

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-5">Remove State Permission</button>
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