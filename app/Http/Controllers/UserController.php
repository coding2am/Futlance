<?php

namespace App\Http\Controllers;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function create()
    {
        return view('frontend.auth.register');
    }

    public function ownerCreate()
    {
        return view('frontend.auth.owner_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|min:2',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'address' => 'required',
            'password' => 'required',
        ]);
        //inserting user
        if ($request->password == $request->cpassword) {

            //default user avater
            $path = "my_assets/frontend/assets/avaters/user.png";

            $user = new User();
            $user->name = $request->name;
            $user->photo = $path;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(10);
            $user->save();

            $user->assignRole("customer");

            return redirect()->route('user.signin')->with('success', 'User Registration has been successful! Please login.');
        } else {
            return redirect()->back()->with("error", "Password are didn't match");
        }
    }

    public function ownerStore(Request $request)
    {


        $request->validate([
            'name' => 'required|min:2',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'address' => 'required',
            'password' => 'required',
        ]);
        //inserting user
        if ($request->password == $request->cpassword) {

            //default user avater
            $path = "my_assets/frontend/assets/avaters/user.png";

            $user = new User();
            $user->name = $request->name;
            $user->photo = $path;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(10);
            $user->save();

            $user->assignRole("owner");

            return redirect()->route('user.signin')->with('success', 'User Registration has been successful! Please login.');
        } else {
            return redirect()->back()->with("error", "Password are didn't match");
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
        $user = User::find($id);
        return view('backend.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = User::find($id);
        // return view('backend.user.edit', compact('user'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function owner()
    {
        $owners = User::role('2')->get();
        return view('backend.user.owner', compact('owners'));
    }

    public function member()
    {
        $members = User::role('3')->get();
        return view('backend.user.member', compact('members'));
    }

    public function role($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.user.role', compact('user', 'roles'));
    }

    public function roleUpdate(Request $request, $id)
    {
        DB::table('model_has_roles')->where('model_id', $id)->update(['role_id' => $request->role]);
        return redirect()->back()->with('success', 'Role has been successfully updated');
    }

    public function on($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        return redirect()->route('user.index');
    }
    public function off($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        return redirect()->route('user.index');
    }
}
