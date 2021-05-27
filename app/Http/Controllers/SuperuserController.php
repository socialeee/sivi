<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuperuserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperuserController extends Controller
{
    // public function index()
    // {
    //     $users = user::all();
    //     return view('Superuser')
    // }

    public function create()
    {
        return view('superuser');
    }

    public function store(SuperuserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        $user = User::create($input);
        $user->assignRole($request->role);

        return redirect()->route('Superuser.create');
    }

    public function show()
    {
        // $data = users::all();
        // return view ('superuser', ['user'=>$data]);
        // $users = User::all();
        // return view('superuser.superuser', compact('users'));
    }
}
