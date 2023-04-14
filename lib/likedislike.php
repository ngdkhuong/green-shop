<?php
if (isset($_POST['like'])) {
    if (isset($_SESSION['login_user'])) {
        if (isset($_POST['id_brand'])) {
            $check = $evalution->checkEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user']);
            if ($check == 0) {
                $evalution->insertEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user'], 1);
            } else {
                if ($evalution->getEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user'])['evalution'] == 1) {
                    $evalution->editEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user'], 0);
                } else {
                    $evalution->editEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user'], 1);
                }
            }
        }
    } else {
        $_SESSION['alert'] = "Vui lòng đăng nhập trước khi đánh giá";
    }
}
if (isset($_POST['dislike'])) {
    if (isset($_SESSION['login_user'])) {
        if (isset($_POST['id_brand'])) {
            $check = $evalution->checkEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user']);
            if ($check == 0) {
                $evalution->insertEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user'], 2);
            } else {
                if ($evalution->getEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user'])['evalution'] == 2) {
                    $evalution->editEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user'], 0);
                } else {
                    $evalution->editEvalution($_POST['id_brand'], $_SESSION['login_user']['id_user'], 2);
                }
            }
        }
    } else {
        $_SESSION['alert'] = "Vui lòng đăng nhập trước khi đánh giá";
    }
}
