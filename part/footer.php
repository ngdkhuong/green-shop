<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <div class="container">
        <div class="main-instagram owl-carousel owl-theme">
            <?php
            $min = 1;
            $max = $product->countAllProducts();;
            $time = 15;
            $array = arrayRand($min, $max, $time);
            foreach ($array as $value) { ?>
                <div class="item">
                    <div class="ins-inner-box">
                        <img src="../assets/img/upload/img_product/<?php echo $product->getProductId($value)['img_prd_1']; ?>" alt="" />
                        <div class="hov-in">
                            <a href="shop-detail.php?id_prd=<?php echo $value; ?>"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
</div>
<!-- End Instagram Feed  -->

<!-- Start Footer  -->
<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-top-box">
                        <h3>Thời gian làm việc</h3>
                        <ul class="list-time">
                            <li>Monday - Friday: 08.00am to 05.00pm</li>
                            <li>Saturday: 10.00am to 08.00pm</li>
                            <li>Sunday: <span>Closed</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-top-box">
                        <h3>Email</h3>
                        <form class="newsletter-box">
                            <div class="form-group">
                                <input class="" type="email" name="Email" placeholder="Email Address*" />
                                <i class="fa fa-envelope"></i>
                            </div>
                            <button class="btn hvr-hover" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-top-box">
                        <h3>Các nền tảng mạng xã hội</h3>
                        <p>Đã có mặt trên hầu hết các trang mạng xã hội hiện nay</p>
                        <ul>
                            <li><a href=""><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                            <li><a href=""><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-widget">
                        <h4>Về chúng tôi</h4>
                        <p>Greenshop là một sàn thương mại điện tử làm trung gian mở các gian hàng buôn bán các mặt hàng nông sản an toàn đảm bảo chất lượng cao </p>
                        <p>Chúng tôi cam kết đảm bảo sản phẩm sạch chất lượng được kiểm tra kĩ lưỡng trước khi được xuất hiện trên trang của chúng tôi</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link">
                        <h4>Thông tin</h4>
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">About US</a></li>
                            <li><a href="">Shop</a></li>
                            <li><a href="">Terms &amp; Conditions</a></li>
                            <li><a href="">Gallery</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link-contact">
                        <h4>Contact Us</h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: Địa chỉ: Quận 12 công viên phần mềm Quang Trung Tòa T</p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:0823885276">0823885276</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="greenshop@gmail.com">greenshop@gmail.com</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer  -->

<!-- Start copyright  -->
<div class="footer-copyright">
    <p class="footer-company">All Rights Reserved. &copy; 2023 <a href="">GreenShop</a> Design By :
        <a href="">Golden Bee Team</a>
    </p>
</div>
<!-- End copyright  -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Thông báo</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5><?php echo $_SESSION['alert']; ?></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- ALL JS FILES -->
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="../assets/js/jquery.superslides.min.js"></script>
<script src="../assets/js/bootstrap-select.js"></script>
<script src="../assets/js/inewsticker.js"></script>
<script src="../assets/js/bootsnav.js."></script>
<script src="../assets/js/images-loded.min.js"></script>
<script src="../assets/js/isotope.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/baguetteBox.min.js"></script>
<script src="../assets/js/jquery-ui.js"></script>
<script src="../assets/js/jquery.nicescroll.min.js"></script>
<script src="../assets/js/form-validator.min.js"></script>
<script src="../assets/js/contact-form-script.js"></script>
<script src="../assets/js/custom.js"></script>

<script src="../admin/assets/js/datatable/jquery.dataTables.min.js"></script>
<script src="../admin/assets/js/datatable/dataTables.buttons.min.js"></script>
<script src="../admin/assets/js/datatable/jszip.min.js"></script>
<script src="../admin/assets/js/datatable/pdfmake.min.js"></script>
<script src="../admin/assets/js/datatable/vfs_fonts.js"></script>
<script src="../admin/assets/js/datatable/buttons.html5.min.js"></script>
<script src="../admin/assets/js/datatable/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('table.display').DataTable({
            order: [[0, 'desc']],
        });
    });
</script>
<?php if($_SESSION['alert']!=""){?> 
<script>
    $('#exampleModal').modal('show')
</script>
<?php 
$_SESSION['alert'] = "";
} ?>

<script>
    (function($) {
	/* ..............................................
	   Slider Range
	   ................................................. */
	//    let num = 1000000;
	//    let text = num.toLocaleString();
	$(function() {
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: 2000000,
			values: [<?php echo $_SESSION['min-price']?>, <?php echo $_SESSION['max-price']?>],
			slide: function(event, ui) {
				$("#amount").val(ui.values[0].toLocaleString() + "VNĐ - " + ui.values[1].toLocaleString()+" VNĐ");
				$("#amount1").val(ui.values[0]);
				$("#amount2").val(ui.values[1]);
			}
		});
		$("#amount").val($("#slider-range").slider("values", 0).toLocaleString() +
			" VNĐ- " + $("#slider-range").slider("values", 1).toLocaleString()+" VNĐ");
		$("#amount1").val($("#slider-range").slider("values", 0));
		$("#amount2").val($("#slider-range").slider("values", 1));
	});
}(jQuery));
</script>
</body>

</html>