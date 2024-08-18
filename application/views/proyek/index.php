<h2>Daftar Proyek</h2>
<a href="<?= base_url('proyek/create'); ?>" class="btn btn-primary mb-3">Tambah Proyek</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID Proyek</th>
            <th>Nama Proyek</th>
            <th>Client</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Pimpinan Proyek</th>
            <th>Keterangan</th>
            <th>Lokasi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($proyek)): ?>
            <?php foreach ($proyek as $p): ?>
            <tr>
                <td><?= $p['id']; ?></td>
                <td><?= $p['namaProyek']; ?></td>
                <td><?= $p['client']; ?></td>
                <td><?= date('d M Y', strtotime($p['tglMulai'])); ?></td>
                <td><?= date('d M Y', strtotime($p['tglSelesai'])); ?></td>
                <td><?= $p['pimpinanProyek']; ?></td>
                <td><?= $p['keterangan']; ?></td>
                <td>
                    <strong>Nama Lokasi:</strong> <?= $p['lokasi']['namaLokasi']; ?><br>
                    <strong>Negara:</strong> <?= $p['lokasi']['negara']; ?><br>
                    <strong>Provinsi:</strong> <?= $p['lokasi']['provinsi']; ?><br>
                    <strong>Kota:</strong> <?= $p['lokasi']['kota']; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8">Tidak ada data proyek yang tersedia.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

