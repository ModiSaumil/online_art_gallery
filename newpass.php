<!DOCTYPE html>
<?php
include './connection.php';
session_start();
if(!($_SESSION['fotp']))
{
    header("location:enterotp.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Password form</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="./newpass.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./checkpass.js"></script>


</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="forgotcontainer" id="forgotcontainer">
        <div class="form-forgot-container for-container">

            <form action="#" method="POST">


                <h1>Enter New Password</h1>
               
                <input name="password" required type="password" id="psw" onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="password"/>
			    <input name="confirm" required type="password" onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="re-enter password"/> 
				
				<div id="message">
					<h5>Password must contain the following:</h5>
					<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
					<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
					<p id="number" class="invalid">A <b>number</b></p>
					<p id="length" class="invalid">Minimum <b>8 characters</b></p>
				  </div>
								  
				  <script>
				  var myInput = document.getElementById("psw");
				  var letter = document.getElementById("letter");
				  var capital = document.getElementById("capital");
				  var number = document.getElementById("number");
				  var length = document.getElementById("length");
				  
				  // When the user clicks on the password field, show the message box
				  myInput.onfocus = function() {
					document.getElementById("message").style.display = "block";
				  }
				  
				  // When the user clicks outside of the password field, hide the message box
				  myInput.onblur = function() {
					document.getElementById("message").style.display = "none";
				  }
				  
				  // When the user starts to type something inside the password field
				  myInput.onkeyup = function() {
					// Validate lowercase letters
					var lowerCaseLetters = /[a-z]/g;
					if(myInput.value.match(lowerCaseLetters)) {  
					  letter.classList.remove("invalid");
					  letter.classList.add("valid");
					} else {
					  letter.classList.remove("valid");
					  letter.classList.add("invalid");
					}
					
					// Validate capital letters
					var upperCaseLetters = /[A-Z]/g;
					if(myInput.value.match(upperCaseLetters)) {  
					  capital.classList.remove("invalid");
					  capital.classList.add("valid");
					} else {
					  capital.classList.remove("valid");
					  capital.classList.add("invalid");
					}
				  
					// Validate numbers
					var numbers = /[0-9]/g;
					if(myInput.value.match(numbers)) {  
					  number.classList.remove("invalid");
					  number.classList.add("valid");
					} else {
					  number.classList.remove("valid");
					  number.classList.add("invalid");
					}
					
					// Validate length
					if(myInput.value.length >= 8) {
					  length.classList.remove("invalid");
					  length.classList.add("valid");
					} else {
					  length.classList.remove("valid");
					  length.classList.add("invalid");
					}
				  }
				  </script>
                         <button name="Submit" value="submit">Submit</button>
                         <?php 
//                         echo $_SESSION['fotp'];
//                         echo $_SESSION['fmail'];
                         //update password
                          if (isset($_POST["Submit"])) {
                           // echo $_SESSION['fmail'];
                            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            $up = "update tblregistration set password='".$hash."' where email='".$_SESSION['fmail']."'";
                            $result = mysqli_query($con, $up);

                            if (!($result)) {
                                echo "no updated";
                            }
                            else {
                                $_SESSION['fotp']=Null;
                                header("location:index.php");
                            }    
                        }
                         ?>
                
                            
           </form>

        </div>

    </div>
    

    <footer>
<!--        <p>
            Created with <i class="fa fa-heart"></i>
        </p>-->
    </footer>
    <!-- partial -->
    
</body>

</html>