<?php

namespace App\Http\Controllers;


use App\Models\LogAccess;

class LogAccessController extends Controller
{
    public function index()
    {
        $logs = LogAccess::orderBy('timestamp', 'desc')->get();
        return view('log_accessi', compact('logs'));
    }
    public function reset()
    {
        LogAccess::truncate(); // Cancella tutti i log accessi
        return redirect()->route('log.accessi')->with('success', 'Log accessi resettato con successo.');
    }
}
