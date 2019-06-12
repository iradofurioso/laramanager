<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbClientesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tb_clientes';

    /**
     * Run the migrations.
     * @table tb_clientes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_cliente')->comment('Id único');
            $table->string('nome', 250)->comment('Nome cliente');
            $table->string('email', 250)->comment('Email contato');
            $table->string('telefone', 25)->nullable()->comment('Fone contato');
            $table->string('foto', 250)->nullable()->comment('Foto perfil');
            $table->enum('status', ['ON', 'OFF'])->default('ON')->comment('Status cliente');
            $table->dateTime('dt_created')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Data criação');
            $table->dateTime('dt_lastchanged')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Última alteração');
            $table->unsignedInteger('fk_id_user')->nullable()->comment('Usuário responsável');

            $table->index(["fk_id_user"], 'fk_tb_clientes_tb_usuarios_idx');


            $table->foreign('fk_id_user', 'fk_tb_clientes_tb_usuarios_idx')
                ->references('id_user')->on('tb_usuarios')
                ->onDelete('set null')
                ->onUpdate('cascade');
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
