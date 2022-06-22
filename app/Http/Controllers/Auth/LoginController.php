<?php

namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Restaurantmanager;
use App\Http\Controllers\Controller;
use App\Models\Deliveryofficemanager;
use App\Providers\RouteServiceProvider;
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
    public function login(Request $request)
    {

//        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(array('email' => $request['email'], 'password' => $request['password']))) {
            if (!empty(auth()->user()->user_id)) {
                $id = auth()->user()->user_id;
            }

            $admin = Admin::where('AdminID', '=', $id)->first();

            $restaurantManager = Restaurantmanager::where('RestManagerID', '=', $id)->first();
            $deliveryOfficeManager = Deliveryofficemanager::where('DeliManagerID', '=', $id)->first();

            if ($admin) {
                return redirect()->route('admin_index');
            } else if ($restaurantManager) {
                return redirect()->route('RM_Home');
            } else if ($deliveryOfficeManager) {
                return redirect()->route('DM_Home');
            }
        } else {
            return redirect()->route('login')
                ->with('error', __('auth.failed_log'));
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
