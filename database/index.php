<?
session_start();
if(empty($_SESSION['user'])){
    header("location:http://localhost/JU_GATE/login.php");
    die;
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Admin</title>
  <script src="assest/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assest/style.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="assest/bootstrap.min.js"></script>
 </head>
 <body>
     
     
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Admin')" id="defaultOpen">Admin</button>
  <button class="tablinks" onclick="openCity(event, 'Event')">Event</button>
  <button class="tablinks" onclick="openCity(event, 'News')">News</button>
  <button class="tablinks" onclick="openCity(event, 'Learn')">Learn</button>
  <button class="tablinks" onclick="openCity(event, 'subscribe')">Subscribers</button>
  <button class="tablinks" onclick="openCity(event, 'logout')">logout</button>
</div>

<div id="Admin" class="tabcontent">
    <br />
    <div class="container">
        <h3 align="center">أهلا بك في الصفحة الرسمية للآدمن</h3>
        <h3 align="center">بإمكانك أن تضيف وأن تعدل على آخر الأخبار واضافة الايفنتات كل اسبوع</h3>
        <h3 align="center">إن أردت أن تتعلم طريقة الاضافة والحذف عليك فقط الذهاب لتبويب التعلم</h3>
        <h3 align="center">إن واجهتك مشكلة في النظام أو لاحظت تغيير على الموقع لم تقم أنت به لا تتردد بالتواصل معنا </h3>
        <h3 align="center">**تذكر لا تعطِ اسم المستخدم او كلمة السر لمن كان *** </h3>
        <div class="container">
            <div class="cont">
              <img src="assest/images.png" alt="malak" style="width:90px">
              <p><span>Malak-Alyamani</span> </p>
              <p>Student from IT school</p>
              <a href="#" class="fa fa-facebook"><span>Facebook</span></a> <span></span><span></span><span></span><span></span>       
              <a href="#" class="fa fa-phone-square"><span>0788186434</span></a> <span></span><span></span><span></span><span></span>         
            </div>
            <div class="cont">
              <img src="assest/images.png" alt="yassmin" style="width:90px">
              <p><span>Yassmin-Yasin</span> </p>
              <p>Student from IT school</p>
              <a href="#" class="fa fa-facebook"><span>Facebook</span></a> <span></span><span></span><span></span><span></span>       
              <a href="#" class="fa fa-phone-square"><span>0788186434</span></a> <span></span><span></span><span></span><span></span>         
            </div>
            <div class="cont">
              <img src="assest/images.png" alt="yassmin" style="width:90px">
              <p><span>Anas-Alqadi</span> </p>
              <p>Student from IT school</p>
              <a href="#" class="fa fa-facebook"><span>Facebook</span></a> <span></span><span></span><span></span><span></span>       
              <a href="#" class="fa fa-phone-square"><span>0788186434</span></a> <span></span><span></span><span></span><span></span>         
            </div>
        </div>
    </div>
</div>

<div id="Event" class="tabcontent">
  <br />
  <div class="container">
   <h3 align="center">ADD EVENT To Home page</h3>
   <br />
   <div align="right">
    <input type="file" name="multiple_event" id="multiple_event" multiple />
    <span class="text-muted">Only .jpg, png, .gif file allowed</span>
    <span id="error_multiple_event"></span>
   </div>
   <br />
   <div class="table-responsive" id="event_table">
    
   </div>
  </div>
</div>
<div id="News" class="tabcontent">

  <br />
  <div class="container">
   <h3 align="center">ADD News To Home page</h3>
   <br />
   <div align="right">
    <input type="file" name="multiple_news" id="multiple_news" multiple />
    <span class="text-muted">Only .jpg, png, .gif file allowed</span>
    <span id="error_multiple_news"></span>
   </div>
   <br />
   <div class="table-responsive" id="news_table">
    
   </div>
  </div>
</div>

<div id="Learn" class="tabcontent">
    <br><br>
    <h3 align="center">  : لاضافة ايفينت أو خبر اتبع الخدوات التالية </h3>
    <h6 align="center">أولًا : تأكد أنك في التبويب الصحيح ليتم إضافته في مكانه الصحيح</h6>    
    <h6 align="center"> ثم اختر الصورة التي تريد اضافتها " choos folder "ثانيًا : اذهب الى</h6>    
    <h6 align="center"> ثم اضف او غير العنوان باسم الصورة واضف الوصف والرابط المراد الوصول اليه Edit ثالثًا : اذهب الى </h6>    
    <h3 align="center">التي توجد بجانب الصورة Delete لحذف أي صورة فقط قم بالضغط على </h3>
    <h6 align="center"></h6>    
    <h3 align="center">ليصل ايميل لجميع المشتركين عليك أن ترسل لهم رسالة من صفحة المتابعين</h3>    
    <h6 align="center"></h6>    
</div>     
<div id="subscribe" class="tabcontent">
     <form>
        <div class="form-group">
            <label >add text </label>
            <textarea class="form-control" id="textsend" rows="3"></textarea> 
        </div>
        <button type="send" class="btn btn-primary">send</button>
     </form>
     <div class="card">
            <div class="card-body">

            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'subscribers');

                $query = "SELECT * FROM subscribers";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table id="datatableid" class="table table-bordered table-white">
                    <thead>
                        <tr>
                            <th scope="col"> ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name </th>
                            <th scope="col"> Course </th>
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id']; ?> </td>                            
                            <td> <?php echo $row['name']; ?> </td>                            
                            <td> <?php echo $row['email']; ?> </td>                            
                            <td> <?php echo $row['date_subscribe']; ?> </td>                                                       
                        </tr>
                    </tbody>
            <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                </table>
            </div>
        </div>
