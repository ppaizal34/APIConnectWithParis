<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>APIConnectWithParis</title>
    {{-- CDN Bootsrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- CDN jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        {{-- CDN axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Link carousel.css -->
    <link href="{{ asset('assets/css/carousel.css') }}" rel="stylesheet">
</head>
<body data-bs-spy="scroll" data-bs-target="#about-scroll">

    <!-- Modal -->
    @auth
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Token Anda Sudah Kadaluwarsa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        Close
                    </button>
                    <form method="GET" action="/my-profile">
                        <button type="submit" class="btn btn-warning">
                            Refresh Token
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth

    <header data-bs-theme="dark">
        <nav id="about-scroll" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid px-5">
                {{-- Brand --}}
                <a class="navbar-brand fs-2 text-primary fw-bold" href="#">APIConnectWithParis</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0 flex justify-content-center align-items-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                Contact
                            </a>
                        </li>
                        @guest    
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">
                                Login
                            </a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/my-profile') }}">
                                <img src="https://via.placeholder.com/50" alt="Profile Picture" class="rounded-circle">
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            {{-- carousel-indicators --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                {{-- carousel 1 --}}
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images_api/5.jpg') }}" class="img-fluid h-100 w-100 object-fit-cover" alt="nation.png">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Nations API</h1>
                            <figure class="d-flex">
                                <img src="{{ asset('assets/images_api/avatar/nation.png') }}" class="rounded-circle" alt="avatar_nation.png" width="50" height="30"> 
                                <figcaption class="ms-3">
                                    PENYEDIA DATA / SUMBER INFORMASI / PUSAT DATA GLOBAL
                                </figcaption>
                            </figure>
                            <p>
                               Melalui APIConnectWithParis,anda dapat mengeksplorasi data detail dan komprehensif dari berbagai negara
                               di seluruh dunia,mulai dari populasi,ibu kota,hingga status kedaulatan dan keanggotaan global.
                            </p>
                            <p>
                                <a class="btn btn-lg btn-primary" href="{{ route('doc_nations') }}">
                                    Get Documention
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                {{-- carousel 2 --}}
                <div class="carousel-item">
                    <img src="{{ asset('assets/images_api/image.jpg') }}" class="img-fluid h-100 w-100 object-fit-cover" alt="">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Images API</h1>
                            <figure class="d-flex">
                                <img src="{{ asset('assets/images_api/avatar/nation.png') }}" class="rounded-circle" alt="avatar_nation.png" width="50" height="30"> 
                                <figcaption class="ms-3">
                                    PENYEDIA DATA / SUMBER INFORMASI / PUSAT DATA GLOBAL
                                </figcaption>
                            </figure>
                            <p>
                                APIConnectWithParis menyediakan akses ke berbagai gambar dari seluruh dunia, mencakup tema alam, budaya, seni, dan lanskap kota.
                            </p>
                            <p>
                                <a class="btn btn-lg btn-primary" href="#">
                                    Get Documention
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                {{-- carousel 3 --}}
                <div class="carousel-item">
                    <img src="{{ asset('assets/images_api/3.jpg') }}" class="img-fluid h-100 w-100" alt="...">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
                            <p>
                                <a class="btn btn-lg btn-primary" href="#">
                                    Learn more
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container marketing">
            <h1 class="text-center mb-4">Layanan API Yang Tersedia</h1>
            <hr>
            <div class="row">
                {{-- Nations API --}}
                <div class="col-lg-4 d-flex flex-column">
                    <img src="{{ asset('assets/images_api/nation.jpg') }}" class="img-fluid mb-3" alt="" style="height: 200px;">
                    <h2 class="fw-normal">Nations API</h2>
                    <p>
                        APIConnectWithParis memungkinkan Anda menjelajahi data negara, termasuk populasi, ibu kota, dan status global.
                    </p>
                    <p class="mt-auto">
                        <a class="btn btn-secondary" href="{{ route('doc_nations') }}">
                            Get Documention
                        </a>
                    </p>
                </div>
                
                {{-- Emojis API --}}
                <div class="col-lg-4 d-flex flex-column">
                    <img src="{{ asset('assets/images_api/emoji.jpg') }}" class="img-fluid mb-3" alt="" style="height: 200px;">
                    <h2 class="fw-normal">Emojis API</h2>
                    <p>
                        APIConnectWithParis menyediakan emoji beragam, mulai dari ekspresi wajah hingga simbol budaya.
                    </p>                                       
                    <p class="mt-auto">
                        <a class="btn btn-secondary" href="{{ route('doc_emojis') }}">
                            Get Documention
                        </a>
                    </p>
                </div>

                {{-- Indonesia National Hero API --}}
                <div class="col-lg-4 d-flex flex-column">
                    <img src="{{ asset('assets/images_api/nasional_hero.jpg') }}" class="img-fluid mb-3" alt="" style="height: 200px;">
                    <h2 class="fw-normal">Indonesia National Hero</h2>
                    <p>
                        APIConnectWithParis menyediakan data pahlawan nasional Indonesia, termasuk nama dan tahun penetapan.
                    </p>                   
                    <p class="mt-auto">
                        <a class="btn btn-secondary" href="{{ route('doc_national_hero') }}">
                            Get Documention
                        </a>
                    </p>
                </div>

            </div>

            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

                {{-- APIConnectWithParis --}}
                <div class="row featurette" id="about">
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal lh-1 mb-4">
                            APIConnectWithParis
                        </h2>
                        <p class="lead">
                            Sebuah adalah layanan API yang dirancang untuk memudahkan koneksi dan integrasi berbagai aplikasi dengan data dan layanan yang 
                            Anda butuhkan. Tujuan kami adalah menyediakan API yang cepat, andal, dan mudah digunakan untuk para pengembang yang ingin 
                            memperkaya aplikasi mereka dengan berbagai data dan fungsionalitas.
                        </p>
                    </div>
                    <div class="col-md-5 p-0">
                        <img src="{{ asset('assets/images_about/APIConnectWithParis.png') }}" alt="APIConnectWithParis.png" width="100%" height="500">
                    </div>
                </div>
                <hr class="featurette-divider">

                {{-- Apa yang kami tawarkan --}}
                <div class="row featurette">
                    <div class="col-md-6 order-md-2">
                        <h2 class="featurette-heading fw-normal lh-1 mb-4">
                            Apa yang kami tawarkan
                        </h2>
                        <p class="lead">
                            <span class="fw-bold">Integrasi Mudah:</span> Endpoint API kami dibuat sederhana dan mudah diakses sehingga Anda bisa memulai 
                            integrasi dalam hitungan menit.
                        </p>
                        <p class="lead">
                            <span class="fw-bold">Responsif dan Aman:</span> Kami berkomitmen untuk menjaga keamanan data dan memberikan waktu respons yang cepat.
                        </p>
                        
                    </div>
                    <div class="col-md-6 order-md-1 p-0">
                        <img src="{{ asset('assets/images_about/marketing.jpg') }}" class="rounded" alt="marketing.jpg" width="100%" height="500">
                    </div>
                </div>
                <hr class="featurette-divider">


                {{-- Mengapa Pilih APIConnectWithParis? --}}
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading fw-normal lh-1 mb-4">
                            Mengapa Pilih APIConnectWithParis?
                        </h2>
                        <p class="lead">
                            <span class="fw-bold">Dukungan Pengguna:</span> Kami menyediakan dokumentasi lengkap dan dukungan bagi pengembang 
                            agar Anda bisa fokus membangun aplikasi.
                        </p>
                        <p class="lead">
                            <span class="fw-bold">Update Berkelanjutan:</span>Kami terus memperbarui layanan dan memperkenalkan fitur-fitur baru untuk memenuhi kebutuhan teknologi 
                            yang berkembang pesat.
                        </p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('assets/images_about/confused.jpg') }}" class="rounded" alt="marketing.jpg" width="100%" height="500">
                    </div>
                </div>
                <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2024 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a
                    href="#">Terms</a></p>
        </footer>

    </main>
    <!-- CDN Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- Script check-refreshtoken-expiry JS --}}
    <script src="{{ asset('js/check-token-expiry.js') }}"></script>
    {{-- Script check-refreshtoken-expiry JS --}}
    <script src="{{ asset('js/check-refreshtoken-expiry.js') }}"></script>
</body>
</html>
