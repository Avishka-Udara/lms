@extends('admin.layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
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
        @foreach($User as $Users)
        <tr>
            <td>{{$Users->id}}</td>
            <td>{{$Users->name}}</td>
            <td>{{$Users->email}}</td>
            <td>{{$Users->usertype}}</td>
            <td class="text-center">
                <a href="{{ route('User.show', $Users->id)}}" class="btn btn-primary btn-sm">Show</a>
                <a href="{{ route('User.edit', $Users->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('User.destroy', $Users->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection