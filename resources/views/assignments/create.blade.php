@extends('layouts.Courcelayout')

@section('content')
 <br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/cources">Cources</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cources.assignments.index', $cource->id) }}">Assignment</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Assignment</li>
            </ol>
        </nav>

        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Create Assignment') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cources.assignments.store', $cource->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>

                                <div class="col-md-6">
                                    <input id="file" type="file" class="form-control-file @error('file') is-invalid @enderror" name="file" required>

                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="due_date" class="col-md-4 col-form-label text-md-right">{{ __('Duedate') }}</label>

                                <div class="col-md-6">
                                    <input id="due_date" type="text" class="form-control @error('due_date') is-invalid @enderror" name="due_date" value="{{ old('due_date') }}" required autocomplete="due_date" autofocus>

                                    @error('due_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>

                                <div class="col-xs-12 col-sm-12 col-md-12  p-4">
                                    <button type="submit" class="btn btn-outline-primary col-10">
                                        {{ __('Create Assignment') }}
                                    </button>
                                </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
