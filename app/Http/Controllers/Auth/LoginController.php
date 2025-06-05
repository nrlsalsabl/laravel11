<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Interfaces\AuthRepositoryInterface;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(StoreLoginRequest $request)
    {
        $credentials = $request->validated();

        if ($this->authRepository->login($credentials)) {
            if (FacadesAuth::user()->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            }
        }

        dd("Login sebagai user berhasil");

        return redirect()->route('login')->withErrors([
            'email' => 'Email atau Password Salah'
        ]);
    }

    public function logout()
    {
        $this->authRepository->logout();

        return redirect()->route('login');
    }
}
