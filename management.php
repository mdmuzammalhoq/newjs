<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'inc/header.php'; ?>

<?php 
	$db = new Database();
?>


</div>

<div id="casing">

<div id="home-content" class="clearfix" >
<ul id="shelf">


	<?php 
		$query = "select * from management";
		$product = $db -> select($query);
		if($product){
			while($result = $product->fetch_assoc()){

		
	?>	
	
<li class="box" id="#">
				<div class="boxtitle">
		   <!--	<h2><a href="" rel="bookmark" title="Permanent Link to Citizen"><?php echo $result['designation']; ?></a></h2> -->
		</div>
		<a href=""><img class="productshot" src="admin/<?php echo $result['image']; ?>" alt=""/></a>
		
                  <!--

		<div class="ptab" style="background: #fff; height: 110px; border: none;">
		
		 <span class="price"><?php //echo $result['']; ?></span> 
		<div style="color: #000; font-size: 14px; text-align: center;"><?php echo $result['name']; ?></div>
		</div>
                -->
	</li>
	
	<?php } } ?>
		

<div class="clear"></div>
	<!-- <div id="pnavigation" class="clearfix">
<div class='wp-pagenavi'>
<span class='pages'>Page 1 of 2</span><span class='current'>1</span><a class="page larger" href="http://demo.fabthemes.com/zenshop/page/2/">2</a><a class="nextpostslink" rel="next" href="http://demo.fabthemes.com/zenshop/page/2/">&raquo;</a>
</div>
</div> -->
<?php include 'inc/footer.php'; ?>