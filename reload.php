<?php 
//up
error_reporting(0);
session_start();
if($_SESSION['admin']=="admin"){

    $link= mysqli_connect("localhost","root","","note");

$r= mysqli_query($link,"select * from chat");

$msg= mysqli_real_escape_string($link ,$_POST['msg']);
$id= $_SESSION['admin'];
$user= mysqli_real_escape_string($link ,$_POST['user']); 


//buttons
$sqls ="";
    $from="1";
if($_POST['send']){
    $sqls = "INSERT INTO chat 
         (msg,type,user) VALUES ('$msg', '$from','$user')";

    mysqli_query($link,$sqls);
    header("location: login.php");
}

    
}



//msgs
echo '<div class="cb-msgs container">';
    while ($row = mysqli_fetch_array($r))
        {
    
           if($row["type"]=="1"){ 
        
         
               echo '<div class="from-u row">'; 
                echo $row["msg"]; 
                echo '</div>';}
        
                
        
        
        
         if($row["type"]=="0"){  
        
        

            echo '<div class="from-a row">';
            
            echo $row["msg"];
             echo '<strong style="color: red">'.$row["user"].'</strong>';
             
            echo '</div>';
        } 
     } echo '</div>';?>