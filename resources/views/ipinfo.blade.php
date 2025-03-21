@extends('layouts.app')

@section('content')
    <div class="relative flex min-h-screen items-center justify-center bg-gray-900">
        <!-- Background Image -->
        <img id="background" class="absolute inset-0 h-full w-full object-cover opacity-50"
            src="{{ Storage::disk('s3')->url('img/background.svg') }}" alt="SS3Laravel background" />

        <!-- Content Wrapper -->
        <div class="relative w-full max-w-2xl rounded-lg bg-gray-800 bg-opacity-95 p-6 shadow-lg">
            <h1 class="mb-4 text-center text-2xl font-bold text-white">🌍 IP Information</h1>

            <table class="w-full border-collapse rounded-lg border border-gray-700 text-white shadow-lg">
                <tbody>
                    <tr class="bg-gray-700">
                        <td class="border border-gray-600 px-4 py-2 font-semibold">📌IP Add</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $ipData['ip'] ?? 'N/A' }}</td>
                    </tr>
                    <tr class="bg-gray-800">
                        <td class="border border-gray-600 px-4 py-2 font-semibold">🏙️City</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $ipData['city'] ?? 'N/A' }}</td>
                    </tr>
                    <tr class="bg-gray-700">
                        <td class="border border-gray-600 px-4 py-2 font-semibold">🌍Region</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $ipData['region'] ?? 'N/A' }}</td>
                    </tr>
                    <tr class="bg-gray-800">
                        <td class="border border-gray-600 px-4 py-2 font-semibold">🇨🇴 Country</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $ipData['country'] ?? 'N/A' }}</td>
                    </tr>
                    <tr class="bg-gray-700">
                        <td class="border border-gray-600 px-4 py-2 font-semibold">📍 Location</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $ipData['loc'] ?? 'N/A' }}</td>
                    </tr>
                    <tr class="bg-gray-800">
                        <td class="border border-gray-600 px-4 py-2 font-semibold">🏢ISP/Org.</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $ipData['org'] ?? 'N/A' }}</td>
                    </tr>
                    <tr class="bg-gray-700">
                        <td class="border border-gray-600 px-4 py-2 font-semibold">📮Code</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $ipData['postal'] ?? 'N/A' }}</td>
                    </tr>
                    <tr class="bg-gray-800">
                        <td class="border border-gray-600 px-4 py-2 font-semibold">⏰Time</td>
                        <td class="border border-gray-600 px-4 py-2">{{ $ipData['timezone'] ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>

            <!-- Back Button -->
            <div class="mt-4 text-center">
                <a href="{{ route('home') }}" class="rounded-lg bg-blue-500 px-4 py-2 text-white shadow hover:bg-blue-600">
                    🔙 Back to Home
                </a>
            </div>
        </div>
    </div>
@endsection
