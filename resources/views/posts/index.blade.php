@extends('layouts.postlayout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right p-3 pt-5">
                <a class="btn btn-outline-primary" href="{{ route('posts.create') }}"> Create New post</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">description</th>
                <th scope="col" width = "250px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)

        <tr class="mt-5">
            <td class="badge badge-pill badge-secondary" >{{ ++$i }}</td>
            <td><img src="/images/{{ $post->image }}" width="100px"></td>
            <td class="h4">{{ $post->Title }}</td>
            <td>{{ $post->description }}</td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    <a class="btn btn-outline-primary" href="{{ route('posts.show',$post->id) }}">Show</a>
                    <a class="btn btn-outline-success" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {!! $posts->links() !!}

@endsection
