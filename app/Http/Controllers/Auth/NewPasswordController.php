<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\NewPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(): View
    {
        $user = auth()->user();
        $page = 'settings';

        return view('user.settings.change-password', compact('user', 'page'));
    }

    /**
     * Update the user's password.
     */
    public function update(NewPasswordRequest $request)
    {
        $validated = $request->validated();

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        flash()->success('Password updated successfully');

        return back();
    }
}
