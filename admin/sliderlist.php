<?php include 'inc/header.php'; ?>


       
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">No.</th>
							<th width="25%">Slider Title</th>
							<th width="25%">Content</th>
							<th width="20%">Slider Image</th>
							
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
				<?php 
					$query = "select * from  tbl_slider";
					$slider=$db->select($query);
					if($slider){
						$i=0;
						while($result=$slider->fetch_assoc()){
							$i++;

				?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $fm->textShorten($result['content'], 50); ?></td>
							<td><img src="<?php echo $result['image']; ?>" height="40px;" width="60px"></td>
							
		<td>
		 
	

<?php if(Session::get('userRole') == '0'){?>
	 <a href="editslider.php?editsliderid=<?php echo $result['id']; ?>">Edit</a> ||
		<a onclick ="
		return confirm('Are You Sure To DELETE !!!'); " href="delslider.php?delsliderid=<?php echo $result['id']; ?>">Delete</a>
<?php } ?>
		
		</td>
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