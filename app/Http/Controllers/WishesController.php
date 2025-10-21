<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WishesController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wish_name'    => 'required|string|max:255',
            'wish_message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $wish = Wishes::create([
            'wish_name'    => $request->wish_name,
            'wish_message' => $request->wish_message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your wishes! 💖',
            'wish'    => $wish
        ]);
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $isActive = $request->input('is_active');
        $wishes = Wishes::when($search, function ($query, $search) {
            $query->where('wish_name', 'like', "%{$search}%")
                ->orWhere('wish_message', 'like', "%{$search}%");
        })
        ->when(true, function ($query) use ($isActive) {
            $query->where('is_active', $isActive ?? 1);
        })
        ->orderBy('created_at', 'desc')
        ->get();

        // dd($wishes);

        return view('wish', compact('wishes', 'search', 'isActive'));
    }

    public function edit($id)
    {
        $wish = Wishes::findOrFail($id);
        return view('wish_edit', compact('wish'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validated = $request->validate([
            'wish_message' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);
        $validated['is_active'] = $request->has('is_active') ? 1 : 0;

        $wish = Wishes::findOrFail($id);
        $wish->update($validated);

        return redirect()->route('wish')->with('success', 'Wish updated successfully!');
    }
}
