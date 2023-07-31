<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simple</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>

     <!-- materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="<?= base_url('assets/css/main-dark.css') ?>" rel="stylesheet" />
    <style>
        .header {
            height: 70px !important;
        }

        .header-logo {
            height: 35px !important;
        }
    </style>
</head>

<body>
    <header class="header z-depth-5 d-flex justify-content-between">
        <div class="p-2 px-4 d-flex flex-column justify-content-center">
            <img src="<?= base_url('assets/images/white-t-logo.png') ?>" class="header-logo" alt="Small-blog-logo" />
        </div>
        <div class="d-flex flex-column justify-content-center col-9">
            <div class="d-flex col-6">
                <a href="<?= base_url('/') ?>" class="btn waves-effect waves-light mx-1">Home</a>
                <a href="<?= base_url('/products') ?>" class="btn waves-effect waves-light mx-1">Find</a>
                <a href="<?= base_url('/blog/node-js-and-express') ?>" class="btn waves-effect light waves-light mx-1">Blog</a>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center">
            <button class="btn btn-success d-flex btn-large mx-4">Signin <i class="material-icons right">login</i></button>
        </div>
    </header>
    <div class="p-0">
        <?= view($content, $data) ?>
    </div>
    <footer class="z-depth-5 d-flex flex-column justify-content-center" style="height: 10vh">
        <div class="container">
            <p class="m-0 p-0 text-light">Copyright © 2023 simple. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>