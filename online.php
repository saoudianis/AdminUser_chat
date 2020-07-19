<?php session_start();
error_reporting(0);
if($_SESSION['online']){
                
    echo'<div class="online" style="background-color: green;" id="online"></div>'; 
 }
 else{
     echo'<div class="online" style="background-color: red;" id="online"></div>';
 }
            ?>