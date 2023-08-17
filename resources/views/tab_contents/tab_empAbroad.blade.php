<div class="">
    <div class="block my-3 md:hidden text-center border-b border-green-600">
        <label class="text-xl  font-bold pb-4">Employment Record(Abroad)</label>
    </div>
    <div class="flex items-center mr-4">
        <input type="checkbox" value="1" id="abroad_applicable" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
        <label class="ml-2 text-sm md:text-sm font-normal text-gray-900 ">Tick this checkbox if not applicable.</label>
    </div>
    <div class="mt-2 md:mt-0 max-w-md ml-auto">
        <button id="add_abroad_btn" class="py-2 px-4 bg-sky-700 rounded w-full self-end text-sm text-white disabled:bg-sky-900">Add Record</button>
    </div>
    <form action="" id="empAbroad_form" class="flex flex-col">
        
        <div class="companyabroad md:grid grid-cols-9 gap-4" id="company_0">
            <div class="mt-2 md:mt-0 form-group col-span-9">
                <label class="text-xl font-bold lblAbroadCompany">Company <span style="color:red" id="abroad_required">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                
            </div>
            <div class="col-span-8 md:grid grid-cols-4 gap-4">
                <div class="mt-2 md:mt-0 form-group col-span-2">
                    <input name="name_abroad_0" id="name_abroad_0" autocomplete="off" type="text" maxlength="100" class="abroad form-control disabled:bg-slate-200" placeholder="Name of Company" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-2">
                    <input name="position_abroad_0" id="position_abroad_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" placeholder="Position" required>
                </div>
                
                <div class="mt-2 md:mt-0 form-group col-span-2">
                    <input name="address_abroad_0" id="address_abroad_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" placeholder="Company Address" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="date_from_abroad_0" id="date_from_abroad_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
                   </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="date_until_abroad_0" id="date_until_abroad_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
                   </div>
                </div>
            </div>
        </div>
        <div class="" id="abroad_companys">
        </div>
        <div class="self-end">
            <button id="empAbroadBtn_Prev" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800"><< Prev</button>
            <button id="empAbroadBtn_Next" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800">Next >></button>
        </div>
        
    </form>
</div>