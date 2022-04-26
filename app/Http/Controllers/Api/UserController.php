<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Barangay;
use App\Models\City;
use App\Models\Province;
use App\Models\ServiceCategory;
use App\Models\AdminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{


    private $successStatus  =   200;
    public function Login(Request $request){
        try {

            $rules = [
                'email'             => 'required|email',
                'password'          => 'required|min:8',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                $error_message = '';
                foreach ($validator->errors()->messages() as $key => $value) {
                    $error_message = $value;
                }
                return response()->json([
                    'success'   =>false,
                    'status'    =>$this->successStatus,
                    'message'   => $error_message[0]
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
                            'success'    =>false,
                            'status'     =>$this->successStatus,
                            'message'    => "No user registered with this email address"
                        ], $this->successStatus);
                    }

                }elseif (!$customerLogin || !Hash::check($request->password, $customerLogin->password)) {
                    return response()->json([
                        'success'   =>false,
                        'status'    =>$this->successStatus,
                        'message'   => $request->email . "Incorrect email or password"
                    ], $this->successStatus);

                }else {
                    User::where('email', $request->email)
                        ->update([
                            'device_type' => $request->device_type,
                            'device_token' => $request->device_token
                        ]);
                    $response  = User::where('email', $request->email)->firstOrFail();
                    //   $updateToken=User::find
                    $token     = $response->createToken('auth_token')->plainTextToken;

                    return response()->json([
                        'success'       =>true,
                        'status'        =>$this->successStatus,
                        'message'       =>"Success! you are logged in successfully",
                        'data'          =>$response,
                        'access_token'  => $token,
                    ],
                        $this->successStatus);
                }
            } else {
                return response()->json([
                    'success'   =>false,
                    'status'    =>$this->successStatus,
                    'message'   => 'No user registered found'
                ], $this->successStatus);

            }
        } catch (Exception $e) {
            return response()->json([
                    'success'   =>false,
                    'status'    =>$this->successStatus,
                    'message'   => @$e->getMessage()]
                , $this->successStatus
            );
        }
    }

    // Register customer from here
    public function Register(Request $request)
    {
        try {
            Log::info(json_encode( $_REQUEST).'Registration');


            $rules = [
                'name'                  => 'required',
                //  'mobile'                => 'required|digits_between:10,13|unique:users',
                'email'                 => 'required|email|unique:users',
                'password'              => 'required|min:8',
                'street_address'        =>  'required',
                'province_id'           =>  'required',
                'city_id'               =>  'required',
                'barangay_id'           =>  'required',
                'region_id'             =>  'required',
                'contact_number'        =>  'required|digits_between:10,13'
            ];
            $messages = [
                'email.unique'    => 'An user with this email is already registered.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);


            if ($validator->fails()) {
                Log::info(json_encode( $validator->errors()).'Registration');

                $error_message = '';
                foreach ($validator->errors()->messages() as $key => $value) {
                    $error_message = $value;
                }

                return response()->json([
                    'success'   =>false,
                    'status'    =>$this->successStatus,
                    'message'   => $error_message[0]],
                    $this->successStatus);
            }

            $customerDataSave = User::create([
                'name'                  => ucwords($request->name),
                'email'                 => $request->email,
                'password'              => Hash::make($request->password),
                'street_address'        => $request->street_address,
                'province_id'           => $request->province_id,
                'city_id'               => $request->city_id,
                'barangay_id'           => $request->barangay_id,
                'region_id'             => $request->region_id,
                'contact_number'        => $request->contact_number,
                'user_type'             => $request->user_type?$request->user_type:'user',
                'service_category_id'   => $request->service_category_id ? $request->service_category_id:null,
                'device_type'           => $request->device_type ? $request->device_type:null,
                'device_token'          => $request->device_token ? $request->device_token:null,
            ]);

            if($customerDataSave) {
                $customerLogin = User::where('email', $request->email)->first();
                $response = $customerLogin;

                $token = $response->createToken('auth_token')->plainTextToken;
                event(new Registered($customerLogin));

                return response()->json([
                    'success'       =>true,
                    'status'        =>$this->successStatus,
                    'data'          =>$response,
                    'message'       => 'Your account has been created successfully',
                    'access_token'  => $token
                ], $this->successStatus);

            }else{
                Log::info('408' );
                return response()->json([
                    'success'   =>false,
                    'status'    =>$this->successStatus,
                    'message'   => 'Your registration failed! Please try again'
                ], $this->successStatus);

            }

        } catch (Exception $e) {
            return response()->json([
                'success'   =>false,
                'status'    =>$this->successStatus,
                'message'   => @$e->getMessage()
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
        $response  = Province::get();
        if (count($response) > 0) {
            return response()->json([
                'success'       =>true,
                'status'        =>$this->successStatus,
                'message'       =>"Success",
                'data'          =>$response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success'   =>false,
                'status'    =>$this->successStatus,
                'message'   => 'No Data found'
            ], $this->successStatus);

        }
    }
    public function cityListing()
    {
        $response  = City::get();
        if (count($response) > 0) {
            return response()->json([
                'success'       =>true,
                'status'        =>$this->successStatus,
                'message'       =>"Success",
                'data'          =>$response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success'   =>false,
                'status'    =>$this->successStatus,
                'message'   => 'No Data found'
            ], $this->successStatus);

        }
    }
    public function barangayListing()
    {
        $response  = Barangay::get();
        if (count($response) > 0) {
            return response()->json([
                'success'       =>true,
                'status'        =>$this->successStatus,
                'message'       =>"Success",
                'data'          =>$response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success'   =>false,
                'status'    =>$this->successStatus,
                'message'   => 'No Data found'
            ], $this->successStatus);

        }
    }
    public function serviceCatListing()
    {
        $response  = ServiceCategory::get();
        if (count($response) > 0) {
            return response()->json([
                'success'       =>true,
                'status'        =>$this->successStatus,
                'message'       =>"Success",
                'data'          =>$response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success'   =>false,
                'status'    =>$this->successStatus,
                'message'   => 'No Data found'
            ], $this->successStatus);

        }
    }
    public function Me()
    {
        $response = Auth::user();
        if (!!$response) {
            return response()->json([
                'success'       =>true,
                'status'        =>$this->successStatus,
                'message'       =>"Success",
                'data'          =>$response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success'   =>false,
                'status'    =>$this->successStatus,
                'message'   => 'user not login'
            ], $this->successStatus);

        }
    }
    public function adminByCat(Request $request)
    {
        $response  = User::where('user_type','admin')->where('service_category_id',$request->categoryID)->get();
        if (count($response) > 0) {
            return response()->json([
                'success'       =>true,
                'status'        =>$this->successStatus,
                'message'       =>"Success",
                'data'          =>$response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success'   =>false,
                'status'    =>$this->successStatus,
                'message'   => 'No Data found'
            ], $this->successStatus);

        }
    }
    public function addAdminNotification(Request $request)
    {
        $adminIDS=explode(',',$request->adminIDS);
        foreach($adminIDS as $admin){
            $enter = new AdminNotification();
            $enter->adminID =$admin;
            $enter->userID =Auth::user()->id;
            $enter->categoryID=$request->categoryID;
            $enter->message=$request->message?$request->message:null;
            $enter->save();
            $admin=User::find($admin);
            if(!!$admin->device_token){
                $response=$this->sendNotification($admin->device_token, array(
                    "title" => "Sample Message",
                    "body" => "This is Test message body"
                ));
            }
        }
        return response()->json([
            'success'       =>true,
            'status'        =>$this->successStatus,
            'message'       =>"Success"
        ],
            $this->successStatus);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification($device_token, $message)
    {
        $SERVER_API_KEY = 'AAAABhl23yA:APA91bHOq48XLXJRObNkph_dh7qV_MzzdnTp-LGUIqAvaE1jaIbx8xBYjb24CY3xi8ZwjSfgC7vOOOwzuNTgkXfGJk0Xvd_YvSZWU76Mqz7zrMBhdqD1XaSR4HJFfU7RIjFdhGiUsiVm';
        // payload data, it will vary according to requirement
        $data = [
            "to" => $device_token, // for single device id
            "notification" => $message
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }



    public function getNotificationList()
    {
        $response  = AdminNotification::where('status',0)->where('adminID',Auth::user()->id)->get();
        if (count($response) > 0) {
            return response()->json([
                'success'       =>true,
                'status'        =>$this->successStatus,
                'message'       =>"Success",
                'data'          =>$response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success'   =>false,
                'status'    =>$this->successStatus,
                'message'   => 'No Data found'
            ], $this->successStatus);
        }

    }
    public function acceptReject(Request $request)
    {
        AdminNotification::where('id', $request->id)->update([
            'status' => $request->status
        ]);
        $response=AdminNotification::find($request->id);
        AdminNotification::where('userID', $response->userID)->where('status',0)->update([
            'status' => 2
        ]);
        $response  = AdminNotification::where('adminID',Auth::user()->id)->get();
        if (count($response) > 0) {
            return response()->json([
                'success'       =>true,
                'status'        =>$this->successStatus,
                'message'       =>"Success",
                'data'          =>$response
            ],
                $this->successStatus);
        } else {
            return response()->json([
                'success'   =>false,
                'status'    =>$this->successStatus,
                'message'   => 'No Data found'
            ], $this->successStatus);
        }

    }



    public function request_otp(Request $request)
    {
        $otp = rand(1000,9999);
        $user = User::where('email',$request->email)->update(['otp' => $otp]);

        if($user){

            $mail_details = [
                'subject' => 'Testing Application OTP',
                'body' => 'Your OTP is : '. $otp
            ];

            Mail::to($request->email)->send(new sendEmail($mail_details));
            Mail::send([], $mail_details, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                    ->subject("Laravel Test Mail");
                $message->from("preealweb@gmail.com","Test Mail");
            });
            return response(["status" => 200, "message" => "OTP sent successfully"]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }
    }
}
