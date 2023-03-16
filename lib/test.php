<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include_once('db.php');
    include_once('product.php');
    include_once('category.php');
    // $prd = new product;
    // $prd->insertProduct('Táo','tao123.png');
    // $prd->insertProduct('Chuối','chuoi123.png');
    // $prd->getAllProducts();
    // $prd->getProductId(2);
    // $name_prd='Chanh';
    // $img_prd='chanh123.png';
    // $prd->editProductId(2,$name_prd,$img_prd);
    $category = new Category;
    $category->deleteCategoryId(3);
    // echo $prd ->getProducts();
    
    ?>
</body>
</html>