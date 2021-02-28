<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'transaksi_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
			],
			'mobil_id' => [
				'type' => 'INT',
				'constraint'     => 11,
				'unsigned'          => TRUE,
			],
			'transaksi_alamat'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'transaksi_no_telp'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'transaksi_harga'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'default'				=> 0
			],
			'transaksi_jumlah'       => [
				'type'           => 'INT',
				'constraint'     => 11,
				'default'				=> 1
			],
			'transaksi_keterangan'       => [
				'type'           => 'TEXT',
			],
			'transaksi_created_at'       => [
				'type'           => 'TIMESTAMP',
				'default' => date('Y-m-d H:i:s')
			],
		]);
		$this->forge->addKey('transaksi_id', true);
		$this->forge->addForeignKey('user_id', 'users', 'user_id');
		$this->forge->addForeignKey('mobil_id', 'mobils', 'mobil_id');
		$this->forge->createTable('transaksis');
	}

	public function down()
	{
		$this->forge->dropTable('transaksis');
	}
}
