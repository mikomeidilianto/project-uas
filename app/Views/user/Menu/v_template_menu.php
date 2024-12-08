<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('Admin') ?>\assets\css\style-global.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    
    <style>
        .btn-icon {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            color: white;
        }

        .btn-icon:focus {
            background: none;
            outline: none;
            box-shadow: none;
            color: white;
        }

        body {
            font-family: "Poppins", sans-serif;
        }

        .w-80 {
            width: 80%;
        }

        .list-group-item {
            border: none;
            /* Menghapus border */
            background-color: transparent;
            color: black;

            /* Tidak ada background untuk item yang tidak aktif */
        }

        .list-group-item.active {
            background-color: RGBA(112, 153, 147, 0.3);
            /* Hijau untuk item yang aktif */
            color: black;
            /* Mengubah teks menjadi putih pada item aktif */
            border-radius: 50px;
        }

        .list-group {
            background-color: transparent;
            color: black;
            /* Menghapus background list-group */
        }
    </style>
</head>

<body>
    <?php echo view('user/v_navbar'); ?>
    <main>
        <?php echo view($page); ?> <!-- Memanggil view yang di controller -->
    </main>
    <?php echo view('user/v_footer'); ?>

</body>

</html>