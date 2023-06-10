@extends('layouts.timetablelayout')

@section('content')
    <form method="POST" action="{{ route('timetables.update', $timetable->id) }}">
        @csrf

        @method('PUT')

        <input type="hidden" name="id" value="{{ $timetable->id }}">

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" value="{{ $timetable->subject }}">
        </div>

        <div class="form-group">
            <label for="time">Time</label>
            <input type="text" name="time" id="time" class="form-control" value="{{ $timetable->time }}">
        </div>

        <div class="form-group">
            <label for="day">Day</label>
            <input type="text" name="day" id="day" class="form-control" value="{{ $timetable->day }}">
        </div>

        <div class="form-group">
            <label for="Venue">Venue</label>
            <input type="text" name="Venue" id="Venue" class="form-control" value="{{ $timetable->Venue }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection