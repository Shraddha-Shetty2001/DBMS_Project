<script src="https://code.jquery.com/jquery-2.1.4.min.js" integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw=" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js" integrity="sha512-zWbEj9dP1Qn4dGPeqQhAW3cja9ozUfS6wp6P7WR6xoOvb6ebF9r8fZdWZm04nBpzYC3+BKhT7Te13LTUZiCPvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" integrity="sha512-fRVSQp1g2M/EqDBL+UFSams+aw2qk12Pl/REApotuUVK1qEXERk3nrCFChouag/PdDsPk387HJuetJ1HBx8qAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<?php
$set=(isset($_POST['building_num']))&&(isset($_POST['unit_number']))&&(isset($_POST['num_bedroom']));
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
    
    $building_num=test_input($_POST['building_num']);
    $unit_num=test_input($_POST['unit_number']);
    $num_bedroom=test_input($_POST['num_bedroom']);
    
    
    
    $s1="SELECT * FROM unit WHERE building_num='$building_num' AND unit_num='$unit_num';";
    $res=$conn->query($s1);
    if($res->num_rows === 0){
    
    $sql1="INSERT INTO unit(unit_num,building_num,num_bedroom,available)
    VALUES ('$unit_num','$building_num','$num_bedroom','yes');";
    if(($conn->query($sql1)===TRUE)){
        
       
        echo "<script>alert('Sucess!')</script>";
        echo "<script>window.history.back()</script>";
        die();
    
    
        
    }
    
    }
    else{
        
        echo "<script>alert('Already exists!')</script>";
        echo "<script>window.history.back()</script>";
        die();
    }
    
    
    
    $conn->close();
}
else{
    echo "<script>alert('Enter details')</script>";
    echo "<script>window.history.back()</script>";
    
}



?>