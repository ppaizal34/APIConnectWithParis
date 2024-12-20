<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    {{-- Title --}}
    <title>APIConnectWithParis | {{ $title }}</title>
    {{-- CDN axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- CDN jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- CDN Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/css/sign-in.css') }}" />
</head>
<body class="bg-body-tertiary">
    <main class="container-fluid vh-100 d-flex align-items-center">
        <div class="container">
            <form id="{{ request()->is('login') ? 'login' : 'register' }}" class="form-signin" method="POST">
                @method('POST')
                @csrf
                <h1 class="text-center text-primary fw-bold">
                    APIConnectWithParis
                </h1>
                <h3 class="text-center mb-3">
                    @if (request()->is('login'))
                        Masuk ke akun anda
                    @else
                        Buat akun anda
                    @endif
                </h3>
                @if (request()->is('register'))
                    {{-- Name --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name"
                            name="name" placeholder="Name" value="{{ old('name') }}" />
                        <label for="name">Name</label>
                        <div class="invalid-feedback">
                            <span></span>
                        </div>
                    </div>
                @endif
                {{-- Email --}}
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email address"
                        value="{{ old('email') }}" />
                    <label for="email">Email address</label>
                    <div class="invalid-feedback">
                        <span></span>
                    </div>
                </div>
                {{-- Password --}}
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        value="{{ old('password') }}" />
                    <label for="password">Password</label>
                    <div class="invalid-feedback">
                        <span></span>
                    </div>
                </div>

                {{-- Jika login error --}}
                <div id="error_login" class="alert alert-danger" role="alert" style="display: none">
                    <h6>Warning!</h6>
                    <h6></h6>
                </div>

                {{-- Jika login success --}}
                <div class="alert alert-info" id="success_login" role="alert" style="display: none">
                    <h6>Info!</h6>
                    <h6></h6>
                </div>
               
                    @if (request()->is('login'))
                        {{-- Btn Login --}}
                        <button type="submit" id="btn_login" class="btn btn-primary w-100 fs-5 mb-3">
                            Login
                        </button>
                    @endif
                    {{-- Btn Register --}}
                    @if (request()->is('register'))
                        <button type="submit" class="btn btn-primary w-100 fs-5 mb-3">
                            Register
                        </button>
                        @endif @if (request()->is('login'))
                            <p class="text-center fs-5">
                                <a href="{{ url('/register') }}" class="text-decoration-none text-black">
                                    Tidak punya akun?
                                    <span class="text-danger fw-bold text-decoration-underline">
                                        Buat Akun
                                    </span>
                                </a>
                            </p>
                        @else
                            <p class="text-center fs-5">
                                <a href="{{ url('/login') }}" class="text-decoration-none text-black">
                                    Sudah menjadi anggota?
                                    <span class="text-danger fw-bold text-decoration-underline">
                                        Login
                                    </span>
                                </a>
                            </p>
                        @endif

                        <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                            <img src="{{ asset('assets/brand/google.png') }}" alt="google.png" />
                            <span class="ps-2">Sign up with Google</span>
                        </button>

                        @if (request()->is('register'))
                            <p class="text-center">
                                Dengan membuat akun, Anda menyetujui
                                <span class="text-danger">Ketentuan Layanan</span> dan
                                <span class="text-danger">Kebijakan Privasi</span>
                                <span class="text-primary fw-bold">APIConnectWithParis</span>
                            </p>
                        @endif
            </form>
        </div>
    </main>
    {{-- CDN Jquery-Validate --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    {{-- CDN Jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- Script Auth --}}
    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
