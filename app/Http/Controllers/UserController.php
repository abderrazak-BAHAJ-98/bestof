<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Method Register Account 
     * 
     * @return array
     */
    public function Register(StoreUserRequest $req )
    {
        $newUser = User::create([
            'first_name' => $req->first_name,
            'last_name'=>$req->last_name,
            'address'=>$req->address,
            'phone_number'=>$req->phone_number,
            'Date_birth'=>$req->Date_birth,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
        ]);
        return response(['message'=>'User have been Register Success']);
    }

    /**
     * Method Login User And Create Tokens 
     *
     * @return array
     */


    public function Login(Request $req)
    {
        $login = $req->validate([
            'email'=>'required|string|email',
            'password'=>'required|string'
        ]);
        if(!Auth::attempt($login)){
            return response( ['message'=>'Invalid Login credentials.'],201);
        }
        $accessToken =Auth::user()->createToken('authToken')->accessToken;
        return response([
            'user'=>Auth::user(),
            'access_Token'=>$accessToken
        ]);
    }

}
