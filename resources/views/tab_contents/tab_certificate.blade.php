<div class="">
    <div class="flex items-center mr-4 justify-end">
        <label class="ml-2 mr-2 text-sm md:text-sm font-normal text-gray-900 ">Tick this checkbox if ex-trainee.</label>
        <input type="checkbox" value="1" id="certificate_trainee" class=" w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
    </div>
    <form action="" id="certificate_form" class="flex flex-col">
        <div id="ex-trainee" hidden>
            <div class="md:grid my-3 grid-cols-7 gap-4">
                <div class="mt-2 md:mt-0 form-group col-span-3">
                    <label for="personal_lastname" class="form-label">Job Category<span style="color:red">*</span>:</label>
                    <select id="certificate_category" required name="certificate_category" class="job form-select disabled:bg-slate-200" disabled>
                        <option value="" selected disabled value>Job Category</option>
                    </select>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-3">
                    <label for="personal_lastname" class="form-label">Job Operation<span style="color:red">*</span>:</label>
                    <select id="certificate_operation" required name="certificate_operation" class="job form-select disabled:bg-slate-200" disabled>
                        <option value="" selected disabled value>Job Operation</option>
                    </select>
                </div>
            </div>

            <div class="mt-2 md:mt-0 form-group">
                <label class="ml-2 text-sm md:text-sm font-normal text-gray-900 ">Tick this checkbox if you have take the prometric test.</label>
                <input type="checkbox" value="1" id="prometric_applicable" class="applicable w-4 h-4 text-blue-600 disabled:bg-slate-200 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
            </div>
            <div class="md:grid my-3 grid-cols-7 gap-4">
                <div class="mt-2 md:mt-0 form-group col-span-3">
                    <select required name="trainee_test_prometric_0" class="prometric_trainee form-select disabled:bg-slate-200" disabled>
                    </select>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                    <input data-rule-validDate="true" name="trainee_taken_prometric_0" maxlength="10" autocomplete="off" type="text" required class="prometric_trainee form-control date_picker disabled:bg-slate-200" placeholder="Date Taken" disabled/>
               </div>
                </div>
                <div class="form-group col-span-2">
                    <div class="flex">
                        <div class="flex items-center mr-5">
                            <input required type="radio" value="1" id="trainee_passed_prometric_0" name="trainee_result_prometric_0" class="prometric_trainee w-4 h-4 disabled:bg-slate-200 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " disabled>
                            <label for="inline-radio" class="ml-2 text-sm md:text-xl text-gray-900">Passed</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input required type="radio" value="0" id="trainee_failed_prometric_0" name="trainee_result_prometric_0" class="prometric_trainee w-4 h-4 disabled:bg-slate-200 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " disabled>
                            <label for="inline-2-radio" class="ml-2 text-sm md:text-xl text-gray-900">Failed</label>
                        </div>
                    </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                <button id="add_prometric_trainee" class="prometric_trainee py-2 px-4 bg-sky-800 rounded w-full self-end text-sm text-white">Add Record</button>
                </div>

            </div>

            <div class="" id="trainee_prometric_nav"></div>

            <div class="mt-2 md:mt-0 form-group col-span-6">
                <label class="ml-2 text-sm md:text-sm font-normal text-gray-900 ">Tick this checkbox if you have take the Japanese Language Certificate.</label>
                <input type="checkbox" value="1" id="jpl_applicable" class="applicable w-4 h-4 disabled:bg-slate-200 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ">
            </div>
            <div class="md:grid my-3 grid-cols-7 gap-4">
                <div class="mt-2 md:mt-0 form-group col-span-3">
                    <select required name="trainee_test_jpl_0" class="jpl_trainee disabled:bg-slate-200 form-select" disabled></select>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="trainee_taken_jpl_0" maxlength="10" autocomplete="off" type="text" required class="jpl_trainee form-control date_picker disabled:bg-slate-200" placeholder="Date Taken" disabled/>
                   </div>
                </div>
                <div class="form-group col-span-2">
                    <div class="flex">
                        <div class="flex items-center mr-5">
                            <input required type="radio" value="1" id="trainee_passed_language_0" name="result_jpl_0" class="jpl_trainee w-4 h-4 disabled:bg-slate-200 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " disabled>
                            <label for="inline-radio" class="ml-2 text-sm md:text-xl text-gray-900">Passed</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input required type="radio" value="0" id="trainee_failed_language_0" name="result_jpl_0" class="jpl_trainee w-4 h-4 disabled:bg-slate-200 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 " disabled>
                            <label for="inline-2-radio" class="ml-2 text-sm md:text-xl text-gray-900">Failed</label>
                        </div>
                    </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <button id="add_japlang_trainee" class="jpl_trainee py-2 px-4 bg-sky-800 rounded w-full self-end text-sm text-white">Add Record</button>
                </div>

            </div>

            <div class="" id="trainee_jpl_div"></div>
        </div>

        <div id="not-ex-trainee">
            <div class="md:grid grid-cols-7 gap-4">
                <div class="mt-2 md:mt-0 form-group col-span-7">
                    <label class="text-xl font-bold">Prometrics<span style="color:red">*</span>:</label>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-3">
                    <select required name="not_trainee_test_prometric_0" class="disabled:bg-slate-200 form-select">
                    </select>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="not_trainee_taken_prometric_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Taken" />
                   </div>
                </div>
                <div class="form-group col-span-2">
                    <div class="flex">
                        <div class="flex items-center mr-5">
                            <input required type="radio" value="1" id="not_trainee_passed_prometric_0" name="not_trainee_result_prometric_0" class="w-4 h-4 disabled:bg-slate-200 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                            <label for="inline-radio" class="ml-2 text-xl text-gray-900">Passed</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input required type="radio" value="0" id="not_trainee_failed_prometric_0" name="not_trainee_result_prometric_0" class="w-4 h-4 disabled:bg-slate-200 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                            <label for="inline-2-radio" class="ml-2 text-xl text-gray-900">Failed</label>
                        </div>
                    </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <button id="add_prometric_not_trainee" class="py-2 px-4  bg-sky-800 rounded w-full self-end text-sm text-white">Add Record</button>
                </div>
            </div>
            <div id="not_trainee_prometric_nav">

            </div>
            <div class="md:grid grid-cols-7 gap-4">
                <div class="mt-2 md:mt-0 form-group col-span-6">
                    <label class="text-xl font-bold">Japanese Language<span style="color:red">*</span>:</label>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-3">
                    <select required name="not_trainee_test_jpl_0" class="disabled:bg-slate-200 form-select">
                    </select>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative" data-te-datepicker-init data-te-inline="true" data-te-disable-future="true" data-te-format="mm/dd/yyyy" data-te-input-wrapper-init>
                        <input data-rule-validDate="true" name="not_trainee_taken_jpl_0" maxlength="10" autocomplete="off" type="text" required class=" form-control date_picker disabled:bg-slate-200" placeholder="Date Taken" />
                   </div>
                </div>
                <div class="form-group col-span-2">
                    <div class="flex">
                        <div class="flex items-center mr-5">
                            <input required type="radio" value="1" id="not_trainee_passed_language_0" name="not_trainee_result_jpl_0" class="w-4 h-4 disabled:bg-slate-200 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                            <label for="inline-radio" class="ml-2 text-xl text-gray-900">Passed</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input required type="radio" value="0" id="not_trainee_failed_language_0" name="not_trainee_result_jpl_0" class="w-4 h-4 disabled:bg-slate-200 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
                            <label for="inline-2-radio" class="ml-2 text-xl text-gray-900">Failed</label>
                        </div>
                    </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <button id="add_japlang_not_trainee" class="py-2 px-4 bg-sky-800 rounded w-full self-end text-sm text-white">Add Record</button>
                </div>

            </div>
            <div id="not_trainee_jpl_div">

            </div>
        </div>

        {{-- <div class="md:grid grid-cols-7 gap-4">
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
        </div> --}}
        <div class="self-end">
            <button id="certificateBtn_Prev" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800"><< Prev</button>
            <button id="certificateBtn_Next" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800">Next >></button>
        </div>

    </form>
</div>
