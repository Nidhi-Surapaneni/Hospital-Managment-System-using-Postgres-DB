<html> 

    <body> 
        <?php 
        $db = pg_pconnect('host=localhost dbname=hospital_managment user=postgres password=12345'); 
		$mname = $mqua  = $mprice =  $mava = "";
		$mdoa = date("Y-M-D");
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mname=$_POST['medname']; 
		$mqua=$_POST['quantity'];
        $mdoa =$_POST['doa']; 
		$mava =$_POST['avail'];
        $mprice = $_POST['price']; 
		//$pgender =$_POST['gender'];
		
		}
		
		
		$array["medicine_name"] = $mname;
		$array["total_quantity"] = $mqua;
		$array["available_quantity"] = $mava;
		$array["date_of_acquiring"] = $mdoa;
		$array["medicine_price"] = $mprice;
		//$array["gender"] = $pgender;
		
		
		
        $result = pg_insert($db, 'medicalstore', $array);
		echo "Values inserted";
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
pg_close($db);
        ?> 
    </body> 
</html> 

