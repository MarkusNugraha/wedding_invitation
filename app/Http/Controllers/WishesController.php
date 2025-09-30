<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishes;
use Illuminate\Http\Request;

class WishesController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'wish_name'    => 'required|string|max:255',
            'wish_message' => 'required|string|max:1000',
        ]);

        // Wishes::create([
        $wish = Wishes::create([
            'wish_name'    => $request->wish_name,
            'wish_message' => $request->wish_message,
        ]);

        // return back()->with('success', 'Thank you for your wishes! 💖');
        return response()->json([
            'success' => true,
            'message' => 'Thank you for your wishes! 💖',
            'wish'    => $wish
        ]);
    }
}