</div>
<div id="logout" class="tabcontent">

</div>
 </body>
</html>
<div id="eventModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_image_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Image Details</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Image Name</label>
      <input type="text" name="event_name" id="event_name" class="form-control" />
     </div>
     <div class="form-group">
      <label>Image Description</label>
      <input type="text" name="event_description" id="event_description" class="form-control" />
     </div>
     <div class="form-group">
      <label>Image link</label>
      <input type="text" name="event_link" id="event_link" class="form-control" />
     </div>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="event_id" id="event_id" value="" />
     <input type="submit" name="submit" class="btn btn-info" value="Edit" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </form>
  </div>
 </div>
</div>
<script>
$(document).ready(function(){
 load_event_data();
 function load_event_data()
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   success:function(data)
   {
    $('#event_table').html(data);
   }
  });
 } 
 $('#multiple_event').change(function(){
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_event')[0].files;
  if(files.length > 10)
  {
   error_images += 'You can not select more than 10 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_event").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_event").files[i]);
    var f = document.getElementById("multiple_event").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_event').files[i]);
    }
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_event').html('<br /><label class="text-primary">Uploading...</label>');
    },   
    success:function(data)
    {
     $('#error_multiple_event').html('<br /><label class="text-success">Uploaded</label>');
     load_event_data();
    }
   });
  }
  else
  {
   $('#multiple_event').val('');
   $('#error_multiple_event').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });  
 $(document).on('click', '.edit', function(){
  var event_id = $(this).attr("id");
  $.ajax({
   url:"edit.php",
   method:"post",
   data:{event_id:event_id},
   dataType:"json",
   success:function(data)
   {
    $('#eventModal').modal('show');
    $('#event_id').val(event_id);
    $('#event_name').val(data.event_name);
    $('#event_description').val(data.event_description);
    $('#event_link').val(data.event_link);
   }
  });
 }); 
 $(document).on('click', '.delete', function(){
  var event_id = $(this).attr("id");
  var event_name = $(this).data("event_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"delete.php",
    method:"POST",
    data:{event_id:event_id, event_name:event_name},
    success:function(data)
    {
     load_event_data();
     alert("Image removed");
    }
   });
  }
 }); 
 $('#edit_image_form').on('submit', function(event){
  event.preventDefault();
  if($('#event_name').val() == '')
  {
   alert("Enter Image Name");
  }
  else
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:$('#edit_image_form').serialize(),
    success:function(data)
    {
     $('#eventModal').modal('hide');
     load_event_data();
     alert('Image Details updated');
    }
   });
  }
 }); 
});
</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
    
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<div id="newsModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="POST" id="edit_news_form">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal">&times;</button>
     <h4 class="modal-title">Edit Image Details</h4>
    </div>
    <div class="modal-body">
     <div class="form-group">
      <label>Image Name</label>
      <input type="text" name="image_name" id="image_name" class="form-control" />
     </div>
     <div class="form-group">
      <label>Image Description</label>
      <input type="text" name="image_description" id="image_description" class="form-control" />
     </div>
     <div class="form-group">
      <label>Image link</label>
      <input type="text" name="image_link" id="image_link" class="form-control" />
     </div>
    </div>
    <div class="modal-footer">
     <input type="hidden" name="image_id" id="image_id" value="" />
     <input type="submit" name="submit" class="btn btn-info" value="Edit" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </form>
  </div>
 </div>
