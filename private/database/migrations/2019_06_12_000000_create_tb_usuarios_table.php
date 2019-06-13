<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbUsuariosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tb_usuarios';

    /**
     * Run the migrations.
     * @table tb_usuarios
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_user')->comment('Id único');
            $table->string('username', 250)->comment('Login');
            $table->string('password')->comment('Senha');
            $table->dateTime('dt_created')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Data criação');
            $table->dateTime('dt_lastchanged')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Data alteração');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
