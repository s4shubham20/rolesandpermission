@extends('layouts.admin')
@section('content')
<div class="page-content-wrapper">
    <div class="content-container">
        <div class="page-content">
            <div class="content-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body bg-primary rounded-3">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-12 col-12">
                                        <div class="d-lg-flex justify-content-between align-items-center ">
                                          <div class="d-md-flex align-items-center">
                                            <img src="{{ asset('assets/back/images/user/avatar-2.jpg') }}" alt="Image" class="rounded-circle avatar avatar-xl">
                                            <div class="ms-md-4 mt-3">
                                              <h2 class="text-white fw-600 mb-1">Good {{ $greet }} {{ Auth::user()->name }}, <br></h2>
                                              <p class="text-white"> Here is what’s happening with your projects today:</p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
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
