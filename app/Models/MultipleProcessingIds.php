<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipleProcessingIds extends Model
{
    use HasFactory;
    protected $fillable = [
        'processing_ids',
        'description',
    ];
}
