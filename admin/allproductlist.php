<?php include 'inc/header.php'; ?>

        
            <div class="box round first grid">
                <h2>Homepage Product List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">No.</th>
							<th width="20%">Name</th>
							<th width="30%">Detail</th>
							
							<th width="20%">Image</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>

					<?php 
						$query = "select * from product_all order by id DESC";
						$product = $db->select($query);
							if($product){
								$i=0;
								while($result=$product->fetch_assoc()){
									$i++; 
					?>
						<tr class="odd gradeX">
							<td align="center"><?php echo $i; ?></td>
							<td align="center"><?php echo $result['name']; ?></td>
							<td align="center"><?php echo $fm->textShorten($result['Detail'], 50); ?></td>
							
							<td align="center"><img src="<?php echo $result['image']; ?>" height="40px;" width="60px"></td>

							<td align="center"><a href="EditProduct.php?id=<?php echo $result['id']; ?>">Edit</a> 

								||

							<a onclick ="return confirm('Are You Sure To DELETE !!!'); " href="delProduct.php?delid=<?php echo $result['id']; ?>">Delete</a></td>
						</tr>

					<?php } } ?>

					</tbody>
				</table>
	
               </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>