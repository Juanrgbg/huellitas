<?php

namespace App\Http\Controllers;

use App\Models\create_count;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateCountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login-create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login.login-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'apellido' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = User::create($data);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(create_count $create_count)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(create_count $create_count)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, create_count $create_count)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(create_count $create_count)
    {
        //
    }
}
