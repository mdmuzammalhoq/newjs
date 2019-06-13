<?php include 'inc/header.php'; ?>


    <div class="box round first grid">
        <h2>Category List</h2>
    <?php 
    	if(isset($_GET['delcat'])){
    		$delid = $_GET['delcat'];
    		$delquery = "delete from category where id='$delid'";
    		$deldata = $db->delete($delquery);
    		 if($deldata){
                    echo "<span class='sucess'>Category Deleted Successfully !</span>";
                }else{
                    echo "<span class='error'>Category NOT Deleted !</span>";
                }

    	}
    ?>    
        <div class="block">        
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Category Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$query = "select * from category order by id desc";
				$cat = $db->select($query);
				if($cat){
					$i = 0; 
					while($result= $cat-> fetch_assoc()){
						$i++;
				
			?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['name']; ?></td>
					<td><a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a> || <a onclick ="
					return confirm('Are You Sure To DELETE !!!'); " href="?delcat=<?php echo $result['id'];?>">Delete</a></td>
				</tr>
		<?php } } ?>
			</tbody>
		</table>
       </div>
    </div>
</div>
<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
    
 <?php include 'inc/footer.php'; ?>


    