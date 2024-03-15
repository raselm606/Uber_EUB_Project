<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($code)
    {
        $user = User::where('verification_code', $code)->first();

        if (!$user) {
            $notification = array(
                'msg' =>'Verification Link has expired!',
                'alert-type' =>'danger',
            );
            return redirect()->route('login')->with($notification);
        }

        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->save();

        $notification = array(
            'msg' =>'Email verification successful. You can now log in.',
            'alert-type' =>'success',
        );

        return redirect()->route('login')->with($notification);
    }
}
