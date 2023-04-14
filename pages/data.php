<?php include_once('../lib/db.php'); ?>
<?php include_once('../lib/function.php'); ?>
<?php include_once('../lib/category.class.php'); ?>
<?php include_once('../lib/administrator.class.php'); ?>
<?php include_once('../lib/role.class.php'); ?>
<?php include_once('../lib/product.class.php'); ?>
<?php include_once('../lib/user.class.php'); ?>
<?php include_once('../lib/bill.class.php'); ?>
<?php include_once('../lib/coupon.class.php'); ?>
<?php include_once('../lib/evalution.class.php'); ?>
<?php include_once('../lib/wishlist.class.php'); ?>
<?php include_once('../lib/comment.class.php'); ?>
<?php include_once('../lib/contact.class.php'); ?>

<?php
$category = new Category;
$administrator = new Administrator;
$product = new Product;
$user = new User;
$bill = new Bill;
$coupon = new Coupon;
$evalution = new Evalution;
$wishlist = new Wishlist;
$comment = new Comment;
$contact = new Contact;

