<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IpController extends Controller
{
    public function getIpDetails()
    {
        $ip = request()->header('X-Forwarded-For') ?? request()->ip();

        // FORZA UN IP PER TEST IN LOCALE
        if ($ip == "127.0.0.1" || $ip == "::1") {
            $ip = "8.8.8.8"; // IP pubblico di Google (per test)
        }

        // Chiamata API ipinfo.io
        $token = env('IPINFO_TOKEN');
        $url = "https://ipinfo.io/{$ip}/json?token={$token}";

        $response = Http::get($url)->json();

        return view('ipinfo', ['ipData' => $response]);
    }
}
