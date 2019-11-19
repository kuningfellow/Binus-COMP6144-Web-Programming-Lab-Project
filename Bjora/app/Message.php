<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'recipient_id',         // foreign key to 'users'       (belongs to)
        'sender_id',            // foreign key to 'users'       (belongs to)
        'message',              // data
    ];

    // Eloquent belongsTo('Bjora\User')
    public function recipient() {
        return $this->belongsTo('Bjora\User');
    }
    // Eloquent belongsTo('Bjora\User')
    public function sender() {
        return $this->belongsTo('Bjora\User');
    }
}
