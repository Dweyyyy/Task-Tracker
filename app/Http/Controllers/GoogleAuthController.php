<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
{
    try {
        $googleUser = Socialite::driver('google')->user();

        \Log::info('GOOGLE CALLBACK: Socialite user received', [
            'google_id' => $googleUser->id,
            'email' => $googleUser->email,
            'name' => $googleUser->name,
        ]);

        $user = User::where('google_id', $googleUser->id)
            ->orWhere('email', $googleUser->email)
            ->first();

        \Log::info('GOOGLE CALLBACK: User lookup completed', [
            'user_found' => $user !== null,
            'user_id' => $user?->id,
        ]);

        if ($user) {
            $user->update([
                'google_id' => $googleUser->id,
                'name' => $googleUser->name,
            ]);
        } else {
            $user = User::create([
                'google_id' => $googleUser->id,
                'name' => $googleUser->name,
                'email' => $googleUser->email,
            ]);
        }

        \Log::info('GOOGLE CALLBACK: User saved', [
            'user_id' => $user->id,
        ]);

        Auth::login($user);

        \Log::info('GOOGLE CALLBACK: Auth login completed', [
            'user_id' => $user->id,
        ]);

        return redirect()->route('tasks.index');

    } catch (\Throwable $e) {

        \Log::error('GOOGLE CALLBACK FAILED', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString(),
        ]);

        return response()->json([
            'error' => 'Google login failed',
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ], 500);
    }
}

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}