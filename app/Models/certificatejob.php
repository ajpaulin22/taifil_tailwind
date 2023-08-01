<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificatejob extends Model
{
    use HasFactory;

    protected $fillable = [
        "personal_id",
        "ex_trainee",
        "jobcategory",
        "joboperation",
        "isdeleted"
    ];
}
