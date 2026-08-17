<h4 class="mb-3">Detail Buku</h4>

<div class="card">
    <div class="card-body">
        <table class="table table-borderless mb-0">
            <tr>
                <th style="width: 200px;">Judul</th>
                <td>: <?= htmlspecialchars($buku['judul']); ?></td>
            </tr>
            <tr>
                <th>Penulis</th>
                <td>: <?= htmlspecialchars($buku['penulis']); ?></td>
            </tr>
            <tr>
                <th>Penerbit</th>
                <td>: <?= htmlspecialchars($buku['penerbit']); ?></td>
            </tr>
            <tr>
                <th>Tahun Terbit</th>
                <td>: <?= htmlspecialchars($buku['tahun_terbit']); ?></td>
            </tr>
            <tr>
                <th>Kategori</th>
                <td>: <?= htmlspecialchars($buku['kategori']); ?></td>
            </tr>
            <tr>
                <th>Stok</th>
                <td>: <?= (int) $buku['stok']; ?></td>
            </tr>
            <tr>
                <th>Sinopsis</th>
                <td>: <?= nl2br(htmlspecialchars($buku['sinopsis'])); ?></td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="<?= base_url('buku/edit/' . $buku['id']); ?>" class="btn btn-warning">Edit</a>
            <a href="<?= base_url('buku'); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
