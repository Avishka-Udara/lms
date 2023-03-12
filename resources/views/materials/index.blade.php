@extends('layouts.courcelayout')

@section('content')
    <div class="container">
        <h1>{{ $cource->cource_name }} > Materials</h1>

        <a href="{{ route('cources.materials.create', $cource) }}" class="btn btn-primary mb-3">Create New Material</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($materials as $material)
                    <tr>
                        <td>{{ $material->id }}</td>
                        <td><a href="{{ route('cources.materials.show',[$cource, $material]) }}">{{ $material->title }}</a></td>
                        <td>{{ $material->description }}</td>
                        <td>
                            @if ($material->file_path)
                                <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank">View File</a>
                            @else
                                No file attached
                            @endif
                        </td>
                        <td>
                            <!--<form action="{{ route('cources.materials.destroy', [$cource, $material]) }}" method="POST">-->
                            <form action="{{ route('cources.materials.destroy', [$cource->id, $material->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this material?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
