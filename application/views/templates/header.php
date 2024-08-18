<!-- views/templates/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek dan Lokasi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: seagreen;
            color: #fff;
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff;
        }
        .nav-link {
            color: #fff;
            transition: transform 0.2s ease; /* Animasi transformasi */
        }
        .nav-link.active {
            font-weight: bold;
            color: #ffeb3b;
        }
        .nav-link:hover {
            color: #fff; /* Tidak berubah warna saat hover */
            transform: scale(1.1); /* Perbesar ukuran saat hover */
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">MSIB PT.SEI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item <?= ($this->uri->segment(1) == 'proyek' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('proyek'); ?>">List Proyek</a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'lokasi' && $this->uri->segment(2) == '') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('lokasi'); ?>">List Lokasi</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-4">
