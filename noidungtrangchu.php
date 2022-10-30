<?php
include_once("dbconnect.php");

function dathang($ma, $conn)
{
	$ma = $_GET["ma"];
	$resultsql = mysqli_query($conn, "select a.*, c.soluong,b.nsx_ten from sanpham a join chitiet_lonhap c on c.lonhap_ma=a.lonhap_ma
			join nhasanxuat b on b.nsx_ma=a.nsx_ma WHERE sp_ma = " . $ma);
	$rowsql = mysqli_fetch_row($resultsql);
	if ($rowsql[0] >= 1) {
		$coroi = false;
		foreach ($_SESSION["giohang"] as $key => $row) {
			if ($key == $ma) {
				$_SESSION['giohang'][$key]["soluong"] += 1;
				$coroi = true;
			}
		}

		if (!$coroi) {
			$ten = $rowsql[1];
			$gia = $rowsql[2];
			$nsx = $rowsql[3];

			$dathang = array(
				"ten" => $ten,
				"gia" => $gia,
				"soluong" => 1,
				"hang" => $nsx);
			$_SESSION['giohang'][$ma] = $dathang;
		}
		echo "<script language='javascript'>
			alert('Sản phẩm đã được thêm vào giỏ hàng, truy cập giỏ hàng để xem!'); 
		</script>";
	}
	else {
		echo "<script>alert('Số lượng bạn đặt vượt quá số lượng trong kho.');</script>";
	}
}

if (isset($_GET['func']) & isset($_GET['ma'])) {
	$ma = $_GET['ma'];
	dathang($ma, $conn);
}
?>
<div class="slideshow-container">
	<div class="mySlides1">
		<img src="img/h2.jpg" style="width:100%">
	</div>

	<div class="mySlides1">
		<img src="img/h3.jpg" style="width:100%">
	</div>

	<div class="mySlides1">
		<img src="img/h4.jpg" style="width:100%">
	</div>

	<a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
	<a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
</div>

<!--Select san pham mới-->
<div class="product-widget-area">
	<div class="product-widget-area">
		<div class="zigzag-bottom"></div>
		<div class="container">
			<div class="row">
			
					<div class="single-product-widget">
						<h2 class="product-wid-title">Sản phẩm</h2>
						<!--a href="" class="wid-view-more">Xem tất cả</a-->
						<?php

							$sqstr = "SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b WHERE a.sp_ma = b.sp_ma LIMIT 0,1)
						            as hsp_tentaptin, 
		                        ln.soluong FROM chitiet_lonhap ln JOIN sanpham a WHERE a.lonhap_ma=ln.lonhap_ma";

							$result = mysqli_query($conn, $sqstr);

							while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							?>
							<div class="col-sm-3">
						<div class="single-wid-product">
							<a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma']?>">
								<img src="product-imgs/<?php echo $rs['hsp_tentaptin']?>" class="product-thumb"
									height="150" width="150">
							</a>
							<h2><a href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma']?>">
									<?php echo $rs['sp_ten']?>
								</a></h2>
							<div class="product-wid-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<div class="product-wid-price">
								<ins>
									<?php echo $rs['sp_gia']; ?>
								</ins>
							</div>
						</div>
							</div>
						<?php
}
?>
					
				</div>

				<!--Finish-->
				<div class="brands-area">
					<div class="zigzag-bottom"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="brand-wrapper">
									<div class="brand-list">
										<h1>Một số nhãn hiệu được tin dùng</h1>
										<img src="img/n1.jpg" alt="" height="150" width="155">
										<img src="img/n2.jpg" alt="" height="150" width="155">
										<img src="img/n3.jpg" alt="" height="150" width="155">
										<img src="img/n4.jpg" alt="" height="150" width="155">
										<img src="img/b5.jpg" alt="" height="150" width="155">
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
					<div class="product-widget-area">
						<div class="zigzag-bottom"></div>
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<div class="single-product-widget">
										<h2 class="product-wid-title">Bán chạy nhất</h2>
										<a href="" class="wid-view-more">Xem tất cả</a>
										<?php
											$sqstr = "SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b WHERE a.sp_ma = b.sp_ma LIMIT 0,1)
						           			 as hsp_tentaptin, 
		                       				 ln.soluong FROM chitiet_lonhap ln JOIN sanpham a WHERE a.lonhap_ma=ln.lonhap_ma";

											$result = mysqli_query($conn, $sqstr);
/*while($rs=mysqli_fetch_array($result, MYSQLI_ASSOC))*/
											while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
										<div class="single-wid-product">
											<a
												href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma']?>">
												<img src="product-imgs/<?php echo $rs['hsp_tentaptin']?>"
													class="product-thumb" height="120" width="150">
											</a>
											<h2><a
													href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma']?>">
													<?php echo $rs['sp_ten']?>
												</a></h2>
											<div class="product-wid-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-wid-price">
												<ins>
													<?php echo $rs['sp_gia']; ?>
												</ins>
											</div>
										</div>
										<?php
}
?>
									</div>
								</div>

								<div class="col-md-6">
									<div class="single-product-widget">
										<h2 class="product-wid-title">Mới nhất</h2>
										<a href="#" class="wid-view-more">Xem tất cả</a>
										<?php
												$sqstr = "SELECT a.*,(SELECT b.hsp_tentaptin FROM hinhsanpham b 
												WHERE a.sp_ma = b.sp_ma LIMIT 0,1) as hsp_tentaptin 
												FROM sanpham a ORDER BY sp_ngaycapnhat DESC LIMIT 0,3";
												$result = mysqli_query($conn, $sqstr);
												while ($rs = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
										<div class="single-wid-product">
											<a
												href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma']?>">
												<img src="product-imgs/<?php echo $rs['hsp_tentaptin']?>"
													class="product-thumb" width="200" heigheight="150"></a>
											<h2><a
													href="index.php?khoatrang=quanly_chitietsanpham&ma=<?php echo $rs['sp_ma']?>">
													<?php echo $rs['sp_ten']; ?>
												</a></h2>
											<div class="product-wid-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											<div class="product-wid-price">
												<ins>
													<?php echo $rs['sp_gia']; ?>
												</ins>
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