<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbtiDevelopmentSuggestion extends Model
{
    use HasFactory;
    protected $table = 'mbti_development_suggestion';
    protected $fillable = [
        'id',
        'mbti_interprestation_id',
        'development_suggestion',
    ];
    public function personality()
    {
        return $this->belongsTo('App\Models\MbtiInterprestation', 'mbti_interprestation_id ');
    }
}
