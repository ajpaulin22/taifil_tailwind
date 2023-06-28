<div class="">
    <div class="block my-3 md:hidden text-center border-b border-green-600">
        <label class="text-xl  font-bold pb-4">Upload ID</label>
    </div>
    <form action="" method="POST" id="upload_form" class="flex flex-col" enctype="multipart/form-data"> 
           @csrf
        <div class="md:grid grid-cols-9 gap-4" >
              <div class="form-group col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">1x1 Picture</label>
                <input name="picture" data-max-size="2048" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file" accept=".png,.jpeg,.jpg" required>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">Compatible file type: PNG, JPG.</p>
              </div>

              <div class="form-group col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Government ID Picture</label>
                <input name="gov_id" data-max-size="2048" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file" accept=".png,.jpeg,.jpg" required>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">Compatible file type: PNG, JPG.</p>
              </div>

              <div class="form-group col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Passport ID Picture</label>
                <input name="passport_id" data-max-size="2048" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" type="file" accept=".png,.jpeg,.jpg" required>
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="file_input_help">Compatible file type: PNG, JPG.</p>
              </div>
        </div>



        <div class="self-end">
            <button id="uploadBtn_Prev" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white"><< Prev</button>
            <button id="send" class="py-2 px-4 bg-green-600 rounded mt-5 self-end text-sm text-white">SEND</button>
        </div>

    </form>
</div>