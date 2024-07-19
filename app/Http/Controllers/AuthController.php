<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("pages.auth.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == "admin") {
                return redirect("/admin/dashboard");
            } elseif ($user->role == "superadmin") {
                return redirect("/superadmin/dashboard");
            } else {
                return redirect("/user/dashboard");
            }

            return redirect("/");
        }

        throw ValidationException::withMessages([
            "email" => __("auth.failed"),
        ]);
    }

    public function showRegistrationForm()
    {
        return view("pages.auth.register");
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255"],
            "role" => ["required"],
            "password" => ["required", "string", "min:8"],
        ]);
        // dd($validatedData);

        $user = User::create([
            "name" => $validatedData["name"],
            "email" => $validatedData["email"],
            "password" => Hash::make($validatedData["password"]),
            "role" => $validatedData["role"],
        ]);

        return redirect()->route("login");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }

    public function profile()
    {
        return view("pages.auth.profile");
    }
}
