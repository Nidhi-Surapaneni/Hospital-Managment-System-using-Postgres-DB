<html> 
<head>
  <style>
  body{
	  //background-image: url("Car Background.jpg");
	  background-repeat: no-repeat;
	  background-attachment: fixed;
	  background-size: cover;
	  height: 1100px;
	  position:absolute;
	}
  </style>
</head>
    <body> 
        <?php 
        $db = pg_pconnect('host=localhost dbname=hospital_managment user=postgres password=12345'); 
		$patientid = $pfname = $plname = $pgender = $dob = $pheight = $pweight = $test = $precid  = $pltid = $med  = "";
		$dob =  date("Y-M-D");
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patientid=$_POST['PatientID']; 
        $pfname =$_POST['firstname']; 
        $plname = $_POST['lastname']; 
		$pgender= $_POST['gender'];
		$dob=$_POST['dob'];
		$pheight =$_POST['height'];
		$pweight=$_POST['weight'];
		$test =$_POST['testrepo'];
		$precid=$_POST['recid'];
		
		$pltid=$_POST['ltid'];
		$med=$_POST['medname'];
		
		
		}
		
		$array["patient_id"] = $patientid;
		$array["fname"] = $pfname;
		$array["lname"] = $plname;
		$array["gender"] = $pgender;
		$array["date_of_birth"] = $dob;
		$array["height"] = $pheight;
		$array["weight"] = $pweight;
		$array["test_report"] = $test;
		$array["rec_id"] = $precid;
		$array["lt_id"] = $pltid;
		$array["medicine_name"] = $med;
		
		
		
		
		
		
        $result = pg_insert($db, 'outpatient', $array);
		//$result = pg_insert($db, 'user_table', $array);
		echo "Values inserted";
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
pg_close($db);
        ?> 
    </body> 
</html> 

