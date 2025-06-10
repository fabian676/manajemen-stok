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
        if ($this->model->find($id_barang)) {
            $this->model->delete($id_barang);
        }
    }
    public function edit($id)
    {
        $data = $this->model->find($id);
        return json_encode($data ?? []);
    }

    public function simpan()
    {
        if (!$this->request->isAJAX()) {
            return redirect()->to('/barang');
        }
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama_barang' => [
                'label' => 'Nama Barang',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 1 karakter'
                ]
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 1 karakter'
                ]
            ],
            'stok' => [
                'label' => 'Stok',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berupa angka'
                ]
            ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berupa angka'
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => '{field} minimal 5 karakter'
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

            $this->model->save($data);

            // Ambil ID barang yang baru ditambahkan
            $id_barang_terakhir = $db->insertID();

            // Simpan ke tabel riwayat
            $modelRiwayat = new \App\Models\ModelRiwayat();
            $modelRiwayat->insert([
                'id_barang' => $id_barang_terakhir,
                'stok_lama' => 0,
                'stok_baru' => $stok,
                'aksi' => 'Tambah',
                'tanggal' => date('Y-m-d H:i:s'),
            ]);

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
        $filter_kategori = $this->request->getGet('filter_kategori');

        $query = $this->model;

        if ($katakunci) {
            $query = $query->cari($katakunci);
        }

        if ($filter_kategori) {
            $query = $query->where('kategori', $filter_kategori);
        }

        $data['katakunci'] = $katakunci;
        $data['filter_kategori'] = $filter_kategori;
        $data['dataBarang'] = $query->orderBy('id_barang', 'desc')->paginate($jumlahBaris);
        $data['pager'] = $this->model->pager;

        return view('barang_view', $data);
    }

}
