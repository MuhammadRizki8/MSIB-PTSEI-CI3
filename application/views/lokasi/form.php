<h2><?= isset($lokasi) ? 'Edit' : 'Tambah'; ?> Lokasi</h2>
<form method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="namaLokasi">Nama Lokasi</label>
            <input type="text" class="form-control" id="namaLokasi" name="namaLokasi" value="<?= isset($lokasi['namaLokasi']) ? htmlspecialchars($lokasi['namaLokasi'], ENT_QUOTES) : ''; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="negara">Negara</label>
            <input type="text" class="form-control" id="negara" name="negara" value="<?= isset($lokasi['negara']) ? htmlspecialchars($lokasi['negara'], ENT_QUOTES) : ''; ?>" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= isset($lokasi['provinsi']) ? htmlspecialchars($lokasi['provinsi'], ENT_QUOTES) : ''; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="kota">Kota</label>
            <input type="text" class="form-control" id="kota" name="kota" value="<?= isset($lokasi['kota']) ? htmlspecialchars($lokasi['kota'], ENT_QUOTES) : ''; ?>" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($lokasi) ? 'Update' : 'Tambah'; ?></button>
</form>
