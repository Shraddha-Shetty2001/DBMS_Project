function validate(){
    var username= document.getElementById("username").value;
    var password= document.getElementById("password").value;
    if(username==="admin" && password==="admin"){
        
        window.location.href='adminlogin.html';
       

    }
    else{
       
        window.location.href='login1.html';
        
    }

}