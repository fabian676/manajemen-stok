<?= $this->extend('layout/main_layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Riwayat Stok Barang
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Jenis Aksi</th>
                        <th>Tanggal Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($riwayat)):
                        $no = 1;
                        foreach ($riwayat as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($row['nama_barang']) ?></td>
                                <td><?= esc($row['kategori']) ?></td>
                                <td><?= esc($row['stok_baru']) ?></td>
                                <td><?= esc($row['harga']) ?></td>
                                <td><?= esc($row['deskripsi']) ?></td>
                                <td><span class="badge bg-info"><?= esc($row['aksi']) ?></span></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($row['tanggal'])) ?></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data riwayat</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>