<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\FirebaseUser;
use App\Models\UserMongo as User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Firebase\Auth\Token\Exception\InvalidToken;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $data = $request->except('token');

        $validatedData = Validator::make($data,[
            'name' => 'required|max:55',
            'email' => 'email|required',
            'firebaseUID' => 'required'
        ]);

        if ($validatedData->fails()) {
            return response(['error' => $validatedData->errors(), 'Validation Error'], 400);
        }


        // Launch Firebase Auth
        $auth = app('firebase.auth');
        // Retrieve the Firebase credential's token
        $idTokenString = $request->token;
        // $idTokenString = 'GciOiJSUzI1NiIsImtpZCI6IjJjMmVk';


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


        //$user = FirebaseUser::create(["firebaseUID" => $data["firebaseUID"]]);

        $data['password'] = Hash::make($request->password);
        User::insert($data);

        //$accessToken = $user->createToken('Personal Access Token')->accessToken;

        return response(['user' => $data], 201);
    }

    public function login(Request $request)
    {
        $data = $request->all();

        $validatedData = Validator::make($data,[
            'email' => 'email|required'
        ]);

        if ($validatedData->fails()) {
            return response(['error' => $validatedData->errors(), 'Validation Error'], 400);
        }


        // Launch Firebase Auth
        $auth = app('firebase.auth');
        // Retrieve the Firebase credential's token
        $idTokenString = $request->token;

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

        // Retrieve the UID (User ID) from the verified Firebase credential's token
        $uid = $verifiedIdToken->claims()->get('sub');

        // Retrieve the user model linked with the Firebase UID
        //$user = FirebaseUser::where('firebaseUID', $uid)->first();

        // Here you could check if the user model exist and if not create it
        // For simplicity we will ignore this step

        // Once we got a valid user model
        // Create a Personnal Access Token
        //$tokenResult = $user->createToken('Personal Access Token');

        // Store the created token
       // $token = $tokenResult->token;

        // Add a expiration date to the token
        //$token->expires_at = Carbon::now()->addWeeks(1);

        // Save the token to the user
        //$token->save();

        // Return a JSON object containing the token datas
        // You may format this object to suit your needs
        return response()->json([
            'connected' => 'true'
        ]);
    }
}
