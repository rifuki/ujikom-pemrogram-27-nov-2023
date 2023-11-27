<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nm_guru',
        'tmp_lahir_guru',
        'tgl_lahir_guru',
        'jkel_guru',
        'alamat',
        'telp',
        'kd_matpel',
        'nm_matpel',
    ];

    protected $table = 'guru';

    public $timestamps = false;

    protected $primaryKey = 'nip';
}
