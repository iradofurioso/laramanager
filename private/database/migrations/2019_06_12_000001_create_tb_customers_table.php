<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbCustomersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tb_customers';

    /**
     * Run the migrations.
     * @table tb_customers
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('Id único');
            $table->string('name', 250)->comment('Nome cliente');
            $table->string('email', 250)->comment('Email contato');
            $table->string('phone', 25)->nullable()->comment('Fone contato');
            $table->string('photo', 250)->nullable()->comment('Foto perfil');
            $table->enum('status', ['0', '1'])->default('1')->comment('0 inativo, 1 ativo');
            $table->timestamps();
            $table->unsignedInteger('fk_id_user')->nullable()->comment('Usuário responsável');

            $table->index(["fk_id_user"], 'fk_tb_customers_tb_users_idx');


            $table->foreign('fk_id_user', 'fk_tb_customers_tb_users_idx')
                ->references('id')->on('tb_users')
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
