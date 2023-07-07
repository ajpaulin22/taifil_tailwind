<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_interviewhistories extends Model
{
    use HasFactory;
    protected $fillable = [
        "ID"
        ,"PersonalInfoID"
        ,"AttendInterview"
        ,"InterviewDate"
        ,"Company"
        ,"IsDeleted"
        ,"createID"
        ,"updateID"
        ,"updated_at"
        ,"created_at"
    ];
}
