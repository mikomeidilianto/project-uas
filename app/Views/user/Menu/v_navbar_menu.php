<nav class="navbar navbar-expand-lg" style="background-color: #FDFDFD; border-bottom: 2px solid #214836;">
    <div class=" container-fluid" style="font-weight: 500;">
        <a href="/" class="navbar-brand m-0">
            <img src="<?= base_url('Admin') ?>/assets/img/navbar_GCK_hijau.png" alt="main_logo" class="navbar-brand-img" width="50" height="50" style="margin-left: 50px;">
        </a>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">

                    <a a class="nav-link active" href="/" style="font-size: 15px; color: #214836;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Menu" style="font-size: 15px; margin-left: 50px; color: #214836;">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="font-size: 15px; margin-left: 50px;color: #214836;">About Us</a>
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
                <button class="btn-icon" type="submit" style="margin-left: 50px; margin-right: 50px; ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>