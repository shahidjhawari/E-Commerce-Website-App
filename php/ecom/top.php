<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$wishlist_count=0;
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();

if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['USER_ID'];
	
	if(isset($_GET['wishlist_id'])){
		$wid=get_safe_value($con,$_GET['wishlist_id']);
		mysqli_query($con,"delete from wishlist where id='$wid' and user_id='$uid'");
	}

	$wishlist_count=mysqli_num_rows(mysqli_query($con,"select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}

$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="My Ecom Website";
$meta_desc="My Ecom Website";
$meta_keyword="My Ecom Website";
if($mypage=='product.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
	$meta_title=$product_meta['meta_title'];
	$meta_desc=$product_meta['meta_desc'];
	$meta_keyword=$product_meta['meta_keyword'];
}if($mypage=='contact.php'){
	$meta_title='Contact Us';
}

?>
<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title><?php echo $meta_title?></title>
   <meta name="keywords" content="<?php echo $meta_keyword?>">
   <meta name="description" content="<?php echo $meta_desc?>">
   <meta name="author" content="Mahar Shahid Iqbal Jhawari">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
   <!-- font awesome -->
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <!--  -->
   <!-- owl stylesheets -->
   <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesoeet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   <!-- My Own Files stylesheets -->
   <link href="js/main.js" rel="stylesheet">
</head>

<body>
   <!-- banner bg main start -->
   <div class="banner_bg_main">
      <!-- header top section start -->
      <div class="container">
         <div class="header_section_top">
            <div class="row">
               <div class="col-sm-12">
                  <div class="custom_menu">
                     <ul>
                        <li><a href="#">Best Sellers</a></li>
                        <?php
                        foreach ($cat_arr as $list) {
                        ?>
                           <li><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a></li>
                        <?php
                        }
                        ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header top section start -->
      <!-- logo section start -->
      <div class="logo_section">
         <div class="container">
            <div class="row">
               <div class="col-sm-4">
               </div>
            </div>
         </div>
      </div>
      <!-- logo section end -->
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <div class="containt_main">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <?php
                  foreach ($cat_arr as $list) {
                  ?>
                     <li><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a></li>
                  <?php
                  }
                  ?>
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
               <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <?php
                     foreach ($cat_arr as $list) {
                     ?>
                        <li><a href="categories.php?id=<?php echo $list['id'] ?>"><?php echo $list['categories'] ?></a></li>
                     <?php
                     }
                     ?>
                  </div>
               </div>
               <div class="main">
                  <!-- Another variation with a button -->
                  <form action="search.php" method="get">
                     <div class="input-group">

                        <input type="text" class="form-control" name="str" placeholder="Search products">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522; margin-right: 15px; ">
                              <i class="fa fa-search"></i>
                           </button>
                  </form>
               </div>
            </div>
         </div>
         <!-- Profile Start -->
         <div class="header_box" style="margin-top: 20px;">
            <div class="lang_box ">
               <?php if (isset($_SESSION['USER_LOGIN'])) { ?>
                  <a href="home.php" type="button" class="btn btn-outline-light " style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><?php echo $_SESSION['USER_NAME']?></a>
                  <?php
               } else {
                  echo '<a href="login.php" type="button" class="btn btn-outline-light" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Login/Signup</a>';
               }
               ?></div>
            <!-- Profile End -->
            <div class="login_menu">
               <ul>
                  <li><a href="cart.php">
                        <span class="padding_3"><?php echo $totalProduct ?></span>
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                  </li>
                  <li><a href="checkout.php">
                        <span class="padding_3">shop</span>
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                  </li>
                  <li><a href="my_order.php">
                        <span class="padding_3">Order</span>
                        <i class="fa fa-credit-card" aria-hidden="true"></i></a>
                  </li>
										<?php
										if(isset($_SESSION['USER_ID'])){
										?>
                  <li><a href="wishlist.php">
                        <span class="padding_3"><?php echo $wishlist_count?></span>
                        <i class="fa fa-heart" aria-hidden="true"></i></a>
                  </li>
                  <?php } ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- header section end -->
   <!-- banner section start -->
   <div class="banner_section layout_padding">
      <div class="container">
         <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="row">
                     <div class="col-sm-12">
                        <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                        <div class="buynow_bt"><a href="index.php">Buy Now</a></div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="row">
                     <div class="col-sm-12">
                        <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                        <div class="buynow_bt"><a href="index.php">Buy Now</a></div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="row">
                     <div class="col-sm-12">
                        <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                        <div class="buynow_bt"><a href="index.php">Buy Now</a></div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
   </div>
   <!-- banner section end -->
   </div>
   <!-- banner bg main end -->