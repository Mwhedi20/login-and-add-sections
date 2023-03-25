<form  method="post">
<button type = "submit" name = "f">yes</button>
<?php session_start(); 
if (!isset($_SESSION['log'])) {
    header("Location: login.php"); 
    exit();
 }?>
<button type = "submit" name = "n">no</button>
</form>
<?php
if (isset($_POST["f"])) {
$a=$_GET["no"];
$coo =new mysqli("localhost","root","","final");
$st=$coo ->query(" delete from login where id='$a'");
header("location:Adddesc.php");
$coo->close();
}

elseif(isset($_POST["n"])) {

echo"no";

}

?>