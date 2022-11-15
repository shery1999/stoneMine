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
        'status',

    ];


    public function first_storages()
    {
        return $this->belongsTo(FirstStorage::class);
    }
    public function second_storages()
    {
        return $this->belongsTo(SecondStorage::class);
    }
    public function processing()
    {
        return $this->belongsTo(Processing::class);
    }
}
