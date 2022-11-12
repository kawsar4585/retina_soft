<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
// use Socialite;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    use HasRoles;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $this->credentials($request);
        $this->validateLogin($request);

        if ($this->guard()->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $user = User::where('email',$credentials['email'])->first();
            if($user){

                return [
                    'message'=>'success',
                    'role'=>Auth::user()->hasRole('admin')?'admin':'user',
                ];

            }

        }


        return ["message" => "These credentials do not match our records."];
    }


    protected function authenticated(Request $request, $user)
    {
        if (Auth::user()->hasRole('admin')){

            return redirect('/admin/dashboard');

        }else{

            return redirect('/user/dashboard');

        }
    }

    public function redirectToProvider($provider='google')
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider='google'){

        $userSocial = Socialite::driver($provider)->user();
        //  dd($userSocial);
        //  return;

        if(!$userSocial->email){

            return redirect('/login')->withErrors('No associated email found with your '.$provider.' account');

        }

        $user = User::where('email', $userSocial->email)->first();

        if ($user) {


            if ($user->source==$provider)
            {

                if($user->status=='active'){
                    Auth::login($user);
                    return redirect('/user/dashboard');
                }else{

                    return redirect('/login')->withErrors('Your account has been Inactive!');

                }


            }
            return redirect('/login')->withErrors('Login with your '.ucfirst($user->source).' Account');
        }

          // All Providers
          $name = $userSocial->getName();
          $email = $userSocial->getEmail();
          $status = 'active';
          $source = 'google';


          $user= User::create([
              'name'    => $name,
              'email' => $email,
              'email_verified_at'=>date('Y-m-d H:i:s'),
              'password' => Hash::make(uniqid()),
              'source'=> $source,
              'status'=>$status
          ]);

          $user->assignRole('user');
          Auth::login($user);
          return redirect('/user/dashboard');


    }

}
