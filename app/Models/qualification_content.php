<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qualification_content extends Model
{
    use HasFactory;

    protected $fillable = [
        "content",
        "isdeleted",
        "type"
    ];
}
