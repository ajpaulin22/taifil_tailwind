<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class japanvisit_data extends Model
{
    use HasFactory;

    protected $fillable = [
        "when",
        "where",
        "isdeleted"
    ];
}
