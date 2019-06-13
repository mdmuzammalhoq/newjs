<?php include 'inc/header.php'; ?>

<?php 

    $nam = "";
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $product_id = mysqli_real_escape_string($db->link, $_POST['product_id']);
        

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploaded/".$unique_image;

            if($name == "" || $cat == "" || $body == "" || $file_name == "" ){
                $nam = "<span class='error'>Field Must Not be empty !</span>";
            }elseif ($file_size >1048567) {
                 $nam = "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 $nam = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);

                
                $query = "INSERT INTO product_all(name, category, Detail, image, product_id) VALUES('$name', '$cat', '$body', '$uploaded_image', '$product_id')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                 $nam = "<span class='success'>Data Inserted Successfully.
                 </span>";
                }else {
                 $nam = "<span class='error'>Data Not Inserted !</span>";
                }

            }

        }
 ?>

<!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
</script>
    <!-- /TinyMCE -->
            <div class="box round first grid">
                <h2>Add New Product</h2>
                <div class="block">               
                 <form action="product.php" method="post" enctype="multipart/form-data">
                    <table class="form" >
                     
                    <tr>
                    <td></td>
                    <td><?php if (isset($nam)) {
                        echo $nam; 
                    } ?></td>
                    </tr>

                        <tr>
                            <td>
                                <label>Product Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="" class="medium" />
                            </td>
                        </tr>
                       
                         <tr>
                            <td>
                                <label>Product Id </label>
                            </td>
                            <td>
                                <input type="text" name="product_id" />
                            </td>
                        </tr>
            <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="cat">
                            <option>Select Category</option>
                       <?php 
                        
                           $query = "select * from category ";
                           $category = $db->select($query);
                            if($category){
                                while($result= $category->fetch_assoc()){

                        

                       ?>     
                        <option value="<?php echo $result['name'];?>"><?php echo $result['name'];?></option>
                            <?php } } ?>
                        </select>
                    </td>
            </tr>
                        
            
                        <tr>
                            <td>
                                <label>Product Image</label>
                            </td>
                            <td>
                                <input type="file" name = "image"  />
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Product Discription</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>

						<tr> 
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>

<?php include 'inc/footer.php'; ?>