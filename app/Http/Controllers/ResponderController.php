<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Responder;
use Illuminate\Http\Request;

class ResponderController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'number_of_guests' => 'nullable|numeric|min:0',
            'phone' => 'nullable|numeric',
            'is_attending' => 'required|in:1,0',
        ]);

        // Cek apakah nama sudah pernah mengisi
        $existing = Responder::where('full_name', $request->full_name)->first();
        if ($existing) {
            return back()->with('error', 'You have already submitted an RSVP or name has already used.');
        }

        Responder::create([
            'full_name' => $request->full_name,
            'number_of_guests' => $request->number_of_guests,
            'phone' => $request->phone,
            'is_attending' => $request->is_attending,
            'is_active' => '1',
        ]);

        return back()->with('success', 'Thank you for your RSVP!');
    }
}
