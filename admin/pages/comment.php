<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="card-block">
                        <h4 class="m-b-10">Bình luận</h4>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">

                    <!-- Hover table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Danh sách bình luận</h4>
                            <div class="card-header-right">
                                <ul class="list-unstyled card-option">
                                    <li><i class="fa fa-chevron-left"></i></li>
                                    <li><i class="fa fa-window-maximize full-card"></i></li>
                                    <li><i class="fa fa-minus minimize-card"></i></li>
                                    <li><i class="fa fa-refresh reload-card"></i></li>
                                    <li><i class="fa fa-times close-card"></i></li>
                                </ul>
                            </div>

                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover display">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Sđt</th>
                                            <th>Sản phẩm</th>
                                            <th>Bình luận</th>
                                            <th>Thời gian</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rows = $comment->getCommentOfBrand($_SESSION['login_admin']['id_admin']);
                                        foreach ($rows as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['id_cmt']?></td>
                                                <td><?php echo $user->getUserId($row['id_user'])['fullname']==""?$user->getUserId($row['id_user'])['username']:$user->getUserId($row['id_user'])['fullname'];?></td>
                                                <td><?php echo $user->getUserId($row['id_user'])['email']?></td>
                                                <td><?php echo $user->getUserId($row['id_user'])['phone']?></td>
                                                <td><?php echo $row['name_prd']?></td>
                                                <td><?php echo $row['cmt']?></td>
                                                <td><?php echo $row['time_cmt']?></td>
                                                <td><form method="post"><input type="hidden" name="id_cmt" value="<?php echo $row['id_cmt']?>"><button name="delete_cmt" class="btn btn-danger">Xóa</button></form></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Hover table card end -->
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</div>