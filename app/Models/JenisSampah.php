<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;

    protected $guarded = ['id_jenis_sampah'];
    protected $primaryKey = 'id_jenis_sampah';
}
