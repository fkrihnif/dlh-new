<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skr extends Model
{
    use HasFactory;

    protected $table = 'skr';
    protected $guarded = [];

    public function pengujianOrder()
    {
        return $this->belongsTo(PengujianOrder::class, 'id_pengujian_order', 'id');
    }

    public function pengambilanSampelOrder()
    {
        return $this->belongsTo(PengambilanSampelOrder::class, 'id_pengambilan_sampel_order', 'id');
    }
}
