<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menuuser extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'           => [
                 'type'           => 'INT',
                 'constraint'     => 11,
                 'unsigned'       => TRUE,
                 'auto_increment' => TRUE
              ],
              'idUser'       => [
                  'type'           => 'INT',
                  'constraint'     => '11',
              ],
              'namaMenu'     => [
                   'type'           => 'VARCHAR',
                   'constraint'     => '255',
              ],
              'url'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '255',
              ],
              'icon'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '11',
              ],
              'idHeaderMenu'       => [
                  'type'           => 'INT',
                  'constraint'     => '11',
              ],
              'created_at'       => [
                  'type'           => 'datetime',
                  'constraint'     => '0',
              ],
              'updated_at'       => [
                  'type'           => 'datetime',
                  'constraint'     => '0',
              ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('menuusers');
    }

    public function down()
    {
        //
    }
}