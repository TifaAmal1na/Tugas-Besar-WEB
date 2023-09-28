<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Pengajar extends Model
{

    protected $table = "tutor";
    public $timestamps = false;
    protected $primaryKey = 'nip';

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'telp',
        'status_pengajar',
    ];

    use HasFactory;

    public function kelas(){
        return $this->hasMany(Kelas::class);
   
    }
}
