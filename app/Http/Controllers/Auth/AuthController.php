<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Request;
use App\Transformers\UserTransformer;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends BaseController
{
    public function authenticate(Request $request)
    {
        //grab credentials from the request.
        $credentials = $request->only('email', 'password');

        try {
            //attempt to verify the credentials and create a token for the user.
            if (!$token = JWTAuth::attepmt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser(UserTransformer $userTransformer)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return $this->item($user, new $userTransformer);
    }
}
