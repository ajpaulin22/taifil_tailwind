<div class="">
   
    <div class="block my-3 md:hidden text-center border-b border-green-600">
        <label class="text-xl  font-bold pb-4">Educational Background</label>
    </div>
    <form action="" id="educational_form" class="flex flex-col">
        <div class="md:grid grid-cols-7 gap-4">
            <div class="mt-2 md:mt-0 form-group col-span-7">
                <label class="text-xl font-bold">Elementary<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_elem" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_elem" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_from_elem" id="date_from_elem" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_elem" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-7">
                <label class="text-xl font-bold">High School<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_highschool" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_highschool" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_from_highschool" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_highschool" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>

                <div class="mt-2 md:mt-0 form-group col-span-6">
                    <label class="text-xl font-bold">Vocational<span style="color:red">*</span>:</label>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <button id="add_vocational_btn" class="py-2 px-4 bg-sky-800 rounded w-full self-end text-sm text-white">Add Record</button>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-3">
                    <input name="name_vocational_0" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Name of School" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-2">
                    <input name="add_vocational_0" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="School Address" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="date_from_vocational_0"  maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
                   </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_vocational_0" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
                   </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-4">
                    <input name="course_vocational_0" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Course/Major" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-2">
                    <input name="certificate_vocational_0" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Certificate Holder" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_cert_vocational_0" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
                   </div>
                </div>
             <div id="vocational" class="col-span-7">

            </div>   
            @if($biodata != "SSW")
            <div class="mt-2 md:mt-0 form-group col-span-5">
                <label class="text-xl font-bold">Japanese Language<span class="required_jpl" style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                @if($biodata != "SSW")
                <div class="flex items-center mr-4 justify-end">
                    <label class="ml-2 mr-2 text-sm md:text-sm font-normal text-gray-900">Tick this checkbox if N/A.</label>
                    <input type="checkbox" value="1" id="jpl_applicable_education" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
                </div>
                @endif
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_jpl" autocomplete="off" type="text" maxlength="100" class="jpl disabled:bg-slate-200 form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_jpl" autocomplete="off" type="text" maxlength="100" class="jpl disabled:bg-slate-200 form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_from_jpl" maxlength="10" autocomplete="off" type="text" required class="jpl form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_jpl" maxlength="10" autocomplete="off" type="text" required class="jpl form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-5">
                <input name="certificate_jpl" autocomplete="off" type="text" maxlength="100" class="jpl disabled:bg-slate-200 form-control" placeholder="Certificate Holder" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_cert_jpl" maxlength="10" autocomplete="off" type="text" required class="jpl form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>
            
            @endif
            <div class="mt-2 md:mt-0 form-group col-span-7">
                <label class="text-xl font-bold">College<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_college" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_college" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_from_college" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_college" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-4">
                <input name="course_college" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Course/Major" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                {{-- <input name="certificate_college" autocomplete="off" type="text" maxlength="100" class="form-control" placeholder="Certificate Holder" required> --}}
                <select required name="certificate_college" class="form-select">
                    <option value="" selected disabled value>Certificate Holder</option>
                    <option value="4-year College Graduate">4-year College Graduate</option>
                    <option value="3-year College Graduate">3-year College Graduate</option>
                    <option value="2-year College Graduate">2-year College Graduate</option>
                    <option value="Under Graduate">Under Graduate</option>
                </select>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" data-rule-pastDate="true" name="date_until_cert_college" maxlength="10" autocomplete="off" type="text" required class="form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>
        </div>
        <div class="self-end">
            <button id="educationalBtn_Prev" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800"><< Prev</button>
            <button id="educationalBtn_Next" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800">Next >></button>
        </div>
        
    </form>
</div>