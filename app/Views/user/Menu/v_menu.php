<!-- foto slide -->
<div class="mt-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= base_url('Admin') ?>/assets/img/buy1get1.png" class="d-block w-75 mt-5 mb-3 mx-auto" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('Admin') ?>/assets/img/buy1get1.png" class="d-block w-75 mt-5 mb-3 mx-auto" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('Admin') ?>/assets/img/buy1get1.png" class="d-block w-75 mt-5 mb-3 mx-auto" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<!-- side bar dan menu -->
<div class="row mt-5" style="width: 200vh; margin-bottom: 200px !important;">
    <div class="col-2" style=" margin-left: 85px !important;">
        <h4> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
            </svg> Semua Tenant</h4>


        <div class="list-group" id="list-tab" role="tablist" style="font-weight: 500;">
            <?php
            foreach ($kategorimenu as $key => $value) {
                // Variabel ID dan href untuk Bootstrap Tab
                $id = strtolower(str_replace(' ', '_', $value['name'])); // Mengubah nama menjadi slug
            ?>
                <a
                    class="list-group-item list-group-item-action <?= $key === 0 ? 'active' : '' ?>"
                    id="list-<?= $id ?>-list" data-bs-toggle="list" href="#list-<?= $id ?>" role="tab" aria-controls="list-<?= $id ?>">
                    <?= htmlspecialchars($value['name']); ?>
                </a>
            <?php } ?>
        </div>
    </div>

    <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
            <?php foreach ($kategorimenu as $key => $value) { ?>
                <div class="tab-pane fade <?= $key === 0 ? 'show active' : '' ?>" id="list-<?= strtolower(str_replace(' ', '_', $value['name'])) ?>" role="tabpanel" aria-labelledby="list-<?= strtolower(str_replace(' ', '_', $value['name'])) ?>-list">
                    <div class="row mt-3">
                        <?php foreach ($produkmenu as $product) {
                            $price = number_format($product['price'], 2, ',', '.');
                        ?>
                            
                            <?php if ($product['category_id'] == $value['id']) { ?>
                                <div class="col-md-4 mt-4">
                                    <div class="card custom-card  <?= $product['status'] == 'inactive' || $product['stock'] <= 0 ? 'bg-dark text-white'  : '' ?>">
                                        <?php if ($product['foto']) { ?>
                                            <img src="<?= base_url('Admin/assets/img/' . $product['foto']) ?>" class="card-img-top" width="100px" height="300px" alt="<?= htmlspecialchars($product['name']) ?>">
                                        <?php } else { ?>
                                            <div class="card-img-top d-flex justify-content-center align-items-center" style="height: 200px;">
                                                <span class="text-center"><?= $product['status'] == 'inactive' ? 'Stok Habis' : 'Foto Tidak Tersedia' ?></span>
                                            </div>
                                        <?php } ?>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= htmlspecialchars($product['name']); ?></h5>
                                            <p class="card-text">Rp. <?= htmlspecialchars($price); ?></p>
                                            <button type="button" class="btn btn-primary tambah-ke-keranjang" 
                                                style="background-color: #214836; border: none;"
                                                onclick="addToCart(<?= $product['id'] ?>)"
                                                <?= $product['status'] == 'inactive' || $product['stock'] <= 0 ? 'disabled' : '' ?>>
                                                <?= $product['status'] == 'inactive' || $product['stock'] <= 0 ? 'Habis' : 'Tambah' ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>

</div>  

<script>
    // Fungsi untuk menambahkan produk ke keranjang
    function addToCart(id_product) {
        fetch("<?= site_url('user/Keranjang/addToCart') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: JSON.stringify({
                id_product: id_product,
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                updateCartCount(); // Perbarui badge jumlah item di navbar
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Fungsi untuk memperbarui jumlah item di badge navbar
    function updateCartCount() {
        fetch("<?= site_url('user/Keranjang/getCart') ?>", {
            method: "GET",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector('.cart-count').innerText = data.cartCount;
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
