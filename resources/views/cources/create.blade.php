@extends('layouts.courcelayout')

@section('content')

<br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/cources">Cources</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Cource</li>
            </ol>
        </nav>
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New cource') }}</div>
                    <div class="card-body ">
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

                        <form action="{{ route('cources.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 p-4">
                                    <div class="form-group">
                                        <strong>cource_name:</strong>
                                        <input type="text" name="cource_name" class="form-control" placeholder="cource_name" value="{{ old('cource_name') }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 p-4">
                                    <div class="form-group">
                                        <strong>cource_detail:</strong>
                                        <textarea class="form-control" style="height:150px" name="cource_detail" placeholder="cource_detail" value="{{ old('cource_detail') }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 p-4">
                                    <div class="form-group">
                                        <strong>enrollment_key:</strong>
                                        <input type="text" name="enrollment_key" class="form-control" placeholder="enrollment_key" value="{{ old('enrollment_key') }}">
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 p-4">
                                    <div class="form-group">
                                        <strong>Image:</strong>
                                        <input type="file" name="image" class="form-control" placeholder="image">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 p-4">
                                    <div class="form-group">
                                        <strong>year:</strong>
                                        <input type="text" name="year" class="form-control" placeholder="year" value="{{ old('year') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 p-4">
                                    <div class="form-group">
                                        <strong>semester:</strong>
                                        <input type="text" name="semester" class="form-control" placeholder="semester" value="{{ old('semester') }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center  p-4">
                                    <button type="submit" class="btn btn-outline-primary col-12">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
