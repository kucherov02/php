<?php

    if (file_exists('database/users.csv')){
    $file = fopen('database/users.csv', 'r');
    $str = file_get_contents('database/users.csv');
    $users = explode("\n", $str);
    fclose($file);
    } else {
        file_put_contents('database/users.csv', '');
    }
     
?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style> 
       .container {
           width: 400px;
       }
   </style>
</head>
<body style="padding-top: 3rem;">
 
<div class="container">
   <?php 

   for($i = 0; $i < count($users) - 1; $i++) {
    $user = explode(",", $users[$i]);
    echo $user[0]. " ".$user[1]." ".$user[2]. " ";

   if($user[3] == ''){
     echo "<img height='50px' src='public\images\def.png'>"; 
    }  else{
     echo "<img height='50px' src='$user[3]'>";
    }   
      
     

    if($i != count($users)-2){
        echo "<hr>";
    }
    }
   ?>
   <hr>
   <a class="btn" href="adduser.php">return back</a>
   <a class="btn" href="table.php">view list</a>
</div>
</body>
</html>
