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
                <input name="name_elem" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_elem" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_from_elem" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_elem" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-7">
                <label class="text-xl font-bold">High School<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_highschool" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_highschool" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_from_highschool" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_highschool" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                </div>
            </div>

                <div class="mt-2 md:mt-0 form-group col-span-6">
                    <label class="text-xl font-bold">Vocational<span style="color:red">*</span>:</label>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <button id="add_vocational_btn" class="py-2 px-4 bg-green-400 rounded w-full self-end text-sm text-white">Add Record</button>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-3">
                    <input name="name_vocational_0" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-2">
                    <input name="add_vocational_0" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative max-w-sm">
                        <x-picker_logo/>
                        <input datepicker name="date_from_vocational_0" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
                    </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative max-w-sm">
                        <x-picker_logo/>
                        <input datepicker name="date_until_vocational_0" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                    </div>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-4">
                    <input name="course_vocational_0" autocomplete="off" type="text" class="form-control" placeholder="Course/Major" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-2">
                    <input name="certificate_vocational_0" autocomplete="off" type="text" class="form-control" placeholder="Certificate Holder" required>
                </div>
                <div class="mt-2 md:mt-0 form-group col-span-1">
                    <div class="relative max-w-sm">
                        <x-picker_logo/>
                        <input datepicker name="date_until_cert_vocational_0" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                    </div>
                </div>
             <div id="vocational" class="col-span-7">

            </div>   
            @if($biodata != "SSW")
            <div class="mt-2 md:mt-0 form-group col-span-7">
                <label class="text-xl font-bold">Japanese Language<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_jpl" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_jpl" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_from_jpl" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_jpl" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-5">
                <input name="certificate_jpl" autocomplete="off" type="text" class="form-control" placeholder="Certificate Holder" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_cert_jpl" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                </div>
            </div>
            
            @endif
            <div class="mt-2 md:mt-0 form-group col-span-7">
                <label class="text-xl font-bold">College<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_college" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_college" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_from_college" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_college" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-4">
                <input name="course_college" autocomplete="off" type="text" class="form-control" placeholder="Course/Major" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="certificate_college" autocomplete="off" type="text" class="form-control" placeholder="Certificate Holder" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_cert_college" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                </div>
            </div>
        </div>
        <div class="self-end">
            <button id="educationalBtn_Prev" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800"><< Prev</button>
            <button id="educationalBtn_Next" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white hover:bg-green-800">Next >></button>
        </div>
        
    </form>
</div>