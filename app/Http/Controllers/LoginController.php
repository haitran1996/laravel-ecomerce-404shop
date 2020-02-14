<?php

namespace App\Http\Controllers;

use App\Contracts\Controller\UserControllerInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{

    protected $userController;

    public function __construct(UserControllerInterface $userController)
    {
        $this->userController = $userController;
    }

    public function index(Request $request)
    {
//        $email = $request->cookie('email');
//        $password = $request->cookie('password');
        return view('login.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;

        $data = [
            'email' =>  $email,
            'password'  => $pass
        ];

        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt($data, $remember)) {
            $user = auth()->user();
            Auth::login($user,$remember);

            if ($email == 'tranhaicoder@gmail.com' && $pass == '123') {
                return redirect('admin');
            }

            return redirect('404shop');
        } else {

            $request->validate([
                'email' => 'required|exists:users,email',
                'password' => 'required|exists:users,password']);
        }

        return back();

    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('login');
    }

    public function validateRegister($request)
    {
        return $request->validate([
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    public function register(Request $request)
    {
        $this->validateRegister($request);

        $this->userController->store($request);

        $notification= array(
            "message" => "Create new account successful!",
            "alert-type" => "success"
        );

        return back()->with($notification);
    }
}
