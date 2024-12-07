<!-- foto slide -->
<div class="mt-5">
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators" >
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
<div class="row mt-5" style="width: 200vh;">
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
                                            <img src="<?= base_url('Admin/assets/img/'. $product['foto']) ?>" class="card-img-top" width="100px" height="300px" alt="<?= htmlspecialchars($product['name']) ?>">
                                        <?php } else { ?>
                                            <div class="card-img-top d-flex justify-content-center align-items-center" style="height: 200px;">
                                                <span class="text-center"><?= $product['status'] == 'inactive' ? 'Stok Habis' : 'Foto Tidak Tersedia' ?></span>
                                            </div>
                                        <?php } ?>
                                        <div class="card-body">
                                            <h5 class="card-title"><?= htmlspecialchars($product['name']); ?></h5>
                                            <p class="card-text">Rp. <?= htmlspecialchars($price); ?></p>
                                            <button type="submit" value="submit" class="btn btn-primary add-to-cart data-product-id="<?= $product['id'] ?>" style="background-color: #214836; border: none;" <?= $product['status'] == 'inactive' || $product['stock'] <= 0 ? 'disabled' : ''?>
                                            ><?=$product['status'] == 'inactive' || $product['stock'] <= 0 ? 'Habis' : 'Tambah'  ?></button>
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
    <div class="col-8">
        <div class="tab-content" id="nav-tabContent" style="border: none; box-shadow: none;">
            <div class="tab-pane fade show active" id="list-beska" role="tabpanel" aria-labelledby="list-kopi_beska-list">
                <div class="col-md-12" style="width: 114%;">
                    <div class="row mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-uramen" role="tabpanel" aria-labelledby="list-uramen-list">
                <div class="col-md-12" style="width: 114%;">
                    <div class="row mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-geprek" role="tabpanel" aria-labelledby="list-geprek_goo-list">
                <div class="col-md-12" style="width: 114%;">
                    <div class="row mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #214836; border: none;">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); padding: 1.5em;">

                                        <!-- Bagian Header -->
                                        <div class="modal-header d-flex align-items-center" style="background-color: #ffffff; border-bottom: none; padding: 0;">
                                            <!-- Foto di Samping -->
                                            <img src="path/to/your/image.jpg" alt="Es Kopi Susu Beska"
                                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">

                                            <!-- Judul dan Harga -->
                                            <div>
                                                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold; margin: 0;">Es Kopi Susu Beska</h5>
                                                <p style="margin: 0; font-size: 1.5em; font-weight: bold; color: #214836;">Rp. 18.000</p>
                                            </div>
                                        </div>

                                        <!-- Bagian Body -->
                                        <div class="modal-body" style="padding: 1.5em;">
                                            <form>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Sugar</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="normal" id="sugarNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarNormal" style="font-size: 0.95em; color: #214836; ">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="sugar" value="less" id="sugarLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="sugarLess" style="font-size: 0.95em; color: #214836;">Less Sugar</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3" style="border-top: 3px solid #D9D9D9;">
                                                    <label class="form-label" style="font-size: 1em; font-weight: 450; color: #214836;">Ice</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="normal" id="iceNormal" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceNormal" style="font-size: 0.95em; color: #214836;">Normal</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="ice" value="less" id="iceLess" style="margin-right: 0.5em;">
                                                        <label class="form-check-label" for="iceLess" style="font-size: 0.95em; color: #214836;">Less Ice</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- Bagian Footer -->
                                        <div class="modal-footer" style="padding: 0.75em; border-top: none;">
                                            <button type="button" class="btn btn-primary btn-block"
                                                style="width: 100%; padding: 0.50em; border-radius: 8px; background-color: #214836; border: none; font-size: 1.2em; color: #fff;">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-ghurih" role="tabpanel" aria-labelledby="list-ghurih-list">
                <div class="col-md-12" style="width: 114%;">
                    <div class="row mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card" ">
                                <img src=" https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-mauchurros" role="tabpanel" aria-labelledby="list-mauchurros-list">
                <div class="col-md-12" style="width: 114%;">
                    <div class="row mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card" ">
                                <img src=" https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-miehap" role="tabpanel" aria-labelledby="list-mie_hap_hap-list">
                <div class="col-md-12" style="width: 114%;">
                    <div class="row mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card" ">
                                <img src=" https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-dawet" role="tabpanel" aria-labelledby="list-tuan_dawet_indonesia-list">
                <div class="col-md-12" style="width: 114%;">
                    <div class="row mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card" ">
                                <img src=" https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="list-honey" role="tabpanel" aria-labelledby="list-my_honey-list">
                <div class="col-md-12" style="width: 114%;">
                    <div class="row mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card" ">
                                <img src=" https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <!-- Card 1 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-md-4">
                            <div class="card custom-card">
                                <img src="https://via.placeholder.com/300" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card Title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary" style="background-color: #214836; border: none;">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>