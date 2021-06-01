<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->with('passwords')->orderBy('id', 'DESC')->first();
        //dd($user);
        return view('password.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPassword(Request $request){
        $password = new Password();
        $password->site_name = $request->site_name;
        $password->login = $request->login;
        $password->hashed_password = Crypt::encryptString($request->nothashed_password);
        $password->nothashed_password = $request->nothashed_password;
        $password->user_id = Auth::user()->id;
        $password->save();
        return redirect('/index');

    }

    public function edit(Request $request)
    {
        $password = Password::findOrFail($request->id);

            $password->hashed_password = $request->hashed_password;
            $password->nothashed_password = $request->hashed_password;

            $password->save();
            return redirect('/index');
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
        $password = Password::findOrFail($id);
        $password->delete();

        return redirect('/index');
    }

    public function showPassword(Request $request)
    {
        $id = $request->id;
        $password = Password::where('id', $id)->value('nothashed_password');

        return response()->json($password);
    }
}