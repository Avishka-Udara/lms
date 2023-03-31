@extends('layouts.courcelayout')

@section('content')
    <div class="container">
        <h1>{{ $cource->cource_name }} > Assignment</h1>

        <a href="{{ route('cources.assignments.create', $cource) }}" class="btn btn-primary mb-3">Create New Assignment </a>

        <table class="table">
            <tbody>
                @foreach ($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->id }}</td>
                        <td><a href="{{ route('cources.assignments.show',[$cource, $assignment]) }}">{{ $assignment->title }}</a></td>
                        <td>{{ $assignment->description }}</td>
                        <td>
                            @if ($assignment->file_path)
                                <a href="{{ asset('storage/' . $assignment->file_path) }}" target="_blank">View File</a>
                            @else
                                No file attached
                            @endif
                        </td>
                        <td>
                            <!--<form action="{{ route('cources.assignments.destroy', [$cource, $assignment]) }}" method="POST">-->
                            <form action="{{ route('cources.assignments.destroy', [$cource->id, $assignment->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this assignment?')">
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
