<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storeController extends Model
{
    use HasFactory;
    protected $fillable = [
        'processed_grading_id',
        'user_id',
        'store_id',
        'description',
    ];
}
