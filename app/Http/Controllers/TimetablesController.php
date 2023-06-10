<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cource;
use App\Models\Enrollment;

class TimetablesController extends Controller
{
    public function index(User $user)
    {
        $timetables = Timetable::all();

        //return view('timetables.index', compact('timetables'));

        if (auth()->check()){
            $userID=Auth::user()->id;
            $usertype=Auth::user()->usertype;
            
            if($usertype=='2'){
                
                $timetables = Timetable::orderBy('time')->where('teacher', $userID)->paginate(10);
                
                return view('timetables.index',compact('timetables'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
            }
            
            else{
               
                $timetables = Timetable::orderBy('time')->paginate(10);
                return view('timetables.index',compact('timetables'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
            }
        }
        
    }

    public function create()
    {
        $usertype=Auth::user()->usertype;
        $userID=Auth::user()->id;
        $cources = Cource::latest()->where('creator_id', $userID)->paginate(5);
            if($usertype=='2'){$existingCourses = Timetable::where('teacher', $userID)->pluck('time')->toArray();
                $timeSlots = [
                    '06.00AM-07.00AM',
                    '07.00AM-08.00AM',
                    '08.00AM-09.00AM',
                    '09.00AM-10.00AM',
                    '10.00AM-11.00AM',
                    '11.00AM-12.00PM',
                    '12.00AM-13.00PM',
                    '13.00AM-14.00PM',
                    '14.00AM-15.00PM',
                    '15.00AM-16.00PM',
                    '16.00AM-17.00PM',
                    '17.00AM-18.00PM',
                ];
        
                return view('timetables.create', compact('cources', 'existingCourses', 'timeSlots'));
            }
    }

    public function store(Request $request)
    {
        $timetable = new Timetable();

        $timetable->subject = $request->input('subject');
        //$timetable->teacher = $request->input('teacher');
        $userID=Auth::user()->id;
        $timetable['teacher'] = "$userID";
        $timetable->time = $request->input('time');
        $timetable->day = $request->input('day');
        $timetable->Venue = $request->input('Venue');

        $timetable->save();

        return redirect()->route('timetables.index');
    }

    public function show(Timetable $timetable)
    {
        return view('timetables.show', compact('timetable'));
    }

    public function edit(Timetable $timetable)
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='2'){
            return view('timetables.edit',compact('timetable'));
        }
    }

    public function update(Request $request, Timetable $timetable)
    {
        $timetable->subject = $request->input('subject');
        //$timetable->teacher = $request->input('teacher');
        $userID=Auth::user()->id;
        $timetable['teacher'] = "$userID";
        $timetable->time = $request->input('time');
        $timetable->day = $request->input('day');
        $timetable->Venue = $request->input('Venue');

        $timetable->save();

        return view('timetables.show', compact('timetable'));
    }

        
    public function destroy(Timetable $timetable)
    {
        $timetable->delete();
        return redirect()->route('timetables.index')
                        ->with('success','timetable deleted successfully');
    }
}