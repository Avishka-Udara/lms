@extends('layouts.courcelayout')

@section('content')
    <div class="container">

        <a href="{{ route('cources.assignments.create', $assignment) }}" class="btn btn-primary mb-3">Create New Assignment </a>

        <table class="table">
            <tbody>
                @foreach ($submissions as $submission)
                    <tr>
                        <td>{{ $submission->description }}</td>
                        <td>
                            @if ($submission->file_path)
                                <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank">View File</a>
                            @else
                                No file attached
                            @endif
                        </td>
                        <td>
                            <!--<form action="{{ route('cources.assignments.destroy', [$assignment, $submission]) }}" method="POST">-->
                            <form action="{{ route('cources.assignments.destroy', [$assignment->id, $submission->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this assignment?')">
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
