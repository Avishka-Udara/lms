<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cource;
use App\Models\Assignment;
use App\Models\Post;
use App\Models\Enrollment;

class HomeController extends Controller
{
    public function home(){
        if (auth()->check()){
            $user = Auth::user();
            $usertype=Auth::user()->usertype;
            $TeacherCount = User::where('usertype', '2')->count();
            $studentCount = User::where('usertype', '0')->count();
            $userCount = User::where('usertype', '0')->count();
            $enrolledCount = Enrollment::where('user_id', $user->id)->count();


            $Coursecount = Cource::count();
            $Assignmentcount = Assignment::count();
            $Postcount = Post::count();



            if($usertype=='1'){
                return view('admin.home', compact('userCount','TeacherCount','Coursecount','Assignmentcount','Postcount'));
            }
            else if($usertype=='2'){
                return view('teacher.home', compact('studentCount','Coursecount','Assignmentcount'));
            }
            else if($usertype=='0'){
                return view('dashboard', compact('enrolledCount','TeacherCount','Coursecount','Assignmentcount','Postcount'));
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
