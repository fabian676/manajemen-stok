<?php

namespace App\Controllers;

use App\Models\ModelKategori;

class Kategori extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ModelKategori();
    }

    public function index()
    {
        $data['kategori'] = $this->model->findAll();
        return view('kategori_view', $data);
    }

    public function simpan()
    {
        $kategori = $this->request->getPost('kategori');
        $this->model->save([
            'kategori' => $kategori
        ]);
        return redirect()->to('/kategori');
    }

    public function hapus($id)
    {
        $this->model->delete($id);
        return redirect()->to('/kategori');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->model->findAll();
        $data['editData'] = $this->model->find($id);
        return view('kategori_view', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_kategori');
        $kategori = $this->request->getPost('kategori');

        $this->model->update($id, [
            'kategori' => $kategori
        ]);

        return redirect()->to('/kategori');
    }
}
