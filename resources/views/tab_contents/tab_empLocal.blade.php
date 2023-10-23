<div class="">
    <div class="block my-3 md:hidden text-center border-b border-green-600">
        <label class="text-xl  font-bold pb-4">Employment Record(Local)</label>
    </div>
    <div class="flex items-center mr-4">
        <input type="checkbox" value="1" id="local_applicable" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
        <label class="ml-2 text-sm md:text-sm font-normal text-gray-900 ">Tick this checkbox if not applicable.</label>
    </div>
    <div class="mt-2 md:mt-0 max-w-md ml-auto">
        <button id="add_local_btn" class="py-2 px-4 bg-sky-700 rounded w-full self-end text-sm text-white disabled:bg-sky-900">Add Record</button>
    </div>
    <form action="" id="empLocal_form" class="flex flex-col">
        <div class="companylocal md:grid grid-cols-9 gap-4" id="company_0">
            <div class="mt-2 md:mt-0 form-group col-span-9">
                <p style="color: red;">Note: From recent to oldest</p>
                <label class="text-xl font-bold lblLocalCompany">Company 1<span style="color:red" id="local_required">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
            </div>
            <div class="col-span-8 md:grid grid-cols-4 gap-4">
                <div class="mt-2 md:mt-0 form-group col-span-2">
                    {{-- <div class="relative" data-te-input-wrapper-init>
                        <input type="text" required name="name_local_0" id="name_local_0" maxlength="100" class=" name_local_0 peer floating-form disabled:bg-slate-200" placeholder="Example label" />
                        <label for="name_local_0" class="floating-label">Name of Company</label>
                      </div> --}}
                    <input name="name_local_0" id="name_local_0" autocomplete="off" type="text" maxlength="100" class="local form-control disabled:bg-slate-200" placeholder="Name of Company" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-2">
                    <input name="position_local_0" id="position_local_0" autocomplete="off" type="text" maxlength="100" class="position_local_0 form-control disabled:bg-slate-200" placeholder="Position" required>
                </div>

                <div class="mt-2 md:mt-0 form-group col-span-2">
                    <input name="address_local_0" id="address_local_0" autocomplete="off" type="text" maxlength="100" class="address_local_0 form-control disabled:bg-slate-200" placeholder="Company Address" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="date_from_local_0" id="date_from_local_0" maxlength="10" autocomplete="off" type="text" required
                        class="date_until_local_0 form-control date_picker disabled:bg-slate-200" placeholder="Date From" />
                   </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1" style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="date_until_local_0" id="date_until_local_0" maxlength="10" autocomplete="off" type="text" required
                        class="date_until_local_0 form-control date_picker disabled:bg-slate-200" placeholder="Date Until" />
                   </div>
                   <div class="form-check">
                        <input id="local-is-present-date" type="checkbox" class="form-check-input">
                        <label>tick box if still employed</label>
                   </div>
                </div>
            </div>
        </div>
        <div class="" id="local_companys">
        </div>
        <div class="self-end">
            <button id="empLocalBtn_Prev" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800"><< Prev</button>
            <button id="empLocalBtn_Next" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800">Next >></button>
        </div>
    </form>
</div>
