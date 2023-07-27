
<section id="post" class="mt-5 px-5">
    <div class="md:mx-auto mx-5 max-w-7xl min-h-screen">
        <div>
            <h1 data-aos="zoom-in" class="text-center text-4xl md:text-3xl my-9 font-semibold text-sky-800">投稿<hr class="border-b-2 border-green-500"></h1>
        </div>
        <div>
            @if(count($data) == 0)
            <h1 data-aos="fade-top" class="text-center text-4xl md:text-5xl my-9 font-semibold text-sky-800">No event posted...</h1>
            @else
            <h1 data-aos="fade-top" class="text-center text-4xl md:text-5xl my-9 font-semibold text-sky-800">最新記事</h1>
            @endif
        </div>
        <div class=" md:grid md:grid-col-3 gap-5 md:grid-flow-col text-white">
            @foreach($data as $d)
            {{-- <div data-aos="flip-down" class="bg-green-500 rounded-md overflow-hidden h-auto col-span-1 shadow-2xl mb-5 md:mb-0">
                <div class="overflow-hidden w-full h-56 md:h-1/2">
                    @if(count($d['images']) != 0)

                    <img src="data:image/png;base64,{{base64_encode($d['images'][0]['path'])}}" alt="" class="object-cover h-auto w-full hover:scale-150 transition-transform ease-in duration-300">
                    @else
                    <img src="{{url('images/default_item.png')}}" alt="" class="object-cover hover:scale-150 transition-transform ease-in duration-300">
                    @endif
                </div>
                <div class="p-5">
                    <div class="banner shadow-5xl">
                        <a href="{{'/client/gallery?cat='.$d['category']}}" class="py-1 px-4 bg-sky-800 rounded-full text-white hover:scale(200) hover:text-white hover:ring-2 hover:ring-white transition-all ease-in-out duration-300">{{$d['category']}}</a>
                    </div>
                    <div class="title my-5">
                        <h1 class="text-2xl font-semibold ">{{$d['title']}}</h1>
                        <hr class="text-sky-800">
                        @if($d['content'] != "<p><br></p>")
                        <div class="text-sm py-4 whitespace-pre-line h-24 overflow-hidden">
                            {!! html_entity_decode($d['content']) !!}
                        </div>   
                        @endif 
                    </div>
                    <a href="/client/gallery/post?id={{$d['id']}}" class="mt-4 hover:border hover:border-white hover:px-4 hover:py-2 hover:rounded transition-all ease-in duration-300"> Read more...</a>
                </div>
            </div> --}}
            <div data-aos="flip-down" class="group relative rounded-lg overflow-hidden bg-white  hover:shadow-2xl ">
                    
                <div class="h-52">
        
                  @if(count($d['images']) != 0)

                  <img src="data:image/png;base64,{{base64_encode($d['images'][0]['path'])}}" alt="" class="h-full w-full object-cover object-center">
                  @else
                  <img src="{{url('images/default_item.png')}}" alt="" class="h-full w-full object-cover object-center">
                  @endif
                </div>
                <div class="h-1/2 p-4 bg-green-500">
                  <div class="banner shadow-5xl my-5">
                      <a href="{{'/client/gallery?cat='.$d['category']}}" class="py-1 px-4 bg-sky-800 rounded-full text-white hover:scale(200) hover:text-white hover:ring-2 hover:ring-white transition-all ease-in-out duration-300">{{$d['category']}}</a>
                  </div>
                  <hr>
                  <h3 class="mb-2 text-xl font-semibold text-white">
                    <a href="/client/gallery/post?id={{$d['id']}}" class="hover:underline hover:text-blue-200">
                      {{$d['title']}}
                    </a>
                  </h3>
                  <p class="text-sm text-white">Read more details...</p>
                  <div class='flex flex-row justify-between text-xs mt-2'> 
                  <p>{{$d['date']}}</p><p>{{$d['time']}}</p>
                   </div>
                </div>
              </div>
            @endforeach


        </div>
    </div>
</section>