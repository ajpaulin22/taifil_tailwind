<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prometric_data extends Model
{
    use HasFactory;

    protected $fillable=[
        "certificate_id",
        "certificate",
        "taken",
        "passed",
        "isdeleted",
    ];
}
