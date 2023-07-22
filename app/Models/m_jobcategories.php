<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_jobcategories extends Model
{
    use HasFactory;
    protected $fillable = [
        "ID"
        ,"JobType"
        ,"Category"
        ,"IsDeleted"
        ,"CreateID"
        ,"UpdateID"
        ,"updated_at"
        ,"created_at"
    ];
}
