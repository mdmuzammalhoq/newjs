<?php include 'inc/header.php'; ?>
<?php 
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        
    }else{
        $id = $_GET['id'];
    }
?>
        
        
            <div class="box round first grid">
                <h2>Update Product</h2>
 <?php 
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
                echo "<span class='error'>Field Must Not be empty !</span>";
            }else{
            if(!empty($file_name)){

          
            if ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);


                $query = "UPDATE product_all 
                    SET
                    category     = '$cat',
                    name         = '$name',
                    Detail       = '$body',
                    image        = '$uploaded_image',
                    product_id   = '$product_id'
                WHERE 
                id='$id'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Data Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Data Not Updated !</span>";
                }

            }

        }else{
            $query = "UPDATE product_all 
                    SET
                    category     = '$cat',
                    name         = '$name',
                    Detail       = '$body',
                    product_id   = '$product_id'
                WHERE 
                id='$id'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Data Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Data Not Updated !</span>";
                }
        }

    }

    }
 ?>               
        <div class="block">
        <?php 
            $query = "select * from product_all where id='$id' order by id desc ";
            $getproduct = $db->select($query);
            if($getproduct){
                $result = $getproduct->fetch_assoc();

        ?>               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
            <tr>
                <td>
                    <label>Title</label>
                </td>
                <td>
                    <input type="text" name ="name" value="<?php echo $result['name']; ?>" class="medium" />
                </td>
            </tr>
            
            <tr>
                <td>
                    <label>Product Id </label>
                </td>
                <td>
                    <input type="id" name="product_id" value="<?php echo $result['product_id']; ?>" />
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
                                $rresult= $category->fetch_assoc();

                        

                       ?>     
                            <option 
                        <?php 
                            if($result['category'] == $rresult['id'] ) { ?>
                                    selected = "selected";
                            <?php } ?>
                        
                            value="<?php echo $rresult['id'];?>"><?php echo $rresult['name'];?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
           
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src=" <?php echo $result['image']; ?>"  height= "80px" width="200px" /><br>
                        <input type="file" name = "image" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name = "body">
                            <?php echo $result['Detail']; ?>
                        </textarea>
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
         <?php  } ?>   
        </div>
    </div>
</div>
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
<!-- Load TinyMCE -->

 <?php include 'inc/footer.php'; ?>
