<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>

<section class="opening min-vh-100">
    <div class="container mb-5 badan ">
        <div class="row">
            <div class="col-md-6 mt-5">
                <div class="text mx-2 my-1 mt-5">
                    <h2> PT. Barang Berkah</h2>
                </div>
                <div class="textKeterangan display-4">
                    <p>Selamat Datang di PT. Barang Berkah!

                        Mulailah perjalanan menuju kesuksesan sekarang juga!</p>
                </div>
                <div class="tombol mt-2 col-4">
                    <a href="<?= site_url('barang') ?>">
                        <div class="tombolrill text-center">Continue</div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center rounded-circle">
                <img src="<?= base_url('kardus.jpg') ?>" alt="gambars" class="img-fluid rounded-circle" width="320">
            </div>
        </div>
    </div>
    <style>
        .opening {
            background: linear-gradient(to top, rgba(238, 170, 12, 0.87), rgb(255, 255, 255)) !important;
        }

        .gradient {
            background: linear-gradient(to bottom, rgba(238, 170, 12, 0.87), rgb(255, 255, 255)) !important;
        }

        .badan {
            background-image: url("");
        }

        .tombolrill {
            padding: 4px 12px;
            background: rgb(122, 23, 123);
            border-radius: 15px;
            margin: 0;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
</section>

<section id="aboutus" class=" isi text-center p-5 text-sm-start text-dark min-vh-100 gradient">
    <div class="container">
        <h1 class="fw-bold dispaly-4 pb-3 text-center">About Us</h1>
        <div class="d-sm-flex flex-sm-row- align-items-center">
            <img src="kardus.jpg" class="img-fluid - rounded-circle me-3" width="320" />
            <div>
                <h1 class="fw-bold dispaly-4">
                    PT. Barang Berkah
                </h1>
                <h4 class=" lead dispaly-6">
                    Selamat datang di PT. Barang Berkah, solusi terpercaya untuk pengelolaan barang yang lebih efisien
                    dan terorganisir. Kami berkomitmen membantu bisnis dari berbagai skala dalam meningkatkan
                    produktivitas melalui teknologi inovatif dan layanan unggulan.
                    Didirikan dengan visi untuk menyederhanakan manajemen inventaris, kami menyediakan platform yang
                    dirancang untuk memenuhi kebutuhan unik Anda. Dengan fitur yang mudah digunakan dan dukungan
                    pelanggan yang responsif, kami siap menjadi mitra Anda dalam mengoptimalkan proses operasional.
                    Bersama kami, kelola barang dengan lebih cerdas dan wujudkan kesuksesan bisnis Anda!
                </h4>
            </div>
        </div>
    </div>
</section>

<section id="news" class="isi text-center p-5 text-dark mt-5 min-vh-100">
    <div class="container">
        <h1 class="fw-bold dispaly-4 pb-3">News</h1>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="kardus.jpg" class=" w-30" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class=" text-dark">First slide label</h5>
                        <p class=" text-dark">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="kardus.jpg" class=" w-30" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class=" text-dark">Second slide label</h5>
                        <p class=" text-dark">Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="kardus.jpg" class=" w-30" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class=" text-dark">Third slide label</h5>
                        <p class=" text-dark">Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?= $this->endSection() ?>