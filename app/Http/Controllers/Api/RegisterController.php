<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
     public function register(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'name' => 'required',
             'email' => 'required|email',
             'password' => 'required',
             'c_password' => 'required|same:password',
         ]);
    
         if($validator->fails()){
            return response()->json([
                "data" => [],
                "error" => "Some error."
             ], 400);       
         }
    
         $input = $request->all();

         $userAlreadyExist = User::where('email', $input['email']);

         if($userAlreadyExist) {
            return response()->json([
                "data" => [],
                "error" => "User with this email already exists. Try to restore your password."
             ], 400);   
         }

         $input['password'] = bcrypt($input['password']);
         $user = User::create($input);
    
         return response()->json([
            "data" => [
                "user" => $user,
                "token" => $user->createToken('MyApp')->plainTextToken,
            ],
            "message" => "Registration success."
         ], 200);
     }
    
     /**
      * Login api
      *
      * @return \Illuminate\Http\Response
      */
     public function login(Request $request)
     {
         if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
             $user = Auth::user(); 
             $success['token'] =  $user->createToken('money-app')->plainTextToken; 
             $success['name'] =  $user->name;
    
             return response()->json([
                "data" => $success,
                "message" => "Login success."
             ], 200);
         } 
         else{ 
            return response()->json([
                "data" => [],
                "error" => "Some error."
             ], 401);
         } 
     }

     /**
      * 
      */
      public function profile(Request $request)
      {
            $user = $request->user();
            unset($user['email_verified_at']);


            return response()->json([
                "data" => $user,
                "message" => "Profile info."
             ], 200);

      }

     /**
      * 
      */
      public function logout(Request $request)
      {
            $request->user()->currentAccessToken()->delete();
      }
     
     /**
      * 
      */
      public function logoutAll(Request $request)
      {
            $request->user()->tokens()->delete();
      }
     
     /**
      * 
      */
      public function changePassword(Request $request)
      {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
            ]);


            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return response()->json([
                    "data" => [],
                    "error" => "Wrong password."
                 ], 401);
            }


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return response()->json([
                "data" => [],
                "error" => "Password changed!"
            ], 200);  
      }
      
}
