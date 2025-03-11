<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($role): View
    {
          if (!in_array($role, ['expert', 'professional', 'trainee', 'client'])) {
            abort(404);
        }

        return view('custom-auth.register', compact('role'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:admin,expert,professional,trainee,client'],
        ]);

        if ($validated['role'] !== 'client') {
            $request->validate([
                'cv_path' => ['required', 'file', 'mimes:pdf,doc,docx'],
                'phone' => ['required', 'string', 'max:15'],
                'company_name' => ['required', 'string', 'max:255'],
                'experience_years' => ['required', 'integer', 'min:0'],
                'consultation_fee' => ['required', 'numeric', 'min:0'],
            ]);
        }
        $user = new User();
        $user->role = $validated['role'];
        $user->is_approved = ($validated['role'] === 'client') ? true : false;
        $user->phone = $validated['phone'] ?? null;
        $user->company_name = $validated['company_name'] ?? null;
        $user->experience_years = $validated['experience_years'] ?? null;
        $user->consultation_fee = $validated['consultation_fee'] ?? 0.00;



        if ($request->hasFile('cv_path')) {
            $cvPath = public_path('assets/cvs');
            if (!file_exists($cvPath)) {
                mkdir($cvPath, 0777, true);
            }
            $fileName = $request->file('cv_path')->getClientOriginalName();
            $request->file('cv_path')->move($cvPath, $fileName);
            $user->cv_path = 'assets/cvs/' . $fileName;
        }
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
