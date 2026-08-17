<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Daftar Buku</h4>
    <a href="<?= base_url('buku/create'); ?>" class="btn btn-success">+ Tambah Buku</a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <?= form_open('buku', array('method' => 'get', 'class' => 'row g-2')); ?>
            <div class="col-md-9">
                <input type="text" name="keyword" class="form-control"
                       placeholder="Cari judul, penulis, kategori, atau penerbit..."
                       value="<?= htmlspecialchars($keyword); ?>">
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-100">🔍 Cari</button>
                <?php if ($keyword !== ''): ?>
                    <a href="<?= base_url('buku'); ?>" class="btn btn-outline-secondary">Reset</a>
                <?php endif; ?>
            </div>
        <?= form_close(); ?>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($buku)): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Tidak ada data buku<?= $keyword !== '' ? ' untuk pencarian "' . htmlspecialchars($keyword) . '"' : ''; ?>.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($buku as $row): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($row['judul']); ?></td>
                                <td><?= htmlspecialchars($row['penulis']); ?></td>
                                <td><?= htmlspecialchars($row['kategori']); ?></td>
                                <td><?= htmlspecialchars($row['tahun_terbit']); ?></td>
                                <td><?= (int) $row['stok']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('buku/detail/' . $row['id']); ?>" class="btn btn-sm btn-info text-white">Lihat</a>
                                    <a href="<?= base_url('buku/edit/' . $row['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?= base_url('buku/delete/' . $row['id']); ?>" class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin ingin menghapus buku ini?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted">Total data: <?= $total_rows; ?></small>
            <nav><?= $pagination; ?></nav>
        </div>
    </div>
</div>
