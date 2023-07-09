<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_penarikan';
    protected $guarded = ['id_penarikan'];

    public function jenisSampah() {
        return $this->belongsTo(JenisSampah::class, 'id_jenis_sampah');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
