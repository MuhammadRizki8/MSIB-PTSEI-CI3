<!-- views/templates/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek dan Lokasi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Proyek & Lokasi</a>
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
