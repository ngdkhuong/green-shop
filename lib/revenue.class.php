<?php
class Revenue extends Database
{
    function getRevenue()
    {
        $sql = "SELECT SUM(tong_tien) AS doanhthu FROM hoa_don WHERE ma_cua_hang = 'CH001'";
        $stmt = $this->connect()->query("SELECT * FROM customers");
        $result = $stmt->rowCount();
    }
}
