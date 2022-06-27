<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Customer;
use App\Type;
use App\User;
use Session;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::latest()->paginate(10);
        //dd($users);
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        $customers = Customer::all();
       // dd($customers);
        return view('admin.user.create', compact(['customers']));

    }



    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        Session::flash('success', 'User created successfully');
        return redirect()->back();
    }

    public function edit(User $user){
        $customers = Customer::all();
        return view('admin.user.edit', compact('user','customers'));
    }

    public function update(Request $request, User $user ){

        $userId = $user->id;
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:6',
        ]);
/*
        $user =DB::table('users')
            ->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
*/

        $user = User::find($userId);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request->password);
        $user->save();


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('success', 'User updated successfully');
        return redirect()->back();
    }

    public function destroy(User $user){
        if($user){
            $user->delete();
            Session::flash('success', 'User deleted successfully');
        }
        return redirect()->back();
    }



}
