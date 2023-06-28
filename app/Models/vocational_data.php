<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vocational_data extends Model
{
    use HasFactory;

    protected $fillable = [
        "educational_id",
        "name",
        "address",
        "from",
        "until",
        "course",
        "certificate",
        "certificate_until",
        "isdeleted",
    ];
}
