<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class LoginController extends BaseController
{
    public function sendOtp(Request $request)
    {
        
        $request->validate([
            'phone_no' => 'required|integer',
            'email' => 'required|string|email',
            'password' => '123456',
        ]);

        $user = User::where(['email' => $request->email])->first();

        $randomNumber = rand(1000, 9999);

        if (empty($user)) {
            
            try {
                $user = User::create([
                    'phone_no' => $request->phone_no,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'otp' => $randomNumber,
                    'otp_verify' => false
                ]);
                
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }

        } else {

                $otpVerify = $user->update(['otp_verify' => false, 'otp' => $randomNumber]);

            // return response()->json(['message' => "OTP Sent in registered email-id - To login verify OTP"], 201);

        }

        // return response()->json(['message' => 'User registered successfully and Sent OTP in provided Email ID'], 201);

            // Email Sending Server settings
            // Load PHPMailer
            $mail = new PHPMailer(true);

            $options["ssl"] = array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true,
            );

            try {
                    $mail->SMTPDebug = false;
                    $mail->isSMTP();
                    $mail->Host = 'smtp-relay.brevo.com';
                    // $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
                    $mail->SMTPAuth = true;
                    $mail->Username = '67d9b3001@smtp-brevo.com'; // Replace with your SMTP username
                    $mail->Password = 'tp7gZ8kzxPmCNO03'; // Replace with your SMTP password
                    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587; // TCP port (use 465 for SSL)
    
                    $mail->smtpConnect($options);
    
                    // Recipients
                    $mail->setFrom('mohandurai@gmail.com', 'Mohan Durai'); // Sender email and name
                    $mail->addAddress($request->email, 'My Test Sending Mail'); // Add a recipient
    
                    // Content
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'OTP Email from PHPMailer';
                    $mail->Body    = '<h1>Hello!</h1><p>Hello! OTP for Genie Monie Play App is ........ <b>' . $randomNumber . '</b> </p>';
                    $mail->AltBody = 'Hello! OTP for Genie Monie Play App - ' . $randomNumber;
                    // Send email
                    $mail->send();
                    // return response()->json($success, 200);
                    $success['success'] = "true";
                    $success['message'] = "OTP Sent Successfully in registered email-id";
                    return response()->json($success, 201);
    
                } catch (Exception $e) {
                    return response()->json(['error' => "Email could not be sent. Mailer Error: {$mail->ErrorInfo}"], 500);
                }
            // Ends Email Server settings

    }

    public function otpVerify(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'otp' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user->otp == $request->otp) {

        // echo $user->otp . " <<<===== " . $request->otp . " ==== " . $user->status . " ==== " . $user->email;
        // print_r($user->all());
        // exit;
            
            if ($user->status == 1 || $user->role_id != "") {
                $success['user_status'] = "Already Registered";
                if($user->role_id != ""){
                    $success['user_role'] = substr($user->role_id,3,2);
                } else {
                    $success['user_role'] = "";
                }
            } else {
                $success['user_status'] = "New User";
            }

            $token = $user->createToken('api-token')->plainTextToken;

            $otpVerify = $user->update(['otp_verify' => true, 'status' => true]);
                $success['success'] = "true";
                $success['message'] = "OTP verification Successfull !!!";
                $success['token'] = $token;
                return response()->json($success, 201);

        } else {
                $otpVerify = $user->update(['otp_verify' => false]);
                $success['success'] = "false";
                $success['message'] = "Error ! OTP verification Not Successfull - Please try again ....";
                return response()->json($success, 201);
        }

    }

    public function enterName(Request $request)
    {
        // print_r($request->user()->id);
        // exit;
        
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'city_id' => 'required',
                'state_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => error_processor($validator)], 403);
            }

            $user = User::where('id', $request->user()->id)->first();
            $enterName = $user->update(['name' => $request->name, 'referral_id' => $request->referral_id]);
            $success['name'] = $user->name;
            $success['referral_id'] = $user->referral_id;
            $success['success'] = "true";
            $success['message'] = "Full Name and Refferal ID updated successfully";
            return response()->json($success, 201);
            // return $this->sendResponse($success, 'Full Name and Refferal ID updated successfully');

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function enterLocation(Request $request)
    {
        
        try {
            $validator = Validator::make($request->all(), [
                'pincode' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => error_processor($validator)], 403);
            }

            $qry6 = "SELECT B.state_code FROM `city` A, `state` B WHERE A.pincode='$request->pincode' AND A.`status`='1' AND A.state_id = B.state_id";
            $code2 = DB::select($qry6);
            $stcode = $code2[0]->state_code;
            $usercode = $stcode . "-PL";
            // echo $usercode; 
            // exit;

            $qry7 = "SELECT MAX(SUBSTRING(user_id,6,12)) AS digit FROM `users` where user_id != '' AND SUBSTRING(user_id,1,5) = '$stcode-PL'";
            // echo $qry7;
            // exit;
            $code3 = DB::select($qry7);
            // echo $code3[0]->digit . " <<<====== ";
            // exit;
            if(empty($code3[0])) {
                $numpart = 1;
                $intpart = str_pad($numpart, 4, '0', STR_PAD_LEFT);    
            } else {
                $code3a = (int) $code3[0]->digit;
                $numpart = (int) $code3a + 1;
                $intpart = str_pad($numpart, 4, '0', STR_PAD_LEFT);    
            }
            
            $final_user_code = $usercode . $intpart;
            // echo $final_user_code . " <<<==== =";
            // exit;

            $user = User::where('id', $request->user()->id)->first();
            $enterLocation = $user->update(['pincode' => $request->pincode, 'user_id' => $final_user_code]);
            $success['success'] = "true";
            $success['pincode'] = $user->pincode;
            $success['user_id'] = $final_user_code;
            $success['message'] = "Pincode & User-ID updated successfully";
            return response()->json($success, 201);
            // return $this->sendResponse($success, '');

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }

    public function userStatus($userID)
    {
        try {

            $user = User::select('id', 'approved_status', 'user_type')->where('id', $userID)->first();
            return $this->sendResponse($user, 'user status retrive successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function cms()
    {
        try {
            $data = [];
            $cmsDetails = DB::table('cms')->first();
            $data['image_path'] = asset('uploads');
            $data['introScreen'] = ['screen_one_image' => $cmsDetails->screen_one_image, 'screen_one_content' => $cmsDetails->screen_one_content, 'screen_two_image' => $cmsDetails->screen_two_image, 'screen_two_content' => $cmsDetails->screen_two_content, 'screen_three_image' => $cmsDetails->screen_three_image, 'screen_three_content' => $cmsDetails->screen_three_content];
            $data['bde'] = ['bde_image' => $cmsDetails->bde_image, 'bde_question' => $cmsDetails->bde_question, 'bde_answer' => $cmsDetails->bde_answer];
            $data['franchise'] = ['franchise_image' => $cmsDetails->franchise_image, 'franchise_question' => $cmsDetails->franchise_question, 'franchise_answer' => $cmsDetails->franchise_answer];
            $data['advertise'] = ['advertise_image' => $cmsDetails->advertise_image, 'advertise_question' => $cmsDetails->advertise_question, 'advertise_answer' => $cmsDetails->advertise_answer];
            return $this->sendResponse($data, 'Cms fetch successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
