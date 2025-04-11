<?= $this->extend('layout/main_layout') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Data Kategori
        </div>
        <div class="card-body">
            <!-- Tombol untuk menampilkan modal -->
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Tambah Data Kategori
            </button>
            <!-- Modal Tambah Kategori -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formKategori"
                            action="<?= isset($editData) ? base_url('kategori/update') : base_url('kategori/simpan') ?>"
                            method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_kategori"
                                    value="<?= isset($editData) ? $editData['id_kategori'] : '' ?>">
                                <div class="mb-3">
                                    <input type="text" name="kategori" class="form-control"
                                        placeholder="Masukkan kategori..."
                                        value="<?= isset($editData) ? $editData['kategori'] : '' ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-<?= isset($editData) ? 'warning' : 'primary' ?>">
                                    <?= isset($editData) ? 'Update' : 'Simpan' ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Tabel data kategori -->
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kategori as $i => $k): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= esc($k['kategori']) ?></td>
                            <td>
                                <a href="<?= base_url('kategori/edit/' . $k['id_kategori']) ?>"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= base_url('kategori/hapus/' . $k['id_kategori']) ?>"
                                    class="btn btn-sm btn-danger" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Tidak perlu JavaScript tambahan karena tombol submit berada di dalam form -->
<?= $this->endSection() ?>