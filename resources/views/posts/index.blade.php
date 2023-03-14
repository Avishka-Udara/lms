@extends('layouts.postlayout')

@section('content')

<br>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">News</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">{{ __('ALl News') }}</div>
                    <a href="{{ route('posts.create')}}" class="btn btn-outline-primary mb-2">CREATE NEW NEWS</a>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="row">
                            <div class="card-deck">
                            @foreach ($posts as $post)
                                <div class="card ">
                                    <img class="card-img-top" src="/images/{{ $post->image }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->Title }}</h5>
                                        <p class="card-text">{{ Str::limit($post->description, 100) }}</p>
                                        <p class="card-text"><small class="text-muted">Created at : {{ $post->created_at }}</small></p>
                                        <p class="card-text"><small class="text-muted">Updated at : {{ $post->updated_at }}</small></p>
                                    </div>
                                    <div class="card-footer bg-transparent border-success">
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                            <a class="btn btn-outline-primary" href="{{ route('posts.show',$post->id) }}">Show</a>
                                            <a class="btn btn-outline-success" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
