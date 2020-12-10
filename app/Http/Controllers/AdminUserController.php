<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $users=User::all();

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        $role_array=[];
        foreach ($roles as $role){
            $role_array[$role->id] = $role->name;
        }
        return view('admin.users.create',compact('role_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //

        $input['name'] = $request->input('name');
        $input['email'] = $request->input('email');
        $input['role_id'] = $request->input('role');
        $input['password'] = Hash::make($request->input('password'));
        User::create($input);
        return  redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $role_array=[];
        foreach ($roles as $role){
            $role_array[$role->id] = $role->name;
        }

        return view('admin.users.edit',compact('user','role_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'nullable|confirmed',
            'role'=>'required'
        ]);
        $input['password'] = $request->input('password');
        if($request->input('password') == null){
            $input['password'] =  $request->input('old_password');
        }else{
            $input['password'] = Hash::make($input['password']);
        }
        $input['name'] = $request->input('name');
        $input['email'] = $request->input('email');
        $input['role_id'] = $request->input('role');
        if ($file = $request->file('photo')) {
            $filename = $input['name'] . $file->getClientOriginalName();
            $path = $file->move('images',$filename);
            $photo = Photo::create(['name'=>$filename]);
            $input['photo_id'] = $photo->id;
        }

        user::where('id',$id)->update($input);
        Session::flash('message', 'User updated successfully');
        return  redirect('/admin/user');

//        return $path;

//        return $request->photo;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->photo){
            unlink(public_path() . '/images/' . $user->photo->name);
            $user->photo->delete();
        }
        $user->delete();
        return redirect('/admin/user');
    }
}
