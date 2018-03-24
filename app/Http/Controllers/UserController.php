<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = $this->findUserByUsername($username);

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //Guardar los datos recibidos de la vista edit
        //$userUpdate = User::find($user->id);
        
        if($request->hasFile('avatar')){
            $user->avatar = $request->file('avatar')->store('public');
        }

        $user->update([
            'first_name' => $request->input('first_name'), 
            'last_name' => $request->input('last_name'),
        ]);

        if($user){
            return redirect()->route('user.edit', ['user' => $user->email])->with('success', trans('adminlte::adminlte.update_succeeded'));
        }

        //Redireccionar si falla
        return back()->withInput()->with('errors', trans('adminlte::adminlte.update_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    private function findUserByUsername($username){
        return User::where('email', $username)->first();
    }

}
