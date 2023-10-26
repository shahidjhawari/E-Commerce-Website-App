<?php 
require('top.php');
if(isset($_GET['id'])){
	$product_id=mysqli_real_escape_string($con,$_GET['id']);
	if($product_id>0){
		$get_product=get_product($con,'','',$product_id);
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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Detail Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .product-container {
      max-width: 400px;
      margin: 100px 0 20px 50px;
      padding: 20px;
    }
    .product-image {
      max-width: 100%;
      height: auto;
      margin-top: 20px;
    }
    .product-price {
      font-size: 24px;
      font-weight: bold;
    }
    .product-name {
      font-size: 24px;
      font-weight: bold;
      margin-top: 10px;
    }
    .old-price {
      font-size: 18px;
      color: red;
      text-decoration: line-through;
    }
    .product-categories {
      font-size: 14px;
      color: #666;
      margin-top: 10px;
    }
    .quantity-container {
      display: flex;
      align-items: center;
    }
    .quantity-label {
      margin-right: 10px;
    }
    .quantity-button {
      background-color: #f8f9fa;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
    }
    .add-to-cart-btn {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      margin-top: 20px;
      margin-right: 100px;
    }
    .buy-now-btn {
      background-color: #28a745;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      margin-top: 20px;
    }
    .product-short-description {
      font-size: 16px;
      margin-top: 10px;
    }
    .product-long-description {
      font-size: 14px;
      margin-top: 20px;
      line-height: 1.6;
    }
  </style>
</head>
<body>
  <div class="product-container">
    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="full-image" class="product-image">
    <div class="product-name"><?php echo $get_product['0']['name']?></div>
    <div class="product-price">Rs. <?php echo $get_product['0']['price']?></div>
    <div class="old-price">Rs. <?php echo $get_product['0']['mrp']?></div>
    <div class="product-categories">
    <?php echo $get_product['0']['categories']?>
    </div>
    <div class="product-short-description">
    <?php echo $get_product['0']['description']?>
    </div>

    <div class="product-long-description">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia, purus eu fringilla hendrerit,
      purus augue dictum velit, id dignissim ante velit at arcu. Donec eu odio sit amet quam convallis feugiat.
      Vivamus a urna non est accumsan rhoncus. Fusce non semper justo. Vestibulum ante ipsum primis in faucibus
      orci luctus et ultrices posuere cubilia Curae; Proin et ligula et odio viverra accumsan ut nec turpis.
      Sed interdum feugiat nunc nec euismod. Suspendisse vel est orci. Aenean sed odio in elit aliquam elementum
      vel nec mi.
    </div>
    
    <div class="quantity-container">
      <div class="quantity-label">Quantity:</div>
      <in class="quantity-button" id="qty">-</in>
      <input type="text" class="form-control" value="1">
      <button class="quantity-button">+</button>
    </div>
    
    <a href="javascript:void(0)" class="btn btn-primary add-to-cart-btn" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Add to cart</a>
    <button class="btn btn-success buy-now-btn">Buy Now</button>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include('footer.php')?>