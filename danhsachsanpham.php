<?php
include_once("dbconnect.php");
?>
     <div class="slider-area">
        	<!-- Slider -->
			<div class="block-slider block-slider4">
				<ul class="" id="bxslider-home4">
					<li>
						<img src="img/h4-slide.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								iPhone <span class="primary">6 <strong>Plus</strong></span>
							</h2>
							<h4 class="caption subtitle">Dual SIM</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide2.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								by one, get one <span class="primary">50% <strong>off</strong></span>
							</h2>
							<h4 class="caption subtitle">school supplies & backpacks.*</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide3.png" alt="Slide">
						<div class="caption-group">
							<h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">Select Item</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
					<li><img src="img/h4-slide4.png" alt="Slide">
						<div class="caption-group">
						  <h2 class="caption title">
								Apple <span class="primary">Store <strong>Ipod</strong></span>
							</h2>
							<h4 class="caption subtitle">& Phone</h4>
							<a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
						</div>
					</li>
				</ul>
			</div>
			<!-- ./Slider -->
    </div> <!-- End slider area -->
    
    <!--Gioi thieu cac chuc nang-->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>?????i, tr??? h??ng 30 ng??y</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Mi???n ph?? v???n chuy???n</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>B???o m???t thanh to??n</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>S???n ph???m m???i</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="latest-product">
                        <h2 class="section-title">S???n ph???m</h2>
                        <div class="product-carousel">
                        
                        <!--Load san pham tu DB tuong ung voi tung loai nhan ve-->
                           <?php
						   if(isset($_GET['maloai'])){
							   	$maloai=$_GET['maloai'];
		  				  	 	$result=mysqli_query($conn, "SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b WHERE a.sp_ma=b.sp_ma LIMIT 0,1) as sp_hinhdaidien FROM sanpham a WHERE a.lsp_ma=$maloai");
								
						   while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							?>
						<!--M???t s???n ph???m -->
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="product-imgs/<?php echo $row['sp_hinhdaidien']?>" title="product-imgs" height="250" width="150">
                                    <div class="product-hover">
                                        <a href="?func=dathang&ma=<?php echo $row['sp_ma']?>" class="add-to-cart-link" ><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma']?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma']?>"><?php echo $row['sp_ten']?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins><?php echo $row['sp_gia']?></ins> 
                                </div> 
                            </div>
                
                <?php
						   }
					 }
				?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">
                            <img src="img/brand3.png" alt="">
                            <img src="img/brand4.png" alt="">
                            <img src="img/brand5.png" alt="">
                            <img src="img/brand6.png" alt="">
                            <img src="img/brand1.png" alt="">
                            <img src="img/brand2.png" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">B??n ch???y nh???t</h2>
                        <a href="" class="wid-view-more">Xem t???t c???</a>
                        <?php
							$sqstr="SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b 
							WHERE a.sp_ma=b.sp_ma LIMIT 0,1) as hsp_tentaptin, 
							(SELECT SUM(sp_dh_soluong) FROM sanpham_dondathang c WHERE a.sp_ma=c.sp_ma)
							AS soluong FROM sanpham a ORDER BY soluong DESC LIMIT 0,3";
							$result = mysqli_query($conn,$sqstr);
							/*while($rs=mysqli_fetch_array($result, MYSQLI_ASSOC))*/
                            while($rs=mysqli_fetch_array($result))
							{
						?>
                         
                        <div class="single-wid-product">
                        	<a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma'];?>">
                            <img src="product-imgs/<?php echo $rs['hsp_tentaptin']?>" class="product-thumb"  height="250" width="150"></a>
                            <h2><a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma'];?>">
                            <?php echo $rs['sp_ten'];?></a></h2>
                            <div class="product-wid-rating">
                            	<i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            
                            <div class="product-wid-price">
                            	<ins><?php echo $rs['sp_gia'];?></ins>
                            </div>
                        </div>
                        <?php 
							}
						?>             
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">M???i nh???t</h2>
                        <a href="#" class="wid-view-more">Xem t???t c???</a>
                        <?php 
							$sqstr="SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b
							WHERE a.sp_ma=b.sp_ma LIMIT 0,1) as hsp_tentaptin
							FROM sanpham a ORDER BY sp_ngaycapnhat DESC LIMIT 0,3";
							$result=mysqli_query($conn,$sqstr);
							while($rs=mysqli_fetch_array($result, MYSQLI_ASSOC))
							{
						?>
                        <div class="single-wid-product">
                            <a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma'];?>">
                            <img src="product-imgs/<?php echo $rs['hsp_tentaptin'];?>" class="product-thumb" height="250" width="150"></a>
                            <h2><a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma'];?>">
                            <?php echo $rs['sp_ten'];?></a></h2>
                            <div class="product-wid-rating">
                            	<i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                            	<ins><?php echo $rs['sp_gia'];?></ins>
                            </div>
                        </div>
                        <?php 
							}
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
  
   
  