<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()){
            $usertype=Auth::user()->usertype;
            $User = User::all();
            if($usertype=='1'){
                return view('admin.index', compact('User'));
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->check()){
            $usertype=Auth::user()->usertype;
            if($usertype=='1'){
                return view('admin.create');
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
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->check()){
            $usertype=Auth::user()->usertype;
            if($usertype=='1'){
                $storeData = $request->validate([
                    'name' => 'required|max:255',
                    'email' => 'required|max:255',
                    'usertype' => 'required',
                    'password' => 'required|max:255',

                ]);
                $user = User::create([
                    'name'=>$storeData['name'],
                    'email' => $storeData['email'],
                    'usertype' => $storeData['usertype'],
                    'password' =>bcrypt($storeData['password'])
                ]);
                return redirect('/User')->with('completed', 'User has been saved!');
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->check()){
            $User = User::findOrFail($id);
            $usertype=Auth::user()->usertype;
            if($usertype=='1'){
                return view('admin.show', compact('User'));
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
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->check()){
            $User = User::findOrFail($id);
            $usertype=Auth::user()->usertype;
            if($usertype=='1'){
                return view('admin.edit', compact('User'));
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

    public function update(Request $request, $id)
    {
        if (auth()->check()){
            $usertype=Auth::user()->usertype;
            if($usertype=='1'){
                $updateData = $request->validate([
                    'name' => 'required|max:255',
                    'email' => 'required|max:255',
                    'usertype' => 'required',
                    'password' => 'required|max:255',
                ]);
                User::whereId($id)->update(([
                    'name'=>$updateData['name'],
                    'email' => $updateData['email'],
                    'usertype' => $updateData['usertype'],
                    'password' =>bcrypt($updateData['password'])
                ]));
                return redirect('/User')->with('completed', 'User has been updated');
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
    
    public function destroy($id)
    {
        if (auth()->check()){
            $usertype=Auth::user()->usertype;
            if($usertype=='1'){
                $User = User::findOrFail($id);
                $User->delete();
                return redirect('/User')->with('completed', 'User has been deleted');
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
