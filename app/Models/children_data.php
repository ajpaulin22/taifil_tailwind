<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class children_data extends Model
{
    use HasFactory;
    protected $fillable = [
        "family_id",
        "name",
        "birthday",
        "address",
        "isdeleted",
    ];
}
