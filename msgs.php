<?php 
           //up
error_reporting(0);
session_start();
if($_SESSION['id']){
$link= mysqli_connect("localhost","root","","note");

$r= mysqli_query($link,"select * from chat");

$msg= mysqli_real_escape_string($link ,$_POST['msg']);
$id= $_SESSION['id'];
    


//buttons
$sqls ="";
    $usr="0";
if($_POST['send']){
    $sqls = "INSERT INTO chat 
         (msg,type,user) VALUES ('$msg', '$usr','$id')";

    mysqli_query($link,$sqls);
    header("location: chatbox.php");
}

}










//msgs
           echo '<div class="cb-msgs container" id="cb-msgs">';
    while ($row = mysqli_fetch_array($r))
        {
    
           if(($row["user"]==$id) AND ($row["type"]=="0")){ 
        
         
               echo '<div class="from-u row">'; 
                echo $row["msg"]; 
                echo '</div>';}
        
                
        
        
        
         if(($row["user"]==$id) AND ($row["type"]=="1")){  
        
        

            echo '<div class="from-a row">';
            
            echo $row["msg"];
            echo '</div>';
        } 
     } echo '</div>';
          
           ?>