<?php

namespace App\Controllers;

use CodeIgniter\Model;

class Barang extends BaseController
{
    protected $model;
    function __construct()
    {
        $this->model = new \App\Models\ModelBarang();
    }

    public function hapus($id_barang)
    {
        $this->model->delete($id_barang);
        return redirect()->to('barang');
    }
    public function edit($id)
    {
        return json_encode($this->model->find($id));
    }

    public function simpan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_barang' => [
                'label' => 'nama barang',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'kategori' => [
                'label' => 'kategori',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'stok' => [
                'label' => 'Stok',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            $id_barang = $this->request->getPost('id_barang');
            $nama_barang = $this->request->getPost('nama_barang');
            $kategori = $this->request->getPost('kategori');
            $stok = $this->request->getPost('stok');
            $harga = $this->request->getPost('harga');
            $deskripsi = $this->request->getPost('deskripsi');

            $data = [
                'id_barang' => $id_barang,
                'nama_barang' => $nama_barang,
                'kategori' => $kategori,
                'stok' => $stok,
                'harga' => $harga,
                'deskripsi' => $deskripsi
            ];
            $db = \Config\Database::connect();
            $query = $db->table('barang')->set($data);
            $this->model->save($data);


            $hasil['sukses'] = "berhasil memasukkan data";
            $hasil['error'] = false;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }
        return json_encode($hasil);


    }
    public function index(): string
    {
        $jumlahBaris = 5;
        $katakunci = $this->request->getGet('katakunci');
        if ($katakunci) {
            $pencarian = $this->model->cari($katakunci);
        } else {
            $pencarian = $this->model;
        }
        $data['katakunci'] = $katakunci;
        $data['dataBarang'] = $pencarian->orderBy('id_barang', 'desc')->paginate($jumlahBaris);
        $data['pager'] = $this->model->pager;
        return view('barang_view', $data);
    }


}