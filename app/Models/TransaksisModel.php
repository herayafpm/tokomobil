<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksisModel extends Model
{
  protected $table      = 'transaksis';
  protected $primaryKey = 'transaksi_id';

  protected $returnType     = 'array';

  protected $allowedFields = ['user_id', 'mobil_id', 'transaksi_alamat', 'transaksi_harga', 'transaksi_keterangan', 'transaksi_no_telp'];

  protected $useTimestamps = false;
  public function filter($limit, $start, $params = [])
  {
    $builder = $this->db->table($this->table);
    $builder->orderBy($this->primaryKey, 'desc'); // Untuk menambahkan query ORDER BY
    $builder->limit($limit, $start); // Untuk menambahkan query LIMIT
    $builder->select("{$this->table}.*");
    $builder->select("users.*");
    $builder->select("mobils.*");
    $builder->join('users', "users.user_id = {$this->table}.user_id");
    $builder->join('mobils', "mobils.mobil_id = {$this->table}.mobil_id");
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
