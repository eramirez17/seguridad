<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::orderBy('id','desc')->paginate(10);
        return view('seg.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::orderBy('caption','ASC')->pluck('caption','id');
        return view('seg.users.create',compact('profiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!($request->password === $request->password_confirmation)) {
            return back()->with('password','The provided password does not match our records.');
        }else{
            //$user = User::create($request->all());
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->profile_id = $request->profile_id;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('users.show',$user)
                ->with('info','Registro creado con éxito');        
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
        $user = User::where('id',$id)->first();
        return view('seg.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $profiles = Profile::orderBy('caption','ASC')->pluck('caption','id');
        return view('seg.users.edit',compact('user','profiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if (!($request->password === $request->password_confirmation)) {
            return back()->with('password','The provided password does not match our records.');
        }else{
            $user = User::find($id);
            if ($request->password === '') {
                $password = $user->password;
            }else{
                $password = Hash::make($request->password);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->profile_id = $request->profile_id;
            $user->password = $password;
            $user->save();
            return redirect()->route('users.show',compact('user')) 
            ->with('info','Registro actualizada con éxito');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return back()->with('info','Registro eliminado con éxito');   
    }
}
