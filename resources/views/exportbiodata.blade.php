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
            <img src="data:image/png;base64,{{$data->id_picture}}" alt="Italian Trulli" style="width:96px;height:96px; float:right">
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
            <div style="float:left; width:18%; border-bottom: 1px solid black; margin-right:10px; {{$data->middle_name == null ? 'margin-top: 18.5px;' : ''}}">
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
                <label>{{ $data->permanentaddress}}</label>
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
            <div style="float: left; width:8.5%;">
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
            <div style="float: left; width:13%; border-bottom: 1px solid black; margin-right:10px;">
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
            <div style="float: left; width:9%">
                <h5>Religion:</h5>
            </div>
            <div style="float: left; width:40%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->religion}}</label>
            </div>
            
            <div style="float: left; width:9.5%">
                <h5>Smoking:</h5>
            </div>
            <div style="float: left; width:3%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->smoking == 1 ? "Yes" : "No"}}</label>
            </div>
            <div style="float: left; width:8.5%">
                <h5>Weight:</h5>
            </div>
            <div style="float: left; width:6%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->weight }}&nbsp;kg</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:20%">
                <h5>Facebook Account:</h5>
            </div>
            <div style="float: left; width:48%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->facebook}}</label>
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
            <div style="clear:both"></div>
            <div style="float: left; width:18%">
                <h5>Other Language:</h5>
            </div>
            <div style="float: left; width:78%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->other_lang == null ? "N/A" : $data->other_lang }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:11%">
                <h5>Shoe Size:</h5>
            </div>
            <div style="float: left; width:2%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->shoe_size}}</label>
            </div>
            <div style="float: left; width:10%">
                <h5>Hobbies:</h5>
            </div>
            <div style="float: left; width:71%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->hobbies}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:27%">
                <h5>Emergency Contact Person:</h5>
            </div>
            <div style="float: left; width:50%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->person_to_notify}}</label>
            </div>
            <div style="float: left; width:10%">
                <h5>Relation:</h5>
            </div>
            <div style="float: left; width:10%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->person_relation}}</label>
            </div>
            <div style="clear:both"></div>
            <div style="float: left; width:10%">
                <h5>Address:</h5>
            </div>
            <div style="float: left; width:57%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->person_address}}</label>
            </div>
            <div style="float: left; width:17.5%">
                <h5>Contact Number:</h5>
            </div>
            <div style="float: left; width:13%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->person_contact}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:13.5%">
                <h5>Passport No:</h5>
            </div>
            <div style="float: left; width:20%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$data->passport_no}}</label>
            </div>
            <div style="float: left; width:12%">
                <h5>Issue Date:</h5>
            </div>
            <div style="float: left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{date('m/d/Y', strtotime($data->issue_date))}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:12%">
                <h5>Issue Place:</h5>
            </div>
        </div>
        
        <div style="float: left; width:30%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$data->issue_place}}</label>
        </div>
        <div style="float: left; width:13.5%">
            <h5>Expiry Date:</h5>
        </div>
        <div style="float: left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{date('m/d/Y', strtotime($data->expiry_date))}}</label>
        </div>

        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:20%">
                <h5>Have Food Allergies:</h5>
            </div>
            <div style="float: left; width:3%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->allergy == 1? "Yes" : "No"}}</label>
            </div>
            <div style="float: left; width:13%">
                <h5>Have Tattoo:</h5>
            </div>
            <div style="float: left; width:3%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->tattoo == 1? "Yes" : "No" }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div style="float: left; width:14%">
            <h5>Kind of Food:</h5>
        </div>
        <div style="float: left; width:80%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{ $data->food_alergy == null ? "N/A" : $data->food_alergy }}</label>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float: left; width:22%">
                <h5>Have Driver's License:</h5>
            </div>
            <div style="float: left; width:3%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->drivers_licensed == 1 ? "Yes" : "No" }}</label>
            </div>
            <div style="float: left; width:16%">
                <h5>Type of License:</h5>
            </div>
            <div style="float: left; width:15%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->drivers_licensed == 0 ? "N/A" : $data->type_licensed }}</label>
            </div>
            <div style="float: left; width:12.5%">
                <h5>Valid Until:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $data->drivers_licensed == 0 ? "N/A" : date('m/d/Y', strtotime($data->date_birth))}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        @if($data->job_type == "SSW")
            <h1 class="row">Seminar / Certificate</h1>
            <div class="row" >
                <div style="float: left; width:20%;">
                    <h5>Have Been a Trainee:</h5>
                </div>
                <div style="float:left; width:3%; border-bottom: 1px solid black;">
                    <label>{{ $certificate->ex_trainee == 1 ? "Yes" : "No" }}</label>
                </div>
                @if($certificate->ex_trainee == 1)
                <div style="clear:both"></div>
                <div>
                    <div style="float:left; width:15%;">
                        <h5>Job Category:</h5>
                    </div>
                    <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:10px">
                        <label>{{ $certificate->Category}}</label>
                    </div>
                    <div style="clear:both"></div>
                    <div style="float:left; width:15%;">
                        <h5>Job Operation:</h5>
                    </div>
                    <div style="float:left; width:70%; border-bottom: 1px solid black;">
                        <label>{{ $certificate->Operation}}</label>
                    </div>
                </div>
                @endif
                <div style="clear:both"></div>
                <div style="float: left; width:20%;">
                    <h5>Prometrics</h5>
                </div>
                <div style="clear:both"></div>
                    <div style="float: left; width:40%; margin-left: 200px">
                        <h5>Certificate</h5>
                    </div>
                    <div style="float: left; width:20%">
                        <h5>Date Taken</h5>
                    </div>
                    <div style="float: left; width:17.5%">
                        <h5>Status</h5>
                    </div>
                <div style="clear:both"></div>
                    @if(COUNT($prometric) == 0)
                    <div style="float: left; width:60%; margin-left: 20px; margin-right: 42px; border-bottom: 1px solid black; text-align:center">
                        <label>N/A</label>
                    </div>
                    <div style="float: left; width:8.5%; margin-right:68px; border-bottom: 1px solid black; text-align:center">
                        <label>N/A</label>
                    </div>
                    <div style="float: left; width:8%; border-bottom: 1px solid black; text-align:center">
                        <label>N/A</label>
                    </div>
                    <div style="clear:both"></div>
                    @else
                        @for($i = 0; $i < COUNT($prometric); $i++)
                            <div style="float: left; width:60%; margin-left: 20px; margin-right: 42px; border-bottom: 1px solid black;">
                                <label>{{ $prometric[$i]->certificate }}</label>
                            </div>
                            <div style="float: left; width:8.5%; margin-right:68px; border-bottom: 1px solid black; text-align:center">
                                <label>{{ date('m/d/Y', strtotime($prometric[$i]->taken))}}</label>
                            </div>
                            <div style="float: left; width:8%; border-bottom: 1px solid black; text-align:center">
                                <label>{{ $prometric[$i]->passed == 1 ? "Passed" : "Failed"}}</label>
                            </div>
                            <div style="clear:both"></div>
                        @endfor
                    @endif
                <br>
                <div style="float: left; width:20%;">
                    <h5>Japanese Language</h5>
                </div>
                <div style="clear:both"></div>
                    <div style="float: left; width:40%; margin-left: 200px">
                        <h5>Language</h5>
                    </div>
                    <div style="float: left; width:20%">
                        <h5>Date Taken</h5>
                    </div>
                    <div style="float: left; width:17.5%">
                        <h5>Status</h5>
                    </div>
                <div style="clear:both"></div>
                    @if(COUNT($language) == 0)
                    <div style="float: left; width:60%; margin-left: 20px; margin-right: 42px; border-bottom: 1px solid black;">
                        <label>N/A</label>
                    </div>
                    <div style="float: left; width:8.5%; margin-right:68px; border-bottom: 1px solid black; text-align:center">
                        <label>N/A</label>
                    </div>
                    <div style="float: left; width:8%; border-bottom: 1px solid black; text-align:center">
                        <label>N/A</label>
                    </div>
                    <div style="clear:both"></div>
                    @else
                        @for($i = 0; $i < COUNT($language); $i++)
                            <div style="float: left; width:60%; margin-left: 20px; margin-right: 42px; border-bottom: 1px solid black;">
                                <label>{{ $language[$i]->jpl }}</label>
                            </div>
                            <div style="float: left; width:8.5%; margin-right:68px; border-bottom: 1px solid black; text-align:center">
                                <label>{{ date('m/d/Y', strtotime($language[$i]->taken))}}</label>
                            </div>
                            <div style="float: left; width:8%; border-bottom: 1px solid black; text-align:center">
                                <label>{{ $language[$i]->passed == 1 ? "Passed" : "Failed"}}</label>
                            </div>
                            <div style="clear:both"></div>
                        @endfor
                    @endif
            </div>
        @endif
        <div style="clear:both"></div>
        <h1 class="row">Educational Background</h1>
        <div style="clear:both"></div>
        <div class="row" >
            <div style="float: left; width:13%;">
                <h5>Elementary:</h5>
            </div>
            <div style="float:left; width:80%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $educational->name_elem}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div>
            <div style="float: left; width:9%;">
                <h5>Address:</h5>
            </div>
            <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:14px;">
                <label>{{ $educational->address_elem}}</label>
            </div>
            <div style="clear:both"></div>
            <div style="float: left; width:6%;">
                <h5>From:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:18.5px;">
                <label>{{ date('m/d/Y', strtotime($educational->from_elem))}}</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>Until:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ date('m/d/Y', strtotime($educational->until_elem))}}</label>
            </div>
        </div>
        
        <div style="clear:both"></div>
        <div class="row" >
            <div style="float: left; width:13%;">
                <h5>High School:</h5>
            </div>
            <div style="float:left; width:80%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $educational->name_highschool}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div>
            <div style="float: left; width:9%;">
                <h5>Address:</h5>
            </div>
            <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:14px;">
                <label>{{ $educational->address_highschool}}</label>
            </div>
            <div style="clear:both"></div>
            <div style="float: left; width:6%;">
                <h5>From:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:18.5px;">
                <label>{{ date('m/d/Y', strtotime($educational->from_highschool))}}</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>Until:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ date('m/d/Y', strtotime($educational->until_highschool))}}</label>
            </div>
        </div>
        <div style="clear:both"></div>

        @if (COUNT($vocational) == 0)
        <div class="row" >
            <div style="float: left; width:13%;">
                <h5>Vocational:</h5>
            </div>
            <div style="float:left; width:52%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div>
            <div style="float: left; width:9%;">
                <h5>Address:</h5>
            </div>
            <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:14px;">
                <label>N/A</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div>
            <div style="float: left; width:15%;">
                <h5>Course/Major:</h5>
            </div>
            <div style="float:left; width:50%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>From:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:18.5px;">
                <label>N/A</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>Until:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="clear:both"></div>
            <div style="float: left; width:19%;">
                <h5>Certificate Holder:</h5>
            </div>
            <div style="float:left; width:50%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float: left; width:12%;">
                <h5>Valid Until:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
        </div>
        <div style="clear:both"></div>
        @else
            @for ($i = 0; $i < COUNT($vocational); $i++)
                <div class="row">
                    <div style="float: left; width:13%;">
                        <h5>Vocational {{$i + 1}}:</h5>
                    </div>
                    <div style="float:left; width:52%; border-bottom: 1px solid black; margin-right:10px;">
                        <label>{{ $vocational[$i]->name}}</label>
                    </div>
                </div>
                <div style="clear:both"></div>
                <div>
                    <div style="float: left; width:9%;">
                        <h5>Address:</h5>
                    </div>
                    <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:14px;">
                        <label>{{$vocational[$i]->address}}</label>
                    </div>
                </div>
                <div style="clear:both"></div>
                <div>
                    <div style="float: left; width:15%;">
                        <h5>Course/Major:</h5>
                    </div>
                    <div style="float:left; width:50%; border-bottom: 1px solid black; margin-right:10px;">
                        <label>{{$vocational[$i]->course}}</label>
                    </div>
                    <div style="float: left; width:6%;">
                        <h5>From:</h5>
                    </div>
                    <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:18.5px;">
                        <label>{{ date('m/d/Y', strtotime($vocational[$i]->from))}}</label>
                    </div>
                    <div style="float: left; width:6%;">
                        <h5>Until:</h5>
                    </div>
                    <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                        <label>{{ date('m/d/Y', strtotime($vocational[$i]->until))}}</label>
                    </div>
                    <div style="clear:both"></div>
                    <div style="float: left; width:19%;">
                        <h5>Certificate Holder:</h5>
                    </div>
                    <div style="float:left; width:50%; border-bottom: 1px solid black; margin-right:10px;">
                        <label>{{$vocational[$i]->certificate == null ? "N/A" : $vocational[$i]->certificate}}</label>
                    </div>
                    <div style="float: left; width:12%;">
                        <h5>Valid Until:</h5>
                    </div>
                    <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                        <label>{{$vocational[$i]->certificate_until == "1970-01-01 00:00:00" ? "N/A" : date('m/d/Y', strtotime($vocational[$i]->certificate_until))}}</label>
                    </div>
                </div>
                <div style="clear:both"></div>
            @endfor
        @endif
        <div class="row">
            <div style="float: left; width:9%;">
                <h5>College:</h5>
            </div>
            <div style="float:left; width:55%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $educational->name_college == null ? "N/A" : $educational->name_college }}</label>
            </div>
        </div>
        <div style="clear:both"></div>
            <div>
                <div style="float: left; width:9%;">
                    <h5>Address:</h5>
                </div>
                <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:14px;">
                    <label>{{$educational->address_college == null ? "N/A" : $educational->address_college}}</label>
                </div>
            </div>
        <div style="clear:both"></div>
        <div>
            <div style="float: left; width:15%;">
                <h5>Course/Major:</h5>
            </div>
            <div style="float:left; width:50%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$educational->course_college == null ? "N/A" : $educational->course_college}}</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>From:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:18.5px;">
                <label>{{ $educational->name_college == null ? "N/A" : date('m/d/Y', strtotime($educational->from_college))}}</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>Until:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{ $educational->name_college == null ? "N/A" : date('m/d/Y', strtotime($educational->until_college))}}</label>
            </div>
            <div style="clear:both"></div>
            <div style="float: left; width:19%;">
                <h5>Certificate Holder:</h5>
            </div>
            <div style="float:left; width:50%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$educational->certificate_college == null ? "N/A" : $educational->certificate_college}}</label>
            </div>
            <div style="clear:both"></div>
        </div>
        <h1 class="row">Employment Record (Local)</h1>
        <div style="clear:both"></div>
        @if (COUNT($local) == 0)
        <div>
            <div style="width:10%;">
                <h3>Employment</h3>
            </div>
        </div>
        <div>
            <div style="float: left; width:11%; margin-left:10px;">
                <h5>Company:</h5>
            </div>
            <div style="float:left; width:55%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>From:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:18.5px;">
                <label>N/A</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>Until:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div style="float: left; width:9%; margin-left:10px">
            <h5>Position:</h5>
        </div>
        <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:10px;">
            <label>N/A</label>
        </div>
        <div style="clear:both"></div>
            <div>
                <div style="float: left; width:9%; margin-left:10px;">
                    <h5>Address:</h5>
                </div>
                <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:14px;">
                    <label>N/A</label>
                </div>
            </div>
        <div style="clear:both"></div>
        @else
            @for($i = 0; $i < COUNT($local); $i++)
            <div>
                <div style="width:25%;">
                    <h3>Employment {{$i + 1}}</h3>
                </div>
            </div>
            <div>
                <div style="float: left; width:11%; margin-left:10px;">
                    <h5>Company:</h5>
                </div>
                <div style="float:left; width:55%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$local[$i]->company_name}}</label>
                </div>
                <div style="float: left; width:6%;">
                    <h5>From:</h5>
                </div>
                <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:18.5px;">
                    <label>{{date('m/d/Y', strtotime($local[$i]->from))}}</label>
                </div>
                <div style="float: left; width:6%;">
                    <h5>Until:</h5>
                </div>
                <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$local[$i]->until == "2200-01-01 00:00:00" ? "present" : date('m/d/Y', strtotime($local[$i]->until))}}</label>
                </div>
            </div>
            <div style="clear:both"></div>
            <div style="float: left; width:9%; margin-left:10px">
                <h5>Position:</h5>
            </div>
            <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$local[$i]->position}}</label>
            </div>
            <div style="clear:both"></div>
                <div>
                    <div style="float: left; width:9%; margin-left:10px;">
                        <h5>Address:</h5>
                    </div>
                    <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:14px;">
                        <label>{{$local[$i]->company_address}}</label>
                    </div>
                </div>
            <div style="clear:both"></div>
            @endfor
        @endif

        <h1 class="row">Employment Record (Abroad)</h1>
        <div style="clear:both"></div>
        @if (COUNT($abroad) == 0)
        <div>
            <div style="width:10%;">
                <h3>Employment</h3>
            </div>
        </div>
        <div>
            <div style="float: left; width:11%; margin-left:10px;">
                <h5>Company:</h5>
            </div>
            <div style="float:left; width:55%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>From:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:18.5px;">
                <label>N/A</label>
            </div>
            <div style="float: left; width:6%;">
                <h5>Until:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
        </div>
        <div style="clear:both"></div>
        <div style="float: left; width:9%; margin-left:10px">
            <h5>Position:</h5>
        </div>
        <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:10px;">
            <label>N/A</label>
        </div>
        <div style="clear:both"></div>
            <div>
                <div style="float: left; width:9%; margin-left:10px;">
                    <h5>Address:</h5>
                </div>
                <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:14px;">
                    <label>N/A</label>
                </div>
            </div>
        <div style="clear:both"></div>
        @else
            @for($i = 0; $i < COUNT($abroad); $i++)
            <div>
                <div style="width:25%;">
                    <h3>Employment {{$i + 1}}</h3>
                </div>
            </div>
            <div>
                <div style="float: left; width:11%; margin-left:10px;">
                    <h5>Company:</h5>
                </div>
                <div style="float:left; width:55%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$abroad[$i]->company_name}}</label>
                </div>
                <div style="float: left; width:6%;">
                    <h5>From:</h5>
                </div>
                <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:18.5px;">
                    <label>{{date('m/d/Y', strtotime($abroad[$i]->from))}}</label>
                </div>
                <div style="float: left; width:6%;">
                    <h5>Until:</h5>
                </div>
                <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{date('m/d/Y', strtotime($abroad[$i]->until)) == "01/01/2200" ? "present" : date('m/d/Y', strtotime($abroad[$i]->until))}}</label>
                </div>
            </div>
            <div style="clear:both"></div>
            <div style="float: left; width:9%; margin-left:10px">
                <h5>Position:</h5>
            </div>
            <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$abroad[$i]->position}}</label>
            </div>
            <div style="clear:both"></div>
                <div>
                    <div style="float: left; width:9%; margin-left:10px;">
                        <h5>Address:</h5>
                    </div>
                    <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:14px;">
                        <label>{{$abroad[$i]->company_address}}</label>
                    </div>
                </div>
            <div style="clear:both"></div>
            @endfor
        @endif
        <h1 class="row">Family Information</h1>
        <div class="row">
            <h5>Parents:</h5>
        </div>
        <div style="float:left; width:7%; margin-right:10px;">
            <h5>Father:</h5>
        </div>
        <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->father_name == null ? "N/A" : $family->father_name}}</label>
        </div>
        <div style="float:left; width:9%; margin-right:10px;">
            <h5>Birthday:</h5>
        </div>
        <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->father_name == null ? "N/A" : date('m/d/Y', strtotime($family->father_birth))}}</label>
        </div>
        <div style="float:left; width:11%; margin-right:10px;">
            <h5>Occupation:</h5>
        </div>
        <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->father_occupation == null ? "N/A" : $family->father_occupation}}</label>
        </div>
        <div style="clear:both"></div>
        <div class="" style="float:left; width:8%;margin-left:10px; margin-right:9.5px;">
            <h5>Address:</h5>
        </div>
        <div style="float:left; width:68%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->father_address == null ? "N/A" : $family->father_address}}</label>
        </div>
        <div style="float:left; width:7%; margin-right:10px;">
            <h5>CP No:</h5>
        </div>
        <div style="float:left; width:13%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->father_cp == null ? "N/A" : $family->father_cp}}</label>
        </div>
        <div style="clear:both"></div>
        <div style="float:left; width:7%; margin-right:10px;">
            <h5>Mother:</h5>
        </div>
        <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->mother_name == null ? "N/A" : $family->mother_name}}</label>
        </div>
        <div style="float:left; width:9%; margin-right:10px;">
            <h5>Birthday:</h5>
        </div>
        <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->mother_name == null ? "N/A" : date('m/d/Y', strtotime($family->mother_birth))}}</label>
        </div>
        <div style="float:left; width:11%; margin-right:10px;">
            <h5>Occupation:</h5>
        </div>
        <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->mother_occupation == null ? "N/A" : $family->mother_occupation}}</label>
        </div>
        <div style="clear:both"></div>
        <div class="" style="float:left; width:8%;margin-left:10px; margin-right:9.5px;">
            <h5>Address:</h5>
        </div>
        <div style="float:left; width:68%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->mother_address == null ? "N/A" : $family->mother_address}}</label>
        </div>
        <div style="float:left; width:7%; margin-right:10px;">
            <h5>CP No:</h5>
        </div>
        <div style="float:left; width:13%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->mother_cp == null ? "N/A" : $family->mother_cp}}</label>
        </div>
        <div style="clear:both;"></div>
        <div class="row">
            <h5>Siblings:</h5>
        </div>
        @if (COUNT($siblings) == 0)
            <div style="float:left; width:7%; margin-right:10px;">
                <h5>Name:</h5>
            </div>
            <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float:left; width:9%; margin-right:10px;">
                <h5>Birthday:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float:left; width:11%; margin-right:10px;">
                <h5>Occupation:</h5>
            </div>
            <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="clear:both"></div>
            <div class="" style="float:left; width:8%;margin-left:10px; margin-right:9.5px;">
                <h5>Address:</h5>
            </div>
            <div style="float:left; width:68%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float:left; width:7%; margin-right:10px;">
                <h5>CP No:</h5>
            </div>
            <div style="float:left; width:13%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="clear:both;"></div>
        @else
            @for($i = 0; $i < COUNT($siblings); $i++)
                <div style="float:left; width:7%; margin-right:10px;">
                    <h5>Name:</h5>
                </div>
                <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$siblings[$i]->sibling_name == null ? "N/A" : $siblings[$i]->sibling_name}}</label>
                </div>
                <div style="float:left; width:9%; margin-right:10px;">
                    <h5>Birthday:</h5>
                </div>
                <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{date('m/d/Y', strtotime($siblings[$i]->sibling_birth)) == null ? "N/A" : date('m/d/Y', strtotime($siblings[$i]->sibling_birth))}}</label>
                </div>
                <div style="float:left; width:11%; margin-right:10px;">
                    <h5>Occupation:</h5>
                </div>
                <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$siblings[$i]->sibling_occupation == null ? "N/A" : $siblings[$i]->sibling_occupation}}</label>
                </div>
                <div style="clear:both"></div>
                <div class="" style="float:left; width:8%; margin-right:10px;">
                    <h5>Address:</h5>
                </div>
                <div style="float:left; width:68%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$siblings[$i]->sibling_address == null ? "N/A" : $siblings[$i]->sibling_address}}</label>
                </div>
                <div style="float:left; width:7%; margin-right:10px;">
                    <h5>CP No:</h5>
                </div>
                <div style="float:left; width:13%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$siblings[$i]->sibling_cp == null ? "N/A" : $siblings[$i]->sibling_cp}}</label>
                </div>
                <div style="clear:both;"></div>
            @endfor
        @endif

        <div class="row">
            <h5>Spouse:</h5>
        </div>
        <div style="float:left; width:7%; margin-right:10px;">
            <h5>Name:</h5>
        </div>
        <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->spouse_name == null ? "N/A" : $family->spouse_name}}</label>
        </div>
        <div style="float:left; width:9%; margin-right:10px;">
            <h5>Birthday:</h5>
        </div>
        <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->spouse_name == null ? "N/A" : date('m/d/Y', strtotime($family->spouse_birth))}}</label>
        </div>
        <div style="float:left; width:11%; margin-right:10px;">
            <h5>Occupation:</h5>
        </div>
        <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->spouse_occupation == null ? "N/A" : $family->spouse_occupation}}</label>
        </div>
        <div style="clear:both"></div>
        <div class="" style="float:left; width:8%; margin-left:10px; margin-right:10px;">
            <h5>Address:</h5>
        </div>
        <div style="float:left; width:68%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->spouse_address == null ? "N/A" : $family->spouse_address}}</label>
        </div>
        <div style="float:left; width:7%; margin-right:10px;">
            <h5>CP No:</h5>
        </div>
        <div style="float:left; width:13%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->spouse_cp == null ? "N/A" : $family->spouse_cp}}</label>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <h5>Children:</h5>
        </div>
        @if(COUNT($children) == 0)
            <div style="float:left; width:7%; margin-right:10px;">
                <h5>Name:</h5>
            </div>
            <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float:left; width:9%; margin-right:10px;">
                <h5>Birthday:</h5>
            </div>
            <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="clear:both"></div>
            <div class="" style="float:left; width:8%; margin-left:10px; margin-right:10px;">
                <h5>Address:</h5>
            </div>
            <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="clear:both"></div>
        @else
            @for($i = 0; $i < COUNT($children); $i++)
                <div style="float:left; width:7%; margin-right:10px;">
                    <h5>Name:</h5>
                </div>
                <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$children[$i]->name == null ? "N/A" : $children[$i]->name}}</label>
                </div>
                <div style="float:left; width:9%; margin-right:10px;">
                    <h5>Birthday:</h5>
                </div>
                <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{date('m/d/Y', strtotime($children[$i]->birthday)) == null ? "N/A" : date('m/d/Y', strtotime($children[$i]->birthday))}}</label>
                </div>
                <div style="clear:both"></div>
                <div class="" style="float:left; width:8%; margin-left:10px; margin-right:10px;">
                    <h5>Address:</h5>
                </div>
                <div style="float:left; width:70%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$children[$i]->address == null ? "N/A" : $children[$i]->address}}</label>
                </div>
                <div style="clear:both"></div>
            @endfor
        @endif
        <div class="row">
            <h5>Partner:</h5>
        </div>
        <div style="float:left; width:7%; margin-right:10px;">
            <h5>Name:</h5>
        </div>
        <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->partner_name == null ? "N/A" : $family->partner_name}}</label>
        </div>
        <div style="float:left; width:9%; margin-right:10px;">
            <h5>Birthday:</h5>
        </div>
        <div style="float:left; width:8.5%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->partner_name == null ? "N/A" : date('m/d/Y', strtotime($family->partner_birthday))}}</label>
        </div>
        <div style="float:left; width:11%; margin-right:10px;">
            <h5>Occupation:</h5>
        </div>
        <div style="float:left; width:29%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->partner_Occupation == null ? "N/A" : $family->partner_Occupation}}</label>
        </div>
        <div style="clear:both"></div>
        <div class="" style="float:left; width:8%; margin-left:10px; margin-right:10px;">
            <h5>Address:</h5>
        </div>
        <div style="float:left; width:68%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->partner_address == null ? "N/A" : $family->partner_address}}</label>
        </div>
        <div style="float:left; width:7%; margin-right:10px;">
            <h5>CP No:</h5>
        </div>
        <div style="float:left; width:13%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->partner_cp == null ? "N/A" : $family->partner_cp}}</label>
        </div>
        <div style="clear:both"></div>
        <div class="row">
            <div style="float:left; width:18.5%; margin-right:10px;">
                <h5>Have Been to Japan:</h5>
            </div>
            <div style="float:left; width:3%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$family->went_japan == 0 ? "No" : "Yes"}}</label>
            </div>
            <div style="float:left; width:12%; margin-right:10px;">
                <h5>Times Went:</h5>
            </div>
            <div style="float:left; width:4%; border-bottom: 1px solid black; margin-right:10px;">
                <label>{{$family->went_japan == 0 ? "N/A" : $family->how_many_japan}}</label>
            </div>
        </div>
        <div style="clear:both"></div>
        @if($family->went_japan == 1)
            
            <div style="clear:both"></div>
            <div style="float: left; width:40%; margin-left: 200px">
                <h5>Place</h5>
            </div>
            <div style="float: left; width:17%">
                <h5>From</h5>
            </div>
            <div style="float: left; width:20%">
                <h5>Until</h5>
            </div>
            <div style="clear:both"></div>
                @for($i = 0; $i < COUNT($japanvisit); $i++)
                    <div style="float: left; width:60%; margin-left: 20px; margin-right: 27px; border-bottom: 1px solid black;">
                        <label>{{$japanvisit[$i]->where}}</label>
                    </div>
                    <div style="float: left; width:8.5%; margin-right:60px; border-bottom: 1px solid black; text-align:center">
                        <label>{{date('m/d/Y', strtotime($japanvisit[$i]->fromwhen))}}</label>
                    </div>
                    <div style="float: left; width:8.5%; margin-right:60px; border-bottom: 1px solid black; text-align:center">
                        <label>{{date('m/d/Y', strtotime($japanvisit[$i]->untilwhen))}}</label>
                    </div>
                    <div style="clear:both"></div>
                @endfor
                <div style="float:left; width:20%; margin-right:10px;">
                    <h5>Overstayed in Japan:</h5>
                </div>
                <div style="float:left; width:4%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$family->went_japan == 0 ? "N/A" : ($family->overstay_japan == 0 ? "No" : "Yes")}}</label>
                </div>
                <div style="float:left; width:11%; margin-right:10px;">
                    <h5>How Long:</h5>
                </div>
                <div style="float:left; width:12%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$family->overstay_japan == 0 ? "N/A" : $family->how_long_overstay}}</label>
                </div>
                <div style="clear:both"></div>
                <div style="float:left; width:18.5%; margin-right:10px;">
                    <h5>Used Fake Identity:</h5>
                </div>
                <div style="float:left; width:4%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$family->fake_identity_japan == 0 ? "No" : "Yes"}}</label>
                </div>
                <div style="float:left; width:12.5%; margin-right:10px;">
                    <h5>Surrendered:</h5>
                </div>
                <div style="float:left; width:12%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$family->fake_identity_japan == 0 ? "N/A" : ($family->fake_identity_surrender == 0 ? "No" : "Yes")}}</label>
                </div>  
                <div style="float:left; width:10%; margin-right:10px;">
                    <h5>Purpose:</h5>
                </div>
                <div style="float:left; width:30%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$family->fake_identity_japan == 0 ? "N/A" : $family->fake_identity_purpose}}</label>
                </div>
        @endif
        <br>
        <div style="clear:both"></div>
        <div class="row" style="float:left; width:26%; margin-right:10px;">
            <h5>Applied For Japanese Visa:</h5>
        </div>
        <div style="float:left; width:4%; border-bottom: 1px solid black; margin-right:10px;">
            <label>{{$family->applied_visa == 0 ? "No" : "Yes"}}</label>
        </div>
        <div style="clear:both"></div>
        @if($family->applied_visa == 1)
            @for($i = 0; $i < COUNT($visa); $i++)
                <div style="float:left; width:13%; margin-right:10px;">
                    <h5>Type of Visa:</h5>
                </div>
                <div style="float:left; width:20%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$visa[$i]->type}}</label>
                </div>
                <div style="float:left; width:7.5%; margin-right:10px;">
                    <h5>When:</h5>
                </div>
                <div style="float:left; width:10.5%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{date('m/d/Y', strtotime($visa[$i]->applied_at))}}</label>
                </div>
                <div style="float:left; width:10.5%; margin-right:10px;">
                    <h5>Approved:</h5>
                </div>
                <div style="float:left; width:4%; border-bottom: 1px solid black; margin-right:10px;">
                    <label>{{$visa[$i]->is_approved == 0 ? "No" : "Yes"}}</label>
                </div>
                <div style="clear:both"></div>
            @endfor
        @endif
        
        <h1 class="row" >Relatives and Acquaintances in Japan</h1>
        <div style="float: left; width:26%; margin-left:100px">
            <h5>Name</h5>
        </div>
        <div style="float: left; width:14.5%">
            <h5>Relation</h5>
        </div>
        <div style="float: left; width:25%">
            <h5>Contact No</h5>
        </div>
        <div style="float: left; width:15%">
            <h5>Address</h5>
        </div>
        <div style="clear:both"></div>
            @if(COUNT($relative) == 0)
            <div style="float: left; border-bottom: 1px solid black; width:33%;; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float: left; border-bottom: 1px solid black; width:18%; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float: left; border-bottom: 1px solid black; width:11.5%; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="float: left; border-bottom: 1px solid black; width:34%; margin-right:10px;">
                <label>N/A</label>
            </div>
            <div style="clear:both"></div>
            @else
                @for($i = 0; $i < COUNT($relative); $i++)
                <div style="float: left; border-bottom: 1px solid black; width:33%;; margin-right:10px;">
                    <label>{{$relative[$i]->name}}</label>
                </div>
                <div style="float: left; border-bottom: 1px solid black; width:18%; margin-right:10px;">
                    <label>{{$relative[$i]->relation}}</label>
                </div>
                <div style="float: left; border-bottom: 1px solid black; width:11.5%; margin-right:10px;">
                    <label>{{$relative[$i]->cp == null ? "N/A" : $relative[$i]->cp}}</label>
                </div>
                <div style="float: left; border-bottom: 1px solid black; width:34%; margin-right:10px;">
                    <label>{{$relative[$i]->address}}</label>
                </div>
                <div style="clear:both"></div>
                @endfor
            @endif
        </div>
        <div style="clear: both;"></div>
        <div style="page-break-after: always;"></div>
        <h1 class="row">Government ID</h1>
        <div style="text-align:center">
            <img src="data:image/png;base64,{{$data->gov_id_picture}}" alt="government id" style="width:200px;height:200px;display:block:margin:auto">
        </div>
        <h1 class="row">Passport ID</h1>
        <div style="text-align:center">
            <img src="data:image/png;base64,{{$data->passport_id_picture}}" alt="passport id" style="width:200px;height:200px;display:block:margin:auto">
        </div>
    </div>
</body>
</html>