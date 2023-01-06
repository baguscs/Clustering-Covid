<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sebaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'provinsis_id', 'treated', 'confirmation', 'healed', 'die'
    ];
}
