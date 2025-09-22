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
        $wishes = Wishes::latest()->get();
        // responder null
        $responder = null;
        return view('invitation', compact('wishes', 'responder'));
    }

    public function show($id)
    {
        // Ambil data responder berdasarkan ID
        $responder = Responder::findOrFail($id);
        $wishes = Wishes::latest()->get();

        return view('invitation', compact('wishes', 'responder'));
    }
}
