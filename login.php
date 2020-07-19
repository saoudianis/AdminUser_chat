<?php
error_reporting(0);
session_start();
if($_SESSION['admin']=="admin"){
 
$_SESSION['online']=="online";
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
?>
<html>
    <head> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        <link rel="stylesheet" href="stl.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
         <!-- style -->   
       
    </head>
     <body>
         
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Admin Control Chat</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item log">
                    <a href="adminlogin.php?logout=1" class="nav-link">LogOut</a>
                </li>
                
            </ul>
        </div>

    </nav>
         
         <!-- The page -->

         <div class="chatBox container align-items-center">
    <!--  head of chatBox  --> 
    <div class="cb-head justify-content-center">
       <!--  Print The User Name  --> 
        <div class="col-lg-6">
    <div class="online"></div>
        <h6 class="username">The Users</h6>
    
    </div> </div>
    
    
    <!--  Messages container  -->
    
    <!--  messages  --> 
        <div id="real">
        <?php echo '<div class="cb-msgs container">';
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
    
    </div>
    
    
    <div class="send-m">
        <form method="post">
        <input type="text" name="msg" placeholder="your message">
        <input type="submit" name="send" class="btn btn-success" value="send">
        <input type="text" name="user" placeholder="user id">
            </form>
    </div> 
</div>
         
         
         
         
         
         
         
         
         
         
         
         
         
         <!-- js -->
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
         
         <script>
          $(document).ready(function(){
            setInterval(function(){
                $("#real").load("reload.php");},1000);
             }); 
         
         </script>
         
    </body>