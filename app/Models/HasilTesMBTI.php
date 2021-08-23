<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTesMBTI extends Model
{
    use HasFactory;
    protected $table = 'hasil_tes_mbti';
    protected $fillable = [
        'id',
        'personality',
        'id_tes',
        'nama_peserta_tes',
        'I',
        'E',
        'S',
        'N',
        'T',
        'F',
        'J',
        'P',
    ];

    public function tesMBTI()
    {
        return $this->belongsTo(TesMBTI::class);
    }
}
