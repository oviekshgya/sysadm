<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
              'nameUser'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '255',
              ],
              'email'     => [
                   'type'           => 'TEXT'
              ],
              'password'       => [
                  'type'           => 'VARCHAR',
                  'constraint'     => '255',
              ],
              'idRole'       => [
                  'type'           => 'INT',
                  'constraint'     => '11',
              ],
              'isActive'       => [
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
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
    }
}