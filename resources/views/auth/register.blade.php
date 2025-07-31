@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
    <h5 class="fw-bold mt-5">Daftar sebagai pengguna baru</h5>
    <p class="text-muted mt-2">Silahkan mengisi form dibawah ini untuk mendaftar</p>

    <form action="{{ route('register.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Foto Profil</label>
            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">

            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                name="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button class="btn btn-primary w-100 mt-2" type="submit" color="primary" id="btn-login">
            Daftar
        </button>

        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('login') }}" class="text-decoration-none text-primary">Sudah punya akun?</a>
        </div>
    </form>

@endsection
