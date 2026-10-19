<?php

namespace App\Http\Controllers;



class ProfileController extends Controller
{
    public function profile()
    {
        return view('menu.profile');
    }



    public function edit()
    {
        return view('profile.profileEdit');
    }
}
