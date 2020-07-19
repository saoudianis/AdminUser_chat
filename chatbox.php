<?php
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


           
?>





<doctype html>
    <html>
    <head>
         <!-- the meta tags -->
        <meta charset="utf-8">
        <meta name="author" content="Anis Saoudi">
        <meta name="description" content="learn hacking">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-devuce-widht, initial-scale=1">
        <meta http-equiv="content-language" content="EN,AR" />
         <!-- the icon of the page -->
        <link rel="icon" href="imgs/icon.ico">
              <title>Chat with the admin</title>
        <!-- the link tags -->
      <link rel="stylesheet" href="style.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <!-- Styles -->
        
    </head>
    <body>
        <!-- the page body -->

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Ask Admin</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item log">
                    <a href="userlogin.php?logout=1" class="nav-link">LogOut</a>
                </li>
                
            </ul>
        </div>

    </nav>


        
        
        
        
<div class="chatBox container align-items-center">
    <!--  head of chatBox  --> 
    <div class="cb-head justify-content-center">
       <!--  Print The User Name  --> 
        <div class="col-lg-6">
            <?php 
           
           
            if($_SESSION['online']){
                
               echo'<div class="online"  id="online"></div>'; 
            }
            else{
                echo'<div class="online"  id="online"></div>';
            }
            
            ?>
   
        <h6 class="username">The Admin</h6>
    
    </div> </div>
    
    
    <!--  Messages container  -->
    
    <!--  messages  --> 
       <div id="real"> 
         <?php 
           
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
    
    
    </div>
    
    <div class="send-m">
        <form method="post">
        <input type="text" name="msg" placeholder="your message">
        <input type="submit" name="send" class="btn btn-success" value="send">
            </form>
    </div> 
</div>
        
        
        
        <script>
        $(document).ready(function(){
            setInterval(function(){
                $("#real").load("msgs.php");
            
                $("#online").load("online.php");
            },1000);
            
             }); 
            
       //$("#online").value.hide();
            //$("#online").load("online.php");
           /* var auto_refresh = setInterval( function() { $('#real').load('msgs.php').fadeIn("slow"); }, 15000); // refreshing after every 15000 milliseconds */
            
            

        
        </script>