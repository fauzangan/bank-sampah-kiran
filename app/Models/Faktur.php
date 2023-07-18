<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_faktur';
    protected $guarded = ['id_faktur'];

    public function bukuRekening() {
        return $this->belongsTo(BukuRekening::class, 'id_rekening');
    }
}
