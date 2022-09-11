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
$phone_num=test_input($_POST['phone_num']);
$s1="SELECT * FROM resident_details WHERE resident_id = '$resident_id';";
$r1=$conn->query($s1);
if(mysqli_num_rows($r1)==0){
    echo "<script>alert('No such resident id exists!!')</script>";
    echo "<script>window.history.back()</script>";

    
}
else{
  
$s2="UPDATE resident_details SET phone_num='$phone_num' WHERE 
resident_id = '$resident_id' ;";
$r2=$conn->query($s2);
if($r2 == TRUE){
    echo "<script>alert('Sucess!!')</script>";
    echo "<script>window.history.back()</script>";
}
else{
    echo $conn->error();
}
}


$conn->close();











?>