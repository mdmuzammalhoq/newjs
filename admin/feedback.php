<?php include 'inc/header.php'; ?>


        
            <div class="box round first grid">
                <h2>Inbox</h2>
<?php 
if(isset($_GET['seenid'])){
	$seenid = $_GET['seenid'];
	 $query ="UPDATE feedback 
            SET 
            status = '1'
            WHERE id='$seenid' ";
            $catinsert = $db->update($query);
            if($catinsert){
                echo "<span class='sucess'>Message Sent in the seen Box !</span>";
            }else{
                echo "<span class='error'>Message Not Sent in the seen Box !</span>";
            }
	}
?>
    <div class="block">        
        <table class="data display datatable" id="example">
		<thead>
			<tr>

				<td width:"5%">Serial No.</td>
				<td width:"15%">Name</td>
				<td width:"15%">Company</td>
				<td width:"15%">Phone No.</td>
				<td width:"15%">Email</td>
				<td width:"10%">Message</td>
				<td width:"5%">Date</td>
				<td width:"20%">Action</td>
			</tr>
		</thead>
	<tbody>
		<?php 
			$query = "select * from feedback where status='0' order by id desc";
			$msg = $db->select($query);
			if($msg){
				$i = 0; 
				while($result= $msg-> fetch_assoc()){
					$i++;
			
		?>
		<tr class="odd gradeX">
			<td><?php echo $i ; ?></td>
			<td><?php echo $result['name'];?></td>
                        <td><?php echo $result['company'];?></td>
			<td><?php echo $result['phone'];?></td>
			<td><?php echo $result['email'];?></td>
			<td><?php echo $fm->textShorten($result['msg'], 30);?></td>
			<td><?php echo $fm->formatDate($result['product_id']);?></td>
			<td>
			<a href="feedbackView.php?msgid=<?php echo $result['id']; ?>">View</a> ||
			<a href="feedbackReply.php?msgid=<?php echo $result['id']; ?>">Reply</a> ||
			<a onclick ="
		return confirm('Are You Sure To Move !!!'); " href="?seenid=<?php echo $result['id']; ?>">Seen</a>  
				</td>
			</tr>
		    <?php } } ?>
		</tbody>
	</table>
   </div>
</div>




    <div class="box round first grid">
        <h2>Seen Message</h2>

	<?php 
if(isset($_GET['delid'])){
	$delid = $_GET['delid'];
	$delquery = "delete from tbl_contact where id='$delid'";
	$deldata = $db->delete($delquery);
	 if($deldata){
            echo "<span class='sucess'>Message Deleted Successfully !</span>";
        }else{
            echo "<span class='error'>Message NOT Deleted !</span>";
        }

	}
    ?>    

        <div class="block">        
            <table class="data display datatable" id="example">
			<thead>
				<tr>

					<td width:"5%">Serial No.</td>
				        <td width:"15%">Name</td>
				        <td width:"15%">Company</td>
				        <td width:"15%">Phone No.</td>
				        <td width:"15%">Email</td>
				        <td width:"15%">Message</td>
				        <td width:"10%">Date</td>
				        <td width:"10%">Action</td>
				</tr>
			</thead>
	<tbody>
		<?php 
			$query = "select * from feedback where status='1' order by id desc";
			$msg = $db->select($query);
			if($msg){
				$i = 0; 
				while($result= $msg-> fetch_assoc()){
					$i++;
			
		?>
		<tr class="odd gradeX">
			
			<td><?php echo $i ; ?></td>
			<td><?php echo $result['name'];?></td>
                        <td><?php echo $result['company'];?></td>
			<td><?php echo $result['phone'];?></td>
			<td><?php echo $result['email'];?></td>
			<td><?php echo $fm->textShorten($result['msg'], 30);?></td>
			<td><?php echo $fm->formatDate($result['product_id']);?></td>
			<td>
			<a href="feedbackView.php?msgid=<?php echo $result['id']; ?>">View</a> ||
			<a onclick ="
	return confirm('Are You Sure To Move !!!'); " href="?delid=<?php echo $result['id']; ?>">Delete</a>
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