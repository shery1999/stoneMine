<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class first_storage extends Model
{

    use HasFactory;
    protected $fillable = [
        'unprocessed_grading_id',
        'user_id',
        'store_id',
        'description',
        'status',
    ];



    // used to fetch data from db
    public function unprocessed_grading_data()
    {
        return $this->belongsTo(unprocessed_grading::class, 'unprocessed_grading_id', 'id');
    }

    public function stores()
    {
        return $this->hasOne(store::class, 'id', 'store_id');
    }
}
