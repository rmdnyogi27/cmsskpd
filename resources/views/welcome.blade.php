<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>INDRAMAYU REANG</title>
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        /* === Background + animasi fade & zoom === */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: url("/img/bg.jpg") no-repeat center center fixed;
            background-size: cover;
            transform: scale(1.1);
            opacity: 0;
            animation: bgFadeZoom 2.5s ease-out forwards;
            z-index: 0;
        }

        @keyframes bgFadeZoom {
            0% {
                opacity: 0;
                transform: scale(1.15);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Overlay gelap */
        body::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }

        /* Layout utama */
        .flex-center {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        /* Animasi minimalis untuk teks utama */
        .title {
            font-size: 72px;
            font-weight: 600;
            letter-spacing: 1px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 1.5s ease-out forwards;
            animation-delay: 0.8s;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Subtitle */
        .subtitle {
            opacity: 0;
            font-size: 18px;
            font-weight: 300;
            margin-top: 15px;
            letter-spacing: 0.5px;
            animation: fadeUp 1.5s ease-out forwards;
            animation-delay: 1.3s;
        }

        /* Links */
        .links {
            margin-top: 50px;
            display: flex;
            gap: 20px;
            opacity: 0;
            animation: fadeUp 1.2s ease-out forwards;
            animation-delay: 1.8s;
        }

        .links > a {
            color: #fff;
            border: 1.5px solid rgba(255,255,255,0.7);
            padding: 10px 30px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            transition: all 0.3s ease;
        }

        .links > a:hover {
            background: rgba(255,255,255,0.85);
            color: #000;
        }

        @media (max-width: 768px) {
            .title { font-size: 48px; }
            .subtitle { font-size: 16px; }
            .links { flex-direction: column; gap: 15px; }
        }
    </style>
</head>
<body>
    <div class="flex-center">
        <div class="title">Indramayu Reang</div>
        <div class="subtitle">Religius, Ekonomi Kerakyatan, Aman, Nyaman, dan Gotong Royong</div>

        @if (Route::has('login'))
            <div class="links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body>
</html>
