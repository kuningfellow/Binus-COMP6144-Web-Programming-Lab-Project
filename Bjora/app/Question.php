<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'owner_id', 'status', 'topic', 'question',
    ];
    public function answers() {
        return $this->hasMany('Bjora\Answer');
    }
    public function owner() {
        return $this->belongsTo('Bjora\User');
    }
}
