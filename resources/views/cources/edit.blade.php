@extends('layouts.courcelayout')

@section('content')

<br>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/cources">Cources</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit {{ $cource->cource_name }}</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit cource') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('cources.update', $cource->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="cource_name">{{ __('cource_name') }}</label>
                                <input id="cource_name" type="text" class="form-control @error('cource_name') is-invalid @enderror" name="cource_name" value="{{ old('cource_name', $cource->cource_name) }}" required autocomplete="cource_name" autofocus>

                                @error('cource_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cource_detail">{{ __('cource_detail') }}</label>
                                <textarea id="cource_detail" class="form-control @error('cource_detail') is-invalid @enderror" name="cource_detail" required autocomplete="cource_detail">{{ old('cource_detail', $cource->cource_detail) }}</textarea>

                                @error('cource_detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="form-group">
                                <label for="enrollment_key">{{ __('enrollment_key') }}</label>
                                <textarea id="enrollment_key" class="form-control @error('enrollment_key') is-invalid @enderror" name="enrollment_key" required autocomplete="enrollment_key">{{ old('enrollment_key', $cource->enrollment_key) }}</textarea>

                                @error('enrollment_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <input type="file" name="image" class="form-control" placeholder="image">
                                    <img src="/images/{{ $cource->image }}" width="300px">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="year">{{ __('year') }}</label>
                                <textarea id="year" class="form-control @error('year') is-invalid @enderror" name="year" required autocomplete="year">{{ old('year', $cource->year) }}</textarea>

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="semester">{{ __('semester') }}</label>
                                <textarea id="semester" class="form-control @error('semester') is-invalid @enderror" name="semester" required autocomplete="semester">{{ old('semester', $cource->semester) }}</textarea>

                                @error('semester')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
