<?php
session_start();

$db = pg_pconnect("host=localhost  dbname=hospital_managment user=postgres password=12345");
extract($_GET);
$_SESSION['patid'] = $_GET['pid'];
$result = pg_query($db, "SELECT weight,test_report,w_id ,medicine_name FROM inpatient WHERE patient_id = '{$_SESSION['patid']}'");
$row = pg_fetch_assoc($result);
if (isset($_GET['submit']))
{
echo "<ul>
<form name='update'  method='POST' >
<li>Weight:</li><li><input type='text' name='weight_updated' value='$row[weight]'  /></li>
<li>Test Report:</li><li><input type='text' name='Testreport_updated' value='$row[test_report]' /></li><li>
Ward ID:</li><li><input type='text' name='ward_updated' value='$row[w_id]' /></li> <li>
Medicine Name:</li><li><input type='text' name='medicine_updated' value='$row[medicine_name]' /></li> <li>
<li><input type='submit' name='new' /></li>  </form>
</ul>";
}
if (isset($_POST['new']))
{
$result1 = pg_query($db, "UPDATE inpatient SET  weight = '$_POST[weight_updated]', test_report = '$_POST[Testreport_updated]',  w_id='$POST[ward_updated]',
medicine_name = '$_POST[medicine_updated]' where patient_id ='{$_SESSION['patid']}'");
if (!$result1)
{
echo "Update failed!!";
} else
{
echo "Update successfull;";
}
}
?>
