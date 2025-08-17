<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responder extends Model
{
    use HasFactory;

    protected $table = 'responders';

    protected $fillable = [
        'full_name',
        'number_of_guests',
        'phone',
        'is_attending',
        'is_active',
    ];
}
