<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="get">
        <input type="date" name="time" value="<?php ?>" id="">
        <select name="" id="">
            <option value="">Tháng</option>
            <option value="">Năm</option>
        </select>
        <button type="submit">Thống kê</button>
    </form>
    <?php
    $time = isset($_GET['time']) ? $_GET['time'] : "";
    echo $time . "<br>";
    //echo substr($time, 0, -6); // Lấy năm
    //echo substr($time, 5, -3); //Lấy tháng
    //echo substr($time, 8); //Lấy ngày
    //last day of month


    function lastday($month = '', $year = '')
    {
        if (empty($month)) {
            $month = date('m');
        }
        if (empty($year)) {
            $year = date('Y');
        }
        $result = strtotime("{$year}-{$month}-01");
        $result = strtotime('-1 second', strtotime('+1 month', $result));
        return date('Y-m-d', $result);
    }
    // echo lastday('2', '2020');
    // echo lastday(substr($time, 5, -3), substr($time, 0, -6));
    $time = lastday(substr($time, 5, -3), substr($time, 0, -6));
    // echo substr($time, 8);
    $days=[];
    for($i = 1 ; $i<= substr($time, 8); $i++){
        array_push($days, $i);
    }
    // print_r($days);
    foreach ($days as $day) {
        echo "Ngày: ".$day."<br>";
    }
    ?>
</body>

</html>