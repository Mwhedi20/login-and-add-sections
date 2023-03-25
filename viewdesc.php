<!DOCTYPE html>
<?php session_start(); 
if (!isset($_SESSION['log'])) {
    header("Location: login.php"); 
    exit();
 }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AUG Journal</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />
                    </a>
                </div>
              
                 <span class="logout-spn" >
                 <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <button type="submit"  style="color:#fff;background-color:#214761;border:none" name="lgout">Logout</button>
            </form>
            <?php 
              if (isset($_POST["lgout"])) {
                session_destroy();
                header("Location: login.php"); 
              }
            ?>

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                                   
                    <li class="active-link">
                        <a href="Adddesc.php"><i class="fa fa-edit"></i>Add description </a>
                    </li>
                    <li>
                        <a href="viewdesc.php"><i class="fa fa-table"></i>View description</a>
                    </li>

                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Courses المقررات</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                
                                <?php
                                    $coo =new mysqli("localhost","root","","final");
                                    $st=$coo ->query("SELECT * FROM `login`");
                                    if ($st->num_rows>0){ 
                                    echo '<table class="table table-striped table-bordered table-hover">                            <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Id</th>
                                        <th>Course Name</th>                                  
                                        <th colspan="2">Operation</th>                                  
                                    </tr>
                                </thead>
                                <tbody>';
                                    while($row = $st->fetch_assoc())
                                    {
                                        
                                        echo "<tr>"."<td>".$row["id"]."</td>"
                                             ."<td>".$row["courseid"] ."</td>". 
                                             "<td>".$row["coursename"]."</td>"
                                             ."<td><a href='del.php?no=".$row["id"]."'>" ."حذف". "<br></a></td>".
                                             "<td><a href='sel.php?no=".$row["id"]."'>" ."تفاصيل". "</a></td></tr>";
                                }
                                echo '</table>   </tbody> </table>';
                            }
                        
                        
                        else {
                            echo "0results";
                        }
                        $coo->close();
                        
                                ?>
                            
                         

                    </div>
                </div>
                <!-- /. ROW  -->
                

            </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2023 AUG.com | Design by: <a href="http://rami.com" style="color:#fff;"  target="_blank">www.Mohammed.com</a>
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
    <?php include 'i.php' ?>
</body>
</html>
