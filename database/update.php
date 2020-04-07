<?php
//update.php

include('database_connection.php');

if(isset($_POST["event_id"]))
{
 $old_name = get_old_event_name($connect, $_POST["event_id"]);
 $file_array = explode(".", $old_name);
 $file_extension = end($file_array);
 $new_name = $_POST["event_name"] . '.' . $file_extension;
 $query = '';
 if($old_name != $new_name)
 {
  $old_path = 'event/' . $old_name;
  $new_path = 'event/' . $new_name;
  if(rename($old_path, $new_path))
  { 
   $query = "
   UPDATE event 
   SET event_name = '".$new_name."', event_description = '".$_POST["event_description"]."',event_link = '".$_POST["event_link"]."' 
   WHERE event_id = '".$_POST["event_id"]."'
   ";
  }
 }
 else
 {
  $query = "
   UPDATE event 
   SET event_description = '".$_POST["event_description"]."',event_link = '".$_POST["event_link"]."' 
   WHERE event_id = '".$_POST["event_id"]."'
   ";
 }
 
 $statement = $connect->prepare($query);
 $statement->execute();
}
function get_old_event_name($connect, $event_id)
{
 $query = "
 SELECT event_name FROM event WHERE event_id = '".$event_id."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row["event_name"];
 }
}

?>
