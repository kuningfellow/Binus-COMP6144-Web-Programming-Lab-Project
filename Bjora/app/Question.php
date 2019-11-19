<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'owner_id',             // foreign key to 'users'       (belongs to)
        'status',               // data
        'topic',                // data
        'question',             // data
    ];

    // Eloquent hasMany('Bjora\Answer')
    public function answers() {
        return $this->hasMany('Bjora\Answer');
    }

    // Eloquent belongsTo('Bjora\User')
    public function owner() {
        return $this->belongsTo('Bjora\User');
    }
}
