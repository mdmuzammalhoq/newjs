 <?php include 'inc/header.php'; ?>

<?php 
    if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL){
        echo "<script>window.location = 'inbox.php'; </script>";
    }else{
        $id = $_GET['msgid'];
    }
?>
        
        
            <div class="box round first grid">
                <h2>View Messages</h2>
 <?php 
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $To = $fm->validation($_POST['ToEmail']);
        $From = $fm->validation($_POST['FromEmail']);
        $Subject = $fm->validation($_POST['subject']);
        $message = $fm->validation($_POST['message']);
        $sendmail = mail($To, $From, $Subject, $message);
        if($sendmail){
            echo "<span class='success'>Message Sent Successfully .</span>";
        }else{
            echo "<span class='error'>Message Not Sent .</span>";
        }
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
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" name="ToEmail" readonly value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="FromEmail" placeholder="enter your email..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="enter your subject..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name = "message">
                                    
                                </textarea>
                            </td>
                        </tr>
                    
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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
