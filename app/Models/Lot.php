<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    protected $fillable = [
        'storage_id',
        'price',
        'status',

    ];

    public function data1()
    {
        return $this->hasMany(ProcessedGrading::class, 'id');
    
    }

    
    public function data()
    {
        return $this->belongsTo(ProcessedGrading::class, 'processed_grading_id', 'id');
    }


    public function stores()
    {
        return $this->hasOne(store::class,'id', 'store_id');
    }

}
