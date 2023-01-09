<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sebaran extends Model
{
    use HasFactory;

    protected $table = "sebarans";
    protected $fillable = [
        'provinsi_id', 'treated', 'confirmation', 'healed', 'die'
    ];
    protected $guarded = ['id'];

    /**
     * Get the provinsi that owns the Sebaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    /**
     * Get the user that owns the Sebaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cluster()
    {
        return $this->belongsTo(Cluster::class, 'cluster_id');
    }
}
