<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration
{
    public function up()
    {
        //$this->db->enableForeignKeyChecks();
        $this->forge->addField([
            'id_buku'            => [
                'type'                     => 'BIGINT',
                'constraint'               => 20,
                'unsigned'                 => TRUE,
                'auto_increment'    => TRUE
            ],
            'judul_buku'          => [
                'type'              => 'VARCHAR',
                'constraint'    => '50',
            ],
            'penulis'           => [
                'type'              => 'VARCHAR',
                'constraint'    => '50',
            ],
            'penerbit'        => [
                'type'              => 'ENUM',
                'constraint'    => "'Laki-Laki','Perempuan'",
                'default'           => 'Laki-Laki'
            ],
            'stok_buku'         => [
                'type'              => 'BIGINT',
                'constraint'    => '20',
            ],
            'status_buku'        => [
                'type'              => 'ENUM',
                'constraint'    => "'Tersedia','Dipinjam'",
                'default'           => 'Tersedia'
            ],
        ]);
        $this->forge->addKey('id_buku', TRUE);
        $this->forge->createTable('buku0072');

    }

    public function down()
    {
        //
    }
}