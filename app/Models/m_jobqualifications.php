<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_jobqualifications extends Model
{
    use HasFactory;
    protected $fillable = [
        "ID"
        ,"JobCategoriesID"
        ,"Operation"
        ,"IsDeleted"
        ,"CreateID"
        ,"UpdateID"
        ,"updated_at"
        ,"created_at"
    ];
}
