<?php
$conn=new mysqli("localhost","root","","apartment_booking");
if($conn -> connect_errno){
    echo "Failed to connect to MySQL: " . $conn -> connect_error;
echo "<div class='alert alert-danger' role='alert'>
Failed to connect to MySQL:  . $conn -> connect_error
</div>";
exit();
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  $resident_id=test_input($_POST['resident_id']);
  $s1="SELECT resident_id FROM resident_details WHERE resident_id ='$resident_id';";
  $r1=$conn->query($s1);
  if(mysqli_num_rows($r1)==0){
     
      echo "<script>alert('Invalid resident id!!')</script>";
      echo "<script>window.history.back()</script>";
      die();

      
  }
  else{

    $stmt="SELECT unit_num,building_num FROM resident_details WHERE resident_id = '$resident_id';";
  $res=$conn->query($stmt);
  $r_set=$res->fetch_assoc();
  $u=$r_set['unit_num'];
  $b=$r_set['building_num'];
 

  $s2 ="DELETE FROM lease_payment WHERE lease_id IN (SELECT lease_id
        FROM lease_details WHERE resident_id = '$resident_id');";
  $s3 = "DELETE FROM lease_details WHERE resident_id = '$resident_id';";
  $s4 = "DELETE FROM resident_details WHERE resident_id = '$resident_id';";

  $r2 = $conn->query($s2);
  $r3 = $conn->query($s3);
  $r4 = $conn->query($s4);
  if($r2==TRUE){
      if($r3==TRUE){
          if($r4==TRUE){
              
               
              echo "<script>alert('SUCESS')</script>";
              echo "<script>window.history.back()</script>";
              

              echo $u ."<br>".$b;
              $s5="UPDATE unit SET available = 'yes' WHERE unit_num = '$u' AND building_num = '$b';";
              $conn->query($s5);
          }
      }
  }
  else{
      echo $conn->error();
  }

  }
  








  $conn->close();




 ?>