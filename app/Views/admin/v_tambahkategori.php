<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex">
                <a href="<?= base_url('admin/kategori') ?>">
                    <svg width="20px" height="30px" xmlns=" http://www.w3.org/2000/svg" viewBox="0 100 500 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"/>
                </svg>
            </a>
              <h6 class="ms-md-3">Tambah Tenant</h6>
            </div>
            <div class="card-body px-4 pt-4 pb-2">
                <?php
                session();
                $validation = \Config\Services::validation();
                ?>
                <?php echo form_open_multipart('admin/Kategori/InsertData') ?>
                <div class="form-group">
                    <label>Nama Tenant</label>
                    <input name="name" value="<?= old('name') ?>" class="form-control">
                    <p class="text-danger"><?= isset($errors['name']) == isset($errors['name']) ? validation_show_error('name') : '' ?></p>
                </div>
                <div class="form-group">
                    <label>Deskripsi Tenant</label>
                    <input name="description" value="<?= old('description') ?>" class="form-control">
                    <p class="text-danger"><?= isset($errors['description']) == isset($errors['description']) ? validation_show_error('description') : '' ?></p>
                </div>
                
                <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" id="preview_gambar" class="form-control" name="foto"accept="image/*">
                    <p class="text-danger"><?= isset($errors['foto']) == isset($errors['foto']) ? validation_show_error('foto') : '' ?></p>
                </div>
                </div>
                
                <div class="col-sm-6">
                <label>Preview Foto</label>
                <div class="form-group">
                    <img src="<?= base_url('Admin') ?>/assets/img/" id="gambar_load" width="180px" height="200px"> 
                </div>
                </div>
            </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</div>

<script>
    function bacaGambar(input)
    {
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#gambar_load').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#preview_gambar').change(function(){
        bacaGambar(this);
    });
</script>


