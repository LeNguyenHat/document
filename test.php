<?php
include_once("dbconnect.php");
?>
<div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="latest-product">
                    <h2 class="section-title">Sản phẩm</h2>
                    <div class="product-carousel">

                        <!--Load san pham tu DB -->
                        <?php
		  				   	$result = mysqli_query($conn, "SELECT a.*,c.soluong,d.hsp_tentaptin FROM sanpham a join chitiet_lonhap c  on c.lonhap_ma=a.lonhap_ma
								 join hinhsanpham d on d.sp_ma =a.sp_ma;" );
			
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				?>
                        <!--Một sản phẩm -->
                        <div class="container">
                            <div class="col-sm-4">
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="product-imgs/<?php echo $row['sp_hinhdaidien']?>" width="300" heigheight="250"
                                            title="product-imgs">
                                        <div class="product-hover">
                                            <a href="?func=dathang&ma=<?php echo $row['sp_ma']?>"
                                                class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to
                                                cart</a>
                                            <a href="?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma']?>"
                                                class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
										
                                    </div>

                                    <h2><a href="?khoatrang=quanly_chitietsanpham&ma=<?php echo $row['sp_ma']?>"><?php echo  $row['sp_ten']?></a>
                                    </h2>

                                    <div class="product-carousel-price">
                                        <ins><?php echo $row['sp_gia']?></ins> 
                                    </div>
                                   <?php
								   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
									?>
                                </div>
								
                            </div>
						</div>
						<?php
								   }
								   ?>
                        <?php 
							}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>