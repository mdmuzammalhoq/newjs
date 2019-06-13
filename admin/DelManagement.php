<?php 
    include '../lib/Session.php';
    Session::checkSession();
?>
<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/format.php'; ?>
<?php 
	$db = new Database();
?>

<?php 
	if (!isset($_GET['id']) || $_GET['id'] == NULL) {
		echo "<script>window.location = 'management.php'; </script>";
	}else{
		$id = $_GET['id'];

		$query = "select * from management where id='$id'";
		$getProduct = $db->select($query);
		if ($getProduct) {
			while ($delimg = $getProduct->fetch_assoc()) {
				$dellink = $delimg['image'];
				unlink($dellink);
			}
		}

		$delquery = "delete from management where id='$id'";
		$delProduct = $db->delete($delquery);
		if ($delProduct) {
			echo "<script> alert('Data Deleted Successfully !'); </script>";
        	echo "<script>window.location = 'management.php'; </script>";
		}else{
        	echo "<script> alert('Data Not Deleted !'); </script>";
        	 echo "<script>window.location = 'management.php'; </script>";
        }
	}
?>