<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary">File Management</h1>
            <p class="text-muted">Kelola file Anda dengan penyimpanan sementara yang mudah dan aman</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <button class="btn btn-outline-primary">Learn More</button>
                <button class="btn btn-primary">Contact Us</button>
            </div>
        </div>

        <!-- Features -->
        <div class="row text-center mb-5">
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm" style="background-color: #e3f2fd;">
                    <i class="bi bi-shield-lock fs-2 text-primary"></i>
                    <h5 class="mt-3">Aman</h5>
                    <p class="text-muted">Penyimpanan sementara dengan keamanan tingkat tinggi.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm" style="background-color: #ffebee;">
                    <i class="bi bi-speedometer2 fs-2 text-danger"></i>
                    <h5 class="mt-3">Cepat</h5>
                    <p class="text-muted">Proses pengelolaan file yang cepat dan andal.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm" style="background-color: #e8f5e9;">
                    <i class="bi bi-check-circle fs-2 text-success"></i>
                    <h5 class="mt-3">Mudah</h5>
                    <p class="text-muted">Antarmuka yang sederhana untuk kenyamanan pengguna.</p>
                </div>
            </div>
        </div>

        <!-- Upload Form -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center mb-4">Formulir Pengelolaan File</h4>
                        <form action="/upload" method="POST" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="file" class="form-label">Pilih File</label>
                                <input class="form-control" type="file" id="file" name="file" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label">Deskripsi (Opsional)</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Berikan deskripsi untuk file Anda..."></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100">Kelola File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-5 text-center text-muted">
            <p>&copy; 2024 File Management App. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
