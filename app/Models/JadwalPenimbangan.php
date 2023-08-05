<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPenimbangan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jadwal_penimbangan';
    protected $guarded = ['id_jadwal_penimbangan'];
}
