@extends('layouts.courcelayout')

@section('content')
    <div class="container">
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
