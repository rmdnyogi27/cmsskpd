@extends('layouts.auth')

@section('main-content')
<style>
    /* ===== Background gradient full screen ===== */
    body {
        background: linear-gradient(135deg, #cfd9ff, #ffffff);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        border-radius: 20px;
        overflow: hidden;
    }

    .bg-register-right {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        text-align: center;
    }

    .bg-register-right img {
        width: 200px;
        margin-bottom: 20px;
    }

    .form-control-user {
        border-radius: 30px;
        padding: 15px 20px;
    }

    .btn-user {
        border-radius: 30px;
        font-weight: 600;
        background-color: #3b82f6;
        border: none;
    }

    .btn-user:hover {
        background-color: #2563eb;
    }

    .text-center a.small {
        color: #2563eb;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-lg my-5 border-0">
                <div class="row no-gutters">
                    <!-- Left: Register form -->
                    <div class="col-lg-6 bg-white">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900 mb-2">{{ __('Register') }}</h1>
                                <p class="text-muted">Buat akun baru untuk melanjutkan</p>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger border-left-danger" role="alert">
                                    <ul class="pl-4 my-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}" class="user">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="name"
                                        placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="last_name"
                                        placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        placeholder="{{ __('Password') }}" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                                </div>

                                <div class="form-group mt-3">
                                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                    @error('g-recaptcha-response')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block mt-4">
                                    {{ __('Register') }}
                                </button>
                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">
                                    {{ __('Already have an account? Login!') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Logo and text -->
                    <div class="col-lg-6 bg-register-right">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo Pemda">
                        <h3 class="font-weight-bold">Indramayu Reang</h3>
                        <p class="mb-0">Selamat datang di sistem informasi Kabupaten Indramayu.<br>Silakan daftar untuk melanjutkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
