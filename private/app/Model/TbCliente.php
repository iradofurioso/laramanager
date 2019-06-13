<?php

namespace LaraManager\Model;

use Illuminate\Database\Eloquent\Model;

class TbCliente extends Model
{
    protected $table = 'tb_clientes';
    public $timestamps = false;
    protected $primaryKey = 'id_cliente';
}
