<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Documentation - Countries</title>
    {{-- CDN axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- CDN jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-2">Countries API Documentation</h1>
        <hr>

        <div class="accordion" id="apiDocumentation">

            <!-- Endpoint: GET /api/countries -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="getAllCountries">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseGetAllCountries" aria-expanded="true"
                        aria-controls="collapseGetAllCountries">
                        GET /api/countries
                    </button>
                </h2>
                <div id="collapseGetAllCountries" class="accordion-collapse collapse" aria-labelledby="getAllCountries"
                    data-bs-parent="#apiDocumentation">
                    <div class="accordion-body">
                        <p>Retrieve a list of all countries.</p>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">URL</th>
                                    <td id="btn_copy" class="d-flex justify-content-between" style="cursor: pointer">
                                        <span>http://127.0.0.1:8000/api/countries</span>
                                        <img src="{{ asset('assets/images_api/documents_api/copy.png') }}"
                                            id="btn_copy" class="pt-1" alt="Copy" width="25" height="25">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Endpoint</th>
                                    <td><span class="badge text-bg-warning">/api/countries</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Method</th>
                                    <td><span class="badge bg-primary">GET</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Parameters</th>
                                    <td><span class="badge text-bg-info">No parameters required for this request.</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td id="status">-----</td>
                                </tr>
                                <tr>
                                    <th scope="row">Message</th>
                                    <td id="message">-----</td>
                                </tr>
                            </tbody>
                        </table>

                        <button id="btn_all_api" class="btn btn-danger mb-3">
                            Try out
                        </button>
                    </div>
                </div>
            </div>

            <!-- Endpoint: GET /api/countries/{country} -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="getSpecificCountry">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseGetSpecificCountry" aria-expanded="false"
                        aria-controls="collapseGetSpecificCountry">
                        GET /api/countries/{country}
                    </button>
                </h2>
                <div id="collapseGetSpecificCountry" class="accordion-collapse collapse"
                    aria-labelledby="getSpecificCountry" data-bs-parent="#apiDocumentation">
                    <div class="accordion-body">
                        <p>Retrieve specific country information by country code or name.</p>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">URL</th>
                                    <td id="btn_copy" class="d-flex justify-content-between" style="cursor: pointer">
                                        <span>http://127.0.0.1:8000/api/countries/Indonesia</span>
                                        <img src="{{ asset('assets/images_api/documents_api/copy.png') }}"
                                            id="btn_copy" class="pt-1" alt="Copy" width="25" height="25">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Endpoint</th>
                                    <td><span class="badge text-bg-warning">/api/countries/{country_name}</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Method</th>
                                    <td><span class="badge bg-primary">GET</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Parameters</th>
                                    <td><span class="badge text-bg-warning">Parameters are required for this
                                            request.</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td id="status">-----</td>
                                </tr>
                                <tr>
                                    <th scope="row">Message</th>
                                    <td id="message">-----</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="pt-3">
                                        <label for="country_input">Search country:</label>
                                    </th>
                                    <td>
                                        <input type="text" id="country_input" class="form-control w-100"
                                            placeholder="Search Country" value="Indonesia" autofocus required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <button id="btn_spesifik_api" class="btn btn-danger mb-3">Try out</button>
                    </div>
                </div>
            </div>

            <!-- Endpoint: GET /api/countries/random -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="getRandomCountry">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseGetRandomCountry" aria-expanded="false"
                        aria-controls="collapseGetRandomCountry">
                        GET /api/countries/random
                    </button>
                </h2>
                <div id="collapseGetRandomCountry" class="accordion-collapse collapse"
                    aria-labelledby="getRandomCountry" data-bs-parent="#apiDocumentation">
                    <div class="accordion-body">
                        <p>Retrieve a random country's information.</p>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">URL</th>
                                    <td id="btn_copy" class="d-flex justify-content-between"
                                        style="cursor: pointer">
                                        <span>http://127.0.0.1:8000/api/countries/random</span>
                                        <img src="{{ asset('assets/images_api/documents_api/copy.png') }}"
                                            id="btn_copy" class="pt-1" alt="Copy" width="25"
                                            height="25">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Endpoint</th>
                                    <td>
                                        <span class="badge text-bg-warning">
                                            /api/countries/{country}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Method</th>
                                    <td><span class="badge bg-primary">GET</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Parameters</th>
                                    <td><span class="badge text-bg-info">Parameters are required for this
                                            request.</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td id="status">-----</td>
                                </tr>
                                <tr>
                                    <th scope="row">Message</th>
                                    <td id="message">-----</td>
                                </tr>
                            </tbody>
                        </table>

                        <button id="btn_random_api" class="btn btn-danger mb-3">Try out</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let id_btn = '';

        function startRateLimit(btn) 
        {
            let oneMinute = 60;

            const intervalRateLimit = setInterval(() => {
                oneMinute--;
                $(btn).prop('disabled', true).text(`Mohoh menunggu selama ${oneMinute} detik`);

                if (oneMinute <= 0) {
                    oneMinute = 60; 
                    clearInterval(intervalRateLimit); 
                    $(btn).prop('disabled', false).text('Try out');
                }
            }, 1000); 
        }

        $(document).on('click', '#btn_copy', function() {
            const img_copy = $(this).find('img');
            const url = $(this).find('span');

            navigator.clipboard.writeText(url.text()).then(() => {
                img_copy.replaceWith("<span id='copied'>Copied!</span>");
                $(this).prop('disabled', true);

                setTimeout(() => {
                    $(this).prop('disabled', false);
                    const btn_copied = $(this).find('#copied');
                    btn_copied.replaceWith(`<img src="{{ asset('assets/images_api/documents_api/copy.png') }}" id="btn_copy"
                                            class="pt-1" alt="Copy" width="25" height="25">`);
                }, 3000);
            })
        })

        $(document).on('click', '#btn_clear', function() {
            const accordionItem = $(this).closest('.accordion-item');
            const btn = $(this);
            const info_status = accordionItem.find('#status');
            const info_message = accordionItem.find('#message');

            // Hapus elemen <h6> dan <pre>
            btn.next('h6').remove();
            btn.next('pre').remove();
            info_status.html('-----');
            info_message.html('-----');

            // Kembalikan tombol ke state awal sebagai "Try out"
            btn.attr('id', id_btn).text('Try out');
        });

        $(document).on('click', '#btn_random_api', function() {
            const accordionItem = $(this).closest('.accordion-item');
            const btn = $(this);
            const info_status = accordionItem.find('#status');
            const info_message = accordionItem.find('#message');

            // Menampilkan loading sebelum data dikirimkan
            const loading = `<div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
            btn.prop('disabled', true).html(loading);

            axios.get('http://127.0.0.1:8000/api/private/countries/random')
                .then((response) => {
                    const status = $(`<span class="badge text-bg-success">${response.status}</span>`);
                    const message = $(`<span class="badge text-bg-success">${response.data.message}</span>`);
                    const data = JSON.stringify(response.data, null, 2);
                    const h6 = $('<h6></h6>').text('response');
                    const pre = $('<pre></pre>').text(data);

                    $(info_status).html(status);
                    $(info_message).html(message);
                    // Menambahkan elemen h6 dan pre setelah btn_try_out
                    $(btn).after(h6);
                    h6.after(pre);
                    // Ubah id dan teks tombol menjadi "Clear"
                    btn.attr('id', 'btn_clear').prop('disabled', false).text('Clear');
                    id_btn = 'btn_random_api';
                })
                .catch((error) => {

                    if (error.response.status == 429) {
                        startRateLimit(btn)
                    }

                    const status = $(`<span class='badge text-bg-danger'>${error.response.status}</span>`);
                    const message = $(`<span class='badge text-bg-danger'>${error.response.statusText}</span>`);

                    info_status.html(status);
                    info_message.html(message);
                });
        });

        $(document).on('click', '#btn_all_api', function() {
            const accordionItem = $(this).closest('.accordion-item');
            const btn = $(this);
            const info_status = accordionItem.find('#status');
            const info_message = accordionItem.find('#message');

            // Menampilkan loading sebelum data dikirimkan
            const loading = `<div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
            btn.prop('disabled', true).html(loading);

            axios.get('http://127.0.0.1:8000/api/public/countries')
                .then((response) => {
                    const status = $("<span class='badge text-bg-success'>200</span>");
                    const message = $(`<span class='badge text-bg-success'>${response.data.message}</span>`);
                    const country = response.data.data;
                    const h6 = $('<h6></h6>').text('Response:');
                    const pre = $('<pre></pre>').css({
                        'height': '200px',
                        'overflow-x': 'hidden'
                    });
                    $(info_status).html(status);
                    $(info_message).html(message);
                    // Tambahkan elemen <h6> dan <pre> setelah tombol
                    btn.after(h6);

                    // Tambahkan data API ke dalam <pre>
                    country.forEach((data) => {
                        pre.append(JSON.stringify(data, null, 2) + '\n');
                    });

                    // Tambahkan <pre> setelah <h6>
                    h6.after(pre);

                    // Ubah id dan teks tombol menjadi "Clear"
                    btn.attr('id', 'btn_clear').prop('disabled', false).text('Clear');
                    id_btn = 'btn_all_api';
                })
                .catch((error) => {

                    if (error.response.status == 429) {
                        startRateLimit(btn)
                    }

                    const status = $(`<span class='badge text-bg-danger'>${error.response.status}</span>`);
                    const message = $(`<span class='badge text-bg-danger'>${error.response.statusText}</span>`);

                    info_status.html(status);
                    info_message.html(message);
                });
        });

        $(document).on('click', '#btn_spesifik_api', function() {
            const accordionItem = $(this).closest('.accordion-item');
            const btn = $(this);
            const info_status = accordionItem.find('#status');
            const info_message = accordionItem.find('#message');
            const country_input = $('#country_input').val();

            // Menampilkan loading sebelum data dikirimkan
            const loading = `<div class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>`;
            btn.prop('disabled', true).html(loading);

            axios.get(`http://127.0.0.1:8000/api/public/countries/${country_input}`)
                .then((response) => {
                    const countries = response.data.data;
                    const status = $(`<span class='badge text-bg-success'>${response.status}</span>`);
                    const message = $(
                        `<span class='badge text-bg-success'>${response.data.message}</span>`);
                    const h6 = $('<h6></h6>').text('response:');
                    const pre = $('<pre></pre>');

                    $(info_status).html(status);
                    $(info_message).html(message);

                    $(btn).after(h6);

                    countries.forEach((country) => {
                        pre.append(JSON.stringify(country, null, 2));
                    });

                    h6.after(pre);
                    // Ubah id dan teks tombol menjadi "Clear"
                    btn.attr('id', 'btn_clear').prop('disabled', false).text('Clear');
                    id_btn = 'btn_spesifik_api';
                })
                .catch((error) => {

                    if (error.response.status == 429) {
                        startRateLimit(btn)
                    }

                    const status = $(`<span class='badge text-bg-danger'>${error.response.status}</span>`);
                    const message = $(
                        `<span class='badge text-bg-danger'>${error.response.statusText}</span>`);

                    $(info_status).html(status);
                    $(info_message).html(message);
                });
        });

        $('#country_input').on('input', function() {
            const country_input = $(this);
            if (country_input.val() === '') {
                $('#btn_spesifik_api').prop('disabled', true);
            } else {
                $('#btn_spesifik_api').prop('disabled', false);
            }

        });
    </script>
</body>

</html>
