<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Pengajar;
use App\Models\Transaksi;


class Kelas extends Model
{
    protected $table = "mata_kuliah";
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'nama',
        'status_kelas',
        'nip',
    ];

    use HasFactory;

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class);
    }

    public function pengajar() {
        return $this->belongsTo(Pengajar::class);
    }

    public function transaksi() {
        return $this->hasMany(Transaksi::class, "id_kelas", "id");
    }

}
