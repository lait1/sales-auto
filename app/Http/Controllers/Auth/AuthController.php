<?php
/**
 * Created by PhpStorm.
 * User: Dexter
 * Date: 31.05.2020
 * Time: 23:24
 */

namespace App\Http\Controllers\Auth;


use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function registerFormShow()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'fio' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'unique:clients'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $client = Client::create([
            'fio' => $request->fio,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        $client->generatePassword($request->get('password'));

        return redirect('/login')->with('status', 'Успешно зарегистрировались, войдите в систему');
    }
    public function loginFormShow()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::guard('web')->attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password') ]))
        {
            return redirect()->back();
        }
        else{
            return redirect()->back()->with('status', 'Неправильный логин или пароль');
        }
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}