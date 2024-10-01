@extends('layouts.admin_layout')

    @section('title') Dashboard @endsection
    
    @section('content')

    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Role Permission</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript:;">
                                        <i class="bx bx-home-alt"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Assign Permissions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            <!--end breadcrumb-->

            <div class="row g-3">
                <div class="col-auto">
                </div>
                <div class="col-auto flex-grow-1 overflow-auto">
                </div>
                <div class="col-auto">
                    <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                        <a class="btn btn-primary px-4" href="{{ route('roles') }}"><i class="fadeIn animated bx bx-arrow-back"></i>Back</a>
                    </div>
                </div>
            </div><!--end row-->

            <div class="card mt-4">
                <div class="card-body">
                    <form class="custom-validation" action="{{ route('role.give-permissions', ['roleId' => $role->id]) }}" method="post">
                        @csrf
                        <div class="">
                            <h4 class="mb-3">Permissions Name</h4>
                            @foreach ($permissions as $item)
                            <div class="form-check form-check-inline">
                                <input 
                                    class="form-check-input" 
                                    name="permission[]" 
                                    id="{{ $item->name}}" 
                                    type="checkbox" 
                                    value="{{ $item->name}}" 
                                    {{ in_array($item->id, $rolePermissions) ? 'checked': '' }}
                                />
                                <label class="form-check-label" for="{{ $item->name}}">{{ $item->name }}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add New Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('permission.create') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="position-relative">
                                <label for="permission-name" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control" id="permission-name" placeholder="Write permission name here..." required="">
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
            @foreach($permissions as $permission)
            <div class="modal fade" id="staticBackdropedit{{ $permission->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add New Role</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('permission.update', ['permissionId' => $permission->id]) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="position-relative">
                                <label for="role-name" class="form-label">Role Name</label>
                                <input type="text" name="name" class="form-control" id="role-name" placeholder="Write Role name here..." value="{{ $permission->name }}" required="">
                                <div class="valid-tooltip">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
            @endforeach

        </div>
    </main>
    @endsection