<?php include ('config/config.php'); ?>
<?php include ('lib/Database.php'); ?>
<?php include ('helpers/Format.php'); ?>
<?php include ('inc/header.php'); ?>

<?php 
     $db = new Database(); 
     $fm = new Format();
      
?>

	<?php 
                  $n = "";
		 if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$fname = $fm->validation($_POST['firstname']);
			$lname = $fm->validation($_POST['lastname']);
			$email = $fm->validation($_POST['email']);
			$body = $fm->validation($_POST['body']);
			
			

			$fname = mysqli_real_escape_string($db->link, $fname);
			$lname = mysqli_real_escape_string($db->link, $lname);
			$email = mysqli_real_escape_string($db->link, $email);
			$body = mysqli_real_escape_string($db->link, $body);

			$error = "";
			if(empty($fname)){
				$n =  "first Name Must not be empty !!";
			}elseif(empty($lname)){
				echo "Last Name Must not be empty !!";
		}elseif(empty($email)){
				$n = "Email field Must not be empty !!";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
				$n = "Invalid Email Address !!";
		}
		elseif(empty($body)){
				$n = "Field Must not be empty !!";
		}else{
			$query = "INSERT INTO tbl_contact(fname, lname, email, body) VALUES('$fname', '$lname', '$email', '$body')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                  $n = "Message Sent Successfully.";
                }else {
                   $n = "Message Not Sent";
                }

		}
	} 

	?>

<div style="height: 500px; width: 1000px; background: #fff; border-radius: 5px; ">

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div style="margin: 0 100px;padding: 30px;">
				<h2>Contact us</h2>

                                <?php echo $n; ?>

				<?php 
					if(isset($error)){
						echo "<span style='color:red'>$error</span>";
					}
					if(isset($msg)){
						echo "<span style='color:green'>$msg</span>";
					}
				?>
			<form action="" method="post">
				<table>
				<tr>
					
					<td>
					<input style="width: 300px; height: 25px;border-radius: 0px 7px 7px 0px;     margin-bottom: 15px; border: 1px solid #BFBFBF; padding-left: 7px;" type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					
					<td>
					<input style="width: 300px; height: 25px;border-radius: 0px 7px 7px 0px; margin-bottom: 15px; border: 1px solid #BFBFBF;padding-left: 7px;" type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					
					<td>
					<input style="width: 300px; height: 25px;border-radius: 0px 7px 7px 0px;     margin-bottom: 15px;border: 1px solid #BFBFBF; padding-left: 7px;" type="email" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					
					<td >
					<textarea style="padding-left: 7px; margin: 0px 5px 0px 0px;
    height: 200px;width: 303px; border: 1px solid #BFBFBF;padding-top: 8px;
    border-radius: 5px;" name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input style="margin-left: -315px;width: 90px;height: 39px;margin-top: 19px;" type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>
		
		</div>
		<div style="width: 368px;height: 334px;margin-left: 510px;margin-top: 72px;">
			<li style="color: #42825B; margin:28px;font-size: 12px; padding: 10px;"><h2 class="bothead" style="color: #42825B">New Jes Machinaery Corporation </h2> <hr>
			<div class="textwidget"><p><br /> <br /></p></div>			
<div class="textwidget"><br /><p>209, Nawabpur Road, Dhaka-1100, Bangladesh.  <br /> </p>


</div>
<div class="textwidget"><p>Phone: 88-02-9568926 <br /> </p>
</div>
<div class="textwidget"><p>Mobile: 01711832449  <br /> </p>
</div>
<div class="textwidget"><p>Fax: 88-02-7113987  <br /> </p>
</div>
<div class="textwidget"><p>E-mail: newjesmachinery@gmail.com  <br /> </p>
</div>
		</li>
		

		</div>


		</div>
<?php include 'inc/footer.php'; ?>