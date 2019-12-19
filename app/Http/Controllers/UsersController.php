<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('is_deleted', '=', '0')->sortBy('place_id');
        $user = Auth::user();

        return view('users.index', compact('users', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $users = new User();

        return view('users.create', compact('users', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('pass');
        $data['password'] = Hash::make($request->pass);
        User::create($data);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::findOrFail($id);
        $user = Auth::user();

        return view('users.show', compact('users', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        $user = Auth::user();

        return view('users.edit', compact('users', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $users = User::findOrFail($id);
        $data = $request->except('pass');
        if ($request->pass != '') {
            $data['password'] = Hash::make($request->pass);
        }
        $users->update($data);
        $user = Auth::user();
        return view('users.show', compact('users', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return $id;
        $users = User::findOrFail($id);
        $users->is_deleted = true;
        $users->save();
        return redirect('users');
    }
}
