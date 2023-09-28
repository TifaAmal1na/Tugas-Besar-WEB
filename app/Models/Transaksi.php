<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\User;


class Transaksi extends Model
{
    protected $table = "transaksi";
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'id_kelas',
        'id_user',
        'Tanggal',
        'Total',
        'Status',
    ];

    use HasFactory;

    public function kelas() {
        return $this->belongsTo(Kelas::class, "id_kelas", "id");
    }

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }
}
