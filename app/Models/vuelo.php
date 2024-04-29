<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vuelo extends Model
{
    use HasFactory;

    protected $table = 'vuelos';
    protected $primaryKey = 'numeroVuelo';

    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';
}
