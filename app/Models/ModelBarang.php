<?php
namespace App\Models;

use CodeIgniter\Model;
class ModelBarang extends Model
{
    protected $table = "barang";
    protected $primaryKey = "id_barang";
    protected $allowedFields = ['nama_barang', 'kategori', 'stok', 'harga', 'deskripsi', 'tanggal_dibuat'];

    function cari($katakunci)
    {
        $builder = $this->table("barang");
        $arr_katakunci = explode(" ", $katakunci);
        for ($x = 0; $x < count($arr_katakunci); $x++) {
            $builder->orlike('nama_barang', $arr_katakunci[$x]);
            $builder->orLike('kategori', $arr_katakunci[$x]);
        }
        return $builder;
    }
}