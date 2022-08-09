<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MarketController extends Controller
{
    //
    public function login()
    {
        //
        return view('market.auth.login');
    }

    public function register_create()
    {
        //

        $role = Role::where('id', 3)->firstOrFail();
        return view('market.auth.register', ['role'=>$role]);
    }

    public function seller_update(Request $request, $id)
    {
        //
        $request->validate([
            'phone_num' => 'integer|required',
            'address_1' => 'required',
            'website' => 'nullable|string'
        ]);

        $auth_user = auth()->user()->id;

        $user = User::findOrFail($auth_user);




        $user->phone_num = $request->phone_num;
        $user->website = $request->website;
        $user->address_1 = $request->address_1;


        $user->save();

        return redirect()->route('product.customer-payment');
    }
}
