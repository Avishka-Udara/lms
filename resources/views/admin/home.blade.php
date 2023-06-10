@extends('layouts.adminlayout')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-9">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $userCount }}</h3>
                            <p class="card-text">Number of Users</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $TeacherCount }}</h3>
                            <p class="card-text">Number of Teachers</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $Coursecount }}</h3>
                            <p class="card-text">Number of Courses</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 mt-4">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $Assignmentcount }}</h3>
                            <p class="card-text">Number of Assignments</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $Postcount }}</h3>
                            <p class="card-text">Posted News/Notices</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">00</h3>
                            <p class="card-text">Messages</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 mt-4">
            <div class="row">
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('User.create')}}" class="btn btn-outline-primary">ADD NEW USER</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('User.index')}}" class="btn btn-outline-success">MANAGE USERS</a>
                      </div>
                </div>
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('posts.create')}}" class="btn btn-outline-success">ADD NEW NOTICE</a>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
