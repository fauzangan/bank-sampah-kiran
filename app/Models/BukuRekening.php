<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuRekening extends Model
{
    use HasFactory;

    protected $guarded = ['id_rekening'];
    protected $primaryKey = 'id_rekening';

    public function nasabah() {
        return $this->belongsTo(User::class, 'id_nasabah');
    }
}
