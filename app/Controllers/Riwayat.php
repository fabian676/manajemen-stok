<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRiwayat;

class Riwayat extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('riwayat_stok');
        $builder->select('riwayat_stok.*, barang.nama_barang, barang.kategori, barang.harga, barang.deskripsi');
        $builder->join('barang', 'barang.id_barang = riwayat_stok.id_barang');
        $builder->orderBy('riwayat_stok.tanggal', 'DESC');

        $query = $builder->get();
        $data['riwayat'] = $query->getResult();

        $model = new \App\Models\ModelRiwayat();
        $data['riwayat'] = $model->getJoinedRiwayat();
        return view('riwayat_view', $data);
    }

}
