<section class="mt-10">
    <div data-aos="flip-down" class="min-h-screen max-w-7xl md:mx-auto mx-5">
        <div>
            <h1 class="text-center text-4xl md:text-5xl mt-9 font-bold bg-green-500 p-5 rounded-t-lg text-white">Departures 2023</h1>  
        </div>
        <div class="swiper departure w-auto h-56 bg-gradient-to-r from-green-500 via-sky-200 to-green-200 border-y-gray-500 border-y-2">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper ">
              <!-- Slides -->
              @foreach($departure as $key => $data)
              <x-calendar_card month="{{$key}}" count="{{$data}}" />
              @endforeach
             
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination departure-pagi"></div>
        </div>

        @php
         $year = date("Y");   
        @endphp
        <div data-aos="flip-up" class="total my-5">
            <div class="">
                <h1 class="text-center text-4xl md:text-5xl mt-9 font-bold bg-green-500 p-5 rounded-t-lg text-white">Total Departures</h1>  
            </div>
            <div class="md:grid grid-cols-3 gap-5 w-auto md:h-56 bg-gradient-to-r from-green-500 via-sky-200 to-green-200 border-y-gray-500 border-y-2">
                
                <div id="jan" class="bg-white text-center rounded-xl shadow-lg border-green-900 border overflow-hidden m-7 col-span-1">
                    <div class="title text-white text-lg bg-green-500 py-2 px-7">
                        {{$year-1}}
                    </div>
                    <div class="text-sky-700 text-7xl font-mono font-bold py-5 px-20">
                        16
                        <hr class="border-sky-800 border-2">
                    </div>
                </div>
                <div id="jan" class="bg-white text-center rounded-xl shadow-lg border-green-900 border overflow-hidden m-7 col-span-1">
                    <div class="title text-white text-lg bg-green-500 py-2 px-7">
                        {{$year}}
                    </div>
                    <div class="text-sky-700 text-7xl font-mono font-bold py-5 px-20">
                        0
                        <hr class="border-sky-800 border-2">
                    </div>
                </div>
                <div id="jan" class="bg-white text-center rounded-xl shadow-lg border-green-900 border overflow-hidden m-7 col-span-1">
                    <div class="title text-white text-lg bg-green-500 py-2 px-7">
                        {{$year+1}}
                    </div>
                    <div class="text-sky-700 text-7xl font-mono font-bold py-5 px-20">
                        0
                        <hr class="border-sky-800 border-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</section>