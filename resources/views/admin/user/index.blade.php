@extends('layouts.admin')
@section('content')
<div class="page-content-wrapper">
    <div class="content-container">
        <div class="page-content">
            <div class="content-header">
                <h1>Users</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- { form-element } start -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>Users List</h5>
                                    <a href="{{ route('user.create') }}" class="btn btn-info"><i data-feather="plus-square"></i> Add New Records</a>
                                </div>
                                <div class="card-body my-3">
                                    <table class="table table-bordered table-hover" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Assign Role</th>
                                                <th>Assign Permission</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>
                                                    <h4>
                                                        @foreach ($item->getRoleNames() as $list)
                                                            <span class="badge rounded-pill bg-warning">{{ $list }}</span>
                                                        @endforeach
                                                    </h4>
                                                </td>
                                                <td>
                                                    <h4>
                                                        @foreach ($item->getAllPermissions() as $list)
                                                            <span class="badge rounded-pill bg-warning">{{ $list->name }}</span>
                                                        @endforeach
                                                    </h4>
                                                </td>
                                                <td>{{ $item->created_at }}</td>
                                                @php
                                                    $eid = Crypt::encrypt($item->id);
                                                @endphp
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('user.edit', $eid) }}" class="btn btn-info"><i class="ti ti-edit"></i></a>
                                                        <form action="{{ route('user.destroy', $eid) }}" method="post">
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
