<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id', 'owner_id', 'answer',
    ];
    public function owner() {
        return $this->belongsTo('Bjora\User');
    }
}
