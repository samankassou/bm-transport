<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

/**
 * @codeCoverageIgnore
 */
final class RegisteredUserController
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $company = $this->createCompany('Test Company');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $company->id,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    private function createCompany(string $name): Company
    {
        return Company::create([
            'name' => $name,
            'domain' => 'test-company',
            'address' => '123 Test St.',
            'phone' => '123-456-7890',
            'email' => 'company@test.co',
            'website' => 'https://test.co',
        ]);
    }
}
