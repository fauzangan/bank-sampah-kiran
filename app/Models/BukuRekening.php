<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuRekening extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rekening';
    protected $guarded = ['id_rekening'];

    public function nasabah() {
        return $this->belongsTo(User::class, 'id_nasabah');
    }

    public function faktur() {
        return $this->hasMany(Faktur::class, 'id_rekening');
    }
}
