<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AuthController
{
    public function showLogin()
    {
        if (!empty($_SESSION['admin_logged_in'])) {
            return redirect('/admin');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $username = trim((string)$request->input('username'));
        $password = trim((string)$request->input('password'));

        $expectedUser = env('ADMIN_USERNAME', 'arjuna');
        $expectedPass = env('ADMIN_PASSWORD', 'admin123');

        if ($username === $expectedUser && $password === $expectedPass) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            return redirect('/admin')->with('success', 'Selamat datang kembali di Dashboard CMS, Arjuna!');
        }

        return redirect('/admin/login')->with('error', 'Username atau password salah! (Default: arjuna / admin123)');
    }

    public function logout()
    {
        unset($_SESSION['admin_logged_in'], $_SESSION['admin_username']);
        return redirect('/admin/login')->with('success', 'Anda telah keluar dari sesi Admin.');
    }
}
