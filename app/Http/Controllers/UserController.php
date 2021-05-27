<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuperuserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superuser.adding');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->get()->except(auth()->user()->id);

        return view('superuser.superuser', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuperuserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        $user = User::create($input);
        $user->assignRole($request->role);

        return redirect()->route('user.create')->with('success', 'Akun telah ditambah');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $users = User::find($id);
        // return $users;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user = User::find($id);

        return view('superuser.edit', compact('user'));
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
        $user = User::find($id);
        $request->validate([
            'name' => 'required|min:3|max:255',
            'nip' => 'required|min:8|max:255|unique:users,nip,'.$user->id,
            'password' => 'string|min:8',
            'role' => 'required',
        ]);
        
        // dd($request->name);
        $user->name = $request->name;
        $user->nip = $request->nip;
        if($request->password){
            $user->password =  Hash::make($request->password);
        }
        $user->save();

        $user->assignRole($request->role);

        return redirect()->route('user.create')->with('success', 'Data akun berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id); 
        return redirect()->route('user.create')->with('success', 'data telah dihapus');
    }
}
