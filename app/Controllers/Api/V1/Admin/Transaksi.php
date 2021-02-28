<?php

namespace App\Controllers\Api\V1\Admin;

use CodeIgniter\RESTful\ResourceController;

class Transaksi extends ResourceController
{

  protected $format       = 'json';
  protected $modelName    = 'App\Models\TransaksisModel';

  public function index()
  {
    $dataGet = $this->request->getGet();
    $limit = $dataGet["limit"] ?? 10;
    $offset = $dataGet["offset"] ?? 0;
    $transaksis = $this->model->filter($limit, $offset);
    return $this->respond(["status" => 1, "message" => "berhasil mengambil data transaksi", "data" => $transaksis], 200);
    try {
    } catch (\Exception $th) {
      return $this->respond(["status" => 0, "message" => $th->getMessage(), "data" => []], 500);
    }
  }
}
