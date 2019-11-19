<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id',          // foreign key to 'questions'   (belongs to)
        'owner_id',             // foreign key to 'users'       (belongs to)
        'answer',               // data
    ];

    // Eloquent belongsTo('Bjora\User')
    public function owner() {
        return $this->belongsTo('Bjora\User');
    }
}
