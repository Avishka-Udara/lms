@extends('layouts.timetablelayout')

@section('content')
    <h1>Create Timetable</h1>

    <form action="/timetables" method="post">
        @csrf
<br>
        <div class="form-group">
            <label for="subject">Subject</label>
            <select name="subject" id="subject" class="form-control">
                @foreach ($cources as $cource)
                    <option value="{{ $cource->cource_name }}">{{$cource->cource_name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="time">Time</label>
            <select name="time" id="time" class="form-control">
                <option value="">Select a time slot</option>
                @foreach ($timeSlots as $slot)
                    <option value="{{ $slot }}" @if (in_array($slot, $existingCourses)) disabled @endif>{{ $slot }}</option>
                @endforeach
            </select>
            @if (in_array(old('time'), $existingCourses))
                <p class="text-danger">This time slot is already occupied. Please select another one.</p>
            @endif
        </div>
        <br>
        
        <div class="form-group">
            <label for="date">Date</label>
            <select name="day" id="day" class="form-control">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Thursday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Venue">Venue</label>
            <input type="text" name="Venue" id="Venue" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-outline-success ">  Create   </button>
    </form>

@endsection
