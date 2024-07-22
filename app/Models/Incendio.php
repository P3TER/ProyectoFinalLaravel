<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incendio extends Model
{
    use HasFactory;

    protected $fillable = [
        "department",
        "town",
        "date",
        "user_id"
    ];
}
