<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        try {

            $googleUser = Socialite::driver('google')->user();

            // ddd($user);

            // TODO: DBへクリエイト処理
            $user = User::firstOrCreate(
                ['email' => $googleUser->email],
                ['name' => $googleUser->name],
            );

            Auth::login($user);

            return redirect(env('FRONTEND_URL') . '/chat');
        } catch (Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
