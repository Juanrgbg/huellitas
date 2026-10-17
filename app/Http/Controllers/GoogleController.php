<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //Manda al usuario a la pantalla de google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    //Google lo devuelve aqui con sus datos
    public function callback(Request $request)
    {
        try {
        $googleUser = Socialite::driver('google')->user();
    } catch (\Throwable $e) {
        Log::error('Error Google: ' . get_class($e) . ' - ' . $e->getMessage());

        return redirect()->route('login')
            ->withErrors(['email' => 'No se pudo iniciar sesión con Google. Intenta de nuevo.']);
    }

    // Busca por google_id o, si ya se había registrado con ese correo, por email
    $user = User::where('google_id', $googleUser->getId())
        ->orWhere('email', $googleUser->getEmail())
        ->first();

    if ($user) {
            $user->update([
                'google_id' => $user->google_id ?? $googleUser->getId(),
                'avatar' => $googleUser->getAvatar()
                ]);
    } else {
        $user = User::create([
            'name'      => $googleUser->user['given_name'] ?? $googleUser->getName(),
            'apellido'  => $googleUser->user['family_name'] ?? '',
            'email'     => $googleUser->getEmail(),
            'google_id' => $googleUser->getId(),
            'avatar' => $googleUser->getAvatar(),
            'password'  => Str::password(32),
        ]);
    }

    Auth::login($user, true);
    $request->session()->regenerate();

    return redirect()->intended(route('home'));
    }

}

