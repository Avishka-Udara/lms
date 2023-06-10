@extends('layouts.timetablelayout')

@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                {{ $timetable->subject }}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">TIME &nbsp;&nbsp;&nbsp;&nbsp;: {{ $timetable->time }}</li>
                <li class="list-group-item">DAY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $timetable->day }}</li>
                <li class="list-group-item">VENUE : {{ $timetable->Venue }}</li>
            </ul>
            <br>
            <div class="card-footer">
                <form action="{{ route('timetables.destroy',$timetable->id) }}" method="POST">
                    <a class="btn btn-outline-success" href="{{ route('timetables.edit',$timetable->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
                
@endsection