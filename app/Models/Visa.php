<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;

    protected $table = 'visa';
    protected $fillable = [
        'personal_id',
        'type',
        'applied_at',
        'is_approved',
        'update_id',
    ];
    protected $hidden = [
        'update_id',
        'updated_at',
        'id',
        'personal_id',
        'is_deleted'
    ];

    protected $casts = [
        'applied_at' => 'datetime:Y-m-d',
    ];
}
