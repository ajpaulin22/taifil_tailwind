<div class="w-full max-w-sm p-4 bg-white border border-sky-200 rounded-lg shadow sm:p-8 col-span-1 my-5 md:my-0">
    <h5 class="mb-4 text-xl font-medium text-green-500 uppercase">{{$job}}</h5>
    <div class="flex items-baseline text-gray-900 dark:text-white">
        <span class="text-3xl font-semibold">Qualifications</span>
    </div>
    <!-- List -->
    @php
        $datas = explode(",",$require);
    @endphp
    <ul role="list" class="space-y-5 my-7">
        @foreach($datas as $data)
        <li class="flex space-x-3">
            <!-- Icon -->
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-sky-600 dark:text-sky-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{$data}}</span>
        </li>
        @endforeach
    </ul>
    <a href="/client/Biodata?data={{$category}}&type=new" class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Apply now</a>
</div>