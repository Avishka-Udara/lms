@extends('layouts.courcelayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <br>
                    <br>
                    <div class="card-header">{{ $material->title }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <div>{{ $material->description }}</div>
                        </div>
                        
                        <div class="form-group">
                            <label for="file">{{ __('File') }}</label>
                            <div>
                                <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank">{{ $material->file_name }}</a>
                            </div>
                        </div>
                        @if (Auth::user()->usertype == 2)
                        <div class="form-group mb-0">
                            <a href="{{ route('cources.materials.edit', ['cource' => $cource->id, 'material' => $material->id]) }}">Edit Material</a>
                            <!--
                            <form action="{{ route('cources.materials.destroy', ['cource' => $cource->id, 'material' => $material->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete Material</button>
                            </form>
                            -->
                            <form action="{{ route('cources.materials.destroy', [$cource->id, $material->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this material?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>{{ __('Delete') }}</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
