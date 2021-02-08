<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth\Token\Exception\InvalidToken;

class VerifyFirebase
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Launch Firebase Auth

        if(isset($request->jwt)){
            if(env('CLIENT_TOKEN')===$request->jwt){
                return $next($request);
            }
            return response()->json([
                'message' => 'Prueba de nuevo '
            ], 401);
        }

        $auth = app('firebase.auth');
        // Retrieve the Firebase credential's token
        // $idTokenString = $request->input('Firebasetoken');
        $idTokenString = $request->bearerToken();
        try { // Try to verify the Firebase credential token with Google

            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
        } catch (\InvalidArgumentException $e) { // If the token has the wrong format

            return response()->json([
                'message' => 'Unauthorized - Can\'t parse the token: ' . $e->getMessage()
            ], 401);
        } catch (InvalidToken $e) { // If the token is invalid (expired ...)

            return response()->json([
                'message' => 'Unauthorized - Token is invalid: ' . $e->getMessage()
            ], 401);
        }
        return $next($request);
    }
}
