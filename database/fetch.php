<?php
include('database_connection.php');
$query = "SELECT * FROM event ORDER BY event_id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output .= '
 <table class="table table-bordered table-striped">
  <tr>
   <th>Sr. No</th>
   <th>Image</th>
   <th>Name</th>
   <th>Description</th>
   <th>link</th>
   <th>Edit</th>
   <th>Delete</th>
  </tr>
';
if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
  <tr>
   <td>'.$count.'</td>
   <td><img src="event/'.$row["event_name"].'" class="img-thumbnail" width="100" height="100" /></td>
   <td>'.$row["event_name"].'</td>
   <td>'.$row["event_description"].'</td>
   <td><a href = "'.$row["event_link"].' " > GO </a></td>
   <td><button type="button" class="btn btn-warning btn-xs edit" id="'.$row["event_id"].'">Edit</button></td>
   <td><button type="button" class="btn btn-danger btn-xs delete" id="'.$row["event_id"].'" data-event_name="'.$row["event_name"].'">Delete</button></td>
  </tr>
  ';
 }
}
else
{
 $output .= '
  <tr>
   <td colspan="7" align="center">No Data Found</td>
  </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
