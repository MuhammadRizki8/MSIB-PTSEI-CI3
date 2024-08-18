<div class="container" style="min-height: 80vh;">

    <h2 class="mb-4">Daftar Lokasi</h2>
    <a href="<?= base_url('lokasi/create'); ?>" class="btn btn-primary mb-3">Tambah Lokasi</a>
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
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
                <?php if (!empty($lokasi)): ?>
                    <?php foreach ($lokasi as $l): ?>
                    <tr>
                        <td><?= htmlspecialchars($l['id']); ?></td>
                        <td><?= htmlspecialchars($l['namaLokasi']); ?></td>
                        <td><?= htmlspecialchars($l['negara']); ?></td>
                        <td><?= htmlspecialchars($l['provinsi']); ?></td>
                        <td><?= htmlspecialchars($l['kota']); ?></td>
                        <td>
                            <a href="<?= base_url('lokasi/edit/'.$l['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('lokasi/delete/'.$l['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data lokasi yang tersedia.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
