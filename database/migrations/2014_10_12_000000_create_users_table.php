<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('u_nombre_usuario');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('u_tipo_billetera');
            $table->string('u_billetera_en_num');
            $table->double('u_saldo');
            $table->string('u_codigo_invitacion');
            $table->string('u_ip');
            $table->string('u_codigo_usuario_invitacion');
            $table->integer('u_role');
            $table->integer('u_estado');
            $table->text('u_session_id');
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
        Schema::dropIfExists('users');
    }
};
