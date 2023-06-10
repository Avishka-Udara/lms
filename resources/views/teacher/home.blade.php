@extends('layouts.teacherlayout')
@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-9">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $studentCount }}</h3>
                        <p class="card-text">NUMBER OF STUDENTS</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $Assignmentcount }}</h3>
                        <p class="card-text">ONGOING ASSIGNMENTS</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $Coursecount }}</h2>
                        <p class="card-text">NUMBER OF COURCES</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 mt-4">
        <div class="row">
            <div class="col-4">
                <div class="d-grid gap-2">
                    <a href="{{ route('cources.create')}}" class="btn btn-outline-primary">CREATE COURCE</a>
                </div>
            </div>
            <div class="col-4">
                <div class="d-grid gap-2">
                    <a href="{{ route('cources.index')}}" class="btn btn-outline-success">MY COURCES</a>
                  </div>
            </div>
            <div class="col-4">
                <div class="d-grid gap-2">
                    <a href="##" class="btn btn-outline-success">ASSIGNMENTS</a> <!--to be added--->
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection