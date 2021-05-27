<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/login';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request)
    {
        $user = User::find($request->route('id'));
        if ($user->hasVerifiedEmail()) {
            if(!$request->hasValidSignature()){
                return redirect('/login')->with('error','Błędny link aktywacyjny (nieprawidłowa sygantura)');
            }
            if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
                return redirect('/login')->with('error','Link aktywacyjny jest nieprawidłowy');
            }
            return redirect('/login')->with('error','Konto zostało już aktywowane');
        }
        else{
            if ($user->markEmailAsVerified())
                event(new Verified($user));

            return redirect('/login')->with('success','Konto zostało pomyślnie aktywowane');
        }
    }




}
