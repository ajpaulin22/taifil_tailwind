<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class family_data extends Model
{
    use HasFactory;

    protected $fillable = [
        "personal_id",
        "father_name",
        "father_birth",
        "father_occupation",
        "father_cp",
        "father_address",
        "mother_name",
        "mother_birth",
        "mother_occupation",
        "mother_cp",
        "mother_address",
        "spouse_name",
        "spouse_birth",
        "spouse_occupation",
        "spouse_cp",
        "spouse_address",
        "partner_name",
        "partner_birthday",
        "partner_Occupation",
        "partner_cp",
        "partner_address",
        "went_japan",
        "how_many_japan",
        "overstay_japan",
        "how_long_overstay",
        "fake_identity_japan",
        "fake_identity_purpose",
        "fake_identity_surrender",
        "applied_visa",
        "isdeleted",
    ];
}
