<footer class="mainfooter p-5 bg-sky-800 mt-auto" role="contentinfo">  
    <div class="max-w-7xl mx-auto">
        <div class="grid gap-4 md:grid-cols-3">
            <div class="grid">  
                <div class="footer-pad text-white">  
                  <h4 class="text-gray-200 text-lg md:text-2xl font-bold">Address</h4>  
                  <address class="text-gray-200"><i class="fa fa-map-marker"></i> 4C,D&amp;E,N.T. Ctr, Alabang-Zapote, Tierra Nueva Village, Cupang, Muntinlupa City</address> 
                </div>  
              </div>
              <div class="">  
                <div class="footer-pad text-white">  
                  <h4 class="text-gray-200 text-lg md:text-2xl font-bold">Contacts</h4>  
                  <ul class="list-unstyled">  
                    <li class="py-2 text-gray-200"><i class="fa fa-phone"></i> Phone:<a class="text-white cursor-default"> 02-8511-7381</a> </li> 
                    <hr>
                    <li class="py-2 text-gray-200"><i class="fa fa-envelope"></i> Email:<a href="mailto:taifilmanpower.application.sc@gmail.com" class="text-white text-xs"><br> taifilmanpower.application.sc@gmail.com</a> </li>  
                  </ul>  
                </div>  
              </div>
              {{-- <div class="col-md-3 col-sm-6">  
                <div class="footer-pad text-white">  
                  <h4 class="text-gray-200 text-lg md:text-2xl font-bold"> Partners</h4>  
                  <ul class="list-unstyled">  
                    <li class="py-2"> <a href="#" class="text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300"> Parks and Recreation </a> </li> 
                    <hr> 
                    <li class="py-2"> <a href="#" class="text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300"> Public Works </a> </li>
                    <hr> 
                    <li class="py-2"> <a href="#" class="text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300">Police Department</a> </li> 
                    <hr>  
                    <li class="py-2"> <a href="#" class="text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300"> Fire </a> </li>  
                    <hr> 
                    <li class="py-2"> <a href="#" class="text-gray-200 hover:text-green-500 transition-all ease-in-out duration-300"> Mayor and City Council </a> </li>  
                  </ul>  
                </div>  
              </div> --}}


                  <!-- Messenger Chat Plugin Code -->
              <div id="fb-root"></div>

              <!-- Your Chat Plugin code -->
              <div id="fb-customer-chat" class="fb-customerchat">
              </div>
              <div class="col-md-3">  
                <h4 class="text-gray-200 text-lg md:text-2xl font-bold"> Follow Us </h4>  
                <ul class="list-group grid grid-cols-3 gap-5">
                  <li class="list-group-item mt-2 col-span-1 text-center ">
                    <a href="https://www.facebook.com/taifilmanpowerservicescorp/" class="w-14 bg-white block p-4 rounded-lg text-center ">
                      <svg class="h-5 w-6 text-blue-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" /></svg>
                    </a>
                  </li>

                </ul>                 
            </div>
        </div>
    </div>
    <div>
        <p class="text-center my-4 text-gray-400"> © Copyright 2023 - Tai-Fil Manpower Services Corp.  All rights reserved. </p>
    </div>
</footer>
<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "356049177768418");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v17.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>