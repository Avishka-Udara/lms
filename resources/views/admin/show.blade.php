@extends('admin.layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    VIEW
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <table class="table">
        <thead>
            <tr class="table-warning">
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>usertype</td>
            <td class="text-center">Action</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$User->id}}</td>
                <td>{{$User->name}}</td>
                <td>{{$User->email}}</td>
                <td>{{$User->usertype}}</td>
                <td class="text-center">
                    <a href="{{ route('User.edit', $User->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('User.destroy', $User->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
  </div>
</div>
@endsection