<?php

namespace App\Http\Controllers;

use App\Models\Cource;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourceController extends Controller
{
    
    public function index()
    {
        $userID=Auth::user()->id;
        $usertype=Auth::user()->usertype;
        if($usertype=='2'){
            $cources = Cource::latest()->where('creator_id', $userID)->paginate(5);
            return view('cources.index',compact('cources'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        
        else{
            $user = Auth::user();
            $cources = Cource::whereHas('enrollments', function($query) use($user) {
                $query->where('user_id', $user->id);
            })->paginate(5);

            return view('cources.index', compact('cources'));
        }
    }

    
    public function create()
    {
        $usertype=Auth::user()->usertype;
        if($usertype=='2'){
            return view('cources.create');
        }
        else {
            abort(403);
        }
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'cource_name' => 'required',
            'cource_detail' => 'required',
            'enrollment_key' => 'required|max:20|unique:cources',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'year' => 'required',
            'semester' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }


        $userID=Auth::user()->id;
        $input['creator_id'] = "$userID";
        Cource::create($input);

        return redirect()->route('cources.index')
                        ->with('success','Cource created successfully.');
    }

    
    public function show(Cource $cource)
    {
        return view('cources.show',compact('cource'));
    }

    
    public function edit(Cource $cource)
    {
        return view('cources.edit',compact('cource'));
    }

    
    public function update(Request $request, Cource $cource)
    {
        $request->validate([
            'cource_name' => 'required',
            'cource_detail' => 'required',
            'enrollment_key' => 'required|max:20',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'year' => 'required',
            'semester' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }

        $userID=Auth::user()->id;
        $input['creator_id'] = "$userID";
        $cource->update($input);

        return redirect()->route('cources.index')
                        ->with('success','Cource updated successfully');
    }

    
    public function destroy(Cource $cource)
    {
        $cource->delete();
        return redirect()->route('cources.index')
                        ->with('success','Cource deleted successfully');
    }

    public function enroll(Cource $cource)
    {
        $usertype=Auth::user()->usertype;
        if (auth()->check()){
            if (!Auth::user()->enrollments->contains($cource->id)) {
                $enrollment = new Enrollment();
                $enrollment->user_id = Auth::id();
                $enrollment->cource_id = $cource->id;
                $enrollment->save();
                return redirect()->back()->with('success', 'Enrolled successfully');
            } else {
                return redirect()->back()->with('error', 'Already enrolled');
            }
        }
        else {
            # code...
        }
    }

}
