<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<?php 
	$db = new Database();
?>




	<?php 
		$query = "select * from post_cat";
		$title = $db -> select($query);
		if($title){
			while($result = $title->fetch_assoc()){

		
	?>

				<div id="home-content" class="clearfix">
					<p class="header"><?php echo $result['title']; ?></p>
					<p class="para"><?php echo $result['bold_disc']; ?> </p>
					<div class="paragraph"><?php echo $result['discrip']; ?></div>
				</div>

	<?php } } ?>



<br />
<div id="box">
	<h2>Featured Products</h2>
</div>
<div id="home-content" class="clearfix">
<ul id="shelf">


	<?php 
		$query = "select * from product_all order by id limit 12";
		$product = $db -> select($query);
		if($product){
			while($result = $product->fetch_assoc()){

		
	?>	
	
<li class="box" id="#">
				<div class="boxtitle">
			<h2><a href="" rel="bookmark" title="Permanent Link to Citizen"><?php echo $result['name']; ?></a></h2>
		</div>
		<a href=""><img class="productshot" src="admin/<?php echo $result['image']; ?>" alt=""/></a>
		
		<div class="pricetab clearfix">Model:
		
		
		<span class="price"><?php echo $result['product_id']; ?></span>
		<span class="prodetail"><a href="Detail.php?id=<?php echo $result['id']; ?>">Details</a></span>
		</div>
	</li>
	
	<?php } } ?>
	<?php include 'inc/jquery.php'; ?>	

<div class="clear"></div>
	<!-- <div id="pnavigation" class="clearfix">
<div class='wp-pagenavi'>
<span class='pages'>Page 1 of 2</span><span class='current'>1</span><a class="page larger" href="http://demo.fabthemes.com/zenshop/page/2/">2</a><a class="nextpostslink" rel="next" href="http://demo.fabthemes.com/zenshop/page/2/">&raquo;</a>
</div>
</div> -->
<?php include 'inc/footer.php'; ?>