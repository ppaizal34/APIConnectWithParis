<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Title --}}
    <title>User Profile</title>
    {{-- CDN axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- CDN jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>


    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <!-- Card untuk Profile -->
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h2>User Profile</h2>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3 text-center">
                            <img src="https://via.placeholder.com/100" alt="Profile Picture"
                                class="rounded-circle mb-3" />
                            <h4 class="fw-bold">{{ $user->name }}</h4>
                            <p class="text-muted">API User</p>
                        </div>

                        <!-- Informasi Profil -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name" value="{{ $user->name }}"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" value="{{ $user->email }}"
                                readonly />
                        </div>
                        <div class="mb-3">
                            <label for="token" class="form-label fw-bold">API Token</label>
                            <button id="btn_copy_token" type="button"
                                class="btn btn-primary d-flex justify-content-between align-items-center w-100">
                                <span>Copy Token</span>
                                <img src="{{ asset('assets/images_api/documents_api/copy.png') }}" id="btn_copy"
                                    alt="Copy" width="25" height="25" />
                            </button>
                            <input type="hidden" class="form-control" id="token" readonly />
                        </div>

                        <!-- Tombol Expired Access Token -->
                        <div class="mb-3">
                            <label for="created_at" class="form-label fw-bold">Expired Access Token</label>
                            <input type="text" class="form-control" id="expired_access_token" value=""
                                readonly />
                        </div>

                        {{-- Account Created At --}}
                        <div class="mb-3">
                            <label for="created_at" class="form-label fw-bold">Account Created At</label>
                            <input type="text" class="form-control" id="created_at" value="{{ $user->created_at }}"
                                readonly />
                        </div>

                        <!-- Input bar untuk Request Count -->
                        <!-- <div class="mb-4">
                        <label for="request_count" class="form-label fw-bold">API Request Count</label>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar" style="width: 5%">25%</div>
                        </div>
                    </div> -->

                        <!-- Tombol Reset Token -->
                        <div class="d-grid mb-3">
                            <button type="button" class="btn btn-warning" id="refresh_token" disabled>
                                Reset API Token
                            </button>
                        </div>

                        {{-- Jika Reset API Token error --}}
                        <div id="error_reset_api" class="alert alert-danger" role="alert" style="display: none">
                            <h6>Warning!</h6>
                            <h6>Reset Token Gagal!</h6>
                        </div>

                        {{-- Jika Reset API Token success --}}
                        <div class="alert alert-info" id="success_reset_api" role="alert" style="display: none">
                            <h6>Info!</h6>
                            <h6>Reset Token Berhasil!</h6>
                        </div>

                        {{-- Jika logout success --}}
                        <div class="alert alert-info" id="success_logout" role="alert" style="display: none">
                            <h6>Info!</h6>
                            <h6></h6>
                        </div>

                        {{-- Jika logout error --}}
                        <div id="error_logout" class="alert alert-danger" role="alert" style="display: none">
                            <h6>Warning!</h6>
                            <h6></h6>
                        </div>

                        <!-- Tombol Logout -->
                        <div class="d-grid">
                            <form id="form_logout" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" id="btn_logout" class="btn btn-danger">
                                    Logout
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CDN Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Script check-refreshtoken-expiry JS --}}
    <script src="{{ asset('js/check-refreshtoken-expiry.js') }}"></script>
    {{-- Script myprofile --}}
    <script src="{{ asset('js/myprofile.js') }}"></script>
</body>

</html>
