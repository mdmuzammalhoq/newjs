 <?php include 'inc/header.php'; ?>

<?php 
    if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL){
        echo "<script>window.location = 'feedback.php'; </script>";
    }else{
        $id = $_GET['msgid'];
    }
?>
        
        
            <div class="box round first grid">
                <h2>View Messages</h2>
 <?php 
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<script>window.location = 'feedback.php'; </script>";
     }
 ?>               
                <div class="block">               
                 <form action=" " method="post" >
                 <?php 
                            $query = "select * from feedback where id='$id' ";
                            $msg = $db->select($query);
                            if($msg){
             
                                while($result= $msg-> fetch_assoc()){

                            
                ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text"  value="<?php echo $fm->formatDate($result['date']);?> "class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name = "body">
                                    <?php echo $result['msg'];?>
                                </textarea>
                            </td>
                        </tr>
                    
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    <?php } } ?>
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
