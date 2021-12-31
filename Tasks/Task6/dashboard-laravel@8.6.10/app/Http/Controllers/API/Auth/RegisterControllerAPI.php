<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterControllerAPI extends Controller
{
    use ResponseTrait;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function __invoke(RegisterRequest $request)
    {      
        $data = $request->except('password','password_confirmation');
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        // dd($request->all());
        $user->token = "Bearer ". $user->createToken($request->device_name)->plainTextToken;
        return $this->dataResponse(compact('user'),"Regster Completed successfully", 201);
    }
}
