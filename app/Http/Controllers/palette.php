<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class palette extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('palette');
    }

    public function mono(){
        return view('mono');
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function save(Request $request)
{
    if (Auth::check()) {
        $email = Auth::user()->email;
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'hex1' => 'required|string|size:7|regex:/^#[0-9A-Fa-f]{6}$/',
            'hex2' => 'required|string|size:7|regex:/^#[0-9A-Fa-f]{6}$/',
            'hex3' => 'required|string|size:7|regex:/^#[0-9A-Fa-f]{6}$/',
            'hex4' => 'required|string|size:7|regex:/^#[0-9A-Fa-f]{6}$/',
            'hex5' => 'required|string|size:7|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        $palette = new \App\Models\Palette([
            'name' => $request->input('name'),
            'hex1' => $request->input('hex1'),
            'hex2' => $request->input('hex2'),
            'hex3' => $request->input('hex3'),
            'hex4' => $request->input('hex4'),
            'hex5' => $request->input('hex5'),
            'email' => $email,
        ]);

        try {
            $palette->save();
            return redirect()->route('palette.index')->with('success', 'Palette saved successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to save the palette. Please try again.');
        }
    } else {
        return redirect()->route('login')->with('error', 'Please log in to save the palette.');
    }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
