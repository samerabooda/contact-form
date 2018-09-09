<?php 
 
$missing = [];
$error = [];

if (isset($_POST['send'])) {
       
     $user = $_POST['username'];
     $email = $_POST['email'];
     $cell = $_POST['cellphone'];
     $msg = $_POST['massege'];

     $required = ['username','email','massege','gender'];
     $expected = ['username','email','cellphone','massege','gender'];

     if (!isset($_POST['gender'])) {
        $_POST['gender'] = '';
     }

       require 'processmail/mail-process.php';

       
     $to = 'samerabdelmonem96@gmail.com';
     $subject = 'feed back the email';
     $headers = [];
     $headers = 'from :' . $email . '\r\n';

     if (empty($missing)) {

      mail($to, $subject, $msg, $headers);
       echo "<script>alert('Email is successful sended')</script>"; 

      
     }
    
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Form</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:800i" >
	<link rel="stylesheet" href="css/contact.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>	
				<!-- start form -->
	<div class="container">
		<h2 class="text-center">Contact Me</h2>

		<form class="contact-form" action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
                  <!--make sure required field arent blank -->  
           <?php if ($_POST && $suspect) :?>         
            <P class="warning">please ypu find suspect</P>       
           <?php elseif($missing || $error) : ?>
           <P class="warning">fixed item(s) please;</P>       
         <?php  endif;?>

     <label for="username">UserName :
            <?php if($missing && in_array('username', $missing)) : ?>
              <p class="warning">please enter the user name </p>
            <?php endif; ?>  
     </label>
			<input 
         class="form-control" 
         type="text" 
         name="username" 
         placeholder="Type your user name"
         <?php if ($missing || $error) {
             echo 'value = "'.htmlentities($user).'"';
         }?>
   />
			<i class="fa fa-user fa-fw"></i>


			<label for="email">Email :
             <?php if($missing && in_array('email', $missing)) : ?>
              <p class="warning">please enter the email </p>
            <?php endif; ?>  
       </label>
			<input 
         class="form-control" 
         type="email" 
         name="email" 
         placeholder="type your email"
           <?php if ($missing || $error) {
             echo 'value = "'.htmlentities($email).'"';
         }?>
   />	
 			<i class="fa fa-envelope-o fa-fw"></i>



			<label for="cellphone">cellPhone :
             <?php if($missing && in_array('cellphone', $missing)) : ?>
              <p class="warning">please enter the cellphone </p>
            <?php endif; ?>  

       </label>	
			<input 
         class="form-control" 
         type="text" 
         name="cellphone" 
         placeholder="type your cell phone" 
          <?php if ($missing || $error) {
             echo 'value = "'.htmlentities($cell).'"';
         }?>
          />
			<i class="fa fa-phone fa-fw"></i>


			<label for="massege">Massege :	
            <?php if($missing && in_array('massege', $missing)) : ?>
              <p class="warning">please enter the massegr </p>
            <?php endif; ?>   
       </label>
			<textarea class="form-control" name="massege" placeholder="YourMassege !">
          <?php if ($missing || $error) {
             echo htmlentities($msg);
         }?>   </textarea>

         <fieldset>
            
            <legend>Gender :
                <?php if($missing && in_array('gender', $missing)) :  ?>
                  <p class="warning">please signend the button</p>
                <?php endif; ?>

            </legend>
              <input type="radio" name="gender" value="female"
              <?php if ($_POST && $gender == 'female') {
                echo "checked";
              } ?>

              />
              <label for="female">female</label>
              <input type="radio" name="gender" value="male"
               <?php if ($_POST && $gender == 'male') {
                echo "checked";
              } ?>

              />
              <label for="male">male</label>  
              <input type="radio" name="gender" value="ather way"
               <?php if ($_POST && $gender == 'ather way') {
                echo "checked";
              } ?>
              />
              <label for="ather way">ather way</label>

         </fieldset>


			<input class="btn btn-success" type="submit" value="SendMassege" name="send">
			<i class="fa fa-paper-plane fa-fw send-icon"></i>

		</form>
	</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>