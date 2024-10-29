<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    {{-- CDN Font Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,900;1,100;1,400;1,900&display=swap"
        rel="stylesheet" />
    {{-- link reset css --}}
    <link rel="stylesheet" href="{{ asset('assets/slider/css/reset.css') }}" />
    {{-- link style slider css --}}
    <link rel="stylesheet" href="{{ asset('assets/slider/css/style.css') }}" />
</head>

<body>
    <header>
        <nav>
            <a href="/">APIConnectWithParis</a>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="slider">
        <div class="list">
            <!-- 1 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/1.jpg') }}" alt="earth" />
                <div class="detail">
                    <div class="name">Nations Data API</div>
                    <figure>
                        <img src="{{ asset('assets/slider/img/avatar/earth.png') }}" alt="earth" width="21"
                            height="21" />
                        <figcaption>
                            Penyedia Data / Sumber Informasi / Pusat Data Global
                        </figcaption>
                    </figure>
                    <div class="desc">
                        Setiap negara memiliki perjalanan yang panjang dan unik. Melalui APIConnectWithParis, Anda dapat
                        mengeksplorasi data detail dan komprehensif dari
                        berbagai negara di seluruh dunia, mulai dari populasi, ibu kota, hingga status kedaulatan dan
                        keanggotaan global.
                    </div>
                    <a href="{{ route('doc_nation') }}" class="more">Get API &raquo;</a>
                </div>
            </div>
            <!-- 2 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/2.jpg') }}" alt="1" />
                <div class="detail">
                    <div class="name">Nations Data API</div>
                    <figure>
                        <img src="{{ asset('assets/slider/img/avatar/earth.png') }}" alt="earth" width="21"
                            height="21" />
                        <figcaption>
                            Penyedia Data / Sumber Informasi / Pusat Data Global
                        </figcaption>
                    </figure>
                    <div class="desc">
                        Setiap negara memiliki perjalanan yang panjang dan unik. Melalui APIConnectWithParis, Anda dapat
                        mengeksplorasi data detail dan komprehensif dari
                        berbagai negara di seluruh dunia, mulai dari populasi, ibu kota, hingga status kedaulatan dan
                        keanggotaan global.
                    </div>
                    <a href="{{ route('doc_nation') }}" class="more">Get API &raquo;</a>
                </div>
            </div>
            <!-- 3 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/3.jpg') }}" alt="3" />
                <div class="detail">
                    <div class="name">Nations Data API</div>
                    <figure>
                        <img src="{{ asset('assets/slider/img/avatar/earth.png') }}" alt="earth" width="21"
                            height="21" />
                        <figcaption>
                            Penyedia Data / Sumber Informasi / Pusat Data Global
                        </figcaption>
                    </figure>
                    <div class="desc">
                        Setiap negara memiliki perjalanan yang panjang dan unik. Melalui APIConnectWithParis, Anda dapat
                        mengeksplorasi data detail dan komprehensif dari
                        berbagai negara di seluruh dunia, mulai dari populasi, ibu kota, hingga status kedaulatan dan
                        keanggotaan global.
                    </div>
                    <a href="{{ route('doc_nation') }}" class="more">Get API &raquo;</a>
                </div>
            </div>
            <!-- 4 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/4.jpg') }}" alt="3" />
                <div class="detail">
                    <div class="name">Nations Data API</div>
                    <figure>
                        <img src="{{ asset('assets/slider/img/avatar/earth.png') }}" alt="earth" width="21"
                            height="21" />
                        <figcaption>
                            Penyedia Data / Sumber Informasi / Pusat Data Global
                        </figcaption>
                    </figure>
                    <div class="desc">
                        Setiap negara memiliki perjalanan yang panjang dan unik. Melalui APIConnectWithParis, Anda dapat
                        mengeksplorasi data detail dan komprehensif dari
                        berbagai negara di seluruh dunia, mulai dari populasi, ibu kota, hingga status kedaulatan dan
                        keanggotaan global.
                    </div>
                    <a href="{{ route('doc_nation') }}" class="more">Get API &raquo;</a>
                </div>
            </div>
            <!-- 5 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/5.jpg') }}" alt="3" />
                <div class="detail">
                  <div class="name">Nations Data API</div>
                  <figure>
                    <img src="{{ asset('assets/slider/img/avatar/earth.png') }}" alt="earth" width="21" height="21" />
                    <figcaption>
                      Penyedia Data / Sumber Informasi / Pusat Data Global 
                    </figcaption>
                  </figure>
                  <div class="desc">
                      Setiap negara memiliki perjalanan yang panjang dan unik. Melalui APIConnectWithParis, Anda dapat mengeksplorasi data detail dan komprehensif dari 
                      berbagai negara di seluruh dunia, mulai dari populasi, ibu kota, hingga status kedaulatan dan keanggotaan global.
                  </div>
                  <a href="{{ route('doc_nation') }}" class="more">Get API &raquo;</a>
                </div>
            </div>
        </div>

        <div class="thumbnail">
            <!-- 1 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/1.jpg') }}" alt="thum earth" />
            </div>
            <!-- 2 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/2.jpg') }}" alt="thum 1" />
            </div>
            <!-- 3 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/3.jpg') }}" alt="thum 1" />
            </div>
            <!-- 4 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/4.jpg') }}" alt="thum 1" />
            </div>
            <!-- 5 -->
            <div class="item">
                <img src="{{ asset('assets/slider/img/5.jpg') }}" alt="thum 1" />
            </div>
        </div>

        <div class="arrows">
            <button id="prev">&lt;</button>
            <button id="next">&gt;</button>
        </div>

        <div class="loading-bar"></div>
    </div>

    {{-- Script untuk slider --}}
    {{-- <script src="{{ asset('assets/slider/js/script.js') }}"></script> --}}
</body>

</html>
