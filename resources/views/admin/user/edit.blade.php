@extends('layouts.admin')
@section('content')
<div class="page-content-wrapper">
    <div class="content-container">
        <div class="page-content">
            <div class="content-header">
                <h1>User</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- { form-element } start -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <h5>Edit User</h5>
                                    <a href="{{ route('user.index') }}" class="btn btn-info"><i data-feather="eye"></i> View Records</a>
                                </div>
                                <div class="card-body my-3">
                                    <form method="post" action="{{ route('user.update', Crypt::encrypt($user->id)) }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name here !" value="{{ old('name', $user->name) }}"/>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email here !" value="{{ old('email', $user->email) }}"/>
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password here !"/>
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="role">Assign Role</label>
                                                    <select id="multiple-select-custom" name="role[]" id="role" class="form-select" data-placeholder="Choose user role">
                                                        @foreach ($role as $item)
                                                            <option value="{{ $item->id }}" @if(in_array($item->id, $user->roles->pluck('id')->toArray())) selected @endif>{{ Str::title($item->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
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
        </div>
    </div>
</div>
@endsection

