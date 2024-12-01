<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link id="pagestyle2" href="<?= base_url('Admin') ?>/assets/css/style-global.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>

<body>
    <div>
        <div class="row">
            <?php
            if ($page) {
                echo view($page);
            }
            ?>
        </div>
    </div>
</body>

</html>