<div class="">
    <div class="block my-3 md:hidden text-center border-b border-green-600">
        <label class="text-xl  font-bold pb-4">Personal Data</label>
    </div>
    <form action="" id="personal_form" class="flex flex-col">
        <div class="form-group" hidden>
            <input required name="job_type" autocomplete="off" type="text" class="form-control" value="{{$biodata}}">
        </div>
        <div class="md:grid grid-cols-4 gap-4">

            <div class="form-group col-span-1">
                <label for="personal_lastname" class="form-label">Job Categories<span style="color:red">*</span>:</label>
                <select required name="job_cat" class="form-select" id="jobcategories">
                    <option value="" selected disabled value>Choose....</option>
                </select>
            </div>
            <div class="form-group col-span-1">
                <label for="personal_lastname" class="form-label">Operations<span style="color:red">*</span>:</label>
                <select required name="operations" class="form-select" id="joboperations">
                    <option value="" selected disabled value>Choose....</option>
                </select>
            </div>
            <div class="form-group col-span-1">
                <input name="PersonalInfoID" type="hidden" class="form-control" id="PersonalInfoID">
                {{-- <label for="personal_lastname" class="form-label">Code<span style="color:red">*</span>:</label>
                <select required name="code" class="form-select" id="jobcodes">

                    <option value="" selected disabled value>Choose....</option>
                </select> --}}
            </div>
            <div class="col-span-1"></div>
            <div class="form-group col-span-1">
                <label for="lastname" class="form-label">Last Name<span style="color:red">*</span>:</label>
                <input required maxlength="100" name="lastname" autocomplete="off" type="text" class="form-control" id="lastname" >
            </div>
            <div class="form-group col-span-1">
                <label for="firstname" class="form-label">First Name<span style="color:red">*</span>:</label>
                <input required name="firstname" autocomplete="off" type="text" maxlength="100" class="form-control" id="firstname">
            </div>
            <div class="form-group col-span-1">
                <label for="middlename" class="form-label">Middle Name<span style="color:red">*</span>:</label>
                <input required name="middlename" autocomplete="off" type="text" maxlength="100" class="form-control" id="middlename">
            </div>
            <div class="form-group col-span-1">
                <label for="nickname" class="form-label">Nickname<span style="color:red">*</span>:</label>
                <input required name="nickname" autocomplete="off" type="text" maxlength="100" class="form-control" id="nickname">
            </div>
            <div class="form-group col-span-4">
                <label for="address" class="form-label">Present Address<span style="color:red">*</span>:</label>
                <input required name="address" autocomplete="off" type="text" maxlength="100" class="form-control" id="address">
            </div>
            <div class="form-group col-span-4">
                <label for="address" class="form-label">Permanent Address<span style="color:red">*</span>:</label>
                <input required name="permanentaddress" autocomplete="off" type="text" maxlength="100" class="form-control" id="address">
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Date of Birth<span style="color:red">*</span>:</label>
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="birthday" id="birthday" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" />
               </div>
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Place of Birth<span style="color:red">*</span>:</label>
                <input required name="birth_place" autocomplete="off" type="text" maxlength="100" class="form-control" id="birth_place">
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Gender<span style="color:red">*</span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input id="gender_male" required type="radio" value="M" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label id="gender_female" for="inline-radio" class="ml-2 text-lg text-gray-900">M</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input required type="radio" value="F" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">F</label>
                    </div>
                </div>
            </div>
            <x-citizenship/>
            <div class="form-group col-span-1">
                <label for="age" class="form-label">Age<span style="color:red">*</span>:</label>
                <input name="age" autocomplete="off" type="text" class="form-control pointer-events-none focus:ring-0 Number-Only bg-gray-100" id="age" maxlength="2" style="text-align:right" readonly>
            </div>
            <div class="form-group col-span-1">
                <label for="personal_lastname" class="form-label">Blood Type:</label>
                <select required name="blood_type" class="form-select">
                    <option value="" selected disabled value>Choose....</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="O-">N/A</option>
                </select>
            </div>
            <div class="form-group col-span-1">
                <label for="personal_lastname" class="form-label">Civil Status<span style="color:red">*</span>:</label>
                <select required name="civil_status" class="form-select">
                    <option value="" selected disabled value>Choose....</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Divorce">Divorce</option>
                </select>
            </div>
            <div class="form-group col-span-1">
                <label for="contact" class="form-label">Contact No.<span style="color:red">*</span>:</label>
                <input required name="contact" autocomplete="off" type="number" onKeyPress="if(this.value.length==20) return false;" class="form-control" id="contact" style="text-align:right">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Height(cm)<span style="color:red">*</span>:</label>
                <input required name="height" autocomplete="off" type="text" maxlength="3" class="form-control Number-Only" style="text-align:right">
            </div>
            <div class="form-group col-span-1">
                <label for="personal_lastname" class="form-label">Religion<span style="color:red">*</span>:</label>
                <select required name="religion" class="form-select">
                    <option value="" selected disabled value>Choose....</option>
                    <option value="RomanCatholic">Roman Catholic</option>
                    <option value="Islam">Islam</option>
                    <option value="Buddhism">Buddhism</option>
                    <option value="Others">Others</option>
                    <option value="N/A">N/A</option>
                </select>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Facebook Account<span style="color:red">*</span>:</label>
                <input required name="facebook" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="https://www.facebook.com/sample">
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Are you Smoking?<span style="color:red">*</span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input required type="radio" value="1" name="smoking" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input required type="radio" value="0" name="smoking" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Weight(KG)<span style="color:red">*</span>:</label>
                <input required name="weight" autocomplete="off" type="text" maxlength="3" class="form-control Number-Only" style="text-align:right">
            </div>
            <div class="form-group col-span-2">
                <label for="height" class="form-label">Japanese Language<span style="color:red">*</span>:</label>

                <div class="md:flex justify-evenly">
                    <div class="flex items-center mr-4">
                        <input required name="jp_reading" type="checkbox" value="1" class="jp-group w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 " checked>
                        <label class="ml-2 text-sm md:text-lg font-medium text-gray-500 ">Reading</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input  name="jp_writing" type="checkbox" value="1" class="jp-group w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        <label  class="ml-2 text-sm md:text-lg font-medium text-gray-500 ">Writing</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input  name="jp_Speaking" type="checkbox" value="1" class="jp-group w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        <label  class="ml-2 text-sm md:text-lg font-medium text-gray-500 ">Speaking</label>
                    </div>
                    <div class="flex items-center">
                        <input  name="jp_Listening" type="checkbox" value="1" class="jp-group w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        <label  class="ml-2 text-sm md:text-lg font-medium text-gray-500 ">Listening</label>
                    </div>
                    @if($biodata == "TITP")
                    <div class="flex items-center mr-4">
                        <input id="jp-group_applicable" type="checkbox" value="1" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        <label class="ml-2 text-sm md:text-lg font-medium text-gray-500 ">N/A</label>
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Other Language<span style="color:red"></span>:</label>
                <input name="other_lang" autocomplete="off" type="text" maxlength="100" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Shoe Size(cm)<span style="color:red">*</span>:</label>
                <input required name="shoe_size" autocomplete="off" type="text" maxlength="4" class="form-control Number-Only" style="text-align:right">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Hobbies<span style="color:red">*</span>:</label>
                <input required name="hobbies" autocomplete="off" type="text" maxlength="100" class="form-control">
            </div>
            <div class="form-group col-span-2">
                <label for="height" class="form-label">Person to notify in case of emergency<span style="color:red">*</span>:</label>
                <input required name="person_to_notify" autocomplete="off" type="text" maxlength="100" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Relation<span style="color:red">*</span>:</label>
                {{-- <input required name="relation" autocomplete="off" type="text" maxlength="100" class="form-control"> --}}
                <select required name="relation" class="form-select">
                    <option value="" selected disabled value>Choose....</option>
                    <option value="Mother">Mother</option>
                    <option value="Father">Father</option>
                    <option value="Sibling">Sibling</option>
                    <option value="Relative">Relative</option>
                </select>
            </div>
            <div class="form-group col-span-2">
                <label for="height" class="form-label">Address<span style="color:red">*</span>:</label>
                <input required name="person_address" autocomplete="off" type="text" maxlength="100" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Contact No.<span style="color:red">*</span>:</label>
                <input required name="person_contact" onKeyPress="if(this.value.length==20) return false;" autocomplete="off" type="number" class="form-control" style="text-align:right">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Passport No.<span style="color:red">*</span>:</label>
                <input required name="passport" autocomplete="off" type="text" maxlength="20" class="form-control uppercase" style="">
            </div>
            <div class="form-group col-span-1">
                    <label for="height" class="form-label">Issue Date.<span style="color:red">*</span>:</label>
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="issue_date" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" />
                   </div>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Expiry Date.<span style="color:red">*</span>:</label>
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-past="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="expiry_date" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" />
               </div>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Issue Place<span style="color:red">*</span>:</label>
                <input required name="issue_place" autocomplete="off" type="text" maxlength="100" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Do you have food Allergies<span style="color:red">*</span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input id="allergy_yes" required type="radio" value="1" name="allergy" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input id="allergy_no" required type="radio" value="0" name="allergy" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-span-1" id="allergy" hidden>
                <label for="height" class="form-label">What Kind of Food<span style="color:red">*</span>:</label>
                <input required name="food_allergy" autocomplete="off" type="text" maxlength="100" class="form-control" disabled>
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Do you have Tattoo?<span style="color:red">*</span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input id="tattoo_yes" required type="radio" value="1" name="tattoo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input id="tattoo_no" required type="radio" value="0" name="tattoo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Do you have Driver's License?<span style="color:red">*</span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input id="drivers_licensed_yes" required type="radio" value="1" name="licensed" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input id="drivers_licensed_yes" required type="radio" value="0" name="licensed" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">No</label>
                    </div>
                </div>
            </div>
                <div class="form-group col-span-1 licensed" hidden>
                    <label for="personal_lastname" class="form-label">Type of Licensed?<span style="color:red">*</span>:</label>
                    <select required name="type_licensed" class="form-select">
                        <option value="" selected disabled value>Choose....</option>
                        <option value="StudentPermit">Student Permit</option>
                        <option value="Non-Professional">Non-Professional</option>
                        <option value="Professional">Professional</option>
                    </select>
                </div>
                <div class="form-group col-span-1 licensed" hidden>
                    <label for="height" class="form-label">Valid Until<span style="color:red">*</span>:</label>
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="licensed_until" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" />
                   </div>
                </div>
        </div>
        <button id="personalBtn" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800">Next >></button>
    </form>
</div>
