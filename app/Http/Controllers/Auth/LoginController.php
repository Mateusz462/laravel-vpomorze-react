<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Session;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    public function login_page() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $email    = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password, 'status' => '1'])){
            Toastr::success('Zalogowano pomyślnie :)','Sukces');
            return redirect()->intended('/home')->with('success', 'Zalogowano pomyślnie :)');
        } elseif(Auth::attempt(['email'=>$email,'password'=>$password,'status'=>'0'])){
            Toastr::error('Błąd, Twoje konto jest zablokowane!','Error');
            return redirect('login')->with('error', 'Błąd, Twoje konto jest zablokowane!');
        } else {
            Toastr::error('Błąd, Nie ma takiego użytkownika!','Error');
            return redirect('login')->with('error', 'Nie ma takiego użytkownika!');
        }
    }

    public function logout()
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user = Session::get('user');

        $name       = $user->name;
        $email      = $user->email;
        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        $activityLog = [

            'name'        => $name,
            'email'       => $email,
            'description' => 'has logged out',
            'date_time'   => $todayDate,
        ];
        //DB::table('activity_logs')->insert($activityLog);
        Auth::logout();
        Toastr::success('Wylogowano pomyślnie :)','Sukces');
        return redirect('login')->with('success', 'Wylogowano pomyślnie :)');
    }
}
