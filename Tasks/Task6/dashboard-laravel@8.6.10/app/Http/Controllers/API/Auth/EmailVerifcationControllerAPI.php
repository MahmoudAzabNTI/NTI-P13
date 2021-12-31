<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmailVerifcationControllerAPI extends Controller
{
    //
    public function sendCode(Request $request)
    {
        #token
        $token = $request->header('authorization');
        #guard
        $authticatedUser = Auth::guard('sanctum')->user();
        #find
        $user = User::find($authticatedUser->id);
        #update code in database
        $user->code = rand(10000, 99999);
        $user->save();
        #send mail with code
        $user->token = $token;
        #response
        return response()->json(['success' => true, 'data' => $user, 'message' => "Code Send Successfully"]);
    }
}
