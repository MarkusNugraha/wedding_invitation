<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Responder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ResponderController extends Controller
{
    public function submit(Request $request)
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

        // Kalau number_of_guests == "2", ambil dari family_off_count
        $numberOfGuests = $request->number_of_guests === "2"
            ? $request->family_off_count
            : 2;

        $responder = Responder::find($request->responder_id);
        if ($responder) {
            $responder->update([
                'is_attending' => $request->is_attending,
                'number_of_guests' => $numberOfGuests,
                'phone' => $request->phone,
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

        $responder = Responder::create([
            'uuid' => uniqid(),
            'full_name' => $request->full_name,
            'custom_number_guest' => 0,
            'show_virtual_blessing' => 1,
            'number_of_guests' => $numberOfGuests,
            'phone' => $request->phone,
            'is_attending' => $request->is_attending,
            'is_active' => '1',
        ]);

        return response()->json([
            'success'   => true,
            'message'   => 'Thank you for your RSVP!',
            'responder' => $responder,
            'status' => 'create'
        ]);
    }

    public function create(Request $request)
    {
        $search = $request->input('search');
        $isActive = $request->input('is_active');
        $responders = Responder::when($search, function ($query, $search) {
            $query->where('full_name', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%");
        })
        ->when(true, function ($query) use ($isActive) {
            $query->where('is_active', $isActive ?? 1);
        })
        ->orderBy('created_at', 'desc')
        ->get();

        // $responders = Responder::orderBy('created_at', 'desc')->get();
        return view('responder', compact('responders', 'search', 'isActive'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'custom_number_guest' => 'required|in:1,0',
            'show_virtual_blessing' => 'required|in:1,0',
            'max_guest_number' => 'nullable|numeric|min:0',
            'number_of_guests' => 'nullable|numeric|min:0',
            'phone' => 'nullable|numeric',
            'is_attending' => 'nullable|in:1,0',
        ]);

        $responder = Responder::create([
            'uuid' => uniqid(),
            'full_name' => $request->full_name,
            'custom_number_guest' => $request->custom_number_guest,
            'show_virtual_blessing' => $request->show_virtual_blessing,
            'max_guest_number' => $request->max_guest_number ?? '',
            'number_of_guests' => '',
            'phone' => $request->phone,
            'is_attending' => '',
            'is_active' => '1',
        ]);

        return back()->with('success', 'Responder created successfully!');
    }

    public function edit($id)
    {
        $responder = Responder::findOrFail($id);
        return view('responder_edit', compact('responder'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'custom_number_guest' => 'required|boolean',
            'show_virtual_blessing' => 'required|boolean',
            // Hanya required kalau custom_number_guest == 1
            'max_guest_number' => [
                'nullable',
                'integer',
                'min:1',
                Rule::requiredIf(fn () => $request->custom_number_guest == 1),
            ],
            'number_of_guests' => 'nullable|numeric|min:0',
            'is_attending' => 'nullable|string|max:1',
            'is_active' => 'nullable|boolean',
        ]);

        // Jika custom_number_guest == 0, maka max_guest_number dikosongkan
        if ($validated['custom_number_guest'] == 0) {
            $validated['max_guest_number'] = '';
        }
        if ($validated['number_of_guests'] == '') {
            $validated['number_of_guests'] = '';
        }
        if ($validated['is_attending'] == '') {
            $validated['is_attending'] = '';
        }
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $responder = Responder::findOrFail($id);
        $responder->update($validated);

        return redirect()->route('responder')->with('success', 'Responder updated successfully!');
    }

}
