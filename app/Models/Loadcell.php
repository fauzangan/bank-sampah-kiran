<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loadcell extends Model
{
    use HasFactory;

    protected $table = 'loadcell';
    protected $primaryKey = 'id';
    protected $fillable = ['weight'];
}
