<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex">
                <a href="<?= base_url('admin/product') ?>">
                    <svg width="20px" height="30px" xmlns=" http://www.w3.org/2000/svg" viewBox="0 100 500 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/>
                </svg>
            </a>
              <h6 class="ms-md-3">Edit Produk</h6>
            </div>
            <div class="card-body px-4 pt-4 pb-2">
                <?php
                session();
                $validation = \Config\Services::validation();
                ?>
                <?php echo form_open('admin/Product/UpdateData/' . $detailproduk['id']) ?>
                <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama Produk</label>
                    <input name="name" value="<?= $detailproduk['name'] ?>" class="form-control">
                    <p class="text-danger"><?= isset($errors['name']) == isset($errors['name']) ? validation_show_error('name') : '' ?></p>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label>Deskripsi Produk</label>
                    <input name="description" value="<?= $detailproduk['description'] ?>" class="form-control">
                    <p class="text-danger"><?= isset($errors['description']) == isset($errors['description']) ? validation_show_error('description') : '' ?></p>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                    <label>Harga</label>
                    <input name="price" value="<?= $detailproduk['price'] ?>" class="form-control">
                    <p class="text-danger"><?= isset($errors['price']) == isset($errors['price']) ? validation_show_error('price') : '' ?></p>
                </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Stok</label>
                    <input name="stock" value="<?= $detailproduk['stock'] ?>" class="form-control">
                    <p class="text-danger"><?= isset($errors['stock']) == isset($errors['stock']) ? validation_show_error('stock') : '' ?></p>
                </div>
                </div>
                <div class="col-sm-6">
                </div>
                </div>
                
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="category_id" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option 
                            value="<?= $value['id'] ?>" 
                            <?= ($detailproduk['category_id'] == $value['id']) ? 'selected' : '' ?>>
                            <?= $value['name'] ?> 
                            </option>
                        <?php } ?>
                    </select>
                    <p class="text-danger"><?= isset($errors['category_id']) == isset($errors['category_id']) ? validation_show_error('category_id') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input name="image_path" value="<?= $detailproduk['image_path'] ?>" class="form-control">
                    <p class="text-danger"><?= isset($errors['image_path']) == isset($errors['image_path']) ? validation_show_error('image_path') : '' ?></p>
                </div>
                <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="">--Pilih Status--</option>
                    <option value="active" <?= ($detailproduk['status'] == 'active') ? 'selected' : '' ?>>Aktif</option>
                    <option value="inactive" <?= ($detailproduk['status'] == 'inactive') ? 'selected' : '' ?>>Kosong</option>
                </select>
                <p class="text-danger"><?= isset($errors['status']) == isset($errors['status']) ? validation_show_error('status') : '' ?></p>
            </div>

                
                <button type="submit" class="btn btn-primary">Simpan</button>
                        
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>


