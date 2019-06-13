<?php include 'inc/header.php'; ?>

<?php 
    if(!isset($_GET['editsliderid']) || $_GET['editsliderid'] == NULL){
        echo "<script>window.location = 'sliderlist.php'; </script>";
    }else{
        $sliderid = $_GET['editsliderid'];
    }
?>
       
        
            <div class="box round first grid">
                <h2>Update Post</h2>
 <?php 
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $content = mysqli_real_escape_string($db->link, $_POST['content']);
       

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "img/Slider/".$unique_image;

            if($name == "" || $content == ""){
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


                $query = "UPDATE tbl_slider 
                    SET
                    
                    name   = '$name',
                    image   = '$uploaded_image',
                    content = '$content'
                   
                WHERE 
                id='$sliderid'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Slider Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Slider Not Updated !</span>";
                }

            }

        }else{
            $query = "UPDATE tbl_slider 
                    SET

                    name   = '$name',
                    content = '$content'

                WHERE 
                id='$sliderid'

                ";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Slider Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Slider Not Updated !</span>";
                }
        }

    }

    }
 ?>               
        <div class="block">
        <?php 
            $query = "select * from tbl_slider where id='$sliderid' ";
            $getslider = $db->select($query);
            if($getslider){
                while($sliderresult = $getslider->fetch_assoc()){

        ?>               
         <form action=" " method="post" enctype="multipart/form-data">
            <table class="form">
               
            <tr>
                <td>
                    <label>Slider Name</label>
                </td>
                <td>
                    <input type="text" name ="name" value="<?php echo $sliderresult['name']; ?>" class="medium" />
                </td>
            </tr>
            <tr>
                    <td>
                        <label>Upload New Image</label>
                    </td>
                    <td>
                        <img src=" <?php echo $sliderresult['image']; ?>"  height= "100px" width="200px" /><br>
                        <input type="file" name = "image" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea name="content" class="tinymce"><?php echo $sliderresult['content']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
         <?php } } ?>   
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
