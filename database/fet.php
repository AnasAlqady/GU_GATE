<?php
include('database_connection.php');
$query = "SELECT * FROM event ORDER BY event_id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';


if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
                 <div class="swiper-slide" >  
                   <div class="container" >
                     <a href="'.$row["event_link"].' "> <img src="event/'.$row["event_name"].'" width="50%" /></a> 
                      <div class="middle">
                       <div class="text">'.$row["event_description"].'
                      </div></div> </div></div>

  ';


 }
}
else
{
 $output .= '
no event
 ';
}

echo $output;
?>
