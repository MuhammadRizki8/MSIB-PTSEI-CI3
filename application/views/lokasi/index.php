<h2>Daftar Lokasi</h2>
<a href="<?= base_url('lokasi/create'); ?>" class="btn btn-primary mb-3">Tambah Lokasi</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Lokasi</th>
            <th>Negara</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lokasi as $l): ?>
        <tr>
            <td><?= $l['id']; ?></td>
            <td><?= $l['namaLokasi']; ?></td>
            <td><?= $l['negara']; ?></td>
            <td><?= $l['provinsi']; ?></td>
            <td><?= $l['kota']; ?></td>
            <td>
                <a href="<?= base_url('lokasi/edit/'.$l['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('lokasi/delete/'.$l['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
