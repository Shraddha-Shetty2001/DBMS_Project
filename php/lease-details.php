<?php
$set=(isset($_POST['lease_id']))&&(isset($_POST['resident_id']))&&(isset($_POST['lease_term']))&&(isset($_POST['payment_amt']))&&(isset($_POST['payment_date']))&&(isset($_POST['lease_sdate']))&&(isset($_POST['lease_edate']))&&(isset($_POST['lease_payid']));

if($set){
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
     $l_id=test_input($_POST['lease_id']);
     $res_id=test_input($_POST['resident_id']);
     $lease_term=test_input($_POST['lease_term']);
     $lease_sdate=test_input($_POST['lease_sdate']);
     $lease_edate=test_input($_POST['lease_edate']);
     $l_payid=test_input($_POST['lease_payid']);
     $payment_date=test_input($_POST['payment_date']);
     $payment_amt=test_input($_POST['payment_amt']);
    
     $s1="SELECT resident_id FROM resident_details WHERE resident_id = '$res_id' ;";
     $r1=$conn->query($s1);
     if(mysqli_num_rows($r1)==0){
         

         echo "<script>alert('Invalid resident id!')</script>";
         echo "<script>window.history.back()</script>";
         die();
         $conn->close();

     }
     $s2="SELECT lease_id FROM lease_details WHERE lease_id = '$l_id';";
     $r2=$conn->query($s2);
     if(mysqli_num_rows($r2)!=0){
         

         echo "<script>alert('Lease id already exists!')</script>";
         echo "<script>window.history.back()</script>";
         die();
         $conn->close();
    
     }
     $s3="SELECT lease_payid FROM lease_payment WHERE lease_payid='$l_payid';";
     $r3=$conn->query($s3);
     if(mysqli_num_rows($r3)!=0){
         
         echo "<script>alert('Lease pay id already exists!')</script>";
         echo "<script>window.history.back()</script>";
         die();
         $conn->close();



     }
     else{
        $s4="INSERT INTO lease_details(lease_id,resident_id,lease_term,lease_sdate,lease_edate)
        VALUES ('$l_id','$res_id','$lease_term','$lease_sdate','$lease_edate');";  
        
       
       $s4 .= "INSERT INTO lease_payment(lease_payid,lease_id,payment_date,payment_amt)
       VALUES ('$l_payid','$l_id','$payment_date','$payment_amt')";
       
       $r4=$conn->multi_query($s4);
        if(($r4 == TRUE)){
           
   
           echo "<script>alert('Sucess!')</script>";
           echo "<script>window.history.back()</script>";
       }
     }
    
    
    $conn->close();
    
    
    
    
    
    
    

}

else{

    echo "<script>alert('Enter details')</script>";
    echo "<script>window.history.back()</script>";

}








?>