<?php 
	$db = new Database();
?>


<div style="clear: both"></div>
<!-- Officers -->
	<div class="row">
		<div class="parther wow zoomIn" data-wow-duration=".05s" data-wow-delay="1.0s">
			<h4 style="text-align: center;font-weight: bold;font-size: 22px;margin-top: 34px;" class="heading-all">HOT PRODUCTS</h4>

<div class="featured_product_lists">
					
<?php 
$query = "select * from product_all order by id DESC";
$product = $db->select($query);
if ($product) {
	while ($result = $product->fetch_assoc()) {
			
?>
<div class=" item wow flipInY single_featured_product_list" style="padding: 0px" data-wow-duration=".05s" data-wow-delay="0.08s">
					<div class="col-md-12">
						<a href="Detail.php?id=<?php echo $result['id']; ?>"><img style="height: 250px; width: 200px;" src="admin/<?php echo $result['image']; ?>"></a>
					</div>
					</div>
<?php } } ?>
	
			</div>
		
		</div>
	</div>
<!-- End Officers -->

