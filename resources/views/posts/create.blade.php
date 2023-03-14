@extends('layouts.postlayout')
@section('content')

<br>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/posts">News</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Create New News') }}</div>
                
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-md-center">
                            <div class="col-md-10  pt-4">
                                <div class="form-control-lg">
                                    <input type="text" name="Title" class="form-control" placeholder="Title">
                                </div>
                                <div class="form-control-lg">
                                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
                                </div>

                                <div class="form-control-lg pt-3">
                                    <label for="exampleFormControlFile1">Chose your image</label><br>
                                    <input type="file" name="image" class="form-control-file" placeholder="image">
                                </div>


                                <div class=" pt-3 text-center form-control-lg">
                                    <button type="submit" class="btn btn-outline-primary col-12">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
