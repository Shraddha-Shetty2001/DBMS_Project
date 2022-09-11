<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     
    <style>
    li{
      font-weight: bold;
      font-size: 1.2rem;
    }
  </style>



    <title>View Resident</title>
  </head>
  <body>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="adminlogin.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">View Resident</li>
        </ol>
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
    $stmt="SELECT * FROM resident_details ;";
    $res = $conn->query($stmt);
    
  ?>
  <div class="container">
        <h2 style="margin-top: 5rem; text-align: center;">Resident  Details</h2>
        <table class="table table-success m-4">
            <thead>
              <tr>
                <th scope="col">Resident ID</th>
                <th scope="col">Building Number</th>
                <th scope="col">Unit Number</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone number</th>

              </tr>
            </thead>
            <tbody>
            <?php

                 while($data = mysqli_fetch_array($res))
                {
                          echo "<tr>";
                          echo "<td>".$data['resident_id']."</td>";
                          echo "<td>".$data['building_num']."</td>";
                          echo "<td>".$data['unit_num']."</td>";
                          echo "<td>".$data['r_fname']."</td>";
                          echo "<td>".$data['r_lname']."</td>";
                          echo "<td>".$data['phone_num']."</td>";
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