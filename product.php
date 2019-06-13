<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'inc/header.php'; ?>

<?php 
	$db = new Database();
?>


</div>

<div id="box">
	<h2>All Products</h2>
</div>
<div id="home-content" class="clearfix">
<ul id="shelf">


	<?php 
		$cat = $_GET['catid'];
		if ($cat == '') {
			$query = "select * from product_all";
		$product = $db -> select($query);
		if($product){
			while($result = $product->fetch_assoc()){

		
	?>	
	
<li class="box" id="#">
				<div class="boxtitle">
			<h2><a href="" rel="bookmark" title="Permanent Link to Citizen"><?php echo $result['name']; ?></a></h2>
		</div>
		<a href="Detail.php?id=<?php echo $result['id']; ?>"><img class="productshot" src="admin/<?php echo $result['image']; ?>" alt=""/></a>
		
		<div class="pricetab clearfix">Model:
		
		
		<span class="price"><?php echo $result['product_id']; ?></span>
		<span class="prodetail"><a href="Detail.php?id=<?php echo $result['id']; ?>">Details</a></span>
		</div>
	</li>
	
	<?php } } ?>
	<?php	}else{


		$query = "select * from product_all where category='$cat'";
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
	
	<?php } } } ?>
		

<!-- <div class="clear"></div>
	<div id="pnavigation" class="clearfix">
<div class='wp-pagenavi'>
<span class='pages'>Page 1 of 2</span><span class='current'>1</span><a class="page larger" href="http://demo.fabthemes.com/zenshop/page/2/">2</a><a class="nextpostslink" rel="next" href="http://demo.fabthemes.com/zenshop/page/2/">&raquo;</a>
</div>
</div> -->
<?php include 'inc/footer.php'; ?>