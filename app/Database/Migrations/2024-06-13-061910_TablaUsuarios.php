<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TablaUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nombre'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'apellidos'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'sexo'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'correo_electronico'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'telefono'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'codigo_postal'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'colonia'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'dele_muni'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'estado'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'fecha_registro datetime default current_timestamp',
            'tipo_usuario'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'status'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('usuarios');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios');
    }
}
