<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- CDN jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- CDN Font Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,500;0,900;1,100;1,400;1,900&display=swap"
        rel="stylesheet" />
    {{-- CDN Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'roboto', Arial, Helvetica, sans-serif;
            background: #0F2027;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2C5364, #203A43, #0F2027);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

        #nav {
            background: inherit;
        }

        #wrapper_copy{
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-sticky top-0" id="nav">
        <div class="container d-flex justify-content-between py-3 ps-0">
            <a href="#" class="text-decoration-none navbar-brand fs-2 text-primary pt-2">
                APIConnectWithParis
            </a>
            <ul class="d-flex pt-3 list-unstyled">
                <li><a href="/" class="text-decoration-none text-white fs-4">Home</a></li>
                <li><a href="#" class="text-decoration-none text-white fs-4 mx-4">About</a></li>
                <li><a href="#" class="text-decoration-none text-white fs-4">Contact</a></li>
            </ul>
        </div>
    </div>

    <div class="container text-white">
        {{-- http://127.0.0.1:8000/api/countries --}}
        <div class="item mb-5">
            <h1 class="mb-4">1. Mendapatkan detail semua negara</h1>
            <div class="url_all">
                <strong id="wrapper_copy" class="text-black bg-white py-2 px-4 rounded-3 fs-4 d-flex justify-content-between">
                    <span id="url">URL: http://127.0.0.1:8000/api/countries</span>
                    <img src="{{ asset('assets/get_api/copy.png') }}" id="btn_copy" class="pt-1"
                        alt="Copy" width="30" height="30">
                </strong>
                <img src="{{ asset('assets/get_api/nations/1.png') }}" class="mt-4 w-100 rounded-3" alt="Nation 1">
            </div>
        </div>

        {{-- http://127.0.0.1:8000/api/countries/indonesia --}}
        <div class="item mb-5">
            <h1 class="mb-4">2. Mendapatkan detail berdasarkan nama negara</h1>
            <div class="url_spesifik">
                <strong id="wrapper_copy" class="text-black bg-white py-2 px-4 rounded-3 fs-4 d-flex justify-content-between cursor-pointer">
                    <span id="url">URL: http://127.0.0.1:8000/api/countries/indonesia</span>
                    <img src="{{ asset('assets/get_api/copy.png') }}" id="btn_copy" class="pt-1"
                        alt="Copy" width="30" height="30">
                </strong>
                <img src="{{ asset('assets/get_api/nations/2.png') }}" class="mt-4 w-100 rounded-3">
            </div>
        </div>

        {{-- http://127.0.0.1:8000/api/countries/random --}}
        <div class="item mb-5">
            <h1 class="mb-4">3. Mendapatkan detail negara secara random</h1>
            <div class="url_random">
                <strong id="wrapper_copy" class="text-black bg-white py-2 px-4 rounded-3 fs-4 d-flex justify-content-between cursor-pointer">
                    <span id="url">URL: http://127.0.0.1:8000/api/countries/random</span>
                    <img src="{{ asset('assets/get_api/copy.png') }}" id="btn_copy" class="pt-1"
                        alt="Copy" width="30" height="30">
                </strong>
                <img src="{{ asset('assets/get_api/nations/3.png') }}" class="mt-4 w-100 rounded-3">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $(document).on('click', '#wrapper_copy', function() {
            // const parentClass = $(this).parent().parent().attr('class');
            const parentClass = $(this).closest('div').attr('class');
            if (parentClass === parentClass) {
                const url_text = $(`.${parentClass} strong`).children('span:first-child').text();
                const btn_copy = $(`.${parentClass} strong`).find('#btn_copy')[0];

                navigator.clipboard.writeText(url_text).then(() => {
                    $(btn_copy).replaceWith(`<span id='btn_copy'>Copied!</span>`);
                    const span = $(`.${parentClass} strong`).find('#btn_copy')[0];
                    
                    setTimeout(() => {
                        $(span).replaceWith(
                            `<img src="{{ asset('assets/get_api/copy.png') }}" id="btn_copy" class="pt-1" alt="Copy" width="30" height="30">`
                        );
                    }, 3000);

                }).catch((err) => {
                    $('##wrapper_copy').html(err);
                });
            }
        });
    </script>
</body>

</html>
