<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VerifyAuthenticatedSessionController
{
    public function check()
    {
        return view('admin.auth.login-verify');
    }

    public function verify(Request $request)
    {
        $validatedData = $request->validate([
            'otp' => ['required', 'numeric', Rule::in([cache()->get(auth()->user()->id)])],
        ]);

        session()->put('verified', true);

        flash()->success('Welcome back!');

        return redirect()->route('admin.dashboard');
    }
}
