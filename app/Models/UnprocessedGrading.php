<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnprocessedGrading extends Model
{
    use HasFactory;
    protected $fillable = [
        'specimen/bag',
        'grade',
        'weight',
        'size',
        'picture',
        'qr_code',
        'mine_id',
        'user_id',
        'store_id',
        'status',
    ];

    public function mines(){
        return $this->belongsTo(Mine::class, 'mine_id', 'id');
    }

}
