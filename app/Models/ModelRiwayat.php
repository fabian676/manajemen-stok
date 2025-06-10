<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRiwayat extends Model
{
    protected $table = 'riwayat_stok';
    protected $primaryKey = 'id_riwayat';

    protected $allowedFields = [
        'id_barang',
        'stok_lama',
        'stok_baru',
        'aksi',
        'tanggal'
    ];

    public function getJoinedRiwayat()
    {
        return $this->select('riwayat_stok.*, barang.nama_barang, barang.kategori, barang.harga, barang.deskripsi')
            ->join('barang', 'barang.id_barang = riwayat_stok.id_barang')
            ->orderBy('riwayat_stok.tanggal', 'DESC')
            ->findAll();
    }
}
