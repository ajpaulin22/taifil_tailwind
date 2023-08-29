<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class educational_data extends Model
{
    use HasFactory;

    protected $fillable = [
        "personal_id",
        "name_elem",
        "address_elem",
        "from_elem",
        "until_elem",
        "name_highschool",
        "address_highschool",
        "from_highschool",
        "until_highschool",
        "name_jp_lang",
        "address_jp_lang",
        "from_jp_lang",
        "until_jp_lang",
        "certificate_jp_lang",
        "certificate_until_jp_lang",
        "name_college",
        "address_college",
        "from_college",
        "until_college",
        "course_college",
        "certificate_college",
        "certificate_until_college",
        "isdeleted",
        'jpl_hours',
    ];
}
