<?php

namespace App\Database\Seeds;

class MobilsSeeder extends \CodeIgniter\Database\Seeder
{
  public function run()
  {
    $initDatas = [
      [
        "mobil_nama" => "2013 Honda City 1.5 E Sedan DP Minim",
        "mobil_img" => "honda.jpg",
        "mobil_harga" => 123000000,
        "mobil_keterangan" => "Tawaran Terbaik dari Carmudi.co.id\n\nHONDA CITY S 2013 AUTOMATIC\n\n\nFull Orisinil,\nwarna Hitam Metalik,\ninterior orisinil,\ndouble Airbag,\nmesin kering,\nPajak panjang (11-2021),\nsurat2 lengkap,\nkaki2 nyaman, body mulus.\nTidak Bekas Nabrak,\nTidak Bekas Banjir\nMobil Bagus & Terawat.\n\npaket kredit 123 \nTdp 15j\nangs. 3.850.000 x4th\n\nharga cash 134jt Nego santai\n\nSelengkapnya Telp/WA ke :\nAndi ( Nomor Telepon +628-1382097898 )"
      ],
    ];
    $this->db->table('mobils')->insertBatch($initDatas);
  }
}
