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

        $user = User::where(['phone_no' => $request->phone_no, 'email' => $request->email])->first();

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

            $user = User::where(['phone_no' => $request->phone_no, 'email' => $request->email])->first();
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

                    return response()->json(['message' => 'OTP Sent in registered email-id - To login verify OTP'], 201);
    
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

        // echo $user->otp;
        // exit;

        if ($user->otp == $request->otp) {
            
            $token = $user->createToken('api-token')->plainTextToken;

            $otpVerify = $user->update(['otp_verify' => true]);
                $success['message'] = "OTP verification Successfull !!!";
                $success['token'] = $token;
                return response()->json($success, 201);

        } else {
                $otpVerify = $user->update(['otp_verify' => false]);
                $success['message'] = "OTP verification Not Successfull !!! Please try again ....";
                return $this->sendResponse($success, 201);
        }

    }

    public function enterName(Request $request)
    {
        // print_r($request->user()->id);
        // exit;
        
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'referral_id' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => error_processor($validator)], 403);
            }

            $user = User::where('id', $request->user()->id)->first();
            $enterName = $user->update(['name' => $request->name, 'referral_id' => $request->referral_id]);
            $success['name'] = $user->name;
            $success['referral_id'] = $user->referral_id;
            $success['message'] = "Success";
            return $this->sendResponse($success, 'Full Name and Refferal ID updated successfully');

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

            $user = User::where('id', $request->user()->id)->first();
            $enterLocation = $user->update(['pincode' => $request->pincode]);
            $success['pincode'] = $user->pincode;
            $success['message'] = "Success";
            return $this->sendResponse($success, 'Pincode updated successfully');

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
