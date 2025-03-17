<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Notifications\CustomResetPassword;

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
}
