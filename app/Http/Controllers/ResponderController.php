<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Responder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResponderController extends Controller
{
    public function submit(Request $request)
    {
        // $request->validate([
        //     'full_name' => 'required|string|max:255',
        //     'number_of_guests' => 'nullable|numeric|min:0',
        //     'phone' => 'nullable|numeric',
        //     'is_attending' => 'required|in:1,0',
        // ]);

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'number_of_guests' => 'nullable|numeric|min:0',
            'phone' => 'nullable|numeric',
            'is_attending' => 'required|in:1,0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Kalau number_of_guests == "2", ambil dari family_off_count
        $numberOfGuests = $request->number_of_guests === "2"
            ? $request->family_off_count
            : 2;

        $responder = Responder::find($request->responder_id);
        if ($responder) {
            $responder->update([
                'is_attending' => $request->is_attending,
                'number_of_guests' => $numberOfGuests,
            ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Thank you for your RSVP!',
                'responder' => $responder,
                'status' => 'update'
            ]);
        }

    }

    public function submitnew(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'number_of_guests' => 'nullable|numeric|min:0',
            'phone' => 'nullable|numeric',
            'is_attending' => 'required|in:1,0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Cek apakah nama sudah pernah mengisi
        $existing = Responder::where('full_name', $request->full_name)->first();
        if ($existing) {
            // return back()->with('error', 'You have already submitted an RSVP or name has already used.');
            return response()->json([
                'success' => false,
                'message' => 'You have already submitted an RSVP or name has already used.'
            ], 422);
        }

        // Kalau number_of_guests == "2", ambil dari family_off_count
        $numberOfGuests = $request->number_of_guests === "2"
            ? $request->family_off_count
            : 2;

        // Responder::create([
        $responder = Responder::create([
            'full_name' => $request->full_name,
            'number_of_guests' => $numberOfGuests,
            'phone' => $request->phone,
            'is_attending' => $request->is_attending,
            'is_active' => '1',
        ]);

        // return back()->with('success', 'Thank you for your RSVP!');
        return response()->json([
            'success'   => true,
            'message'   => 'Thank you for your RSVP!',
            'responder' => $responder,
            'status' => 'create'
        ]);
    }
}
