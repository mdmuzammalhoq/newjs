<?php include 'inc/header.php'; ?>


        
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name= $_POST['name'];
            $name = mysqli_real_escape_string($db->link, $name);
            if(empty($name)){
                echo "<span class='error'>Field Must not be empty !</span>";
            }else{
                $query ="INSERT INTO category(name) VALUES('$name') ";
                $catinsert = $db->insert($query);
                if($catinsert){
                    echo "<span class='sucess'>Category Inserted Successfully !</span>";
                }else{
                    echo "<span class='error'>Category NOT Inserted !</span>";
                }
            }
        }
?>
                 <form action="addcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>