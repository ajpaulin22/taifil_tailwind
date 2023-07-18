<!DOCTYPE html>
<html>
<head>
    <link href="css/admin/ManagementRegistration.css" rel="stylesheet">
    <title>Hi</title>
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
        <h1 class="row">Personal Information</h1>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Last Name:</h4>
                <label>{{ $data->last_name }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>First Name:</h4>
                <label>{{ $data->first_name }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Middle Name:</h4>
                <label>{{ $data->middle_name }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Nickname:</h4>
                <label>{{ $data->nickname }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Address:</h4>
                <label>{{ $data->address}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Date of Birth:</h4>
                <label>{{ date('F d, Y', strtotime($data->date_birth))}}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Place of Birth:</h4>
                <label>{{ $data->place_birth}}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Gender:</h4>
                <label>{{ $data->gender == "M" ? "Male" : "Female"}}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Citizenship:</h4>
                <label>{{ $data->citizenship}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Age:</h4>
                <label>{{ $data->age}}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Blood Type:</h4>
                <label>{{ $data->bloodtype}}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Civil Status:</h4>
                <label>{{ $data->civil_status}}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Contact No:</h4>
                <label>{{ $data->contact}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Height:</h4>
                <label>{{ $data->height}}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Religion:</h4>
                <label>{{ $data->religion}}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Facebook Account:</h4>
                <label>{{ $data->facebook}}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Smoking:</h4>
                <label>{{ $data->smoking == 1 ? "Yes" : "No"}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Weight:</h4>
                <label>{{ $data->height}}</label>
            </div>
            <div style="float: left; width:50%">
                <h4>Japanese Language:</h4>
                <label> Reading: {{ $data->jap_reading == 1 ? "Yes" : "No" }}&nbsp;&nbsp;&nbsp; Writing: {{ $data->jap_writing == 1 ? "Yes" : "No" }}&nbsp;&nbsp;&nbsp; Speaking: {{ $data->jap_speaking == 1 ? "Yes" : "No" }}&nbsp;&nbsp;&nbsp; Listening: {{ $data->jap_listening == 1 ? "Yes" : "No" }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Smoking:</h4>
                <label>{{ $data->smoking == 1 ? "Yes" : "No"}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Shoe Size:</h4>
                <label>{{ $data->shoe_size }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Hobbies:</h4>
                <label> {{ $data->hobbies }}</label>
            </div>
            <div style="float: left; width:50%">
                <h4>Person to notify in case o emergency:</h4>
                <label>{{ $data->person_to_notify }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Relation:</h4>
                <label>{{ $data->person_relation }}</label>
            </div>
            <div style="float: left; width:50%">
                <h4>Address:</h4>
                <label> {{ $data->person_address }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Contact No:</h4>
                <label>{{ $data->person_contact }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Passport No:</h4>
                <label>{{ $data->passport_no }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Issue Date:</h4>
                <label> {{ $data->issue_date }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Expiry Date:</h4>
                <label>{{ $data->expiry_date }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Issue Place:</h4>
                <label>{{ $data->issue_place }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row" style="margin-bottom: 70px;">
            <div style="float: left; width:25%">
                <h4>Have Food Allergies:</h4>
                <label>{{ $data->food_alergy == null ? "None" : $data->food_alergy }}</label>
            </div>
            <div style="float: left; width:50%">
                <h4>Have Tattoo:</h4>
                <label> {{ $data->tattoo == 1 ? "Yes" : "No" }}</label>
            </div>
            <div style="float: left; width:25%">
                <h4>Have Driver's License:</h4>
                <label>{{ $data->drivers_licensed == 1 ? "Yes" : "No" }}</label>
            </div>
        </div>
    </div>
</body>
</html>