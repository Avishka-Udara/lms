@extends('layouts.courcelayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <br>
                    <br>
                    <div class="card-header">{{ $Assignment->title }}</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <div>{{ $Assignment->description }}</div>
                        </div>
                        
                        <div class="form-group">
                            <label for="due_date ">{{ __('Deadline') }}</label>
                            <div>{{ $Assignment->due_date }}</div>
                        </div>

                        <div class="form-group">
                            <label for="file">{{ __('File') }}</label>
                            <div>
                                @if ($Assignment->file_path)
                                    <a href="{{ asset('storage/' . $Assignment->file_path) }}" target="_blank" class="btn btn-xs btn-success">View File</a>
                                @else
                                    No file attached
                                @endif 
                            </div>
                        </div>
                        @if (Auth::user()->usertype == 2)
                        <div class="form-group mb-0">
                           
                            <form action="{{ route('cources.assignments.destroy', [$cource->id, $Assignment->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Assignment?')">
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
