<html> 

    <body> 
        <?php 
        $db = pg_pconnect('host=localhost dbname=hospital_managment user=postgres password=12345'); 
		$patient_id = $doc_id = "";
		$pdate = date("Y-M-D");
		date_default_timezone_set('Asia/Kolkata');
		//$time = date_default_timezone_get();



		
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patient_id=$_POST['pid']; 
        $pdate =$_POST['date']; 
        $time= $_POST['time']; 
		$doc_id= $_POST['doc'];
		
		}
		$array["patient_id"] = $patient_id;
		$array["appointment_date"] = $pdate;
		$array["appointment_time"] = $time;
		$array["doctor_id"] = $doc_id;
		
		/*$query="insert into appointment_schedule valus('$date','$time','$doc_id','$patient_id');";
		$result=pg_query($db,$query);*/
		
	
		
		
       $result = pg_insert($db, 'appointment_schedule', $array);
		echo "Values inserted";
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
pg_close($db);
        ?> 
    </body> 
</html> 

