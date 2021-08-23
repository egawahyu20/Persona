<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbtiCarrierSuggestion extends Model
{
    use HasFactory;
    protected $table = 'mbti_carrier_suggestion';
    protected $fillable = [
        'id',
        'mbti_interprestation_id',
        'carrier_suggestion',
    ];
    public function personality()
    {
        return $this->belongsTo('App\Models\MbtiInterprestation', 'mbti_interprestation_id ');
    }
}
