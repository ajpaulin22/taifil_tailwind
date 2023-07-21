<div class="">
    <div class="block my-3 md:hidden text-center border-b border-green-600">
        <label class="text-xl  font-bold pb-4">Family Information</label>
    </div>
    <form action="" id="family_form" class="flex flex-col">
        <div class="md:grid grid-col-13 gap-4">
            <div class="mt-2 md:mt-0 form-group col-span-12">
                <label class="text-xl font-bold">Parents<span style="color:red">*</span>:</label>
            </div>
            <div class="form-group col-span-1">
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" value="1" name="father_deceased" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " checked>
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Available</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="2" name="father_deceased" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Deceased</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="3" name="father_deceased" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">N/A</label>
                    </div>
                </div>
            </div>
            <div class=" form-group col-span-1">
            </div>
            <div class="form-group col-span-3">
                <label for="father" class="form-label">Father Name<span style="color:red">*</span>:</label>
                <input name="father" autocomplete="off" type="text" maxlength="100" class="father_na form-control disabled:bg-slate-200" required>
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">Birth Date<span style="color:red">*</span>:</label>
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="father_birthday" autocomplete="off" type="text" maxlength="100" class="father_deceased form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" required>
                </div>
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">Occupation<span style="color:red">*</span>:</label>
                <input name="father_occupation" autocomplete="off" type="text" maxlength="100" class="father_deceased form-control disabled:bg-slate-200" required>
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">CP No.<span style="color:red">*</span>:</label>
                <input name="father_cp" autocomplete="off" type="text" maxlength="20" class="Number-Only father_deceased form-control disabled:bg-slate-200" required style="text-align:right">
            </div>
            <div class="form-group col-start-2 col-span-12">
                <label for="lastname" class="form-label">Address<span style="color:red">*</span>:</label>
                <input name="father_address" autocomplete="off" type="text" maxlength="100" class="father_deceased form-control disabled:bg-slate-200" required>
            </div>

            <div class="mt-2 md:mt-0 form-group col-span-12">
            </div>
            <div class="form-group col-span-1">
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" value="1" name="mother_deceased" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " checked>
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Available</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="2" name="mother_deceased" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-radio" class="ml-2 text-lg text-gray-900">Deceased</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="3" name="mother_deceased" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                        <label for="inline-2-radio" class="ml-2 text-lg text-gray-900">N/A</label>
                    </div>
                </div>
            </div>

            <div class="mt-2 md:mt-0 form-group col-span-1">
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">Mother Name<span style="color:red">*</span>:</label>
                <input name="mother" autocomplete="off" type="text" maxlength="100" class="mother_na form-control disabled:bg-slate-200" required>
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">Birth Date<span style="color:red">*</span>:</label>
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="mother_birthday" autocomplete="off" type="text" maxlength="100" class="mother_deceased form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" required>
                </div>
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">CP No.<span style="color:red">*</span>:</label>
                <input name="mother_cp" autocomplete="off" type="text" maxlength="20" class="Number-Only mother_deceased form-control disabled:bg-slate-200" required style="text-align:right">
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">Occupation<span style="color:red">*</span>:</label>
                <input name="mother_occupation" autocomplete="off" type="text" maxlength="100" class="mother_deceased form-control disabled:bg-slate-200" required>
            </div>
            
            <div class="form-group col-start-2 col-span-12">
                <label for="lastname" class="form-label">Address<span style="color:red">*</span>:</label>
                <input name="mother_address" autocomplete="off" type="text" maxlength="100" class="mother_deceased form-control disabled:bg-slate-200" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-11">
                <label class="text-xl font-bold">Siblings<span style="color:red">*</span>:</label>
            </div>
            <div class="form-group col-span-1 flex items-center my-4 md:my-0">
                <input type="checkbox" value="1" id="sibling_applicable" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                <label class="ml-2 text-sm md:text-sm font-normal text-gray-900 ">Tick this checkbox if only child.</label>
            </div>
            <div class="form-group col-span-1">
                <button id="add_sibling" class=" py-2 px-4 bg-sky-700 rounded w-full self-end text-sm text-white disabled:bg-sky-900">Add Sibling</button>
            </div>
            <div class="col-span-13 md:grid grid-col-13 gap-4">
                <div class="mt-2 md:mt-0 form-group col-span-1">
                </div>
                <div class="form-group col-span-3">
                    <label for="sibling" class="form-label">Name<span style="color:red">*</span>:</label>
                    <input name="sibling_0" autocomplete="off" type="text" maxlength="100" class="sibling form-control disabled:bg-slate-200" required>
                </div>
                <div class="form-group col-span-3">
                    <label for="sibling_birthday" class="form-label">Birth Date<span style="color:red">*</span>:</label>
                    <div class="relative max-w-sm">
                        <x-picker_logo/>
                        <input datepicker name="sibling_birthday_0" autocomplete="off" type="text" maxlength="100" class="sibling form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" required>
                    </div>
                </div>
                <div class="form-group col-span-3">
                    <label for="lastname" class="form-label">Occupation<span style="color:red">*</span>:</label>
                    <input name="sibling_occupation_0" autocomplete="off" type="text" maxlength="100" class="sibling form-control disabled:bg-slate-200" required>
                </div>
                <div class="form-group col-span-3">
                    <label for="lastname" class="form-label">CP No.<span style="color:red">*</span>:</label>
                    <input name="sibling_cp_0" autocomplete="off" type="number" onKeyPress="if(this.value.length==20) return false;" class="sibling form-control disabled:bg-slate-200" required style="text-align:right">
                </div>
                <div class="form-group col-start-2 col-span-12">
                    <label for="lastname" class="form-label">Address<span style="color:red">*</span>:</label>
                    <input name="sibling_address_0" autocomplete="off" type="text" maxlength="100" class="sibling form-control disabled:bg-slate-200" required>
                </div>
            </div>
            <div id="siblings_nav" class="col-span-13">
                
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-13">
                <label class="text-xl font-bold">Spouse<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">Name<span style="color:red">*</span>:</label>
                <input name="spouse" autocomplete="off" type="text" maxlength="100" class="form-control spouse disabled:bg-slate-200" required>
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">Birth Date<span style="color:red">*</span>:</label>
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="spouse_birthday" autocomplete="off" type="text" maxlength="100" class="form-control spouse date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" required>
                </div>
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">Occupation<span style="color:red">*</span>:</label>
                <input name="spouse_occupation" autocomplete="off" type="text" maxlength="100" class="form-control spouse disabled:bg-slate-200" required>
            </div>
            <div class="form-group col-span-3">
                <label for="lastname" class="form-label">CP No.<span style="color:red">*</span>:</label>
                <input name="spouse_cp" autocomplete="off" type="number" onKeyPress="if(this.value.length==20) return false;" maxlength="100" class="form-control spouse disabled:bg-slate-200" required style="text-align:right" style="text-align:right">
            </div>
            <div class="form-group col-start-2 col-span-12">
                <label for="lastname" class="form-label">Address<span style="color:red">*</span>:</label>
                <input name="spouse_address" autocomplete="off" type="text" maxlength="100" class="form-control spouse disabled:bg-slate-200" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-11">
                <label class="text-xl font-bold">Children<span style="color:red">*</span>:</label>
            </div>
            <div class="form-group col-span-1 flex items-center my-4 md:my-0">
                <input type="checkbox" value="1" id="children_applicable" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                <label class="ml-2 text-sm md:text-sm font-normal text-gray-900 ">Tick this checkbox if no children.</label>
            </div>
            <div class="form-group col-span-1">
                <button id="add_children" class="py-2 px-4 bg-sky-700 rounded w-full self-end text-sm text-white disabled:bg-sky-900">Add Children</button>
            </div>
            <div class=" form-group col-span-1">
                    
            </div>
            <div class="form-group col-span-8">
                <label for="lastname" class="form-label">Name<span style="color:red">*</span>:</label>
                <input name="child_0" autocomplete="off" type="text" maxlength="100" class="children form-control disabled:bg-slate-200" required>
            </div>
            <div class="form-group col-span-4">
                <label for="lastname" class="form-label">Birth Date<span style="color:red">*</span>:</label>
                <div class="relative w-full">
                    <x-picker_logo/>
                    <input datepicker name="child_birthday_0" autocomplete="off" type="text" maxlength="100" class="children form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" required>
                </div>
            </div>
            <div class="col-span-13" id="children">
            </div>
            
            <div class="col-span-13 flex items-center my-4 md:my-0">
                <input type="checkbox" value="1" id="partner_applicable" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                <label class="ml-2 text-sm md:text-sm font-normal text-gray-900 ">Tick this checkbox if you have Live In Partner.</label>
            </div>
            <div class="partner_hidden form-group col-span-1" hidden>
            </div>
            <div class="partner_hidden form-group col-span-3" hidden>
                <label for="lastname" class="form-label">Name<span style="color:red">*</span>:</label>
                <input name="partner" autocomplete="off" type="text" maxlength="100" class="form-control partner disabled:bg-slate-200" required disabled>
            </div>
            <div class="partner_hidden form-group col-span-3" hidden>
                <label for="lastname" class="form-label">Age<span style="color:red">*</span>:</label>
                <input name="partner_age" autocomplete="off" type="number" onKeyPress="if(this.value.length==3) return false;" class="form-control partner disabled:bg-slate-200" required disabled style="text-align:right">
            </div>
            <div class="partner_hidden form-group col-span-3" hidden>
                <label for="lastname" class="form-label">CP No.<span style="color:red">*</span>:</label>
                <input name="partner_cp" autocomplete="off" type="number" onKeyPress="if(this.value.length==20) return false;" class="form-control partner disabled:bg-slate-200" required disabled style="text-align:right">
            </div>
            <div class="partner_hidden form-group col-span-3" hidden>
                <label for="lastname" class="form-label">How Long(Months)<span style="color:red">*</span>:</label>
                <input name="partner_howlong" autocomplete="off" type="text" maxlength="3" class="form-control partner Number-Only disabled:bg-slate-200 text-right" required disabled>
            </div>
            <div class="partner_hidden form-group col-start-2 col-span-12" hidden>
                <label for="lastname" class="form-label">Address<span style="color:red">*</span>:</label>
                <input name="partner_address" autocomplete="off" type="text" maxlength="100" class="form-control partner disabled:bg-slate-200" required disabled>
            </div>
            <div class="form-group col-span-13 flex gap-4">
                <label for="address" class="form-label text-sm md:text-base">Have you been to japan? (nakapunta ka na ba sa Japan):</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" value="1" name="went_japan" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " required >
                        <label  class="ml-2 text-sm md:text-lg text-gray-900">YES</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="0" name="went_japan" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " required>
                        <label  class="ml-2 text-sm md:text-lg text-gray-900">NO</label>
                    </div>
                </div>
            </div>
            <div id="japan_hidden" class="form-group col-span-13 md:grid grid-cols-12 gap-4">
                <div class="form-group col-span-4 japan_group" hidden>
                    <label for="lastname" class="form-label">How many times? (ilang beses?)</label>
                    <input name="japan_times" autocomplete="off" type="number" onKeyPress="if(this.value.length==3) return false;" class="japan text-right form-control disabled:bg-slate-200" required disabled>
                </div>
                <div class="form-group col-span-4 japan_group" hidden>
                    <label for="lastname" class="form-label">When (kailan?)</label>
                    <div class="relative w-full">
                        <x-picker_logo/>
                        <input datepicker name="japan_when" autocomplete="off" type="text" maxlength="100" class="japan form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" required disabled>
                    </div>
                </div>
                <div class="form-group col-span-4 japan_group" hidden>
                    <label for="lastname" class="form-label">Where in japan</label>
                    <input name="japan_where" autocomplete="off" type="text" maxlength="100" class="japan form-control disabled:bg-slate-200" required disabled>
                </div>
                <div class="form-group col-span-4 japan_group" hidden>
                    <div class="flex gap-4 w-full">
                        <label for="address" class="form-label">Have you overstayed in Japan?:</label>
                    <div class="flex">
                        <div class="flex items-center mr-4">
                            <input type="radio" value="1" name="overstay" class="japan w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " required disabled> 
                            <label  class="ml-2 text-sm md:text-lg text-gray-900">YES</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input type="radio" value="0" name="overstay" class="japan w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " required disabled>
                            <label  class="ml-2 text-sm md:text-lg text-gray-900">NO</label>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-group col-span-8 overstay_group" hidden>
                    <input name="overstay_howlong" autocomplete="off" type="text" maxlength="3" class="Number-Only overstay form-control disabled:bg-slate-200" placeholder="How Long(days)?" required disabled>
                </div>
                <div class="form-group col-span-4 japan_group" hidden>
                    <div class="flex gap-4 w-full">
                        <label for="address" class="form-label">Did you use fake identity when you went to Japan?</label>
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input type="radio" value="1" name="fakeidentity" class="japan w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " required disabled>
                                <label class="ml-2 text-sm md:text-lg text-gray-900">YES</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input type="radio" value="0" name="fakeidentity" class="japan w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 "required disabled>
                                <label  class="ml-2 text-sm md:text-lg text-gray-900">NO</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-span-4 fakeidentity_group" hidden>
                    <input name="fakeidentity_purpose" autocomplete="off" type="text" maxlength="100" class="fakeidentity form-control disabled:bg-slate-200" placeholder="where did you use the name for?" required disabled>
                </div>
                <div class="form-group col-span-4 fakeidentity_group" hidden>
                    <div class="w-full flex gap-4">
                        <label for="address" class="form-label">Did you surrendered?</label>
                       <div class="flex">
                        <div class="flex items-center mr-4" >
                            <input type="radio" value="1" name="fakeidentity_surrendered" class="fakeidentity w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " required disabled hidden>
                            <label class="ml-2 text-sm md:text-lg text-gray-900">YES</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input type="radio" value="0" name="fakeidentity_surrendered" class="fakeidentity w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " required disabled>
                            <label class="ml-2 text-sm md:text-lg text-gray-900">NO</label>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-span-13 flex gap-4">
                <label for="address" class="form-label text-sm md:text-base">Have you applied for a japanese visa before?</label>
                <div class="flex">
                    <div class="flex items-center mr-4">
                        <input type="radio" value="1" name="visa" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " required >
                        <label  class="ml-2 text-sm md:text-lg text-gray-900">YES</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input type="radio" value="0" name="visa" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " required>
                        <label  class="ml-2 text-sm md:text-lg text-gray-900">NO</label>
                    </div>
                </div>
            </div>
            <div id="visa_hidden" class="col-span-13 md:grid grid-flow-col grid-cols-12 gap-4">
                <div class="form-group col-span-4 visa_group" hidden>
                    <label for="personal_lastname" class="form-label">Type of Visa<span style="color:red">*</span>:</label>
                    <select name="visa_type" class="visa form-select disabled:bg-slate-200" required disabled>
                        <option value="" selected disabled value>Choose....</option>
                        <option value="Tourist Visa">Tourist Visa</option>
                        <option value="Business Visa">Business Visa</option>
                        <option value="Work Visa">Work Visa</option>
                        <option value="Transit Visa">Transit Visa</option>
                        <option value="Student Visa">Student Visa</option>
                    </select>
                </div>
                <div class="form-group col-span-4 visa_group" hidden >
                    <label for="lastname" class="form-label">When</label>
                    <div class="relative w-full">
                        <x-picker_logo/>
                        <input datepicker name="visa_when" autocomplete="off" type="text" maxlength="100" class="visa form-control date_picker disabled:bg-slate-200" placeholder="MM/DD/YYYY" required disabled>
                    </div>
                </div>
                <div class="form-group col-span-4 visa_group" hidden>
                    <label for="personal_lastname" class="form-label">Was it Approved of Denied<span style="color:red">*</span>:</label>
                    <select name="visa_approved" class="visa form-select disabled:bg-slate-200" required disabled>
                        <option value="" selected disabled value>Choose....</option>
                        <option value="1">Approved</option>
                        <option value="0">Denied</option>
                    </select>
                </div>
            </div>

            <div class="mt-2 md:mt-0 form-group col-span-11">
                <label class="text-sm md:text-xl font-bold">RELATIVES AND ACQUAINTANCES IN JAPAN (Mga Kamag-Anak At Kaibigan Sa Japan)<span style="color:red">*</span>:</label>
            </div>
            <div class="form-group col-span-1 flex items-center my-4 md:my-0">
                <input type="checkbox" value="1" id="relatives_applicable" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                <label class="ml-2 text-sm md:text-sm font-normal text-gray-900 ">Tick if not applicable.</label>
            </div>
            <div class="form-group col-span-1">
                <button id="add_relatives" class="py-2 px-4 bg-sky-700 rounded w-full self-end text-sm text-white disabled:bg-sky-900">Add More</button>
            </div>

            <div class="col-span-13" id="relatives">
                <div class="relative_content w-full md:grid grid-cols-13 grid-flow-col gap-4 hidden">
                    <div class="form-group col-span-1">
     
                    </div>
                    <div class="form-group col-span-4 text-center">
                        <label for="sibling" class="form-label font-bold">Name</label>
                    </div>
                    <div class="form-group col-span-4 text-center">
                        <label for="sibling" class="form-label font-bold">Relation</label>
                    </div>
                    <div class="form-group col-span-4 text-center">
                        <label for="sibling" class="form-label font-bold">Contact Number</label>
                    </div>
                    <div class="form-group col-span-4 text-center">
                        <label for="sibling" class="form-label font-bold">Address</label>
                    </div>
                </div>
                <div class="relative_content w-full md:grid grid-cols-13 grid-flow-col gap-4">
                    <div class="form-group col-span-1">
                        <button class='py-2 bg-white w-full self-end text-xs font-bold text-white pointer-events-none'>X</button>
                    </div>
                    <div class="form-group col-span-4 mt-2 md:mt-0">
                        <input name="name_relative_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" required placeholder="Name">
                    </div>
                    <div class="form-group col-span-4 mt-2 md:mt-0">
                        <input name="relation_relative_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" required placeholder="Relation">
                    </div>
                    <div class="form-group col-span-4 mt-2 md:mt-0">
                        <input name="contact_relative_0" autocomplete="off" type="number" onKeyPress="if(this.value.length==20) return false;" class="form-control text-right disabled:bg-slate-200" required placeholder="Contact">
                    </div>
                    <div class="form-group col-span-4 mt-2 md:mt-0">
                        <input name="address_relative_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" required placeholder="Address">
                    </div>
                </div>

            </div>
        </div>
        <div class="self-end">
            <button id="familyBtn_Prev" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800"><< Prev</button>
            <button id="familyBtn_Next" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800">Next >></button>
        </div>
       
        
    </form>
</div>