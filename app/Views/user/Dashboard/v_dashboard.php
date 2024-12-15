    <style>
        .tenant-logo {
            height: 150px !important;
            /* Menambahkan !important */
            width: 150px !important;
            /* Menambahkan !important */
            object-fit: contain;
        }
    </style>

    <section class="py-2 container-fluid ps-xl-5" style="background-color: #214836; height: 80vh;">
        <div class="row py-lg-5">
            <!-- Konten Teks -->
            <div class="col-lg-6 col-md-6 d-flex flex-column justify-content-center text-white" style="padding-left: 50px;">
                <h1 style="font-size: 60px;">Green Cloud Kitchen</h1>
                <p style="font-size: 25px;">Pesan Makan Tanpa Antri!</p>
                <a class="btn btn-outline-light btn-lg" href="/Menu" style="background-color: #b08e63; border: none; width:190px">Coba Sekarang
                </a>
            </div>
            <!-- Gambar -->
            <div class="col-lg-6 col-md-6 d-flex justify-content-end align-items-center">
                <img src="<?= base_url('Admin') ?>/assets/img/Foto-makanan.png" class="img-fluid" style="max-width: 450px; margin-right: -12px;">
            </div>
        </div>
    </section>


    <section class="py-5 container-fluid px-xl-5" style="background-color: #F5F0E3;">
        <!-- Our Tenants -->
        <div class="container mt-2 mb-5">
            <h2 class="text-center mb-4">Our Tenants</h2>
            <div class="marquee-container" style="height: 200px;">
                <div class="marquee-content" style="height: 200px;">
                    <!-- First set of logos -->
                    <?php $no = 1; 
                    foreach ($kategori as $key => $value) { ?>
                    <img src="<?= base_url('Admin/assets/img/'. $value['foto']) ?>" alt="<?= $value['name']; ?>" class="tenant-logo " height="100px" width="100px">
                    <!-- Duplicate the first set of logos -->
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Inline CSS for the marquee animation -->
        <style>
            .marquee-container {
                overflow: hidden;
                width: 100%;
                position: relative;
            }

            .marquee-content {
                display: flex;
                animation: marquee 20s linear infinite;
            }

            .marquee-content:hover {
                animation-play-state: paused;
            }

            @keyframes marquee {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(calc(-100% - 1rem));
                }
            }
            
            

            .tenant-logo {
                flex: 0 0 auto;
                max-height: 80px;
                margin-right: 30px;
                object-fit: contain;
            }
        </style>



        <!-- Menu -->
        <div class="container my-5">
            <h2 class="text-center mb-4">Menu</h2>
            <div class="row">

                <?php $no = 1;
                foreach ($produkhome as $key => $value) {
                    $price = number_format($value['price'], 2, ',', '.');
                ?>
                    <div class="col-lg-2 col-md-6 mb-4">
                        <a href="/Menu" class="text-decoration-none">
                            <div class="card custom-card h-100">
                                <!-- Gambar menu -->
                                <img src="<?= base_url('Admin/assets/img/' . $value['foto']) ?>" class="card-img-top" width="100vh" height="200vh" alt="<?= $value['name']; ?>">
                                <div class="card-body text-left">
                                    <!-- Nama menu -->
                                    <h5 class="card-title"><?= $value['name'] ?></h5>
                                    <h6 class="card-title"><?= $value['category_name'] ?></h6>
                                    <!-- Harga menu -->
                                    <div class="">
                                        <p class="card-text">Rp<?= $price ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="text-center">
                <a class="btn btn-outline-light btn-lg" href="/Menu/#menu" style="background-color: #b08e63; border: none;">
                    LIHAT SELENGKAPNYA
                </a>
            </div>
        </div>
    </section>

    <section class="py-5 container-fluid px-xl-5" style="background-color: #214836;" id="about">
        <!-- Judul -->
        <div class="row py-3">
            <div class="col-12 text-center text-white">
                <h2 style="text-center mb-4">About Us</h2>
            </div>
        </div>
        <!-- Gambar dan Deskripsi -->
        <div class="row py-4">
            <!-- Gambar Kiri -->
            <div class="col-lg-7 col-md-7 d-flex justify-content-center">
                <img src="<?= base_url('Admin') ?>/assets/img/about-us-1.jpg"
                    class="img-fluid"
                    style="width: auto; height: auto;">
            </div>
            <!-- Gambar Kanan -->
            <div class="col-lg-5 col-md-5">
                <div class="row">
                    <!-- Gambar Atas Kanan -->
                    <div class="col-12 d-flex justify-content-center mb-4">
                        <img src="<?= base_url('Admin') ?>/assets/img/about-us-3.png"
                            class="img-fluid"
                            style="width: 100%; height: auto;">
                    </div>
                    <!-- Gambar Bawah Kanan -->
                    <div class="col-12 d-flex justify-content-center">
                        <img src="<?= base_url('Admin') ?>/assets/img/about-us-2.jpg"
                            class="img-fluid"
                            style="width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </div>
        <!-- Deskripsi -->
        <div class="row py-2">
            <div class="col-12 text-justify text-white">
                <p style="font-size: 20px; line-height: 1.5; max-width: 2000px; margin: auto;">
                    Green Cloud Kitchen adalah inovasi kuliner modern yang dikelola oleh UPN “Veteran” Jakarta,
                    menjadi rumah bagi berbagai tenant UMKM berbakat dari Kota Depok. Di sini, kami menghubungkan
                    cita rasa lokal dengan teknologi, menghadirkan pengalaman kuliner terbaik untuk Anda.
                </p>
            </div>
        </div>
    </section>