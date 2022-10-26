<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'lot_id',
        'showroom_id',
        'status',

    ];

    public function data()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'id');
    }

    public function showroom()
    {
        return $this->hasOne(showroom::class,'id', 'showroom_id');
    }


}
