<?php include 'inc/header.php'; ?>

<?php 

    $nam = "";
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $Designation = mysqli_real_escape_string($db->link, $_POST['Designation']);
        
        

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploaded/".$unique_image;

            if($name == "" || $Designation == "" || $file_name == "" ){
                $nam = "<span class='error'>Field Must Not be empty !</span>";
            }elseif ($file_size >1048567) {
                 $nam = "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 $nam = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);

                
                $query = "INSERT INTO management(name, image, Designation) VALUES('$name', '$uploaded_image', '$Designation')";
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


            <div class="box round first grid">
                <h2>Add New People</h2>
                <div class="block">               
                 <form action="management.php" method="post" enctype="multipart/form-data">
                    <table class="form" >
                     
                    <tr>
                    <td></td>
                    <td><?php if (isset($nam)) {
                        echo $nam; 
                    } ?></td>
                    </tr>
                  
                        <tr>
                            <td>
                                <label>Designation</label>
                            </td>
                            <td>
                                <input type="text" name="Designation" value="" class="medium" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>Image</label>
                            </td>
                            <td>
                                <input type="file" name = "image"  />
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Profile Description</label>
                            </td>
                            <td>
                                <textarea name="name" class="tinymce"></textarea>
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
        
            <div class="box round first grid">
        <h2>Update Authority</h2>

    <?php 
if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $delquery = "delete from management where id='$id'";
    $deldata = $db->delete($delquery);
     if($deldata){
            echo "<span class='sucess'>Data Deleted Successfully !</span>";
        }else{
            echo "<span class='error'>Data NOT Deleted !</span>";
        }

    }
    ?>    

        <div class="block">        
            <table class="data display datatable" id="example">
            <thead>
                <tr>

                    <td style="width:20%; font-weight: bold;" >Serial No.</td>
                    <td style="width:20%; font-weight: bold;">Name</td>
                    
                    <td style="width:20%; font-weight: bold;">Designation</td>
                
                    <td style="width:20%; font-weight: bold;">Action</td>
                </tr>
            </thead>
    <tbody>
                <?php 
                    $query = "select * from management ";
                    $editname = $db->select($query);
                    while ( $result = $editname->fetch_assoc()) {    
                ?>
        <tr>

                    <td><?php echo $result['id']; ?></td>
                    <td><?php echo $result['name']; ?></td>
                    <td><?php echo $result['designation']; ?></td>
                    <td><a href="editManagement.php?editid=<?php echo $result['id']; ?>">Edit</a>
                        ||
                       <a href="DelManagement.php?id=<?php echo $result['id']; ?>">Delete</a> 
                    </td>
                    
                </tr>
        <?php } ?>
            </tbody>
        </table>
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
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
</script> 
<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
    
<?php include 'inc/footer.php'; ?>