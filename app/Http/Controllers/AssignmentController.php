<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cource;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function index(Cource $cource)
    {
        $assignments = $cource->assignments;

        return view('assignments.index', compact('cource', 'assignments'));
    }

    public function create(Cource $cource)
    {
        return view('assignments.create', compact('cource')); 
    }

    public function store(Request $request , Cource $cource)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'file' => 'nullable|mimes:pdf,docx', // Validate the uploaded file
            'due_date' => 'nullable',
        ]);

        $assignment = new Assignment($validatedData);


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/assignment/'), $fileName);
            $assignment->file_path =  ('../uploads/assignment/' . $fileName);
        }
        
        $cource->assignments()->save($assignment);

        return redirect()->route('cources.assignments.index', $cource);

    }

    public function show(Cource $cource, Assignment $Assignment)
    {
        return view('assignments.show', compact('cource', 'Assignment'));
    }

    public function edit(Cource $cource, Assignment $Assignment)
    {

        return view('assignments.edit', compact('cource', 'Assignment'));
    }

    public function update(Request $request, Cource $cource, Assignment $Assignment)
    {
        $validatedData = $request->validate([
            
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'required|date|after:today',
            'file' => 'required|file|mimes:pdf,doc,docx,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $Assignment->file_path = $request->file('file')->store('Assignments');
        }

        $Assignment->update($validatedData);

        return redirect()->route('cources.assignments.index', $cource);
    }

    public function destroy(Cource $cource, Assignment $Assignment)
    {
    
        $Assignment->delete();
        return redirect()->route('cources.assignments.index', $cource)->with('success', 'Assignment deleted successfully!');
    
    } 
}

