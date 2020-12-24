<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\account_acount;
class loginController extends Controller
{
    public function login(Request $request)
    {

        if(Auth::attempt(['account_email' => $request->account_email, 'account_password' => $request->account_password]))
        {
             return Redirect("/dashboard");
        }
        else
        {
            return Redirect("/");
        }

    }

}
