@extends('layouts.adminlayout')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-9">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">afafasfsdfsdf</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">Tesdfsfsdfxt</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">Textsdfsdfsfsvcvcv cvc</p>
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
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">afafasfsdfsdf</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">Tesdfsfsdfxt</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Title</h3>
                            <p class="card-text">Textsdfsdfsfsvcvcv cvc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 mt-4">
            <div class="row">
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('User.create')}}" class="btn btn-outline-primary">BUTTON</a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('User.create')}}" class="btn btn-outline-success">BUTTON</a>
                      </div>
                </div>
                <div class="col-4">
                    <div class="d-grid gap-2">
                        <a href="{{ route('User.create')}}" class="btn btn-outline-success">BUTTON</a>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
