<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    public function register()
    {
        return view('/dashboard/dashboard');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only('name', 'email', 'password', 'password_confirmation'), [
            'name' => ['required', 'string', 'between:2,255'],
            'password' => ['required', 'string', 'between:6,255', 'confirmed'],
            'email' => ['required', 'email', 'string', 'max:255', 'unique:users,email']
        ]);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();
        $request['password'] = Hash::make($request->password);
        User::create($request->only('name', 'email', 'password'));
        return redirect('/dashboard/admins')->with(['success' => true, 'message' => ucfirst($request->name)  . ' account has been created successfuly!']);
    }

    public function login()
    {
        if (!auth()->check())
            return view("dashboard/login");
        return redirect('/dashboard');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($input = $request->only('name', 'password'), [
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        if ($validator->fails())
            return back()->withErrors('name', 'Invalid Credentials');
        if (auth()->attempt($input)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        return back()->withErrors([
            'name' => 'Invalid credentials.',
        ])->onlyInput('name');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function edit(Request $request)
    {
        if ($user = User::find($request->id)) {
            if ($user->id == 1 && auth()->user()->id != 1)
                return redirect('/dashboard/admins')->with(['success' => false, 'message' => 'Access denied']);
            return view('/dashboard/dashboard', ['user' => User::find($request->id)]);
        }
        return back()->with((['success' => false, 'message' => 'user not found']));
    }

    public function update(Request $request)
    {
        if (!$user = User::find($request->id))
            return redirect('/dashboard/admins')->with(['success' => false, 'message' => 'User not found']);
        if ($user->id == 1 && auth()->user()->id != 1)
            return redirect('/dashboard/admins')->with(['success' => false, 'message' => 'Access denied']);
        $validator = Validator::make($request->only('name', 'email', 'password', 'password_confirmation'), [
            'name' => ['required', 'string', 'between:2,255'],
            'password' => ['nullable', 'string', 'between:6,255', 'confirmed'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('users', 'email')->ignore($request->id)]
        ]);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator)->withInput();
        $request->name != $user->name ? $user->name = $request->name : false;
        $request->email != $user->email ? $user->email = $request->email : false;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('/dashboard/admins')->with(['success' => true, 'message' => ucfirst($user->name)  . ' account has been updated successfuly!']);
    }

    public function destroy(Request $request)
    {
        $success = false;
        $message = 'You can not delete this account.';
        if ($request->id != 1) {
            $user = User::find($request->id);
            $success = false;
            $message = 'User not found.';
            if ($user) {
                $success = true;
                $message = ucfirst($user->name)  . ' account has been deleted successfuly!';
                $user->delete();
            }
        }
        return redirect()->back()->with(['success' => $success, 'message' => $message]);
    }
}
