
@section('title')
    Job Category
@endsection
@extends('layout.client')
@section('content')
<nav class="py-2 px-1 md:px-10 md:py-5 bg-green-500 " aria-label="Breadcrumb">
    <div class="max-w-7xl text-center md:flex justify-between mx-auto px-10">
        <div class="text-sm md:text-2xl text-white">Job Category</div>
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
      <li class="inline-flex items-center">
        <a href="/" class="text-white inline-flex items-center text-xs md:text-sm font-medium hover:text-blue-600">
          <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          Home
        </a>
      </li>
      <li aria-current="page">
        <div class="flex items-center ">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400 text-xs md:text-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 md:text-sm font-medium text-white md:ml-2 text-xs">{{$id}}</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-xs md:text-sm font-medium text-gray-500 md:ml-2">Job Category</span>
        </div>
      </li>
    </ol>
    </div>
    
</nav>
    <section class="md:grid grid-cols-7 gap-4 mx-2 md:mx-auto max-w-7xl my-5">
        <div class="hidden col-span-1 md:block">
            yeahhh
        </div>
        <div class="md:grid grid-cols-3 gap-5 col-span-6">

            @if($id == 'TITP')
            <x-card_job require="MALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="welder" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="building cleaner" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="kitchen staff" category="{{$id}}"/>
            <x-card_job require="FEMALE,23-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,With JLPT N4 or NAT 4Q is an advantage,With NCII Caregiving is an advantage,Willing to undergo Japanese Language Training,Not an ex-trainee" job="careworker" category="{{$id}}"/>
            <x-card_job require="FEMALE/ MALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="print wiring board" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="inspector" category="{{$id}}"/>
            <x-card_job require="MALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="construction" category="{{$id}}"/>
            <x-card_job require="MALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="finishing" category="{{$id}}"/>
            <x-card_job require="MALE,18-35 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="machinist" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="electric equipment assembling" category="{{$id}}"/>
            <x-card_job require="MALE,18-33 years old,With welding experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="seafood processing" category="{{$id}}"/>
            <x-card_job require="FEMALE,18-35 years old,With or Without experience,No Tattoos,At least High School graduate or Senior High School graduate,Physically and Mentally fit,Willing to undergo Japanese Language Training,Not an ex-trainee" job="Painting" category="{{$id}}"/>
            @endif

            @if ($id == "SSW")
            <x-card_job require="FEMALE/ MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply,Physically and Mentally fit,With Prometric Test (Nursing Care Skills Test and Nursing Care Japanese Language Evaluation Test),With JLPT N4 or JFT " job="careworker" category="{{$id}}"/>
            <x-card_job require="FEMALE/ MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply with the same category,Physically and Mentally fit,With Prometric Test (Food Service Industry),With JLPT N4 or JFT " job="kitchen staff" category="{{$id}}"/>
            <x-card_job require="MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply with the same category,Physically and Mentally fit,With Prometric Test (Manufacture of Food and Beverages Test),With JLPT N4 or JFT" job="meat processing" category="{{$id}}"/>
            <x-card_job require="MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply with the same category,Physically and Mentally fit,With Prometric Test,With JLPT N4 or JFT" job="print wiring board manufacturing" category="{{$id}}"/>
            @endif

            @if ($id == "Direct")
            <x-card_job require="FEMALE/ MALE,20-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply,Physically and Mentally fit,With JLPT N2 or N1" job="translator" category="{{$id}}"/>
            <x-card_job require="FEMALE,22-35 years old,No Tattoos,At least High School graduate or Senior High School graduate,Ex-Trainees (TITP) are welcome to apply,Physically and Mentally fit,With NCII Domestic Work is an advantage,With JLPT N4 or NAT 4Q is an advantage,Willing to undergo Japanese Language Training" job="" category="{{$id}}"/>
            @endif
        </div>
    </section>
@endsection     