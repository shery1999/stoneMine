<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showroom extends Model
{
    use HasFactory;
    protected $fillable = [
        'ownername',
        'showroomname',
        'phone1',
        'phone2',
        'phone3',
        'adress',
        'city',
        'country',
        'status',

    ];
}
