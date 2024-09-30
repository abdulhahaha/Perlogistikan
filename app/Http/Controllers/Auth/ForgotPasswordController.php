<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // Menampilkan form untuk permintaan reset password
    public function showLinkRequestForm()
    {
        return view('auth.forgot');
    }

    // Mengirim email berisi link untuk reset password
    public function sendResetLinkEmail(Request $request)
    {
        // Validasi email
        $request->validate(['email' => 'required|email']);

        // Kirim link reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Cek status dan kirim response sesuai dengan hasil pengiriman
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
}