<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <img src="https://via.placeholder.com/100" alt="Profile Picture" class="rounded-circle mb-3">
                        <h4 class="fw-bold">{{ $user->name }}</h4>
                        <p class="text-muted">API User</p>
                    </div>

                    <!-- Informasi Profil -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="token" class="form-label fw-bold">API Token</label>
                        <input type="text" class="form-control" id="token" value="1234abcd5678efgh" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="created_at" class="form-label fw-bold">Account Created At</label>
                        <input type="text" class="form-control" id="created_at" value="{{ $user->created_at }}" readonly>
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
                        <button type="button" class="btn btn-warning">Reset API Token</button>
                    </div>
                    <!-- Tombol Logout -->
                    <div class="d-grid">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
