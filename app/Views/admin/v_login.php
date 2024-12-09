<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login - Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= base_url('Admin/assets/css/style-login.css') ?>?v=1.0">
    

</head>

<body>
    
    <div class="login-container">
    <div class="login-card">
    <?php
            // Pesan validasi error
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)){ ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php } ?>
            <?php
            if (session()->getFlashdata('pesan')){
                echo '<div class="alert alert-danger" role="alert">';
                echo session()->getFlashdata('pesan');
                echo '</div>';
            }
            ?>

            <h3>Welcome!</h3>
            <?php echo form_open('admin/Auth/cek_login') ?>
                <label class="form-label" for="username">Username</label>
                <input type="text" name="nama" id="nama" class="form-input" placeholder="Enter your username"  />

                <label class="form-label" for="password">Password</label>
                <input type="password" name="password" id="password" class="form-input" placeholder="Enter your password" />

                <button type="submit" class="btn">Log In</button>
                <?php echo form_close()  ?>
        </div>
    </div>
</body>

</html>