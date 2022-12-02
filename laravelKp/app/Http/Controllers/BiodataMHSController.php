<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class BiodataMHSController extends Controller
{
    public function index()
    {

        return view('operator.biodata');
    }

    public function update(Request $request)
    {

        $user = User::findorfail(Auth::id());

        $user['firtsname'] = $request->firstname;
        $user['email'] = $request->email;

        $user->update();

        // dd($user['no_hp']);

        return redirect()->back()->with('toast_success', 'User berhasil diubah.');
    }
}
