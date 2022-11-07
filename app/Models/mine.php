<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mine extends Model
{
    use HasFactory;
    protected $fillable = [
        'mine',
        'location',
        'description',
        'status',

    ];

}
