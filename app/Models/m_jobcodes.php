<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_jobcodes extends Model
{
    use HasFactory;

    protected $fillable = [
        "ID"
        ,"Code"
        ,"IsDeleted"
        ,"CreateID"
        ,"CreateDate"
        ,"UpdateID"
        ,"UpdateDate"
    ];
}
