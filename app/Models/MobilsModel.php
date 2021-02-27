<?php

namespace App\Models;

use CodeIgniter\Model;

class MobilsModel extends Model
{
  protected $table      = 'mobils';
  protected $primaryKey = 'mobil_id';

  protected $returnType     = 'array';

  protected $allowedFields = ['mobil_nama', 'mobil_img', 'mobil_harga', 'mobil_keterangan'];

  protected $useTimestamps = false;
  public function filter($limit, $start, $params = [])
  {
    $builder = $this->db->table($this->table);
    $builder->orderBy($this->primaryKey, 'desc'); // Untuk menambahkan query ORDER BY
    $builder->limit($limit, $start); // Untuk menambahkan query LIMIT
    $builder->select("{$this->table}.*");
    if (isset($params['where'])) {
      $builder->where($params['where']);
    }
    if (isset($params['like'])) {
      foreach ($params['like'] as $key => $value) {
        $builder->like($key, $value);
      }
    }
    $datas = $builder->get()->getResultArray();
    return $datas;
  }
}
