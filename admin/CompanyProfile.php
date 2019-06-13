<?php include 'inc/header.php'; ?>

<?php 
    
    $nam = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id="1";
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $bold_disc = mysqli_real_escape_string($db->link, $_POST['tags']);
        $discrip = mysqli_real_escape_string($db->link, $_POST['discrip']);

        if ($discrip == "" ) {
            $nam = "<span style='color: red '>Field Must Not be empty !</span>";
        }else{

        $query = "REPLACE INTO comprof(id, title, bold_disc, discrip) VALUES('$id', '$title', '$bold_disc', '$discrip')";
        $inserted_row = $db->insert($query);
        if ($inserted_row) {
            $nam = "<span style='color: green '>Data Inserted Successfully.
                 </span>";
            }else {
            $nam = "<span style='color: red '>Data Not Inserted !</span>";
                }
        }
    }
?>


            <div class="box round first grid">
                <h2>Company Profile</h2>
               
                <div class="block">               
                 <form action="CompanyProfile.php" method="post" enctype="multipart/form-data">
                    <table class="form">
        <?php 
           $query = "select * from comprof";
           $category = $db->select($query);
            if($category){
                $result= $category->fetch_assoc();

        ?>

                <tr>
                    <td></td>
                    <td><?php if (isset($nam)) {
                        echo $nam; 
                    } ?></td>
                </tr>
                        <tr>
                            <td>
                                <label>Company Name</label>
                            </td>
                            <td>
                                <input type="text" name ="title" value="<?php echo $result['title']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tagline</label>
                            </td>
                            <td>
                                <input type="text" name ="tags" value="<?php echo $result['bold_disc']; ?>" class="medium" />
                            </td>
                        </tr>
                       
                   
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px; ">
                                <label>About Company</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="discrip"><?php echo $result['discrip']; ?></textarea>
                            </td>
                        </tr>
                         
                       <?php } ?>
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
