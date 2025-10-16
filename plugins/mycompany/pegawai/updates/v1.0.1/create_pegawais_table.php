<?php namespace MyCompany\Pegawai\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mycompany_pegawai_pegawais', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password'); // Password akan disimpan sebagai teks biasa
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mycompany_pegawai_pegawais');
    }
};