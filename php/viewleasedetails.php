<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>View Lease Details</title>
    <style>
        .container{
            margin-top:3rem;
        }
        li{
      font-weight: bold;
      font-size: 1.2rem;
    }
    </style>
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
          <li class="breadcrumb-item active" aria-current="page">Lease Details</li>
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
    $stmt="SELECT lease_details.lease_id,lease_details.resident_id,
    lease_details.lease_term,lease_details.lease_sdate,lease_details.lease_edate,
    lease_payment.lease_payid,lease_payment.payment_date,lease_payment.payment_amt 
    FROM lease_details INNER JOIN lease_payment ON 
    lease_details.lease_id=lease_payment.lease_id ;";
    $res = $conn->query($stmt);
    
  ?>
  <div class="container">
      <h3 style="text-align:center;margin-bottom:2rem;">View Lease Details</h3>
    <table class="table table-success">
  <thead>
    <tr>
      
      <th scope="col">Lease ID</th>
      <th scope="col">Resident ID</th>
      <th scope="col">Lease Term</th>
      <th scope="col">Lease Start Date</th>
      <th scope="col">Lease End Date</th>
      <th scope="col">Lease Pay ID</th>
      <th scope="col">Payment Date</th>
      <th scope="col">Payment Amount</th>

    </tr>
  </thead>
  <tbody>

<?php

while($data = mysqli_fetch_array($res))
{
  echo "<tr>";
      echo "<td>".$data['lease_id']."</td>";
      echo "<td>".$data['resident_id']."</td>";
      echo "<td>".$data['lease_term']."</td>";
      echo "<td>".$data['lease_sdate']."</td>";
      echo "<td>".$data['lease_edate']."</td>";
      echo "<td>".$data['lease_payid']."</td>";
      echo "<td>".$data['payment_date']."</td>";
      echo "<td>".$data['payment_amt']."</td>";
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