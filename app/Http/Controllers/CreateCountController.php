<?php

namespace App\Http\Controllers;

use App\Models\create_count;
use Illuminate\Http\Request;

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
        return view('home.home');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(create_count $create_count)
    {
        //
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
