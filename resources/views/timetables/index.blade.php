@extends('layouts.timetablelayout')

@section('content')
    <div class="container">

        <h1>Timetables</h1>
        <a href="{{ route('timetables.create') }}" class="btn btn-primary mb-3"> {{ ('Create New TimeSlot') }} </a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Time Slot</th>
                    <th scope="col">Monday</th>
                    <th scope="col">Tuesday</th>
                    <th scope="col">Wednesday</th>
                    <th scope="col">Thursday</th>
                    <th scope="col">Friday</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($timetables as $entry)
                    @php
                        $timeSlot = $entry->time;
                        $weekday = $entry->day;
                        $subject = $entry->subject;
                    @endphp
                <tr>
                    <td>{{ $timeSlot }}</td>
                    <td>
                        @if ($weekday === 'Monday')
                            <a href="{{ route('timetables.show', $entry->id) }}">{{ $subject }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($weekday === 'Tuesday')
                            <a href="{{ route('timetables.show', $entry->id) }}">{{ $subject }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($weekday === 'Wednesday')
                            <a href="{{ route('timetables.show', $entry->id) }}">{{ $subject }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($weekday === 'Thursday')
                            <a href="{{ route('timetables.show', $entry->id) }}">{{ $subject }}</a>
                        @endif
                    </td>
                    <td>
                        @if ($weekday === 'Friday')
                            <a href="{{ route('timetables.show', $entry->id) }}">{{ $subject }}</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection


