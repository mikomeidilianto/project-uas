    <nav class="navbar navbar-expand-lg" style="background-color: #214836;">
        <div class="container-fluid">
            <a href="#" class="navbar-brand m-0">
                <img src="<?= base_url('Admin') ?>/assets/img/Logo-Green-Cloud-Kitchen.png" alt="main_logo" class="navbar-brand-img" width="40" height="40" style="margin-left: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#" style="font-size: 15px; ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" style="font-size: 15px; margin-left: 50px;">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" style="font-size: 15px; margin-left: 50px;">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#" style="font-size: 15px; margin-left: 50px;">Login</a>
                    </li>
                </ul>

                <!-- Search bar -->
                <form class="d-flex">
                    <button class="btn-icon" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>

                    <!-- Keranjang -->
                    <button class="btn-icon" type="submit" style="margin-left: 50px; margin-right: 50px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <section class="py-2 container-fluid" style="background-color: #214836; height: 80vh;">
        <div class="row py-lg-5">
            <!-- Konten Teks -->
            <div class="col-lg-6 col-md-6 d-flex flex-column justify-content-center text-white" style="padding-left: 50px;">
                <h1 style="font-size: 60px;">Green Cloud Kitchen</h1>
                <p style="font-size: 25px;">Pesan Makan Tanpa Antri!</p>
                <button class="btn btn-outline-light btn-lg" style="background-color: #b08e63; border: none; width:190px">Coba Sekarang</button>
            </div>

            <!-- Gambar -->
            <div class="col-lg-6 col-md-6 d-flex justify-content-end align-items-center">
                <img src="<?= base_url('Admin') ?>/assets/img/Foto-makanan.png" class="img-fluid" style="max-width: 450px; margin-right: -12px;">
            </div>
        </div>
    </section>