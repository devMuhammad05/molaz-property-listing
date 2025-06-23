<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VerifyOtpController extends Controller
{
    public function create()
    {
        return view('admin.auth.verify-otp');
    }

    public function store(Request $request)
    {
        $email = cache()->get('email');

        $request->validate([
            'otp' => ['required', Rule::in(cache()->get($email))],
        ]);

        cache()->forget($email);

        //        2619
        return redirect()->route('reset.password');
    }
}
