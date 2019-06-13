<?php include 'inc/header.php'; ?>
<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>


<?php 
	$db = new Database();
?>



<?php 
		$query = "select * from comprof";
		$title = $db -> select($query);
		if($title){
			while($result = $title->fetch_assoc()){

		
	?>

				<div id="home-content" class="clearfix">
					<p class="header" style="text-align: left; margin-left: 36px;"><?php echo $result['title']; ?></p>
					<p class="para" style="text-align: left; margin-left: 36px;"><?php echo $result['bold_disc']; ?> </p>
					<div style="margin: 20px; padding: 20px; font-size: 16px; padding-bottom: 3px;"><?php echo $result['discrip']; ?></div>
				</div>

	<?php } } ?>

<?php include 'inc/footer.php'; ?> 