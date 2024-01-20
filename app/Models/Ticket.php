<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function canceledBy()
    {
        return $this->belongsTo(User::class, 'canceled_by');
    }

    public function createdBy()
    {
        return $this->belongsTo(Client::class, 'created_by');
    }

    public function closedBy()
    {
        return $this->belongsTo(Client::class, 'closed_by');
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_tickets', 'client_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'ticket_categories', 'category_id');
    }

    public function clientMessages()
    {
        return $this->hasMany(ClientMessage::class, 'ticket_id');
    }
}
