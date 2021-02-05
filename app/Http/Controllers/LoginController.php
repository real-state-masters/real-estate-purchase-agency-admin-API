<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth\Token\Exception\InvalidToken;

class LoginController extends Controller
{
    //

    public function login(Request $request)
    {

        // Launch Firebase Auth
        $auth = app('firebase.auth');
        // Retrieve the Firebase credential's token
        $idTokenString = $request->input('Firebasetoken');


        try { // Try to verify the Firebase credential token with Google

            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
        } catch (\InvalidArgumentException $e) { // If the token has the wrong format

            return response()->json([
                'message' => 'Unauthorized - Can\'t parse the token: ' . $e->getMessage()
            ], 401);
        } catch (InvalidToken $e) { // If the token is invalid (expired ...)

            return response()->json([
                'message' => 'Unauthorized - Token is invalide: ' . $e->getMessage()
            ], 401);
        }
        return 'success';
        // Retrieve the UID (User ID) from the verified Firebase credential's token
        // $uid = $verifiedIdToken->getClaim('sub');

        // // Retrieve the user model linked with the Firebase UID
        // $user = User::where('firebaseUID',$uid)->first();

        // // Here you could check if the user model exist and if not create it
        // // For simplicity we will ignore this step

        // // Once we got a valid user model
        // // Create a Personnal Access Token
        // $tokenResult = $user->createToken('Personal Access Token');

        // // Store the created token
        // $token = $tokenResult->token;

        // // Add a expiration date to the token
        // $token->expires_at = Carbon::now()->addWeeks(1);

        // // Save the token to the user
        // $token->save();

        // // Return a JSON object containing the token datas
        // // You may format this object to suit your needs
        // return response()->json([
        //   'id' => $user->id,
        //   'access_token' => $tokenResult->accessToken,
        //   'token_type' => 'Bearer',
        //   'expires_at' => Carbon::parse(
        //     $tokenResult->token->expires_at
        //   )->toDateTimeString()
        // ]);

    }
}
