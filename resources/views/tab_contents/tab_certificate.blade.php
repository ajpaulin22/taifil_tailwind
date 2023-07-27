<div class="">
    <div class="flex items-center mr-4">
        <input type="checkbox" value="1" id="certificate_applicable" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
        <label class="ml-2 text-sm md:text-sm font-normal text-gray-900 ">Tick this checkbox if ex-trainee.</label>
    </div>
    <form action="" id="certificate_form" class="flex flex-col">
        <div class="md:grid grid-cols-7 gap-4">
            <div class="mt-2 md:mt-0 form-group col-span-6">
                <label class="text-xl font-bold">Prometrics<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <button id="add_prometric" class="py-2 px-4 bg-green-400 rounded w-full self-end text-sm text-white">Add Record</button>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_prometric_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_prometric_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_from_prometric_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_until_prometric_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-5">
                <input name="certificate_prometric_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" placeholder="Certificate Holder" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_until_cert_prometric_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>

            <div class="col-span-7 " id="prometric_div">
                
            </div>

            <div class="mt-2 md:mt-0 form-group col-span-6">
                <label class="text-xl font-bold">Japanese Language<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <button id="add_japlang_btn" class="py-2 px-4 bg-green-400 rounded w-full self-end text-sm text-white">Add Record</button>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_jpl_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_jpl_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_from_jpl_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_until_jpl_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-5">
                <input name="certificate_jpl_0" autocomplete="off" type="text" maxlength="100" class="form-control disabled:bg-slate-200" placeholder="Certificate Holder" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="date_until_cert_jpl_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
               </div>
            </div>

            <div class="col-span-7 " id="jpl_div">
                
                
            </div>
        </div>
        <div class="self-end">
            <button id="certificateBtn_Prev" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800"><< Prev</button>
            <button id="certificateBtn_Next" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800">Next >></button>
        </div>
        
    </form>
</div>