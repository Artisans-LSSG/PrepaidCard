<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;
use Exception;
use Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

public function requestOtp(Request $request)
{
    // echo 0;exit;
//return "hello";

$tomail = $request->email;
$otp = rand(1000, 9999);
Log::info("otp = " . $otp);
$user = User::where('email', $request->email)->update(['otp' => $otp]);
$affected = DB::table('users')
->where('email', $request->email)
->update(['otp' => $otp]);
$affected=true;

    if ($affected) {
        // send otp in the email
        $mail_details = 'Testing Application OTP';
        $temp = 'Your OTP is : ' . $otp;
        $mail_details = $mail_details.'---'.$temp;

Mail::raw($mail_details, function($message) use ($tomail)
{

            $message->to($tomail)
                    ->subject('Verify Your OTP');
        });

        return response(["status" => 200, "message" => "OTP sent successfully","otp"=>$otp]);
    } else {
        return response(["status" => 401, 'message' => 'Invalid']);
    }
}

public function verify_otp(Request $request){

    $email=$request->email;
    $otp=$request->otp;
    // return $otp;
    $time = \Carbon\Carbon::now();
    return $
    $verify=DB::table('users')
        ->where('email',$email )
        ->where('otp',$otp)
        ->update(['email_status' => 1 ,'email_verified_at' => \Carbon\Carbon::now()]);

    if($verify)
    {
        return response(["status" => 200, "message" => "OTP verified successfully"]);
    }
    else{
        return response(["status" => 401, "message" => "OTP invalid "]);
    }
}
}
