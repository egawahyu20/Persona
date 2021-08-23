<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbtiCharacteristics extends Model
{
    use HasFactory;
    protected $table = 'mbti_characteristics';
    protected $fillable = [
        'id',
        'mbti_interprestation_id',
        'characteristic',
    ];
    
    public function personality()
    {
        return $this->belongsTo('App\Models\MbtiInterprestation', 'mbti_interprestation_id ');
    }
}
