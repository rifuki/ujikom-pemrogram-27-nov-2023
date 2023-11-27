<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $primaryKey = 'kd_nilai';

    protected $table = 'nilai';

    public $timestamps = false;

    protected $fillable = [
        'kd_nilai',
        'nis',
        'nm_siswa',
        'nm_matpel',
        'uts_sem_ganjil',
        'uas_sem_ganjil',
        'uts_sem_genap',
        'uas_sem_genap',
    ];
}
