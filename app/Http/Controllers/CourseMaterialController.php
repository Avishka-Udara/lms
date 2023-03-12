<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cource;
use App\Models\CourseMaterial;
class CourseMaterialController extends Controller
{
    public function index(cource $cource)
    {
        $materials = $cource->materials;

        return view('materials.index', compact('cource', 'materials'));
    }

    public function create(cource $cource)
    {
        return view('materials.create', compact('cource'));
    }

    public function store(Request $request, cource $cource)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'file' => 'nullable|mimes:pdf,docx', // Validate the uploaded file
        ]);

        $material = new CourseMaterial($validatedData);


        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads/course_materials/'), $fileName);
            $material->file_path =  $fileName;
        }
        
        $cource->materials()->save($material);

        return redirect()->route('cources.materials.index', $cource);
    }

    public function show(cource $cource, CourseMaterial $material)
    {
        return view('materials.show', compact('cource', 'material'));
    }

    public function edit(cource $cource, CourseMaterial $material)
    {
        return view('materials.edit', compact('cource', 'material'));
    }

    public function update(Request $request, cource $cource, CourseMaterial $material)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'file' => 'nullable|file',
        ]);

        if ($request->hasFile('file')) {
            $material->file_path = $request->file('file')->store('course_materials');
        }

        $material->update($validatedData);

        return redirect()->route('cources.materials.index', $cource);
    }

    public function destroy(cource $cource, CourseMaterial $material)
    {
        $material->delete();
        
        return redirect()->route('cources.materials.index', $cource)->with('success', 'Material deleted successfully!');
    }
}

