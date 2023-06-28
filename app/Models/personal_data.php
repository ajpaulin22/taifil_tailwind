<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal_data extends Model
{
    use HasFactory;
   
    protected $fillable = [
        "id",
        "code",
        "job_cat",
        "operation",
        "last_name",
        "first_name",
        "middle_name",
        "nickname",
        "lastname",
        "address",
        "date_birth",
        "place_birth",
        "gender",
        "citizenship",
        "age",
        "bloodtype",
        "civil_status",
        "contact",
        "height",
        "religion",
        "facebook",
        "smoking",
        "weight",
        "jap_lang",
        "jap_reading",
        "jap_writing",
        "jap_speaking",
        "jap_listening",
        "other_lang",
        "shoe_size",
        "hobbies",
        "person_to_notify",
        "person_relation",
        "person_address",
        "person_contact",
        "passport_no",
        "issue_date",
        "expiry_date",
        "issue_place",
        "allergy",
        "food_alergy",
        "tattoo",
        "drivers_licensed",
        "type_licensed",
        "valid_licensed",
        "id_picture",
        "gov_id_picture",
        "passport_id_picture",
        "is_deleted",
    ];
}
