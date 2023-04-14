<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="card-block">
                        <h4 class="m-b-10">Liên hệ</h4>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">

                    <!-- Hover table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Danh sách liên hệ</h4>
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
                                            <th>Chủ đề</th>
                                            <th>Nội dung liên hệ</th>
                                            <th>Thời gian</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rows = $contact->getAllContact();
                                        foreach ($rows as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['id_contact']?></td>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['email']?></td>
                                                <td><?php echo $row['subject']?></td>
                                                <td><?php echo $row['message']?></td>
                                                <td><?php echo $row['time']?></td>
                                                <td><form method="post"><input type="hidden" name="id_contact" value="<?php echo $row['id_contact']?>"><button name="delete_contact" class="btn btn-danger">Xóa</button></form></td>
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