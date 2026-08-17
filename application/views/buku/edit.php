<h4 class="mb-3">Edit Buku</h4>

<div class="card">
    <div class="card-body">
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger"><?= validation_errors(); ?></div>
        <?php endif; ?>

        <?= form_open('buku/edit/' . $buku['id']); ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" name="judul" class="form-control"
                           value="<?= set_value('judul', $buku['judul']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control"
                           value="<?= set_value('penulis', $buku['penulis']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control"
                           value="<?= set_value('penerbit', $buku['penerbit']); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" name="tahun_terbit" class="form-control"
                           value="<?= set_value('tahun_terbit', $buku['tahun_terbit']); ?>" min="1900" max="2100">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control"
                           value="<?= set_value('stok', $buku['stok']); ?>" min="0" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control"
                           value="<?= set_value('kategori', $buku['kategori']); ?>">
                </div>
                <div class="col-12">
                    <label class="form-label">Sinopsis</label>
                    <textarea name="sinopsis" class="form-control" rows="4"><?= set_value('sinopsis', $buku['sinopsis']); ?></textarea>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="<?= base_url('buku'); ?>" class="btn btn-secondary">Batal</a>
            </div>
        <?= form_close(); ?>
    </div>
</div>
