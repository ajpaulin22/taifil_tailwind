
<div class="">
    <div class="block my-3 md:hidden text-center border-b border-green-600">
        <label class="text-xl  font-bold pb-4">Personal Data</label>
    </div>
    <form action="" id="personal_form" class="flex flex-col">
        <div class="form-group" hidden>
            <input name="job_type" autocomplete="off" type="text" class="form-control" value="{{$biodata}}">
        </div>
        <div class="md:grid grid-cols-4 gap-4">
            
            <div class="form-group col-span-1">
                <label for="personal_lastname" class="form-label">Job Categories<span style="color:red">*</span>:</label>
                <select name="job_cat" class="form-select" id="jobcategories">
                    <option value="" selected disabled value>Choose....</option>
                </select>
            </div>
            <div class="form-group col-span-1">
                <label for="personal_lastname" class="form-label">Operations<span style="color:red">*</span>:</label>
                <select name="operations" class="form-select" id="joboperations">
                    <option value="" selected disabled value>Choose....</option>
                </select>
            </div>
            <div class="form-group col-span-1">
                {{-- <input name="PersonalInfoID" autocomplete="off" type="hidden" class="form-control" id="PersonalInfoID">
                <label for="personal_lastname" class="form-label">Code<span style="color:red">*</span>:</label>
                <select name="code" class="form-select" id="jobcodes">
                    
                    <option value="" selected disabled value>Choose....</option>
                </select> --}}
            </div>
            <div class="col-span-1"></div>
            <div class="form-group col-span-1">
                <label for="lastname" class="form-label">Last Name<span style="color:red">*</span>:</label>
                <input name="lastname" autocomplete="off" type="text" class="form-control" id="lastname" >
            </div>
            <div class="form-group col-span-1">
                <label for="firstname" class="form-label">First Name<span style="color:red">*</span>:</label>
                <input name="firstname" autocomplete="off" type="text" class="form-control" id="firstname">
            </div>
            <div class="form-group col-span-1">
                <label for="middlename" class="form-label">Middle Name<span style="color:red">*</span>:</label>
                <input name="middlename" autocomplete="off" type="text" class="form-control" id="middlename">
            </div>
            <div class="form-group col-span-1">
                <label for="nickname" class="form-label">Nickname<span style="color:red">*</span>:</label>
                <input name="nickname" autocomplete="off" type="text" class="form-control" id="nickanme">
            </div>
            <div class="form-group col-span-4">
                <label for="address" class="form-label">Present Address<span style="color:red">*</span>:</label>
                <input name="address" autocomplete="off" type="text" class="form-control" id="address">
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Date of Birth<span style="color:red">*</span>:</label>
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="birthday" id="birthday" autocomplete="off" value="" type="text" class="date_picker" placeholder="MM/DD/YYYY">
                </div>
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Place of Birth<span style="color:red">*</span>:</label>
                <input name="birth_place" autocomplete="off" type="text" class="form-control" id="birth_place">
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Gender<span style="color:red">*</span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" value="M" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">M</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="F" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">F</label>
                    </div>
                </div>
            </div>
            <x-citizenship/>
            <div class="form-group col-span-1">
                <label for="age" class="form-label">Age<span style="color:red">*</span>:</label>
                <input name="age" autocomplete="off" type="number" class="form-control" id="age" onKeyPress="if(this.value.length==4) return false;">
            </div>
            <div class="form-group col-span-1">
                <label for="personal_lastname" class="form-label">Blood Type:</label>
                <select name="blood_type" class="form-select">
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
                <select name="civil_status" class="form-select">
                    <option value="" selected disabled value>Choose....</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Divorce">Divorce</option>
                </select>
            </div>
            <div class="form-group col-span-1">
                <label for="contact" class="form-label">Contact No.<span style="color:red">*</span>:</label>
                <input name="contact" autocomplete="off" type="number" class="form-control" id="contact">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Height<span style="color:red">*</span>:</label>
                <input name="height" autocomplete="off" type="number" class="form-control" onKeyPress="if(this.value.length==4) return false;">
            </div>
            <div class="form-group col-span-1">
                <label for="personal_lastname" class="form-label">Religion<span style="color:red">*</span>:</label>
                <select name="religion" class="form-select">
                    <option value="" selected disabled value>Choose....</option>
                    <option value="RomanCatholic">Roman Catholic</option>
                    <option value="Islam">Islam</option>
                    <option value="Buddhism">Buddhism</option>
                    <option value="N/A">N/A</option>
                </select>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Facebook Account<span style="color:red">*</span>:</label>
                <input name="facebook" autocomplete="off" type="text" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Are you Smoking?<span style="color:red">*</span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" value="1" name="smoking" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="0" name="smoking" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Weight(KG)<span style="color:red">*</span>:</label>
                <input name="weight" autocomplete="off" type="number" class="form-control" onKeyPress="if(this.value.length==4) return false;">
            </div>
            <div class="form-group col-span-2">
                <label for="height" class="form-label">Japanese Language<span style="color:red">*</span>:</label>
                <div class="md:flex justify-evenly">
                    <div class="flex items-center mr-4">
                        <input name="jp_reading" type="checkbox" value="1" class="jp-group w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 " checked>
                        <label class="ml-2 text-sm md:text-lg font-medium text-gray-500 ">Reading</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input name="jp_writing" type="checkbox" value="1" class="jp-group w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        <label  class="ml-2 text-sm md:text-lg font-medium text-gray-500 ">Writing</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input name="jp_Speaking" type="checkbox" value="1" class="jp-group w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        <label  class="ml-2 text-sm md:text-lg font-medium text-gray-500 ">Speaking</label>
                    </div>
                    <div class="flex items-center">
                        <input name="jp_Listening" type="checkbox" value="1" class="jp-group w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                        <label  class="ml-2 text-sm md:text-lg font-medium text-gray-500 ">Listening</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Other Language<span style="color:red"></span>:</label>
                <input name="other_lang" autocomplete="off" type="text" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Shoe Size<span style="color:red">*</span>:</label>
                <input name="shoe_size" autocomplete="off" type="number" class="form-control" onKeyPress="if(this.value.length==4) return false;">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Hobbies<span style="color:red">*</span>:</label>
                <input name="hobbies" autocomplete="off" type="text" class="form-control">
            </div>
            <div class="form-group col-span-2">
                <label for="height" class="form-label">Person to notify in case o emergency<span style="color:red">*</span>:</label>
                <input name="person_to_notify" autocomplete="off" type="text" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Relation<span style="color:red">*</span>:</label>
                <input name="relation" autocomplete="off" type="text" class="form-control">
            </div>
            <div class="form-group col-span-2">
                <label for="height" class="form-label">Address<span style="color:red">*</span>:</label>
                <input name="person_address" autocomplete="off" type="text" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Contact No.<span style="color:red">*</span>:</label>
                <input name="person_contact" autocomplete="off" type="number" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Passport No.<span style="color:red">*</span>:</label>
                <input name="passport" autocomplete="off" type="text" class="form-control uppercase">
            </div>
            <div class="form-group col-span-1">
                    <label for="height" class="form-label">Issue Date.<span style="color:red">*</span>:</label>
                    <div class="relative max-w-sm">
                        <x-picker_logo/>
                        <input datepicker name="issue_date" autocomplete="off" type="text" class="date_picker" placeholder="MM/DD/YYYY">
                    </div>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Expiry Date.<span style="color:red">*</span>:</label>
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="expiry_date" autocomplete="off" type="text" class="date_picker" placeholder="MM/DD/YYYY">
                </div>
            </div>
            <div class="form-group col-span-1">
                <label for="height" class="form-label">Issue Place<span style="color:red">*</span>:</label>
                <input name="issue_place" autocomplete="off" type="text" class="form-control">
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Do you have food Allergies<span style="color:red">*</span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" value="1" name="allergy" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="0" name="allergy" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-span-1" id="allergy" hidden>
                <label for="height" class="form-label">What Kind of Food<span style="color:red">*</span>:</label>
                <input name="food_allergy" autocomplete="off" type="text" class="form-control" disabled>
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Do you have Tattoo?<span style="color:red">*</span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" value="1" name="tattoo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="0" name="tattoo" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">No</label>
                    </div>
                </div>
            </div>
            <div class="form-group col-span-1">
                <label for="address" class="form-label">Do you have Driver's License?<span style="color:red"></span>:</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" value="1" name="licensed" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Yes</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="0" name="licensed" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">No</label>
                    </div>
                </div>
            </div>
                <div class="form-group col-span-1 licensed" hidden>
                    <label for="personal_lastname" class="form-label">Type of Licensed?<span style="color:red">*</span>:</label>
                    <select name="type_licensed" class="form-select">
                        <option value="" selected disabled value>Choose....</option>
                        <option value="StudentPermit">Student Permit</option>
                        <option value="Non-Professional">Non-Professional</option>
                        <option value="Professional">Professional</option>
                    </select>
                </div>
                <div class="form-group col-span-1 licensed" hidden>
                    <label for="height" class="form-label">Valid Until<span style="color:red">*</span>:</label>
                    <div class="relative max-w-sm">
                        <x-picker_logo/>
                        <input datepicker name="licensed_until" type="text" class="date_picker" placeholder="MM/DD/YYYY">
                    </div>
                </div>
        </div>
        <button id="personalBtn" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800">Next >></button>
    </form>
</div>