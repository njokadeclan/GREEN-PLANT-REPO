<?php require_once('../zvinodiwa/database.php');
      require_once('../zvinodiwa/session.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>AgriBoost | Dashboard </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../vendor/Jquery-ui/jquery-ui.min.css">
<!--===============================================================================================-->
</head>
    <body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php  include_once ('page-headers.php'); ?>
            <div class="line"></div>
            <?php
                            if(isset($db,$_POST['submit'])){
                            $name = mysqli_real_escape_string($db,$_POST['name']);
                            $surname = mysqli_real_escape_string($db,$_POST['surname']);
                            $username = mysqli_real_escape_string($db,$_POST['username']);
                            $password = mysqli_real_escape_string($db,$_POST['password']);         
                            $password = md5($password);
                            $sql_e = "SELECT * FROM users WHERE username ='$username'";
                            $res_e = mysqli_query($db, $sql_e);
                            if(mysqli_num_rows($res_e) > 0){
                            ?>
                             <div class="alert alert-danger  animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'Sorry its seems like you are trying to duplicate items';?></div>
                        <?php    
                       }else{      
                  
                $sql = "INSERT INTO users(name,surname,username,password,type)VALUES('$name','$surname','$username','$password','user')";
                $results = mysqli_query($db,$sql);
                        
                        
                        
                        if($results==1){
                              ?>
                        <div class="alert alert-success  animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Thank you for adding crops ';?></div>
                        <?php

                          }else{
                                ?>
                         <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Error! </strong><?php echo'OPPS something went wrong';?></div>
                        <?php    
                          }      
                      }
                 }

                
                ?>    
            <div class="line"></div>
            <div class="row">
            <div class="col-md-12 ssm">
            <div class="card">
            <p class="card-header sammac-media">Add Details </p>    
            <div class="card-body">
              <form action="users_add.php" method="post">
             <div class="row">
             <div class="col-md-6 form-group">
                 <label>Name</label>
                 <input type="text" name="name" class="form-control" pattern="[a-zA-Z ]{3,20}" maxlength="20" placeholder="tendai" required>
             </div>  
              <div class="col-md-6 form-group">
                 <label>Surname</label>
                 <input type="text" name="surname" class="form-control" pattern="[a-zA-Z ]{3,20}" maxlength="20" placeholder="doe" required>
             </div>       
                 
             </div>  
         <div class="row">
             <div class="col-md-6 form-group">
                 <label>Username</label>
                 <input type="text" name="username" class="form-control" pattern="[a-zA-Z ]{3,20}" maxlength="20" placeholder="tindo" required>
             </div>  
              <div class="col-md-6 form-group">
                 <label>Password</label>
                 <input type="password" name="password" class="form-control"  maxlength="20" placeholder="" required>
             </div>
             
                 
             </div>  
                <div class="row">
                <div class="col-md-6 form-group">
                <button type="submit" name="submit" class="btn btn-success btn-block"><span class="fa fa-check"></span> Add</button>  
                </div> 
                 <div class="col-md-6 form-group">
                <button type="reset" class="btn btn-danger btn-block"><span class="fa fa-times"></span> Cancel</button>  
                </div>    
                </div>
                
             </form>
            </div>
            </div>    
            </div>
           
            </div>
             <div class="line"></div>
               <footer>
            <p class="text-center sm-sys">
           AgriBoost 2008 - <?php echo date('Y');?> &copy; All Rights Reserved Made with &#9829; by sammac media  
            </p>
            </footer>
           <div class="line"></div> 
        
        </div>
    </div>
  
       
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
    <script src="../vendor/Jquery-ui/jquery-ui.min.js"></script>
    <script>
  $( function() {
   $("#ssm").datepicker({
    minDate: 0,
    maxDate:1,
});
      
  } );
  </script>
   
</body>
</html>