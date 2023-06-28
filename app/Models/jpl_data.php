<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jpl_data extends Model
{
    use HasFactory;

    protected $fillable=[
        "personal_id",
        "name",
        "address",
        "from",
        "until",
        "certificate",
        "cert_until",
        "isdeleted",
    ];
}
