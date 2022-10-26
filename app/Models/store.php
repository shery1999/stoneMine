<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;
    protected $fillable = [
        'store',
        'location',
        'description',
    ];


    public function first_storages()
    {
        return $this->belongsTo(first_storage::class);
    }
    public function second_storages()
    {
        return $this->belongsTo(Second_storage::class);
    }
}
