@auth
       <div class="bg-slate-300 flex p-4 items-end justify-end">
            @admin
            <div class="py-2 px-4 rounded text-sm bg-green-500 ">
                <a href="/admin" class="">Manage Site</a>
            </div>
            @endadmin
            <div class=" relative self-center group mx-2">
                <button class=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-8 h-8 self-center">
                    <path class="group-hover:border-2" strokeLinecap="round" strokeLinejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </button>
                  <ul class="absolute z-20 w-48 bg-white right-0 rounded-lg overflow-hidden hidden group-hover:block shadow-lg before:absolute before:top-full before:left-1/2 before:border-solid before:border-2 before:before-green-500">
                    <li class="text-lg font-semibold p-5">Hello {{Auth::user()->username}}</li>
                    <hr>
                    <li class="mt-5 hover:bg-green-400 py-2 px-5 hover:text-white"><a href="/logout">Log out</a></li>
                    
                  </ul>
            </div>
       </div>
@endauth