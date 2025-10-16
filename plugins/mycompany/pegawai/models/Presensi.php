<?php namespace MyCompany\Pegawai\Models;

use Model;

class Presensi extends Model
{
    protected $table = 'mycompany_pegawai_presensis';

    // Izinkan kolom yang bisa di-mass-assign
    protected $fillable = [
        'pegawai_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
    ];

    public $timestamps = false;

    // Jika ingin relasi ke model Pegawai
    public $belongsTo = [
        'pegawai' => [Pegawai::class, 'key' => 'pegawai_id'],
    ];
}
