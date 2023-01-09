<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    protected $table = "cluster";
    protected $fillable = [
        'name'
    ];
    protected $guarded = ['id'];

    /**
     * Get the user associated with the Cluster
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sebaran()
    {
        return $this->hasOne(Sebaran::class);
    }
}
