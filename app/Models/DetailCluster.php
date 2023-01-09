<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCluster extends Model
{
    use HasFactory;
    protected $table = "detail_cluster";
    protected $fillable = [
        'cluster_id', 'sebaran_id', 'distance'
    ];
    protected $guarded = ['id'];
}
