<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    /**
     * Get the sebaran associated with the Provinsi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sebaran()
    {
        return $this->hasOne(Sebaran::class, 'provinsi_id', 'id');
    }
}
