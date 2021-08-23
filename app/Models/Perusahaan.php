<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    protected $fillable = [
        'id_user',
        'alamat',
        'id_lokasi',
        'no_telephone',
        'website',
        'logo_perusahaan',
        'status_perusahaan'
    ];

    public function lokasi()
    {
        return $this->belongsTo('App\Models\Village', 'id_lokasi');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

}
