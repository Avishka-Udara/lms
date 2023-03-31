@extends('layouts.courcelayout')

@section('content')
    <div class="container">
        <h1>Edit cource Assignment</h1>
        <form method="POST" action="{{ route('cources.Assignments.update', ['cource' => $cource->id, 'Assignment' => $Assignment->id]) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="Assignment_id" value="{{ $Assignment->id }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $Assignment->title }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $Assignment->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <button type="submit">Update</button>
        </form>

    </div>
@endsection
