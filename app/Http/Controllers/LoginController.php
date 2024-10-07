<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use App\Http\Requests\RegistrationRequest;
use Hash;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function registration(){
        return view('registration');
    }

    public function saveRegistration(RegistrationRequest $request)
    {
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['password'] = Hash::make($request->password);

      $emailData['email'] = $request->email;
       $emailData['name'] = $request->name;
       $emailData['password'] = $request->password;
        User::create($user);
        $userData = User::where('email', $request->email)->first();
        try {
            ___mail_sender($request->email, 'registration', $emailData);
            return redirect('login')->with('success', 'Registration Successfully.');
        } catch (\Exception $e) {
            $userData = User::where(['email' => $request->email])->whereNull('deleted_at')->first();
            $userData->delete();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function login(){
        return view('login');
    }


    public function saveLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|regex:/^([a-z0-9\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
        ], [
            'email.required' => 'The email field is required.',
            'email.regex' => 'Please enter valid email.',
            'password.required' => 'The password field is required.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where(['email' => $request->email])->first();
        if (!$user){
            return back()->with(['fail' => 'Your account does not exist.']);
        } elseif (!\Hash::check($request->password, $user->password)) {
            return back()->with('fail', 'Your Password does not match.');
        } elseif ($user->status == 'inactive') {
            return back()->with('fail', 'Your account is inactive. Please contact to admin.');
        }
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If login is successful, redirect to the home page
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login successfully.');
        }

        // Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password]);
        // return redirect('dashboard')->with('success', 'Login successfully.');

    }


    public function dashboard(){
        $user = User::get();
        $emp = Employee::whereNull('deleted_at')->get();
        $userCount = count($user);
        $empCount = count($emp);
        return view('dashboard',compact('empCount','userCount'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
