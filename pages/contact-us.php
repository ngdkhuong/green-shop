<?php include_once('../part/header.php'); ?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Contact Us</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active"> Contact Us </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<?php
$name = isset($_POST['name'])?$_POST['name']:"";
$email = isset($_POST['email'])?$_POST['email']:"";
$subject = isset($_POST['subject'])?$_POST['subject']:"";
$message = isset($_POST['message'])?$_POST['message']:"";

if(isset($_POST['send'])){
    $name = htmlspecialchars(addslashes(trim($name)));
    $email = htmlspecialchars(addslashes(trim($email)));
    $subject = htmlspecialchars(addslashes(trim($subject)));
    $message = htmlspecialchars(addslashes(trim($message)));
    $contact->insertContact($name, $email, $subject, $message);
    $_SESSION['alert']="Đã ghi nhận liên hệ của bạn. Chúng tôi sẽ phản hồi sớm qua email";
}
?>
<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2>Liên Hệ</h2>
                    <p>nếu khách hàng có ý kiến hoặc khiếu nại về sản phẩm xin vui lòng liên hệ</p>
                    <form method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name" required data-error="Please enter your name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Your Email" class="form-control" name="email" required data-error="Please enter your email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" required data-error="Please enter your Subject">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Your Message" rows="4" data-error="Write your message" required></textarea>
                                </div>
                                <div class="submit-button text-center">
                                    <button name="send" class="btn hvr-hover" id="submit" type="submit">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-left">
                    <h2>CONTACT INFO</h2>
                    <p>mọi thắc mắc của quý khách hàng sẽ được chúng tôi hồi đáp trong thời gian sớm nhất có thể hoặc quý khách hàng có thể liên hệ trực tiếp thông qua số điện thoại hoặc Email</p>
                    <ul>
                        <li>
                            <p><i class="fas fa-map-marker-alt"></i>Địa chỉ: Quận 12 công viên phần mềm Quang Trung Tòa T
                        </li>
                        <li>
                            <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">0823885276</a></p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">greenshop@gmail.com</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->
<?php include_once('../part/footer.php'); ?>