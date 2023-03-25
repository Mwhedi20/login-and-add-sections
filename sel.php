<!DOCTYPE html>
<html lang="en">
<?php session_start(); 
if (!isset($_SESSION['log'])) {
    header("Location: login.php"); 
    exit();
 }?>
<head>
    <?php $aa=$_GET["no"]; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Description</title>
<style>
    table {
      margin-left:550px;
      border-collapse: collapse;
      margin-top:50px; 
      text-align:center;
      width:400px;
      height:250px;
      font-size:20px;
    }
    img{
width:100px;
height:100px;

    }
    td, th {
      border: 1px solid black;
      padding: 5px;
    }
</style>
</head>
<body>
<table>
<tr>
    <th colspan="2"> description for subject <?php echo $aa; ?></th>
</tr>
<?php
$coo =new mysqli("localhost","root","","final");
$st=$coo ->query(" SELECT * FROM `login` where id='$aa'");
if ($st->num_rows>0){   
    while($row = $st->fetch_assoc())
    {   
        
        echo  "<tr><td> ID </td><td>".$row["id"]."</td>"."<tr><td> course name </td><td>".$row["coursename"]."</td>".
        "<tr><td> description </td><td>".$row["description"]."</td>".
        "<tr><td> Image </td><td>" ."<img src='".$row ["image"]."' alt=''>"."</td>";
        
    }
}
else {
    echo "0results";
}
$coo->close();
?>

</table>
<center>
<br>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <button type="submit" name="back">Back to First Page</button>
    </form>
    <?php 
  if (isset($_POST["back"])) {
      header ("location: Adddesc.php");
    }
    ?>
    </center>
</body>
</html>