@extends('layouts.adminlayout')
@section('content')
<div class="row justify-content-center mt-3">
<div class="col-md-5">
    <div class="card push-top">
        <div class="card-header">
            Add User
        </div>
        <div class="card-body mt-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('User.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" />
                </div>
                <div class="form-group  mt-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" />
                </div>
                <div class="form-group  mt-3">
                  <label for="usertype">User Type</label>
                  <br>
                  <select name="usertype" id="usertype" class="col-12">
                      <option value="">Select user type</option>
                      <option value="0">Student</option>
                      <option value="1">Admin</option>
                      <option value="2">Teacher</option>
                  </select>
                </div>
                <div class="form-group  mt-3">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" />
                </div>
                <div class="col-12 mt-3">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-outline-primary">Create User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
