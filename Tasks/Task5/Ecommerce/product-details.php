
<?php
$title = "Product Details";
include_once "layouts/header.php";
include_once 'layouts/navbar.php';
include_once 'layouts/breadcrumb.php';
include_once 'app/Models/Product.php';
$productObject = new Product;

if($_GET['id']){
    if(is_numeric($_GET['id'])){
        $productObject->setStatus(1);
        $productObject->setId($_GET['id']);
        $productResult = $productObject->readById();
        $product = $productResult->fetch_object();
        $productImagesResult = $productObject->readImagesById();
        $productImages = $productImagesResult->fetch_all(MYSQLI_ASSOC);
        // print_r($productImages);die;
        
        
    }else{
        header('location:errors/404.php');
    }
}else{
    header('location:errors/404.php');
}
?>
     
		<!-- Product Deatils Area Start -->
        <div class="product-details pt-100 pb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-img">
                            <img class="zoompro" src="assets/img/product-details/<?=$product->image?>" data-zoom-image="assets/img/product-details/<?=$product->image?>" alt="zoom"/>

                            <div id="gallery" class="mt-20 product-dec-slider owl-carousel">
                            <?php
                                    foreach ($productImages as $index => $productImage) {
                            
                                    ?>
                                         <a data-image="assets/img/product-details/<?=$productImage['image']?>" data-zoom-image="assets/img/product-details/<?=$productImage['image']?>">
                                            <img src="assets/img/product-details/<?=$productImage['image']?>" alt="" width="100" height="100">
                                        </a>
                                    <?php
                                    }
                                ?>                
                            </div>
                            <span>-29%</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-content">
                            <h4><?=$product->name_en?></h4>
                            <div class="rating-review">
                                <div class="pro-dec-rating">
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline theme-star"></i>
                                    <i class="ion-android-star-outline"></i>
                                </div>
                                <div class="pro-dec-review">
                                    <ul>
                                        <li>32 Reviews </li>
                                        <li> Add Your Reviews</li>
                                    </ul>
                                </div>
                            </div>
                            <span><?=$product->price?></span>
                            <div class="in-stock">
                                <p>Available: <span>In stock</span></p>
                            </div>
                            <p><?=$product->description_en?></p>
                            <div class="pro-dec-feature">
                                <ul>
                                    <li><input type="checkbox"> Protection Plan: <span> 2 year  $4.99</span></li>
                                    <li><input type="checkbox"> Remote Holder: <span> $9.99</span></li>
                                    <li><input type="checkbox"> Koral Alexa Voice Remote Case: <span> Red  $16.99</span></li>
                                    <li><input type="checkbox"> Amazon Basics HD Antenna: <span>25 Mile  $14.99</span></li>
                                </ul>
                            </div>
                            <div class="quality-add-to-cart">
                                <div class="quality">
                                    <label>Qty:</label>
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                </div>
                                <div class="shop-list-cart-wishlist">
                                    <a title="Add To Cart" href="#">
                                        <i class="icon-handbag"></i>
                                    </a>
                                    <a title="Wishlist" href="#">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="pro-dec-categories">
                                <ul>
                                    <li class="categories-title">Categories:</li>
                                    <li><a href="#">Green,</a></li>
                                    <li><a href="#">Herbal, </a></li>
                                    <li><a href="#">Loose,</a></li>
                                    <li><a href="#">Mate,</a></li>
                                    <li><a href="#">Organic </a></li>
                                </ul>
                            </div>
                            <div class="pro-dec-categories">
                                <ul>
                                    <li class="categories-title">Tags: </li>
                                    <li><a href="#"> Oolong, </a></li>
                                    <li><a href="#"> Pu'erh,</a></li>
                                    <li><a href="#"> Dark,</a></li>
                                    <li><a href="#"> Special </a></li>
                                </ul>
                            </div>
                            <div class="pro-dec-social">
                                <ul>
                                    <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                                    <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                                    <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a></li>
                                    <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Product Deatils Area End -->
        <div class="description-review-area pb-70">
            <div class="container">
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav text-center">
                        <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                        <a data-toggle="tab" href="#des-details2">Tags</a>
                        <a data-toggle="tab" href="#des-details3">Review</a>
                    </div>
                    <div class="tab-content description-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="product-description-wrapper">
                                <p><?=$product->rich_description_en?></p>
                                <p><?=$product->rich_description_en?></p>
                                <ul>
                                    <li>-  Typi non habent claritatem insitam</li>
                                    <li>-  Est usus legentis in iis qui facit eorum claritatem. </li>
                                    <li>-  Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</li>
                                    <li>-  Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</li>
                                </ul>
                            </div>
                        </div>
                        <div id="des-details2" class="tab-pane">
                            <div class="product-anotherinfo-wrapper">
                                <ul>
                                    <li><span>Tags:</span></li>
                                    <li><a href="#"> Green,</a></li>
                                    <li><a href="#"> Herbal,</a></li>
                                    <li><a href="#"> Loose,</a></li>
                                    <li><a href="#"> Mate,</a></li>
                                    <li><a href="#"> Organic ,</a></li>
                                    <li><a href="#"> special</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="des-details3" class="tab-pane">
                            <div class="rattings-wrapper">
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <span>(5)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3>Potanu Leos</h3>
                                            <span>12:24</span>
                                            <span>9 March 2018</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                                </div>
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <span>(5)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3>Kahipo Khila</h3>
                                            <span>12:24</span>
                                            <span>9 March 2018</span>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost rud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nost.</p>
                                </div>
                            </div>
                            <div class="ratting-form-wrapper">
                                <h3>Add your Comments :</h3>
                                <div class="ratting-form">
                                    <form action="#">
                                        <div class="star-box">
                                            <h2>Rating:</h2>
                                            <div class="ratting-star">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="Email" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="message" placeholder="Message"></textarea>
                                                    <input type="submit" value="add review">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-100">
            <div class="container">
                <div class="product-top-bar section-border mb-35">
                    <div class="section-title-wrap">
                        <h3 class="section-title section-bg-white">Related Products</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="product-img">
                            <a href="product-details.html">
                                <img alt="" src="assets/img/product/product-1.jpg">
                            </a>
                            <span>-40%</span>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.html">Le Bongai Tea</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.html">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once 'layouts/footer.php';
        ?>
