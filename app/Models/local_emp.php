<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class local_emp extends Model
{
    use HasFactory;

    protected $fillable = [
        "personal_id",
        "company_name",
        "position",
        "company_address",
        "from",
        "until",
        "isdeleted"
    ];
}
