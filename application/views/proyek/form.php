<!DOCTYPE html>
<html>
<head>
    <title><?= isset($proyek) ? 'Edit' : 'Tambah'; ?> Proyek</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card { padding: 20px; border-radius: 8px; margin-top: 20px; }
        .form-group { margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="container mb-4" style="min-height: 80vh;">
        <h2 class="mb-2"><?= isset($proyek) ? 'Edit' : 'Tambah'; ?> Proyek</h2>
        <div class="card p-2">
            <div class="card-body">
                <form method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="namaProyek">Nama Proyek</label>
                            <input type="text" class="form-control" id="namaProyek" name="namaProyek" value="<?= isset($proyek) ? htmlspecialchars($proyek['namaProyek']) : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="client">Client</label>
                            <input type="text" class="form-control" id="client" name="client" value="<?= isset($proyek) ? htmlspecialchars($proyek['client']) : ''; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tglMulai">Tanggal Mulai</label>
                            <input type="datetime-local" class="form-control" id="tglMulai" name="tglMulai" value="<?= isset($proyek) ? date('Y-m-d\TH:i', strtotime($proyek['tglMulai'])) : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tglSelesai">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" id="tglSelesai" name="tglSelesai" value="<?= isset($proyek) ? date('Y-m-d\TH:i', strtotime($proyek['tglSelesai'])) : ''; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pimpinanProyek">Pimpinan Proyek</label>
                        <input type="text" class="form-control" id="pimpinanProyek" name="pimpinanProyek" value="<?= isset($proyek) ? htmlspecialchars($proyek['pimpinanProyek']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= isset($proyek) ? htmlspecialchars($proyek['keterangan']) : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="lokasiId">Lokasi</label>
                        <select class="form-control" id="lokasiId" name="lokasiId">
                            <?php foreach ($lokasi as $l): ?>
                                <option value="<?= $l['id']; ?>" <?= isset($proyek) && $proyek['lokasi']['id'] == $l['id'] ? 'selected' : ''; ?>><?= htmlspecialchars($l['namaLokasi']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><?= isset($proyek) ? 'Update' : 'Tambah'; ?></button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
