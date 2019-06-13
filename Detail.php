<?php include 'config/config.php'; 
      include 'lib/Database.php'; 
      include 'inc/header.php'; 
      include ('helpers/Format.php'); 


  $db = new Database();
  $fm = new Format();
?>


<div id="casing">
<div id="home-content" class="clearfix">
<div id="content" >


<div class="post" id="post-396">
	<div class="prodmeta clearfix">
     <?php
          $id=$_GET['id'];
          $query = "select * from product_all where id='$id'";
          $category = $db ->select($query);
        if($category){
          $result = $category ->fetch_assoc();
      ?>

		<span class="procategori"> Product Categories: <a style="color: #0007D1; href="#" rel="tag"><?php echo $result['category']; ?></a> </span>

  

	</div>
	
	<a class="propic" href="#"> 

  <img style="width: 500px; height: 500px; margin: 20px 46px;" class="productimg" src="admin/<?php echo $result['image']; ?>" alt=""/></a>

	<div class="title">
		<h2><a href="#" rel="bookmark" title="Permanent Link to iPhone"><?php echo $result['name']; ?></a></h2>
	</div>

	<div class="entry">

		<p><?php echo $result['Detail']; ?></p>
		
		<div class="clear"></div>
			</div>
<?php }  ?>
	
</div>

 <!-- Comments not enabled -->

</div>

<div id="right">

<!-- Sidebar widgets -->
<div class="sidebar">
<ul>
	<h3 class="sidetitl"><span id="Cart66WidgetCartTitle">Send Your FeedBack</span></h3>  
<?php
    $n = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $fm->validation($_POST['name']);
      $company = $fm->validation($_POST['company']);
      $phone = $fm->validation($_POST['phone']);
      $email = $fm->validation($_POST['email']);
      $product_id = $fm->validation($_POST['product_id']);
      $msg = $fm->validation($_POST['msg']);

      $name = mysqli_real_escape_string($db->link, $name);
      $company = mysqli_real_escape_string($db->link, $company);
      $phone = mysqli_real_escape_string($db->link, $phone);
      $email = mysqli_real_escape_string($db->link, $email);
      $product_id = mysqli_real_escape_string($db->link, $product_id);
      $msg = mysqli_real_escape_string($db->link, $msg);

      
      if(empty($name)){
        $n =  "Name Must not be empty !!";
      }elseif(empty($phone)){
        $n = "Phone no. Must not be empty !!";
    }elseif(empty($email)){
        $n = "Email field Must not be empty !!";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $n = "Invalid Email Address !!";
    }
    elseif(empty($msg)){
        $n = "Field Must not be empty !!";
    }else{
      $query = "INSERT INTO feedback(name, company, phone, email, product_id, msg) VALUES('$name', '$company', '$phone', '$email', '$product_id', '$msg')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                  $n = "Message Sent Successfully.";
                }else {
                   $n = "Message Not Sent";
                }

    }

    }
?>
   
    <div class="Cart66WidgetViewCartCheckoutEmpty">
     <form action="" method="post">
      <table>
        <?php echo $n; ?>
        <tr>
          <td>Your name: <input type="text" name="name"> </td>
        </tr>
        <tr>
          <td>Company&nbsp :  <input type="text" name="company"> </td>
        </tr>
        <tr>
          <td>Phone no. : <input type="text" name="phone"> </td>
        </tr>
        <tr>
          <td>Your Email: <input type="text" name="email"> </td>
        </tr>
        <tr>
          <td>Product Id : <input type="text" name="product_id"> </td>
        </tr>
        <tr>
          <td></td>
          <td> <textarea style="margin-left: -170px;width: 148px;border: 1px solid #000;height: 50px;" name="msg" id="" cols="10" rows="3"></textarea> </td>
        </tr>
        <tr>
          <td></td>
          <td><input style="width: 60px;height: 30px;margin-left: -170px;" type="submit" name="submit" value="Send"></td>
        </tr>
      </table>
    </form>
    </div>



  <script type="text/javascript">
  /* <![CDATA[ */
    (function($){
      $(document).ready(function(){
        var widget_original_methods = $('#widget_shipping_method_id').html();
        var widget_selected_country = $('#widget_shipping_country_code').val();
        $('#widget_shipping_method_id .methods-country').each(function() {
          if(!$(this).hasClass(widget_selected_country) && !$(this).hasClass('all-countries') && !$(this).hasClass('select')) {
            $(this).remove();
          }
        });
        $('#widget_shipping_country_code').change(function() {
          var widget_selected_country = $(this).val();
          $('#widget_shipping_method_id').html(widget_original_methods);
          $('#widget_shipping_method_id .methods-country').each(function() {
            if(!$(this).hasClass(widget_selected_country) && !$(this).hasClass('all-countries') && !$(this).hasClass('select')) {
              $(this).remove();
            }
          });
        });
        
        $('#widget_shipping_method_id').change(function() {
          $('#Cart66WidgetCartForm').submit();
        });

        $('#widget_live_rates').change(function() {
          $('#Cart66WidgetCartForm').submit();
        });

        $('#widget_change_shipping_zip_link').click(function() {
          $('#widget_set_shipping_zip_row').toggle();
          return false;
        });
      })
    })(jQuery);
  /* ]]> */
  </script>

</li><li class="sidebox widget_categories"><h3 class="sidetitl">Categories</h3>		<ul>
      <?php
        
          $query = "select * from category ";
          $category = $db ->select($query);
        if($category){
          while($result = $category ->fetch_assoc()){
      ?>

	<li class="cat-item cat-item-4"><a href="product.php?catid=<?php echo $result['name']; ?>" ><?php echo $result['name']; ?></a>
</li>
<!-- 	<li class="cat-item cat-item-6"><a href="#" >Featured</a>
</li>
	<li class="cat-item cat-item-7"><a href="#" >news</a>
</li>
	<li class="cat-item cat-item-1"><a href="http://demo.fabthemes.com/zenshop/category/uncategorized/" >Uncategorized</a>
</li> -->
<?php } } ?>
		</ul>
</li></ul>
</div>
	

</div>
</div>
<?php include 'inc/footer.php'; ?>
