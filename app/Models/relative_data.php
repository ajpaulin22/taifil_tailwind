<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class relative_data extends Model
{
    use HasFactory;
    protected $fillable = [
        "family_id",
        "name",
        "relation",
        "cp",
        "address",
        "isdeleted",
    ];
}
