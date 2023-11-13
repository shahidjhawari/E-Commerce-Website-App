<?php 
require('top.php');
if(isset($_GET['id']) && $_GET['id']!=''){
	$cat_id=mysqli_real_escape_string($con,$_GET['id']);
	if($cat_id>0){
		$get_product=get_product($con,'',$cat_id);
	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}										
?>
      <!-- latest product section start -->
      <?php if(count($get_product)>0){?>
      <div class="fashion_section">
                  <div class="container">
                     <h1 class="fashion_taital">Man & Woman Fashion</h1>
                     <div class="fashion_section_2">
                        <div class="row">
                        <?php
										foreach($get_product as $list){
										?>
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text"><?php echo $list['name']?></h4>
                                 <p class="price_text">Price  <span style="color: #262626;">Rs. <?php echo $list['price']?></span></p>
                                 <div class="tshirt_img"><a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                        </a></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="product.php?id=<?php echo $list['id']?>">See More</a></div>
                                 </div>
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                        </div>
                     </div>
                     <?php } else { 
						echo "Data not found";
					} ?>
<!-- latest product section end -->
<?php include('footer.php') ?>