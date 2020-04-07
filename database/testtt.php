<?php
include('database_connection.php');
$query = "SELECT * FROM news ORDER BY image_name DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
$output = '<div class="single-portfolio-slide">';


if($number_of_rows > 0)
{
 $count = 0;
 foreach($result as $row)
 {
  $count ++; 
  $output .= '
                    
                        <img src="files/' .$row["image_name"].'"  width="100%"/>
                        <div class="overlay-effect">
                            <h4> '.$row['image_name'].'</h4>
                            <p> '.$row['image_description'] '</p>
                        </div>
  ';


 }
}
else
{
 $output .= '
no event
 ';
}
$output = '</div>';
echo $output;
?>
