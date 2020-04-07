<?php
//edit.php
include('database_connection.php');

$query = "
SELECT * FROM event 
WHERE event_id = '".$_POST["event_id"]."'
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row)
{
 $file_array = explode(".", $row["event_name"]);
 $output['event_name'] = $file_array[0];
 $output['event_description'] = $row["event_description"];
 $output['event_link'] = $row["event_link"];
}

echo json_encode($output);

?>