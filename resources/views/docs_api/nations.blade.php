<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Title --}}
    <title>API Documentation | Countries</title>
    {{-- CDN axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- CDN jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- CDN Icons Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- CDN CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style_nations.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Modal Alert Jika masa aktif Access Token Sudah Habis -->
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
                        {{ $title_index }}
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
                                        <span>{{ $url_index }}</span>
                                        <img src="{{ asset('assets/images_api/documents_api/copy.png') }}"
                                            id="btn_copy" class="pt-1" alt="Copy" width="25" height="25">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Endpoint</th>
                                    <td><span class="badge text-bg-warning">{{ $url_index_endpoint }}</span></td>
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
                        {{ $title_spesifik }}
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
                                        <span>{{ $url_show }}</span>
                                        <img src="{{ asset('assets/images_api/documents_api/copy.png') }}"
                                            id="btn_copy" class="pt-1" alt="Copy" width="25" height="25">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Endpoint</th>
                                    <td>
                                        <span class="badge text-bg-warning">
                                            {{ $url_spesifik_endpoint }}
                                        </span>
                                    </td>
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
                                        <label for="search_input">Search country:</label>
                                    </th>
                                    <td class="position-relative">
                                        <input type="text" id="search_input" class="form-control w-100"
                                            placeholder="Search Country" value="Indonesia" autofocus required
                                            style="cursor: pointer">
                                        <span id="clear_input"
                                            class="position-absolute top-50 translate-middle-y end-0 me-3"
                                            style="cursor: pointer;">
                                            <i class="bi bi-x-circle"></i>
                                        </span>
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
                        {{ $title_random }}
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
                                        <span>{{ $url_random }}</span>
                                        <img src="{{ asset('assets/images_api/documents_api/copy.png') }}"
                                            id="btn_copy" class="pt-1" alt="Copy" width="25"
                                            height="25">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Endpoint</th>
                                    <td>
                                        <span class="badge text-bg-warning">
                                            {{ $url_random_endpoint }}
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

            <!-- Bearer Token -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="testBearerToken">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTestBearerToken" aria-expanded="false"
                        aria-controls="collapseTestBearerToken">
                        Test the Bearer Token
                    </button>
                </h2>
                <div id="collapseTestBearerToken" class="accordion-collapse collapse"
                    aria-labelledby="testBearerToken" data-bs-parent="#apiDocumentation">
                    <div class="accordion-body">
                        <p>Test the Bearer Token authentication mechanism.</p>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Method</th>
                                    <td><span class="badge bg-success">GET</span></td>
                                </tr>
                                <tr>
                                    <th scope="row">Headers</th>
                                    <td>
                                        <div>
                                            <span class="badge text-bg-dark">Authorization: Bearer {token}</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Parameters</th>
                                    <td><span class="badge text-bg-info">No parameters required for this
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
                                        <label for="token_input">Bearer Token:</label>
                                    </th>
                                    <td class="position-relative">
                                        <input type="text" id="token_input" class="form-control w-100"
                                            placeholder="Enter Bearer Token" required style="cursor: pointer">
                                        <span id="clear_token"
                                            class="position-absolute top-50 translate-middle-y end-0 me-3"
                                            style="cursor: pointer; display: none;">
                                            <i class="bi bi-x-circle"></i>
                                        </span>
                                    </td>

                                </tr>
                            </tbody>
                        </table>

                        <button id="btn_test_token" class="btn btn-danger mb-3" disabled>
                            Try out
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- CDN Script JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Script Nations JS --}}
    <script src="{{ asset('js/api/nations.js') }}"></script>
    {{-- Script check-token-expiry JS --}}
    <script src="{{ asset('js/token/check-token-expiry.js') }}"></script>
    {{-- Script check-refreshtoken-expiry JS --}}
    <script src="{{ asset('js/token/check-refreshtoken-expiry.js') }}"></script>
</body>
</html>
