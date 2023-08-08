<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prometrics extends Model
{
    use HasFactory;

    protected $fillable=[
        "id",
        "prometric",
        "isdeleted",
        "created_at",
        "updated_at",
        "CreateID",
        "UpdateID"
    ];
}
