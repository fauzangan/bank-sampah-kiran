<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_setoran';
    protected $guarded = ['id_setoran'];
    
    public function jenisSampah() {
        return $this->belongsTo(JenisSampah::class, 'id_jenis_sampah');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
