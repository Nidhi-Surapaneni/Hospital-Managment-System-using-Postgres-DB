<html> 

    <body> 
        <?php 
        $db = pg_pconnect('host=localhost dbname=hospital_managment user=postgres password=12345'); 
		$pwardid = $pward = $num = $total = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pwardid=$_POST['wardid']; 
		$pward=$_POST['wtype'];
        $num =$_POST['nobeds']; 
        $total = $_POST['avail']; 
		//$pgender =$_POST['gender'];
		
		}
		
		
		$array["w_id"] = $pwardid;
		$array["wtype"] = $pward;
		$array["no_of_available"] = $num;
		$array["total_no_of_beds"] = $total;
		//$array["gender"] = $pgender;
		
		
		
        $result = pg_insert($db, 'ward', $array);
		echo "Values inserted";
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
pg_close($db);
        ?> 
    </body> 
</html> 

