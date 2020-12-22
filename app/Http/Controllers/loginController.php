<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use App\NhanVien;
class loginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
             return Redirect("/dashboard");
        }
        else
        {
            return Redirect("/");
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect("/");

    }
    public function login_google()
    {
        return Socialite::driver('google')->redirect();

    }
    public function google_callback()
    {

        $userg = Socialite::driver('google')->user();
        $check=NhanVien::where('email',$userg->email)->get();
        if(count($check)==0)
        {
            $Nhanvien=new NhanVien;

            $Nhanvien->ten=$userg->name;
            $Nhanvien->quyen="agent";
            $Nhanvien->email=$userg->email;
            $Nhanvien->password=md5("");

            if(Auth::attempt(['email' => $userg->email, 'password' => ""]))
             {
                    return Redirect("/dashboard");
            }
            else
            {
                return Redirect("/");
            }

        }
        else
        {
            if(Auth::attempt(['email' => $userg->email, 'password' => ""]))
            {
                   return Redirect("/dashboard");
            }
            else
            {
                return Redirect("/");
            }
        }
    }

}
