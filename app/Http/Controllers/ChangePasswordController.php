<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index() {
        return view('dashboard.user.change-password');
    }

    public function changePassword(Request $request)
    {       
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:6|string|confirmed',
        ]);

        $currentPassword = auth()->user()->password;
        $oldPassword = $request->old_password;
        
        if (Hash::check($oldPassword, $currentPassword)) {
            $id = auth()->user()->id_user;
            User::where('id_user', $id)->update([
                'password' => bcrypt($request->password)
            ]);
    
            return back()->with('success','Password Berhasil Diupdate');
        }else{
            return back()->with('warning','Password tidak sesuai');
        }
    }
}
