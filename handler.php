<?php

    require 'upload.php';

    

    function isEmpty($filePath){
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['gender']) || empty($_FILES['photo'])){       
          return true;  
        } 
        
        if (!file_exists('database/users.csv')) {
                file_put_contents('database/users.csv', '');
             }
            
             $name = $_POST['name'];
             $email = $_POST['email'];
             $gender = $_POST['gender'];

             if($isUploaded = true){
                 $path = $filePath;
             }else{
                 $path = '';
             }

             $fp = fopen('database/users.csv', 'a');
             fwrite($fp, "$name,$email,$gender,$path\n");
             fclose($fp);

        return false;
    }

    filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
   if(isEmpty($filePath)){
    echo '<p style="color: #ff1100">Invalid Data</p>'; 
   }else{
    echo "User Added: " . $_POST["name"] . "<br>".
         "Email: " . $_POST["email"]. "<br>".
         "Gender: " . @$_POST["gender"] . "<br>".
         "Image path: " . $filePath . "<br>";
   }
   ?>
   <hr>
   <a class="btn" href="adduser.php">return back</a>
   <a class="btn" href="table.php">view list</a>
</div>
</body>
</html>
