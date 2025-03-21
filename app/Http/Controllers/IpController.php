<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IpController extends Controller
{
    public function getIpDetails($ip = null)
    {
        $ip = $ip ?? request()->header('X-Forwarded-For') ?? request()->ip();
        $token = env('IPINFO_API_KEY'); // Usa il token API da .env

        $response = Http::get("https://ipinfo.io/{$ip}/json?token={$token}");

        if ($response->successful()) {
            return response()->json($response->json());
        }

        return response()->json(['error' => 'Impossibile recuperare le informazioni IP'], 500);
    }
}
