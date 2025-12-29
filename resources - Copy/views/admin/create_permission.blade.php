@extends('admin.admin_master')
@section('admin')
<!-- Page Header-->
<header class="page-header-ui page-header-ui-light bg-white">
    <div class="page-header-ui-content pt-5">
        <div class="container px-5">
            
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <h5 class="mb-0 text-uppercase">Create Permission</h5>
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <form method="POST" action="{{ route('store.permission') }}">
                            @csrf
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="card-title d-flex align-items-center">
                                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                        </div>
                                        <h6 class="mb-0 text-primary">State / Formation Permission Registration Form</h6>
                                    </div>
                                    <hr/>
                                    <div class="row mb-3">
                                        <label for="inputEnterYourName" class="col-sm-3 col-form-label">State/ Formation Permission</label>
                                        <div class="col-sm-9">
                                            <x-text-input id="request_state" class="form-control" type="text" name="request_state" :value="old('request_state')" required autofocus autocomplete="request_state" placeholder="Enter State / Formation" />
                                            <x-input-error :messages="$errors->get('request_state')" class="mt-2 text-danger" />
                                        </div>
                                    </div>
                                   
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary px-5">Create State Permission</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-12 mx-auto">
                    <hr/>
                    <div class="card border-top border-0 border-4 border-primary">
                        <h3>State Permissions :
                            @foreach ($permissions as $permission)
                                    <a href="{{url('admin.edit.permission', ['id' => $permission->id])}}" >
                                        @if ($permission->permission_status == 'assigned')
                                            <span class="float badge bg-danger" style="font-size: small" > {{ $permission->request_state}} &nbsp;</span> 
                                        @else
                                            <span class="float badge bg-primary" style="font-size: small" > {{ $permission->request_state}} &nbsp;</span> 
                                        @endif
                                    </a>
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