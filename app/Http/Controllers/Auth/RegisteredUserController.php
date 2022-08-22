<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\StripeHelperTrait;
use App\Models\Account;
use App\Models\Notification;
use App\Models\Role;
use App\Models\User;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    // use StripeHelperTrait;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $role = Role::where('id', 2)->firstOrFail();
        return view('auth.register', ['role'=>$role]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'firstname' => Str::title($request->firstname),
            'lastname' => Str::title($request->lastname),
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        $latestUser = User::orderBy('created_at', 'desc')->first();
        $notification = new Notification();
        $notification->type = "User";
        $notification->content = "A new account has been created by".' '. auth()->user()->firstname.' '.auth()->user()->lastname;
        $notification->user()->associate($latestUser->id);
        $notification->save();


        event(new Registered($user));

        Auth::login($user);

        $wallet = new Wallet();
        $wallet->user()->associate(auth()->user());
        $wallet->save();

        return redirect(RouteServiceProvider::HOME);
    }

    public function profile_update(Request $request, $id){

        $request->validate([
            'phone_num' => 'required|numeric',
            'address_1' => 'required',
            'address_2' => 'nullable|string',
            'website' => 'nullable|string'
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user->phone_num = $request->phone_num;
        $user->website = $request->website;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->save();

        return redirect()->route('dashboard');
    }
}
