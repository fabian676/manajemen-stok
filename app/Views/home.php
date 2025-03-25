<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Manajemen Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Sistem Manajemen Stok</h2>
        <div class="row">
            <!-- Dashboard -->
            <div class="col-md-3">
                <a href="<?= site_url('dashboard') ?>" class="btn btn-primary w-100 mb-3">Dashboard</a>
            </div>
            <!-- Manajemen Barang -->
            <div class="col-md-3">
                <a href="<?= site_url('barang') ?>" class="btn btn-secondary w-100 mb-3">Manajemen Barang</a>
            </div>
            <!-- Manajemen Kategori -->
            <div class="col-md-3">
                <a href="<?= site_url('kategori') ?>" class="btn btn-success w-100 mb-3">Manajemen Kategori</a>
            </div>
            <!-- Riwayat Perubahan Stok -->
            <div class="col-md-3">
                <a href="<?= site_url('stok/riwayat') ?>" class="btn btn-warning w-100 mb-3">Riwayat Perubahan Stok</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>