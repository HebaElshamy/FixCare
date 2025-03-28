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



        $user = new User();
        $user->role = $validated['role'];
        if($request->role != 'client'){
            $user->is_approved = 0;
            $user->phone = $request->phone;
            $user->company_name = $request->company_name;
            $user->experience_years = $request->experience_years;
            $user->consultation_fee = $request->consultation_fee ;
        }




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

        if (auth()->user()->role == 'client') {
            return redirect()->route('client.index');
        }

        if (in_array(auth()->user()->role, ['expert', 'professional', 'trainee'])) {
            return redirect()->route('team.index');
        }

        // return redirect(RouteServiceProvider::HOME);
    }


public function checkEmail(Request $request)
{
    $email = $request->input('email');
    $exists = User::where('email', $email)->exists();

    return response()->json(!$exists);
}








}
