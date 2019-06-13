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
	if (!isset($_GET['delid']) || $_GET['delid'] == NULL) {
		echo "<script>window.location = 'allproductlist.php'; </script>";
	}else{
		$product_id = $_GET['delid'];

		$query = "select * from product_all where id='$product_id'";
		$getProduct = $db->select($query);
		if ($getProduct) {
			while ($delimg = $getProduct->fetch_assoc()) {
				$dellink = $delimg['image'];
				unlink($dellink);
			}
		}

		$delquery = "delete from product_all where id='$product_id'";
		$delProduct = $db->delete($delquery);
		if ($delProduct) {
			echo "<script> alert('Data Deleted Successfully !'); </script>";
        	echo "<script>window.location = 'allproductlist.php'; </script>";
		}else{
        	echo "<script> alert('Data Not Deleted !'); </script>";
        	 echo "<script>window.location = 'allproductlist.php'; </script>";
        }
	}
?>