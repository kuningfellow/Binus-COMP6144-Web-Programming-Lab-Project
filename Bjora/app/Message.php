<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'recipient_id', 'sender_id', 'message',
    ];
    public function recipient() {
        return $this->belongsTo('Bjora\User');
    }
    public function sender() {
        return $this->belongsTo('Bjora\User');
    }
}
