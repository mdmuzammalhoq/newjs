<?php include 'inc/header.php'; ?>


        
        
            <div class="box round first grid">
                <h2>Add New Slider</h2>
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

            if($name == "" || $file_name == "" || $content == ""){
                echo "<span class='error'>Field Must Not be empty !</span>";
            }elseif ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_slider(name, image, content) VALUES('$name', '$uploaded_image', '$content')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                 echo "<span class='success'>Slider Inserted Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Slider Not Inserted !</span>";
                }

            }

        }
 ?>               
        <div class="block">               
         <form action="addslider.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Slider Name</label>
                    </td>
                    <td>
                        <input type="name" name ="name" placeholder="Enter Slider name..." class="medium" />
                    </td>
                </tr>
             
                
           
                <tr>
                    <td>
                        <label>Upload Slider Image</label>
                    </td>
                    <td>
                        <input type="file" name = "image" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea name="content" class="tinymce"></textarea>
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
