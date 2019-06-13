<?php include 'inc/header.php'; ?>
<?php 
    if(!isset($_GET['editid']) || $_GET['editid'] == NULL){
        
    }else{
        $id = $_GET['editid'];
    }
?>
        
        
            <div class="box round first grid">
                <h2>Update People</h2>
 <?php 
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
       
        $designation = mysqli_real_escape_string($db->link, $_POST['designation']);
        

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploaded/".$unique_image;

            if($name == "" || $designation == "" || $file_name == ""){
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


                $query = "UPDATE management 
                    SET
                    name        = '$name',
                    image       = '$uploaded_image',
                    designation = '$designation'
                   
                WHERE 
                id='$id'";

                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Data Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Data Not Updated !</span>";
                }

            }

        }else{
            $query = "UPDATE management 
                    SET
                    name        = '$name',
                    designation = '$designation'

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
            $query = "select * from management where id='$id' order by id desc ";
            $getpeople = $db->select($query);
            if($getpeople){
                $result = $getpeople->fetch_assoc();

        ?>               
         <form action=" " method="post" enctype="multipart/form-data">
            <table class="form">
               
            <tr>
                <td>
                    <label>Designation</label>
                </td>
                <td>
                    <input type="name" name ="designation" value="<?php echo $result['designation']; ?>" class="medium" />
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
                        <label>Profile Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name = "name">
                            <?php echo $result['name']; ?>
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
         <?php } ?>   
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