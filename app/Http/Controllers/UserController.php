<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\UserLevels;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('user_status')->orderBy('user_level')->orderBy('created_at')->get();

        return view("admin.users.index", compact("users"));
    }

    public function create()
    {
        $user_levels = UserLevels::get();
        return view('admin.users.create', compact('user_levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_level' => ['required'],
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_main' => ['required', 'max:30'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'user_level' => $request->user_level,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_main' => $request->phone_main,
            'password' => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect(route('users.index', absolute: false));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->user_level = $request->user_level;
        $user->user_status = $request->user_status;

        $user->save();

        return redirect()->route('users.index')->with('success', ['message' => 'User has been updated']);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', ['message' => 'User has been deleted']);
    }
}
