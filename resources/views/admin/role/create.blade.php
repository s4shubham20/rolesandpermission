@extends('layouts.admin')
@section('content')
<div class="page-content-wrapper">
    <div class="content-container">
        <div class="page-content">
            <div class="content-header">
                <h1>Role</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- { form-element } start -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>Add Role</h5>
                                </div>
                                <div class="card-body my-3">
                                    <form method="post" action="{{ route('role.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name here !" value="{{ old('name') }}"/>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="permission">Assign Permission</label>
                                                    <select id="multiple-select-custom" name="permission[]" id="permission" class="form-select" multiple data-placeholder="Choose multiple option">
                                                        @foreach ($permission as $item)
                                                            <option value="{{ $item->id }}" {{ old('permission') ? "selected":"" }}>{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('permission')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary">Submit</button>
                                                <a href="{{ Request::url('previous') }}" class="btn btn-warning">Back</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- { form-element } start -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>Role List</h5>
                                </div>
                                <div class="card-body my-3">
                                    <table class="table table-bordered table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Assigned Permission</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($role as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <h4>
                                                    @foreach ($item->getPermissionNames() as $list)
                                                            <span class="badge rounded-pill bg-warning">{{ $list }}</span>
                                                    @endforeach
                                                    </h4>
                                                </td>
                                                <td>{{ $item->created_at }}</td>
                                                @php
                                                    $eid = Crypt::encrypt($item->id);
                                                @endphp
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('role.edit', $eid) }}" class="btn btn-info"><i class="ti ti-edit"></i></a>
                                                        <form action="{{ route('role.destroy', $eid) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return DeleteConfirmation('');" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

