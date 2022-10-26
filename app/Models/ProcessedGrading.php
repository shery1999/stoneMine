<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessedGrading extends Model
{
    use HasFactory;
    protected $fillable = [
        'processing_id',
        'grade',
        'dimensions',
        'weight',
        'color',
        'clarity',
        'type',
        'treatment',
        'cut_shape',
        'lab_certificate',
        'picture',
        'qr_code',
        'user_id',
        'processing_id',
        'lot_status',
        'status',

    ];
    public function second_storages()
    {
        return $this->belongsTo(Second_storage::class);
    }
   
}
