﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php session_start(); 
if (!isset($_SESSION['log'])) {
    header("Location: login.php"); 
    exit();
 }?>
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

                <span class="logout-spn">
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
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Courses description وصف المقررات</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Course Name اسم المقرر</label>
                                <input type="text" class="form-control" name="a" />

                            </div>

                            <div class="form-group">
                                <label>Course Id رمز المقرر </label>
                                <input type="text" class="form-control" name="b" />

                            </div>

                            <div class="form-group">
                                <label>Image صورة</label>
                                <input type="file" class="form-control" id="f" name="aa" />

                            </div>

                            <div class="form-group">
                                <label> description وصف المقرر </label>
                                <textarea rows="5" name="x" class="form-control"></textarea>
                            </div>

                            <div class="form-group">

                                <input type="submit" class="btn btn-warning" name="btn" />

                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST["btn"])) {
                        if (empty(($_POST["a"]) || ($_POST["b"]))) {
                            echo "ادخل الاسم للمقرر و الرمز ";
                        } else {
                            $q = htmlspecialchars($_POST["a"]);
                            $e = htmlspecialchars($_POST["b"]);
                            $t = htmlspecialchars($_POST["x"]);
                            $em = basename($_FILES["aa"]["name"]);
                            move_uploaded_file($_FILES["aa"]["tmp_name"], $em);

                            $coo = new mysqli("localhost", "root", "", "final");
                            $st = $coo->query("INSERT INTO `login`
                            ( `coursename`, `courseid`, `image`, `description`)
                            VALUES ('$q','$e','$em','$t')");
                            echo $em;
                            $coo->close();
                        }
                    }
                    ?>
                </div>
                <!-- /. ROW  -->

            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">


        <div class="row">
            <div class="col-lg-12">
                &copy; 2023 AUG.com | Design by: <a href="http://rami.com" style="color:#fff;" target="_blank">www.Mohammed.com</a>
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