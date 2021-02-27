<?php

namespace App\Controllers\Api\V1\User;

use CodeIgniter\RESTful\ResourceController;

class Mobil extends ResourceController
{

  protected $format       = 'json';
  protected $modelName    = 'App\Models\MobilsModel';

  public function index()
  {
    try {
      $dataGet = $this->request->getGet();
      $limit = $dataGet["limit"] ?? 10;
      $offset = $dataGet["offset"] ?? 0;
      $mobils = $this->model->filter($limit, $offset);
      return $this->respond(["status" => 1, "message" => "berhasil mengambil data mobil", "data" => $mobils], 200);
    } catch (\Exception $th) {
      return $this->respond(["status" => 0, "message" => $th->getMessage(), "data" => []], 500);
    }
  }
}
