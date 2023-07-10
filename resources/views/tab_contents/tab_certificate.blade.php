<div class="">
    <form action="" id="certificate_form" class="flex flex-col">
        <div class="md:grid grid-cols-7 gap-4">
            <div class="mt-2 md:mt-0 form-group col-span-6">
                <label class="text-xl font-bold">Prometrics<span style="color:red">*</span>:</label>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <button id="add_prometric" class="py-2 px-4 bg-green-400 rounded w-full self-end text-sm text-white">Add Record</button>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-3">
                <input name="name_prometric_0" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_prometric_0" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_from_prometric_0" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_prometric_0" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-5">
                <input name="certificate_prometric_0" autocomplete="off" type="text" class="form-control" placeholder="Certificate Holder" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_cert_prometric_0" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
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
                <input name="name_jpl_0" autocomplete="off" type="text" class="form-control" placeholder="Name of School" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <input name="add_jpl_0" autocomplete="off" type="text" class="form-control" placeholder="School Address" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_from_jpl_0" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date From" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-1">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_jpl_0" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
                </div>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-5">
                <input name="certificate_jpl_0" autocomplete="off" type="text" class="form-control" placeholder="Certificate Holder" required>
            </div>
            <div class="mt-2 md:mt-0 form-group col-span-2">
                <div class="relative max-w-sm">
                    <x-picker_logo/>
                    <input datepicker name="date_until_cert_jpl_0" autocomplete="off" value="" type="text" class="date_picker" placeholder="Date Until" required>
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