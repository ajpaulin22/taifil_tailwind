<?php

namespace App\Http\Controllers\MasterMaintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobInformationController extends Controller
{
    public function view(){
        return view("/admin/MasterMaintenance/JobInformation");
    }

    public function GetJobCode(Request $request){
        // GET CONNECTION ERRORS
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        // SQL QUERY
        $query = "SELECT Roll_No, Name FROM `Student Details`;";
        // FETCHING DATA FROM DATABASE
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            // OUTPUT DATA OF EACH ROW
            while($row = mysqli_fetch_assoc($result)) {
                echo "Roll No: " . $row["Roll_No"]
                . " - Name: " . $row["Name"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }
}