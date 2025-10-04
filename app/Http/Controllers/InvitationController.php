<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Responder;
use App\Models\Wishes;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function index()
    {
        $wishes = Wishes::latest()->get() ?? collect();
        // responder null
        $responder = null;
        return view('invitation', compact('wishes', 'responder'));
    }

    public function show($uuid)
    {
        // Ambil data responder berdasarkan ID
        // $responder = Responder::findOrFail($uuid);
        $responder = Responder::where('uuid', $uuid)->firstOrFail();
        $wishes = Wishes::latest()->get() ?? collect();

        return view('invitation', compact('wishes', 'responder'));
    }
}
