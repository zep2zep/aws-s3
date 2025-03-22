<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Notifications\CustomResetPassword;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Override method to send a custom password reset email.
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        $user = Password::getUser($request->only('email'));

        if ($user) {
            $user->notify(new CustomResetPassword($response));
        }

        return back()->with('status', trans($response));
    }

    public function showChangePasswordForm()
    {
        return view('auth.passwords.change'); // Creeremo questa vista
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La password attuale non è corretta.']);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('user')->with('success', 'Password aggiornata con successo!');
    }
}
