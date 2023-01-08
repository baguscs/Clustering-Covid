<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Sebaran;

class AuthController extends Controller
{
    public function dashboard()
    {
        $nav = "active";
        $data = Sebaran::all();
        $treated = 0;
        $confirmation = 0;
        $healed = 0;
        $die = 0;

        foreach ($data as $key) {
           $treated += $key->treated;
           $confirmation += $key->confirmation;
           $healed += $key->healed;
           $die += $key->die;
        }

        return view('dashboard.index', compact('nav', 'treated', 'healed','confirmation', 'healed', 'die'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
        
        return redirect()->route('login_page');
    }
}
