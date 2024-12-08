<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #214836;">
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
                    <a class="nav-link active text-white" href="/" style="font-size: 15px; ">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/Menu" style="font-size: 15px; margin-left: 50px;">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/#about" style="font-size: 15px; margin-left: 50px;">About Us</a>
                </li>
            </ul>

            <!-- Tombol Keranjang di Navbar -->
            <button class="btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartSidebar" aria-controls="cartSidebar" style="margin-left: 50px; margin-right: 50px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                </svg>
                <span class="badge bg-danger rounded-pill cart-count" style="background-color: #B08E63">0</span>
            </button>

        </div>
    </div>
</nav>


<?php
// Contoh koneksi ke database menggunakan PDO
$host = 'localhost';
$dbname = 'db_tokokopi';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Mengambil data keranjang
$query = "SELECT * FROM keranjang";
$stmt = $pdo->query($query);
$keranjang = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="cartSidebar" aria-labelledby="cartSidebarLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" style="padding: 20px;">
        <?php
        $totalCart = 0; // Variabel untuk menghitung total keranjang
        // Menampilkan item keranjang dari database
        foreach ($keranjang as $item) {
            // Ambil data setiap produk
            $product_id = $item['id'];
            $product_name = $item['name'];
            $product_price = $item['price'];
            $product_image = $item['foto'];
            $product_quantity = 1; // Set default quantity to 1

            // Hitung harga total per item (harga * quantity)
            $item_total = $product_price * $product_quantity;
            $totalCart += $item_total; // Tambahkan ke total keranjang
        ?>
            <div class="cart-item" style="margin-bottom: 15px; border-bottom: 1px solid #ddd; padding-bottom: 15px;">
                <div class="row">
                    <div class="col-4">
                        <!-- Gambar Produk -->
                        <img src="images/<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>" class="img-fluid" style="max-width: 100%;">
                    </div>
                    <div class="col-8">
                        <h6 style="margin-bottom: 5px;"><?php echo $product_name; ?></h6>
                        <div class="d-flex align-items-center" style="gap: 10px;">
                            <!-- Tombol Plus dan Minus -->
                            <button class="btn btn-sm btn-secondary" onclick="changeQuantity('minus', 'quantity-<?php echo $product_id; ?>', <?php echo $product_price; ?>)">-</button>
                            <span id="quantity-<?php echo $product_id; ?>" style="font-size: 16px; font-weight: bold; text-align: center; min-width: 30px; display: inline-block;"><?php echo $product_quantity; ?></span>
                            <button class="btn btn-sm btn-secondary" onclick="changeQuantity('plus', 'quantity-<?php echo $product_id; ?>', <?php echo $product_price; ?>)">+</button>
                        </div>
                        <p style="margin: 0;">Total: $<span id="total-<?php echo $product_id; ?>"><?php echo $item_total; ?></span></p>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <!-- Total Harga dan Tombol Checkout -->
        <div class="cart-total" style="margin-top: 20px;">
            <hr style="margin-bottom: 10px;">
            <h6 style="font-weight: bold;">Total: $<span id="cartTotal"><?php echo number_format($totalCart, 2); ?></span></h6>
            <a href="<?= site_url('pesanan') ?>" class="btn w-100" style="margin-top: 10px; background-color: #214836; color: white;">
                Checkout
            </a>

        </div>
    </div>
</div>

<script>
    // Fungsi untuk mengubah jumlah dan menghitung total harga
    function changeQuantity(action, quantityId, price) {
        var quantityElement = document.getElementById(quantityId);
        var currentQuantity = parseInt(quantityElement.innerText);
        var totalPriceElement = document.getElementById("total-" + quantityId.split('-')[1]);
        var currentTotalPrice = parseFloat(totalPriceElement.innerText);

        if (action === 'plus') {
            currentQuantity++;
        } else if (action === 'minus' && currentQuantity > 1) {
            currentQuantity--;
        }

        // Update jumlah produk
        quantityElement.innerText = currentQuantity;

        // Update harga total per item
        var newTotalPrice = (currentQuantity * price).toFixed(2);
        totalPriceElement.innerText = newTotalPrice;

        // Update total keranjang
        updateCartTotal();
    }

    // Fungsi untuk menghitung total harga seluruh keranjang
    function updateCartTotal() {
        var total = 0;

        // Ambil semua elemen yang mengandung harga total produk
        var totalElements = document.querySelectorAll('[id^="total"]');
        totalElements.forEach(function(element) {
            total += parseFloat(element.innerText);
        });

        // Update total harga keseluruhan
        document.getElementById('cartTotal').innerText = total.toFixed(2);
    }
</script>