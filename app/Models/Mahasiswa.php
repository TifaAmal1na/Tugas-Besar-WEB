<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\User;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    public $timestamps = false;
    protected $primaryKey = 'nim';

    protected $fillable = [
        'nim',
        'nama',
        'foto',
        'email',
        'id_kelas',
        'user_id',
    ];

    use HasFactory;

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }

}
