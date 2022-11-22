<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
    use HasFactory;
    protected $fillable = [
        'unprocessed_grading_id',
        'first_storage_id',
        'user_id',
        'store_id',
        'description',
        'workshop_id',
        'status',

    ];

    public function workshop()
    {
        return $this->hasOne(Workshop::class, 'id', 'workshop_id');
    }
}
