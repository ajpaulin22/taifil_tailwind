<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sibling_data extends Model
{
    use HasFactory;
    protected $fillable = [
        "family_id",
        "sibling_name",
        "sibling_birth",
        "sibling_occupation",
        "sibling_cp",
        "sibling_address",
        "isdeleted",
    ];
}
