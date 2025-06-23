<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\SendOtpNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ForgetPasswordController extends Controller
{
    public function create()
    {
        return view('admin.auth.forget-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        $sendOtp = $this->sendOtp($request->email);

        if (! $sendOtp) {
            flash()->error('Failed to send OTP. Please try again.');

            return back();
        }

        flash()->success('Otp has been sent to your mail successfully');

        return redirect(route('otp.verify'));
    }

    public function sendOtp(string $email): bool
    {
        $otp = fake()->numberBetween(1111, 9999);

        cache()->delete('email');
        cache()->delete($email);

        cache()->put('email', $email, now()->addMinutes(30));
        $saved = cache()->put($email, $otp, now()->addMinutes(30));

        $user = User::where(['email' => $email])->firstOrFail();

        if ($saved) {
            try {
                Notification::send($user, new SendOtpNotification($otp));

                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

        return false;
    }
}
