<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use App\Models\Chat;
use Session;
class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function saveaccount(Request $request)
    {
        $this->validate($request, [
            'username'=>'required|unique:accounts',
            'email'=>'required|email|unique:accounts',
            'password'=>'required|min:8',
            'password_confirm'=>'required|same:password',
            'condition'=>'required']);
        
        $code = str_pad(substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,6),10,"GGP-",STR_PAD_LEFT);
        
        $account = new Account();
        $account->username = $request->input('username');
        $account->type_account = $request->input('type_account');
        $account->code_par = $code;
        $account->email = $request->input('email');
        $account->password = bcrypt($request->input('password'));
        $account->save();
        return back()->with('status', 'Votre compte à été créé avec succes');
    }

    public function loginaction(Request $request)
    {
        $this->validate($request, [
           
            'email'=>'required|email',
            'password'=>'required|min:8']);
        
            $account = Account::where('email', $request->input('email'))->first();
            if ($account) {
                if (Hash::check($request->input('password'),$account->password)) {
                    Session::put('account',$account);
                    return redirect('/home');
                } else {
                    return back()->with('status', 'Mauvais email ou mot de passe');
                }
            } else {
                return back()->with('status', 'Vous n\'avez pas de compte avec cet email');
            }
    }
}
