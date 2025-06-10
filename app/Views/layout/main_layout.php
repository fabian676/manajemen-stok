<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('/') ?>">Manajemen Stok</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('dashboard') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('barang') ?>">Manajemen Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('kategori') ?>">Manajemen Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('riwayat') ?>">Riwayat Stok</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ISI HALAMAN -->
    <main class="flex-grow-1">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <?= $this->renderSection('scripts') ?>

    <footer class="text-center text-light bg-dark p-5 mt-auto">
        <div>
            <a href="#"><i class="bi bi-instagram h2 p-2 text-light"></i></a>
            <a href="#"><i class="bi bi-twitter-x h2 p-2 text-light"></i></a>
            <a href="#"><i class="bi bi-whatsapp h2 p-2 text-light"></i></a>
        </div>
        <div>PT. Barang Berkah&copy; 2025</div>
    </footer>

</body>

</html>