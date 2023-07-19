<section id="inquiry" class="mt-5 scroll-mt-20">
    
    <div class="min-h-screen max-w-7xl md:mx-auto mx-5">
        <div data-aos="zoom-in">
            <h1 class="text-center text-4xl md:text-7xl my-9 font-semibold text-sky-800">お問い合わせ<hr class="border-b-2 border-green-500"></h1>  
        </div>
        <div data-aos="zoom-in-up" class="md:grid grid-cols-3 mx-5 gap-5 p-5 border-2 border-green-600 rounded shadow-lg">
            <div class="col-span-2">
                <p class="text-sm">気軽にお問い合わせください。</p>
                <form action="" id="contact-form">
                    @csrf
                    <div class="md:flex gap-5">
                        <div class="py-2 w-full form-group">
                            <label for="fullname">フルネーム</label>
                            <input type="text" autocomplete="off" name="fullname" id="" class="border-2 w-full border-sky-800 rounded p-2" required>
                        </div>
                        <div class="py-2 w-full form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="" class="border-2 w-full border-sky-800 rounded p-2" required>
                        </div>
                    </div>
                    <div class="py-2 form-group">
                        <label for="subject">件名</label>
                        <input type="text" autocomplete="off" name="subject" id="" class="border-2 w-full border-sky-800 rounded p-2" required>
                    </div>
                    <div class="py-2 grid w-full form-group">
                        <div>
                            <label for="message">本文</label>
                        </div>
                        <div>
                            <textarea name="message" autocomplete="off" id="" cols="102" rows="10" class="resize-none border-2 border-sky-800 p-2 rounded w-full" required></textarea>
                        </div>
                    </div>
                    <button class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-auto text-center">送信</button>
                </form>
            </div>
            <div class="col-span-1 mt-5 md:mt-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d965.9967223635309!2d121.0235601!3d14.4279191!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d1cfe9a2d6bd%3A0x1b23ce8f795da06a!2sN.T.%20center%20building!5e0!3m2!1sen!2sph!4v1687935393311!5m2!1sen!2sph" class="w-full h-5/6" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <a href="/jp/client/contact-us-location" class="block bg-5 p-5 text-center hover:text-green-600">アクセス方法</a>
            </div>
        </div>

        <div>
            <h1 class="text-center text-4xl md:text-3xl my-9 font-semibold text-sky-800">お問い合わせ情報</h1> 
        </div>
        <div data-aos="zoom-out" class="md:grid md:grid-flow-col md:grid-cols-3 gap-5 my-5">
            <div class="flex flex-col items-center justify-center p-5  border-2 border-green-500 rounded shadow-xl">
                <div class="">
                    <img src="{{url("images/icon/01.png")}}" alt="" class="bg-green-400 p-5 rounded-full border-2 border-sky-800">
                </div>
                <div class="text-center">
                    <h1 class="text-xl font-bold">所在地</h1>
                    <a href="https://www.google.com/maps/place/N.T.+center+building/@14.4279191,121.0235601,19z/data=!4m6!3m5!1s0x3397d1cfe9a2d6bd:0x1b23ce8f795da06a!8m2!3d14.4277918!4d121.0233397!16s%2Fg%2F11g6_5qx8_?entry=ttu" class="hover:text-green-600">4C,D&E,N.T. Ctr, Alabang-Zapote,</a>
                </div>
            </div>
            <div data-aos="zoom-out" class="flex flex-col items-center justify-center p-5 border-2 border-green-500 rounded shadow-xl my-5 md:my-0">
                <div class="">
                    <img src="{{url("images/icon/02.png")}}" alt="" class="bg-green-400 p-5 rounded-full border-2 border-sky-800">
                </div>
                <div class="text-center">
                    <h1 class="text-xl font-bold">お問い合わせ番号</h1>
                    <a href="tel:+02-8511-7381" class="hover:text-green-600 block">02-8511-7381</a>
                    <a href="tel:+63917-894-7358" class="hover:text-green-600 block">+63917-894-7358</a>
                    <a href="tel:+63917-158-7381" class="hover:text-green-600 block">+63917-158-7381</a>
                    <a href="tel:+63917-159-7381" class="hover:text-green-600 block">+63917-159-7381</a>
                    <a href="tel:+63917-155-7381" class="hover:text-green-600 block">+63917-155-7381</a>
                </div>
            </div>
            <div data-aos="zoom-out" class="flex flex-col items-center justify-center p-5 border-2 border-green-500 rounded shadow-xl">
                <div class="">
                    <img src="{{url("images/icon/03.png")}}" alt="" class="bg-green-400 p-5 rounded-full border-2 border-sky-800">
                </div>
                <div class="text-center">
                    <h1 class="text-xl font-bold">E-mailを送る</h1>
                    <a href="mailto:taifilmanpower.application.sc@gmail.com" class="hover:text-green-600 text-xs md:text-base">taifilmanpower.application.sc@gmail.com</a>
                </div>
            </div>
        </div>
    </div>
</section>