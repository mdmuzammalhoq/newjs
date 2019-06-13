<?php

    include ('../lib/Session.php');
    Session::checkSession();

 include ('../config/config.php');
 include ('../lib/Database.php'); 
 include ('../helpers/Format.php'); 


    $db= new Database();
    $fm = new Format();

  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title> Admin </title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
	 <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>

</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft logo">
                    <img style="width: 80px; height: 50px;" src="img/222.png" alt="Logo" />
				</div>
				<div class="floatleft middle">
					<h1>New Jes Machinery Corporation</h1>
					<p>A Renowned Machinery Shop</p>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                 <?php 
                        if(isset($_GET['action']) && $_GET['action'] == "logout"){
                           Session::destroy(); 
                        }
                  ?>

                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello Admin</li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <!-- <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
				<li class="ic-typography"><a href="changepassword.php"><span>Change Password</span></a></li>
				
                 -->
                <li class="ic-grid-tables"><a href="inbox.php"><span>Inbox</span></a></li>
                <li class="ic-charts"><a href="feedback.php"><span>FeedBack</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                      <!--  <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.html">Title & Slogan</a></li>
                                <li><a href="social.html">Social Media</a></li>
                                <li><a href="copyright.html">Copyright</a></li>
                                
                            </ul>
                        </li> -->
						
                         <li><a class="menuitem">Update Post Option</a>
                            <ul class="submenu">
                                <li><a href="aboutnewjes.php">About New Jes</a></li>
                                
                            </ul>
                            <li><a class="menuitem">Slider Option</a>
                            <ul class="submenu">
                            <li><a href="addslider.php">Add Slider</a></li>
                            <li><a href="sliderlist.php">Slider List</a> </li>
                            </ul>
                        </li>
                        </li>
                        <!-- <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                <li><a href="addcat.html">Add Category</a> </li>
                                <li><a href="catlist.html">Category List</a> </li>
                            </ul>
                        </li> -->
                        <li><a class="menuitem">Category</a>
                            <ul>
                                <li><a href="addcat.php">Add Category</a></li>
                                <li><a href="editcat.php">Edit Category</a></li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Product Option</a>
                            <ul class="submenu">
                            <li><a href="product.php">Add Product</a></li>
                                
                                <li><a href="allproductlist.php">All Products List</a> </li>
                            </ul>
                        </li>

                        <li><a href="OurBusiness.php">Our Business</a></li>
                        <li><a href="CompanyProfile.php">Company Profile</a></li>
                        <li><a href="management.php">Management</a></li>
                        
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
	