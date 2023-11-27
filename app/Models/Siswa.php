<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nm_siswa',
        'tmp_lahir',
        'tgl_lahir',
        'jkel',
        'alamat',
        'telp',
        'nm_wali',
        'kd_kelas',
        'username',
        'password'
    ];

    protected $table = 'siswa';

    public $timestamps = false;

    protected $primaryKey = 'nis';
}
