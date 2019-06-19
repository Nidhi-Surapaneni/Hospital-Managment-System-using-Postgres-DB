        <?php 
$db = pg_pconnect("dbname=hospital_managment password='12345' user='postgres'");
if (!$db) {
  echo "An error occurred.\n";
  exit;
}

$result = pg_query($db, "SELECT appointment_date,appointment_time,doctor_id FROM appointment_schedule where patient_id = '$_POST[pid]'");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}
  echo "Date   |   Time  |   Doctor_id  ";
  echo "<br>";
while ($row = pg_fetch_row($result)) {
  echo "$row[0] &nbsp  &nbsp |   $row[1] &nbsp  &nbsp  |  $row[2]  &nbsp  &nbsp  ";
  echo "<br>";
}
pg_close($db);
      ?> 