</div>
<script>
$(document).ready(function(){
 load_event_data();
 function load_event_data()
 {
  $.ajax({
   url:"Nfetch.php",
   method:"POST",
   success:function(data)
   {
    $('#news_table').html(data);
   }
  });
 } 
 $('#multiple_news').change(function(){
  var error_images = '';
  var form_data = new FormData();
  var files = $('#multiple_news')[0].files;
  if(files.length > 10)
  {
   error_images += 'You can not select more than 10 files';
  }
  else
  {
   for(var i=0; i<files.length; i++)
   {
    var name = document.getElementById("multiple_news").files[i].name;
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
    {
     error_images += '<p>Invalid '+i+' File</p>';
    }
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("multiple_news").files[i]);
    var f = document.getElementById("multiple_news").files[i];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000)
    {
     error_images += '<p>' + i + ' File Size is very big</p>';
    }
    else
    {
     form_data.append("file[]", document.getElementById('multiple_news').files[i]);
    }
   }
  }
  if(error_images == '')
  {
   $.ajax({
    url:"Nupload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#error_multiple_news').html('<br /><label class="text-primary">Uploading...</label>');
    },   
    success:function(data)
    {
     $('#error_multiple_news').html('<br /><label class="text-success">Uploaded</label>');
     load_event_data();
    }
   });
  }
  else
  {
   $('#multiple_news').val('');
   $('#error_multiple_news').html("<span class='text-danger'>"+error_images+"</span>");
   return false;
  }
 });  
 $(document).on('click', '.edit', function(){
  var image_id = $(this).attr("id");
  $.ajax({
   url:"Nedit.php",
   method:"post",
   data:{image_id:image_id},
   dataType:"json",
   success:function(data)
   {
    $('#newsModal').modal('show');
    $('#image_id').val(image_id);
    $('#image_name').val(data.image_name);
    $('#image_description').val(data.image_description);
    $('#image_link').val(data.image_link);
   }
  });
 }); 
 $(document).on('click', '.delete', function(){
  var image_id = $(this).attr("id");
  var image_name = $(this).data("image_name");
  if(confirm("Are you sure you want to remove it?"))
  {
   $.ajax({
    url:"Ndelete.php",
    method:"POST",
    data:{image_id:image_id, image_name:image_name},
    success:function(data)
    {
     load_event_data();
     alert("Image removed");
    }
   });
  }
 }); 
 $('#edit_news_form').on('submit', function(event){
  event.preventDefault();
  if($('#image_name').val() == '')
  {
   alert("Enter Image Name");
  }
  else
  {
   $.ajax({
    url:"Nupdate.php",
    method:"POST",
    data:$('#edit_news_form').serialize(),
    success:function(data)
    {
     $('#newsModal').modal('hide');
     load_event_data();
     alert('Image Details updated');
    }
   });
  }
 }); 
});
</script>
