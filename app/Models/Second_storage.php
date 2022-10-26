<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Second_storage extends Model
{
    use HasFactory;
    protected $fillable = [
        'processed_grading_id',
        'user_id',
        'store_id',
        'description',
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
