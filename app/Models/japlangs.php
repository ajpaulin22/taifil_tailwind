<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class japlangs extends Model
{
    use HasFactory;

    protected $fillable=[
        "id",
        "jap_lang",
        "isdeleted",
        "created_at",
        "updated_at",
        "CreateID",
        "UpdateID"
    ];
}
