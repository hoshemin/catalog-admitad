<?
include 'template/header.php';
include 'admin/config.php';
$conn = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT * FROM test ORDER BY RAND() LIMIT 12";
$name = array();
$imgSrc = array();
$id = array();
$price = array();
$cur = array();
$outUrl = array();
$result = mysqli_query($conn, $sql);
          while ($res = mysqli_fetch_array($result)) {
            array_push($name, $res['name']); 
            array_push($imgSrc, $res['img']); 
            array_push($id, $res['id']); 
            array_push($price, $res['price']); 
            array_push($cur, $res['currency']);
            array_push($outUrl, $res['url']);
          }
?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
											<li><a href="#">Armani</a></li>
											<li><a href="#">Prada</a></li>
											<li><a href="#">Dolce and Gabbana</a></li>
											<li><a href="#">Chanel</a></li>
											<li><a href="#">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Fendi</a></li>
											<li><a href="#">Guess</a></li>
											<li><a href="#">Valentino</a></li>
											<li><a href="#">Dior</a></li>
											<li><a href="#">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Households</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
					<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<? echo "<a href='product.php?id=".$id[0]."'><img src='".$imgSrc[0]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[0].$cur[0]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[0]."'><p>".$name[0]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[0]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
											
										</div>
										
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<? echo "<a href='product.php?id=".$id[1]."'><img src='".$imgSrc[1]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[1].$cur[1]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[1]."'><p>".$name[1]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[1]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
											
										</div>
										
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<? echo "<a href='product.php?id=".$id[2]."'><img src='".$imgSrc[2]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[2].$cur[2]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[2]."'><p>".$name[2]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[2]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
									</div>
									
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<? echo "<a href='product.php?id=".$id[3]."'><img src='".$imgSrc[3]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[3].$cur[3]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[3]."'><p>".$name[3]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[3]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
									</div>
									
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<? echo "<a href='product.php?id=".$id[4]."'><img src='".$imgSrc[4]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[4].$cur[4]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[4]."'><p>".$name[4]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[4]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
									</div>
									
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<? echo "<a href='product.php?id=".$id[5]."'><img src='".$imgSrc[5]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[5].$cur[5]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[5]."'><p>".$name[5]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[5]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
									</div>
									
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<? echo "<a href='product.php?id=".$id[6]."'><img src='".$imgSrc[6]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[6].$cur[6]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[6]."'><p>".$name[6]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[6]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
									</div>
									
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						
						
					
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<? echo "<a href='product.php?id=".$id[7]."'><img src='".$imgSrc[7]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[7].$cur[7]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[7]."'><p>".$name[7]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[7]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
											
										</div>
										
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<? echo "<a href='product.php?id=".$id[8]."'><img src='".$imgSrc[8]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[8].$cur[8]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[8]."'><p>".$name[8]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[8]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
									</div>
									
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<? echo "<a href='product.php?id=".$id[9]."'><img src='".$imgSrc[9]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[9].$cur[9]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[9]."'><p>".$name[9]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[9]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
									</div>
									
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<? echo "<a href='product.php?id=".$id[10]."'><img src='".$imgSrc[10]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[10].$cur[10]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[10]."'><p>".$name[10]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[10]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
									</div>
									
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<? echo "<a href='product.php?id=".$id[11]."'><img src='".$imgSrc[11]."' alt='' /></a>"; ?>
                                            <? echo "<h2>".$price[11].$cur[11]."</h2>"; ?>
											<? echo "<a href='product.php?id=".$id[11]."'><p>".$name[11]."</a></p>"; ?>
											<? echo "<a href='".$outUrl[11]."' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Перейти в магазин</a>"; ?>
									</div>
									
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
					
						
						
					</div><!--features_items-->
					
					
					
				
			</div>
		</div>
	</section>