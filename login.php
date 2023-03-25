<!DOCTYPE html>
<html lang="en">
<head>
<?php session_start(); ?>
	<title>login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="teach.png" alt="IMG">
				</div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="login100-form validate-form">
    <span class="login100-form-title">
         Login Page:
    </span>

    <div class="wrap-input100 validate-input">
        <input class="input100" type="text" name="username" placeholder="UserName=Mhmd">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <input class="input100" type="password" name="password" placeholder="Password=0000">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
        </span>
    </div>

    <div class="container-login100-form-btn">
        <button name="b" class="login100-form-btn">
            Login
        </button>
        <br>
        <?php


if (isset($_POST["b"]))
{
    if (empty(($_POST["username"])||($_POST["password"]))) {     
        echo"ادخل الاسم وكلمة المرور ";
      } else {    

if((($_POST["username"]=="Mhmd")&&($_POST["password"]=="0000"))) 
{
   $_SESSION['log'] = 'OK';
    header ("location: Adddesc.php");

   }
   else{
    echo"Wrong UserName Or Password";

   }

         }
    
}

?>
    </div>
<br>
<br>
<br>
<br>
<br>
</form>

			</div>
		</div>

	</div>
</body>
<footer>
    <center  class="container-footer ">

        جميع الحقوق محفوظة - محمد عمر الوحيدي
    </center>
</footer>
</html>
