<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesMBTI extends Model
{
    use HasFactory;
    protected $table = 'tes_mbti';
    protected $fillable = [
        'id_perusahaan',
        'token',
        'keterangan',
        'tanggal_dibuka',
        'tanggal_ditutup',
    ];

    public function perusahaan()
    {
        return $this->belongsTo('App\Models\Perusahaan', 'id_perusahaan');
    }
    public function hasilTes()
    {
        return $this->hasMany(HasilTesMBTI::class);
    }
}
