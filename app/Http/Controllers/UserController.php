<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use JWTAuth;
//use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;


class UserController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|',

            ]);

            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }

            $user = User::create([
                'name' => $request->json()->get('name'),
                'username' => $request->json()->get('username'),
                'password' => Hash::make($request->json()->get('password'))

                ]);

                $token = JWTAuth::fromUser($user);

                return response()->json(compact('user','token'), 201);
            }

            public function login(Request $request)
            {
                $credentials = $request->json()->all();

                try {
                    // attempt to verify the credentials and create a token for the user
                    if (!$token = JWTAuth::attempt($credentials)) {
                        return response()->json(['error' => 'invalid_credentials'], 400);
                    }
                } catch (JWTException $e) {
                    // something went wrong whilst attempting to encode the token
                    return response()->json(['error' => 'could_not_create_token'], 500);
                }

                // all good so return the token
                return response()->json(compact('token'));
            }



            public function getAuthenticatedUser()
            {
                try{
                    if(!$user == JWTAuth::parseToken()->authenticate()){
                        return response()->json(['user_not_found'], 404);
                    }
                }catch(Tymon\JWTAuth\Exceptions\TokenExpiredException $e){
                    return response()->json(['token_expired'], $e->getStatusCode());
                }catch(Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
                    return response()->json(['token_invalid'], $e->getStatusCode());
                }catch(Tymon\JWTAuth\Exceptions\JWTException $e){
                    return response()->json(['token_absent'], $e->getStatusCode());
                }
                    return response()->json(compact('user'));
                }


            public function logout()
            {
                Auth::logout();
            }
        }
