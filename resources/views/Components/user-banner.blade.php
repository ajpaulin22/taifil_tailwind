@admin
       <div class="bg-slate-300 flex p-4 items-end justify-end md:hidden">
            @admin
            <div class=" ">
                {{-- <a href="/admin" class="">サイトを管理する</a> --}}
                Hello {{Auth::user()->username}}
            </div>
            @endadmin
            <div class=" relative self-center group mx-2 transition-all ease-in-out duration-500">
                <button class="">
                  <i class="fa-solid fa-user-gear fa-bounce fa-xl"></i>
                </button>
                  <ul class="absolute z-20 w-48 bg-white right-0 rounded-lg overflow-hidden hidden group-hover:block shadow-lg before:absolute before:top-full before:left-1/2 before:border-solid before:border-2 before:before-green-500">
                    <li class="text-lg font-semibold p-5">Options</li>
                    <hr>
                    <li class=" hover:bg-green-400 hover:text-white">
                      <a href="/admin" class="block py-2 px-5">Manage Site</a>
                    </li>
                    <hr>
                    <li class="hover:bg-green-400 hover:text-white"><a href="/logout" class="block py-2 px-5">Log Out</a></li>
                  </ul>
            </div>
       </div>
@endadmin