<?php
$set=(isset($_POST['resident_id']))&&(isset($_POST['phone_num']))&&(isset($_POST['unit_num']))&&(isset($_POST['building_num']))&&(isset($_POST['r_fname']))&&(isset($_POST['r_lname']));
if($set){

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
    $resident_id=test_input($_POST['resident_id']);
    $r_fname=test_input($_POST['r_fname']);
    $l_name=test_input($_POST['r_lname']);
    $phone_num=test_input($_POST['phone_num']);
    $unit_num=test_input($_POST['unit_num']);
    $building_num=test_input($_POST['building_num']);
    
    $servername = "localhost";  
    $username = "root";  
    $password = "";  
    $db="apartment_booking";
    $conn = mysqli_connect ($servername , $username , $password,$db);
    if($conn -> connect_errno){
            echo "Failed to connect to MySQL: " . $conn -> connect_error;
            echo "<div class='alert alert-danger' role='alert'>
            Failed to connect to MySQL:  . $conn -> connect_error
            </div>";
           exit();
           }
    
    
          
            
        $resident_existance_query = "SELECT resident_id from resident_details where resident_id = '".$resident_id."';";
        $query = mysqli_query($conn, $resident_existance_query);
    
        if(mysqli_num_rows($query) != 0)
        {

            echo "<script>alert('Resident ID already exists!')</script>";
            echo "<script>window.history.back()</script>";
            die();
            
            
        }
    
    
        else{
         
        $build_and_unit_existance="SELECT building_num,unit_num FROM unit WHERE building_num = '$building_num' and unit_num = '$unit_num';";
         
        $r = $conn->query($build_and_unit_existance);
        
        if(mysqli_num_rows($r) == 0){
              
            
            echo "<script>alert('No such unit exists in the building')</script>";
            echo "<script>window.history.back()</script>";
            die();
        }
         
        
    
        $s1="SELECT building_num,unit_num FROM unit WHERE building_num = '$building_num'
        and unit_num = '$unit_num' and available = 'yes';";
        
    
        $r1=$conn->query($s1);
    
        if(mysqli_num_rows($r1)!=0){
            $query_stmt = "INSERT INTO resident_details(resident_id,r_fname,r_lname,
            phone_num,unit_num,building_num)
            values ( '$resident_id','$r_fname','$l_name','$phone_num','$unit_num','$building_num');";   
            $query = mysqli_query($conn, $query_stmt);
            
            if (!$query) {
                echo "Couldnt insert. please try again: Error: " . mysqli_error($conn);
               
            }
            else{
                
                
                $s3="UPDATE unit SET available='no' WHERE unit_num = '$unit_num'
                AND building_num = '$building_num'";
                $q3 = mysqli_query($conn, $s3);
                echo "<script>alert('Resident details entered successfully!')</script>";
                echo "<script>window.history.back()</script>";
                die();
    
            }
           
    
    
    
        }
        else{
            echo "<script>alert('Occupied')</script>";
            echo "<script>window.history.back()</script>";
            die();
        }
           
    
        
        
    
    }
    
    
    
    
    
    
      
    
    
    
    
        mysqli_close($conn);









}

else{
    echo "<script>alert('Enter details')</script>";
    echo "<script>window.history.back()</script>";
}







?>
