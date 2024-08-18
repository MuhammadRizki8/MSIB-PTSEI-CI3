<h2><?= isset($proyek) ? 'Edit' : 'Tambah'; ?> Proyek</h2>
<form method="post">
    <div class="form-group">
        <label for="namaProyek">Nama Proyek</label>
        <input type="text" class="form-control" id="namaProyek" name="namaProyek" value="<?= isset($proyek) ? $proyek['namaProyek'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="client">Client</label>
        <input type="text" class="form-control" id="client" name="client" value="<?= isset($proyek) ? $proyek['client'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="tglMulai">Tanggal Mulai</label>
        <input type="date" class="form-control" id="tglMulai" name="tglMulai" value="<?= isset($proyek) ? date('Y-m-d', strtotime($proyek['tglMulai'])) : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="tglSelesai">Tanggal Selesai</label>
        <input type="date" class="form-control" id="tglSelesai" name="tglSelesai" value="<?= isset($proyek) ? date('Y-m-d', strtotime($proyek['tglSelesai'])) : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="pimpinanProyek">Pimpinan Proyek</label>
        <input type="text" class="form-control" id="pimpinanProyek" name="pimpinanProyek" value="<?= isset($proyek) ? $proyek['pimpinanProyek'] : ''; ?>" required>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= isset($proyek) ? $proyek['keterangan'] : ''; ?></textarea>
    </div>
    <div class="form-group">
        <label for="lokasiId">Lokasi</label>
        <select class="form-control" id="lokasiId" name="lokasiId">
            <?php foreach ($lokasi as $l): ?>
            <option value="<?= $l['id']; ?>" <?= isset($proyek) && $proyek['lokasiId'] == $l['id'] ? 'selected' : ''; ?>><?= $l['namaLokasi']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($proyek) ? 'Update' : 'Tambah'; ?></button>
</form>
