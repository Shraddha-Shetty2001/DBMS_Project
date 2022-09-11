<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <link href="assets/css/style.css" rel="stylesheet">

    
    
    
    
    
    
    
    <link href="admin.css" rel="stylesheet">
    <title>Admin Page</title>
  </head>
  <body>
    <h1></h1>
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
          </button>
          <a class="navbar-brand text-brand" href="i.html">Apartment <span class="color-b">Booking</span></a>
    
          <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
    
              <li class="nav-item">
                <a class="nav-link active" href="i.html">Home</a>
              </li>
    
              <!--li class="nav-item">
                <a class="nav-link " href="about.html">About</a>
              </li>
    
              <li class="nav-item">
                <a class="nav-link " href="property-grid.html">Property</a>
              </li>
    
             
              <li class="nav-item">
                <a class="nav-link " href="contact.html">Contact</a>
              </li--->
            </ul>
          </div>
    
        
    
        </div>
      </nav>

  
<?php
$conn=new mysqli("localhost","root","","apartment_booking");
if($conn -> connect_errno){
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
echo "<div class='alert alert-danger' role='alert'>
Failed to connect to MySQL:  . $conn -> connect_error
</div>";
exit();
}


$stmt="SELECT * FROM unit WHERE building_num = 2;";
$res = $conn->query($stmt);
?>

<div class="container" style="position:absolute;margin-top:10rem;margin-left:2rem;">
     
        <table class="table table-success">
            <thead>
               
                   <tr>
                     
                     <th scope="col">Unit number</th>
                     <th scope="col">Bedrooms</th>
                     <th scope="col">Available</th>
                   </tr>

            </thead>
             <tbody>

<?php

while($data = mysqli_fetch_array($res))
{

            echo "<tr>";
                
                 echo "<td>".$data['unit_num']."</td>";
                 echo "<td>".$data['num_bedroom']."</td>";
                 echo "<td>".$data['available']."</td>";
                 
                 
            echo "</tr>";

}
                  
           
?>
         </tbody>
       </table>
     </div>
</body>
</html>
<?php

  $conn->close();

?>




