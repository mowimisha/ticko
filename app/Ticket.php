<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $casts = [
        'ticket_info' => 'array'
    ];
}
