<?php

namespace App\Http\Controllers;
use App\Models\Palette;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    function index(){
        $email = Auth::user()->email;
        $palettes = Palette::where('email', $email)->get();
        $title = "Your Palettes";

        // Prepare data to pass to the view
        $data = compact('palettes', 'title');
        return view('dash-board')->with($data);
    }
    public function fetchPalettes() {
        $email = Auth::user()->email;
        $palettes = Palette::where('email', $email)->get();

        // Return a partial view containing the palettes
        return view('partials.palettes', compact('palettes'))->render();
    }
public function deletePalette($id) {
    $palette = Palette::find($id);    
    if (!$palette) {
        return response()->json(['message' => 'Palette not found'], 404);
    }
    
    $palette->delete();
    $email = Auth::user()->email;
        $palettes = Palette::where('email', $email)->get();
        $title = "Your Palettes";

        // Prepare data to pass to the view
        $data = compact('palettes', 'title');
        return view('dash-board')->with($data);
    
}
    
}
