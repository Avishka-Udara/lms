<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function home(){
        if (auth()->check()){
            $usertype=Auth::user()->usertype;
            if($usertype=='1'){
                return view('admin.home');
            }
            else if($usertype=='2'){
                return view('teacher.home');
            }
            else if($usertype=='0'){
                return view('dashboard');
            }
            else {
                abort(403);
            }
        }
        else{
            abort(403);
            return view('/');
        }
    }
}
