<?php

use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;
use Winter\Storm\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('mycompany_pegawai_presensis', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('pegawai_id')->unsigned();
            $table->date('tanggal');
            $table->datetime('jam_masuk')->nullable();
            $table->datetime('jam_pulang')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('mycompany_pegawai_presensis');
    }
};

