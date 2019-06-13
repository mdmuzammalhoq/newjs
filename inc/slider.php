<?php 
	$db = new Database();
?>

</div>

<div id="casing">
<div id="featured">

<div class="flexslider">
	<ul class="slides">
	<?php 
	$query = "select * from tbl_slider order by id limit 5";
	$slider = $db->select($query);
	if ($slider) {
		while ($result = $slider->fetch_assoc()) {			
?>	
	<li>
		<a href="#"><img class="slideimg" style="width: 300px; height: 300px; margin-right: 150px;" src="admin/<?php echo $result['image']; ?>" title="" alt="" /></a>
		<div class="flex-caption">
			<h2><a href="#" rel="bookmark" title="Permanent Link to Galaxy Tab"><?php echo $result['name']; ?></a></h2>
			<p style="color:#000; "><?php echo $result['content']; ?>
			  </p>
		</div>
	</li>
	<?php } } ?>	
	
		</ul>
</div>


</div>