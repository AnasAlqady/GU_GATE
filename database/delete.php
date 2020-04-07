
<?php
//delete.php

include('database_connection.php');

if(isset($_POST["event_id"]))
{
 $file_path = 'event/' . $_POST["event_name"];
 if(unlink($file_path))
 {
  $query = "DELETE FROM event WHERE event_id = '".$_POST["event_id"]."'";
  $statement = $connect->prepare($query);
  $statement->execute();
 }
}

?>