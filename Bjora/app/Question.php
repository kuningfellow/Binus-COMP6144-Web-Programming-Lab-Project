<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'owner', 'status', 'topic', 'question',
    ];
    public function answers() {
        return $this->hasMany('Bjora\Answer');
    }
}
