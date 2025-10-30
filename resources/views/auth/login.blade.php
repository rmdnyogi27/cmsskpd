@extends('layouts.auth')

@section('main-content')
<style>
    /* ===== Background gradient full screen ===== */
    body {
        background: linear-gradient(135deg, #cfd9ff, #ffffff);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
    }

    /* ===== Card utama ===== */
    .login-container {
        display: flex;
        width: 1000px;
        max-width: 95%;
        height: 600px;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        background-color: #fff;
        animation: fadeIn 1s ease-in-out;
    }

    /* ===== Kolom kiri: form login ===== */
    .login-left {
        flex: 1;
        padding: 60px 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        animation: slideInLeft 1s ease-in-out;
    }

    /* ===== Kolom kanan: gambar Pemda + tulisan ===== */
    .login-right {
        flex: 1;
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        animation: slideInRight 1.2s ease-in-out;
    }

.login-right img {
    width: 160px;
    height: auto;
    margin-bottom: 20px; /* sebelumnya 200px, dikurangi supaya lebih dekat */
    animation: float 4s ease-in-out infinite;
}

.login-right h2 {
    font-size: 26px;
    font-weight: 600;
    margin-top: 5px; /* tambahkan margin kecil supaya rapih */
    margin-bottom: 8px;
    letter-spacing: 0.5px;
}

.login-right p {
    font-size: 14px;
    opacity: 0.9;
    width: 80%;
    margin: 0 auto;
}


    /* ===== Animasi ===== */
    @keyframes fadeIn {
        from {opacity: 0; transform: scale(0.98);}
        to {opacity: 1; transform: scale(1);}
    }

    @keyframes slideInLeft {
        from {transform: translateX(-50px); opacity: 0;}
        to {transform: translateX(0); opacity: 1;}
    }

    @keyframes slideInRight {
        from {transform: translateX(50px); opacity: 0;}
        to {transform: translateX(0); opacity: 1;}
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* ===== Input dan tombol ===== */
    .form-control-user {
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 15px;
    }

    .btn-primary {
        background-color: #4e73df;
        border: none;
        border-radius: 10px;
        width: 100%;
        padding: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #3752c9;
        transform: translateY(-2px);
    }

    .text-center a.small {
        color: #4e73df;
        text-decoration: none;
    }

    .text-center a.small:hover {
        text-decoration: underline;
    }

    /* ===== reCAPTCHA styling ===== */
    .g-recaptcha {
        transform: scale(0.9);
        transform-origin: center;
        margin-top: 10px;
        margin-bottom: 10px;
        display: flex;
        justify-content: center;
        animation: fadeIn 1.2s ease-in-out;
    }

    @media (max-width: 768px) {
        .login-container {
            flex-direction: column;
            height: auto;
        }
        .login-right {
            padding: 30px 0;
        }
    }
</style>

<div class="login-container">
    <!-- Bagian kiri -->
    <div class="login-left">
        <div class="text-center mb-4">
            <h1 class="h4 text-gray-900">{{ __('Login') }}</h1>
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

        <form method="POST" action="{{ route('login') }}" class="user">
            @csrf
            <div class="form-group mb-3">
                <input type="email" class="form-control form-control-user"
                    name="email" placeholder="{{ __('E-Mail Address') }}"
                    value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group mb-3">
                <input type="password" class="form-control form-control-user"
                    name="password" placeholder="{{ __('Password') }}" required>
            </div>

            <div class="form-group mb-3">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input"
                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                </div>
            </div>

            <!-- ===== reCAPTCHA tetap aktif dan muncul jelas ===== -->
            <div class="form-group mt-3">
                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                @error('g-recaptcha-response')
                    <span class="text-danger d-block text-center mt-2">{{ $message }}</span>
                @enderror
            </div>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <!-- ================================================ -->

            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>

        <hr>

        @if (Route::has('password.request'))
            <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
            </div>
        @endif

        @if (Route::has('register'))
            <div class="text-center mt-2">
                <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
            </div>
        @endif
    </div>

    <!-- Bagian kanan -->
    <div class="login-right">
        <img src="{{ asset('img/logo.png') }}" alt="Pemda Logo">
        <h2>Indramayu Reang</h2>
        <p>Selamat datang di sistem informasi Kabupaten Indramayu. Silakan login untuk melanjutkan.</p>
    </div>
</div>
@endsection
