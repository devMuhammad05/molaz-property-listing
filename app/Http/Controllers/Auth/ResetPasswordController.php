<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function edit()
    {
        if (! cache()->get('email')) {
            return redirect('/');
        }

        return view('admin.auth.password-reset');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);

        $identifier = cache()->get('email');

        $user = User::where('email', $identifier);
        $user->update(['password' => Hash::make($request->password)]);

        flash()->success('Password reset successful, you can now login');

        return redirect()->route('login');
    }
}
