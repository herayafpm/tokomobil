<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mobil extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'mobil_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'mobil_nama' => [
				'type' => 'VARCHAR',
				'constraint'     => 255,
			],
			'mobil_img' => [
				'type' => 'VARCHAR',
				'constraint'     => 255,
			],
			'mobil_harga' => [
				'type' => 'INT',
				'constraint'     => 11,
			],
			'mobil_keterangan' => [
				'type' => 'TEXT',
			],
		]);
		$this->forge->addKey('mobil_id', true);
		$this->forge->createTable('mobils');
	}

	public function down()
	{
		$this->forge->dropTable('mobils');
	}
}
