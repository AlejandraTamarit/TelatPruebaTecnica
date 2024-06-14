<?php
namespace App\Models;
use CodeIgniter\Model;


class UserModel extends Model{

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellidos', 'sexo', 'correo_electronico', 'telefono', 'codigo_postal', 'colonia', 'dele_muni', 
    'estado', 'fecha_registro', 'tipo_usuario', 'password', 'status'];

}