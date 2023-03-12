<?php

namespace App\Http\Controllers;
use App\Models\Cource;

use Illuminate\Http\Request;

class allcourcesController extends Controller
{
    public function index()
    {
        $Cources = Cource::latest()->paginate(5);
        return view('welcome.allcources',compact('Cources'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function show(Cource $Cource)
    { 
        
        return view('allcource.show',compact('Cource'));
        
    }
}
