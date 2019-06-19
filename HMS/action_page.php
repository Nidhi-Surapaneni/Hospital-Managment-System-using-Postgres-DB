<html> 

    <body> 
        <?php 
        $db = pg_pconnect('host=localhost dbname=hospital_managment user=postgres password=12345'); 
		$user_id= $first_name= $last_name = $contact = $age= $pass = $gender ="";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id=$_POST['userid']; 
        $first_name =$_POST['firstname']; 
        $last_name = $_POST['lastname']; 
		$contact= $_POST['cno'];
		$age =$_POST['cage'];
		$pass =$_POST['psw'];
		$gender =$_POST['gender'];
		
		}
		
		
		$array["user_id"] = $user_id;
		$array["u_password"] = $pass;
		$array["fname"] = $first_name;
		$array["lname"] = $last_name;
		$array["age"] = $age;
		$array["phone_no"] = $contact;
		$array["gender"] = $gender;
		
		
		
        $result = pg_insert($db, 'user_table', $array);
		echo "Values inserted";
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
pg_close($db);
        ?> 
    </body> 
</html> 

