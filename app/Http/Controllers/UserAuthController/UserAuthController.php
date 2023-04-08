<?php

namespace App\Http\Controllers\UserAuthController;

use stdClass;
use Mailgun\Mailgun;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mailgun\HttpClient\HttpClientConfigurator;

class UserAuthController extends Controller
{
    public function registrer(Request $request){
        $validateData=$request->validate([
            'first_name' => ['required','string','max:255', 'regex:/^[a-zA-Z]*$/'],
            'last_name' => ['required','string','max:255', 'regex:/^[a-zA-Z]*$/'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',

        ],[
            'first_name.regex' => 'The first_name field should only contain alphabets.',
            'last_name.regex' => 'The last_name field should only contain alphabets.',
        ]);
        $user=new User;
        $user->first_name=$validateData['first_name'];
        $user->last_name=$validateData['last_name'];
        $user->email=$validateData['email'];
        $user->password=$validateData['password'];
        $user->save();
        try{
            $token=JWTAuth::fromUser($user);
            session()->put('jwt_token', $token);
        }catch(JWTException $e){
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return redirect()->route('dashboard');
    }
    public function logIn(Request $request){
            $credentials = $request->only('email', 'password');
            if(!$token=JWTAuth::attempt($credentials)){
                return redirect()->back()->withErrors([
                    'email' => 'email or password not correct.',
                ])->withInput();
            }
            session(['jwt_token' => $token]);
            return redirect()->route('dashboard');
    }

    public function ForgetPassword(Request $request){

        $request->validate(['email'=>'required|email']);
        $user=User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->back()->withErrors([
                'email' => 'We could not find a user with that email address.'
            ]);
        }
        $token=Str::random(60);
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now()
        ]);
        $httpClientConfigurator = new HttpClientConfigurator();
        $httpClientConfigurator->setApiKey(env('MAILGUN_SECRET'));   
        $mgClient=new Mailgun($httpClientConfigurator);
        $domain = env('MAILGUN_DOMAIN');
        $link = URL::to('/password/reset', $token);
        $message = new stdClass();//object message
        $message->subject = 'Reset Password ElectricalSchoolHouse';
        $message->from = env('MAIL_FROM_ADDRESS');
        $message->to = $user->email;
        $message->html = view('authPages.passwords.reset', compact('link'))->render();
        try{
            $mgClient->messages()->send($domain, [
                'from' => $message->from,
                'to' => $message->to,
                'subject' => $message->subject,
                'html' => $message->html,
            ]);
        return redirect()->route('forgetpassword')->with('status', 'Password reset email sent!');
        }catch (\Exception $e) {
            Log::error($e);
            return redirect()->route('forgetpassword')->with('status', 'Error sending password reset email.');
        }
        
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('authPages.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = Password::reset($credentials, function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        });

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('logIn')->with('status', 'Password reset successfully!');
        } else {
            return back()->withErrors(['email' => [trans($response)]]);
        }
    }

}
