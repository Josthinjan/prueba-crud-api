<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';
    protected $fillable = ['descripcions', 'tipos'];

    public $timestamps = false;
}
