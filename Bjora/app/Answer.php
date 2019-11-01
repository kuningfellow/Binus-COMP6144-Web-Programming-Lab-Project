<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id', 'owner', 'answer',
    ]
}
