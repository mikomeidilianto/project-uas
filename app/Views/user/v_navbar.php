<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #214836;">
    <div class="container-fluid">
        <a href="#" class="navbar-brand m-0">
            <img src="<?= base_url('Admin') ?>/assets/img/Logo-Green-Cloud-Kitchen.png" alt="main_logo" class="navbar-brand-img" width="40" height="40" style="margin-left: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="/" style="font-size: 15px;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/Menu" style="font-size: 15px; margin-left: 50px;">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/#about" style="font-size: 15px; margin-left: 50px;">About Us</a>
                </li>
            </ul>

            <!-- Tombol Keranjang -->
            <button class="btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartSidebar" aria-controls="cartSidebar" style="margin-left: 50px; margin-right: 50px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
                <span class="badge bg-danger rounded-pill cart-count" style="background-color: #B08E63">0</span>
            </button>
        </div>
    </div>
</nav>

<!-- Sidebar Keranjang -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="cartSidebar" aria-labelledby="cartSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="cartSidebarLabel">Keranjang Anda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" id="cartContent">
        <!-- Keranjang akan diperbarui melalui AJAX -->
        <div class="text-center">
            <p></p>
        </div>
    </div>
</div>

<script>
    // Muat isi keranjang saat sidebar dibuka
    addEventListener("DOMContentLoaded", (event) =>  {
        loadCart();
    });

    // Fungsi untuk memuat isi keranjang
    function loadCart() {
        fetch("<?= site_url('user/Keranjang/getCart') ?>", {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                renderCart(data.cart); // Render keranjang dengan data yang diterima
                updateCartCount(data.cartCount); // Update badge jumlah item
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Fungsi untuk merender keranjang
    function renderCart(cart) {
        let cartContent = '';
        let totalCart = 0;
        

        if (cart.length === 0) {
        // Jika keranjang kosong
        cartContent += `
            <div class="text-center">
                <p>Keranjang Anda kosong</p>
            </div>`;
        } else {

        cart.forEach(item => {
            let itemTotal = item.price * item.quantity;
            totalCart += itemTotal;
            
            cartContent += `
                <div class="cart-item" style="margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 15px;">
                    <div class="row">
                        <div class="col-4">
                            <img src="<?= base_url('Admin/assets/img/') ?>${item.foto}" class="img-fluid object-fit-cover" style="width: 200px; height: 100px;" alt="${item.name}">
                        </div>
                        <div class="col-8">
                            <h6>${item.product_name}</h6>
                            <div class="d-flex align-items-center" style="gap: 10px;">
                                <button class="btn btn-sm btn-secondary" onclick="changeQuantity('minus', ${item.id_product})">-</button>
                                <span id="quantity-${item.id}" style="font-size: 16px; font-weight: bold;">${item.quantity}</span>
                                <button class="btn btn-sm btn-secondary" onclick="changeQuantity('plus', ${item.id_product})">+</button>
                            </div>
                            <p>Total: Rp<span id="total-${item.id}">${itemTotal.toFixed(2)}</span></p>
                        </div>
                    </div>
                </div>`;
                
        });

        cartContent += `
            <hr>
            <h6>Total: Rp<span id="cartTotal">${totalCart.toFixed(2)}</span></h6>
            <a href="<?= site_url('user/Keranjang/checkout') ?>" class="btn w-100" style="background-color: #214836; color: white;">Checkout</a>`;
        }
        document.getElementById('cartContent').innerHTML = cartContent;
    }

    // Fungsi untuk memperbarui jumlah item di navbar
    function updateCartCount(count) {
        document.querySelector('.cart-count').innerText = count;
    }

    // Fungsi untuk mengubah jumlah produk
    function changeQuantity(action, id_product) {
        fetch("<?= site_url('user/keranjang/updateQuantity') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: JSON.stringify({ action, id_product })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadCart(); // Refresh isi keranjang
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>