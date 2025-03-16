<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $file = $request->file('profile_image');
        $fileName = $file->hashName();  // Genera l'hash name
        $path = Storage::disk('s3')->putFileAs('profile_image', $file, $fileName);  // Usa putFileAs per salvare con nome specifico

        $user->profile_image = $path;
        $user->save();

        /**
         * Redirects the user to the 'about' route and displays a success message.
         *
         * This method is used to redirect the user to the 'about' route after a successful image upload, and display a success message to the user.
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        return redirect()->route('user')->with('success', 'Immagine caricata con successo');
    }
}
