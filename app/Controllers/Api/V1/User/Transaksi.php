<?php

namespace App\Controllers\Api\V1\User;

use CodeIgniter\RESTful\ResourceController;

class Transaksi extends ResourceController
{

  protected $format       = 'json';
  protected $modelName    = 'App\Models\TransaksisModel';

  public function index()
  {
    try {
      $dataGet = $this->request->getGet();
      $limit = $dataGet["limit"] ?? 10;
      $offset = $dataGet["offset"] ?? 0;
      $user = $this->request->user;
      $transaksis = $this->model->filter($limit, $offset, ['where' => ['transaksis.user_id' => $user->user_id]]);
      return $this->respond(["status" => 1, "message" => "berhasil mengambil data transaksi", "data" => $transaksis], 200);
    } catch (\Exception $th) {
      return $this->respond(["status" => 0, "message" => $th->getMessage(), "data" => []], 500);
    }
  }

  public function create()
  {
    $validation =  \Config\Services::validation();
    $rules = [
      'mobil_id' => [
        'label'  => 'Mobil',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'transaksi_alamat' => [
        'label'  => 'Alamat',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'transaksi_harga' => [
        'label'  => 'Harga',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'transaksi_jumlah' => [
        'label'  => 'Jumlah',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
      'transaksi_no_telp' => [
        'label'  => 'No Telepon / WA',
        'rules'  => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong',
        ]
      ],
    ];
    $dataJson = $this->request->getJson();
    $data = [
      'mobil_id' => htmlspecialchars($dataJson->mobil_id ?? ''),
      'transaksi_alamat' => htmlspecialchars($dataJson->transaksi_alamat ?? ''),
      'transaksi_no_telp' => htmlspecialchars($dataJson->transaksi_no_telp ?? ''),
      'transaksi_harga' => htmlspecialchars($dataJson->transaksi_harga ?? 0),
      'transaksi_jumlah' => htmlspecialchars($dataJson->transaksi_jumlah ?? 1),
      'transaksi_keterangan' => htmlspecialchars($dataJson->transaksi_keterangan ?? ''),
    ];
    $validation->setRules($rules);
    if (!$validation->run($data)) {
      return $this->respond(["status" => 0, "message" => "Validasi gagal", "data" => $validation->getErrors()], 400);
    }
    $user = $this->request->user;
    $data['user_id'] = $user->user_id;
    $save = $this->model->save($data);
    if ($save) {
      return $this->respond(["status" => 1, "message" => "berhasil melakukan transaksi,silahkan tunggu kontak dari admin untuk langkah selanjutnya", "data" => []], 200);
    } else {
      return $this->respond(["status" => 0, "message" => "gagal melakukan transaksi", "data" => []], 400);
    }
  }
}
