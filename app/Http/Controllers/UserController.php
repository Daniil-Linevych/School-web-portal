<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pupils;

class UserController extends Controller
{
    public function login(){
        return view('authorization');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'login'=>['required'],
            'password'=>['required']
            ]);

        $user = User::getUserByLoginAndPassword($formFields['login'], $formFields['password']);
        if ($user != null){
            $request->session()->regenerate();
            auth()->login($user);
            $pupil = Pupils::getPupilByUserId($user['id']);
            return redirect("/pupil/{$pupil['id']}")->with('success-message', 'Ви увійшли до учнівського кабінету!');
        }

        return back()->withErrors(['authenticate'=>'Email or password are invalid!']);

    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success-message', 'Ви вийшли з учнівського акаунту!');
    }

}
