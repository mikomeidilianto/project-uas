<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex">
                <a href="<?= base_url('admin/kategori') ?>">
                    <svg width="20px" height="30px" xmlns=" http://www.w3.org/2000/svg" viewBox="0 100 500 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/>
                </svg>
            </a>
              <h6 class="ms-md-3">Edit Kategori</h6>
            </div>
            <div class="card-body px-4 pt-4 pb-2">
                <?php
                session();
                $validation = \Config\Services::validation();
                ?>
                <?php echo form_open('admin/Kategori/UpdateData/' . $kategori['id']) ?>
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input name="name" value="<?= $kategori['name'] ?>" class="form-control">
                    <p class="text-danger"><?= isset($errors['name']) == isset($errors['name']) ? validation_show_error('name') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>Deskripsi Kategori</label>
                    <input name="description" value="<?= $kategori['description'] ?>" class="form-control">
                    <p class="text-danger"><?= isset($errors['description']) == isset($errors['description']) ? validation_show_error('description') : '' ?></p>
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan</button>
                
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>


