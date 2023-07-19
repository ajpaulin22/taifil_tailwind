
@section('title')
    Tai-Fil
@endsection
@extends('jp.layout.client')
@section('content')
<x-opening_spin/>
<nav class="py-2 px-1 md:px-10 md:py-5 bg-green-500 " aria-label="Breadcrumb">
  <div class="max-w-7xl text-center md:flex justify-between mx-auto px-10">
      <div class="text-sm md:text-2xl text-white">Tai-Fil Manpower Services Corp.</div>
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="/jp" class="text-white inline-flex items-center text-xs md:text-sm font-medium hover:text-blue-600">
        <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        ホーム
      </a>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-xs md:text-sm font-medium text-gray-500 md:ml-2">Tai-Fil Manpower Serivices</span>
      </div>
    </li>
  </ol>
  </div>
  
</nav>
<section class="mt-5 mb-5 ">
    <div class=" max-w-7xl md:mx-auto mx-5 p-2">
      <h1 class="text-4xl my-5">About Us <hr></h1>
      <div class="md:flex gap-5">
        <div class="my-5">
          <img src="/images/tf logo.png" alt="" class="h-1/2 mx-auto" >
        </div>
        <div class="md:text-xl my-5" >
          Tai-Fil Manpower Services Corporation is a land-based recruitment agency duly licensed by the Philippine Overseas Employment Administration (POEA) and Department of Labor and Employment (DOLE). The company was incorporated and established in the year 2000 to engage in the business of career placement of Filipino professionals, skilled and unskilled workers for overseas employment and to act as agents of individuals or firms in the supply of manpower
        </div>
      </div>
      <div class="md:grid grid-flow-col grid-cols-7 gap-5">
        <div class="col-span-5 overflow-scroll md:overflow-auto">
          <table class="table-auto border-collapse border border-slate-400 border-spacing-2 w-auto">
            <caption class="caption-top">
              
            </caption>
            <thead>
              <tr class="bg-green-500 text-white">
                <th class="border border-slate-300 py-2 px-6 w-1/4">Name</th>
                <th class="border border-slate-300 py-2 px-6 w-3/4">Tai-Fil Manpower Service Corporation</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-slate-100">
                <td class="border border-slate-300 py-2 px-6">Address in Manila</td>
                <td class="border border-slate-300 py-2 px-6">4C,D&E,N.T. Ctr, Alabang-Zapote, Tierra Nueva Village, Cupang, Muntinlupa City</td>
              </tr>
              <tr class="hover:bg-slate-100">
                <td class="border border-slate-300 py-2 px-6">Contact Number</td>
                <td class="border border-slate-300 py-2 px-6">02-8511-7381</td>
              </tr>
              <tr class="hover:bg-slate-100">
                <td class="border border-slate-300 py-2 px-6"></td>
                <td class="border border-slate-300 py-2 px-6">+63917-894-7358</td>
              </tr>
              <tr class="hover:bg-slate-100">
                <td class="border border-slate-300 py-2 px-6"></td>
                <td class="border border-slate-300 py-2 px-6">+63917-158-7381</td>
              </tr>
              <tr class="hover:bg-slate-100">
                <td class="border border-slate-300 py-2 px-6"></td>
                <td class="border border-slate-300 py-2 px-6">+63917-159-7381</td>
              </tr>
              <tr class="hover:bg-slate-100">
                <td class="border border-slate-300 py-2 px-6"></td>
                <td class="border border-slate-300 py-2 px-6">+63917-155-7381</td>
              </tr>
              <tr class="hover:bg-slate-100">
                <td class="border border-slate-300 py-2 px-6">E-mail Address</td>
                <td class="border border-slate-300 py-2 px-6">taifilmanpower.application.sc@gmail.com</td>
              </tr>
              <tr class="hover:bg-slate-100">
                <td class="border border-slate-300 py-2 px-6">Facebook</td>
                <td class="border border-slate-300 py-2 px-6">https://www.facebook.com/taifilmanpowerservicescorp/</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-span-2 md:my-0 my-5">
          <h1>NT Center Building</h1>
          <img src="{{url("/images/nt_center.jpg")}}" alt="">
        </div>
        

      </div>
      <div class="my-5 border border-green-500">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d965.9967223635309!2d121.0235601!3d14.4279191!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d1cfe9a2d6bd%3A0x1b23ce8f795da06a!2sN.T.%20center%20building!5e0!3m2!1sen!2sph!4v1687935393311!5m2!1sen!2sph" class="w-full h-5/6" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
      <div class="mt-10 text-slate-700">
        <h1 class="text-3xl font-light">HOW TO GO TO TAI-FIL MANPOWER SERVICES CORPORATION OFFICE</h1>
        <ul class="list-decimal py-5">
          <li class="py-5">
            Coming from EDSA (NORTH)
            <ul class="list-disc ml-10 ">
              <li class="py-2">
                By BUS – Ride a bus going to Alabang. Get off at StarMall Alabang or South Station. Ride a Jeep going to Zapote or South Mall. Get off in front of Metrobank Alabang-Zapote Branch. Our office is  located at N.T. Center Building beside Cherry Auto and the same building with Music 21 Alabang Branch.
              </li>
              <li class="py-2">
                By MRT – Get off at Taft Station. Ride a bus or Jeep going to Alabang. Get off at StarMall Alabang or South Station. Ride a Jeep going to Zapote or South Mall. Get off in front  of Metrobank Alabang-Zapote Branch. Our office is  located at N.T. Center Building beside Cherry Auto and the same building with Music 21 Alabang Branch
              </li>
            </ul>
         </li>
         <li class="py-5">
          Coming from Baclaran/Cavite
          <ul class="list-disc ml-10">
            <li class="py-2">
              By BUS or Jeep - Ride a bus going to Alabang. Get off at Honda Alabang. Walk across the pedestrian lane going to Metrobank Alabang-Zapote Branch. Our office is  located at N.T. Center Building beside Cherry Auto and the same building with Music 21 Alabang Branch

            </li>
          </ul>
       </li>
       <li class="py-5">
        Using Waze or Google Map – Pin Music 21 Alabang Branch or N.T. Center.
       </li>
        </ul>
      </div>
        
    </div>
</section>
<script>
   setTimeout(() => {
        $("#opening").hide();
    }, 1000);
</script>
@endsection