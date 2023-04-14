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
    
    include('function.php');
    $min=3;
    $max=8;
    $time=3;
    $array=arrayRand($min, $max, $time);
    foreach ($array as $value) {
        echo $value."<br>";
    }
    ?>
</body>
</html>