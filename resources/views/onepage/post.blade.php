
<section id="post" class="mt-5 px-5">
    <div class="md:mx-auto mx-5 max-w-7xl min-h-screen">
        <div>
            <h1 class="text-center text-4xl md:text-3xl my-9 font-semibold text-sky-800">POST<hr class="border-b-2 border-green-500"></h1>
        </div>
        <div>
            @if(count($data) == 0)
            <h1 class="text-center text-4xl md:text-5xl my-9 font-semibold text-sky-800">No event posted...</h1>
            @else
            <h1 class="text-center text-4xl md:text-5xl my-9 font-semibold text-sky-800">Latest event posted...</h1>
            @endif
        </div>
        <div class=" md:grid md:grid-col-3 gap-5 md:grid-flow-col text-white">
            @foreach($data as $d)
            <div class="bg-green-500 rounded-md overflow-hidden h-2/3 col-span-1 shadow-2xl mb-5 md:mb-0">
                <div class="overflow-hidden w-full h-56 md:h-1/2">
                    @if(count($d['images']) != 0)
                    
                    <img src="{{url('storage/'.$d['images'][0]['path'])}}" alt="" class="object-cover h-auto w-auto objec hover:scale-150 transition-transform ease-in duration-300">
                    @else
                    <img src="{{url('images/default_item.png')}}" alt="" class="object-cover hover:scale-150 transition-transform ease-in duration-300">
                    @endif
                </div>
                <div class="p-5">
                    <div class="banner shadow-5xl">
                        <a href="{{'/client/gallery?cat='.$d['category']}}" class="py-1 px-4 bg-sky-800 rounded-full text-white hover:scale(200) hover:text-white hover:ring-2 hover:ring-white ">{{$data[0]['category']}}</a>
                    </div>
                    <div class="title my-5">
                        <h1 class="text-2xl font-semibold ">{{$d['title']}}</h1>
                        <hr class="text-sky-800">
                        <p class="text-sm py-4 whitespace-pre-line h-24 overflow-hidden">{{$d['content']}}</p>
                    </div>
                    <a href="/client/gallery/post?id={{$d['id']}}" class="mt-4 hover:text-white"> Read more...</a>
                </div>
            </div>
            @endforeach
            {{-- <div class="bg-green-500 rounded-md overflow-hidden h-2/3 col-span-1 shadow-2xl mb-5 md:mb-0">
                <div class="overflow-hidden h-56 md:h-1/2">
                    @if(count($data[0]['images']) != 0)
                    
                    <img src="{{url('storage/'.$data[0]['images'][0]['path'])}}" alt="" class="object-cover hover:scale-150 transition-transform ease-in duration-300">
                    @else
                    <img src="{{url('images/default_item.png')}}" alt="" class="object-cover hover:scale-150 transition-transform ease-in duration-300">
                    @endif
                </div>
                <div class="p-5">
                    <div class="banner shadow-5xl">
                        <a href="{{'/client/gallery?cat='.$data[0]['category']}}" class="py-1 px-4 bg-sky-400 rounded-full text-slate-700 hover:scale(200) hover:text-white hover:ring-2 hover:ring-sky-800 ">{{$data[0]['category']}}</a>
                    </div>
                    <div class="title my-5">
                        <h1 class="text-2xl font-semibold ">{{$data[0]['title']}}</h1>
                        <hr class="text-sky-800">
                        <p class="text-sm py-4 whitespace-pre-line h-24 overflow-hidden">{{$data[0]['content']}}</p>
                    </div>
                    <a href="/client/gallery/post?id={{$data[0]['id']}}" class="mt-4 hover:text-white"> Read more...</a>
                </div>
            </div>
            <div class="bg-green-500 rounded-md overflow-hidden h-2/3 col-span-1 shadow-2xl mb-5 md:mb-0">
                <div class="overflow-hidden h-56 md:h-1/2">
                    @if(count($data[1]['images']) != 0)
                    <img src="{{url('storage/'.$data[1]['images'][0]['path'])}}" alt="" class="object-cover hover:scale-150 transition-transform ease-in duration-300">
                    @else
                    <img src="{{url('images/default_item.png')}}" alt="" class="object-cover hover:scale-150 transition-transform ease-in duration-300">
                    @endif
                </div>
                <div class="p-5">
                    <div class="banner shadow-5xl">
                        <a href="{{'/client/gallery?cat='.$data[1]['category']}}" class="py-1 px-4 bg-sky-400 rounded-full text-slate-700 hover:scale(200) hover:text-white hover:ring-2 hover:ring-sky-800 ">{{$data[1]['category']}}</a>
                    </div>
                    <div class="title my-5">
                        <h1 class="text-2xl font-semibold ">{{$data[1]['title']}}</h1>
                        <hr class="text-sky-800">
                        <p class="text-sm py-4 whitespace-pre-line h-24 overflow-hidden">{{$data[1]['content']}}</p>
                    </div>
                    <a href="/client/gallery/post?id={{$data[1]['id']}}" class="mt-4 hover:text-white"> Read more...</a>
                </div>
            </div>
            <div class="bg-green-500 rounded-md overflow-hidden h-2/3 col-span-1 shadow-2xl mb-5 md:mb-0">
                <div class="overflow-hidden h-56 md:h-1/2">
                    @if(count($data[2]['images']) != 0)
                    <img src="{{url('storage/'.$data[2]['images'][0]['path'])}}" alt="" class="object-cover hover:scale-150 transition-transform ease-in duration-300">
                    @else
                    <img src="{{url('images/default_item.png')}}" alt="" class="object-cover hover:scale-150 transition-transform ease-in duration-300">
                    @endif
                </div>
                <div class="p-5">
                    <div class="banner shadow-5xl">
                        <a href="{{'/client/gallery?cat='.$data[2]['category']}}" class="py-1 px-4 bg-sky-400 rounded-full text-slate-700 hover:scale(200) hover:text-white hover:ring-2 hover:ring-sky-800 ">{{$data[2]['category']}}</a>
                    </div>
                    <div class="title my-5">
                        <h1 class="text-2xl font-semibold ">{{$data[2]['title']}}</h1>
                        <hr class="text-sky-800">
                        <p class="text-sm py-4 whitespace-pre-line h-24 overflow-hidden">{{$data[2]['content']}}</p>
                    </div>
                    <a href="/client/gallery/post?id={{$data[2]['id']}}" class="mt-4 hover:text-white"> Read more...</a>
                </div>
            </div> --}}

        </div>
    </div>
</section>