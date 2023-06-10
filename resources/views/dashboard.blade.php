@extends('layouts.userlayout')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-9">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $enrolledCount }}</h3>
                            <p class="card-text">ENROLLED COURCES</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $Assignmentcount }}</h3>
                            <p class="card-text">ONGOIING ASSIGNMENT</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $Postcount }}</h3>
                            <p class="card-text">NEWS/NOTICES</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 mt-4">
            <div class="row">
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('allcources.index')}}" class="btn btn-outline-primary">ENROLL NEW COURCE</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('cources.index')}}" class="btn btn-outline-success">MY COURCES</a>
                      </div>
                </div>
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('cources.index')}}" class="btn btn-outline-success">SUBMIT ASSIGNMENT</a>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
