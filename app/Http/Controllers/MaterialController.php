<?php

namespace App\Http\Controllers;
use App\Http\CourceController;
use App\Models\Cource;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MaterialController extends Controller
{
    public function createForm(){
        return view('cources.material');
    }

    public function fileUpload(Request $req){
            $userID=Auth::user()->id;
            $userID=Auth::user()->id;
            $req->validate([

                'title' => 'required',
                'description' => 'required',
                'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
            ]);

            $fileModel = new Material;

            if($req->file()) {
                $fileModel = Material::create([

                    'Cource_id' => $userID,
                    'creator_id' => $userID,
                    'title' => $req['title'],
                    'description'=> $req['description'],
                ]);

                $fileName = time().'_'.$req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
                $fileModel->name = time().'_'.$req->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->save();
                return redirect()->route('cources.index')->with('success','cource material created successfully.');

            }

    }


}
