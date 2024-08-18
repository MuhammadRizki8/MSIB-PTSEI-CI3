<div class="container" style="min-height: 80vh;">
    <div class="row mb-3">
        <div class="col-12">
            <h2 class="mb-4">Daftar Proyek</h2>
            <a href="<?= base_url('proyek/create'); ?>" class="btn btn-primary">Tambah Proyek</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Proyek</th>
                            <th>Nama Proyek</th>
                            <th>Client</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Pimpinan Proyek</th>
                            <th>Keterangan</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($proyek)): ?>
                            <?php foreach ($proyek as $p): ?>
                            <tr>
                                <td><?= $p['id']; ?></td>
                                <td><?= htmlspecialchars($p['namaProyek']); ?></td>
                                <td><?= htmlspecialchars($p['client']); ?></td>
                                <td><?= date('d M Y', strtotime($p['tglMulai'])); ?></td>
                                <td><?= date('d M Y', strtotime($p['tglSelesai'])); ?></td>
                                <td><?= htmlspecialchars($p['pimpinanProyek']); ?></td>
                                <td><?= htmlspecialchars($p['keterangan']); ?></td>
                                <td>
                                    <?= htmlspecialchars($p['lokasi']['namaLokasi']); ?>
                                    <span class="mx-2">&gt;</span>
                                    <?= htmlspecialchars($p['lokasi']['kota']); ?>
                                    <span class="mx-2">&gt;</span>
                                    <?= htmlspecialchars($p['lokasi']['provinsi']); ?>
                                    <span class="mx-2">&gt;</span>
                                    <?= htmlspecialchars($p['lokasi']['negara']); ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('proyek/edit/' . $p['id']); ?>" class="btn btn-warning btn-sm my-1">Edit</a>
                                    <a href="<?= base_url('proyek/delete/' . $p['id']); ?>" class="btn btn-danger btn-sm my-1" onclick="return confirm('Anda yakin ingin menghapus proyek ini?');">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data proyek yang tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
