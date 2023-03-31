<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cource;
use App\Models\Assignment;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function index($assignment_id)
    {
        $assignment = Assignment::findOrFail($assignment_id);

        // Get the submissions for the assignment
        $submissions = $assignment->submissions;
        return view('submissions.index', compact('assignment', 'submissions'));
    }

    public function create( $assignment, $cource)
    {
        if (auth()->check()){
        return view('submissions.create', compact('assignment', 'cource'));
        }
        else{
            abort(403); 
            return view('/');
        }
    }

    public function store(Request $request,  $assignment)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'file' => 'nullable|mimes:pdf,docx', // Validate the uploaded file
        ]);

        $submission = new Submission($validatedData);


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/course_submissions/'), $fileName);
            $submission->file_path =  ('../uploads/course_submissions/' . $fileName);
        }
        
        $assignment->submissions()->save($submission);

        return redirect()->route('assignments.submissions.index', $assignment);
    }

    public function show( $assignment, Submission $submission)
    {
        return view('submissions.show', compact('assignment', 'submission'));
    }

    public function edit( $assignment, Submission $submission)
    {
        if (auth()->check()){
        return view('submissions.edit', compact('assignment', 'submission'));
        }
        else{
            abort(403);
            return view('/');
        }
    }

    public function update(Request $request,  $assignment, Submission $submission)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'file' => 'nullable|file',
        ]);

        if ($request->hasFile('file')) {
            $submission->file_path = $request->file('file')->store('course_submissions');
        }

        $submission->update($validatedData);

        return redirect()->route('assignments.submissions.index', $assignment);
    }

    public function destroy( $assignment, Submission $submission)
    {
        if (auth()->check()){
            $submission->delete();
            return redirect()->route('assignments.submissions.index', $assignment)->with('success', 'submission deleted successfully!');
        }
        else{
            return redirect()->route('assignments.submissions.index', $assignment)->with('Failed', 'Mined Your Own business Please');
        }
    }
}
