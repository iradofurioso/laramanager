<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'tb_users';

    /**
     * Run the migrations.
     * @table tb_users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('Id único');
            $table->string('name')->comment('Nome do usuário');
            $table->string('email')->unique()->comment('Email e login');
            $table->string('profile_pic')->comment('Foto perfil');
            $table->timestamp('email_verified_at')->nullable()->comment('Verificação email');
            $table->string('password')->comment('Senha');
            $table->enum('status', ['0', '1'])->default('1')->comment('0 inativo, 1 ativo');
            $table->enum('role', ['admin', 'custom'])->default('custom')->comment('Privilégio usuário');
            $table->rememberToken();
            $table->timestamps();
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
