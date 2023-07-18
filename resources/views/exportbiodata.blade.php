<!DOCTYPE html>
<html>
<head>
    <link href="css/admin/ManagementRegistration.css" rel="stylesheet">
    <title>Biodata-{{$data->last_name}}, {{$data->first_name}}</title>
</head>
<style>
</style>
<body style="background-color:white;">
    <div class="row col-sm-12">
        <div class="row col-sm-12">
            <h1 style="margin-left:250px;">BIODATA</h1>
        </div>
        <div>
            <img src="storage/1x1_pictures/lisa.jpg" alt="Italian Trulli" style="width:96px;height:96px; float:right">
        </div>
        <div>
            <h3>Job Type: {{ $data->job_type }}</h3>
            <h3>Job Categories: {{$data->Category}}</h3>
            <h3>Job Operations: {{$data->Operation}} </h3>
        </div>
        <hr>
        <h1 class="row">Personal Data</h1>
        <div class="row">
            <div style="float:left; width:12%;">
                <h5>First Name: </h5>
            </div>
            <div style="float:left; width:23%; border-bottom: 1px solid black;">
                <label>{{$data->last_name}}</label>
            </div>
            <div style="float:left; width:23%; border-bottom: 1px solid black;">
                <label>{{$data->first_name}}</label>
            </div>
            <div style="float:left; width:18%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->middle_name}}</label>
            </div>
            <div style="float:left; width:11%">
                <h5>Nickname:</h5>
            </div>
            <div style="float:left; width:11%; border-bottom: 1px solid black;">
                <label>{{ $data->nickname }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float:left; width:20%; margin-left:89px;">
                <label>(last name)</label>
            </div>
            <div style="float:left; width:20%;">
                <label>(first name)</label>
            </div>
            <div style="float:left; width:15%;">
                <label>(middle name)</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float:left; width:17%;">
                <h5>Present Address:</h5>
            </div>
            <div style="float:left; width:82.5%; border-bottom: 1px solid black;">
                <label>{{ $data->address}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float:left; width:20%;">
                <h5>Permanent Address:</h5>
            </div>
            <div style="float:left; width:79.5%; border-bottom: 1px solid black;">
                <label>{{ $data->address}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float:left; width:14%;">
                <h5>Date of Birth:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ date('m/d/Y', strtotime($data->date_birth))}}</label>
            </div>
            <div style="float: left; width:14%;">
                <h5>Place of Birth:</h5>
            </div>
            <div style="float: left; width:22%; border-bottom: 1px solid black; margin-right:10px;" >
                <label>{{ $data->place_birth}}</label>
            </div>
            <div style="float: left; width:9%;">
                <h5>Gender:</h5>
            </div>
            <div style="float: left; width:1%; border-bottom: 1px solid black; margin-right:10px;" >
                <label>{{ $data->gender}}</label>
            </div>
            <div style="float: left; width:12%;">
                <h5>Citizenship:</h5>
            </div>
            <div style="float: left; width:15%; border-bottom: 1px solid black; margin-right:10px;" >
                <label>{{ $data->citizenship}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:6%">
                <h5>Age:</h5>
            </div>
            <div style="float: left; width:2%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->age}}</label>
            </div>
            <div style="float: left; width:12.5%">
                <h5>Blood Type:</h5>
            </div>
            <div style="float: left; width:3%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->bloodtype}}</label>
            </div>
            <div style="float: left; width:12.5%">
                <h5>Civil Status:</h5>
            </div>
            <div style="float: left; width:7%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->civil_status}}</label>
            </div>
            <div style="float: left; width:17.5%">
                <h5>Contact Number:</h5>
            </div>
            <div style="float: left; width:11%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->contact}}</label>
            </div>
            <div style="float: left; width:9%">
                <h5>Height:</h5>
            </div>
            <div style="float: left; width:6%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->height}}&nbsp;cm</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:10%">
                <h5>Religion:</h5>
            </div>
            <div style="float: left; width:15%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->religion}}</label>
            </div>
            <div style="float: left; width:19%">
                <h5>Facebook Account:</h5>
            </div>
            <div style="float: left; width:15%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->facebook}}</label>
            </div>
            <div style="float: left; width:10.5%">
                <h5>Smoking:</h5>
            </div>
            <div style="float: left; width:3%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->smoking == 1 ? "Yes" : "No"}}</label>
            </div>
            <div style="float: left; width:9.5%">
                <h5>Weight:</h5>
            </div>
            <div style="float: left; width:6%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->weight }}&nbsp;kg</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:20%">
                <h5>Japanese Language:</h5>
            </div>
            <div style="float: left; width:38%; border-bottom: 1px solid black; margin-right:10px;">
                <label>Read: {{ $data->jap_reading == 1 ? "Yes" : "No" }}&nbsp;&nbsp;&nbsp; Write: {{ $data->jap_writing == 1 ? "Yes" : "No" }}&nbsp;&nbsp;&nbsp; Speak: {{ $data->jap_speaking == 1 ? "Yes" : "No" }}&nbsp;&nbsp;&nbsp; Listen: {{ $data->jap_listening == 1 ? "Yes" : "No" }}</label>
            </div>
            <div style="float: left; width:18%">
                <h5>Other Language:</h5>
            </div>
            <div style="float: left; width:20%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->other_lang == null ? "N/A" : $data->other_lang }}</label>
            </div>
            {{-- <div style="float: left; width:10%">
                <h5>Shoe Size:</h5>
            </div>
            <div style="float: left; width:10%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->shoe_size}}</label>
            </div> --}}
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:10%">
                <h5>Shoe Size:</h5>
            </div>
            <div style="float: left; width:10%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->shoe_size}}</label>
            </div>
            <div style="float: left; width:50%">
                <h5>Japanese Language:</h5>
                <label> Reading: {{ $data->jap_reading == 1 ? "Yes" : "No" }}&nbsp;&nbsp;&nbsp; Writing: {{ $data->jap_writing == 1 ? "Yes" : "No" }}&nbsp;&nbsp;&nbsp; Speaking: {{ $data->jap_speaking == 1 ? "Yes" : "No" }}&nbsp;&nbsp;&nbsp; Listening: {{ $data->jap_listening == 1 ? "Yes" : "No" }}</label>
            </div>
            <div style="float: left; width:25%">
                <h5>Smoking:</h5>
                <label>{{ $data->smoking == 1 ? "Yes" : "No"}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h5>Shoe Size:</h5>
                <label>{{ $data->shoe_size }}</label>
            </div>
            <div style="float: left; width:25%">
                <h5>Hobbies:</h5>
                <label> {{ $data->hobbies }}</label>
            </div>
            <div style="float: left; width:50%">
                <h5>Person to notify in case of emergency:</h5>
                <label>{{ $data->person_to_notify }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h5>Relation:</h5>
                <label>{{ $data->person_relation }}</label>
            </div>
            <div style="float: left; width:50%">
                <h5>Address:</h5>
                <label> {{ $data->person_address }}</label>
            </div>
            <div style="float: left; width:25%">
                <h5>Contact No:</h5>
                <label>{{ $data->person_contact }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h5>Passport No:</h5>
                <label>{{ $data->passport_no }}</label>
            </div>
            <div style="float: left; width:25%">
                <h5>Issue Date:</h5>
                <label> {{ $data->issue_date }}</label>
            </div>
            <div style="float: left; width:25%">
                <h5>Expiry Date:</h5>
                <label>{{ $data->expiry_date }}</label>
            </div>
            <div style="float: left; width:25%">
                <h5>Issue Place:</h5>
                <label>{{ $data->issue_place }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h5>Have Food Allergies:</h5>
                <label>{{ $data->food_alergy == null ? "None" : $data->food_alergy }}</label>
            </div>
            <div style="float: left; width:50%">
                <h5>Have Tattoo:</h5>
                <label> {{ $data->tattoo == 1 ? "Yes" : "No" }}</label>
            </div>
            <div style="float: left; width:25%">
                <h5>Have Driver's License:</h5>
                <label>{{ $data->drivers_licensed == 1 ? "Yes" : "No" }}</label>
            </div>
        </div>
    </div>
</body>
</html>