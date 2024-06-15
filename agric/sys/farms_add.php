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
                            $phone = mysqli_real_escape_string($db,$_POST['phone']);
                            $region = mysqli_real_escape_string($db,$_POST['region']);         
                            $joined_date = date('Y-m-d');
                            $sql_e = "SELECT * FROM farmers WHERE phone ='$phone'";
                            $res_e = mysqli_query($db, $sql_e);
                            if(mysqli_num_rows($res_e) > 0){
                            ?>
                             <div class="alert alert-danger  animated shake" >
                       <?php echo'Sorry the phone is already registered';?></div>
                        <?php    
                       }else{      
                  
                $sql = "INSERT INTO farmers(name,surname,phone,region,joined_date)VALUES('$name','$surname','$phone','$region','$joined_date')";
                $results = mysqli_query($db,$sql);
                        
                        
                        
                        if($results==1){
                              ?>
                        <div class="alert alert-success  animated bounce" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Thank you for adding new farmer ';?></div>
                        <?php
                            error_reporting(0);
                            $username = 'samstrover';
                            $token = 'e14916d71b35f236e25a3fe9fc8c4449';
                            $bulksms_ws = 'http://portal.bulksmsweb.com/index.php?app=ws';
                            $destinations = $phone;
                            $message = "Hello $name thank you for subscribing to our services. You will receive updates of weather, pest control methods";

                            $ws_str = $bulksms_ws . '&u=' . $username . '&h=' . $token . '&op=pv';
                            $ws_str .= '&to=' . urlencode($destinations) . '&msg='.urlencode($message);
                            $ws_response = @file_get_contents($ws_str); 

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
              <form action="farms_add.php" method="post">
             <div class="row">
             <div class="col-md-6 form-group">
                 <label>Name</label>
                 <input type="text" name="name" class="form-control" pattern="[a-zA-Z ]{3,20}" maxlength="20" placeholder="tendai" required>
             </div>  
              <div class="col-md-6 form-group">
                 <label>Surname</label>
                 <input type="text" name="surname" class="form-control" pattern="[a-zA-Z ]{3,20}" maxlength="20" placeholder="tindo" required>
             </div>       
                 
             </div>  
         <div class="row">
             <div class="col-md-6 form-group">
                 <label>Phone</label>
                 <input type="text" name="phone" class="form-control" pattern="[0-0]{1,1}[7-7]{1,1}[1-9]{2,2}[0-9]{6,6}" maxlength="20" placeholder="0774328908" required>
             </div>  
              
                 <div class="col-md-6 form-group">
                 <label>Region</label>
                 <select class="form-control" name="region">
                 <option>Bulawayo</option>
                 <option>Harare</option>
                 <option>Manicaland</option> 
                 <option>Mash Central</option>
                 <option>Mash East</option>
                 <option>Mash West</option>
                 <option>Masvingo</option> 
                 <option>Mat North</option>
                 <option>Mat South</option>
                 <option>Midlands</option>     
                 </select>
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