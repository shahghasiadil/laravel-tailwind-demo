<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'client_tickets', 'ticket_id', 'client_id');
    }

    public function clientMessages()
    {
        return $this->hasMany(ClientMessage::class, 'client_id');
    }
}
