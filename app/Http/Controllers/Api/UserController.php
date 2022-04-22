<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Barangay;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{


    private $successStatus = 200;

    public function Login(Request $request)
    {
        try {

            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error_message = '';
                foreach ($validator->errors()->messages() as $key => $value) {
                    $error_message = $value;
                }
                return response()->json([
                    'success' => false,
                    'status' => $this->successStatus,
                    'message' => $error_message[0]
                ],
                    $this->successStatus
                );
            }
            if (User::all()->count() > 0) {

                $customerLogin = User::when($request->email, function ($query) use ($request) {
                    $query->where('email', $request->email);
                })->first();

                if (!$customerLogin) {
                    if ($request->email) {
                        return response()->json([
                            'success' => false,
                            'status' => $this->successStatus,
                            'message' => "No user registered with this email address"
                        ], $this->successStatus);
                    }

                } elseif (!$customerLogin || !Hash::check($request->password, $customerLogin->password)) {
                    return response()->json([
                        'success' => false,
                        'status' => $this->successStatus,
                        'message' => $request->email . "Incorrect email or password"
                    ], $this->successStatus);

                } else {
                    $response = User::where('email', $request->email)->firstOrFail();
                    $token = $response->createToken('auth_token')->plainTextToken;

                    return response()->json([
                        'success' => true,
                        'status' => $this->successStatus,
                        'message' => "Success! you are logged in successfully",
                        'data' => $response,
                        'access_token' => $token,
                    ],
                        $this->successStatus);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'status' => $this->successStatus,
                    'message' => 'No user registered found'
                ], $this->successStatus);

            }
        } catch (Exception $e) {
            return response()->json([
                    'success' => false,
                    'status' => $this->successStatus,
                    'message' => @$e->getMessage()]
                , $this->successStatus
            );
        }
    }

    // Register customer from here
    public function Register(Request $request)
    {
        try {
            Log::info(json_encode($_REQUEST) . 'Registration');


            $rules = [
                'name' => 'required',
                //  'mobile'                => 'required|digits_between:10,13|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'street_address' => 'required',
                'province_id' => 'required',
                'city_id' => 'required',
                'barangay_id' => 'required',
                'region_id' => 'required',
                'contact_number' => 'required|digits_between:10,13'
            ];
            $messages = [
                'email.unique' => 'An user with this email is already registered.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);


            if ($validator->fails()) {
                Log::info(json_encode($validator->errors()) . 'Registration');

                $error_message = '';
                foreach ($validator->errors()->messages() as $key => $value) {
                    $error_message = $value;
                }

                return response()->json([
                    'success' => false,
                    'status' => $this->successStatus,
                    'message' => $error_message[0]],
                    $this->successStatus);
            }

            $customerDataSave = User::create([
                'name' => ucwords($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'street_address' => $request->street_address,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'barangay_id' => $request->barangay_id,
                'region_id' => $request->region_id,
                'contact_number' => $request->contact_number
            ]);

            if ($customerDataSave) {
                $customerLogin = User::where('email', $request->email)->first();
                $response = $customerLogin;

                $token = $response->createToken('auth_token')->plainTextToken;
                event(new Registered($customerLogin));

                return response()->json([
                    'success' => true,
                    'status' => $this->successStatus,
                    'data' => $response,
                    'message' => 'Your account has been created successfully',
                    'access_token' => $token
                ], $this->successStatus);

            } else {
                Log::info('408');
                return response()->json([
                    'success' => false,
                    'status' => $this->successStatus,
                    'message' => 'Your registration failed! Please try again'
                ], $this->successStatus);

            }

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'status' => $this->successStatus,
                'message' => @$e->getMessage()
            ], $this->successStatus);
        }
    }

    public function verify($user_id, Request $request)
    {
        if (!$request->hasValidSignature()) {
            return response()->json(["msg" => "Invalid/Expired url provided."], 401);
        }

        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect()->to('/');
    }

    public function resend()
    {
        if (auth()->user()->hasVerifiedEmail()) {
            return response()->json(["msg" => "Email already verified."], 400);
        }

        auth()->user()->sendEmailVerificationNotification();

        return response()->json(["msg" => "Email verification link sent on your email id"]);
    }

    public function provinceListing()
    {
        $response = Province::get();
        if (count($response) > 0) {
            return response()->json([
                'success' => true,
                'status' => $this->successStatus,
                'message' => "Success",
                'data' => $response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success' => false,
                'status' => $this->successStatus,
                'message' => 'No Data found'
            ], $this->successStatus);

        }
    }

    public function cityListing()
    {
        $response = City::get();
        if (count($response) > 0) {
            return response()->json([
                'success' => true,
                'status' => $this->successStatus,
                'message' => "Success",
                'data' => $response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success' => false,
                'status' => $this->successStatus,
                'message' => 'No Data found'
            ], $this->successStatus);

        }
    }

    public function barangayListing()
    {
        $response = Barangay::get();
        if (count($response) > 0) {
            return response()->json([
                'success' => true,
                'status' => $this->successStatus,
                'message' => "Success",
                'data' => $response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success' => false,
                'status' => $this->successStatus,
                'message' => 'No Data found'
            ], $this->successStatus);

        }
    }

    public function Me()
    {
        $response = Auth::user();
        if (!!$response) {
            return response()->json([
                'success' => true,
                'status' => $this->successStatus,
                'message' => "Success",
                'data' => $response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success' => false,
                'status' => $this->successStatus,
                'message' => 'user not login'
            ], $this->successStatus);

        }
    }


}
