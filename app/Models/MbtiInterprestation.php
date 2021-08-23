<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbtiInterprestation extends Model
{
    use HasFactory;

    protected $table = 'mbti_interprestation';
    public function character()
    {
        return $this->hasMany('App\Models\MbtiCharacteristics');
    }
    public function development()
    {
        return $this->hasMany('App\Models\MbtiDevelopmentSuggestion');
    }
    public function carrier()
    {
        return $this->hasMany('App\Models\MbtiCarrierSuggestion');
    }
    
}
