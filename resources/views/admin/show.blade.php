@extends('layouts.adminlayout')
@section('content')
<style>

    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">

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
            <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$User->id}}</td>
                <td>{{$User->name}}</td>
                <td>{{$User->email}}</td>
                <td>{{$User->usertype}}</td>
                <td class="d-flex">
                    <a href="{{ route('User.edit', $User->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('User.destroy', $User->id)}}" method="post" class="px-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-warning" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
