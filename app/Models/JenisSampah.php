<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jenis_sampah';
    protected $guarded = ['id_jenis_sampah'];

    public function penarikan() {
        return $this->hasMany(Penarikan::class, 'id_jenis_sampah');
    }

    public function setoran() {
        return $this->hasMany(Setoran::class, 'id_jenis_sampah');
    }
}
