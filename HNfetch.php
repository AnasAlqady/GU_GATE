<html>
<head>

    
        <!-- Core Stylesheet -->
    <link rel="stylesheet" href="css/swiper.min.css"/>
    <link rel="stylesheet" href="style.css">
    
</head>
</html>
<?php
include('database/database_connection.php');
$query = "SELECT * FROM news ORDER BY image_id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$number_of_rows = $statement->rowCount();
$output = '';
if($number_of_rows > 0)
{
 foreach($result as $row)
 { 
  $output .= '
                  <div class="swiper-slide">
                    <div class="imgBx">
                        <a href="'.$row["image_link"].'" ><img src="database/event/'.$row["image_name"].'" width="100" height="100" /></a>
                    </div>
                    <div class="details">
                        <h3>'.$row["image_description"].'</h3>
                    </div>
                  </div>
                  
        
  ';
 }
}
else
{
 $output .= '
<h1>NO news now</h1>
 ';
}

echo $output;
?>
<script src="js/swiper.min.js"></script>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>   
    
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>
<script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
      },
      pagination: {
        el: '.swiper-pagination',
      },
    });
  </script>